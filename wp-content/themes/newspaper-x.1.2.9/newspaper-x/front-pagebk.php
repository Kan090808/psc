<?php

/**
 * The template for displaying Front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Newspaper_x
 */

get_header();
$show_on_front = get_option('show_on_front');
if ($show_on_front == 'posts') :
  $banner_count = get_theme_mod('newspaper_x_show_banner_after', 6);
$banner = get_theme_mod('newspaper_x_banner_type', 'image');

?>
    <div class="row">
        <div id="primary" class="newspaper-x-content newspaper-x-archive-page col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <main id="main" class="site-main margin-top" role="main">
				<?php
    $banner_count_index = 0;
    if (have_posts()) :
    ?>
                    <div class="row">
						<?php
      while (have_posts()) : the_post();

      if (fmod($banner_count_index, $banner_count) == 0 && $banner_count_index != 0) { ?>
                                <div class="row">
                                    <div class="col-xs-12 newspaper-x-image-banner">
										<?php get_template_part('template-parts/banner/banner', $banner); ?>
                                    </div>
                                </div>
								<?php

      }

      $banner_count_index++;
							/*
       * Include the Post-Format-specific template for the content.
       * If you want to override this in a child theme, then include a file
       * called content-___.php (where ___ is the Post Format name) and that will be used instead.
       */
      ?>
                            <div class="col-md-6">
								<?php
        get_template_part('template-parts/content', get_post_format());
        ?>
                            </div>
							<?php
      if (fmod($banner_count_index, 2) == 0 && $banner_count_index != (int)$wp_query->post_count) {
        echo '</div><div class="row">';
      } elseif ($banner_count_index == (int)$wp_query->post_count) {
        continue;
      }
      endwhile;
      ?>
                    </div>
					<?php
    the_posts_navigation();
    else :
      echo '<div class="row">';
    get_template_part('template-parts/content', 'none');
    echo '</div>';
    endif;
    ?>
            </main><!-- #main -->
        </div><!-- #primary -->
		<?php get_sidebar('default-widget-area'); ?>
    </div>
	<?php
