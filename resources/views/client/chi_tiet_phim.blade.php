@extends('client.master')
@section('content')
 <!-- movie-details-area -->
 <section class="movie-details-area" data-background="/assets_client/img/bg/movie_details_bg.jpg">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-xl-3 col-lg-4">
                <div class="movie-details-img">
                    <img width="250px"  src="{{ isset($phim) ? $phim->avatar : '' }}" alt="">
                    <a href="{{ isset($phim) ? $phim->trailer : '' }}" class="popup-video"><img src="/assets_client/img/images/play_icon.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8">
                <div class="movie-details-content">
                    <h2><span>{{ isset($phim) ? $phim->ten_phim : '' }}</span></h2>
                    <div class="banner-meta">
                        <ul>
                            <li class="quality">
                                <span>hd</span>
                            </li>
                            <li class="category">
                                <a href="#">{{ isset($phim) ? $phim->the_loai : '' }},</a>
                            </li>
                            <li class="category">
                                <a href="#">Đạo Diễn : {{ isset($phim) ? $phim->dao_dien : '' }}</a>
                            </li>
                            <li class="release-time">
                                <span><i class="far fa-calendar-alt"></i> {{ isset($phim) ? Carbon\Carbon::parse($phim->ngay_khoi_chieu)->format('d/m/Y') : '' }},</span>
                                <span><i class="far fa-clock"></i> {{ isset($phim) ? $phim->thoi_luong : '' }} min</span>
                            </li>
                        </ul>
                    </div>
                    <span>{{ isset($phim) ? $phim->mo_ta : '' }}</span>
                    <div class="movie-details-prime mt-3">
                        @foreach ($lichChieu as $key => $value)
                        <a href="/client/dat-ve/{{$value->id}}" class="m-2 banner-btn btn wow fadeInUp">{{ Carbon\Carbon::parse($value->thoi_gian_bat_dau)->format('H:i d/m/Y')  }}</a>
                        @endforeach
                        <ul>
                            <li class="share"><a href="#"><i class="fas fa-share-alt"></i> Share</a></li>
                            <li class="streaming">
                                <h6>Trailer</h6>
                                <span>Streaming Channels</span>
                            </li>
                            <li class="watch"><a href="{{ isset($phim) ? $phim->trailer : '' }}" class="btn popup-video"><i class="fas fa-play"></i> Watch Now</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="movie-details-btn">
                <a href="/assets_client/img/poster/movie_details_img.jpg" class="download-btn" download="">Download <img src="fonts/download.svg" alt=""></a>
            </div>
        </div>
    </div>
</section>
<!-- movie-details-area-end -->

@endsection
