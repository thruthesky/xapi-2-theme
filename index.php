<?php
if ( isset($ie_version) && $ie_version > 1 && $ie_version < 9 ) {
    include 'index-for-old-ie.php';
    return;
}



ob_start();

/// Settings. Default settings.
$sitename = "Sonub";
$author = 'Sonub';
$title = "Sonub - Sonub Network Hub";
$keywords = "Your new best life partner,Social Network Hub,Community,Discussion,News,QnA,Questions and Answers,Buy and Sell,Jobs";
$description = "Sonub is a social network hub for your daily activities. We wish to be a guide for your life journey.";
$image = "//www.sonub.com/assets/img/site-preview-default-image.jpg";
$url = "https://www.sonub.com";

$content = file_get_contents('index.html');
list( $before, $after ) = explode('</head>', $content, 2);




//if ( urlSegment(0) == 'view' && urlSegment(1) ) { // deprecated. remove urlSegment() function
//	$post = get_post( urlSegment(1) );
//}
//else
if ( isset($_GET['post_view']) ) {
	$post = get_post($_GET['post_view']);
}
else {
	$post = $GLOBALS['wp_the_query']->get_queried_object();
}
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
</body>
<?php
echo $after_body;


$html = ob_get_clean();

include_once XAPI_DIR . '/display-index-html.php';
display_index_html( $html );
