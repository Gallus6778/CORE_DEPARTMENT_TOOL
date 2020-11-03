@extends('layouts.operations-home')

@section('style')
    <style>
        /*.title{*/
        /*    border:1px solid red;*/
        /*    margin-left: -16px;*/
        /*    width: 101.2%;*/
        /*    text-align: center;*/
        /*    background: #F0F1F1;*/
        /*}*/
        /*.title_second{*/
        /*    border:1px solid red;*/
        /*    margin-left: -16px;*/
        /*    width: 101.2%;*/
        /*    display: flex;*/
        /*    flex-wrap: nowrap;*/
        /*}*/
    </style>
@endsection

@section('message_confirmation')
    <strong>Log data imported successfully.</strong>
@endsection

@section('menu')
    @include('includes.menu3g_1')
@endsection

@section('breadcrump')
        <li class="breadcrumb-item"><a href="#">Nokia</a></li>
        <li class="breadcrumb-item"><a href="#">3G</a></li>
        <li class="current breadcrumb-item" aria-current="page">Update data of <u style="margin-left: 6px;font-style: italic"> INFO NPGEP sheet</u></li>
        <a href="{{ url('nokia2g-xml-documentation') }}">
            {{--                <button type="button" style="margin-bottom:5px;margin-left: 599px;" class="btn btn-danger">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>--}}
        </a>
@endsection
@section('content')

    <div style="margin-left:-18px;width: 30px" class="container-fluid">
            <div class="container bg-light mt-0" style="height: 200px;position: fixed;">
                <div class="card-header">
                    Import file
                </div>
                <div class="card-body">
                    <form action="{{ route('nokia-update-data_npgep') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="file" class="input_file" id="form-control"> <br>
                        <button type="submit" class="btn btn-danger" style="margin-top: 20px">Import File<i style="margin-left: 5px" class="fa fa-edit" aria-hidden="true"></i></button>
                        <a href="{{ url('nokia3g-xml-FSME') }}">
                            <button type="button" class="btn btn-danger" style="margin-top: 20px">Generate Xml FSME<i style="margin-left: 5px" class="fa fa-file" aria-hidden="true"></i></button>
                        </a>
                        <a href="{{ url('nokia-update-data_npgep-documentation') }}">
                            <button type="button" class="btn btn-danger" style="margin-top: 20px">Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i></button>
                        </a>
                    </form>
                </div>
            </div>
    </div>
@endsection
