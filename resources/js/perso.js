jQuery(document).ready(function($) {
    $('#reference_offre').on('change', function() {
        console.log($(this).val());
        $('#reference_offre').val($('.date_em').val().replace(/-/g, '') + '-' + $('#articles-fonction').val());
    });

    $('#articles-fonction').on('change', function() {
        console.log($(this).val());
    });

    $('.ckeditor').ckeditor();
});