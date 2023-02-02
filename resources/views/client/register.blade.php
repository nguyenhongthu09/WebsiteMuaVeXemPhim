@extends('client.master')
@section('content')
<section class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="widget-title mb-50">
                        <h5 class="title">Đăng Ký Tài Khoản</h5>
                    </div>
                    <div class="contact-form">
                        <form method="post" action="/register">
                            @csrf
                            <div class="col-md-12">
                                {{-- @error('ho_va_ten')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <input name="ho_va_ten" type="text"  placeholder="Nhập vào họ và tên">
                            </div>
                            <div class="col-md-12">
                                {{-- @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <input name="email" type="email"  placeholder="Nhập vào email">
                            </div>
                            <div class="col-md-12">
                                {{-- @error('so_dien_thoai')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <input name="so_dien_thoai" type="tel"  placeholder="Nhập vào số điện thoại">
                            </div>
                            <div class="col-md-12">
                                {{-- @error('dia_chi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <input name="dia_chi" type="text"  placeholder="Nhập vào địa chỉ">
                            </div>
                            <div class="col-md-12">
                                {{-- @error('ngay_sinh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <input name="ngay_sinh" type="date"  placeholder="Nhập vào ngày sinh">
                            </div>
                            <div class="col-md-12">
                                {{-- @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <input name="password" type="password"  placeholder="Nhập vào mật khẩu">
                            </div>
                            <div class="col-md-12">
                                {{-- @error('re_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <input name="re_password" type="password"  placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="col-md-12">
                                {{-- @error('gioi_tinh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                <select name="gioi_tinh" style="background-color: #1f1e24; color: #bcbcbc; border: 1px solid #1f1e24; padding: 14px 25px; margin-bottom: 30px; width: 100%;">
                                    <option value="1">Giới Tính Nam</option>
                                    <option value="0">Giới Tính Nữ</option>
                                </select>
                            </div>
                            {{-- <div class="col-md-12">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/login" class="btn">Đăng Nhập</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn">Đăng Ký</button>
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
