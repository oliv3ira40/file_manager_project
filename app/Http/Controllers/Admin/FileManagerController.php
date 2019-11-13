<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\VariablesConfigs;
use App\Helpers\HelpersUsers;

use Illuminate\Support\Facades\Storage;

class FileManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    


    public function index()
    {

        return view('Admin.FileManager.index');
    }

    public function getFolderAndFilesTreeview()
    {
        // MENUS ESTATICOS
        function generateMenu($variable, $text, $href, $class, $id, $data_path, $selected)
        {
            $n = [
                'text' => $text,
                'href' => $href,
                'class' => $class,
                'id' => $id,
                'data-path' => $data_path,
                'state' => [
                    'selected' => $selected,
                ]
            ];
            array_push($variable, $n);
            return $variable;
        }

        $static_menu_1 = [];
        $static_menu_1 = generateMenu($static_menu_1, 'HOME', '', '', 'btn_inicio', '', false);
        $static_menu_1 = generateMenu($static_menu_1, 'GOVERNANÇA CORPORATIVA', '', '', 'btn_governança_corporativa', '', false);
        if (in_array('admin.file_manager.folder_options_menu', HelpersUsers::permissionsUser(\Auth::user()))) {
            $static_menu_1 = generateMenu($static_menu_1, 'PASTA RAIZ', '', '', 'btn_all_folders', 'public/Arquivos_Portal', false);
        }
        $static_menu_2 = [];
        $static_menu_2 = generateMenu($static_menu_2, 'ORGANOGRAMA', '', '', 'btn_organograma', '', false);
        $static_menu_2 = generateMenu($static_menu_2, 'AGENDA', route('admin.calendar.index'), '', '', '', false);

        // RETORNA DIRETORIOS EM ARRAY A PARTIR DO CAMINHO INICIAL E DOS DIRETORIOS GERADOS POR ELE
        function getDirectories($path, $results)
        {
            foreach ($results as $key => $direct) {
                $results[$key] = str_replace($path, '', $direct);
            }
            sort($results, SORT_NUMERIC);
        
            $treeview_menu = [];
            // LISTANDO DIRETORIOS GERADOS PELO CAMINHO INICIAL
            foreach ($results as $key => $result) {
                $folder = [];
                $folder['text'] =  $result;
                $folder['id'] = '';
                if (!in_array('admin.file_manager.rename_file', HelpersUsers::permissionsUser())) {
                    $folder['text'] = preg_replace('/[0-9]*[-]/', '', $folder['text']);
                }
                $folder['data-path'] = $path.$result;
                $folder['class'] = 'item_menu_folder';
                $folder['nodes'] = Storage::directories($path.$result);
                
                // SE EXISTIR MAIS DIRETORIOS DENTRO DESTE
                if (count($folder['nodes']) > 0) {
                    $folder['nodes'] = getDirectories($path.$result.'/', $folder['nodes']);
                } else {
                    unset($folder['nodes']);
                }
        
                // GUARDANDO RESULTADOS
                $treeview_menu[$key] = $folder;
            }
        
            return $treeview_menu;
        }


        // CAMINHO INICIAL
        $root_path = 'public/Arquivos_Portal/';
        // DIRETORIOS DOS CAMINHOS INICIAIS
        $results = Storage::directories($root_path);
        
        // DIRETORIOS GERADOS A PARTIR DOS INICIAIS + MENUS ESTATICOS
        $folders_and_sub_folders[0] = getDirectories($root_path, $results);;
        $folders_and_sub_folders[0] = array_merge($static_menu_1, $folders_and_sub_folders[0], $static_menu_2);
        
        $folders_and_sub_folders['count_all_folders'] = count(Storage::allDirectories($root_path));


        return $folders_and_sub_folders;
    }

    public function getFiles(Request $req)
    {
        $data = $req->all();

        $all_files = Storage::files($data['file_path']);
        
        $n = [];
        foreach ($all_files as $key => $value) {
            $pathinfo = pathinfo($value);
            $n['filename'] = $pathinfo['filename'];
            $n['extension'] = $pathinfo['extension'];
            $n['size'] = number_format((Storage::size($value) / 1024) / 1024, 2);
            $n['path_file'] = $value;
            
            $n['link_dowload_and_view'] = asset('../storage/app/'.$value);

            $n['content'] = '';
            if (strtolower($pathinfo['basename']) == 'leia-me.txt') {
                $n['content'] = utf8_encode(Storage::get($value));
            }
            $all_files[$key] = $n;
        }

        return $all_files;
    }

    public function getAllFilesInTheFolder(Request $req)
    {
        $data = $req->all();

        $all_files = Storage::allFiles($data['file_path']);
        
        $n = [];
        foreach ($all_files as $key => $value) {
            $pathinfo = pathinfo($value);
            $n['filename'] = $pathinfo['filename'];
            $n['basename'] = $pathinfo['basename'];
            $n['extension'] = $pathinfo['extension'];
            $n['size'] = number_format((Storage::size($value) / 1024) / 1024, 2);
            $n['path_file'] = $value;
            
            $n['link_dowload_and_view'] = asset('../storage/app/'.$value);

            $n['content'] = '';
            if (strtolower($pathinfo['basename']) == 'leia-me.txt') {
                $n['content'] = utf8_encode(Storage::get($value));
            }
            $all_files[$key] = $n;
        }

        return $all_files;
    }

    public function filesInTheFolder(Request $req)
    {
        $data = $req->all();
        $files = Storage::allFiles($data['path_folder']);

        return count($files);
    }

    public function getFolders(Request $req)
    {
        $data = $req->all();

        $folders = Storage::directories($data['folder_path']);
        foreach ($folders as $key => $direct) {
            $folders[$key] = str_replace($data['folder_path'].'/', '', $direct);
        }
        sort($folders, SORT_NUMERIC);

        $files = Storage::files($data['folder_path']);
        foreach ($files as $key => $direct) {
            $files[$key] = str_replace($data['folder_path'].'/', '', $direct);
        }
        sort($files, SORT_NUMERIC);

        $n = [];
        foreach ($folders as $key => $value) {
            $path_folder = $data['folder_path'].'/';
            
            $n['path_file'] = $path_folder.$value;
            $n['extension'] = '';
            $n['filename'] = $value;
            if (!in_array('admin.file_manager.rename_folder', HelpersUsers::permissionsUser())) {
                $n['filename'] = preg_replace('/[0-9]*[-]/', '', $n['filename']);
            }

            $n['size'] = number_format((Storage::size($path_folder.$value) / 1024) / 1024, 2);
            $n['link_dowload'] = asset('../storage/app/'.$data['folder_path'].'/'.$value);

            $folders[$key] = $n;
        }

        $n = [];
        foreach ($files as $key => $value) {
            $path_file = $data['folder_path'].'/';
            $pathinfo = pathinfo($path_file.$value);
            
            $n['path_file'] = $path_file.$value;
            $n['extension'] = $pathinfo['extension'];
            $n['filename'] = str_replace('.'.$n['extension'], '', $value);
            if (!in_array('admin.file_manager.rename_file', HelpersUsers::permissionsUser())) {
                $n['filename'] = preg_replace('/[0-9]*[-]/', '', $n['filename']);
            }

            $n['size'] = number_format((Storage::size($path_file.$value) / 1024) / 1024, 2);
            $n['link_dowload'] = asset('../storage/app/'.$path_file.$value);

            $n['content'] = '';
            if (strtolower($pathinfo['basename']) == 'leia-me.txt') {
                $n['content'] = utf8_encode(Storage::get($path_file.$value));
            }

            $files[$key] = $n;
        }

        return array_merge($folders, $files);
    }

    public function addNewFiles(Request $req)
    {
        $data = $req->all();
        foreach ($data['selected_files'] as $file) {
            // return json_encode($file->getClientOriginalName());
            // return json_encode($file->getClientOriginalExtension());
            $file->storeAs($data['path_folder'], $file->getClientOriginalName());
        }
        return $data;
    }

    public function addNewFolders(Request $req)
    {
        $data = $req->all();
        $file = pathinfo($data['path_folder']);

        Storage::makeDirectory($data['path_folder'].'/'.$data['name_new_folder']);
        return $data;
    }

    public function renameFIleAndFOlder(Request $req)
    {
        $data = $req->all();

        $file = pathinfo($data['path_file']);
        $data['extension'] = $file['extension'] ?? '';
        $data['path_folder'] = $file['dirname'];

        $data['new_path_file'] = str_replace($file['filename'], $data['new_name_file'], $data['path_file']);
        Storage::move($data['path_file'], $data['new_path_file']);

        return $data;
    }

    public function deleteFolder(Request $req)
    {
        $data = $req->all();
        $file = pathinfo($data['path_folder']);
        $data['file_name'] = $file['filename'];

        Storage::deleteDirectory($data['path_folder']);

        return $data;
    }

    public function deleteFIle(Request $req)
    {
        $data = $req->all();
        $file = pathinfo($data['path_file']);
        $data['path_folder'] = $file['dirname'];
        
        Storage::delete($data['path_file']);
        return $data;
    }

    public function organograma()
    {
        $imgs = [];
        array_push($imgs, asset('img/organograma/Imagem.png'));
        
        return $imgs;
    }

    public function menuInicio()
    {
        $imgs = [];
        array_push($imgs, asset('img/menu_inicio/BRB Saude-01.png'));
        array_push($imgs, asset('img/menu_inicio/Mulher.jpg'));
        
        return $imgs;
    }

    public function menuGorvenCorporativa()
    {
        $imgs = [];
        array_push($imgs, asset('img/menu_governanca_corporativa/governanca corporativa.png'));
        array_push($imgs, asset('img/menu_governanca_corporativa/img_utilizada.jpg'));
        
        return $imgs;
    }

    public function getUserPermissions()
    {
        $permissions_user = \Auth::user()->Group->Permission;

        $data = [];
        foreach ($permissions_user as $permission_user) {
            array_push($data, $permission_user->CreatedPermission->route);   
        }
        
        return $data;
    }

    public function viewPdfPlugin(Request $req)
    {
        $data = $req->all();
        // http://127.0.0.1:8000/?file=img/pagina.pdf
        return view('Admin.pdf.model_pdf', compact('data'));
    }

}