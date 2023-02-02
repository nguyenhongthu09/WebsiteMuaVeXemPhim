@extends('AdminRocker.share.master')
@section('noi_dung')
    <div class="row" id="app">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Phòng
                </div>
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label>Tên Phòng</label>
                        <input v-model="them_moi.ten_phong" type="text" class="form-control"  placeholder="Nhập vào tên phòng">
                    </div>
                    <div class="form-group mt-3">
                        <label>Tình Trạng</label>
                        <select  v-model="them_moi.tinh_trang"  class="form-control">
                            <option value="1">Còn Kinh Doanh</option>
                            <option value="0">Dừng Kinh Doanh</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label>Số Ghế Hàng Dọc</label>
                        <input v-model="them_moi.hang_doc"  type="number" class="form-control" >
                    </div>
                    <div class="form-group mt-3">
                        <label>Số Ghế Hàng Ngang</label>
                        <input  v-model="them_moi.hang_ngang" type="number" class="form-control" >
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button v-on:click="createPhong()" class="btn btn-primary">Thêm Mới Phòng</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Danh Sách Các Phòng
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên phòng</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Ghế Hàng Dọc</th>
                                <th class="text-center">Ghế Hàng Ngang</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in ds_phong">
                                <th class="align-middle text-center">@{{ key + 1 }}</th>
                                <td class="align-middle">@{{ value.ten_phong }}</td>
                                <td class="align-middle text-center text-nowrap">
                                    <button v-on:click="changeStatus(value.id)" class="btn btn-danger" v-if="value.tinh_trang == 0">Dừng Kinh Doanh</button>
                                    <button v-on:click="changeStatus(value.id)" class="btn btn-primary" v-else>Còn Kinh Doanh</button>
                                </td>
                                <td class="align-middle text-center">@{{ value.hang_doc }}</td>
                                <td class="align-middle text-center">@{{ value.hang_ngang }}</td>
                                <td class="align-middle text-center text-nowrap">
                                    <button v-on:click="loadGhe(value.id, value.hang_ngang, value.hang_doc)" class="ghe btn btn-primary " style="margin-right: 5px" data-bs-toggle="modal" data-bs-target="#gheModal">Xem Ghế</button>
                                    <button v-on:click="phong_update = value" data-bs-toggle="modal" data-bs-target="#editModal" style="margin-right: 5px" class="btn btn-info">Cập Nhật</button>
                                    <button v-on:click="delete_phong = value"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa Phòng</button>
                                </td>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xóa Phòng</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Chúng ta sẽ xóa Phòng, đồng nghĩa với việc Xóa tất cả Ghế của Phòng đó.</p>
                                        <p><b>Lưu ý:</b> Việc này không thể hoàn tác, hãy cẩn thận!</p>
                                        <input type="hidden" class="form-control" v-model="delete_phong.id"
                                            placeholder="Nhập vào id cần xóa">
                                    </div>
                                    <div class="modal-footer" >
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="xoaPhong()" type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Chấp Nhận Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Phòng</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" id="edit_id">
                                        <div class="form-group mt-1">
                                            <label>Tên Phòng</label>
                                            <input  v-model="phong_update.ten_phong" type="text" class="form-control"
                                                placeholder="Nhập vào tên phòng">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Tình Trạng</label>
                                            <select  v-model="phong_update.tinh_trang"  class="form-control">
                                                <option v-bind:value="1">Còn Kinh Doanh</option>
                                                <option v-bind:value="0">Dừng Kinh Doanh</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Số Ghế Hàng Dọc</label>
                                            <input v-model="phong_update.hang_doc" type="number" class="form-control" >
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Số Ghế Hàng Ngang</label>
                                            <input v-model="phong_update.hang_ngang" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="capNhatPhong()" type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Cập Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </table>
                    <div class="modal fade" id="gheModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Danh Sách Các Ghế</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-primary text-center" role="alert">
                                        MÀN HÌNH
                                    </div>
                                    <table class="table table-bordered" id="table_ghe">
                                        <thead>

                                        </thead>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
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
            el      :   '#app',
            data    :   {
                them_moi   :   {},
                ds_phong   :   [],
                delete_phong  :   {},
                phong_update:   {},
            },
            created()   {
                this.createPhong();
                this.loadPhong();
            },
            methods :   {
                createPhong() {
                    axios
                        .post('/admin/phong/index' , this.them_moi)
                        .then((res) => {
                            toastr.success('Đã thêm mới phòng thành công!');
                            this.loadPhong();
                            this.them_moi = {};
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                loadPhong()  {
                    axios
                        .get('/admin/phong/data')
                        .then((res) => {
                            this.ds_phong = res.data.list;
                            console.log(this.ds_phong);
                        });
                },
                xoaPhong() {
                    console.log(this.delete_phong.id);
                    axios
                        .get('/admin/phong/delete/'+ this.delete_phong.id)
                        .then((res) => {
                            toastr.success('Đã xóa phòng thành công!');
                            this.loadPhong();
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                capNhatPhong() {
                    axios
                        .post('/admin/phong/update' , this.phong_update)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.messs);
                                this.loadPhong();
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

                loadGhe(id_phong, hang_ngang, hang_doc) {
                    console.log(id_phong);
                    axios
                        .get('/admin/phong/data-ghe/' + id_phong)
                        .then((res) => {
                            var list_ghe = res.data.danh_sach_ghe;
                            console.log(list_ghe);
                            var noi_dung   = '';
                            var x          = 0;
                            for(j = 0; j < hang_ngang; j++){
                                noi_dung += '<tr>';
                                for(i = 0; i < hang_doc; i++){
                                    x = j * hang_doc + i;
                                    if(list_ghe[x].tinh_trang) {
                                        noi_dung += '<th data-id="'+ list_ghe[x].id +'" class="change text-center aligin-middle" style="height: 70px; font-size: 30px; background-color: #DEF5E5">'+ list_ghe[x].ten_ghe +'</th>';
                                    } else {
                                        noi_dung += '<th data-id="'+ list_ghe[x].id +'" class="change text-center aligin-middle" style="height: 70px; font-size: 30px; background-color: red">'+ list_ghe[x].ten_ghe +'</th>';
                                    }
                                }
                                noi_dung += '</tr>';
                            }
                            $("#table_ghe thead").html(noi_dung);
                    });
                },

                changeStatus(id) {
                    axios
                        .get('/admin/phong/change-status/' + id)
                        .then((res) => {
                            this.loadPhong();
                            toastr.success('Đã đổi trạng thái thành công!');
                        });
                }
            },
        });
    </script>
@endsection
