/*FileUpload Init*/
$(document).ready(function() {
	"use strict";
	
	/* Basic Init*/
	$('.dropify').dropify({
		messages: {
	        'default': 'Arraste e solte um arquivo aqui ou clique aqui',
	        'replace': 'Arraste e solte ou clique para substituir',
	        'remove':  'Remover imagem',
	        'error':   'Oops, algo de errado aconteceu.'
	    },
	    error: {
	        'fileSize': 'The file size is too big ({{ value }} max).',
	        'minWidth': 'The image width is too small ({{ value }}}px min).',
	        'maxWidth': 'The image width is too big ({{ value }}}px max).',
	        'minHeight': 'The image height is too small ({{ value }}}px min).',
	        'maxHeight': 'The image height is too big ({{ value }}px max).',
	        'imageFormat': 'The image format is not allowed ({{ value }} only).'
	    }
	});

	/* Translated Init*/
	$('.dropify-fr').dropify({
		messages: {
			default: 'Glissez-déposez un fichier ici ou cliquez',
			replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
			remove:  'Supprimer',
			error:   'Désolé, le fichier trop volumineux'
		}
	});

	/* Used events */
	// 
	var drEvent = $('#input-file-events').dropify();

	drEvent.on('dropify.beforeClear', function(event, element){
		return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
	});

	drEvent.on('dropify.afterClear', function(event, element){
		alert('File deleted');
	});

	drEvent.on('dropify.errors', function(event, element){
		console.log('Has Errors');
	});

	var drDestroy = $('#input-file-to-destroy').dropify();
	drDestroy = drDestroy.data('dropify')
	$('#toggleDropify').on('click', function(e){
		e.preventDefault();
		if (drDestroy.isDropified()) {
			drDestroy.destroy();
		} else {
			drDestroy.init();
		}
	});

});