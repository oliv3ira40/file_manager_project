$(function(){
	
	var loadingTask = pdfjsLib.getDocument('pagina.pdf');
	loadingTask.promise.then(function(pdf) {
		console.log(pdf)
		pdf.getPage(1).then(function(page) {
			// you can now use *page* here
			console.log(page);
			
			var scale = 1.5;
			var viewport = page.getViewport({ scale: scale, });

			var canvas = document.getElementById('the-canvas'); //viewer
			console.log(canvas);
			var context = canvas.getContext('2d');
			canvas.height = viewport.height;
			canvas.width = viewport.width;

			var renderContext = {
			  canvasContext: context,
			  viewport: viewport
			};
			page.render(renderContext);
		});
	});







	// var desiredWidth = 100;
	// var viewport = page.getViewport({ scale: 1, });
	// var scale = desiredWidth / viewport.width;
	// var scaledViewport = page.getViewport({ scale: scale, });



});