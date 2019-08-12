<?php

/* 初始化 */
/**
 * 主题启用时执行的方法
 */
function themeInit() {
	$db = Typecho_Db::get();
    /* 设置评论最大嵌套层数 */
    $query = $db->update('table.options')->rows(array('value'=>'999'))->where('name=?', 'commentsMaxNestingLevels');
    $db->query($query);
    /* 强制新评论在前 */
    $query = $db->update('table.options')->rows(array('value'=>'DESC'))->where('name=?', 'commentsOrder');
    $db->query($query);
    /* 默认显示第一页评论 */
    $query = $db->update('table.options')->rows(array('value'=>'first'))->where('name=?', 'commentsPageDisplay');
    $db->query($query);
}
/**
 * 主题后台设置
 */
function themeConfig($form) {
	$github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('GitHub 主页地址'), _t('你 GitHub 个人主页的链接地址'));
    $form->addInput($github);
	$weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, NULL, _t('微博主页地址'), _t('你新浪微博个人主页的链接地址'));
    $form->addInput($weibo);
	$description = new Typecho_Widget_Helper_Form_Element_Text('description', NULL, NULL, _t('站点介绍'), _t('写入站点介绍或者公告，会显示在 header 部分'));
    $form->addInput($description);
	$alipay_img = new Typecho_Widget_Helper_Form_Element_Text('alipay_img', NULL, NULL, _t('支付宝付款码'), _t('填入你支付宝付款二维码的 url 地址，用作别人打赏的途径'));
    $form->addInput($alipay_img);
	$wechat_img = new Typecho_Widget_Helper_Form_Element_Text('wechat_img', NULL, NULL, _t('微信付款码'), _t('填入你微信付款二维码的 url 地址，用作别人打赏的途径'));
    $form->addInput($wechat_img);
}
/**
 * 文章与独立页自定义字段
 */
function themeFields(Typecho_Widget_Helper_Layout $layout) {
	$banner = new Typecho_Widget_Helper_Form_Element_Text('banner', NULL, NULL,_t('文章头图'), _t('输入一个图片 url，作为缩略图显示在文章列表，没有则不显示'));
    $layout->addItem($banner);
}

/* 工具 */
/**
 * 输出 title
 */
function title(Widget_Archive $archive)
{
    $archive->archiveTitle(array(
        'category'  =>  '分类 %s 下的文章',
        'search'    =>  '包含关键字 %s 的文章',
        'tag'       =>  '标签 %s 下的文章',
        'author'    =>  '%s 发布的文章'
    ), '', ' | ');
    Helper::options()->title();
}
