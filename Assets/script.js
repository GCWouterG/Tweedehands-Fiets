if($(window) >= 992) {
	$("#mobileNavbar").slideUp();
}

$("#mobileToggler").click(function() {
	$("#mobileNavbar").slideToggle("linear");
});

$(".dropdownToggler").click(function() {
	$(".mobileDropdown").slideToggle("linear");
});

$(document).on('input', '#ratingSlider', function() {
    $('#ratingLiveScore').html(Math.round($(this).val() * 10) / 10);
});