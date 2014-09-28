<?php

/**
 * @overview 未找到指定页面
 * @author Meathill <lujia.zhai@dianjoy.com>
 * @since 1.0
 */
get_header(); ?>

  <div id="primary" class="site-content">
    <div id="content" role="main">

      <article id="post-0" class="post error404 no-results not-found">
        <header class="entry-header">
          <h1 class="entry-title">查无此页</h1>
        </header>

        <div class="entry-content">
          <p>您访问的地址似乎有误，没有页面，试试搜索下吧。</p>
          <?php get_search_form(); ?>
          <script type="text/javascript" src="http://www.qq.com/404/search_children.js" charset="utf-8"></script>
        </div><!-- .entry-content -->
      </article><!-- #post-0 -->

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_footer(); ?>
