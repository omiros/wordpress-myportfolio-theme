jQuery(document).ready(function($) {
    // Inside of this function, $() will work as an alias for jQuery()
    // and other libraries also using $ will not be accessible under this shortcut
    $( ".nav-toggle" ).click(function() {

    	$(document).foundation();
		$(this).toggleClass("open");
		$("nav").fadeToggle(100);

		return false;
		});
});
