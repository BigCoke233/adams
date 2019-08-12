    <!-- Content -->
    <section class="container main-load">
        <article class="post_article" itemscope itemtype="https://schema.org/Article">
        <?php $this->content(); ?>
        </article>
        
        <nav class="nearbypost">
            <div class="alignleft"><?php $this->thePrev('%s','没有了'); ?></div>
            <div class="alignright"><?php $this->theNext('%s','没有了'); ?></div>
        </nav>
    </section>