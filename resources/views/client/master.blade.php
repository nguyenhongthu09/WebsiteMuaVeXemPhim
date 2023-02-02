<!doctype html>
<html class="no-js" lang="">
<head>
    @include('client.share.css')
</head>
<body>
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->
        @include('client.share.header')
    <main>
        @include('client.share.slide')
        @yield('content')
    </main>
    <!-- main-area-end -->
        @include('client.share.footer')
    <!-- JS here -->
        @include('client.share.js')
    @yield('js')
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/63b6e9fcc2f1ac1e202be2e4/1gm1841gk';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
