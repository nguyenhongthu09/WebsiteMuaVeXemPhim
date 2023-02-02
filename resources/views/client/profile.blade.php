@extends('client.master')
@section('content')
<section class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
    <div class="container">
        @php
            $user = Auth::guard('customer')->user();
        @endphp
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="widget-title mb-50">
                        <h5 class="title">Cập Nhập Thông Tin</h5>
                    </div>
                    <div class="contact-form">
                        <form action="/client/cap-nhap-thong-tin" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="col-md-12">
                                <input name="ho_va_ten" value="{{ $user->ho_va_ten }}" type="text" placeholder="Nhập vào họ và tên">
                            </div>
                            <div class="col-md-12">
                                <input name="email" value="{{ $user->email }}" type="text" placeholder="Nhập vào địa chỉ email">
                            </div>
                            <div class="col-md-12">
                                <input name="so_dien_thoai" value="{{ $user->so_dien_thoai }}" type="text" placeholder="Nhập vào số điện thoại">
                            </div>
                            <div class="col-md-12">
                                <input name="dia_chi" value="{{ $user->dia_chi }}" type="text" placeholder="Nhập vào địa chỉ">
                            </div>
                            <div class="col-md-12">
                                <input name="ngay_sinh" value="{{ $user->ngay_sinh }}" type="date" placeholder="Nhập vào ngày sinh">
                            </div>
                            <div class="col-md-12">
                                <select name="gioi_tinh" style="background-color: #1f1e24; color: #bcbcbc; border: 1px solid #1f1e24; padding: 14px 25px; margin-bottom: 30px; width: 100%;">
                                    <option value="1" {{ $user->gioi_tinh == 1 ? 'selected' : '' }}>Giới Tính Nam</option>
                                    <option value="0" {{ $user->gioi_tinh == 0 ? 'selected' : '' }}>Giới Tính Nữ</option>
                                </select>
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
