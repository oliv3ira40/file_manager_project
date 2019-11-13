$(function() {
	
	var form_admin_group_edit = $("#form_admin_group_edit");
	var tbody_list_groups = $("#tbody_list_groups").find('tr');
	var tittle_name_group = $(".tittle_name_group");
	var select_edit_group = $(".select_edit_group");

	if (tbody_list_groups.length > 0) {
		
		tbody_list_groups.each(function(index, td) {
			var td = $(this);
			var btn_edit_group = td.find(".btn_edit_group");
			var btn_delete_group = td.find(".btn_delete_group");
			
			var id_group_td = td.find(".id_group_td");
			var name_group_td = td.find(".name_group_td");
	
			var group_id_input = $(".group_id_input");
			var name_group_input = $("#name_group_input");
	
	
			// EDITANDO GRUPO
			btn_edit_group.on('click', function(event) {
	
				if (select_edit_group.find('option').length > 0) {
					select_edit_group.find('option').remove();
				};
	
				tittle_name_group.text(name_group_td.text());			
				group_id_input.val(id_group_td.text());
				name_group_input.val(name_group_td.text());
	
				// var _token = form_admin_group_edit.find("input[name='_token']").val();
				$.getJSON(form_admin_group_edit.attr('action'), {
					id: id_group_td.text()
	
				}, function(json, textStatus) {
					$.each(json, function(index, option) {
						if (option['select'] == 1) {
							select_edit_group.append('<option selected value="'+option['id']+'">'+option['name']+'</option>');
						} else {
							select_edit_group.append('<option value="'+option['id']+'">'+option['name']+'</option>');
						};
					});
	
					$('#public-methods').multiSelect('refresh');
				});
			});
			// EDITANDO GRUPO
	
			// EXCLUINDO GRUPO	
			btn_delete_group.on('click', function(event) {
				tittle_name_group.text(name_group_td.text());			
				group_id_input.val(id_group_td.text());
			});
			// EXCLUINDO GRUPO	
		});
	}


});

// <option value="elem_2">elem 2</option>