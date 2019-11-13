$(function() {

	var tbody_list_permissions = $(".tbody_list_permissions").find('tr');
	
	if (tbody_list_permissions.length > 0) {
			var tittle_name_permission = $(".tittle_name_permission");
			var permission_id_input = $(".permission_id_input");
			var name_permission_input = $(".name_permission_input");
			var route_permission_input = $(".route_permission_input");
		
			tbody_list_permissions.each(function(index, td) {
				var td = $(this);
				var btn_edit_permission = td.find('.btn_edit_permission');
				var btn_delete_permission = td.find('.btn_delete_permission');
		
				var id_permission_td = td.find('.id_permission_td');
				var name_permission_td = td.find('.name_permission_td');
				var route_permission_td = td.find('.route_permission_td');
		
				// EDITANDO PERMISSÃO
				btn_edit_permission.on('click', function(event) {
		
					tittle_name_permission.text(name_permission_td.text());
					permission_id_input.val(id_permission_td.text());
					name_permission_input.val(name_permission_td.text());
					route_permission_input.val(route_permission_td.text());
				});
				// EDITANDO PERMISSÃO
			
		
				// EXCLUINDO PERMISSÃO
				btn_delete_permission.on('click', function(event) {
					tittle_name_permission.text(name_permission_td.text());
					permission_id_input.val(id_permission_td.text());
				});
				// EXCLUINDO PERMISSÃO
			});
		
	}
});