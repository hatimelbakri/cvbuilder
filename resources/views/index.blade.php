<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>diigo</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
   <!-- style css -->
   <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
   <!-- Responsive-->
   <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
   <!-- fevicon -->
   <link rel="icon" href="{{asset('frontend/images/fevicon.png')}}" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{asset('frontend/css/jquery.mCustomScrollbar.min.css')}}">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="{{asset('frontend/images/loading.gif')}}" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   @include('include.header')
   <!-- end banner -->
   <!-- business -->

   <!-- end business -->
   <!-- Projects -->

   <!-- end projects -->
   <!-- Testimonial -->

   <!-- end Testimonial -->
   <!-- contact -->
   <div id="contact" class="contact">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Contact us</h2>
                  <span>There are many variations of passages of Lorem Ipsum available, but the </span>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-md-12 ">
               <form class="main_form ">
                  <div class="row">
                     <div class="col-md-12 ">
                        <input class="form_contril" placeholder="Name " type="text" name="Name ">
                     </div>
                     <div class="col-md-12">
                        <input class="form_contril" placeholder="Phone Number" type="text" name=" Phone Number">
                     </div>
                     <div class="col-md-12">
                        <input class="form_contril" placeholder="Email" type="text" name="Email">
                     </div>
                     <div class="col-md-12">
                        <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                     </div>
                     <div class="col-sm-12">
                        <button class="send_btn">Send</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- end contact -->
   <!--  footer -->
   @include('include.footer')
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
   <script src="{{asset('frontend/js/popper.min.js')}}"></script>
   <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('frontend/js/jquery-3.0.0.min.js')}}"></script>
   <script src="{{asset('frontend/js/plugin.js')}}"></script>
   <!-- sidebar -->
   <script src="{{asset('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
   <script src="{{asset('frontend/js/custom.js')}}"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>