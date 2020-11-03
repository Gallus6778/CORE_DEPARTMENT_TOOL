@extends('layouts.operations-home')

@section('style')
    <style>
    </style>
@endsection

@section('message_confirmation')
    <strong>Site name loaded successfully.</strong>
@endsection

@section('menu')
    @include('includes.menuHw3G')
@endsection

@section('breadcrump')
    <li class="breadcrumb-item"><a href="#">HUAWEI</a></li>
    <li class="breadcrumb-item"><a href="#">3G</a></li>
    <li class="current breadcrumb-item" aria-current="page">Generate script for <u style="margin-left: 6px;font-style: italic">Xml Huawei</u></li>
    <a href="{{ url('nokia2g-upgrade-capacity-update-documentation') }}"></a>
@endsection
@section('content')

    <div style="margin-left:-18px;width: 1300px" class="container-fluid">
        <div class="container bg-light mt-0" style="height: 200px;">
            <div class="card-header">
                Enter the Site name
            </div>
            <div class="card-body">
                <form action="{{ route('huawei3g-xml') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <input type="text" name="site_name" class="form-control" id="form-control" placeholder="Enter the Site name" required>
                    <button type="submit" class="btn btn-danger" style="margin-top: 20px">Validate<i style="margin-left: 5px" class="fa fa-check" aria-hidden="true"></i></button>
{{--                    <a href="{{ url('/') }}">--}}
{{--                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Go for generate xml Huawei<i class="fab fa-accusoft"></i></button>--}}
{{--                    </a>--}}

                    <a href="{{ url('huawei3g-3g_hw_data-update') }}">
                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Update 3G_HW_DATA<i style="margin-left: 5px" class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>
                    </a>
                    <a href="{{ url('huawei3g-cdd3g-update') }}">
                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Update CDD 3G<i style="margin-left: 5px" class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>
                    </a>
                    <a href="{{ url('huawei3g-xml-download') }}">
                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Download Xml file<i style="margin-left: 5px" class="fa fa-download" aria-hidden="true"></i></button>
                    </a>
                    <a href="{{ url('nokia2g-upgrade-capacity-update-documentation') }}">
                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <div style="overflow: auto; margin-top: 20px; margin-bottom: 40px" class="container-fluid">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Directoryname</th>
                <th scope="col">nodeb_name</th>
                <th scope="col">bts_service_ip</th>
                <th scope="col">ipclk_ip_0</th>
                <th scope="col">ipclk_ip_1</th>
                <th scope="col">rru_name_RRU1</th>
                <th scope="col">rru_name_RRU2</th>
                <th scope="col">rru_name_RRU3</th>
                <th scope="col">devip_ip</th>
                <th scope="col">ippath_local_ip</th>
                <th scope="col">ippath_peer_ip</th>
                <th scope="col">ippath_descri</th>
                <th scope="col">nexthop_ip</th>
                <th scope="col">omch_ip</th>
                <th scope="col">sctp_local_ip</th>
                <th scope="col">sctp_peer_ip</th>
                <th scope="col">sctp1_descri</th>
                <th scope="col">sctp2_descri</th>
                <th scope="col">site_name</th>
                <th scope="col">cell1_id</th>
                <th scope="col">cell2_id</th>
                <th scope="col">cell3_id</th>
                <th scope="col">ret1_devicename</th>
                <th scope="col">ret2_devicename</th>
                <th scope="col">ret3_devicename</th>
                <th scope="col">cell1_tilt</th>
                <th scope="col">cell2_tilt</th>
                <th scope="col">cell3_tilt</th>
            </tr>
            </thead>

            <tbody>
            @foreach($data as $datas)
                <tr>
                    <td scope="row">{{ $datas->Directoryname }}</td>
                    <td scope="row">{{ $datas->nodeb_name }}</td>
                    <td scope="row">{{ $datas->bts_service_ip }}</td>
                    <td scope="row">{{ $datas->ipclk_ip_0 }}</td>
                    <td scope="row">{{ $datas->ipclk_ip_1 }}</td>
                    <td scope="row">{{ $datas->rru_name_RRU1 }}</td>
                    <td scope="row">{{ $datas->rru_name_RRU2 }}</td>
                    <td scope="row">{{ $datas->rru_name_RRU3 }}</td>
                    <td scope="row">{{ $datas->devip_ip }}</td>
                    <td scope="row">{{ $datas->ippath_local_ip }}</td>
                    <td scope="row">{{ $datas->ippath_peer_ip }}</td>
                    <td scope="row">{{ $datas->ippath_descri }}</td>
                    <td scope="row">{{ $datas->nexthop_ip }}</td>
                    <td scope="row">{{ $datas->omch_ip }}</td>
                    <td scope="row">{{ $datas->sctp_peer_ip }}</td>
                    <td scope="row">{{ $datas->sctp_local_ip }}</td>
                    <td scope="row">{{ $datas->sctp1_descri }}</td>
                    <td scope="row">{{ $datas->sctp2_descri }}</td>
                    <td scope="row">{{ $datas->site_name }}</td>
                    <td scope="row">{{ $datas->cell1_id }}</td>
                    <td scope="row">{{ $datas->cell2_id }}</td>
                    <td scope="row">{{ $datas->cell3_id }}</td>
                    <td scope="row">{{ $datas->ret1_devicename }}</td>
                    <td scope="row">{{ $datas->ret2_devicename }}</td>
                    <td scope="row">{{ $datas->ret3_devicename }}</td>
                    <td scope="row">{{ $datas->cell1_tilt }}</td>
                    <td scope="row">{{ $datas->cell2_tilt }}</td>
                    <td scope="row">{{ $datas->cell3_tilt }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
