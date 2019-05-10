if($(window) >= 992) {
	$("#mobileNavbar").slideUp();
}

$("#mobileToggler").click(function() {
	$("#mobileNavbar").slideToggle();
});

$(".dropdownToggler").click(function() {
	$(".mobileDropdown").slideToggle();
});