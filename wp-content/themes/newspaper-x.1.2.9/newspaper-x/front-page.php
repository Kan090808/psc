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
  <div class="row" style="margin-top:-50px">
    <header class="col-xs-12">
      <h3 class="page-title"><span>首頁</span></h3>
    </header><!-- .page-header -->
  </div>
  <div class="row">
    <div class="carousel slide col-md-10 col-md-offset-1" id="gallery" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#gallery" data-slide-to="0" class="active"></li>
        <li data-target="#gallery" data-slide-to="1"></li>
        <li data-target="#gallery" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <center>
            <a href="https://www.tcsb.gov.tw/cp-92-313-9da3e-1.html">
              <?php echo '<img src="' . wp_get_attachment_url(1011) . '" alt="毒化物簡介" style="height:400px">'; ?>
            
            </a>
          </center>
        </div>
        <div class="item">
          <center>
            <a href="https://www.osha.gov.tw/">
              <?php echo '<img src="' . wp_get_attachment_url(1012) . '" alt="毒化物簡介" style="height:400px">'; ?>
            </a>
          </center>
        </div>
        <div class="item">
          <center>
            <a href="https://tw.appledaily.com/new/realtime/20180111/1276942/">
              <?php echo '<img src="' . wp_get_attachment_url(1013) . '" alt="毒化物簡介" style="height:400px">'; ?>
            </a>
          </center>
        </div>
      </div>
      <a class="left carousel-control" href="#gallery" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#gallery" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    
    </div>
  </div>
    
	<div class="row" style="height=100px;">
		<!--print table for 活動訊息-->
		<div class="col-md-4"style="word-break:break-all">
			<h2 style="border-bottom:8px solid #0f5fa3;text-align:center;padding-bottom:10px"><a
      style="color:black;font-weight:bold"
      href="<?php echo get_category_link(15); ?>"
      >
			<?php echo get_cat_name(15); ?></a> </h2>
			<table class="biggertxt table table-striped">
			<?php $threeCat = new WP_Query('cat=15&posts_per_page=4');
  if ($threeCat->have_posts()) :
    echo '<a></a><tr><th>發佈日期</th><th>公告標題</th></tr>';
  while ($threeCat->have_posts()) : $threeCat->the_post(); ?>
						<tr>
							<td style="width:35%"><span style="display:inline"><?php echo get_the_date(); ?></span></td>
							<td style="height:80px"><a style="display:inline;overflow: hidden;display: 
							-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;text-overflow:ellipsis;"
							href = <?php the_permalink(); ?>><?php the_title(); ?></a>
							</td>
						</tr>
					<?php endwhile;
    else :
      endif;

    wp_reset_postdata();//clear query?
    ?>
			</table>
			<a class="btn btn-md" href="<?php echo get_category_link(15); ?>"
			style="float:right;color:white;
			background-color:#0a396d">查詢更多</a>
		</div>
		<!--print table for 公佈欄-->
		<div class="col-md-4"style="word-break:break-all">
			<h2 style="border-bottom:8px solid #0f5fa3;text-align:center;padding-bottom:10px"><a
      style="color:black;font-weight:bold"
      href="<?php echo get_category_link(14); ?>"
      >
			<?php echo get_cat_name(14); ?></a></h2>
			<table class="biggertxt table table-striped">
			<?php $threeCat = new WP_Query('cat=14&posts_per_page=4');
  if ($threeCat->have_posts()) :
    echo '<tr><th>發佈日期</th><th>公告標題</th></tr>';
  while ($threeCat->have_posts()) : $threeCat->the_post(); ?>
						<tr>
							<td style="width:35%"><span style="display:inline"><?php echo get_the_date(); ?></span></td>
							<td style="height:80px"><a style="display:inline;overflow: hidden;display: 
							-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;text-overflow:ellipsis;"
							href = <?php echo the_permalink(); ?>><?php the_title(); ?></a>
							</td>
						</tr>
					<?php endwhile;
    else :
      endif;
    wp_reset_postdata();//clear query?
    ?>
			</table>
			<a class="btn btn-md" href="<?php echo get_category_link(14); ?>"
			style="float:right;color:white;
			background-color:#0a396d">查詢更多</a>
    </div>
    <!-- print table for 新聞稿 -->
		<div class="col-md-4"style="word-break:break-all">
      <h2 style="border-bottom:8px solid #0f5fa3;text-align:center;padding-bottom:10px"><a 
      style="color:black;font-weight:bold"
      href="<?php echo get_category_link(12); ?>">
			<?php echo get_cat_name(12); ?></a></h2>
			<table class="biggertxt table table-striped">
			<?php $threeCat = new WP_Query('cat=12&posts_per_page=4');
  if ($threeCat->have_posts()) :
    echo '<tr><th>發佈日期</th><th>公告標題</th></tr>';
  while ($threeCat->have_posts()) : $threeCat->the_post(); ?>
						<tr>
							<td style="width:35%"><span style="display:inline"><?php echo get_the_date(); ?></span></td>
							<td style="height:80px"><a style="display:inline;overflow: hidden;display: 
							-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;text-overflow:ellipsis;"
							href = <?php the_permalink(); ?>><?php the_title(); ?></a>
							</td>
						</tr>
					<?php endwhile;
    else :
      endif;
    wp_reset_postdata();//clear query?
    ?>
			</table>
			<a class="btn btn-md" href="<?php echo get_category_link(12); ?>"style="float:right;color:white;
			background-color:#0a396d">查詢更多</a>
		</div>
    </div>
  <!-- 最新消息 -->
  <div class="row" style="margin-top:50px">
      <h2 style="border-bottom:8px solid #0f5fa3;text-align:center;padding-bottom:10px">
      <a href="%e6%9c%80%e6%96%b0%e6%b6%88%e6%81%af"
      style="color:black;font-weight:bold">
      最新消息
      </a>
      </h2>
			<table class="biggertxt table table-striped table-responsive" style="table-layout:fixed;width:100%">
      <?php
      // $threeCat = new WP_Query('cat=5&posts_per_page=12');
      $args = array('numberposts' => '10');
      $latestP = wp_get_recent_posts($args);
      // if ($threeCat->have_posts()) :
      echo '<a></a><col width="15%"><col width="30%"><tr><th>發佈日期</th><th class="hidetd">類別</th><th>公告標題</th></tr>';
      foreach ($latestP as $lp) {
        $lp["post_date"] = date("Y-m-d");
        echo '<tr>
        <td>
          <span style="display:inline">' . $lp["post_date"] . '</span>
        </td>
        <td class="hidetd">';
        // var_dump(get_the_category($lp["ID"]));
        $cats = get_the_category($lp["ID"]);
        for ($i = 0; $i < count($cats); $i++) {
          $catname = $cats[$i]->name;
          $cat_link = get_category_link($cats[$i]->term_id);
          echo '<a href="' . esc_url($cat_link) . '" style="margin-right:10px;">' . $catname . '</a>';
        }
        echo '</td>
        <td>
          <a href = "' . get_permalink($lp["ID"]) . '" style="">' . $lp["post_title"] . '</a>
        </td>
        </tr>';


      }
      // while ($threeCat->have_posts()) : $threeCat->the_post();
      // $cat = get_the_category();
  // echo count($cat);

      ?>
						<!-- <tr>
              <td><span style="display:inline">
              <?php 
              // echo get_the_date(); 
              ?>
              </span></td>
							<td>
              <?php 
              // for ($i = 0; $i < count($cat); $i++) {
                // $catname = $cat[$i]->name;
                // $cat_link = get_category_link($cat[$i]->term_id);
                // echo '<a style = "overflow: hidden;display: inline 
							// -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;"
                  // href ="' . esc_url($cat_link) . '">' . esc_html($catname) . '</a>  ';
              // }
              // echo esc_html($cat);
              ?>
              </td>
              <td><a style="display:inline;overflow: hidden;display: 
							-webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;"
							href = 
              <?php 
              // the_permalink(); 
              ?>
              <!-- > -->
              <?php
              //  the_title(); 
              ?>
               </a>
							</td>
						</tr>
          <?php
          // endwhile;
          

            // else :endif;
          wp_reset_postdata();//clear query?
          ?>
			</table>
			<a class="btn btn-md" href="%e6%9c%80%e6%96%b0%e6%b6%88%e6%81%af"style="float:right;color:white;
			background-color:#0a396d">查詢更多</a>
    </div>
<?php endif; ?>

<?php get_footer();