<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="footer">
	<section class="container">
        <span id="hitokoto">少女祈祷中......</span>
        <p>
            <span class='left'>&copy; <?php echo date('Y'); ?>
                <a href="<?php echo $this->options->SiteUrl(); ?>"><?php echo $this->options->title(); ?></a>
            <span class='right'>Theme by <a href="https://biji.io" target="_blank">Adams</a></span>
        </p>
	</section>
</footer>

<script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script> 

<div class="setting_tool iconfont">
    <a class="back2top" style="display:none;"><i class="czs-arrow-up-l"></i></a>
    <a class="sosearch"><i class="czs-search-l"></i></a>
    <a class="socolor"><i class="czs-clothes-l"></i></a>
    <div class="s">
		<form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search" class="search">
		    <input class="search-key text" id="s" name="s" autocomplete="off" placeholder="输入关键词..." type="text" value="" required="required">
		</form>
    </div>
    <div class="c">
        <ul>
            <li class="color undefined">默认</li>
            <li class="color sepia">护眼</li>
            <li class="color night">夜晚</li>
            <li class="hr"></li>
            <li class="font serif">Serif</li>
            <li class="font sans">Sans</li>
        </ul>
    </div>
</div>
<script data-no-instant>
    document.addEventListener('DOMContentLoaded', () => {
        pangu.autoSpacingPage();
    });
    (function ($) {
        $.extend({
            adamsOverload: function () {
                $('.navigation:eq(0)').remove();
                $(".post_article a").attr("rel" , "external");
                $("a[rel='external']:not([href^='#']),a[rel='external nofollow']:not([href^='#'])").attr("target","_blank");
                $("a.vi,.gallery a,.attachment a").attr("rel" , "");
                $.viewImage({
                    'target'  : '.gallery a,.gallery img,.attachment a,.post_article img,.post_article a,a.vi',
                    'exclude' : '.readerswall img,.gallery a img,.attachment a img',
                    'delay'   : 300
                });
                $.lately({
                    'target' : '.commentmetadata a,.infos time,.post-list time'
                });
                prettyPrint();
                
                $('ul.links li a').each(function(){
                    if($(this).parent().find('.bg').length==0){
                        $(this).parent().append('<div class="bg" style="background-image:url(https://www.google.com/s2/favicons?domain='+$(this).attr("href")+')"></div>')
                    }
                });
            }
        });
    })(jQuery);
    InstantClick.on('change', function(isInitialLoad) {
        jQuery.adamsOverload();
        if (isInitialLoad === false) {
            // support MathJax
            if (typeof MathJax !== 'undefined') MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
            // support google code prettify
            if (typeof prettyPrint !== 'undefined') prettyPrint();
            // support 百度统计
            if (typeof _hmt !== 'undefined') _hmt.push(['_trackPageview', location.pathname + location.search]);
            // support google analytics
            if (typeof ga !== 'undefined') ga('send', 'pageview', location.pathname + location.search);
        }
    });
    InstantClick.on('wait', function() {
        // pjax href click
    });
    InstantClick.on('fetch', function() {
        // pjax begin
    });
    InstantClick.on('receive', function() {
        // pjax end
    });
    InstantClick.init('mousedown');
    jQuery.adamsOverload();

</script>
</body>
</html>