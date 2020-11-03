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
    <li class="current breadcrumb-item" aria-current="page"><u style="margin-left: 6px;font-style: italic">Error</u></li>

    <a href="{{ url('nokia2g-xml-documentation') }}">
        <button type="button" style="margin-bottom:5px;margin-left: 599px;" class="btn btn-danger">
            Documentation<i style="margin-left: 5px" class="fa fa-book" aria-hidden="true"></i>
        </button>
    </a>
@endsection
@section('error')

<div class="container-fluid">
    <div class="row">
                <!-- Flexbox container for aligning the toasts -->
                <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="height: 200px;">

                    <!-- Then put toasts within -->
                    <span style="width:1200px;text-align:center">
                        The <strong> {{ $error }} </strong>is in stand-by state.....
                        <a href="{{ url('nokia2g-xml') }}">
                            <button type="button" style="margin-bottom:5px;margin-top:-11px" class="btn btn-danger">
                                Return <i class="fas fa-undo"></i>
                            </button>
                        </a>
                    </span>

                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <img src="..." class="rounded mr-2" alt="...">
                            <strong class="mr-auto">Bootstrap</strong>
                            <small>11 mins ago</small>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            Hello, world! This is a toast message.
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
