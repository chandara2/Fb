// Back to top
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 1);
        return false;
    });
});

// Datatable
$(document).ready(function() {
    $('.customdatatable').DataTable({
        // "pageLength": 5,
    });
});

// textarea box auto resize
autosize(document.getElementsByClassName("textarea_autosize"));

//Summernote
$('.summernote').summernote();