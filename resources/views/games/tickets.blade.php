@extends('voyager::master')

@section('page_title', 'Ver Entradas')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-ticket"></i> Entradas &nbsp;&nbsp;
        <a href="{{ route('voyager.games.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            Volver a la lista
        </a>
        @if ($game->status == 'impresión')
        <a href="{{ route('games.tickets.print', $game) }}" class="btn btn-default" target="_blank">
            <span class="fa fa-print"></span>&nbsp;
            Imprimir diseño
        </a>
        <a href="#" data-toggle="modal" data-target="#generate-modal" class="btn btn-success" style="position: static">
            <span class="voyager-plus"></span>&nbsp;
            Generar
        </a>
        @endif
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
                                <h3 class="panel-title">Campeonato</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $game->championship }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Jornada</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $game->journey }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Local</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $game->local->name }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div><div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Visitante</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $game->visitor->name }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>N&deg;</th>
                                        <th>Sucursal</th>
                                        <th>Tipo</th>
                                        <th>Cantidad</th>
                                        <th>Observaciones</th>
                                        <th>Estado</th>
                                        <th>Registrado por</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @forelse ($game->prints as $item)
                                        <tr>
                                            <td>{{ $cont }}</td>
                                            <td>{{ $item->branch_office ? $item->branch_office->name : 'Ninguna' }}</td>
                                            <td>
                                                {{ $item->type }} <br>
                                                <b>{{ $item->price }} Bs.</b>
                                            </td>
                                            <td>
                                                {{ $item->finish_number - $item->start_number +1 }} localidades<br>
                                                <label class="label label-default">Del {{ $item->start_number }} al {{ $item->finish_number }}</label>
                                            </td>
                                            <td>{{ $item->observations }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                {{ $item->user ? $item->user->name : '' }} <br>
                                                {{ date('d/m/Y H:i', strtotime($item->created_at)) }} <br>
                                                <small>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small>
                                            </td>
                                            <td class="no-sort no-click bread-actions text-right">
                                                @if ($game->status == 'impresión' && !$item->branch_office)
                                                    <a href="{{ route('games.tickets.print', ['game' => $game, 'id' => $item->id]) }}" target="_blank" title="Imprimir" class="btn btn-sm btn-default">
                                                        <i class="fa fa-print"></i> <span class="hidden-xs hidden-sm">Imprimir</span>
                                                    </a>
                                                @endif
                                                @if ($game->status == 'impresión' && $item->tickets->where('status', 'disponible')->count() == $item->tickets->count())
                                                    <button title="Borrar" class="btn btn-sm btn-danger">
                                                        <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Borrar</span>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $cont++;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="8"><h5 class="text-center text-muted">No hay lote de tickets generados</h5></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Generate modal --}}
    <form class="form-submit" action="{{ route('games.tickets.generate', $game) }}" method="POST">
        @php
            $prints = $game->prints;
            $current_print = $prints->count() ? $prints->sortByDesc('finish_number')->first()->finish_number +1 : 1;
        @endphp
        @csrf
        <input type="hidden" name="game_id" value="{{ $game->id }}">
        <input type="hidden" name="start_number" value="{{ $current_print }}">
        <div class="modal modal-success fade" tabindex="-1" id="generate-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-plus"></i> Generar lote</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="quantity">Cantidad del lote</label>
                                <input type="number" name="quantity" class="form-control" step="1" min="10" max="{{ $game->quantity_tickets - $current_print }}" value="10" required>
                            </div>
                            <div class="col-md-6">
                                <label for="branch_office_id">Sucursal</label>
                                <select name="branch_office_id" class="form-control select2">
                                    <option value="">--Elija la sucursal--</option>
                                    @foreach (App\Models\BranchOffice::where('status', 1)->get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="type">Tipo de entrada</label>
                                <select name="type" class="form-control select2" required>
                                    <option value="normal">Normal</option>
                                    <option value="curva">Curva</option>
                                    <option value="preferencia">Preferencia</option>
                                    <option value="cortesía">Cortesía</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="price">Precio</label>
                                <input type="number" name="price" class="form-control" step="1" min="1" required>
                            </div>
                            <div class="col-md-12">
                                <label for="observations">Observaciones</label>
                                <textarea name="observations" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success btn-submit" value="Generar">
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            
        });
    </script>
@stop
