<?php

/// Settings. Default settings.
$sitename = "Sonub";
$author = 'Sonub';
$title = "Sonub - Sonub Network Hub";
$keywords = "Your new best life partner,Social Network Hub,Community,Discussion,News,QnA,Questions and Answers,Buy and Sell,Jobs";
$description = "Sonub is a social network hub for your daily activities. We wish to be a guide for your life journey.";
$image = "//assets/img/site-preview-default-image.jpg";
$url = "https://www.sonub.com";

$content = file_get_contents('index.html');
list( $before, $after ) = explode('</head>', $content, 2);


if ( urlSegment(0) == 'view' && urlSegment(1) ) $post = get_post( urlSegment(1) );
else $post = $GLOBALS['wp_the_query']->get_queried_object();
if ( $post ) {
    $title = $post->post_title;
    $description = trim(preg_replace('/\s+/', ' ', mb_substr( strip_tags($post->post_content), 0, 255 )));
    if ( $post->post_author ) {
        $user = get_userdata( $post->post_author );
        $author = $user->display_name;
    }
    else {
        $post_author = get_post_meta($post->ID, 'post_author_name', true);
        if ( $post_author ) $author = $post_author;
    }
    $guid_image = get_first_image_url( $post->ID );
    if ( $guid_image ) $image = $guid_image;
    $url = $post->guid;
}

echo $before;
?>
<script>
    <?php if ( $post ) {?>
    var forum_post = <?php echo json_encode( jsonPost($post) );?>;
    <?php }?>
</script>
<meta name="description" content="<?php echo $description?>">
<meta name="keywords" content="<?php echo $keywords?>">
<meta name="author" content="<?php echo $author?>">
<meta itemprop="name" content="<?php echo $sitename?>">
<meta itemprop="description" content="<?php echo $description?>">
<meta itemprop="image" content="<?php echo $image?>">
<meta property="og:site_name" content="<?php echo $sitename?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $title?>">
<meta property="og:url" content="<?php echo $url?>">
<meta property="og:description" content="<?php echo $description?>">
<meta property="og:image" content="<?php echo $image?>">

</head>
<?php


list( $body_content, $after_body ) = explode('</body>', $after, 2);

echo $body_content;
?>
<a style="position: absolute; display:block; top: -100px;" href="https://www.sonub.com/wp-content/plugins/xapi-2/seo.php">More posts</a>
</body>
<?php
echo $after_body;

