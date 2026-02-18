<?php

add_action('after_setup_theme', 'my_setup_theme');
function my_setup_theme()
{
    /**
     * titleタグを出力する
     */
    add_theme_support('title-tag');

    /**
     * アイキャッチ画像を有効化する
     */
    add_theme_support('post-thumbnails');

    /**
     * ナビゲーションを追加する
     */
    add_theme_support('menus');
}


/**
 * titleタグの区切り文字を変更する
 */
add_filter('document_title_separator', 'my_document_title_separator');
function my_document_title_separator($sep)
{
    // $sep = '|';
    // return $sep;
    return '|';
}

/**
 * CSS, JSの読み込み
 */
// add_action('アクションフック名', 'フックが実行される時に同時に実行する関数');
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');
function my_enqueue_scripts()
{
    // CSS
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css');
    wp_enqueue_style('google-web-font', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
    wp_enqueue_style('food-science-style', get_template_directory_uri() . '/assets/css/app.css');

    // JS
    wp_enqueue_script(
        'food-science-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        [
            'strategy' => 'defer',
            // 'in_footer' => true //(もしwp_footerで出力する場合)
        ]
    );
    wp_enqueue_script('jquery');
}

/**
 * wp_headの実行タイミングでmetaタグを出力する
 * ※優先度を上げることで、先頭の方に表示される
 */
add_action('wp_head', 'my_wp_head', 1);
function my_wp_head()
{
    echo '<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">';
}


/**
 * Contact Form 7の時には整形機能をオフにする
 */
add_filter('wpcf7_autop_or_not', 'my_wpcf7_autop');
function my_wpcf7_autop()
{
    return false;
}

/**
 * ショートコードテスト
 */
// 1. ショートコード用の関数
function shortcode_test($attr)
{
    // 引数のデフォルト値
    $default = [
        'color' => 'black',
        'font-weight' => 'normal',
    ];
    $args = shortcode_atts($default, $attr);

    var_dump($args);
    if ($args['color'] === 'orange') {
        $result = '<div style="color: orange">ショートコードによって出力した文章</div>';
    } else {
        $result = '<div>ショートコードによって出力した文章</div>';
    }
    return $result;
}

// 2. ショートコードの登録
// add_shortcode('ショートコード名', 'ショートコードの関数名');
add_shortcode('my_shortcode', 'shortcode_test');


// 3. ショートコードの実行（テンプレートや投稿画面にて）
// 使用例. [my_shortcode]

/**
 * メインクエリを変更する
 */
add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts($query) {
    // 管理ページ、メインクエリ以外では設定しない
    if(is_admin() || !$query->is_main_query()) {
        return;
    }

    // トップページの場合
    if($query->is_home()) {
        $query->set('posts_per_page', 3);
        return;
    }
}