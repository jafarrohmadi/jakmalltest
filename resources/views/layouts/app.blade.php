<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    @guest
        <nav class="navbar">
        </nav>
    @else
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header" style="padding: 10px;">
                    <!-- Branding Image -->
                    <table width="100%">
                        <tr> 
                            <td width="50%"> Hello, {{ Auth::user()->name ? Auth::user()->name : Auth::user()->email }} <br>
                                <a href="{{ url('admin/order') }}"> {{ $unpaid }} unpaid Order </a> 
                            </td>
                            <td width="50%">
                                <a href="{{ url('admin/topup_balance') }}">Prepaid Balance</a> |
                                <a href="{{ url('admin/product') }}">Product Page</a>
                            </td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </nav>
    @endguest 
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
