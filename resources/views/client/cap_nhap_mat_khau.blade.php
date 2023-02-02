@extends('client.master')
@section('content')
<section class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="widget-title mb-50">
                        <h5 class="title">Cập Nhập Mật Khẩu</h5>
                    </div>
                    <div class="contact-form">
                        <form action="/client/cap-nhap-mat-khau" method="post">
                            @csrf
                            <div class="col-md-12">
                                <input name="password" type="password" placeholder="Nhập vào mật khẩu">
                            </div>
                            <div class="col-md-12">
                                <input name="re_password" type="password" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn">Cập Nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="widget-title mb-50">
                    <h5 class="title">Thông Tin Về Chúng Tôi</h5>
                </div>
                <div class="contact-info-wrap">
                    <p><span>DZFullStack Cinema :</span> Tận hưởng từng khoảnh khắc của bạn</p>
                    <div class="contact-info-list">
                        <ul>
                            <li>
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <p><span>Address :</span> 32 Xuân Diệu, Thuận Phước, Hải Châu, Đà Nẵng</p>
                            </li>
                            <li>
                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                <p><span>Phone :</span> 0905523543</p>
                            </li>
                            <li>
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <p><span>Email :</span> dzfullstack@gmail.com</p>
                            </li>
                        </ul>
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
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
@endsection
