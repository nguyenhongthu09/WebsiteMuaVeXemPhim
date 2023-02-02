@extends('AdminLTE.Share.master')
@section('tieu_de')
    Demo VueJS
@endsection
@section('noi_dung')
    <div id="xxx" class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Danh Sách Các Phòng
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered">
                        <thead>
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
                            <tr v-for="(value, key) in list_phong">
                                <th>@{{ key + 1 }}</th>
                                <td>@{{ value.ten_phong }}</td>
                                <td>@{{ value.tinh_trang }}</td>
                                <td>@{{ value.hang_ngang }}</td>
                                <td>@{{ value.hang_doc }}</td>
                                <td>
                                    <button v-on:click="phong_edit = value" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Cập Nhật</button>
                                    <button class="btn btn-danger">Xóa Bỏ</button>
                                </td>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <label>id</label>
                                <input v-bind:value="phong_edit.id" type="text" class="mb-2 form-control">
                                <label>Tên phòng</label>
                                <input v-bind:value="phong_edit.ten_phong" type="text" class="mb-2 form-control">
                                <label>Tình Trạng</label>
                                <input v-bind:value="phong_edit.tinh_trang" type="text" class="mb-2 form-control">
                                <label>Hàng Ngang</label>
                                <input v-bind:value="phong_edit.hang_ngang" type="text" class="mb-2 form-control">
                                <label>Hàng Dọc</label>
                                <input v-bind:value="phong_edit.hang_doc" type="text" class="mb-2 form-control">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    new Vue({
        el  :   '#xxx',
        data:   {
            list_phong  :   [],
            phong_edit  :   {},
        },
        created(){
            this.loadData();
        },
        methods: {
            loadData() {
                axios
                    .get('/admin/phong/data')
                    .then((res) => {
                        this.list_phong = res.data.list;
                    });
            },
        },
    });
</script>
@endsection
