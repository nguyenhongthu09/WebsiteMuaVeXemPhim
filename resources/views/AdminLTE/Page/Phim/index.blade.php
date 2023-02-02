@extends('AdminLTE.Share.master')
@section('tieu_de')
    Quản Lý Phim
@endsection
@section('noi_dung')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Thêm Mới Phim
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Phim</label>
                        <input type="text" class="form-control" id="ten_phim" placeholder="Nhập vào tên phim">
                    </div>
                    <div class="form-group">
                        <label>Slug Tên Phim</label>
                        <input type="text" class="form-control" id="slug_ten_phim" placeholder="Nhập vào slug tên phim">
                    </div>
                    <div class="form-group">
                        <label>Ngày Khởi Chiếu</label>
                        <input type="date" class="form-control" id="ngay_khoi_chieu" placeholder="Nhập vào tên phim">
                    </div>
                    <div class="form-group">
                        <label>Đạo Diễn</label>
                        <input type="text" class="form-control" id="dao_dien" placeholder="Nhập vào tên đạo diễn">
                    </div>
                    <div class="form-group">
                        <label>Diễn Viên</label>
                        <input type="text" class="form-control" id="dien_vien" placeholder="Nhập vào tên diễn viên">
                    </div>
                    <div class="form-group">
                        <label>Thời Lượng</label>
                        <input type="number" class="form-control" id="thoi_luong" placeholder="Nhập vào phút">
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea id="mo_ta" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <input type="text" class="form-control" id="the_loai" placeholder="Nhập vào thể loại">
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input type="text" class="form-control" id="avatar" placeholder="Nhập vào link ảnh">
                    </div>
                    <div class="form-group">
                        <label>Trailer</label>
                        <input type="text" class="form-control" id="trailer" placeholder="Nhập vào link trailer">
                    </div>
                    <div class="form-group">
                        <label>Tình Trạng</label>
                        <select id="tinh_trang" class="form-control">
                            <option value="1">Đang Chiếu</option>
                            <option value="2">Sắp Chiếu</option>
                            <option value="0">Ngưng Chiếu</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                       <button class="btn btn-primary" id="themmoiphim">Thêm Mới Phim</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="table-responsive">
                <table class="table table-bordered" id="table_phim">
                    <thead class="bg-primary">
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Tên Phim</th>
                            <th>Ngày Khởi Chiếu</th>
                            <th>Đạo Diễn</th>
                            <th>Diễn Viên</th>
                            <th>Thời Lượng</th>
                            <th>Mô Tả</th>
                            <th>Thể Loại</th>
                            <th>Avatar</th>
                            <th>Trailer</th>
                            <th>Tình Trạng</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <a target="_blank" href=""></a>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#themmoiphim').click(function(){
                var payload = {
                    'ten_phim'          : $("#ten_phim").val(),
                    'slug_ten_phim'     : $("#slug_ten_phim").val(),
                    'dao_dien'          : $("#dao_dien").val(),
                    'ngay_khoi_chieu'   : $("#ngay_khoi_chieu").val(),
                    'dien_vien'         : $("#dien_vien").val(),
                    'the_loai'          : $("#the_loai").val(),
                    'thoi_luong'        : $("#thoi_luong").val(),
                    'mo_ta'             : $("#mo_ta").val(),
                    'avatar'            : $("#avatar").val(),
                    'trailer'           : $("#trailer").val(),
                    'tinh_trang'        : $("#tinh_trang").val(),
                };
                axios
                    .post('/admin/phim/create' , payload)
                    .then((res) => {
                        console.log(res.data.trang_thai_them_moi);
                        if(res.data.slug) {
                            toastr.error('Tên Phim đã tồn tại!');
                        } else {
                            if(res.data.trang_thai_them_moi) {
                                toastr.success('Thêm mới thành công!');
                            } else {
                                toastr.error('bạn đã rơi vào ô mất lượt');
                            }
                        }
                    });
            });


            loadTable();

            function loadTable() {
                var noi_dung = '';
                axios
                    .get('/admin/phim/data')
                    .then((res) => {
                        var list = res.data.phim;
                        var noi_dung ='';
                        $.each(list , function(key , value){
                            noi_dung += '<tr>';
                            noi_dung += '<th class="align-middle">'+ (key + 1) +'</th>';
                            noi_dung += '<td class="align-middle">'+ value.ten_phim +'</td>';
                            noi_dung += '<td class="align-middle">'+ value.ngay_khoi_chieu +'</td>';
                            noi_dung += '<td class="align-middle">'+ value.dao_dien +'</td>';
                            noi_dung += '<td class="align-middle">'+ value.dien_vien.substring(0, 50) +' ...</td>';
                            noi_dung += '<td class="align-middle">'+ value.thoi_luong +'</td>';
                            noi_dung += '<td class="align-middle">'+ value.mo_ta.substring(0, 100) +' ...</td>';
                            noi_dung += '<td class="align-middle">'+ value.the_loai +'</td>';
                            noi_dung += '<td class="align-middle"><img  src="'+value.avatar+'" alt=""></td>';
                            noi_dung += '<td class="align-middle"><a target="_blank" href="'+value.trailer+'">TRAILER</a></td>';
                            noi_dung += '<td class="align-middle text-nowrap">';
                            if(value.tinh_trang == 1) {
                                noi_dung += '<button class="btn btn-success">Đang Chiếu</button>';
                            } else if(value.tinh_trang == 2) {
                                noi_dung += '<button class="btn btn-warning">Sắp Chiếu</button>';
                            } else {
                                noi_dung += '<button class="btn btn-danger">Ngừng Chiếu</button>';
                            }
                            noi_dung +='</td>';
                            noi_dung += '<td class="text-nowrap">';
                            noi_dung += '<button class="btn btn-info">Edit</button>';
                            noi_dung += '<button class="btn btn-danger">Delete</button>';
                            noi_dung += '</td>';
                            noi_dung += '</tr>';
                        });
                        $("#table_phim tbody").html(noi_dung);
                    });
            }
        });
    </script>
@endsection
