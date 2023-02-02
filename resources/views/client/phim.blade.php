@extends('client.master')
@section('content')
<section class="movie-area movie-bg" data-background="/assets_client/img/bg/movie_bg.jpg">
    <div class="container">
        <div class="row align-items-end mb-60">
            <div class="col-lg-6">
                <div class="section-title text-center text-lg-left">
                    <span class="sub-title">ONLINE STREAMING</span>
                    <h2 class="title">Phim Đang Chiếu</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="movie-page-meta">
                    <div class="tr-movie-menu-active text-center">
                        <button class="active" data-filter="*">Hot Phim</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row tr-movie-active">
            @foreach ($list_phim as $key => $value)
            <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                <div class="movie-item movie-item-three mb-50">
                    <div class="movie-poster">
                        <img src="{{ $value->avatar }}" width="100%" alt="">
                        <ul class="overlay-btn">
                            <li class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </li>
                            <li><a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}" class="btn">Xem Chi Tiết</a></li>
                        </ul>
                    </div>
                    <div class="movie-content">
                        <div class="top">
                            <h5 class="title"><a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}">{{ $value->ten_phim }}</a></h5>
                            <span class="date">{{ Carbon\Carbon::parse($value->ngay_khoi_chieu)->format('d/m/Y') }}</span>
                        </div>
                        <div class="bottom">
                            <ul>
                                <li><span class="quality">hd</span></li>
                                <li>
                                    <span class="duration"><i class="far fa-clock"></i> {{ $value->thoi_luong }} min</span>
                                    <span class="rating"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
