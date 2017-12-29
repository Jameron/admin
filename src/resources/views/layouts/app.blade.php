<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin') }}</title>
    <link href="/css/admin.css" rel="stylesheet">

    @if(file_exists(base_path() . '/vendor/jameron/regulator/'))
    <link href="/css/regulator.css" rel="stylesheet">
    @endif
    @if(file_exists(base_path() . '/vendor/jameron/import/'))
    <link href="/css/upload.css" rel="stylesheet">
    @endif

    <link href="/css/app.css" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body @if(config('admin.theme')=='dark') class="dark" @endif id="app">
    @include('admin::partials.utils._nav', [
    'nav' => 
    ( Auth::check() && 
      Auth::user()->roles()->first() 
      && isset(config('admin.nav.roles')[Auth::user()->roles()->first()->slug]) ) 
      ? config('admin.nav.roles')[Auth::user()->roles()->first()->slug] 
      :  config('admin.nav.logged_out')
      ])

      @if(Auth::check())
          <div id="wrapper">
                @include('admin::partials.utils._side_nav', [
                'side_nav' => 
                ( Auth::check() && 
                  Auth::user()->roles()->first() 
                  && isset(config('admin.side_nav.roles')[Auth::user()->roles()->first()->slug]) ) 
                  ? config('admin.side_nav.roles')[Auth::user()->roles()->first()->slug] 
                  : [] 
                  ])
              <div id="page-content-wrapper">
                  @yield('content')
              </div>
          </div>
      @else
          @yield('content')
      @endif

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/Admin.js"></script>

    @if(file_exists(base_path() . '/vendor/jameron/import/'))
    <script src="/js/Upload.js"></script>
	@endif

    @if(Session::has('success_message'))
    <script>
       new HideMessage('successMessage');
    </script>
    @endif

    @if (Session::has('errors'))
    <script>
        new HideMessage('errorsMessage');
    </script>
    @endif

    <script>
    $('#toggleNav').click(function() {
        $('#sideNav').toggleClass('collapsed');
        $('#wrapper').toggleClass('collapsed');
    });
    </script>
    @yield('scripts')
    @yield('js')
</body>
</html>
