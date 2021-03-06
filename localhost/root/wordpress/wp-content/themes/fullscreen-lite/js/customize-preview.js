( function( $ ) {
    /* ==============================
        Site Title and Description
    ============================== */
    wp.customize('blogname',function( value ) {
        value.bind(function(newvalue) {
            $('#site-title a').html(newvalue);
        });
    });
    wp.customize('blogdescription',function( value ) {
        value.bind(function(newvalue) {
            $('#site-description').html(newvalue);
        });
    });

    /* ==============================
        Footer Copyright Section
    ============================== */
    wp.customize('fullscreen_lite_copyright',function( value ) {
        value.bind(function(newvalue) {
            $('#footer .copyright').html(newvalue);
        });
    });

 } )( jQuery )