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
    <li class="current breadcrumb-item" aria-current="page">Update data for <u style="margin-left: 6px;font-style: italic"> Upgrade or Downgrade Capacity </u></li>
    <a href="{{ url('nokia2g-upgrade-capacity-update-documentation') }}">
        {{--                <button type="button" style="margin-bottom:5px;margin-left: 599px;" class="btn btn-danger">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>--}}
    </a>
@endsection
@section('content')

    <div style="margin-left:-18px;width: 1300px" class="container-fluid">
        <div class="container bg-light mt-0" style="height: 200px;">
            <div class="card-header">
                Import file <strong> (Only .log or .txt file)</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('nokia2g-upgrade-capacity-update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file" class="input_file" id="form-control"> <br>
                    <button type="submit" class="btn btn-danger" style="margin-top: 20px">Import File<i style="margin-left: 5px" class="fa fa-edit" aria-hidden="true"></i></button>
                    <a href="{{ url('nokia2g-upgrade-capacity') }}">
                        <button type="button" class="btn btn-danger" style="margin-top: 20px">Go for upgrade Capacity<i class="fab fa-accusoft"></i></button>
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
                <th scope="col">BSC NAMES</th>
                <th scope="col">BCF ID</th>
                <th scope="col">BTS ID</th>
                <th scope="col">ADM STATE</th>
                <th scope="col">OP STATE</th>
                <th scope="col">CELLS NAMES</th>
                <th scope="col">TRX ID</th>
                <th scope="col">BCSU ID</th>
                <th scope="col">BCSU IP</th>
                <th scope="col">TRX STATE</th>
                <th scope="col">TRX POWER</th>
                <th scope="col">DNAME</th>
                <th scope="col">GTRX STATE</th>
                <th scope="col">ETRX STATE</th>
                <th scope="col">PREF STATE</th>
                <th scope="col">FREQ</th>
                <th scope="col">TSC</th>
            </tr>
            </thead>

            <tbody>
{{--            @foreach($data as $datas)--}}
                <tr>
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
                </tr>
{{--            @endforeach--}}
            </tbody>
        </table>
{{--        {{ $data->links() }}--}}
    </div>
@endsection
