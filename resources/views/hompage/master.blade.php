<!DOCTYPE html>
<html>
   <head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="/home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
      @include('hompage.layout.header')
         <!-- end header section -->
         <!-- slider section -->
        @include('hompage.layout.sidebar')
         <!-- end slider section -->
      </div>
      <!-- why section -->
     @include('hompage.why')
      <!-- end why section -->

      <!-- arrival section -->
     @include('hompage.arrivel')
      <!-- end arrival section -->

      <!-- product section -->
     @include('hompage.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('hompage.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
     @include('hompage.client')
      <!-- end client section -->
      <!-- footer start -->
     @include('hompage.layout.footer')
      <!-- footer end -->

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
