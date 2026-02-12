<?php


/**
 * titleタグを出力する
 */
add_theme_support('title-tag');

/**
 * titleタグの区切り文字を変更する
 */
add_filter('document_title_separator', 'my_document_title_separator');
function my_document_title_separator($sep) {
    // $sep = '|';
    // return $sep;
    return '|';
}
