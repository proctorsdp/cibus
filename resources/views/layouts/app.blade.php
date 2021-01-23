<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar is-spaced has-shadow" role="navigation">
			<div class="container">
				<div class="navbar-brand">
					<a class="navbar-item is-size-4" href="{{ url('/') }}">
						{{ config('app.name', "Laravel") }}
					</a>
				</div>
					
					{{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
						<span class="navbar-toggler-icon"></span>
					</button> --}}
	
				<div class="navbar-menu" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<div class="navbar-start">
						<a href="/ingredients" class="navbar-item">Ingredients</a>
						<a href="/categories" class="navbar-item">Categories</a>
						<a href="/tags" class="navbar-item">Tags</a>
					</div>
	
					<!-- Right Side Of Navbar -->
					<div class="navbar-end">
						<!-- Authentication Links -->
						@guest
							<div class="navbar-item">
								<div class="buttons">
									<a class="button is-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
									@if (Route::has('register'))
										<a class="button is-light" href="{{ route('register') }}">{{ __('Register') }}</a>
									@endif
								</div>
							</div>
						@else
							<div class="navbar-item has-dropdown is-hoverable">
								<a id="navbarDropdown" class="navbar-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>
								<div class="navbar-dropdown" aria-labelledby="navbarDropdown">
									<a class="navbar-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</div>
						@endguest
					</div>
				</div>
			</div>
        </nav>

        <main class="main has-background-grey-lighter">
			<div class="container">
				@yield('content')
			</div>
        </main>
    </div>
</body>
</html>
