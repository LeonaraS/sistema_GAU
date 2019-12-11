$(document).ready(function() {
    //Apresentar ou ocultar o menu
    $('.sidebar-toggle').on('click', function() {
        $('.sidebar').toggleClass('toggled');
    });

    //carregar aberto o submenu
    var active = $('.sidebar .active');
    if (active.length && active.parent('.collapse').length) {
        var parent = active.parent('.collapse');

        parent.prev('a').attr('aria-expanded', true);
        parent.addClass('show');
    }

    /* ################  Menu Fixo ############
    Ao rollar a página e a atingir um certo tamanho, o menu principal fica fixo. */
    var nav = $('.nav-menu-fixo');

    $(window).scroll(function () {

        if ($(this).scrollTop() > 0) 
        {
            nav.addClass("fixed-top");
            nav.removeClass("blog-nav");
            nav.addClass("menu"); 
           
        }
        else 
        {
            nav.removeClass("menu");
            nav.addClass("blog-nav");
        }
    });

    
});