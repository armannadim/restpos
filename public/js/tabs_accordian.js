$(document).ready(function() {

    $('#accordion2').collapse({
        toggle: false
    })

    $('#tab-01 a').click(function(e) {
        e.preventDefault();
        localStorage.setItem('lastTab', $(e.target).attr('href'));
        $(this).tab('show');
    });
//go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');

    if (lastTab) {
        $('a[href="' + lastTab + '"]').click();
    }

    $('#tab-2 a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#tab-2 li:eq(1) a').tab('show');

    $('#tab-3 a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#tab-3 li:eq(2) a').tab('show');

    $('#tab-4 a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('#tab-5 a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
});