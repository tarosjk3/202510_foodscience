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
