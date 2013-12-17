define(['jquery'], function () {

    $('#link1').on('click', function(e) {
        $('#link2').next().hide();
        $('#link3').next().hide();
        $('#link4').next().hide();
        $('#link5').next().hide();
        $('#link6').next().hide();
        $(this).next().slideToggle('normal');

        e.preventDefault();
    });

    $('#link2').on('click', function(e) {
    	$('#link1').next().hide();
        $('#link3').next().hide();
        $('#link4').next().hide();
        $('#link5').next().hide();
        $('#link6').next().hide();
        $(this).next().slideToggle('normal');

        e.preventDefault();
    });

    $('#link3').on('click', function(e) {
    	$('#link1').next().hide();
        $('#link2').next().hide();
        $('#link4').next().hide();
        $('#link5').next().hide();
        $('#link6').next().hide();
        $(this).next().slideToggle('normal');

        e.preventDefault();
    });

    $('#link4').on('click', function(e) {
    	$('#link1').next().hide();
        $('#link2').next().hide();
        $('#link3').next().hide();
        $('#link5').next().hide();
        $('#link6').next().hide();
        $(this).next().slideToggle('normal');

        e.preventDefault();
    });

    $('#link5').on('click', function(e) {
    	$('#link1').next().hide();
        $('#link2').next().hide();
        $('#link3').next().hide();
        $('#link4').next().hide();
        $('#link6').next().hide();
        $(this).next().slideToggle('normal');

        e.preventDefault();
    });

    $('#link6').on('click', function(e) {
    	$('#link1').next().hide();
        $('#link2').next().hide();
        $('#link3').next().hide();
        $('#link4').next().hide();
        $('#link5').next().hide();
        $(this).next().slideToggle('normal');

        e.preventDefault();
    });

});