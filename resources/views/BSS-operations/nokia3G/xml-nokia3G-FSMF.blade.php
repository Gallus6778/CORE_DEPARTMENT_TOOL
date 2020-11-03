@extends('layouts.operations-home')

@section('style')
    <style>

    </style>
@endsection

@section('message_confirmation')
    <strong>Data loaded successfully.</strong>
@endsection

@section('menu')
    @include('includes.menu3')
@endsection
@section('breadcrump')
    <li class="breadcrumb-item"><a href="#">Nokia</a></li>
    <li class="breadcrumb-item"><a href="#">3G</a></li>
    <li class="current breadcrumb-item" aria-current="page">xml<u style="margin-left: 6px;font-style: italic">FSMF</u></li>
    <a href="{{ url('nokia2g-xml-documentation') }}">
        {{--                <button type="button" style="margin-bottom:5px;margin-left: 599px;" class="btn btn-danger">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>--}}
    </a>
@endsection

@section('content')
    <div style="margin:auto" class="container-fluid">
        <form style="width: 100%; margin-left:35px;margin-top:15px" method="post" action="{{ route('nokia3g-xml-FSMF')}}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-row">
{{--                <div class="form-group col-md-3">--}}
{{--                    <label for="file">Import BTS IP PLANNING FILE</label>--}}
{{--                    <input type="file" class="input_file" name="file" id="form-control">--}}
{{--                </div>--}}
                {{--                <div class="form-group col-md-3">--}}
                {{--                    <label for="file">Update BTS IP PLANNING FILE</label>--}}
                {{--                    <a href="{{ url('nokia-update-data-nodeb') }}">--}}
                {{--                        <button type="button" style="margin-bottom:5px;margin-top:0;width: 250px" class="btn btn-danger">Update NodeB Plan Sheet <i style="margin-left: 5px" class="fa fa-hourglass-end" aria-hidden="true"></i></button>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                <div class="form-group col-md-2">
                    <label for="rnc_name">Choose the RNC</label>
                    <select name="rnc_name" id="rnc_name" class="form-control">
                        <option value="YARC01">YARC01</option>
                        <option value="YARC02">YARC02</option>
                        <option value="YARC03">YARC03</option>
                        <option value="YARC04">YARC04</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="npgep_id">Choose NPGEP INDEX</label>
                    <select name="npgep_id" id="npgep_id" class="form-control">
                        <option value="6">NPGEP 6</option>
                        <option value="8">NPGEP 8</option>
                        <option value="10">NPGEP 10</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="ifge_id">Choose IFGP INDEX</label>
                    <select name="ifge_id" id="ifge_id" class="form-control">
                        <option value="0">IFGP 0</option>
                        <option value="1">IFGP 1</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="file">Enter the SITE NAME</label>
                    <input type="text" name="site_name" class="form-control" id="form-control" placeholder="Enter the Site name" required>
                </div>
                <div style="padding-to: 32px" class="form-group col-md-2">
                    <a href="{{ url('nokia3g-xml-FSMF-documentation') }}">
                        <button type="button" style="margin-bottom:5px;margin-top:-11px" class="btn btn-danger">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>
                    </a>


                    <input type="submit" style="width: 100px" name="upload" class="btn btn-danger" value="Upload" id="">
                </div>
            </div>
        </form>
        {{-- </div> --}}
    </div>
    <div class="panel panel-default">
{{--        <div class="panel-heading">--}}
{{--            <h3 class="panel-title">Site Name datas</h3>--}}
{{--        </div>--}}
        <div class="panel-body" style="margin-bottom: 50px">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
{{--                    <tr>--}}
{{--                        <th>RNC NAME</th>--}}
{{--                        <th>SITE NAME</th>--}}
{{--                        <th>LOCATION NAME</th>--}}
{{--                        <th>WBTS</th>--}}
{{--                        <th>BTS_ID</th>--}}
{{--                        <th>ftmIpAddr</th>--}}
{{--                        <th>btsIpAddr</th>--}}
{{--                        <th>rncIpAddr</th>--}}
{{--                        <th>localIpAddr</th>--}}
{{--                        <th>farEndSctpSubnetIpAddress</th>--}}
{{--                        <th>masterIpAddr</th>--}}
{{--                        <th>uPlaneIpAddress</th>--}}
{{--                        <th>cPlaneIpAddress</th>--}}
{{--                        <th>mPlaneIpAddress</th>--}}
{{--                        <th>gateway</th>--}}
{{--                        <th>npgepIpAddress</th>--}}
{{--                    </tr>--}}
                    {{--                    @foreach($site as $row)--}}
                    {{--                        <tr>--}}
                    {{--                            <td>{{ $row->rnc_name}}</td>--}}
                    {{--                            <td>{{ $row->site_name }}</td>--}}
                    {{--                            <td>{{ $row->location_name }}</td>--}}
                    {{--                            <td>{{ $row->wbts }}</td>--}}
                    {{--                            <td>{{ $row->bts_id }}</td>--}}
                    {{--                            <td>{{ $row->ftmIpAddr }}</td>--}}
                    {{--                            <td>{{ $row->btsIpAddr }}</td>--}}
                    {{--                            <td>{{ $row->rncIpAddr }}</td>--}}
                    {{--                            <td>{{ $row->localIpAddr }}</td>--}}
                    {{--                            <td>{{ $row->farEndSctpSubnetIpAddress }}</td>--}}
                    {{--                            <td>{{ $row->masterIpAddr }}</td>--}}
                    {{--                            <td>{{ $row->uPlaneIpAddress }}</td>--}}
                    {{--                            <td>{{ $row->cPlaneIpAddress }}</td>--}}
                    {{--                            <td>{{ $row->mPlaneIpAddress }}</td>--}}
                    {{--                            <td>{{ $row->gateway }}</td>--}}
                    {{--                            <td>{{ $row->npgepIpAddress }}</td>--}}
                    {{--                        </tr>--}}
                    {{--                    @endforeach--}}
                </table>

                {{-- data retrieve from Excel file --}}
                <div class="panel-heading">
                    <h3 class="panel-title">Data retrieved from BTS IP Planning</h3>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-6" style="margin-top: 10px;">
                            {{ $ligne->links() }}
                        </div>
                        <div class="col-md-2.5">
                            <span class="trx">
                                <a href="{{ url('nokia3g-xml-FSMF_generated') }}">
                                    <button style="margin-left: 45px; margin-top: 10px" type="button" class="btn btn-danger">
                                        DOWNLOAD static route file <i class="fa fa-download" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </span>
                        </div>

                        <div class="col-md-2.5">
                            <span class="trx">
                                <a href="{{ url('nokia3g-xml-FSMF_download') }}">
                                    <button style="margin-left: 45px; margin-top: 10px" type="button" class="btn btn-danger">
                                        DOWNLOAD xml FSMF File <i style="margin-left: 5px" class="fa fa-hourglass-end" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>SIT</th>
                        <th>TINH</th>
                        <th>RNC</th>
                        <th>LAC</th>
                        <th>MA TRAM</th>
                        <th>IP NETWORK SERVICES</th>
                        <th>IP SERVICES</th>
                        <th>GATEWAY SERVICES</th>
                        <th>IP MASK SERVICES</th>
                        <th>IP NETWORK OAM</th>
                        <th>IP1 OAM</th>
                        <th>IP2 OAM</th>
                        <th>GATEWAY OAM</th>
                        <th>IP MASK OAM</th>
                    </tr>
                    @foreach($ligne as $row)
                        <tr>
                            <td>{{ $row->sit }}</td>
                            <td>{{ $row->tinh }}</td>
                            <td>{{ $row->rnc_name }}</td>
                            <td>{{ $row->lac}}</td>
                            <td>{{ $row->ma_tram }}</td>
                            <td>{{ $row->ip_network_service }}</td>
                            <td>{{ $row->ip_service }}</td>
                            <td>{{ $row->gateway_service }}</td>
                            <td>{{ $row->ip_mask_service }}</td>
                            <td>{{ $row->ip_network_oam }}</td>
                            <td>{{ $row->ip1_oam }}</td>
                            <td>{{ $row->ip2_oam }}</td>
                            <td>{{ $row->gateway_oam }}</td>
                            <td>{{ $row->ip_mask_oam }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
