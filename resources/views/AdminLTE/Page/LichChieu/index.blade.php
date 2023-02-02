@extends('AdminRocker.share.master')
@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-12">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-header">
                <strong> Thêm Mới Lịch Chiếu </strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Chọn Phim</label>
                        <select v-on:change="updateThoiGian()" v-model="create_lich.id_phim_xxx" class="form-control">
                            <template v-for="(value, key) in list_phim" v-if="value.tinh_trang > 0">
                                <option v-bind:value="{id_phim : value.id, thoi_luong: value.thoi_luong}">@{{ value.ten_phim }}</option>
                            </template>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Thời Lượng Chiếu Chính</label>
                        <input v-model="create_lich.thoi_gian_chieu_chinh" type="number" min="0" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Thời Lượng Quảng Cáo</label>
                        <input v-model="create_lich.thoi_gian_quang_cao" type="number" min="0" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label class="form-label">Ngày Bắt Đầu</label>
                        <input v-model="create_lich.ngay_bat_dau" type="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Ngày Kết Thúc</label>
                        <input v-model="create_lich.ngay_ket_thuc" type="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Giờ Bắt Đầu</label>
                        <input v-model="create_lich.gio_bat_dau" type="time" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Giờ Kết Thúc</label>
                        <input v-model="create_lich.gio_ket_thuc" type="time" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="form-label">Chọn Thứ</label><br>
                        <div class="form-check form-check-inline">
                            <input v-model="create_lich.thu_1" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Thứ 2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input v-model="create_lich.thu_2" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Thứ 3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input v-model="create_lich.thu_3" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                            <label class="form-check-label" for="inlineCheckbox2">Thứ 4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input v-model="create_lich.thu_4" class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                            <label class="form-check-label" for="inlineCheckbox2">Thứ 5</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input v-model="create_lich.thu_5" class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5">
                            <label class="form-check-label" for="inlineCheckbox2">Thứ 6</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input v-model="create_lich.thu_6" class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
                            <label class="form-check-label" for="inlineCheckbox2">Thứ 7</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input v-model="create_lich.thu_0" class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7">
                            <label class="form-check-label" for="inlineCheckbox2">Chủ Nhật</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Chọn Phòng Chiếu</label>
                        <select v-model="create_lich.id_phong" class="form-control">
                            <template v-for="(value, key) in list_phong" v-if="value.tinh_trang == 1">
                                <option v-bind:value="value.id">@{{ value.ten_phong }}</option>
                            </template>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button v-on:click="createLichChieu()" class="btn btn-primary">Thêm Mới Lịch Chiếu</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el  :   '#app',
        data:   {
            create_lich :   {},
            list_phim   :   [],
            list_phong  :   [],
        },
        created()   {
            this.loadDataPhim();
            this.loadDataPhong();
        },
        methods :   {
            createLichChieu() {
                axios
                    .post('/admin/lich-chieu/index', this.create_lich)
                    .then((res) => {
                        toastr.success('Đã thêm mới lịch chiếu thành công!');
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });

            },
            loadDataPhim() {
                axios
                    .get('/admin/phim/data')
                    .then((res) => {
                        this.list_phim = res.data.phim;
                    });
            },
            loadDataPhong() {
                axios
                    .get('/admin/phong/data')
                    .then((res) => {
                        this.list_phong = res.data.list;
                    });
            },
            updateThoiGian() {
                this.create_lich.thoi_gian_chieu_chinh = this.create_lich.id_phim_xxx.thoi_luong;
                this.create_lich.id_phim = this.create_lich.id_phim_xxx.id_phim;
            }
        },
    });
</script>
@endsection
