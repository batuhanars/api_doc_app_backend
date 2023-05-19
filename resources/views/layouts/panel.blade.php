<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('') }}assets/img/favicon.png">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top" style="display: flex; align-items:center;">
            <div class="brand">
                <a href="index"><img style="width: 170px; height: 55px;" src="{{ $project->logo }}"
                        alt="Doktoroom Logo" class="img-responsive logo"></a>
            </div>
            <a href="{{ route('sub-projects.index', $project) }}" style="color: #fff !important; padding: 0 30px;">
                <i class="lnr lnr-arrow-left-circle"></i>
                Geri Dön
            </a>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="{{ route('panel.index', [$project, $subProject]) }}" class=""><i
                                    class="lnr lnr-home"></i> <span>Anasayfa</span></a></li>
                        @foreach ($modules as $module)
                            @if ($module->is_dropdown == 0)
                                <li>
                                    <a href="{{ route('module.index', [$project, $subProject, $module]) }}"
                                        class="{{ $module->slug ==(request()->route()->parameter('module') != null? request()->route()->parameter('module')->slug: '')? 'active': '' }}">
                                        <i class="{{ $module->icon }}"></i>
                                        <span>{{ $module->title }}
                                        </span></a>
                                </li>
                            @else
                                <li>
                                    <a href="#{{ $module->slug }}" data-toggle="collapse"
                                        class="{{ $module->slug ==(request()->route()->parameter('module') != null? request()->route()->parameter('module')->slug: '')? 'collapse active': 'collapsed' }}"><i
                                            class="{{ $module->icon }}"></i>
                                        <span>{{ $module->title }}</span> <i
                                            class="icon-submenu lnr lnr-chevron-left"></i></a>
                                    <div id="{{ $module->slug }}"
                                        class="collapse {{ $module->slug ==(request()->route()->parameter('module') != null? request()->route()->parameter('module')->slug: '')? 'in': '' }}">
                                        <ul class="nav">
                                            @foreach ($module->subModules as $subModule)
                                                <li><a href="{{ route('subModule.index', [$project, $subProject, $module, $subModule]) }}"
                                                        class="">{{ $subModule->title }} &nbsp;
                                                        @switch($subModule->endpoint->method)
                                                            @case('GET')
                                                                <span class="label label-success">
                                                                    {{ $subModule->endpoint->method }}</span>
                                                            @break

                                                            @case('POST')
                                                                <span class="label label-primary">
                                                                    {{ $subModule->endpoint->method }}</span>
                                                            @break

                                                            @case('PUT')
                                                                <span class="label label-info">
                                                                    {{ $subModule->endpoint->method }}</span>
                                                            @break

                                                            @case('DELETE')
                                                                <span class="label label-danger">
                                                                    {{ $subModule->endpoint->method }}</span>
                                                            @break
                                                        @endswitch
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">

                @yield('content')
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2022 <a href="https://www.markapress.com" target="_blank">Marka Press
                        Digital Software Agency</a>. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script>
        $(document).ready(function() {
            $('pre code').each(function(i, block) {
                hljs.highlightBlock(block);
            });
        });
    </script>
    <script src="{{ asset('') }}assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('') }}assets/scripts/klorofil-common.js"></script>
</body>

</html>
