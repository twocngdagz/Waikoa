<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/waikoa.css" rel="stylesheet">	
    @yield('comment_css')
	
	<!-- Jquery Ui -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
	<!-- Timepicker Ui -->
	<link rel="stylesheet" href="http://wvega.github.io/timepicker/resources/jquery-timepicker/jquery.timepicker.min.css" />	

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<!--	<nav class="navbar navbar-default">-->
<!--		<div class="container-fluid">-->
<!--			<div class="navbar-header">-->
<!--				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">-->
<!--					<span class="sr-only">Toggle Navigation</span>-->
<!--					<span class="icon-bar"></span>-->
<!--					<span class="icon-bar"></span>-->
<!--					<span class="icon-bar"></span>-->
<!--				</button>-->
<!--				<a class="navbar-brand" href="#">Waikoa</a>-->
<!--			</div>-->
<!---->
<!--			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
<!--				<ul class="nav navbar-nav">-->
<!--					<li><a href="/">Home</a></li>-->
<!--				</ul>-->
<!---->
<!--				<ul class="nav navbar-nav navbar-right">-->
<!--					@if (Auth::guest())-->
<!--						<li><a href="/auth/login">Login</a></li>-->
<!--						<li><a href="/auth/register">Register</a></li>-->
<!--					@else-->
<!--						<li class="dropdown">-->
<!--							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>-->
<!--							<ul class="dropdown-menu" role="menu">								-->
<!--                                <li><a href="/courses/">Courses</a></li>                                -->
<!--                                <li><a href="/user/profile">Profile</a></li>-->
<!--								<li><a href="/auth/logout">Logout</a></li>-->
<!--							</ul>-->
<!--						</li>-->
<!--					@endif-->
<!--				</ul>-->
<!--			</div>-->
<!--		</div>-->
<!--	</nav>-->
    <div class="container" style="background: none repeat scroll 0 0 #ffffff; padding: 0;">
        <div class="row">
            <div class="col-md-12">
                <img class="img-responsive" src="http://placehold.it/1200x260" alt="">
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            @yield('content')
        </div>
    </div>



	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="http://wvega.github.io/timepicker/resources/jquery-timepicker/jquery.timepicker.min.js"></script>
	<script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
	@yield('scripts')
    @yield('comment_js')
</body>
</html>
