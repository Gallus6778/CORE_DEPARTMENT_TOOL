@extends('layouts.operations-home')

@section('style')

@endsection

@section('message_confirmation')
    <strong>Excel data imported successfully.</strong>
@endsection

@section('menu')
    {{--    @include('includes.menu2g_1')--}}
    @include('includes.menu2')
@endsection
@section('breadcrump')
    <li class="breadcrumb-item"><a href="#">Nokia</a></li>
    <li class="breadcrumb-item"><a href="#">2G</a></li>
    <li class="current breadcrumb-item" aria-current="page"><u style="margin-left: 6px;font-style: italic">Upgrade Capacity</u></li>
    <a href="{{ url('nokia2g-xml-documentation') }}">
        {{--                <button type="button" style="margin-bottom:5px;margin-left: 599px;" class="btn btn-danger">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>--}}
    </a>
@endsection
@section('content')


    <form method="post" action="{{ route('nokia2g-upgrade-capacity')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <table class="table">
                <tr>
                    <td width="40%" align="right">
                        <label for="">Select File For Upload</label>
                    </td>
                    <td width="30%">
                        <input type="file" class="input_file" name="file" id="form-control">
                    </td>
                    <td class="script-link" width="30%" align="left">
                        <input type="submit" {{-- style="margin-top:20px" --}} name="upload" class="btn btn-danger" value="Upload" id="">
                        {{--                            <span class="amenu-bar">--}}
                        {{--                                <ul>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="#">--}}
                        {{--                                            Generate script--}}
                        {{--                                            <i class="fa fa-download" aria-hidden="true"></i>--}}
                        {{--                                            <div class="asub-menu-1">--}}
                        {{--                                                <ul>--}}
                        {{--                                                    <a href="{{ asset('../storage/script-yabc01.txt') }}"><li> YABCO1</li></a>--}}
                        {{--                                                    <a href="{{ asset('../storage/script-yabc02.txt') }}"><li> YABCO2</li></a>--}}
                        {{--                                                    <a href="{{ asset('../storage/script-yabc03.txt') }}"><li> YABCO3</li></a>--}}
                        {{--                                                    <a href="{{ asset('../storage/script-yabc04.txt') }}"><li> YABCO4</li></a>--}}
                        {{--                                                    <a href="{{ asset('../storage/script-yabc05.txt') }}"><li> YABCO5</li></a>--}}
                        {{--                                                    <a href="{{ asset('../storage/script-yabc06.txt') }}"><li> YABCO6</li></a>--}}
                        {{--                                                    <a href="{{ asset('../storage/script-yabc07.txt') }}"><li> YABCO7</li></a>--}}
                        {{--                                                </ul>--}}
                        {{--                                            </div>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </span>--}}
                    </td>
                </tr>
                <tr>
                    <td width="40%" align="rigth"></td>
                    <td width="30%"> <span class="text-muted">.xls, .xlsx,csv</span> </td>
                    <td width="30%" align="left"></td>
                </tr>
            </table>

        </div>
    </form>


    <div class="panel panel-default" style="margin-bottom: 7%">
        <div class="panel-heading">
            <h3 class="panel-title">Excel data</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>BSC Names</th>
                        <th>Sites Names</th>
                        <th>Cells Names</th>
                        <th>TRX ID</th>
                        <th>TSC</th>
                        <th>Frequency</th>
                        <th>CH0 TYPE</th>
                        <th>CH1 TYPE</th>
                        <th>CH2 TYPE</th>
                        <th>CH3 TYPE</th>
                        <th>CH4 TYPE</th>
                        <th>CH5 TYPE</th>
                        <th>CH6 TYPE</th>
                        <th>CH7 TYPE</th>
                        <th>mPlaneRemoteIpAddress</th>
                        <th>cuPlaneLocalIpAddress</th>
                        <th>INDEX BCSU</th>
                        <th>SCTP PORT </th>
                    </tr>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->bsc_names }}</td>
                            <td>{{ $row->sites_names }}</td>
                            <td>{{ $row->cells_names}}</td>
                            <td>{{ $row->trx_id }}</td>
                            <td>{{ $row->tsc }}</td>
                            <td>{{ $row->frequency }}</td>
                            <td>{{ $row->ch0_type }}</td>
                            <td>{{ $row->ch1_type }}</td>
                            <td>{{ $row->ch2_type }}</td>
                            <td>{{ $row->ch3_type }}</td>
                            <td>{{ $row->ch4_type }}</td>
                            <td>{{ $row->ch5_type }}</td>
                            <td>{{ $row->ch6_type }}</td>
                            <td>{{ $row->ch7_type }}</td>
                            <td>{{ $row->mPlaneRemoteIpAddress }}</td>
                            <td>{{ $row->cuPlaneLocalIpAddress }}</td>
                            <td>{{ $row->index_bcsu }}</td>
                            <td>{{ $row->sctp_port }}</td>


                        </tr>
                    @endforeach
                </table>
                <div class="">
                    <div class="row">
                        <div class="col-md-4" style="margin-top: 10px;">
                            {{ $data->links() }}
                        </div>
                        <div class="col-md-4">
                                <span class="trx">
                                    <a href="{{ url('nokia2g-upgrade-capacity-download-script') }}">
                                        <button style="margin-left: 45px; margin-top: 10px" type="button" class="btn btn-danger">
                                            DOWNLOAD SCRIPT GENERATED <i class="fa fa-download" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </span>
                        </div>
                        <div class="col-md-4">
                                <span class="trx">
                                    <a href="{{ url('nokia2g-upgrade-capacity-update') }}">
                                        <button style="margin-left: 45px; margin-top: 10px" type="button" class="btn btn-danger">
                                            Update data Site name-BCSU IP <i class="fas fa-undo"></i>
                                        </button>
                                    </a>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
