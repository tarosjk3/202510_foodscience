<section class="comments">
    <?php
    $args = [
        'title_reply' => 'コメント投稿フォーム',
        // 'fields' => [
        //     'url' => '',

        // ],
    ];
    comment_form($args);

    if (have_comments()):
    ?>

        <ol class="commentlist" id="comments">
            <?php
            $args = [
                'avatar_size' => 50,
            ];
            wp_list_comments($args);
            ?>
        </ol>

        <?php 
        $args = [
            'prev_text' => '←前のコメントページ',
            'next_text' => '次のコメントページ→',
        ];
        paginate_comments_links($args);
        ?>

    <?php endif; ?>
</section>