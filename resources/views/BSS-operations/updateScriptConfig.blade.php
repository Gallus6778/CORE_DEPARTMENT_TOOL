@extends('layouts.operations-home')

@section('style')
    <style>
    </style>
@endsection

@section('message_confirmation')
    <strong>Excel data imported successfully.</strong>
@endsection

@section('menu')
    @include('includes.menu3')
@endsection

@section('breadcrump')
    <li class="breadcrumb-item"><a href="#">Nokia</a></li>
    <li class="breadcrumb-item"><a href="#">3G</a></li>
    <li class="current breadcrumb-item" aria-current="page">Update data for <u style="margin-left: 6px;font-style: italic"> Script config</u></li>
@endsection
@section('content')

    <div style="margin-left:-18px;" class="container-fluid">
        <div class="container bg-light mt-0" style="height: 200px;">
            <div class="card-header">
                Import file <strong> (Only .xlsx or .csv or .xls file)</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('nokia-update-data-scrpit-config') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file" class="input_file" id="form-control"> <br>
                    <button type="submit" class="btn btn-danger" style="margin-top: 20px">Import File<i style="margin-left: 5px" class="fa fa-edit" aria-hidden="true"></i></button>
                    <a href="{{ url('nokia3g-profil-csv') }}">
                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Go to generate profil CSV-XML<i class="fab fa-accusoft"></i></button>
                    </a>
                    <a href="{{ url('nokia-update-data-scrpit-config-doc') }}">
                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 80px;overflow: auto" class="container-fluid">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">WBTS NAMES</th>
                <th scope="col">RNC</th>
                <th scope="col">NPGEP</th>
                <th scope="col">IFGE</th>
                <th scope="col">IP NPGEP</th>
                <th scope="col">GW NPGEP</th>
                <th scope="col">VLAN</th>
                <th scope="col">IP BASE ROUTE ID</th>
                <th scope="col">Min SCTP PORT</th>
                <th scope="col">ROUTE BW</th>
                <th scope="col">COMMITTED BW</th>
                <th scope="col">COMMITTED SIG BW</th>
                <th scope="col">IP CP/UP</th>
                <th scope="col">IP OAM</th>
                <th scope="col">STATIC ROUTE</th>
                <th scope="col">ADD STATIC ROUTE</th>
                <th scope="col">ADD IP BASE ROUTE</th>
                <th scope="col">MAP TO VLAN</th>
            </tr>
            </thead>

            <tbody>
            @foreach($ligne as $datas)
                <tr>
                    <td scope="row">{{ $datas->wbts_name }}</td>
                    <td scope="row">{{ $datas->rnc_name }}</td>
                    <td scope="row">{{ $datas->npgep_index }}</td>
                    <td scope="row">{{ $datas->ifge_index }}</td>
                    <td scope="row">{{ $datas->npgep_ip }}</td>
                    <td scope="row">{{ $datas->npgep_gw }}</td>
                    <td scope="row">{{ $datas->vlan }}</td>
                    <td scope="row">{{ $datas->ip_base_route }}</td>
                    <td scope="row">{{ $datas->mini_sctp_port }}</td>
                    <td scope="row">{{ $datas->route_bw }}</td>
                    <td scope="row">{{ $datas->committed_sig }}</td>
                    <td scope="row">{{ $datas->committed_sig_bw }}</td>
                    <td scope="row">{{ $datas->ip_cp_up1 }}.{{ $datas->ip_cp_up2 }}.{{ $datas->ip_cp_up3 }}.{{ $datas->ip_cp_up4 }}</td>
                    <td scope="row">{{ $datas->ip_oam1 }}.{{ $datas->ip_oam2 }}.{{ $datas->ip_oam3 }}.{{ $datas->ip_oam4 }}</td>
                    <td scope="row">{{ $datas->static_route }}</td>
                    <td scope="row">{{ $datas->add_static_route }}</td>
                    <td scope="row">{{ $datas->add_ip_base_route }}</td>
                    <td scope="row">{{ $datas->map_to_vlan }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $ligne->links() }}
    </div>
@endsection
