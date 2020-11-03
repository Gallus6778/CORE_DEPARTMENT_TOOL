@extends('layouts.operations-home')

@section('style')
    <style>

    </style>
@endsection

@section('message_confirmation')
<strong>Excel data imported successfully.</strong>
@endsection

@section('menu')
    @include('includes.menu2')
@endsection
@section('breadcrump')
    <li class="breadcrumb-item"><a href="#">Nokia</a></li>
    <li class="breadcrumb-item"><a href="#">2G</a></li>
    <li class="current breadcrumb-item" aria-current="page"> <u style="margin-left: 6px;font-style: italic">xml</u></li>
    <a href="{{ url('nokia2g-xml-documentation') }}">
        {{--                <button type="button" style="margin-bottom:5px;margin-left: 599px;" class="btn btn-danger">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>--}}
    </a>
@endsection
@section('content')
        <div style="margin:auto" class="container-fluid">
            <form style="width: 100%; margin-left:35px;margin-top:15px" method="post" action="{{ route('nokia2g-xml')}}" enctype="multipart/form-data">

            {{ csrf_field() }}

                <div class="form-row">
{{--                    <div class="form-group col-md-4">--}}
{{--                        <label for="file">Import BTS IP PLANNING FILE</label>--}}
{{--                        <input type="file" class="input_file" name="file" id="form-control">--}}
{{--                    </div>--}}
                    <div class="form-group col-md-3">
                        <label for="bsc_name">Choose BSC</label>
                        <select name="bsc_name" id="bsc_name" class="form-control">
                            <option value="YABC01">YABC01</option>
                            <option value="YABC02">YABC02</option>
                            <option value="YABC03">YABC03</option>
                            <option value="YABC04">YABC04</option>
                            <option value="YABC05">YABC05</option>
                            <option value="YABC06">YABC06</option>
                            <option value="YABC07">YABC07</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bcsu_id">Choose BCSU ID</label>
                        <select name="bcsu_id" id="bcsu_id" class="form-control">
                            <option value="BCSU0">BSCU 0</option>
                            <option value="BCSU1">BCSU 1</option>
                            <option value="BCSU2">BCSU 2</option>
                            <option value="BCSU3">BCSU 3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="file">Enter the SITE NAME</label>
                        <input type="text" name="site_name" class="form-control" id="form-control" placeholder="Enter the Site name" required>
                    </div>
                    <div style="padding-to: 32px" class="form-group col-md-2">
                        <a href="{{ url('nokia2g-xml-documentation') }}">
                            <button type="button" style="margin-bottom:5px;margin-top:-11px" class="btn btn-danger">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>
                        </a>


                        <input type="submit" style="width: 100px" name="upload" class="btn btn-danger" value="Validate" id="">
                    </div>
                </div>
            </form>
            {{-- </div> --}}
        </div>
        <div style="margin-bottom: 7%" class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Verify Site Name datas</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>BSC NAME</th>
                            <th>SITE NAME</th>
                            <th>BCF ID</th>
                            <th>MODULE LOCATION</th>
                            <th>unicastMasterIpAddress</th>
                            {{-- <th>BCSU IP</th> --}}
                            <th>IP SERVICE</th>
                        </tr>
                    @foreach($site as $row)
                        <tr>
                            <td>{{ $row->bsc_name}}</td>
                            <td>{{ $row->site_name }}</td>
                            <td>{{ $row->bcf_id }}</td>
                            <td>{{ $row->module_location }}</td>
                            <td>{{ $row->unicastMasterIpAddress }}</td>
                            <td>{{ $row->bcsu_ip }}</td>
                        </tr>
                    @endforeach
                    </table>

                    {{-- data retrieve from Excel file --}}
                    <div class="panel-heading">
                        <h3 class="panel-title">Data retrieved from BTS IP Planning</h3>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>SIT</th>
                            <th>TINH</th>
                            <th>BSC</th>
                            <th>LAC</th>
                            <th>MA TRAM</th>
                            <th>IP NETWORK SERVICES</th>
                            <th>IP SERVICES</th>
                            <th>GATEWAY SERVICES</th>
                            <th>IP MASK SERVICES</th>
                            <th>IP NETWORK OAM</th>
                            <th>IP OAM</th>
                            <th>GATEWAY OAM</th>
                            <th>IP MASK OAM</th>
                        </tr>
                    @foreach($ligne as $row)
                        <tr>
                            <td>{{ $row->sit }}</td>
                            <td>{{ $row->tinh }}</td>
                            <td>{{ $row->bsc }}</td>
                            <td>{{ $row->lac}}</td>
                            <td>{{ $row->ma_tram }}</td>
                            <td>{{ $row->ip_network_service }}</td>
                            <td>{{ $row->ip_service }}</td>
                            <td>{{ $row->gateway_service }}</td>
                            <td>{{ $row->ip_mask_service }}</td>
                            <td>{{ $row->ip_network_oam }}</td>
                            <td>{{ $row->ip_oam }}</td>
                            <td>{{ $row->gateway_oam }}</td>
                            <td>{{ $row->ip_mask_oam }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-6" style="margin-top: 10px;">
                            {{ $ligne->links() }}
                        </div>
                        <div class="col-md-2.5">
                                <span class="trx">
                                    <a href="{{ route('nokia2g-xml-generated') }}">
                                        <button style="margin-left: 45px; margin-top: 10px" type="button" class="btn btn-danger">
                                            DOWNLOAD XML FILE <i class="fa fa-download" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </span>
                        </div>
                        <div class="col-md-2.5">
                                <span class="trx">
                                    <a href="{{ route('nokia-update-data-bts') }}">
                                        <button style="margin-left: 45px; margin-top: 10px" type="button" class="btn btn-danger">
                                            Update BTS ip planning <i class="fas fa-undo"></i>
                                        </button>
                                    </a>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
