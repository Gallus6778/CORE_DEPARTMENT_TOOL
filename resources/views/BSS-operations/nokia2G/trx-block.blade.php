@extends('layouts.operations-home')

@section('style')
    <style>

    </style>
@endsection

@section('message_confirmation')
<strong>Log data imported successfully.</strong>
@endsection
@section('menu')
    @include('includes.menu2')
@endsection
@section('breadcrump')
    <li class="breadcrumb-item"><a href="#">Nokia</a></li>
    <li class="breadcrumb-item"><a href="#">2G</a></li>
    <li class="current breadcrumb-item" aria-current="page"><u style="margin-left: 6px;font-style: italic">TRX BLOCK</u></li>
@endsection
@section('content')
        <form method="post" action="{{ route('nokia2g-trx-block')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            @csrf
            <div class="form-group" style="margin-bottom: -30px">
                <table class="table">
                    <tr>
{{--                        <td width="40%" align="right">--}}
{{--                            <label for="form-control">Select File For Upload</label>--}}
{{--                        </td>--}}
{{--                        <td width="30%">--}}
{{--                            <input type="file" class="input_file" name="file" id="form-control">--}}
{{--                        </td>--}}
{{--                        <td class="script-link" width="30%" align="left">--}}
{{--                            <input type="submit" name="upload" class="btn btn-danger" value="Upload" id="">--}}
{{--                        </td>--}}

                        <td width="40%">
                            <input type="file" style="margin-left: 150px;margin-top: 3px" class="input_file" name="file" id="form-control">
                        </td>
                        <td width="30%">
                            <input type="submit" style="margin-left: 150px" name="import" class="btn btn-danger" value="Import" id="">
                        </td>
                        <td width="30%">
                            <a href="{{ url('nokia2g-trx-block-documentation') }}">
                                <button type="button" style="margin-bottom:5px;margin-left: -150px" class="btn btn-danger">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" align="rigth"></td>
                        <td width="30%"> <span class="text-muted">Only .log or .txt file</span> </td>
                        <td width="30%" align="left"></td>
                    </tr>
                </table>

            </div>
        </form>

        <br>
        <div style="margin-bottom: 7%" class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data retrieved from exported log</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tr>
                        <th>BSC NAMES</th>
                        <th>BCF ID</th>
                        <th>OAM STATE</th>
                        <th>CELLS NAMES</th>
                        <th>TRX ID</th>
                        <th>TRX STATE</th>
                    </tr>
                    @foreach($ligne as $row)
                        @if ($row->trx_state != NULL)
                        <tr>
                            <td>{{ $row->bsc_names }}</td>
                            <td>{{ $row->bcf_id }}</td>
                            <td>{{ $row->oam_state }}</td>
                            <td>{{ $row->cells_names}}</td>
                            <td>{{ $row->trx_id }}</td>
                            <td>{{ $row->trx_state }}</td>
                        </tr>
                        @else

                        @endif
                    @endforeach
                    </table>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-6" style="margin-top: 10px;">
                            {{ $ligne->links() }}
                        </div>

                        <div class="col-md-2.5">
                            {{-- <form action="{{ route('nokia2g-all-trx') }}" method="post">
                                <input style="margin-left: 40px" type="submit" name="all-trx" class="btn btn-primary" value="Export all TRX" id="">
                            </form> --}}

                            <span class="trx">
                                    <a href="{{ url('nokia2g-all-trx') }}">
                                        <button style="margin-left: 45px; margin-top: 10px" type="button" class="btn btn-danger">
                                            DOWNLOAD TRX BLOCK <i class="fa fa-download" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </span>
                        </div>
<!--
                        <div class="col-md-3.5">
                                <span class="trx">
                                    <a href="{{ url('nokia2g-all-trx-block') }}">
                                        <button style="margin-left: 45px; margin-top: 10px" type="button" class="btn btn-danger">
                                            DOWNLOAD BLOCK TRX STATE <i class="fa fa-download" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </span>
                        </div>
-->
                    </div>
                </div>
            </div>
        </div>


@endsection
