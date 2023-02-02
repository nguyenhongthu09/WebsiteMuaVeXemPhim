@extends('AdminLTE.Share.master')
@section('noi_dung')
    <div class="row" >
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Phòng
                </div>
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label>Tên Phòng</label>
                        <input type="text" class="form-control" id="ten_phong" placeholder="Nhập vào tên phòng">
                    </div>
                    <div class="form-group mt-3">
                        <label>Tình Trạng</label>
                        <select id="tinh_trang" class="form-control">
                            <option value="1">Còn Kinh Doanh</option>
                            <option value="0">Dừng Kinh Doanh</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label>Số Ghế Hàng Dọc</label>
                        <input type="number" class="form-control" id="hang_doc">
                    </div>
                    <div class="form-group mt-3">
                        <label>Số Ghế Hàng Ngang</label>
                        <input type="number" class="form-control" id="hang_ngang">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button id="add" class="btn btn-primary">Thêm Mới Phòng</button>
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
                                        <input type="hidden" class="form-control" id="delete_id"
                                            placeholder="Nhập vào id cần xóa">
                                    </div>
                                    <div class="modal-footer" >
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button id="delete_accpect" type="button" class="btn btn-primary"
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
                                            <input type="text" class="form-control" id="edit_ten_phong"
                                                placeholder="Nhập vào tên phòng">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Tình Trạng</label>
                                            <select id="edit_tinh_trang" class="form-control">
                                                <option value="1">Còn Kinh Doanh</option>
                                                <option value="0">Dừng Kinh Doanh</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Số Ghế Hàng Dọc</label>
                                            <input type="number" class="form-control" id="edit_hang_doc">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label>Số Ghế Hàng Ngang</label>
                                            <input type="number" class="form-control" id="edit_hang_ngang">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button id="update_accpect" type="button" class="btn btn-primary"
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
        $(document).ready(function() {
            var id_phong    = 0;
            var hang_ngang  = 0;
            var hang_doc    = 0;
            $("#add").click(function() {
                var payload = {
                    'ten_phong': $("#ten_phong").val(),
                    'tinh_trang': $("#tinh_trang").val(),
                    'hang_doc': $("#hang_doc").val(),
                    'hang_ngang': $("#hang_ngang").val(),
                };
                axios
                    .post('/admin/phong/index', payload)
                    .then((res) => {
                        loadData();
                        toastr.success('Đã thêm mới thành công!');
                        $("#ten_phong").val('');
                        $("#tinh_trang").val('');
                        $("#hang_doc").val('');
                        $("#hang_ngang").val('');
                    });
            });

            $("#update_accpect").click(function() {
                var payload = {
                    'id': $("#edit_id").val(),
                    'ten_phong': $("#edit_ten_phong").val(),
                    'tinh_trang': $("#edit_tinh_trang").val(),
                    'hang_doc': $("#edit_hang_doc").val(),
                    'hang_ngang': $("#edit_hang_ngang").val(),
                };
                axios
                    .post('/admin/phong/update', payload)
                    .then((res) => {
                        loadData();
                        toastr.success('Đã cập nhật thành công!');
                    });
            });

            function loadData() {
                axios
                    .get('/admin/phong/data')
                    .then((res) => {
                        showTable(res.data.list);
                    });
            };

            function showTable(list_phong) {
                var noi_dung = '';
                $.each(list_phong, function(key, value) {
                    noi_dung += '<tr>';
                    noi_dung += '<th class="text-center align-middle">' + (key + 1) + '</th>';
                    noi_dung += '<td class="align-middle">' + value.ten_phong + '</td>';
                    noi_dung += '<td class="align-middle text-center">';
                    if (value.tinh_trang) {
                        noi_dung += '<button data-id="' + value.id +
                            '" class="xxx btn btn-primary">Đang Kinh Doanh</button>';
                    } else {
                        noi_dung += '<button data-id="' + value.id +
                            '" class="xxx btn btn-warning">Dừng Kinh Doanh</button>';
                    }
                    noi_dung += '</td>';
                    noi_dung += '<td class="align-middle text-center">' + value.hang_doc + '</td>';
                    noi_dung += '<td class="align-middle text-center">' + value.hang_ngang + '</td>';
                    noi_dung += '<td class="text-nowrap text-center align-middle">';
                    noi_dung += '<button data-id="' + value.id +
                        '" data-hangngang="'+ value.hang_ngang +'" data-hangdoc="'+ value.hang_doc +'" class="ghe btn btn-primary " style="margin-right: 5px" data-bs-toggle="modal" data-bs-target="#gheModal">Xem Ghế</button>';
                    noi_dung += '<button data-id="' + value.id +
                        '" class="edit btn btn-info mr-1" data-bs-toggle="modal" style="margin-right: 5px" data-bs-target="#editModal">Cập Nhật</button>';
                    noi_dung += '<button data-id="' + value.id +
                        '" class="del btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa Phòng</button>';
                    noi_dung += '</td>';
                    noi_dung += '</tr>';
                });

                $("#table tbody").html(noi_dung);
            }

            $("body").on('click', '.xxx', function() {
                var id = $(this).data('id');
                axios
                    .get('/admin/phong/change-status/' + id)
                    .then((res) => {
                        loadData();
                        toastr.success('Đã đổi trạng thái thành công!');
                    });
            });

            $("body").on('click', '.del', function() {
                var id = $(this).data('id');
                $("#delete_id").val(id);
            });

            $("body").on('click', '.edit', function() {
                var id = $(this).data('id');
                axios
                    .get('/admin/phong/edit/' + id)
                    .then((res) => {
                        var phong = res.data.data;
                        $("#edit_id").val(phong.id);
                        $("#edit_ten_phong").val(phong.ten_phong);
                        $("#edit_hang_ngang").val(phong.hang_ngang);
                        $("#edit_hang_doc").val(phong.hang_doc);
                        $("#edit_tinh_trang").val(phong.tinh_trang);
                    });
            });

            $("#delete_accpect").click(function() {
                var id_can_xoa = $("#delete_id").val();
                axios
                    .get('/admin/phong/delete/' + id_can_xoa)
                    .then((res) => {
                        loadData();
                        toastr.success('Đã xóa phòng kèm ghế thành công!');
                    });
            })

            function loadGhe(id_phong, hang_ngang, hang_doc)
            {
                axios
                    .get('/admin/phong/data-ghe/' + id_phong)
                    .then((res) => {
                        var list_ghe = res.data.danh_sach_ghe;

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
                        $("#table_ghe").html(noi_dung);
                });
            }

            $("body").on('click', '.ghe', function() {
                id_phong   = $(this).data('id');
                hang_ngang = $(this).data('hangngang');
                hang_doc   = $(this).data('hangdoc');
                loadGhe(id_phong, hang_ngang, hang_doc);
            });

            loadData();

        });

    </script>
@endsection
