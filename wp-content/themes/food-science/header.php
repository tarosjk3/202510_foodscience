<!DOCTYPE html>
<html lang="ja">
<head>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
  <header class="header">
    <div class="header_logo">
      <h1 class="logo"><a href="<?= home_url(); ?>">FOOD SCIENCE<span><?php bloginfo('description'); ?></span></a></h1>
    </div>

    <div class="header_nav">
      <div class="header_menu js-menu-icon"><span></span></div>
      <div class="gnav js-menu">
        <ul>
          <li><a href="concept.html">コンセプト</a></li>
          <li><a href="food.html">メニュー</a></li>
          <li><a href="access.html">アクセス</a></li>
          <li><a href="category.html">最新情報</a></li>
        </ul>

        <div class="header_info">
          <form class="header_search">
            <input type="text" aria-label="Search">
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>

          <div class="header_contact">
            <div class="header_time">
              <dl>
                <dt>OPEN</dt>
                <dd>09:00〜21:00</dd>
              </dl>
              <dl>
                <dt>CLOSED</dt>
                <dd>Tuesday</dd>
              </dl>
            </div>
            <p>
              <a href="#"><i class="fa-solid fa-envelope"></i><span>ご予約・お問い合わせ</span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </header>