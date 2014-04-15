<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{Config::get('site.global-title', 'Default Title')}}</title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" media="screen">
        <link href="{{asset('css/global.min.css')}}" rel="stylesheet" media="screen">
        @yield('styles')
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{URL::route('home')}}"><i class="glyphicon glyphicon-tower"></i> {{Config::get('site.global-title', 'Default Title')}}</a>
                    </div>
                
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li<?php if(Request::is('/') OR Request::is('articles*')): ?> class="active"<?php endif; ?>><a href="{{URL::route('articles.index')}}"><i class="glyphicon glyphicon-book"></i> Articles</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::guest())
                            <li><a href="#"><i class="glyphicon glyphicon-edit"></i> Register</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>

        <section>
            <div class="container">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    @yield('breadcrumbs')
                </ol>
                @include('templates.partials.alerts')
                @yield('content')
            </div>
        </section>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="{{asset('js/global.js')}}"></script>
        @yield('scripts')
    </body>
</html>