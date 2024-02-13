<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Putul - Personal Portfolio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{asset('Frontend/assets/img/favicon.png')}}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{asset('Frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('Frontend/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('Frontend/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('Forntend/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{asset('Frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('Frontend/assets/css/default.css')}}">
        <link rel="stylesheet" href="{{asset('Frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('Frontend/assets/css/responsive.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include('website.body.header')
        <!-- header-area-end -->

        <!-- main-area -->
          <main>

            @yield('main')

            </main>
        <!-- main-area-end -->

        @include('website.body.footer')


<!-- JS here -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('Frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('Frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Frontend/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('Frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('Frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('Frontend/assets/js/element-in-view.js')}}"></script>
<script src="{{asset('Frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('Frontend/assets/js/ajax-form.js')}}"></script>
<script src="{{asset('Frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('Frontend/assets/js/plugins.js')}}"></script>
<script src="{{asset('Frontend/assets/js/main.js')}}"></script>

<!--------start--------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-----toaster flash --->
        <script>
            @if (Session::has ('message'))
            var type="{{session::get('alert-type', 'info')}}"
            switch (type) {
                case 'info':
                    toastr.info(" {{session::get('message')}} ");
                    break;
                case 'success':
                    toastr.success(" {{session::get('message')}} ");
                    break;
                case 'warning':
                    toastr.warning(" {{session::get('message')}} ");
                    break;
                case 'error':
                    toastr.error(" {{session::get('message')}} ");
                    break;
            }
            @endif
        </script>
    </body>
</html>
