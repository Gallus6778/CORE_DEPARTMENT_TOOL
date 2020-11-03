@extends('layouts.operations-home')

@section('style')
    <style>
    </style>
@endsection

@section('message_confirmation')
    <strong>Excel data imported successfully.</strong>
@endsection

@section('menu')
    @include('includes.menuHw3G')
@endsection

@section('breadcrump')
    <li class="breadcrumb-item"><a href="#">HUAWEI</a></li>
    <li class="breadcrumb-item"><a href="#">3G</a></li>
    <li class="current breadcrumb-item" aria-current="page">Update data for <u style="margin-left: 6px;font-style: italic"> 3G HUAWEI DATA </u></li>
@endsection

@section('content')

    <div style="margin-left:-18px;width: 1300px" class="container-fluid">
        <div class="container bg-light mt-0" style="height: 200px;">
            <div class="card-header">
                Import file <strong> (Only .xlsx, .xls or .csv file)</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('huawei3g-3g_hw_data-update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file" class="input_file" id="form-control"> <br>
                    <button type="submit" class="btn btn-danger" style="margin-top: 20px">Import File<i style="margin-left: 5px" class="fa fa-edit" aria-hidden="true"></i></button>
                    <a href="{{ url('huawei3g-xml') }}">
                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Go for generate xml Huawei<i class="fab fa-accusoft"></i></button>
                    </a>
                    <a href="{{ url('nokia2g-upgrade-capacity-update-documentation') }}">
                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>
                    </a>
                </form>
            </div>
        </div>
    </div>


    {{--    <div style="overflow: auto; margin-top: 20px; margin-bottom: 40px" class="container-fluid">--}}

    {{--        <table class="table table-bordered">--}}
    {{--            <thead>--}}
    {{--            <tr>--}}
    {{--                <th scope="col">Directoryname</th>--}}
    {{--                <th scope="col">nodeb_name</th>--}}
    {{--                <th scope="col">bts_service_ip</th>--}}
    {{--                <th scope="col">ipclk_ip_0</th>--}}
    {{--                <th scope="col">ipclk_ip_1</th>--}}
    {{--                <th scope="col">rru_name_RRU1</th>--}}
    {{--                <th scope="col">rru_name_RRU2</th>--}}
    {{--                <th scope="col">rru_name_RRU3</th>--}}
    {{--                <th scope="col">devip_ip</th>--}}
    {{--                <th scope="col">ippath_local_ip</th>--}}
    {{--                <th scope="col">ippath_peer_ip</th>--}}
    {{--                <th scope="col">ippath_descri</th>--}}
    {{--                <th scope="col">nexthop_ip</th>--}}
    {{--                <th scope="col">omch_ip</th>--}}
    {{--                <th scope="col">sctp_local_ip</th>--}}
    {{--                <th scope="col">sctp_peer_ip</th>--}}
    {{--                <th scope="col">sctp1_descri</th>--}}
    {{--                <th scope="col">sctp2_descri</th>--}}
    {{--                <th scope="col">site_name</th>--}}
    {{--                <th scope="col">cell1_id</th>--}}
    {{--                <th scope="col">cell2_id</th>--}}
    {{--                <th scope="col">cell3_id</th>--}}
    {{--                <th scope="col">ret1_devicename</th>--}}
    {{--                <th scope="col">ret2_devicename</th>--}}
    {{--                <th scope="col">ret3_devicename</th>--}}
    {{--                <th scope="col">cell1_tilt</th>--}}
    {{--                <th scope="col">cell2_tilt</th>--}}
    {{--                <th scope="col">cell3_tilt</th>--}}
    {{--            </tr>--}}
    {{--            </thead>--}}

    {{--            <tbody>--}}
    {{--            @foreach($data as $datas)--}}
    {{--                <tr>--}}
    {{--                    <td scope="row">{{ $datas->bsc_name }}</td>--}}
    {{--                    <td scope="row">{{ $datas->bcf_id }}</td>--}}
    {{--                    <td scope="row">{{ $datas->bts_id }}</td>--}}
    {{--                    <td scope="row">{{ $datas->adm_state }}</td>--}}
    {{--                    <td scope="row">{{ $datas->op_state }}</td>--}}
    {{--                    <td scope="row">{{ $datas->cell_name }}</td>--}}
    {{--                    <td scope="row">{{ $datas->trx_id }}</td>--}}
    {{--                    <td scope="row">{{ $datas->bcsu_id }}</td>--}}
    {{--                    <td scope="row">{{ $datas->bcsu_ip }}</td>--}}
    {{--                    <td scope="row">{{ $datas->trx_state }}</td>--}}
    {{--                    <td scope="row">{{ $datas->trx_power }}</td>--}}
    {{--                    <td scope="row">{{ $datas->dname }}</td>--}}
    {{--                    <td scope="row">{{ $datas->gtrx_state }}</td>--}}
    {{--                    <td scope="row">{{ $datas->etrx_state }}</td>--}}
    {{--                    <td scope="row">{{ $datas->pref_state }}</td>--}}
    {{--                    <td scope="row">{{ $datas->freqValue }}</td>--}}
    {{--                    <td scope="row">{{ $datas->tscValue }}</td>--}}
    {{--                </tr>--}}
    {{--            @endforeach--}}
    {{--            </tbody>--}}
    {{--        </table>--}}
    {{--        {{ $data->links() }}--}}
    {{--    </div>--}}
@endsection
