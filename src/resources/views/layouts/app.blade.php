<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/regulator.css" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>


    @include('admin::partials.utils._nav', ['nav' => config('admin.nav.roles')[Auth::user->roles()->first()->slug]])

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/Regulator.js"></script>

    @if(Session::has('success_message'))
    <script>
       // new HideMessage('successMessage');
    </script>
    @endif

    @if (Session::has('errors'))
    <script>
       // new HideMessage('errorsMessage');
    </script>
    @endif

    @yield('scripts')
    @yield('js')
</body>
</html>
