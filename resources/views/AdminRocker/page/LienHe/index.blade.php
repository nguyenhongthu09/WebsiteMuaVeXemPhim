@extends('AdminRocker.share.master')
@section('noi_dung')
    <div class="row" id="app">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Danh sách liên hệ chờ xử lý
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Họ Và Tên</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Tiêu Đề</th>
                                <th class="text-center">Nội Dung</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_lien_he">
                                <th>@{{ key + 1 }}</th>
                                <td>@{{ value.ho_va_ten }}</td>
                                <td>@{{ value.email }}</td>
                                <td>@{{ value.tieu_de }}</td>
                                <td>@{{ value.noi_dung }}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning">Chờ xử lý</button>
                                </td>
                                <td class="text-center">
                                    <button v-on:click="deleteLienHe = value" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-danger">
                                Bạn có chắc chắn xóa không !!!
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                              <button v-on:click="deletelienHe()" type="button" class="btn btn-primary">Xóa</button>
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
        el      :  '#app',
        data    :  {
            list_lien_he    :   [],
            deleteLienHe    :   {},
        },
        created() {
            this.loadData();
        },
        methods :   {
            loadData() {
                axios
                    .get('/admin/lien-he/data')
                    .then((res) => {
                        this.list_lien_he = res.data.data;
                    });
            },

            deletelienHe(){
                axios
                    .post('/admin/lien-he/delete', this.deleteLienHe)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message);
                            this.loadData();
                            $('#deleteModal').modal('hide');
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
