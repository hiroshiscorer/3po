<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/jquery-3.1.1.min.js" defer></script>
    <script src="/js/main.js?v=1.2.0" defer></script>


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0f2a7c">
    <meta name="msapplication-TileColor" content="#0f2a7c">
    <meta name="theme-color" content="#0f2a7c">

    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/css/main.css?v=1.2.0" rel="stylesheet">
    <link href="/css/responsive.css?v=1.2.0" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;400;700;900&family=Titillium+Web:wght@400;700&family=Roboto+Mono:wght@100;400;700&display=swap" rel="stylesheet">
</head>
<body>

</body>
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav>
                    <ul>
                        <li><a href="/"><img src="/images/logo.png" alt="SCFL logo"></a></li>
                        <li><a href="/schedule">Schedule</a></li>
                        <li><a href="/teams">Teams</a></li>
                        <li><a href="/pilots">Pilots</a></li>
                        <li><a href="/rules">Rules</a></li>
                        <li><a href="/seasons">Seasons</a></li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</header>
@yield('content')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="/images/logo-footer.png" alt="SCFL logo">
            </div>
            <div class="col-md-6">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/schedule">Schedule</a></li>
                    <li><a href="/teams">Teams</a></li>
                    <li><a href="/pilots">Pilots</a></li>
                    <li><a href="/rules">Rules</a></li>
                    <li><a href="/seasons">Seasons</a></li>
                    <li><a href="https://discord.com/invite/BgYknw7bUu" target="_blank">SCFL Discord Server</a></li>
                </ul>

            </div>
            <div class="col-md-3 footer-last">
                <form id="pay-pal" action="https://www.paypal.com/donate" method="post" target="_top">
                    <input type="hidden" name="hosted_button_id" value="B478WUQXZZWV8" />
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" title="Only if you think the work I put in this website is worth it" alt="Donate with PayPal button" />
                    <img alt="" border="0" src="https://www.paypal.com/en_MX/i/scr/pixel.gif" width="1" height="1" />
                </form>

                <p class="dev-by">Developed by Zynetik Producciones</p>
            </div>
        </div>
    </div>
</footer>


</html>
