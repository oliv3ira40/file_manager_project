// $(this).css('pointer-events', 'none');

$(function() {

	// PEGANDO PERMISSÕES DO USUÁRIO
	var form_getUserPermissions = $("#form_getUserPermissions");
	var user_permissions = $.get(form_getUserPermissions.attr('action'));
	// PEGANDO PERMISSÕES DO USUÁRIO

	// FORMS
	var form_organograma = $("#form_organograma");
	var form_menu_inicio = $("#form_menu_inicio");
	var form_menu_gorven_corporativa = $("#form_menu_gorven_corporativa");
	// FORMS

	var form_pick_folder_and_file_selection = $("#form_pick_folder_and_file_selection");
	var body_files = $("#body_files");

	var link_img_folder = $("#link_img_folder");
	var link_img_file = $("#link_img_file");
	var btn_all_folders = $("#btn_all_folders");
	var icon_load_refresh_btn_all = $('#icon_load_refresh');
	var form_file_manager_get_folders = $("#form_get_folders");

	var folder_list = $('.folder-list');

	var btn_come_back_folder = $('#btn_come_back_folder');
	var title_selected_folder = $('#title_selected_folder');
	var menu_folder = $('#menu_folder');
	var b = $("#name_folder_selected");
	var p = $("#title_folder_selected");
	var li_dropdown_rename_folder = $('.li_dropdown_rename_folder');
	var li_dropdown_delete_folder = $('.li_dropdown_delete_folder');
	var li_dropdown_add_new_file = $('.li_dropdown_add_new_file');
	var li_dropdown_add_new_folder = $('.li_dropdown_add_new_folder');

	// MODAL RENAME_FILE
	var dropdown_rename_folder = $(".dropdown_rename_folder");
	var rename_input_path_file = $("#rename_input_path_file");
	var rename_input_name_file = $("#rename_input_name_file");
	// MODAL EXCLUIR PASTA
	var dropdown_delete_folder = $(".dropdown_delete_folder");
	var delete_input_path_folder = $("#delete_input_path_folder");
	var b_files_in_the_folder = $("#b_files_in_the_folder");

	// MODAL EXCLUIR ARQUIVO
	var delete_input_path_file = $("#delete_input_path_file")
	var div_name_file = $("#div_name_file")
	
	// MODAL ADD_NEW_FILE
	var dropdown_add_new_file = $(".dropdown_add_new_file");
	var add_file_input_path_folder = $("#add_file_input_path_folder");
	var b_destination_folder_the_file = $("#b_destination_folder_the_file");
	// MODAL ADD_NEW_FOLDER
	var new_folder_input_path_file = $("#new_folder_input_path_file");
	var name_new_folder = $("#name_new_folder");
	var dropdown_add_new_folder = $(".dropdown_add_new_folder");

	var list_folders = $("#list_folders");

	var treev_file_manager = $("#treev_file_manager");
	var form_get_folder_and_files_treeview = $("#form_get_folder_and_files_treeview");
	

	if (treev_file_manager.length > 0) {
	
		
		startTreeview(treev_file_manager);
	
		function startTreeview(treev_file_manager, selected_node, name_file)
		{
			var _token = form_get_folder_and_files_treeview.find("input[name='_token']").val();
			$.post(form_get_folder_and_files_treeview.attr('action'), {
				_token: _token
			}, function(data, textStatus, xhr) {
			})
			.done(function(data){
				// console.log(data[0]);
				treev_file_manager.treeview({
					levels: 1,
					color: '#000000',

					expandIcon: 'glyphicon glyphicon-plus pull-right icon_reation_folders',
					collapseIcon: 'glyphicon glyphicon-minus pull-right icon_reation_folders',
					emptyIcon: 'm-0 p-0 width-0',
					nodeIcon: '',
					selectedIcon: '',

					data: data[0],

					onNodeSelected: function(event, data) {
						if (data['id'] != '') {

							if (data['id'] == 'btn_all_folders') {
								resetCssBodyFiles();
								// REMOVENDO CONTEUDO ANTIGO
								body_files.find('.row').remove();
								body_files.append("<div class='row'></div>");

								allReactionsSourceFolders(data);
							} else if (data['id'] == 'btn_inicio') {

								hideInputSearchFiled();
								configsTitleAndMenuFolder('');
								
								resetCssBodyFiles();
								body_files.css('margin-top', '-50px');

								var _token = form_menu_inicio.find("input[name='_token']").val();
								$.get(form_menu_inicio.attr('action'), function(data) {
									// console.log(data);
								})
								.done(function(data){
									var screen_width = screen.width;

									if (screen_width < 1024) {
										body_files.find('.row').remove();

										body_files.append(
											"<div class='row'>"+
												"<div class='container-fluid view-mail'>"+
													"<img style='width: 100%' src='"+data[1]+"'>"+
													"<p style='text-align: justify;'>"+
														"O PORTAL DOS DIRIGENTES tem a finalidade de disponibilizar, para consultas, os documentos e informações, de caráter interno, necessários ao pleno cumprimento das responsabilidades e atribuições dos agentes de governança corporativa da SAÚDE BRB - Caixa de Assistência. Nele, estão publicados os conteúdos dos documentos que compõem o sistema normativo da Instituição que dão suporte ao processo decisório, assim como daqueles que registram as principais atividades desenvolvidas, tais como: atas, relatórios, demonstrativos e outras informações que contextualizam e evidenciam atos e fatos da Caixa de Assistência."+
													"</p>"+
													"<p style='text-align: justify;'>"+
														"Os documentos de natureza pública, como Estatuto, Regimento do Plano de Saúde, Relatórios de Gestão, publicações, etc., encontram-se, também, disponibilizados no site da Instituição."+
													"</p>"+
													"<p style='text-align: justify;'>"+
														"O acesso ao Portal – realizado por meio de login e senha cadastrada previamente - é de caráter restrito aos agentes de governança – membros do Conselho Deliberativo, do Conselho Fiscal e do Órgão Executivo - além dos empregados envolvidos no gerenciamento e manutenção da ferramenta, para tanto autorizados pelo Órgão Executivo."+
													"</p>"+
													"<p style='text-align: justify;'>"+
														"A documentação é disponibilizada, exclusivamente, para consultas, sendo vedada a sua reprodução. A eventual reprodução por meio de baixa de downloads será registrada com a identificação do agente responsável."+
													"</p>"+
												"</div>"+
											"</div>"
										);
									} else {
										body_files.find('.row').remove();

										body_files.append(
											"<div class='row'>"+
												"<div class='container-fluid view-mail'>"+
													"<img style='width: 100%' src='"+data[0]+"'>"+
												"</div>"+
											"</div>"
										);
									}
								});
							} else if (data['id'] == 'btn_organograma') {
								
								hideInputSearchFiled();
								configsTitleAndMenuFolder('');

								resetCssBodyFiles();
								body_files.css('margin-top', '-50px');

								var _token = form_organograma.find("input[name='_token']").val();
								$.get(form_organograma.attr('action'), function(data) {
									// console.log(data);
								})
								.done(function(data){
									var screen_width = screen.width;

									body_files.find('.row').remove();
									body_files.append("<div class='row'></div>");
									
									if (screen_width > 1024) {
										$.each(data, function(index, img) {
											body_files.find('.row').append(
												"<div style='text-align: center;' class='col-md-12'>"+
													"<img style='width: 100%;' src="+img+">"+
												"</div>"
											);
										});
									} else {
										$.each(data, function(index, img) {
											body_files.find('.row').append(
												"<div style='text-align: center;' class='col-md-12'>"+
													"<img src="+img+">"+
												"</div>"
											);
										});
									}
								});
							} else if (data['id'] == 'btn_governança_corporativa') {
								hideInputSearchFiled();
								configsTitleAndMenuFolder('');
								
								resetCssBodyFiles();
								body_files.css('margin-top', '-50px');

								var _token = form_menu_gorven_corporativa.find("input[name='_token']").val();
								$.get(form_menu_gorven_corporativa.attr('action'), function(data) {
									// console.log(data);
								})
								.done(function(data){
									var screen_width = screen.width;

									if (screen_width < 1024) {
										body_files.find('.row').remove();

										body_files.append(
											"<div class='row'>"+
												"<div class='container-fluid view-mail'>"+
													"<img style='width: 100%' src='"+data[1]+"'>"+
													"<p style='text-align: justify;'>"+
														"A <b style='font-weight: bold;'>Saúde BRB - Caixa de Assistência</b> é uma associação sem fins lucrativos, autogestão multipatrocinada sob os princípios contributivos, mutualista e solidário."+
													"</p>"+
													"<p style='text-align: justify;'>"+
														"A <b style='font-weight: bold;'>Governança Corporativa</b> é o conjunto de políticas, regras, responsabilidades e processos estabelecidos para direcionar, orientar e controlar a forma como uma organização deve agir para atingir seus objetivos e metas."+
													"</p>"+
													"<p style='text-align: justify;'>"+
														"Assim, a boa governança pressupõe que todos os agentes da estrutura organizacional - dos órgãos colegiados aos componentes do quadro funcional - busquem a maximização dos resultados operacionais e institucionais, de forma planejada, organizada e controlada."+
													"</p>"+
													"<p style='text-align: justify;'>"+
														"Por esse motivo, a estrita observância das normas de regência e o estabelecimento de regras internas fundamentam os processos de gestão da <b style='font-weight: bold;'>Saúde BRB</b>, que, por sua vez, são monitorados e avaliados por agentes internos e externos, com vistas a preservar e rentabilizar os recursos dos acionistas, que são administrados pela Instituição."+
													"</p>"+
													"<p style='text-align: justify;'>"+
														"Os mecanismos de Governança Corporativa se desdobram em duas vertentes: a <b style='font-weight: bold;'>Estrutura de Governança</b> e o <b style='font-weight: bold;'>Referencial Estratégico</b> adotado pela Saúde BRB."+
													"</p>"+
												"</div>"+
											"</div>"
										);
									} else {
										body_files.find('.row').remove();

										body_files.append(
											"<div class='row'>"+
												"<div class='container-fluid view-mail'>"+
													"<img style='width: 100%' src='"+data[0]+"'>"+
												"</div>"+
											"</div>"
										);
									}
								});
							}
						} else if (data['data-path'] != '') {
							resetCssBodyFiles();
							// REMOVENDO CONTEUDO ANTIGO
							body_files.find('.row').remove();
							body_files.append("<div class='row'></div>");

							allReactionsSubFolders(data);
						} else if (data['href'] != '') {

							window.location.href = data['href'];
						}
					},
				});
		
				btn_come_back_folder.on('click', function(event) {
					event.preventDefault();

					var get_selected = treev_file_manager.treeview('getSelected');
					var get_parent = treev_file_manager.treeview('getParent', get_selected[0]);

					if (get_parent['state'] != undefined) {
						selectNode(get_parent);
					}
				});

				if (selected_node == true) {
					selectNode(nodeSearch(name_file, true)[0]);
				} else {
					var found_node = nodeSearch('btn_inicio', true, 'id');
					selectNode(found_node[0]);
				}
			});
		}

		function reloadTreeview(treev_file_manager, file_name)
		{
			// var selected_node = treev_file_manager.treeview('getSelected');
			// console.log(selected_node);

			treev_file_manager.treeview('remove');
			if (file_name) {
				startTreeview(treev_file_manager, true, file_name);
			} else {
				startTreeview(treev_file_manager);
			}
		}

		function nodeSearch(text, clearSearch, atribute)
		{
			var results = treev_file_manager.treeview('search', 
				[text, 
					{
					ignoreCase: true,     // case insensitive
					exactMatch: true,    // like or equals
					revealResults: true,  // reveal matching nodes
					clearSearch: clearSearch,
					atributeSearch: atribute,
					}
				]
			);
			return results;
		}

		function selectNode(node)
		{
			treev_file_manager.treeview('selectNode', 
				[
					node['nodeId'],{ silent: false }
				]
			);
		}
		function unselectNode(node)
		{
			treev_file_manager.treeview('unselectNode', 
				[
					node['nodeId'],{ silent: false }
				]
			);
		}

		function allReactionsSourceFolders(data)
		{
			var name_folder_selected = $("#name_folder_selected");
			btn_all_folders.addClass('active_menu_a');

			p.text('Pasta: ');
			b.text(data['text']);
			btn_come_back_folder.addClass('hide');
			title_selected_folder.attr('data-path', data['data-path']);


			if (userHasThisPermission('admin.file_manager.folder_options_menu')) {
				menu_folder.removeClass('hide');
				menu_folder.find('i').removeClass('hide');
				menu_folder.addClass('inline-block');
			} else {
				menu_folder.addClass('hide');
				menu_folder.removeClass('inline-block');
			}

			// PASTA RAIZ NÃO PERMITE SER RENOMEADA NEM EXCLUIDA
			li_dropdown_rename_folder.addClass('hide');
			li_dropdown_delete_folder.addClass('hide');

			if (userHasThisPermission('admin.file_manager.add_new_file')) {
				li_dropdown_add_new_file.removeClass('hide');
			} else {
				li_dropdown_add_new_file.addClass('hide');
			}
			if (userHasThisPermission('admin.file_manager.add_new_folder')) {
				li_dropdown_add_new_folder.removeClass('hide');
			} else {
				li_dropdown_add_new_folder.addClass('hide');
			}

			// BUSCANDO PASTAS
				var _token = form_file_manager_get_folders.find("input[name='_token']").val();
				$.post(form_file_manager_get_folders.attr('action'), {
					_token: _token,
					folder_path: data['data-path'],

				}, function(data, textStatus, xhr) {
					// console.log('aqui');
				})
				.done(function(data){
					if (data.length > 0) {
						num_files = data.length;
						writeHtmlFromFiles(data);

						// MENU
							if (!userHasThisPermission('admin.file_manager.folder_options_menu')) {
								$(".dropdown_menu_folder").addClass('hide');
								$(".dropdown_menu_folder").removeClass('inline-block');
							}
							if (!userHasThisPermission('admin.file_manager.file_options_menu')) {
								$(".dropdown_menu_file").addClass('hide');
								$(".dropdown_menu_file").removeClass('inline-block');
							}
						// MENU

						// LI
							if (!userHasThisPermission('admin.file_manager.rename_file')) {
								$(".btn_rename_file").closest('li').addClass('hide');
							}
							if (!userHasThisPermission('admin.file_manager.delete_folder')) {
								$(".btn_delete_folder").closest('li').addClass('hide');
							}

							if (!userHasThisPermission('admin.file_manager.view_file')) {
								$(".a_view_file").closest('li').addClass('hide');
							}
							if (!userHasThisPermission('admin.file_manager.download_file')) {
								$(".a_download_file").closest('li').addClass('hide');
							}
							if (!userHasThisPermission('admin.file_manager.delete_file')) {
								$(".btn_delete_file").closest('li').addClass('hide');
							}					
						// LI

						// PREENCHER MODALS PARA RENOMEAR E DELETAR PASTAS
							var stop = setInterval(function() {
								var file_box = $('.file-box');

								if (file_box.length > 0) {
									$.each(file_box, function(index, box) {
										box = $(this);
										var btn_rename_file = box.find('.btn_rename_file');
										var btn_delete_folder = box.find('.btn_delete_folder');
										var btn_delete_file = box.find('.btn_delete_file');

										var name_file = box.find('.name_file');
										var path_file = box.find('.path_file');

										btn_rename_file.on('click', function(event) {
											event.preventDefault();

											rename_input_path_file.val(path_file.text());
											rename_input_name_file.val(name_file.text());
										});

										btn_delete_folder.on('click', function(event) {
											event.preventDefault();

											delete_input_path_folder.val(path_file.text());
											
											var files_in_the_folder = $("#form_files_in_the_folder");
											var _token = files_in_the_folder.find("input[name='_token']").val()
											$.post(files_in_the_folder.attr('action'), {
												_token: _token,
												path_folder: path_file.text()

											}, function(data, textStatus, xhr) {
												
												b_files_in_the_folder.text(data);
											});
										});

										btn_delete_file.on('click', function(event) {
											delete_input_path_file.val(path_file.text());
											div_name_file.text(name_file.text());
										});
									});

								
									clearInterval(stop);
								}
							}, 500);
						// PREENCHER MODALS PARA RENOMEAR E DELETAR PASTAS

						// PREENCHER MODALS ADD_NEW_FILE E ADD_NEW_FOLDER
							// ADICIONAR ARQUIVO
								dropdown_add_new_file.on('click', function(event) {
									add_file_input_path_folder.val(title_selected_folder.attr('data-path'));
									b_destination_folder_the_file.text(name_folder_selected.text());
								});
							// NOVA PASTA
								dropdown_add_new_folder.on('click', function(event) {
									new_folder_input_path_file.val(title_selected_folder.attr('data-path'));
								});
						// PREENCHER MODALS ADD_NEW_FILE E ADD_NEW_FOLDER

						dblClickFIleBox(num_files);
						showInputSearchFiled();
					} else {
						body_files.find('.row').append(
							"<div class='col-md-12'>"+
								"<p class='text-center'>Nenhum arquivo encontrado</p>"+
							"</div>"
						);
					}
				});
			// BUSCANDO PASTAS
		}

		function allReactionsSubFolders(data)
		{
			resetCssBodyFiles();

			var form_file_manager_get_files = $("#form_get_files");
			var name_folder_selected = $("#name_folder_selected");

			p.text('Pasta: ');
			name_folder_selected.text($.trim(data['text']));
			title_selected_folder.attr('data-path', data['data-path']);
			btn_come_back_folder.removeClass('hide');
			
			// MENU
				if (userHasThisPermission('admin.file_manager.folder_options_menu')) {
					menu_folder.removeClass('hide');
					menu_folder.find('i').removeClass('hide');
					menu_folder.addClass('inline-block');
				} else {
					menu_folder.addClass('hide');
					menu_folder.removeClass('inline-block');
				}
			// MENU

			// LIS
				if (userHasThisPermission('admin.file_manager.rename_folder')) {
					li_dropdown_rename_folder.removeClass('hide');
				} else {
					li_dropdown_rename_folder.addClass('hide');
				}
				if (userHasThisPermission('admin.file_manager.delete_folder')) {
					li_dropdown_delete_folder.removeClass('hide');
				} else {
					li_dropdown_delete_folder.addClass('hide');
				}
				if (userHasThisPermission('admin.file_manager.add_new_file')) {
					li_dropdown_add_new_file.removeClass('hide');
				} else {
					li_dropdown_add_new_file.addClass('hide');
				}
				if (userHasThisPermission('admin.file_manager.add_new_folder')) {
					li_dropdown_add_new_folder.removeClass('hide');
				} else {
					li_dropdown_add_new_folder.addClass('hide');
				}
			// LIS

			// REMOVENDO CONTEUDO ANTIGO
			body_files.find('.row').remove();
			body_files.append("<div class='row'></div>");

			// BUSCANDO PASTAS
				var _token = form_file_manager_get_folders.find("input[name='_token']").val();
				$.post(form_file_manager_get_folders.attr('action'), {
					_token: _token,
					folder_path: data['data-path']
				}, function(data, textStatus, xhr) {
					// console.log(data);
				})
				.done(function(data){
					if (data.length > 0) {
						num_files = data.length;
						writeHtmlFromFiles(data);

						// MENU
							if (!userHasThisPermission('admin.file_manager.file_options_menu')) {
								$(".dropdown_menu_file").addClass('hide');
								$(".dropdown_menu_file").removeClass('inline-block');
							}
						// MENU

						// LI
							if (!userHasThisPermission('admin.file_manager.view_file')) {
								$(".a_view_file").closest('li').addClass('hide');
							}
							if (!userHasThisPermission('admin.file_manager.download_file')) {
								$(".a_download_file").closest('li').addClass('hide');
							}
							if (!userHasThisPermission('admin.file_manager.rename_file')) {
								$(".btn_rename_file").closest('li').addClass('hide');
							}
							if (!userHasThisPermission('admin.file_manager.delete_file')) {
								$(".btn_delete_file").closest('li').addClass('hide');
							}					
						// LI

						// PREENCHER MODALS PARA RENOMEAR E DELETAR PASTAS
							var stop = setInterval(function() {
								var file_box = $('.file-box');

								if (file_box.length > 0) {
									$.each(file_box, function(index, box) {
										box = $(this);
										var btn_rename_file = box.find('.btn_rename_file');
										var btn_delete_folder = box.find('.btn_delete_folder');
										var btn_delete_file = box.find('.btn_delete_file');

										var name_file = box.find('.name_file');
										var path_file = box.find('.path_file');

										btn_rename_file.on('click', function(event) {
											event.preventDefault();

											rename_input_path_file.val(path_file.text());
											rename_input_name_file.val(name_file.text());
										});

										btn_delete_folder.on('click', function(event) {
											event.preventDefault();

											delete_input_path_folder.val(path_file.text());
											
											var files_in_the_folder = $("#form_files_in_the_folder");
											var _token = files_in_the_folder.find("input[name='_token']").val()
											$.post(files_in_the_folder.attr('action'), {
												_token: _token,
												path_folder: path_file.text()

											}, function(data, textStatus, xhr) {
												
												b_files_in_the_folder.text(data);
											});
										});

										btn_delete_file.on('click', function(event) {
											delete_input_path_file.val(path_file.text());
											div_name_file.text(name_file.text());
										});
									});

								
									clearInterval(stop);
								}
							}, 500);
						// PREENCHER MODALS PARA RENOMEAR E DELETAR PASTAS

						// PREENCHER MODALS
							// RENOMEAR PASTA
								dropdown_rename_folder.on('click', function(event) {
									rename_input_path_file.val(title_selected_folder.attr('data-path'));
									rename_input_name_file.val(name_folder_selected.text());
								});
							// EXCLUIR PASTA
								dropdown_delete_folder.on('click', function(event) {
									delete_input_path_folder.val(title_selected_folder.attr('data-path'));
					
									var files_in_the_folder = $("#form_files_in_the_folder");
									var _token = files_in_the_folder.find("input[name='_token']").val()
									$.post(files_in_the_folder.attr('action'), {
										_token: _token,
										path_folder: title_selected_folder.attr('data-path')

									}, function(data, textStatus, xhr) {
										
										b_files_in_the_folder.text(data);
									});
								});
							// ADICIONAR ARQUIVO
								dropdown_add_new_file.on('click', function(event) {
									add_file_input_path_folder.val(title_selected_folder.attr('data-path'));
									b_destination_folder_the_file.text(name_folder_selected.text());
								});
							// NOVA PASTA
								dropdown_add_new_folder.on('click', function(event) {
									new_folder_input_path_file.val(title_selected_folder.attr('data-path'));
								});
						// PREENCHER MODALS

						dblClickFIleBox(num_files);
						showInputSearchFiled();
					} else {
						body_files.find('.row').append(
							"<div class='col-md-12'>"+
								"<p class='text-center'>Nenhum arquivo encontrado</p>"+
							"</div>"
						);
					}
				});
			// BUSCANDO PASTAS
		}

		function userHasThisPermission(route)
		{
			if ($.inArray(route, user_permissions['responseJSON']) != -1) {
				return true;
			} else {
				return false;
			}
		}

		function dblClickFIleBox(num_files)
		{
			var list_folders = $("#list_folders");

			var stop = setInterval(function(){
				var file_box = $(".file-box");

				if (num_files == file_box.length) {
					if (file_box.length > 0) {

						$.each(file_box, function(index, file_box) {
							file_box = $(this);

							var file = file_box.find('.file');
							var extension_file = file_box.find('.extension_file');
							var path_file = file_box.find('.path_file');
							var name_file = file_box.find('.name_file');
						
							var a_view_file = file_box.find('.a_view_file');
							var a_download_file = file_box.find('.a_download_file');
						
							if (a_download_file.length > 0) {
								var a_click = file_box.prev('a');

								a_download_file.on('click', function(event) {
									a_click.attr('href', a_download_file.attr('href'));

									a_click[0].click();
								});
							}

							a_view_file.off('click');
							a_view_file.on('click', function(event) {
								event.preventDefault();
								
								file_preview_link = file_box.find('.a_view_file');
								// ABRIR ARQUIVO EM NOVA ABA
								var formats = ['pdf', 'txt', 'jpg', 'png'];
								if (formats.includes(extension_file.text())) {
									if (extension_file.text() == 'pdf') {
										window.open(file_preview_link.attr('href').replace('../', '_admin/gerenciador/view_file/?file='));
									}
									if (extension_file.text() == 'txt') {
										window.open(file_preview_link.attr('href'));
									}
									if (extension_file.text() == 'jpg' || extension_file.text() == 'png') {
										if (userHasThisPermission('admin.file_manager.download_file')) {
											window.open(file_preview_link.attr('href'));
										} else {
											alert('Você não tem permissão para ver esse arquivo');
										}
									}
								} else {
									if (userHasThisPermission('admin.file_manager.download_file')) {
										window.open(file_preview_link.attr('href'));
									} else {
										alert('Formato de arquivo não suportado');
									}
								}
							});

							file_box.on('click', function(event) {
								event.preventDefault();
							});

							file.off('dblclick');
							file.on('dblclick', function(event) {
								// SE FOR ARQUIVO
								if (extension_file.text().length > 0) {

									file_preview_link = file_box.find('.a_view_file');
									// ABRIR ARQUIVO EM NOVA ABA
									var formats = ['pdf', 'txt', 'jpg', 'png'];
									if (formats.includes(extension_file.text())) {
										if (extension_file.text() == 'pdf') {
											window.open(file_preview_link.attr('href').replace('../', '_admin/gerenciador/view_file/?file='));
										}
										if (extension_file.text() == 'txt') {
											window.open(file_preview_link.attr('href'));
										}
										if (extension_file.text() == 'jpg' || extension_file.text() == 'png') {
											if (userHasThisPermission('admin.file_manager.download_file')) {
												window.open(file_preview_link.attr('href'));
											} else {
												alert('Você não tem permissão para ver esse arquivo');
											}
										}
									} else {
										if (userHasThisPermission('admin.file_manager.download_file')) {
											window.open(file_preview_link.attr('href'));
										} else {
											alert('Formato de arquivo não suportado');
										}
									}
								} else { //SE FOR PASTA
									
									var node = nodeSearch(path_file.text(), true, 'data-path');
									selectNode(node[0]);
								}
							});
						});
					}
					clearInterval(stop);
				}
			}, 200);
		}

		function showInputSearchFiled()
		{
			var chat_search = $('.chat-search');
		
			chat_search.removeClass('hide');
		}

		function hideInputSearchFiled()
		{
			var chat_search = $('.chat-search');
		
			chat_search.addClass('hide');
		}

		function resetCssBodyFiles()
		{

			body_files.css('margin-top', '0px');
		}

		function writeHtmlFromFiles(data)
		{
			$.each(data, function(index, file) {
				if (typeof file['content'] !== 'undefined') {
					if (file['content'].length > 0) {
						body_files.find('.row').append(
							"<div class='col-md-12 mb-10'>"+
								"<p>"+file['content']+"</p>"+
							"</div>"
						);

						return true;
					}
				}
			});

			$.each(data, function(index, file) {	
				if (!userHasThisPermission('admin.file_manager.rename_file')) {
					file['filename'] = file['filename'].replace(/[(][0-9][)]/g, '');
				}

				if (file['extension'].length == 0) {
					var img_folder = link_img_folder.attr('src');
				
					body_files.find('.row').append(
						"<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 file-box size_box'>"+
							"<div style='float: right; z-index: 9;' class='dropdown_menu_folder inline-block dropdown'>"+
								"<a class='dropdown-toggle' data-toggle='dropdown' href='#' aria-expanded='false' role='button'>"+
									"<i style='padding: 5px 10px; font-size: 26px;' class='zmdi zmdi-more-vert'></i>"+
								"</a>"+
								"<ul class='dropdown-menu bullet dropdown-menu-right'  role='menu'>"+
									"<li style='padding: 5px 0px;' role='presentation'>"+
										"<a class='btn_rename_file' data-toggle='modal' data-target='.rename_file' href='#' role='menuitem'>"+
											"<i class='fa fa-pencil' aria-hidden='true'></i>Renomear"+
										"</a>"+
									"</li>"+
									"<li style='padding: 5px 0px;' role='presentation'>"+
										"<a class='btn_delete_folder' data-toggle='modal' data-target='.modal_delete_folder' href='#' role='menuitem'>"+
											"<i class='fa fa-trash-o' aria-hidden='true'></i>Excluir"+
										"</a>"+
									"</li>"+
								"</ul>"+
							"</div>"+
							"<div class='file'>"+
								"<a href='#'>"+
									
									"<div class='image' style='text-align: center;'>"+
										"<img alt='"+file['filename']+"' src='"+img_folder+"'>"+
									"</div>"+
									"<div style='text-align: center;' class='file-name'>"+
										file['filename']+
										// "<br>"+
										// "<span>Tamanho: "+file['size']+"Mb</span>"+
									"</div>"+
									"<p class='hide extension_file'>"+file['extension']+"<p>"+
									"<p class='hide name_file'>"+file['filename']+"<p>"+
									"<p class='hide path_file'>"+file['path_file']+"<p>"+
								"</a>"+
							"</div>"+
						"</div>"
					);
				} else {
					var no_extensions = ['AAC', 'AI', 'AUT', 'AVI', 'BIN', 'BMP', 'CAD', 'CDR', 'CSS', 'CSV', 'DB', 'DOC', 'DOCX', 'EPS', 'EXE', 'FILE', 'FLV', 'GIF', 'HLP', 'HTM', 'HTML', 'INI', 'ISO', 'JAVA', 'JPG', 'JS', 'MKV', 'MOV', 'MP3', 'MP4', 'MPEG', 'MPG', 'PDF', 'PHP', 'PNG', 'PPT', 'PS', 'PSD', 'RAR', 'RSS', 'RTF', 'SQL', 'SVG', 'SWF', 'SYS', 'TXT', 'WMA', 'XLS', 'XLSX', 'XML', 'ZIP'];
					var img_file = '';

					if ($.inArray(file['extension'].toUpperCase(), no_extensions) != -1) {
						img_file = link_img_file.attr('src').replace('TXT', file['extension'].toUpperCase());
					} else {
						img_file = link_img_file.attr('src').replace('TXT', 'FILE');
					}
					// VERIFICANDO SE EXISTE IMG PARA O FORMATO DO ARQUIVO

					body_files.find('.row').append(
						"<a download href='#'></a>"+
						"<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 file-box size_box'>"+
							"<div style='float: right; z-index: 9;' class='dropdown_menu_file inline-block dropdown'>"+
								"<a class='dropdown-toggle' data-toggle='dropdown' href='#' aria-expanded='false' role='button'>"+
									"<i style='padding: 5px 10px; font-size: 26px;' class='zmdi zmdi-more-vert'></i>"+
								"</a>"+
								"<ul class='dropdown-menu bullet dropdown-menu-right'  role='menu'>"+
									"<li style='padding: 5px 0px;' role='presentation'>"+
										"<a class='a_view_file' target='_blank' href='"+file['link_dowload']+"' role='menuitem'>"+
											"<i class='fa fa-eye' aria-hidden='true'></i>Visualizar"+
										"</a>"+
									"</li>"+

									"<li style='padding: 5px 0px;' role='presentation'>"+
										"<a class='a_download_file' download href='"+file['link_dowload']+"' role='menuitem'>"+
											"<i class='fa fa-download' aria-hidden='true'></i>Baixar"+
										"</a>"+
									"</li>"+
									"<li style='padding: 5px 0px;' role='presentation'>"+
										"<a class='btn_rename_file' data-toggle='modal' data-target='.rename_file' href='#' role='menuitem'>"+
											"<i class='fa fa-pencil' aria-hidden='true'></i>Renomear"+
										"</a>"+
									"</li>"+
									"<li style='padding: 5px 0px;' role='presentation'>"+
										"<a class='btn_delete_file' data-toggle='modal' data-target='.delete_file' href='#' role='menuitem'>"+
											"<i class='fa fa-trash-o' aria-hidden='true'></i>Excluir"+
										"</a>"+
									"</li>"+
								"</ul>"+
							"</div>"+
							"<div class='file'>"+
								"<a href='#'>"+
									
									"<div class='image' style='text-align: center;'>"+
										"<img alt='"+file['filename']+"' src='"+img_file+"'>"+
									"</div>"+
									"<div style='text-align: center;' class='file-name'>"+
										file['filename']+"."+file['extension']+
										// "<br>"+
										// "<span>Tamanho: "+file['size']+"Mb</span>"+
									"</div>"+
									"<p class='hide extension_file'>"+file['extension']+"<p>"+
									"<p class='hide name_file'>"+file['filename']+"<p>"+
									"<p class='hide path_file'>"+file['path_file']+"<p>"+
								"</a>"+
							"</div>"+
						"</div>"
					);
				}
			});
		}

		function configsTitleAndMenuFolder(title)
		{
			b.text(' ');
			p.text(title);

			menu_folder.addClass('hide');
			menu_folder.removeClass('inline-block');

			btn_come_back_folder.addClass('hide');
		}










		// RENAME FILE AND FOLDERS
			var form_rename_files = $('#form_rename_file_and_folder');

			var modal_rename_file = $(".rename_file");
			var rename_input_path_file = $("#rename_input_path_file");
			var rename_input_name_file = $("#rename_input_name_file");
			var btn_rename_file = $(".btn_rename_file");
			var animate_btn_rename_file = $(".animate_btn_rename_file");
			var error_modal_rename = $(".error_modal_rename");

			var name_file_old = '';
			modal_rename_file.on('show.bs.modal', function(event) {
				name_file_old = rename_input_name_file.val();
			});

			btn_rename_file.on('click', function(event) {
				event.preventDefault();
				disableBtnRenameFile();

				// console.log(rename_input_path_file.val());
				// console.log(rename_input_name_file.val());

				if (rename_input_name_file.val().length > 0 && rename_input_name_file.val() != name_file_old) {
					var _token = form_rename_files.find("input[name='_token']").val();
					$.post(form_rename_files.attr('action'), {
						_token: _token,
						path_file: rename_input_path_file.val(),
						new_name_file: rename_input_name_file.val()

					}, function(data, textStatus, xhr) {
					})
					.fail(function() {
					})
					.done(function(data){
						// console.log(data);

						modal_rename_file.modal('hide');

						searchSelectedFolder(data['path_file'], data['new_name_file'], data['new_path_file']);
						if (data['extension'].length == 0) {
							reloadTreeview(treev_file_manager, data['new_name_file']);
						} else {
							var node = nodeSearch(data['path_folder'], true, 'data-path');
							unselectNode(node[0]);
							selectNode(node[0]);
						}
					})
					.always(function(){
						enableBtnRenameFile();
					});
				} else {
					enableBtnRenameFile();
				
					error_modal_rename.removeClass('hide');
					setTimeout(function(){
						error_modal_rename.addClass('hide');
					}, 10000);
				}
			});

			function searchSelectedFolder(path_file_old, new_name_file, new_path_file)
			{
				var title_selected_folder = $("#title_selected_folder");
				var path_file = title_selected_folder.attr('data-path');
				var name_folder_selected = $("#name_folder_selected");

				// SE ESTA É A PASTA ALTERADA
				if (path_file == path_file_old) {
					name_folder_selected.text(new_name_file);
					title_selected_folder.attr('data-path', new_path_file);
					
					// EFEITO DE MUDANÇA
					name_folder_selected.css('color', 'red');
					setTimeout(function(){
						name_folder_selected.css('color', '#878787');
					}, 2000);	
				}
			}

			function disableBtnRenameFile()
			{
				btn_rename_file.attr('disabled', 'true');
				animate_btn_rename_file.removeClass('hide');
			}
			
			function enableBtnRenameFile()
			{
				setTimeout(function(){
					btn_rename_file.removeAttr('disabled');
					animate_btn_rename_file.addClass('hide');
				}, 1500);
			}
		// RENAME FILE AND FOLDERS

		// DELETE FOLDER
			var form_delete_folder = $('#form_delete_folder');
		
			var modal_delete_folder = $('.modal_delete_folder');
			var delete_input_path_folder = $('#delete_input_path_folder');
			var btn_delete_folder = $('.btn_delete_folder');
			var animate_btn_delete_folder = $('.animate_btn_delete_folder');
			
			btn_delete_folder.on('click', function(event) {
				event.preventDefault();
				disableBtnDeleteFolder();

				if (delete_input_path_folder.val().length > 0) {

					var _token = form_delete_folder.find("input[name='_token']").val();
					$.post(form_delete_folder.attr('action'), {
						_token: _token,
						path_folder: delete_input_path_folder.val()				

					}, function(data, textStatus, xhr) {
						// console.log(data);
					})
					.done(function(data){
						modal_delete_folder.modal('hide');

						var node = nodeSearch(data['file_name'], true);
						var get_parent = treev_file_manager.treeview('getParent', node[0]);
						
						if (get_parent['state']) {
							reloadTreeview(treev_file_manager, get_parent['text']);
						} else {
							reloadTreeview(treev_file_manager);
						}
					})
					.always(function(){
						enableBtnDeleteFolder();
					});

				} else {
					enableBtnDeleteFolder();
				}
			});

			function removeAllBox()
			{
				var file_box = $(".file-box");
					
				// REMOVENDO TODOS OS BOX
				file_box.hide('600', function(){
					file_box.remove();
				});
			}

			function disableBtnDeleteFolder()
			{
				btn_delete_folder.attr('disabled', 'true');
				animate_btn_delete_folder.removeClass('hide');
			}
			function enableBtnDeleteFolder()
			{
				setTimeout(function(){
					btn_delete_folder.removeAttr('disabled');
					animate_btn_delete_folder.addClass('hide');
				}, 1500);
			}
		// DELETE FOLDER

		// ADD NEW FOLDER
			var form_add_new_folder = $("#form_add_new_folder_to_folder")

			var modal_add_new_folder = $(".modal_add_new_folder");
			var new_folder_input_path_file = $("#new_folder_input_path_file");
			var name_input_new_folder = $("#name_input_new_folder");
			var btn_add_new_folder = $(".btn_add_new_folder");
			var animate_btn_add_new_folder = $(".animate_btn_add_new_folder");

			var refresh_file_manager = $("#refresh_file_manager");
			btn_add_new_folder.on('click', function(event) {
				event.preventDefault();
				disableBtnAddNewFolder();

				if (new_folder_input_path_file.val().length > 0 && name_input_new_folder.val().length > 0) {

					var _token = form_add_new_folder.find("input[name='_token']").val();
					$.post(form_add_new_folder.attr('action'), {
						_token: _token,
						path_folder: new_folder_input_path_file.val(),
						name_new_folder: name_input_new_folder.val()

					}, function(data, textStatus, xhr) {
						// console.log(data);
					})
					.fail(function(){

					})
					.done(function(data){
						modal_add_new_folder.modal('hide');

						var node = nodeSearch(data['path_folder'], true, 'data-path');
						reloadTreeview(treev_file_manager, node[0]['text']);
					})
					.always(function(){
						enableBtnAddNewFolder();
					});

				} else {
					enableBtnAddNewFolder();
				}
			});

			function disableBtnAddNewFolder()
			{
				btn_add_new_folder.attr('disabled', 'true');
				animate_btn_add_new_folder.removeClass('hide');
			}
			function enableBtnAddNewFolder()
			{
				setTimeout(function(){
					btn_add_new_folder.removeAttr('disabled');
					animate_btn_add_new_folder.addClass('hide');
				}, 1500);
			}
		// ADD NEW FOLDER

		// NEW FILE
			var modal_new_file = $(".modal_new_file_folder");
			var form_add_new_files = $("#form_admin_file_manager_add_new_files");

			var add_file_input_path_folder = modal_new_file.find('#add_file_input_path_folder');
			var b_destination_folder_the_file = modal_new_file.find('#b_destination_folder_the_file');
			var selected_files = modal_new_file.find("input[name='selected_files[]']");
			var btn_add_new_file_to_folder = modal_new_file.find('.btn_add_new_file_to_folder');
			var animate_btn_add_file = modal_new_file.find('.animate_btn_add_new_file_to_folder');

			modal_new_file.on('show.bs.modal', function(event) {
				selected_files.val('');
			});

			form_add_new_files.on('submit', function(event) {
				event.preventDefault();
				disableBtnNewFile();
				
				if (add_file_input_path_folder.val().length > 0 && selected_files.val().length > 0) {
					$.ajax({
						url: $(this).attr('action'),
						type: 'POST',
						data: new FormData(this),
						mimeType: 'multipart/form-data',
						dataType: 'JSON',
						contentType: false,
						cache: false,
						processData: false,
					})
					.done(function(data) {
						modal_new_file.modal('hide');
						
						var node = nodeSearch(data['path_folder'], true, 'data-path');
						unselectNode(node[0]);
						selectNode(node[0]);
					})
					.fail(function() {
						console.log("error");
					})
					.always(function(data) {
						// console.log(data);
						enableBtnNewFile();
					});
				} else {
					enableBtn();
				}
			});

			function disableBtnNewFile()
			{
				btn_add_new_file_to_folder.attr('disabled', 'true');
				animate_btn_add_file.removeClass('hide');
			}
			function enableBtnNewFile()
			{
				setTimeout(function(){
					btn_add_new_file_to_folder.removeAttr('disabled');
					animate_btn_add_file.addClass('hide');
				}, 1500);
			}
		// NEW FILE

		// DELETE FILE
			var form_delete_file = $("#form_delete_file");

			var modal_delete_file = $('.delete_file');
			var delete_input_path_file = $('#delete_input_path_file');
			var div_name_file = $('#div_name_file');
			var error_modal_delete = $('.error_modal_delete');
			var btn_delete_file = $('.btn_delete_file');
			var animate_btn_delete_file = $('.animate_btn_delete_file');


			btn_delete_file.on('click', function(event) {
				event.preventDefault();
				disableBtn();

				if (delete_input_path_file.val().length > 0) {
					var _token = form_delete_file.find("input[name='_token']").val();
					$.post(form_delete_file.attr('action'), {
						_token: _token,
						path_file: delete_input_path_file.val()

					}, function(data, textStatus, xhr) {
						// console.log(data);
					})
					.done(function(data){
						modal_delete_file.modal('hide');
						
						var node = nodeSearch(data['path_folder'], true, 'data-path');
						unselectNode(node[0]);
						selectNode(node[0]);
					})
					.always(function(){
						enableBtn();
					});
				} else {
					enableBtn();
				}
			});

			function disableBtn()
			{
				btn_delete_file.attr('disabled', 'true');
				animate_btn_delete_file.removeClass('hide');
			}
			function enableBtn()
			{
				setTimeout(function(){
					btn_delete_file.removeAttr('disabled');
					animate_btn_delete_file.addClass('hide');
				}, 1500);
			}
		// DELETE FILE

		// INPUT SEARCH FILES
			var form_get_all_files_in_the_folder = $("#form_get_all_files_in_the_folder");
			var list_folders = $("#list_folders");

			var input_search_files = $("#input_search_files");
			var title_selected_folder = $("#title_selected_folder");
			var ul_list_results_search_files = $(".ul_list_results_search_files");

			input_search_files.on('focus', function(event) {
				event.preventDefault();

				if (title_selected_folder.attr('data-path').length > 0) {

					var _token = form_get_all_files_in_the_folder.find("input[name='_token']").val();
					$.post(form_get_all_files_in_the_folder.attr('action'), {
						_token: _token,
						file_path: title_selected_folder.attr('data-path')

					}, function(files, textStatus, xhr) {
					})
					.done(function(files){

						input_search_files.off('input');
						input_search_files.on('input', function(event) {
							event.preventDefault();

							if (input_search_files.val().length > 0) {
								ul_list_results_search_files.css('display', 'block');
								ul_list_results_search_files.find('li').remove();

								var text_input_search = slug(input_search_files.val());

								$.each(files, function(index, file) {
									if (slug(file['basename']).indexOf(text_input_search) > -1) {
										ul_list_results_search_files.append(
											"<li role='presentation'>"+
												"<a data-path='"+file['path_file'].replace('/'+file['basename'], '')+"' style='padding: 3px 10px;' href='javascript:void(0)' role='menuitem'>"+
													"<i class='icon wb-reply' aria-hidden='true'></i>"+file['basename']+
												"</a>"+
											"</li>"
										);
									}
								});
								var list_a = ul_list_results_search_files.find('a');
								if (list_a.length == 0) {
									ul_list_results_search_files.append(
										"<li role='presentation' style='text-align: center;'>"+
											"Nenhum arquivo encontrado"+
										"</li>"
									);
								}

								clickARedirectFolder(list_a);
							} else {
								ul_list_results_search_files.css('display', 'none');
							}
						});
					});

				}
			});

			function slug(text)
			{
				text = text.toLowerCase();
				text = text.replace(new RegExp('[ÁÀÂÃ]','gi'), 'a');
				text = text.replace(new RegExp('[ÉÈÊ]','gi'), 'e');
				text = text.replace(new RegExp('[ÍÌÎ]','gi'), 'i');
				text = text.replace(new RegExp('[ÓÒÔÕ]','gi'), 'o');
				text = text.replace(new RegExp('[ÚÙÛ]','gi'), 'u');
				text = text.replace(new RegExp('[Ç]','gi'), 'c');

				return text;
			}

			function clickARedirectFolder(list_a)
			{
				$.each(list_a, function(index, a) {
					a = $(this);
					var path_file = a.attr('data-path');
					
					a.on('click', function(event) {
						event.preventDefault();
						var data_folder = a.attr('data-path');

						var node = nodeSearch(data_folder, true, 'data-path');
						unselectNode(node[0]);
						selectNode(node[0]);

						clearInputSearchAndListFiles();
					});
				});
			}

			function clearInputSearchAndListFiles()
			{
				input_search_files.val('');
				ul_list_results_search_files.css('display', 'none');
				ul_list_results_search_files.find('li').remove();
			}
		// INPUT SEARCH FILES

	}
});