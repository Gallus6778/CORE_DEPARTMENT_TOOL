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
    <li class="current breadcrumb-item" aria-current="page"><u style="margin-left: 6px;font-style: italic">XML Nokia 2G documentation</u></li>
    <a href="{{ url('nokia2g-xml') }}">
        <button type="button" style="margin-bottom:5px;margin-left: 700px;" class="btn btn-danger">Return<i style="margin-left: 5px" class="fa fa-reply" aria-hidden="true"></i></button>
    </a>
@endsection
@section('content')

    <div class="panel panel-default" style="margin-bottom: 7%">
        <div style="text-align: center; text-transform: uppercase; font-size: 1.5em; font-weight: bold;">
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                XML Nokia 2G
            </span>
        </div>
        <div class="container-fluid">
            <blockquote>
                <strong>Nokia 2G XML</strong> generation just requires updating the file

                <br><br>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i>
                The <span class="fichier">BTS IP PLANNING</span> file on the <span class="fichier">BTS PLAN sheet.</span> <a href="{{ url('BTS_IP_PLANNING_BTS_PLAN.xlsx') }}">Click here and get the expected file</a>
                <br><br>

                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i>Make sure that the site name you need to generate XML exists in BTS IP PLANNING

                <div style="text-align: center; text-transform: uppercase; font-size: 1.5em; font-weight: bold;margin-top: 10px">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                        User manual
                    </span>
                </div>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i><strong>Step 1 :</strong> Fill the site name and choose the corresponding BSC and BCSU Index

                <br><br>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i><strong>Step 2 :</strong>  Click on the <strong>Validate</strong> button

                <br><br>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i><strong>Step 3 :</strong> Click on the <strong>Download XML file</strong> button


            </blockquote>
        </div>
    </div>



@endsection
