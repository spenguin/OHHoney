(function($) {
    $(document).ready(function(){
        $('.shop--filter__button a').click(function(event){
            event.preventDefault();
            var menu = $('.shop--filter__wrapper');

            if( menu.hasClass('hide') ) 
            {
                menu.removeClass('hide');
            } else {
                menu.addClass('hide');
            }
        })        
    });
}(jQuery));