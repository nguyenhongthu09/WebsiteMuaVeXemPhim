@extends('AdminRocker.share.master')
@section('noi_dung')
<div class="row" id="app">
    <div class="col-md-12">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-header">
                <strong> Thêm Mới Bài Viết </strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" v-model="them_moi.tieu_de" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Hình ảnh</label>
                        <div class="input-group">
                            <input id="hinh_anh" class="form-control" type="text">
                            <span class="input-group-prepend">
                                <a id="lfm" data-input="hinh_anh" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:200px;">
                            <img style="height:200px;" src="" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label">Mô tả ngắn bài viết</label>
                        <textarea v-model="them_moi.mo_ta_ngan" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Nội dung chính bài viết</label>
                        <textarea v-model="them_moi.noi_dung" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button v-on:click="createBaiViet()" class="btn btn-primary">Thêm Mới Bài Viết</button>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tiêu Đề</th>
                                <th class="text-center">Hình Ảnh</th>
                                <th class="text-center">Mô Tả Ngắn Bài Viết</th>
                                <th class="text-center">Nội Dung Chính Bài Viết</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_bai_viet">
                                <th class="text-nowrap align-middle">@{{ key + 1 }}</th>
                                <td class="text-nowrap align-middle">@{{ value.tieu_de }}</td>
                                <td class="text-nowrap align-middle">
                                   <template v-for="(v_im , k_im) in value.hinh_anh.split(',')">
                                       <img v-bind:src="v_im" style="max-width: 100px;" alt="">
                                   </template>
                                </td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-info" v-on:click="mo_ta_ngan = value.mo_ta_ngan" data-bs-toggle="modal" data-bs-target="#motanganModal">Mô tả ngắn</button>
                                </td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-info" v-on:click="noi_dung = value.noi_dung" data-bs-toggle="modal" data-bs-target="#noidungModal">Nội dung</button>
                                </td>
                                <td class="text-nowrap align-middle text-center">
                                    <button v-on:click="doiTrangThai(value.id)" v-if="value.is_open == 1" class="btn btn-success">Hiển thị</button>
                                    <button v-on:click="doiTrangThai(value.id)" v-else class="btn btn-danger">Tạm tắt</button>
                                </td>
                                <td class="text-nowrap align-middle text-center">
                                    <button v-on:click ="editBaiViet(edit = value)" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-primary">Cập nhật</button>
                                    <button v-on:click ="deleteBV = value"  data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cập nhật bài viết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" hidden v-model="edit.id">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Tiêu đề</label>
                                        <input type="text" v-model="edit.tieu_de" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Hình ảnh</label>
                                        <div class="input-group">
                                            <input id="hinh_anh_edit" class="form-control" type="text">
                                            <span class="input-group-prepend">
                                                <a id="lfm_edit" data-input="hinh_anh_edit" data-preview="holder_edit" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                        </div>
                                        <div id="holder_edit" style="margin-top:15px;max-height:200px;">
                                            <img style="height:200px;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Mô tả ngắn bài viết</label>
                                        <textarea v-model="edit.mo_ta_ngan" class="form-control" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Nội dung chính bài viết</label>
                                        <textarea v-model="edit.noi_dung" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" v-on:click="updateBaiViet()">Cập nhật</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa bài viết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-danger">Bạn có chắc chắn xóa bài viết không !!!</h4>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" v-on:click="deleteBaiViet()" class="btn btn-primary">Xóa</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal fade" id="motanganModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mô tả ngắn</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <textarea disabled cols="30" rows="10" class="form-control">@{{mo_ta_ngan}}</textarea>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal fade" id="noidungModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nội dung bài viết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <textarea disabled cols="30" rows="10" class="form-control">@{{noi_dung}}</textarea>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </div>
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
            them_moi        :   {},
            edit            :   {},
            deleteBV        :   {},
            list_bai_viet   :   [],
            noi_dung        :   '',
            mo_ta_ngan      :   '',
        },
        created()   {
            this.loadData();
        },
        methods :   {
            createBaiViet(){
                this.them_moi.hinh_anh = $("#hinh_anh").val();
                axios
                    .post('/admin/bai-viet/create' , this.them_moi)
                    .then((res) => {
                        if(res.data.status){
                            toastr.success(res.data.message);
                            this.loadData();
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },

            loadData(){
                axios
                    .get('/admin/bai-viet/data')
                    .then((res) => {
                        this.list_bai_viet = res.data.data;
                    });
            },

            editBaiViet(edit){
                $('#hinh_anh_edit').val(edit.hinh_anh);
                var text = '';
                $.each(edit.hinh_anh.split(','), function(k, v){
                    text += '<img src="'+ v + '" style="margin-top:15px;max-height:100px;">'
                });
                $("#holder_edit").html(text);
            },

            updateBaiViet(){
                this.edit.hinh_anh = $("#hinh_anh_edit").val();
                axios
                    .post('/admin/bai-viet/update' , this.edit)
                    .then((res) => {
                        if(res.data.status){
                            toastr.success(res.data.message);
                            this.loadData();
                            $('#editModal').modal('hide');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },

            deleteBaiViet(){
                console.log(this.deleteBV);
                axios
                    .post('/admin/bai-viet/delete', this.deleteBV)
                    .then((res) => {
                        if(res.data.status){
                            toastr.success(res.data.message);
                            this.loadData();
                            $('#deleteModal').modal('hide');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
            },

            doiTrangThai(id){
                axios
                    .get('/admin/bai-viet/status/' + id)
                    .then((res) => {
                        if(res.data.status){
                            toastr.success(res.data.message);
                            this.loadData();
                        }
                    });
            },
        },
    });
</script>
<script>
    var route_prefix = "/laravel-filemanager";
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $("#lfm").filemanager('image', {prefix : route_prefix});
    $("#lfm_edit").filemanager('image', {prefix : route_prefix});
</script>
@endsection
