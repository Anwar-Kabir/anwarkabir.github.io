jQuery(document).ready(function($) {

    // Responsive Menu
    $('.menu-toggle').click(function() {
        $(this).toggleClass('active');
        $(this).parent().toggleClass('navigation-active');
        $(this).parent().find('.nav-menu').slideToggle();
    });

    $('.dropdown-toggle').click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    if( $(window).width() < 1024 ) {
        $('#site-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
            if( !e.shiftKey && e.which === 9 ) {
                e.preventDefault();
                $('.site-header').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $('#site-navigation .nav-menu').find("li").unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $('#site-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
                if( !e.shiftKey && e.which === 9 ) {
                    e.preventDefault();
                    $('.site-header').find('.menu-toggle').focus();
                }
            });
        }
        else {
            $('#site-navigation .nav-menu').find("li").unbind('keydown');
        }
    });

    $('.menu-toggle').on('keydown', function (e) {
        var tabKey    = e.keyCode === 9;
        var shiftKey  = e.shiftKey;

        if( $('.menu-toggle').hasClass('active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                $('#site-navigation .nav-menu').find("li:last-child > a").focus();
                $('#site-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
                    if( !e.shiftKey && e.which === 9 ) {
                        e.preventDefault();
                        $('.site-header').find('.menu-toggle').focus();
                    }
                });
            };
        }
    });

    // Scroll To Top 
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.to-top').css({bottom:"25px"});
        } 
        else {
            $('.to-top').css({bottom:"-100px"});
        }
    });

    $('.to-top').click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });
});