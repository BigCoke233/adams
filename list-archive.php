<?php
/**
 * 归档页面
 *
 * @package custom
 */
$this->need('header.php'); ?>
<section class="section content main-load">
    <div class="container">
        <article class="post_article archives" itemscope itemtype="https://schema.org/Article">
            <?php
            $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
            $year=0; $mon=0; $i=0; $j=0;   
            $output = '';   
            while($archives->next()):   
                $year_tmp = date('Y',$archives->created);   
                $mon_tmp = date('m',$archives->created);   
                $y=$year; $m=$mon;   
                if ($year != $year_tmp && $year > 0) $output .= '</div>';   
                if ($year != $year_tmp) {   
                    $year = $year_tmp;   
                    $output .= '<table><h3 class="al_year">'. $year .' 年</h3><div class="al_posts">'; //输出年份   
                }   
                $output .= '<tr>
                    <td width="80" style="text-align:right;">'.date('m-d',$archives->created).'</td>
                    <td><a href="'.$archives->permalink.'">'.$archives->title.' - '.$archives->commentsNum.'</a></td>
                </tr>'; 
            endwhile;   
            $output .= '</div></table>';
            echo $output;
            ?>
    </div>
</section>
<?php $this->need('footer.php'); ?>