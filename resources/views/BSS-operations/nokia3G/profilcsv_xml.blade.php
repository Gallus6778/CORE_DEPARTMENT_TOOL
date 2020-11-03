@extends('layouts.operations-home')

@section('style')
    <style>
        div .bouton{
            border-bottom: 5px solid #fff;
            border-left: 0 solid #fff;
            border-right: 0 solid #fff;
            /*border-bottom-left-radius: 6px;*/
        }
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
    <li class="current breadcrumb-item" aria-current="page">Profil Csv for<u style="margin-left: 6px;font-style: italic">IPNB</u></li>
@endsection

@section('content')
    <div style="margin:auto" class="container-fluid">
        <form style="width: 100%; margin-left:35px;margin-top:15px" method="post" action="{{ route('nokia3g-profil-ipnb')}}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-row" style="margin: auto;width: 1200px">
                <div class="form-group col-md-4.5">
                    <label for="file">Import excel file (<strong>Site name table</strong>)</label>
                    <input type="file" name="file" class="form-control" id="form-control">
                </div>
                <div class="form-group col-md-1">
                    <label for="file" style="color: #fff">Import</label>
                    <input type="submit" class="form-control btn btn-danger" value="Upload" id="form-control">
                </div>

                <div class="col-md-2.5">
                    <span class="trx">
                        <a href="{{ url('nokia3g-profil-csv-static-route') }}">
                            <button style="margin-top: 31px" type="button" class="btn btn-danger">
                                DOWNLOAD static route file <i class="fa fa-download" aria-hidden="true"></i>
                            </button>
                        </a>
                    </span>
                </div>

                <div class="col-md-2.5">
                    <span class="trx">
                        <a href="{{ url('nokia3g-profil-csv-profil-download') }}">
                            <button style="margin-top: 31px" type="button" class="btn btn-danger">
                                DOWNLOAD CSV Profil <i style="margin-left: 5px" class="fa fa-hourglass-end" aria-hidden="true"></i>
                            </button>
                        </a>
                    </span>
                </div>
                <div style="padding-top: 32px;margin-top: -44px" class="form-group col-md-1.5">
                    <a href="{{ url('nokia2g-xml-documentation') }}" class="documentation">
                        <button type="button" class="btn bouton btn-danger">Documentation<i style="margin-left: 24.5px" class="fa fa-book" aria-hidden="true"></i></button>
                    </a>
                    <br>

                    <a href="{{ url('nokia3g-profil-ipnb-xml') }}">
                        <button type="button" class="btn btn-danger">Download xml file<i style="margin-left: 5px;" class="fa fa-download" aria-hidden="true"></i></button>
                    </a>
                </div>
            </div>
        </form>

    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">

                <div class="panel-heading">
                    <h3 class="panel-title">Site name Table </h3>
                </div>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>RNC</th>
                        <th>SITE NAME</th>
                    </tr>
                    @foreach($ligne as $row)
                        <tr>
                            <td>{{ $row->rnc_name }}</td>
                            <td>{{ $row->site_name }}</td>
                        </tr>
                    @endforeach
                </table>
                {{ $ligne->links() }}
            </div>
        </div>
    </div>
@endsection
