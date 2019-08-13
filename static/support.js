(function ($) {
    $(document).ready(function(){
        $('.infos .donate,.infos .share').unbind("click").click(function(){
            if($(this).attr('class')=='donate'){
                $('.infos').removeClass('share-close');
                $('.infos').toggleClass('donate-close');
            } else {
                $('.infos').removeClass('donate-close');
                $('.infos').toggleClass('share-close');
                if($(this).find('img').length == 0){
                    $(this).append('<div class="qrcode"><img src="' + $(this).find('a').data('qrcode') + '" /> <i>移动设备上继续阅读</i></div>');
                }
            }
        });
    });
    
    $(".dot-good").click(function () {
        if ($(this).hasClass('done')) {
            alert('点多了伤身体~');
            return false;
        } else {
            $(this).addClass('done');
            var id = $(this).data("id"),
                action = $(this).data('action'),
                rateHolder = $(this).children('.count');
            var ajax_data = {
                action: "dotGood",
                um_id: id,
                um_action: action
            };
            $.post(themeAdminAjax.url, ajax_data,function (data) {
                $(rateHolder).html(data);
            });
            return false;
        }
    });
})(jQuery);