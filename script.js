
// element argument can be a selector string
//   for an individual element
var elem = document.querySelector('.grid');
var iso = new Isotope( elem, {
	// options
	itemSelector: '.grid-item',
	masonry: {
	    columnWidth: 12
    }
});

// 
var input = document.querySelector("input[type=file]");
input.addEventListener('change', function(){
	console.log(this.files[0]);
	document.getElementById("file-name").value = this.files[0].name;
});

// initialize javascript
$(document).foundation();


// change image src inside modal after thumbs click
var imgs = document.querySelectorAll('a[data-open="modal"]');

imgs.forEach(function(el){

	el.addEventListener('click', function(){
		var src = this.dataset.img;
		var modal = document.getElementById("modal").children[0];
		modal.setAttribute("src", src);
	});
});
