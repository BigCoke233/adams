<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php $this->options->themeUrl('style/style.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php $this->options->themeUrl('static/caomei1.2.8/style.css'); ?>" type="text/css" rel="stylesheet">
	<link href="<?php $this->options->themeUrl('style/wpBlockLib.css'); ?>" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:300|Noto+Serif+SC:300&display=swap" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script type='text/javascript' src="<?php $this->options->themeUrl('static/script.js'); ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js" integrity="sha256-9I2FxupwHkF6hXzZKS3hLCwP95XFukX3EnxRzGqXzz0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/instantclick/3.1.0/instantclick.min.js" integrity="sha256-T8RTGotskdhLXy/3avHtzYliRm9WCbiiqm5dbCVH87s=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/pangu@4.0.7/dist/browser/pangu.min.js"></script>
    <title><?php title($this); ?></title>
    <?php $this->header(); ?>

    <script>
        if(localStorage.adams_color_style) $('head').append("<style class='diy-color-style'>" + localStorage.adams_color_style + "</style>");
        if(localStorage.adams_font_style) $('head').append("<style class='diy-font-style'>" + localStorage.adams_font_style + "</style>");
    </script>
</head>
<body>
<!-- Header -->
<header class="header">
    <section class="container">
        <hgroup itemscope itemtype="https://schema.org/WPHeader">
            <h1 class="fullname">
			  <?php
			    if($this->is('single')){
					echo $this->title();
				}elseif($this->is('arvhie')){
					echo $this->archiveTitle(array(
                      'category'  =>  '分类 %s 下的文章',
                      'search'    =>  '包含关键字 %s 的文章',
                      'tag'       =>  '标签 %s 下的文章',
                      'author'    =>  '%s 发布的文章'
                    ), '', '');
				}else{
					echo $this->options->title();
				}
			  ?>
			</h1>
        </hgroup>
		<nav class="social">
		  <ul id="menu-socialx" class="menu">
		    <li id="menu-item-4831" class="czs-rss menu-item menu-item-type-custom menu-item-object-custom"><a title="RSS" target="_blank" href="<?php $this->options->feedUrl(); ?>">RSS</a></li>
            <li id="menu-item-4832" class="czs-github-logo menu-item menu-item-type-custom menu-item-object-custom"><a title="GitHub" target="_blank" href="<?php $this->options->github(); ?>">GitHub</a></li>
            <li id="menu-item-4834" class="czs-weibo menu-item menu-item-type-custom menu-item-object-custom"><a target="_blank" href="<?php $this->options->weibo(); ?>">WeiBo</a></li>
          </ul>
		</nav>
        <nav class="header_nav">
		  <ul id="menu-header" class="menu">
		    <li id="menu-item-4759" class="menu-item menu-item-type-custom menu-item-object-custom <?php if($this->is('index')): ?>current-menu-item current_page_item <?php endif; ?>menu-item-4759"><a href="<?php $this->options->SiteUrl(); ?>" aria-current="page">首页</a></li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
          </ul>
		</nav>    
    </section>
	<section class="infos">
        <div class="container">
        <?php if($this->is('single')) { ?>
            <h2 class="fixed-title"></h2>
            <!--<div class="fixed-menus"></div>-->
            <div class="fields">
                <span><i class="czs-time-l"></i> <?php $this->date('Y-m-d'); ?></span> / 
                <span><i class="czs-talk-l"></i> <?php $this->commentsNum('无评论', '1 条', '%d 条'); ?></span>
            </div>
            
            <div class="socials">
                <div class="donate">
                    <a href="javascript:;"><i class="czs-coin-l s"></i><i class="czs-coin h"></i> 赏</a>
                    <div class="window">
                        <ul>
                            <li class="alipay"><img src="<?php $this->options->alipay_img(); ?>"/></li>
                            <li><img src="<?php $this->options->wechat_img(); ?>"/></li>
                        </ul>
                    </div>
                </div>
                <div class="share">
                    <a href="javascript:;" data-qrcode="//api.qrserver.com/v1/create-qr-code/?size=150x150&margin=10&data=<?php $this->permalink(); ?>"><i class="czs-scan-l s"></i><i class="czs-qrcode-l h"></i> 码</a>
                </div>
            </div>
        <?php } else {?>
            <h2 class="fixed-title"></h2>
            <div class="fixed-menus"></div>
            <div class="placard">
                <?php $this->options->description(); ?>
            </div>
        <?php } ?>
        </div>
    </section>
</header>