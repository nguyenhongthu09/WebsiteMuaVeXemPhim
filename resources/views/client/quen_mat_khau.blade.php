@extends('client.master')
@section('content')
<section class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="widget-title mb-50">
                        <h5 class="title">Đăng Nhập</h5>
                    </div>
                    <div class="contact-form">
                        <form action="/reset-password" method="post">
                            @csrf
                            <div class="col-md-12">
                                <input name="email" type="text" placeholder="Nhập vào địa chỉ email">
                            </div>
                            <div class="col-md-12">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn">Quên Mật Khẩu</button>
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
                    <p><span>Find solutions :</span> to common problems, or get help from a support agent industry's standard .</p>
                    <div class="contact-info-list">
                        <ul>
                            <li>
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <p><span>Address :</span> W38 Park Road New York</p>
                            </li>
                            <li>
                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                <p><span>Phone :</span> (09) 123 854 365</p>
                            </li>
                            <li>
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <p><span>Email :</span> support@movflx.com</p>
                            </li>
                        </ul>
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
