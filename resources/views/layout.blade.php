<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/aj.css') }}">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
    <div class="container">
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">DASHBOARD</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Product<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{URL::to('add')}}">Add Product</a></li>
                                <li><a href="#">Edit Product</a></li>
                                <li><a href="#">Search product</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Change price</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Delete Product</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

        <div class="col-md-12" style="min-height: 750px">
        @section('content')
        @show
        </div>




    </div>
    <footer>
        <div class="row">
            <div class="col-lg-12" style="background: #e7e7e7; padding-top:10px;">


                <p>Developed By <a href="#" rel="nofollow">Heera Group</a></p>


            </div>
        </div>

    </footer>
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>

    @section('script')
    @show

    </body>

</html>
