<!DOCTYPE html>
<html lang="fa" class="js">
<head>
    <base href="../../../"/>
    <meta charset="utf-8"/>
    <meta name="author" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png"/>
    <!-- Page Title  -->
    <title>@yield('title', 'پیمان پردازش نیام')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.rtl.css"/>
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css"/>

    @yield('style')

</head>

<body class="has-rtl nk-body ui-rounder npc-general pg-error" dir="rtl">

<div class="nk-app-root">
    <!-- main @s -->
    @yield('content')
    <!-- main @e -->
</div>
<!-- app-root @e -->

<!-- JavaScript -->
<script src="./assets/js/bundle.js"></script>
<script src="./assets/js/scripts.js"></script>

</body>
</html>
