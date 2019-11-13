/*Form advanced Init*/
$(document).ready(function() {
"use strict";

/* Select2 Init*/
$(".select2").select2();

/* Bootstrap Select Init*/
$('.selectpicker').selectpicker({
	noneSelectedText: 'Nenhum selecionado',
});

// function ClickSelectAll()
// {
// 	$('.select_all').on('click', function(event) {
// 		if ($(this).attr('class').indexOf("active") == -1) {
// 			console.log('asd');

// 			$('.selectpicker').selectpicker('selectAll');
// 			$(this).addClass('active');
// 		} else {

// 			$('.selectpicker').selectpicker('deselectAll');
// 			$('.selectpicker').val('default');
// 			$('.selectpicker').selectpicker('refresh');
// 			$(this).removeClass('active');

// 			ClickSelectAll();			
// 		}
// 	});
// }
// ClickSelectAll();

/* Switchery Init*/
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
$('.js-switch-1').each(function() {
	new Switchery($(this)[0], $(this).data());
});

/* Bootstrap-TouchSpin Init*/
$(".vertical-spin").TouchSpin({
	verticalbuttons: true,
	max: 999,
	verticalupclass: 'ti-plus',
	verticaldownclass: 'ti-minus'
});
var vspinTrue = $(".vertical-spin").TouchSpin({
	verticalbuttons: true
});
if (vspinTrue) {
	$('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
}

$(".tch1").TouchSpin({
	min: 0,
	max: 100,
	step: 0.1,
	decimals: 2,
	boostat: 5,
	maxboostedstep: 10,
	postfix: '%'
});
$(".tch2").TouchSpin({
	min: -1000000000,
	max: 1000000000,
	stepinterval: 50,
	maxboostedstep: 10000000,
	prefix: '$'
});
$(".tch3").TouchSpin();

$(".tch3_22").TouchSpin({
	min: 1,
	max: 200,
	initval: 40,
});

$(".tch5").TouchSpin({
	prefix: "pre",
	postfix: "post"
});

/* Multiselect Init*/
$('#pre-selected-options').multiSelect();      
$('#optgroup').multiSelect({ selectableOptgroup: true });
$('#public-methods').multiSelect({
	selectableHeader: "<input type='text' class='mb-10 form-control search-input' autocomplete='off' placeholder='Buscar...'>",
    selectionHeader: "<input type='text' class='mb-10 form-control search-input' autocomplete='off' placeholder='Buscar...'>",
});
$('#select-all').click(function(){
$('#public-methods').multiSelect('select_all');
return false;
});
$('#deselect-all').click(function(){
$('#public-methods').multiSelect('deselect_all');
return false;
});
$('#refresh').on('click', function(){
$('#public-methods').multiSelect('refresh');
return false;
});
$('#add-option').on('click', function(){
$('#public-methods').multiSelect('addOption', { value: 42, text: 'test 42', index: 0 });
return false;
});

/* Bootstrap switch Init*/
$('.bs-switch').bootstrapSwitch('state', true);
$('#check_box_value').text($("#check_box_switch").bootstrapSwitch('state'));

$('#check_box_switch').on('switchChange.bootstrapSwitch', function () {

	$("#check_box_value").text($('#check_box_switch').bootstrapSwitch('state'));
});

});