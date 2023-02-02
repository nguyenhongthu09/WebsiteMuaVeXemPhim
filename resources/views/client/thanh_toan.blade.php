@extends('client.master')
@section('content')
<section class="movie-details-area" data-background="/assets_client/img/bg/movie_details_bg.jpg">
    <div id="app" class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="episode-watch-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="season">Tên Phim: {{ $phim->ten_phim }} - Lịch Chiếu: {{ Carbon\Carbon::parse($phim->thoi_gian_bat_dau)->format('H:i d/m/Y')  }}</span>
                                    <span class="video-count">{{ $tongVe }} Vé đã đặt</span>
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <ul>
                                        @foreach ($dsGheBan as $key => $value)
                                        <li><a href="" class="popup-video"><i class="fa-solid fa-couch"></i>Ghế {{ $value->ten_ghe }}</a> <span class="duration"><i class="fa-solid fa-money-bill"></i> 15 đ</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="season">Tổng Tiền Thanh Toán</span>
                                    <span class="video-count">{{ number_format($tongVe * 15, 0, '.', ',') }}  vnđ</span>
                                </button>
                                <button class="btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="season">Thanh Toán Ngân Hàng VCB</span>
                                    <span class="video-count">Bạn cần thanh toán {{ number_format($tongVe * 15, 0, '.', ',') }} vnđ<br>Qua số tài khoản 9345884657. <br>Nội dung là {{ $maGiaoDich }}</span>
                                </button>
                                <button class="btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="season">Thời Gian Có Thể Thanh Toán</span>
                                    <span class="video-count">
                                        <a href="" class="btn" style="background-color: #e4d804; color: black">@{{ time }} s</a>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script>
        new Vue({
            el  :   '#app',
            data:    {
                time : 200,
            },
            created() {
                setInterval(() => {
                    if(this.time <= 1) {
                        toastr.error("Đã hết thời gian thanh toán");
                        window.location.replace("/");
                    }
                    this.time--;
                }, 1000);
            },
        });
    </script>
@endsection
