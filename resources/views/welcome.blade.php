<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
       
        <!-- Fonts -->
         <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
        <link href="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
        <link href="css/custom.min.css" rel="stylesheet" type="text/css">

    </head>
    <body class="nav-md">
        <div id='app'><app></app></div>
        </div>
    </body>

    <script src="js/app.js"></script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>

       <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
   
      <script src="js/custom.min.js"></script>
</html>
