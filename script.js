
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
