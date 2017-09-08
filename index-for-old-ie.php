<!DOCTYPE html>
<head>
    <title><?php t('sonub')?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="wp-content/themes/xapi-2-theme/ext/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="wp-content/themes/xapi-2-theme/css/base.css">
    <link rel="stylesheet" href="wp-content/themes/xapi-2-theme/css/layout.css">
    <link rel="stylesheet" href="wp-content/themes/xapi-2-theme/css/component.css">

    <script>
//        setInterval( function() {
//            location.reload();
//        }, 2000);
    </script>
</head>
<body>
<header>

    <table class="content" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td class="logo">
                <a class="" href="./index.php">Sonub</a>
            </td>

            <td class="menus">
                <span><a class="" href="./index.php?slug=news">News</a></span>
                <span><a class="" href="./index.php??slug=ask">Ask</a></span>
                <span><a class="" href="./index.php??slug=discussion">Discussion</a></span>
            </td>
        </tr>
    </table>



</header>

<main>
    <div class="content">
        <div id="ie-notice">
            <i class="fa fa-warning"></i>
            You are using very old Internet Explorer.
            <div style="margin-left: 1.4em;">We strongly encourage you to use latest version of Internet Explorer or Chrome for browsing.</div>
        </div>
        <div class="posts">
        <?php
        $posts = get_recent_posts();
        foreach ( $posts as $post ) {
            ?>
            <div class="post"><a href="#"><?php echo $post['post_title']?></a></div>
        <?php
        }
        ?>
    </div>
    </div>
</main>
<footer>
    <div class="content">
        Copyright (C) www.sonub.com - Please use Edge or Chrome browser.
    </div>
</footer>
</body>
</html>

