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
    <li class="current breadcrumb-item" aria-current="page"><u style="margin-left: 6px;font-style: italic">Upgrade Capacity documentation</u></li>
    <a href="{{ url('/') }}">
        <button type="button" style="margin-bottom:5px;margin-left: 700px;" class="btn btn-danger">Return<i style="margin-left: 5px" class="fa fa-reply" aria-hidden="true"></i></button>
    </a>
@endsection
@section('content')

    <div class="panel panel-default" style="margin-bottom: 7%">
        <div style="text-align: center; text-transform: uppercase; font-size: 1.5em; font-weight: bold;">
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                Upgrade capacity documentation
            </span>
        </div>
        <div class="container-fluid">
            <blockquote>
                The accomplishment of the task <strong> Upgrade capacity nokia 2G </strong> requires the update of the following excel files:

                <br><br>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i>
                The <span class="fichier">BTS IP PLANNING</span> file on the <span class="fichier">BTS PLAN sheet.</span> <a href="{{ url('BTS_IP_PLANNING_BTS_PLAN.xlsx') }}">Click here and get the expected file</a>
                <br><br>

                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i>
                The <span class="fichier">table of BCSU ip addresses corresponding to the site names</span>.
                <br>

                <strong style="margin-right: 10px">NB :</strong>To update this table, please connect to BSCs via Tang, then save a log with the name <i><strong>zero.log</strong></i> which you copy to your desktop directory. Connect to this application again, under the menu <i><strong>update data. -> Sites names and BCSU IP table</strong></i> and update.<a href="{{ url('zero.log') }}"> Click here and get the expected file</a>

                <br><br>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i>The excel file received from the Radio and optimization department must be used and defined according to this template. <a href="{{ url('CR_FOR_UPGRADE-YABC05.xlsx') }}">Please download the file to fill</a>

                <br>
                <strong style="margin-right: 10px">NB :</strong>No field of this file should be empty, otherwise during processing by the application, an error would be generated

                <div style="text-align: center; text-transform: uppercase; font-size: 1.5em; font-weight: bold;margin-top: 10px">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                        User manual
                    </span>
                </div>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i><strong>Step 1 :</strong> Choose the CR file previously filled

                <br><br>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i><strong>Step 2 :</strong>  Click on the Import button

                <br><br>
                <i class="far fa-hand-point-right" style="margin-right: 20px;margin-left: 55px"></i><strong>Step 3 :</strong> Click on the Download script button


            </blockquote>
        </div>
    </div>



@endsection
