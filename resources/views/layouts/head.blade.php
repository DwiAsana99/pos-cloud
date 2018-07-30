
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{--  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">  --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLte/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLte/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('iCheck/flat/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('iCheck/all.css') }}">

    <style>
        .warnaGradien {
            background: #348f50; /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #348f50, #20e3b2); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #348f50, #20e3b2);
        }

        .select2-selection--single {
            border-radius: 0px !important;
        }

        .select2-selection--single .select2-selection__rendered {
            line-height: 22px !important;
            margin-left: -7px;
        }

        .Menu-Block {
            display: inline-grid !important;
            text-align: center;
            font-size: 20px;
        }

        .Menu-Block .spanText {
            font-size: 13px;
        }

        .Menu-Block .caret {
            margin-top: 8px;
            margin-left: 3px;
        }

        .navbar-brand {
            height: 70px !important;
            line-height: 40px !important;
        }

        .customUser {
            height: 70px;
            padding: 25px 0px !important;
        }

        .navbar-toggle {
            height: 70px;
        }

        .parent-drop {
            display: flex;
        }

        @media only screen and (max-width: 767px) {
            .Menu-Block {
                display: unset !important;
            }

            .parent-drop {
                display: contents;
            }
        }
    </style>

    @yield('css')
</head>