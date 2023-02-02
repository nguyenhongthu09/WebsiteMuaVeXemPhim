@extends('AdminRocker.share.master')
@section('noi_dung')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    XXXXXXXXXXX
                </div>
                <div class="card-body">
                    <label class="form-label">XXXXXX</label>
                    <input class="form-control" type="text" name="" id="">
                    <label class="form-label">XXXXXX</label>
                    <input class="form-control" type="text" name="" id="">
                    <label class="form-label">XXXXXX</label>
                    <input class="form-control" type="text" name="" id="">
                    <label class="form-label">XXXXXX</label>
                    <input class="form-control" type="text" name="" id="">
                    <button class="btn btn-primary">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Danh Sách
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">#</th>
                                <th class="text-center">#</th>
                                <th class="text-center">#</th>
                                <th class="text-center">#</th>
                                <th class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
                            <tr>
                                <th>1</th>
                                <td>XXXXX</td>
                                <td>XXXXX</td>
                                <td>XXXXX</td>
                                <td>XXXXX</td>
                                <td>
                                    <button class="btn btn-info">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
