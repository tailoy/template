$(function() {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
    });

    $('#btn-menu').on('click', function() {
       // $("#nav-all").toggleClass('active');
    });
});