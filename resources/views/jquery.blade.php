@extends('AdminLTE.Share.master')
@section('tieu_de')
    Demo JQuery
@endsection
@section('noi_dung')
<div id="xxx" class="row">
    <table class="table table-bordered" id="yyy">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Mã Sinh Viên</th>
                <th class="text-center">Họ Và Tên</th>
                <th class="text-center">Chuyên Cần</th>
                <th class="text-center">Giữa Kỳ</th>
                <th class="text-center">Cuối Kỳ</th>
                <th class="text-center">Xếp Loại</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
@section('js')
<script>
    var danh_sach_sinh_vien = [];
        var sinh_vien_1 = {
            stt     : '1',
            msv     : 'A12345',
            name    : 'Nguyễn Quốc Long',
            cc      : 5.5,
            gk      : 7.0,
            ck      : 8.0,
            tk      : 7.2,
            xl      : 'C',
        };

        var sinh_vien_2 = {
            stt     : '2',
            msv     : 'A12346',
            name    : 'Nguyễn Quốc Vương',
            cc      : 4.5,
            gk      : 9.2,
            ck      : 9.0,
            tk      : 8.1,
            xl      : 'A',
        };

        danh_sach_sinh_vien.push(sinh_vien_1);
        danh_sach_sinh_vien.push(sinh_vien_2);

        var noi_dung = '';
        $.each(danh_sach_sinh_vien, function(key, value) {
            noi_dung += '<tr>';
            noi_dung += '<th class="text-center">'+ (key + 1) +'</th>';
            noi_dung += '<td>'+ value.msv +'</td>';
            noi_dung += '<td>'+ value.name +'</td>';
            noi_dung += '<td class="text-center">'+ value.cc +'</td>';
            noi_dung += '<td class="text-center">'+ value.gk +'</td>';
            noi_dung += '<td class="text-center">'+ value.ck +'</td>';
            noi_dung += '<td class="text-center">'+ value.tk +'</td>';
            noi_dung += '<td class="text-center">'+ value.xl +'</td>';
            noi_dung += '<td class="text-center">';
            noi_dung += '<button class="btn btn-info">Cập Nhật</button>';
            noi_dung += '<button class="btn btn-danger">Xóa Bỏ</button>';
            noi_dung += '</td>';
            noi_dung += '</tr>';
        });

        $("#yyy tbody").html(noi_dung);
</script>
@endsection
