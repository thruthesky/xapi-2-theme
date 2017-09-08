<html !doctype>
<head>
    <title><?php t('sonub')?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="wp-content/themes/xapi-2-theme/ext/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="wp-content/themes/xapi-2-theme/css/index.css">
    <script src="http://127.0.0.1:12345/socket.io/socket.io.js"></script>
    <script>
        var socket = io('http://127.0.0.1:12345');
        socket.on('reload', function (data) {
            console.log(data);
            // window.location.reload(true);
            location.reload();
        });
    </script>
</head>
<body>
<header>


    <div class="blog-masthead">
        <div class="content container">
            <nav class="blog-nav">
                <a class="blog-nav-item active" href="#">Home</a>
                <a class="blog-nav-item" href="#">New features</a>
                <a class="blog-nav-item" href="#">Press</a>
                <a class="blog-nav-item" href="#">New hires</a>
                <a class="blog-nav-item" href="#">About</a>
            </nav>
        </div>
    </div>


</header>

<main>
    <table class="content" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td width="240">
                <p>
                    Side bar menus
                </p>
            </td>
            <td width="89%">
                <h1>Title</h1>
                <p>Cotnent area</p>
            </td>
        </tr>
    </table>
</main>
<footer>
    <div class="content">
        Copyright (C) <?php echo date('Y')?>
    </div>
</footer>
</body>
</html>

