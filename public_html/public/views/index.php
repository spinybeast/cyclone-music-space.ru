<!doctype html>
<html ng-app="cycloneApp">
<head>
    <meta charset="utf-8"/>
    <meta name="generator" content="Bootply"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="Keywords"
          content="<?= Config::get('text/' . $lang . '.keywords')?>"/>
    <meta name="Description"
          content="<?= Config::get('text/' . $lang . '.description')?>"/>
    <title>Cyclone Music Space</title>
    <link rel="stylesheet" href="../vendor/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../vendor/bootstrap/dist/css/bootstrap-social.css">
    <link rel="stylesheet" href="../vendor/bootstrap/dist/css/font-awesome.css">
    <link rel="stylesheet" href="../vendor/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="../vendor/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
<header>
    <nav class="navbar navbar-inverse container">
        <div class="lang">
            <a href="/" class="ru" title="Russian"></a>
            <a href="/en" class="en" title="English"></a>
        </div>
        <div class="navbar-header pull-left">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <div class="nav-container">
                <ul class="nav navbar-nav">
                    <li class="hidden-xs navbar-brand">
                        <?= HTML::image('img/logo.png', $alt = "Cyclone Music Space", $attributes = array()) ?>
                    </li>
                    <?php foreach (Config::get('text/' . $lang . '.menu') as $name => $link) { ?>
                        <li>
                            <a is-active-nav href="#/<?php echo $link ?>"><?php echo $name ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 16px;">
        <div class="col-md-6 hidden-xs hidden-sm nopadding" style="margin: 0 -13px 0 13px;">
            <div class="carousel-border">
                <div class="owl-carousel">
                    <div>
                        <a href="/#prices">
                            <img class="img-responsive img-rounded" src="../img/banners/Аранжировка.jpg" alt=""/>

                            <div class="caption">Аранжировки</div>
                        </a>
                    </div>
                    <div>
                        <img class="img-responsive img-rounded" src="../img/banners/Песня%20под%20ключ.jpeg" alt=""/>

                        <div class="caption">Написание песен "под ключ"</div>
                    </div>
                    <div>
                        <img class="img-responsive img-rounded"
                             src="../img/banners/Написание%20партий%20любого%20инструмента.jpg" alt=""/>

                        <div class="caption">Написание партий любого инструмента</div>
                    </div>
                    <div>
                        <img class="img-responsive img-rounded" src="../img/banners/саундреки2.jpg" alt=""/>

                        <div class="caption">Написание саундтреков</div>
                    </div>
                    <div>
                        <img class="img-responsive img-rounded" src="../img/banners/Сведение%20и%20мастеринг.JPG"
                             alt=""/>

                        <div class="caption">Сведение и мастеринг</div>
                    </div>
                    <div>
                        <img class="img-responsive img-rounded" src="../img/banners/Создание%20минусовок.jpg" alt=""/>

                        <div class="caption">Создание минусовок</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="logo">
                <noindex>
                    <h1>Cyclone Music Space</h1>

                    <h3>online studio</h3>
                </noindex>
                <p class="text-justify">
                    <?= Config::get('text/' . $lang . '.header')?>
                </p>
                <button type="submit" class="btn btn-link" style="margin-top: -7px;">
                    <a href="#/about#content"><?= Config::get('text/' . $lang . '.more', 'Подробнее')?>...</a>
                </button>
            </div>
        </div>
    </div>
</header>

<div class="modal-content" id="content">
    <div class="content-header text-center"
         ng-bind-html="'<div class=\'left-corner\'></div><div class=\'right-corner\'></div>' + $root.title"></div>
    <div class="content-header-bottom">
        <svg width="30" height="45" style="position: absolute;top: -14px;left: 0px;">
            <line x1="0" y1="45" x2="45" y2="0" stroke-width="1" stroke="#3C777E"></line>
        </svg>
        <svg width="30" height="45" style="position: absolute;top: 0;right: 0px;">
            <line x1="0" y1="0" x2="45" y2="45" stroke-width="1" stroke="#3C777E"></line>
        </svg>
    </div>
    <div class="container" ng-view></div>
    <div class="content-angles"></div>
</div>

<footer id="footer" class="footer">
    <!--    <div class="container-fluid" >-->
    <!--        <div class="row">-->
    <!--            <br ng-show="page == '/blog'"/>-->
    <!--            <br ng-show="page == '/blog'"/>-->
    <!--            <div class="container" ng-hide="page == '/blog'">-->
    <!--                <div class="col-md-6" ng-show="article1">-->
    <!--                    <p class="h4">{{ article1.title }}</p>-->
    <!---->
    <!--                    <p class="text-justify">{{ article1.full_preview }}</p>-->
    <!--                    <button class="btn btn-link">-->
    <!--                        <a href="#/blog/{{ article1.id }}" class="h5">Читать далее &#x2192;</a>-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--                <div class="col-md-6" ng-show="article2">-->
    <!--                    <p class="h4">{{ article2.title }}</p>-->
    <!---->
    <!--                    <p class="text-justify">{{ article2.full_preview }}</p>-->
    <!--                    <button class="btn btn-link">-->
    <!--                        <a href="#/blog/{{ article2.id }}" class="h5">Читать далее &#x2192;</a>-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--                <div class="col-md-4">-->
    <!--                    <p class="h4">Свяжитесь с нами</p>-->
    <!---->
    <!--                    <form action="">-->
    <!--                        <div class="form-group">-->
    <!--                            <input required="required" type="text" class="form-control" name="author"-->
    <!--                                   placeholder="Имя/ник">-->
    <!--                        </div>-->
    <!--                        <div>-->
    <!--                            <div class="form-group">-->
    <!--                                <input required="required" type="text" class="form-control" name="email"-->
    <!--                                       placeholder="Email">-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="form-group">-->
    <!--                            <textarea required="required" class="form-control" name="message"-->
    <!--                                      placeholder="Сообщение"></textarea>-->
    <!--                        </div>-->
    <!--                        <div class="form-group">-->
    <!--                            <button type="submit" class="btn btn-primary">-->
    <!--                                <i class="fa fa-envelope-o"></i>&nbsp;Отправить-->
    <!--                            </button>-->
    <!--                        </div>-->
    <!--                    </form>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <div class="copy row-fluid">
        <div class="container">
            <div class="text-left col-md-6">
                &copy; <?= date('Y') ?> Cyclone Music Space<br/>
                Designed by <a class="spiny" href="http://rain-studio.com/" target="_blank">Rain GS</a><br/>
                Developed by <a class="spiny" href="https://vk.com/spiny.beast" target="_blank">spiny.beast</a><br/>
            </div>
            <div class="text-right col-md-6 social">
                <a class="btn btn-social-icon btn-vk" target="_blank" title="Мы ВКонтакте"
                   href="https://vk.com/cyclone_music_space">
                    <i class="fa fa-vk"></i>
                </a>
                <a class="btn btn-social-icon btn-facebook" target="_blank" title="Мы на Facebook"
                   href="https://www.facebook.com/anton.brezhnev.58">
                    <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-social-icon btn-soundcloud" target="_blank" title="Мы на Soundcloud"
                   href="https://soundcloud.com/tony-cyclonez">
                    <i class="fa fa-soundcloud"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<script>
    var lang = '<?php echo $lang?>';
</script>
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="../vendor/jquery/jquery.js"></script>
<script src="../vendor/angular/angular.js"></script>
<script src="../vendor/angular-animate/angular-animate.js"></script>
<script src="../vendor/angular-route/angular-route.js"></script>
<script src="../vendor/angular-resource/angular-resource.js"></script>
<script src="../vendor/angular-sanitize/angular-sanitize.js"></script>
<script src="../vendor/ng-flow/dist/ng-flow-standalone.js"></script>
<script src="../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendor/owl-carousel/owl.carousel.min.js"></script>
<script src="../vendor/toneden-sdk/toneden.loader.js"></script>
<script src="../js/app.js"></script>
<script src="../js/controllers/ReviewsController.js"></script>
<script src="../js/services/reviewsService.js"></script>
<script src="../js/controllers/PortfolioController.js"></script>
<script src="../js/services/portfolioService.js"></script>
<script src="../js/controllers/BlogController.js"></script>
<script src="../js/controllers/BlogItemController.js"></script>
<script src="../js/services/blogService.js"></script>

<script>
    $(function () {
        $('.owl-carousel').owlCarousel({items: 1, autoplay: 4000, loop: true, animateOut: 'fadeOut'});
    });
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-54909644-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
