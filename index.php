<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
/**
 * Theme Adams | 一款移植自 Wordpress 的简洁主题
 * 
 * @package Adams
 * @author  Eltrac
 * @version 1.0.0
 * @link    https://guhub.cn
 */
$this->need('header.php');
?>
    <!-- Post List -->
    <section class="posts main-load">
        <div class="container">
            <div class="post-list">
                <?php if ($this->have()): ?>
				<?php while($this->next()): ?>
                <article class="meta" itemscope="" itemtype="http://schema.org/BlogPosting">
                    <header>
                        <a href="<?php $this->permalink(); ?>" itemprop="url"><h2 itemprop="name headline"><?php $this->title(); ?></h2></a>
                    </header>
                    <main>
                        <?php if($this->fields->banner && $this->fields->banner!=''){ ?>
                            <a href="<?php $this->permalink(); ?>" class="thumb" style="background-image: url('<?php $this->fields->banner(); ?>');"></a>
                        <?php };?>
                        <p itemprop="articleBody">
                            <?php $this->excerpt(200); ?>
                        </p>
                    </main>
                    <footer>
                        <span class="time"><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished" pubdate><?php $this->date('Y-m-d'); ?></time>发布</span>
                        <span class="hr"></span>
                        <span class="comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?> 条评论</span>
                    </footer>
                </article>
                <?php endwhile; else: ?>
                <article class="meta">
                    <h3 style="font-size: 3em;margin: 0 0 20px;color: #000;">Sorry!</h3>
                    <p>这个页面没有你要找的内容。</p>
                </article>
            <?php endif; ?>
                <nav class="reade_more">
                    <?php $this->pageNav('«', '»'); ?>
                </nav>
            </div>
        </div>
    </section>
<?php $this->need('footer.php'); ?>