<!doctype html>
<html class="no-js" lang="">

<head>
    @include('client.share.css')
</head>
<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <img src="/assets_client/img/preloader.svg" alt="">
            </div>
        </div>
    </div>
    <!-- preloader-end -->
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="header-style-two">
        @php
            $check = Auth::guard('customer')->check();
            $user  = Auth::guard('customer')->user();
        @endphp
        <div class="header-top-wrap">
            <div class="container custom-container">
                <div class="row align-items-center">
                    <div class="col-md-6 d-none d-md-block">
                        <div class="header-top-subs">
                            <p>Công Ty Cổ Phần <span>DZFullStack</span></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="header-top-link">
                            <ul class="quick-link">
                                @if ($check)
                                    <li><a href="#">Chào Bạn, {{ $user->ho_va_ten }}</a></li>
                                @else
                                    <li><a href="#">About Us</a></li>
                                @endif
                            </ul>
                            <ul class="header-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="menu-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo">
                                    <a href="/">
                                        <img src="/assets_client/img/logo/logo.png" alt="Logo">
                                    </a>
                                </div>

                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="active menu-item-has-children"><a href="/">Trang Chủ</a>
                                        </li>
                                        <li class="menu-item-has-children"><a href="/phim-dang-chieu">Phim Đang Chiếu</a>
                                        </li>
                                        <li class="menu-item-has-children"><a href="/phim-sap-chieu">Phim Sắp Chiếu</a>
                                        </li>
                                        <li class="menu-item-has-children"><a href="/bai-viet">Bài Viết</a>
                                        </li>
                                        <li><a href="/lien-he">Liên Hệ</a></li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="d-none d-xl-block">
                                            <div class="footer-search">
                                                <form action="/tim-kiem" method="POST">
                                                    @csrf
                                                    <input type="text" name="search" placeholder="Nhập Tên Phim">
                                                    <button type="submit"><i class="fas fa-search"></i></button>
                                                </form>
                                            </div>
                                        </li>

                                        {{-- @if ($check)
                                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                                <ul class="navigation">
                                                    <li class="active menu-item-has-children ml-4"><a href="#"><i class="fa-solid fa-user fa-2x"></i></a>
                                                        <ul class="submenu">
                                                            <li><a href="/client/cap-nhap-thong-tin">Trang Cá Nhân</a></li>
                                                            <li><a href="/client/cap-nhap-mat-khau">Đổi Mật Khẩu</a></li>
                                                            <li><a href="/logout">Đăng Xuất</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        @else
                                            <li class="header-btn"><a href="/register" class="btn">Sign In</a></li>
                                        @endif --}}
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="close-btn"><i class="fas fa-times"></i></div>

                            <nav class="menu-box">
                                <div class="nav-logo"><a href="/assets_client/index.html"><img src="/assets_client/img/logo/logo.png"
                                            alt="" title=""></a>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->


    <!-- main-area -->
    <main>

        <!-- slider-area -->
        {{-- <section class="slider-area slider-bg" data-background="{{ isset($config->bg_homepage) ? $config->bg_homepage : '/assets_client/img/banner/s_slider_bg.jpg'}}"> --}}
        <section class="slider-area slider-bg" style="background-image: url('{{ isset($config->bg_homepage) ? $config->bg_homepage : '/assets_client/img/banner/s_slider_bg.jpg'}}')">
            <div class="slider-active">
                @if(isset($phim_1))
                <div class="slider-item">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-0 order-lg-2">
                                <div class="slider-img text-center text-lg-right" data-animation="fadeInRight"
                                    data-delay="1s">
                                    <img src="{{ $phim_1->avatar }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h6 class="sub-title" data-animation="fadeInUp" data-delay=".2s">DZFULLSTACK</h6>
                                    <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $phim_1->ten_phim }}</h2>
                                    <div class="banner-meta" data-animation="fadeInUp" data-delay=".6s">
                                        <ul>
                                            <li class="quality">
                                                <span>{{ $phim_1->the_loai }}</span>
                                                <span>hd</span>
                                            </li>
                                            <li class="category">
                                                {{ $phim_1->dien_vien }}
                                            </li>
                                            <li class="release-time">
                                                <span><i class="far fa-calendar-alt"></i> {{ $phim_1->ngay_khoi_chieu }}</span>
                                                <span><i class="far fa-clock"></i> {{ $phim_1->thoi_luong }} min</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ $phim_1->trailer }}"
                                        class="banner-btn btn popup-video" data-animation="fadeInUp"
                                        data-delay=".8s"><i class="fas fa-play"></i> Watch Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($phim_2))
                <div class="slider-item">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-0 order-lg-2">
                                <div class="slider-img text-center text-lg-right" data-animation="fadeInRight"
                                    data-delay="1s">
                                    <img src="{{ $phim_2->avatar }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h6 class="sub-title" data-animation="fadeInUp" data-delay=".2s">DZFULLSTACK</h6>
                                    <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $phim_2->ten_phim }}</h2>
                                    <div class="banner-meta" data-animation="fadeInUp" data-delay=".6s">
                                        <ul>
                                            <li class="quality">
                                                <span>{{ $phim_2->the_loai }}</span>
                                                <span>hd</span>
                                            </li>
                                            <li class="category">
                                                {{ $phim_2->dien_vien }}
                                            </li>
                                            <li class="release-time">
                                                <span><i class="far fa-calendar-alt"></i> {{ $phim_2->ngay_khoi_chieu }}</span>
                                                <span><i class="far fa-clock"></i> {{ $phim_2->thoi_luong }} min</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ $phim_2->trailer }}"
                                        class="banner-btn btn popup-video" data-animation="fadeInUp"
                                        data-delay=".8s"><i class="fas fa-play"></i> Watch Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($phim_3))
                <div class="slider-item">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-0 order-lg-2">
                                <div class="slider-img text-center text-lg-right" data-animation="fadeInRight"
                                    data-delay="1s">
                                    <img src="{{ $phim_3->avatar }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h6 class="sub-title" data-animation="fadeInUp" data-delay=".2s">DZFULLSTACK</h6>
                                    <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $phim_3->ten_phim }}</h2>
                                    <div class="banner-meta" data-animation="fadeInUp" data-delay=".6s">
                                        <ul>
                                            <li class="quality">
                                                <span>{{ $phim_3->the_loai }}</span>
                                                <span>hd</span>
                                            </li>
                                            <li class="category">
                                                {{ $phim_3->dien_vien }}
                                            </li>
                                            <li class="release-time">
                                                <span><i class="far fa-calendar-alt"></i> {{ $phim_3->ngay_khoi_chieu }}</span>
                                                <span><i class="far fa-clock"></i> {{ $phim_3->thoi_luong }} min</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ $phim_3->trailer }}"
                                        class="banner-btn btn popup-video" data-animation="fadeInUp"
                                        data-delay=".8s"><i class="fas fa-play"></i> Watch Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <!-- slider-area-end -->

        <!-- Phim Nổi bật -->
        <section class="ucm-area ucm-bg2" data-background="/assets_client/img/bg/ucm_bg02.jpg">
            <div class="container">
                <div class="row align-items-end mb-55">
                    <div class="col-lg-6">
                        <div class="section-title title-style-three text-center text-lg-left">
                            <span class="sub-title">DZFullStack</span>
                            <h2 class="title">Phim Nổi Bật</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ucm-nav-wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="dangChieu-tab" data-toggle="tab" href="#dangChieu"
                                        role="tab" aria-controls="tvShow" aria-selected="true">Phim Đang Chiếu</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="sapChieu-tab" data-toggle="tab" href="#sapChieu"
                                        role="tab" aria-controls="movies" aria-selected="false">Phim Sắp Chiếu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dangChieu" role="tabpanel"
                        aria-labelledby="dangChieu-tab">
                        <div class="ucm-active-two owl-carousel">
                            @foreach ($list_phim as $key => $value )
                                @if ($value->tinh_trang == 1)
                                <div class="movie-item movie-item-two mb-30">
                                    <div class="movie-poster">
                                        <a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}"><img src="{{ $value->avatar }}"
                                                alt=""></a>
                                    </div>
                                    <div class="movie-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h5 class="title"><a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}">{{ $value->ten_phim }}</a></h5>
                                        <span class="rel">{{ $value->dao_dien }}</span>
                                        <div class="movie-content-bottom">
                                            <ul>
                                                <li class="tag">
                                                    <a href="#">HD</a>
                                                    <span class="like mt-1">{{ $value->thoi_luong }} min</span>
                                                </li>
                                                <li>
                                                    <span class="like"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sapChieu" role="tabpanel" aria-labelledby="sapChieu-tab">
                        <div class="ucm-active-two owl-carousel">
                            @foreach ($list_phim as $key => $value )
                                @if ($value->tinh_trang == 2)
                                <div class="movie-item movie-item-two mb-30">
                                    <div class="movie-poster">
                                        <a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}"><img src="{{ $value->avatar }}"
                                                alt=""></a>
                                    </div>
                                    <div class="movie-content" >
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h5 class="title"><a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}">{{ $value->ten_phim }}</a></h5>
                                        <span class="rel">{{ $value->dao_dien }}</span>
                                        <div class="movie-content-bottom">
                                            <ul>
                                                <li class="tag">
                                                    <a href="#">HD</a>
                                                    <span class="like">{{ $value->thoi_luong }} min</span>
                                                </li>
                                                <li>
                                                    <span class="like"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Phim Nổi bật-end -->

        <!-- gallery-area -->
        <div class="gallery-area position-relative">
            <div class="gallery-bg"></div>
            <div class="container-fluid p-0 fix">
                <div class="row gallery-active">
                    <div class="col-12">
                        <div class="gallery-item">
                            <img src="/assets_client/img/images/gallery_01.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="gallery-item">
                            <img src="/assets_client/img/images/gallery_02.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="gallery-item">
                            <img src="/assets_client/img/images/gallery_03.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-nav"></div>
        </div>
        <!-- gallery-area-end -->

        <!-- top-rated-movie -->
        <section class="top-rated-movie tr-movie-bg2 mt-5" data-background="/assets_client/img/bg/tr_movies_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title title-style-three text-center mb-70">
                            <span class="sub-title">DZFullStack</span>
                            <h2 class="title">Các Phim Gần Đây</h2>
                        </div>
                    </div>
                </div>
                <div class="row movie-item-row">
                    @foreach ($list_phim as $key => $value)
                        @if ($value->tinh_trang != 2)
                        <div class="custom-col">
                            <div class="movie-item movie-item-two">
                                <div class="movie-poster">
                                    <img src="{{ $value->avatar }}" alt="">
                                    <ul class="overlay-btn">
                                        <li><a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}" class="btn">Xem Chi Tiết</a></li>
                                    </ul>
                                </div>
                                <div class="movie-content">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h5 class="title"><a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}">{{ $value->ten_phim }}</a></h5>
                                    <span class="rel">Adventure</span>
                                    <div class="movie-content-bottom">
                                        <ul>
                                            <li class="tag">
                                                <a href="#">HD</a>
                                                <span class="like mt-1">{{ $value->thoi_luong }} min</span>
                                            </li>
                                            <li>
                                                <span class="like"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- top-rated-movie-end -->

        <!-- pricing-area -->
        {{-- <section class="pricing-area pricing-bg" data-background="/assets_client/img/bg/pricing_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title title-style-three text-center mb-70">
                            <span class="sub-title">our pricing plans</span>
                            <h2 class="title">Our Pricing Strategy</h2>
                        </div>
                    </div>
                </div>
                <div class="pricing-box-wrap">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="pricing-box-item mb-30">
                                <div class="pricing-top">
                                    <h6>premium</h6>
                                    <div class="price">
                                        <h3>$7.99</h3>
                                        <span>Monthly</span>
                                    </div>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li class="quality"><i class="fas fa-check"></i> Video quality
                                            <span>Good</span></li>
                                        <li><i class="fas fa-check"></i> Resolution <span>480p</span></li>
                                        <li><i class="fas fa-check"></i> Screens you can watch <span>1</span></li>
                                        <li><i class="fas fa-check"></i> Cancel anytime</li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="#" class="btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="pricing-box-item active mb-30">
                                <div class="pricing-top">
                                    <h6>standard</h6>
                                    <div class="price">
                                        <h3>$9.99</h3>
                                        <span>Monthly</span>
                                    </div>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li class="quality"><i class="fas fa-check"></i> Video quality
                                            <span>Better</span></li>
                                        <li><i class="fas fa-check"></i> Resolution <span>1080p</span></li>
                                        <li><i class="fas fa-check"></i> Screens you can watch <span>2</span></li>
                                        <li><i class="fas fa-check"></i> Cancel anytime</li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="#" class="btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="pricing-box-item mb-30">
                                <div class="pricing-top">
                                    <h6>premium</h6>
                                    <div class="price">
                                        <h3>$11.99</h3>
                                        <span>Monthly</span>
                                    </div>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li class="quality"><i class="fas fa-check"></i> Video quality
                                            <span>Best</span></li>
                                        <li><i class="fas fa-check"></i> Resolution <span>4K+HDR</span></li>
                                        <li><i class="fas fa-check"></i> Screens you can watch <span>4</span></li>
                                        <li><i class="fas fa-check"></i> Cancel anytime</li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="#" class="btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- pricing-area-end -->

    </main>
    <!-- main-area-end -->
    <!-- footer-area -->
    <footer>
        <div class="footer-top-wrap">
            <div class="container">
                <div class="footer-menu-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="footer-logo">
                                <a href="/"><img src="/assets_client/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="footer-menu">
                                <nav>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="active menu-item-has-children"><a href="/">Trang Chủ</a>
                                            </li>
                                            <li class="menu-item-has-children"><a href="/phim-dang-chieu">Phim Đang Chiếu</a>
                                            </li>
                                            <li class="menu-item-has-children"><a href="/phim-sap-chieu">Phim Sắp Chiếu</a>
                                            </li>
                                            <li class="menu-item-has-children"><a href="/bai-viet">Bài Viết</a>
                                            </li>
                                            <li><a href="/lien-he">Liên Hệ</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-quick-link-wrap">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="quick-link-list">
                                <ul>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Help Center</a></li>
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright-text">
                            <p>Copyright &copy;  @php echo date('Y') @endphp . All Rights Reserved By <a href="/assets_client/index.html">DZFullStack</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="payment-method-img text-center text-md-right">
                            <img src="/assets_client/img/images/card_img.png" alt="/assets_client/img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->
    <!-- JS here -->
    @include('client.share.js')
    @yield('js')
</body>
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
</html>
