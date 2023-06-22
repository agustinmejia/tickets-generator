<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Entradas | {{ $game->local->name }} vs {{ $game->visitor->name }}</title>
    </head>
    <body>
        <div>
            @php
                $months = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                $days = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
            @endphp
            <table class="table-header" width="100%" style="padding: 0px 5px">
                <tr>
                    <td colspan="3">
                        <h3 style="margin-top: 0px !important">
                            {{ $game->championship }} <br>
                            <small>{{ $game->journey }}</small>
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td width="45%" style="vertical-align: top;">
                        <img src="{{ $game->local->logo ? asset('storage/'.str_replace('.', '-cropped.', $game->local->logo)) : asset('images/team-demo.png') }}" width="60px" height="60px" alt=""> <br>
                        <small>{{ $game->local->name }}</small>
                    </td>
                    <td width="10%"><b>VS</b></td>
                    <td width="45%" style="vertical-align: top;">
                        <img src="{{ $game->visitor->logo ? asset('storage/'.str_replace('.', '-cropped.', $game->visitor->logo)) : asset('images/team-demo.png') }}" width="60px" height="60px" alt=""> <br>
                        <small>{{ $game->visitor->name }}</small>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h4>
                            {{ $game->location }} <br>
                            <small>{{ $days[date('N', strtotime($game->datetime))] }}, {{ date('d', strtotime($game->datetime)) }} de {{ $months[intval(date('m', strtotime($game->datetime)))] }} de {{ date('Y', strtotime($game->datetime)) }}</small>
                        </h4>
                    </td>
                </tr>
            </table>
            <table class="table-details" width="100%">
                <tr>
                    <td>Nro</td>
                    <td style="text-align: right"><b>00001</b></td>
                    <td rowspan="7" style="width: 90px; vertical-align: bottom;">
                        <div id="qrcode" style="margin-left: 10px;"></div>
                    </td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td style="text-align: right"><b>{{ date('d', strtotime($game->datetime)) }}/{{ $months[intval(date('m', strtotime($game->datetime)))] }}/{{ date('Y', strtotime($game->datetime)) }}</b></td>
                </tr>
                <tr>
                    <td>Hora</td>
                    <td style="text-align: right"><b>{{ date('H:i', strtotime($game->datetime)) }}</b></td>
                </tr>
                <tr>
                    <td>Sector</td>
                    <td style="text-align: right"><b>Preferencia</b></td>
                </tr>
                <tr>
                    <td>Fila</td>
                    <td style="text-align: right"><b></b></td>
                </tr>
                <tr>
                    <td>Asiento</td>
                    <td style="text-align: right"><b></b></td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td style="text-align: right"><b>50 Bs.</b></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right"><br><small>Impreso por sucursal 1 - 20230630122312</small><br></td>
                </tr>
            </table>
            <br><br>
        </div>
        {{-- <div class="saltopagina"></div> --}}
    </body>
    <style>
        body {
            margin: 0px;
            padding: 0px 20px;
            /* width: 8cm; */
            /* border: 1px solid black */
        }
        .table-header td{
            text-align: center
        }
        .table-details {
            font-size: 11px
        }
        h3, h4 {
            margin: 5px 0px
        }
        h3 > small {
            font-size: 13px
        }
        h4 > small {
            font-size: 11px
        }
        .saltopagina{
            page-break-before: always;
        }
    </style>
    <script src="{{ asset('js/qrcode.js') }}"></script>
    <script>
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "2y10m0ZVKxtWEsF4hw928IPBOWs86g",
            width: 100,
            height: 100,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>
</html>