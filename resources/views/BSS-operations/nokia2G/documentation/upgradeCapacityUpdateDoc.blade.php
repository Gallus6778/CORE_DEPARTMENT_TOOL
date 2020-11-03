@extends('layouts.operations-home')

@section('style')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=swap">
    <style>
        blockquote {
            background: #f9f9f9;
            border-left: 7px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
            font-size: 1.2em;
        }
        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }
        blockquote p {
            display: inline;
        }
        .fichier{
            font-family: 'swap', serif;
            font-size: 1.3em;
        }
        blockquote a:hover{
            color: #0d0cb5;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
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
    <li class="current breadcrumb-item" aria-current="page"><u style="margin-left: 6px;font-style: italic">Sites names - BCSU Index documentation</u></li>
    <a href="{{ url('nokia2g-upgrade-capacity-update') }}">
        <button type="button" style="margin-bottom:5px;margin-left: 700px;" class="btn btn-danger">Return<i style="margin-left: 5px" class="fa fa-reply" aria-hidden="true"></i></button>
    </a>
@endsection
@section('content')

    <div class="panel panel-default" style="margin-bottom: 7%">
        <div style="text-align: center; text-transform: uppercase; font-size: 1.5em; font-weight: bold;">
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                Sites names - BCSU Index documentation
            </span>
        </div>
        <div class="container-fluid">
            <blockquote>
                <strong>Sites names - BCSU Index</strong> generation just requires to :

                <br><br>

                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i>
                Generate the log with le ZERO command with <i>zero.log</i> name.
                <br><br>

                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i>
                Save this file <strong>C:\wamp64\www\New-Laravel-Project\CoreDepartmentTool\public\zero.log</strong> directory
{{--                on desktop directory--}}

                <div style="text-align: center; text-transform: uppercase; font-size: 1.5em; font-weight: bold;margin-top: 10px">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                        User manual
                    </span>
                </div>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i><strong>Step 1 :</strong>  Click on the <strong>Import file</strong> button



            </blockquote>
        </div>
    </div>



@endsection
