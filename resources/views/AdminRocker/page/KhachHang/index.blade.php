@extends('AdminRocker.share.master')
@section('noi_dung')
<div class="card" id="app">
    <div class="card-header">
       <h5> Danh Sách Khách Hàng Đã Đăng Ký</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center text-nowrap">#</th>
                    <th class="text-center text-nowrap">Họ Và Tên</th>
                    <th class="text-center text-nowrap">Email</th>
                    <th class="text-center text-nowrap">Số Điện Thoại</th>
                    <th class="text-center text-nowrap">Địa Chỉ</th>
                    <th class="text-center text-nowrap">Ngày Sinh</th>
                    <th class="text-center text-nowrap">Giới Tính</th>
                    <th class="text-center text-nowrap">Tình Trạng</th>
                    <th class="text-center text-nowrap">Kích Hoạt</th>
                    <th class="text-center text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(value, key) in list">
                    <th class="text-nowrap text-center align-middle">@{{key + 1}}</th>
                    <td class="text-nowrap align-middle">@{{value.ho_va_ten}}</td>
                    <td class="text-nowrap align-middle">@{{value.email}}</td>
                    <td class="text-nowrap text-center align-middle">@{{value.so_dien_thoai}}</td>
                    <td class="text-nowrap text-center align-middle">@{{value.dia_chi}}</td>
                    <td class="text-nowrap text-center align-middle">@{{ date_format(value.ngay_sinh) }}</td>
                    <td class="text-nowrap text-center align-middle">@{{value.gioi_tinh == 1 ? 'Nam' : 'Nữ'}}</td>
                    <td class="text-nowrap text-center align-middle">
                        <button v-on:click="changeStatus(value.id)" class="btn btn-danger" v-if="value.loai_tai_khoan == -1">Tạm Khóa</button>
                        <button v-on:click="changeStatus(value.id)"  class="btn btn-success" v-else>Đang Mở</button>

                    </td>
                    <td class="text-nowrap text-center align-middle">
                        <button  v-on:click="kichHoat(value.id)" class="btn btn-warning" v-if="value.loai_tai_khoan == 1">Hủy Kích Hoạt</button>
                        <button v-on:click="kichHoat(value.id)" class="btn btn-info" v-else >Kích Hoạt</button>
                    </td>
                    <td class="text-nowrap text-center align-middle">
                        <button v-on:click="password_new = value" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#doiMatKhau">Đổi Mật Khẩu</button>
                        <button v-on:click="edit = value" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#capNhatModal">Cập Nhật</button>
                        <button v-on:click="xoa = value" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#xoaModal">Xóa</button>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>

        <div class="modal fade" id="capNhatModal" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cập Nhật Khách Hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-2">

                            <input v-model="edit.id" type="hidden" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Họ Và Tên</label>
                            <input v-model="edit.ho_va_ten" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Email</label>
                            <input v-model="edit.email" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Số Điện Thoại</label>
                            <input v-model="edit.so_dien_thoai" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Địa Chỉ</label>
                            <input v-model="edit.dia_chi" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Ngày Sinh</label>
                            <input v-model="edit.ngay_sinh" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Giới Tính</label>
                            <select v-model="edit.gioi_tinh"  class="form-control">
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button v-on:click="updateKhachHang()" type="button" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="xoaModal" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"v-model="xoa.id" >
                        Ban chắc chắn là sẽ xoá khách hàng <b class="text-danger">@{{ xoa.ho_va_ten }}</b> này!<br>
                        <b>Lưu ý: Hành động này không thể khôi phục!</b>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button v-on:click="xoaKhachHang()" type="button" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="doiMatKhau" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Đổi Mật Khẩu Khách Hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                Thay Đổi Mật Khẩu Khách Hàng
                            </div>
                            <div class="card-body">
                                <div class="form-group mt-2">
                                    <label>Mật Khẩu Mới</label>
                                    <input type="password"  v-model="password_new.password"  name="password" class="form-control"  >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button v-on:click="changePassWord()" type="button" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el      :  '#app',
        data    :  {
            list                :   [],
            edit                :   {},
            xoa                 :  {},
            password_new        : {},
        },
        created() {
            this.loadData();
        },
        methods :   {
            date_format(now) {
                return moment(now).format('DD/MM/yyyy');
            },
            number_format(number, decimals = 2, dec_point = ",", thousands_sep = ".") {
                var n = number,
                c = isNaN((decimals = Math.abs(decimals))) ? 2 : decimals;
                var d = dec_point == undefined ? "," : dec_point;
                var t = thousands_sep == undefined ? "." : thousands_sep,
                    s = n < 0 ? "-" : "";
                var i = parseInt((n = Math.abs(+n || 0).toFixed(c))) + "",
                    j = (j = i.length) > 3 ? j % 3 : 0;

                return (s +(j ? i.substr(0, j) + t : "") +i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) +(c? d +
                        Math.abs(n - i)
                            .toFixed(c)
                            .slice(2)
                        : "")
                );
            },
            loadData() {
                axios
                    .get('/admin/khach-hang/data')
                    .then((res) => {
                        this.list = res.data.data;
                        this.loadData();
                    });
            },
            updateKhachHang() {
                axios
                    .post('/admin/khach-hang/update', this.edit)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success('Đã cập nhật thành công!');
                            this.loadData();
                            $('#capNhatModal').modal('hide');
                        } else {
                            toastr.error('Có lỗi không mong muốn!');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
            xoaKhachHang() {
                axios
                    .post('/admin/khach-hang/delete' , this.xoa)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success('Đã xóa khách hàng thành công!');
                            this.loadData();
                            $('#xoaModal').modal('hide');
                        } else {
                            toastr.error('Có lỗi không mong muốn!');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },
            changeStatus(id) {
                axios
                    .get('/admin/khach-hang/change-status/' + id)
                    .then((res) => {
                        this.loadData();
                        toastr.success('Đã đổi trạng thái thành công!');
                    });
            },
            kichHoat(id) {
                axios
                    .get('/admin/khach-hang/kich-hoat/' + id)
                    .then((res) => {
                        this.loadData();
                        toastr.success('Đã Kích hoạt thành công!');
                    });
            },
            changePassWord() {
                axios
                    .post('/admin/khach-hang/change-password', this.password_new)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success('Thay đổi mật khẩu thành công!');
                            this.loadData();
                            $('#doiMatKhau').modal('hide');
                        } else {
                            toastr.error('Có lỗi không mong muốn!');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },


        }
    });
</script>
@endsection
