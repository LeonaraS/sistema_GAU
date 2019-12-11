$(document).ready(function () 
{
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