<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/davidbase.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

    @component('components.header')
    @endcomponent

    @component('components.sidebar')
    @endcomponent

    <div class="content-wrapper">
        <section class="content-header">
            @if(isset($heading))
                <h1>{{ $heading }}</h1>
            @else
                <h1>{{ $title }}</h1>
            @endif
            @component('components.breadcrumb')
                {{ $breadcrumb or null }}
            @endcomponent
        </section>
        <section class="content">
            {{ $slot }}
        </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2018.</strong>
        <?php
            echo shell_exec("git branch -v");
        ?>
        <div class="pull-right hidden-xs">Phát triển từ <a href="https://www.facebook.com/tunglt.david1508" target="_blank">david.tunglt</a></div>
    </footer>
</div>

@include('flash::message')

<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content"></div>
    </div>
</div>

<div class="modal fade" id="remoteLargeModal" tabindex="-1" role="dialog" aria-labelledby="remoteModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content"></div>
    </div>
</div>

<script src="{{ asset('js/davidbase.js') }}"></script>
</body>
</html>