else :
?>

    <!-- Header Widget Area -->
	<?php get_template_part('template-parts/header-widget-area') ?>
		<div class="row">
			<header class="col-xs-12">
				<h3 class="page-title"><span>首頁</span></h3>
			</header><!-- .page-header -->
		</div>
    
	
	
	<div class="row" style="height=100px;">
		<!-- print table for 新聞稿 -->
		<div class="col-md-4"style="word-break:break-all">
      <h2 style="border-bottom:2px solid #0f5fa3;text-align:center"><a 
      style="color:black;font-weight:bold"
      href="http://localhost/
			wordpress-4.9.6/wordpress/category/%E6%96%B0%E8%81%9E%E5%8F%8A%E5%85%
			AC%E5%91%8A/%E6%96%B0%E8%81%9E%E7%A8%BF/">
			<?php echo get_cat_name(12); ?></a></h2>
			<table>
			<?php $threeCat = new WP_Query('cat=12&posts_per_page=4');
  if ($threeCat->have_posts()) :
    echo '<tr><th>發佈日期</th><th>公告標題</th></tr>';
  while ($threeCat->have_posts()) : $threeCat->the_post(); ?>
						<tr>
							<td style="width:35%"><span style="display:inline"><?php echo get_the_date(); ?></span></td>
							<td><a style="display:inline;overflow: hidden;display: 
							-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;"
							href = <?php the_permalink(); ?>><?php the_title(); ?></a>
							</td>
						</tr>
					<?php endwhile;
    else :
      endif;
    wp_reset_postdata();//clear query?
    ?>
			</table>
			<a class="btn-sm" href="http://localhost/
			wordpress-4.9.6/wordpress/category/%E6%96%B0%E8%81%9E%E5%8F%8A%E5%85%
			AC%E5%91%8A/%E6%96%B0%E8%81%9E%E7%A8%BF/"style="float:right;color:white;
			background-color:#0a396d">查詢更多</a>
		</div>
		<!--print table for 公佈欄-->
		<div class="col-md-4"style="word-break:break-all">
			<h2 style="border-bottom:2px solid #0f5fa3;text-align:center"><a
      style="color:black;font-weight:bold"
      href="http://localhost/wordpress-4.9.6/wordpress/category/
			%E6%96%B0%E8%81%9E%E5%8F%8A%E5%85%AC%E5%91%8A/%E5%85%AC%E4%BD%88%E6%AC%84/"
      >
			<?php echo get_cat_name(14); ?></a></h2>
			<table>
			<?php $threeCat = new WP_Query('cat=14&posts_per_page=4');
  if ($threeCat->have_posts()) :
    echo '<tr><th>發佈日期</th><th>公告標題</th></tr>';
  while ($threeCat->have_posts()) : $threeCat->the_post(); ?>
						<tr>
							<td style="width:35%"><span style="display:inline"><?php echo get_the_date(); ?></span></td>
							<td><a style="display:inline;overflow: hidden;display: 
							-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;"
							href = <?php the_permalink(); ?>><?php the_title(); ?></a>
							</td>
						</tr>
					<?php endwhile;
    else :
      endif;
    wp_reset_postdata();//clear query?
    ?>
			</table>
			<a class="btn-sm" href="http://localhost/wordpress-4.9.6/wordpress/category/
			%E6%96%B0%E8%81%9E%E5%8F%8A%E5%85%AC%E5%91%8A/%E5%85%AC%E4%BD%88%E6%AC%84/"
			style="float:right;color:white;
			background-color:#0a396d">查詢更多</a>
		</div>
    <!--print table for 活動訊息-->
		<div class="col-md-4"style="word-break:break-all">
			<h2 style="border-bottom:2px solid #0f5fa3;text-align:center"><a
      style="color:black;font-weight:bold"
      href="http://localhost/wordpress-4.9.6/wordpress/
			category/%E6%96%B0%E8%81%9E%E5%8F%8A%E5%85%AC%E5%91%8A/%E6%B4%BB%E5
			%8B%95%E8%A8%8A%E6%81%AF/"
      >
			<?php echo get_cat_name(15); ?></a> </h2>
			<table>
			<?php $threeCat = new WP_Query('cat=15&posts_per_page=4');
  if ($threeCat->have_posts()) :
    echo '<a></a><tr><th>發佈日期</th><th>公告標題</th></tr>';
  while ($threeCat->have_posts()) : $threeCat->the_post(); ?>
						<tr>
							<td style="width:35%"><span style="display:inline"><?php echo get_the_date(); ?></span></td>
							<td><a style="display:inline;overflow: hidden;display: 
							-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;"
							href = <?php the_permalink(); ?>><?php the_title(); ?></a>
							</td>
						</tr>
					<?php endwhile;
    else :
      endif;

    wp_reset_postdata();//clear query?
    ?>
			</table>
			<a class="btn-sm" href="http://localhost/wordpress-4.9.6/wordpress/
			category/%E6%96%B0%E8%81%9E%E5%8F%8A%E5%85%AC%E5%91%8A/%E6%B4%BB%E5
			%8B%95%E8%A8%8A%E6%81%AF/"
			style="float:right;color:white;
			background-color:#0a396d">查詢更多</a>
		</div>
	</div>
  <!-- 最新消息 -->
  <div class="row" style="margin-top:50px">
      <h2 style="border-bottom:2px solid #0f5fa3;text-align:center">
      <a href="http://localhost/wordpress-4.9.6/wordpress/category/%E6%9C%80%E6%96%B0%E6%B6%88%E6%81%AF/"
      style="color:black;font-weight:bold">
      <?php 
      echo get_cat_name(5);
      ?>
      </a>
      </h2>
			<table style="table-layout:fixed;width:100%">
      <?php
      $threeCat = new WP_Query('cat=5&posts_per_page=12');
      if ($threeCat->have_posts()) :
        echo '<a></a><col width="15%"><col width="30%"><tr><th>發佈日期</th><th>類別</th><th>公告標題</th></tr>';

      while ($threeCat->have_posts()) : $threeCat->the_post();
      $cat = get_the_category();
  // echo count($cat);

      ?>
						<tr>
							<td><span style="display:inline"><?php echo get_the_date(); ?></span></td>
							<td>
              <?php 
              for ($i = 0; $i < count($cat); $i++) {
                $catname = $cat[$i]->name;
                $cat_link = get_category_link($cat[$i]->term_id);
                echo '<a style = "overflow: hidden;display: inline 
							-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;"
                  href ="' . esc_url($cat_link) . '">' . esc_html($catname) . '</a>  ';
              }
              // echo esc_html($cat);
              ?>
              </td>
              <td><a style="display:inline;overflow: hidden;display: 
							-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;"
							href = <?php the_permalink(); ?>><?php the_title(); ?></a>
							</td>
						</tr>
          <?php
          endwhile;
          else :
            endif;
          wp_reset_postdata();//clear query?
          ?>
			</table>
			<a class="btn-sm" href="http://localhost/wordpress-4.9.6/wordpress/category/%E6%9C%80%E6%96%B0%E6%B6%88%E6%81%AF/"style="float:right;color:white;
			background-color:#0a396d">查詢更多</a>
    </div>
<?php endif; ?>

<?php get_footer();