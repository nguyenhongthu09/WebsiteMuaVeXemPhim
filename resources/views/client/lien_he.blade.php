@extends('client.master')
@section('content')
<div id="app">
    <!-- contact-area -->
    <section class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-form-wrap">
                        <div class="widget-title mb-50">
                            <h5 class="title">Contact Form</h5>
                        </div>
                        <div class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" v-model="themmoi.ho_va_ten" placeholder="You Name *">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" v-model="themmoi.email" placeholder="You  Email *">
                                </div>
                            </div>
                            <input type="text" v-model="themmoi.tieu_de" placeholder="Subject *">
                            <textarea name="message" v-model="themmoi.noi_dung" placeholder="Type Your Message..."></textarea>
                            <button class="btn" type="button" v-on:click="sendLienHen()">Send Message</button>
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
    <!-- contact-area-end -->
</div>
@endsection
@section('js')
<script>
    new Vue({
        el  :   '#app',
        data:   {
            themmoi     :   {},
        },
        created() {

        },
        methods:    {
            sendLienHen(){
                axios
                    .post('/send-lien-he', this.themmoi)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message);
                            this.themmoi = {};
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
        },
    });
</script>
@endsection
