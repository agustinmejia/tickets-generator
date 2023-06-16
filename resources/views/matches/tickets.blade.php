@extends('voyager::master')

@section('page_title', 'Ver Entradas')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-ticket"></i> Entradas &nbsp;&nbsp;
        <a href="{{ route('voyager.matches.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            Volver a la lista
        </a>
        <a href="{{ route('matches.tickets.print', $match) }}" class="btn btn-default" target="_blank">
            <span class="fa fa-print"></span>&nbsp;
            Imprimir diseño 
        </a>
    </h1>
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Parameter</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>Value</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            
        });
    </script>
@stop
