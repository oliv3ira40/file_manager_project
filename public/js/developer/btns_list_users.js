$(function() {
	var form_user_editMyGroup = $("#form_user_editMyGroup");

	var tbody_list_users = $("#tbody_list_users").find('tr');
	var name_user_title = $(".name_user_title");
	var id_user_input = $(".id_user_input");

	var first_name_user_input = $("#first_name_user_input");
	var last_name_user_input = $("#last_name_user_input");
	var email_user_input = $("#email_user_input");
	var login_user_input = $("#login_user_input");
	var cpf_user_input = $("#cpf_user_input");
	var password_user_input = $("#password_user_input");
	var select_groups = $("#select_groups");

	if (tbody_list_users.length > 0) {
		
		tbody_list_users.each(function(index, td) {
			var td = $(this);
			var btn_edit_user = td.find('.btn_edit_user');
			var btn_delete_user = td.find('.btn_delete_user');
	
			var id_user_td = td.find('.id_user_td');
			var cpf_user_td = td.find('.cpf_user_td');
			var first_name_user_p = td.find('.first_name_user_p');
			var last_name_user_p = td.find('.last_name_user_p');
			var email_user_td = td.find('.email_user_td');
			var login_user_td = td.find('.login_user_td');
			var group_user_td = td.find('.group_user_td');
			var complet_name_user_td = td.find('.complet_name_user_td');
	
	
			// EDITANDO USUÁRIO
			btn_edit_user.on('click', function(event) {
	
				// PREECHENDO SELECT DE GRUPOS DE ACORDO COM GRUPO DO USUÁRIO
				$.get(form_user_editMyGroup.attr('action'), function(data) {
					select_groups.find('option').remove();
	
					$.each(data, function(index, group) {
						if (group_user_td.text() == group['name']) {
							select_groups.append('<option selected value="'+group['id']+'">'+group['name']+'</option>')
						} else {
							select_groups.append('<option value="'+group['id']+'">'+group['name']+'</option>')
						}
					});
				});
	
	
				id_user_input.val(id_user_td.text());
				name_user_title.text(complet_name_user_td.text());
	
				first_name_user_input.val(first_name_user_p.text());
				last_name_user_input.val(last_name_user_p.text());
				email_user_input.val(email_user_td.text());
				login_user_input.val(login_user_td.text());
				cpf_user_input.val(cpf_user_td.text());
			});
			// EDITANDO USUÁRIO
	
	
			// EXCLUINDO USUÁRIO
			btn_delete_user.on('click', function(event) {
				id_user_input.val(id_user_td.text());
				name_user_title.text(complet_name_user_td.text());
			});
			// EXCLUINDO USUÁRIO
		});
	}
});