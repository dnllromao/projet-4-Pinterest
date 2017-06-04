
// initialize foundation javascript
$(document).foundation();

// change image src inside modal on thumbs click
(function() {
	var imgs = document.querySelectorAll('a[data-open="modal"]');

	imgs.forEach(function(el){

		el.addEventListener('click', function(){
			var src = this.dataset.img;
			console.log(src);
			var modal = document.getElementById("modal").children[0];
			modal.setAttribute("src", src);
		});
	});
})();


// set up isotope
(function () {
	var elem = document.querySelector('.grid');
	var iso = new Isotope( elem, {
		// options
		itemSelector: '.grid-item',
		masonry: {
		    columnWidth: 12
	    }
	});
})();


// show select file in input-group
(function() {
	var input = document.querySelector("input[type=file]");
	input.addEventListener('change', function(){
		console.log(this.files[0]);
		document.getElementById("file-name").value = this.files[0].name;
	});
})();








