<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <!-- Basic Page Needs -->
    <title>Events</title>

    <!-- Specific Metas -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Anurag Deep | https://anuragdeep.com">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="asd" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('images/logo.png') }}" />

    <!-- Main Stylesheet -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    <!-- Javascripts -->
    <script src="{{ URL::asset('js/app.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=asd]').attr('content')
            }
        });
    </script>

    <script>
        $(function() {
            $("#start_date").datepicker();
            $("#end_date").datepicker();

        });
    </script>


    <script type="text/javascript">
        window.onload = function() {
            $("#eventListForm").click();
            $("#ticketListForm").click();

        }
    </script>
</head>

<body class="min-h-screen">
    @yield('content')
</body>

</html>