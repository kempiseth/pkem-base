<!DOCTYPE html>
<html lang="<?=LANG?>">
    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="Piseth Kem">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= SITE_NAME.' - '.$title ?></title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
        <link href="/static/css/app.css" rel="stylesheet">
        <link href="/static/css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
            <header>
            </header>
            <nav id="nav-main">
                <?= @$nav ?>
            </nav>
            <main class="group">
                <div id="main-left">
                    <section id="section-main">
                        <?= @$section ?>
                    </section>
                    <article>
                    </article>
                </div>
                <div id="main-right">
                    <aside>
                    </aside>
                </div>
            </main>
            <footer>
            </footer>
        </div>

        <script src="/static/js/app.js"></script>
        <?= @$js ?>
    </body>
</html>
