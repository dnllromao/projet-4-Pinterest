
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
	document.querySelector("input[type=text]").value = this.files[0].name;
});

// initialize javascript
$(document).foundation();

var imgs = document.querySelectorAll('a[data-open="modal"]');
//console.log(imgs);
imgs.forEach(function(el){

	el.addEventListener('click', function(){
		console.log(this);
		var src = this.children[0].getAttribute('src');
		console.log(src);
		var modal = document.getElementById("modal").children[0];
		modal.setAttribute("src", src);
		console.log(modal);
	});
});
