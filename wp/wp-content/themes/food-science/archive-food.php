<?php get_header(); ?>

<main>
  <section class="section section-foodList">
    <div class="section_inner">
      <div class="section_header">
        <h2 class="heading heading-primary"><span>フード紹介</span>FOOD</h2>
      </div>

      <?php
      $args = [
        'taxonomy' => 'menu',
      ];
      $menu_terms = get_terms($args);
      ?>
      <?php foreach ($menu_terms as $menu): ?>
        <section class="section_body">
          <h3 class="heading heading-secondary">
            <a href="<?= get_term_link($menu); ?>">
              <?= $menu->name; ?>
              <span><?= strtoupper($menu->slug); ?></span>
            </a>
          </h3>
          <ul class="foodList">
            
            <?php
              $args = [
                // 投稿タイプをfoodに限定
                'post_type' => 'food',

                // 全件取得する
                'posts_per_page' => -1, 

                // 現在ループで回しているメニューのデータで絞り込む
                'tax_query' => [
                  // [条件1], [条件2], ...と続けた場合「AND」はすべての条件にマッチしたもののみ取得となる。「OR」も指定可能。 
                  'relation' => 'AND', 
                  [
                    'taxonomy' => 'menu',
                    'field' => 'slug',
                    'terms' => $menu->slug
                  ],
                ],
              ];
              $the_query = new WP_Query($args);
            ?>
            
            <?php if ($the_query->have_posts()): ?>
              <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                <li class="foodList_item">
                  <?php get_template_part('template-parts/loop', 'food'); ?>
                </li>
              <?php endwhile;
                wp_reset_postdata();
              ?>
            <?php endif; ?>

          </ul>
        </section>
      <?php endforeach; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>