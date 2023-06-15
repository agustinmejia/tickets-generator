<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tickets</title>
    </head>
    <body>
        <div>
            <div>
                <br>
                <table class="table-header" width="100%" style="padding: 0px 5px">
                    <tr>
                        <td colspan="3"><h2>Liga Boliviana <br> <small>Fecha 1</small> </h2></td>
                    </tr>
                    <tr>
                        <td width="45%" style="vertical-align: top;">
                            <img src="{{ asset('images/team-demo.png') }}" width="60px" height="60px" alt=""> <br>
                            <small>Libertar Gran Mamoré</small>
                        </td>
                        <td width="10%"><b>VS</b></td>
                        <td width="45%" style="vertical-align: top;">
                            <img src="{{ asset('images/team-demo.png') }}" width="60px" height="60px" alt=""> <br>
                            <small>Oriente Petrolero</small>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><h3>Estadio "Gran Mamoré" <br> <small>Domingo, 13 de Julio de 2023</small> </h3></td>
                    </tr>
                </table>
                <br>
                <table class="table-details" width="100%" style="padding: 0px 10px">
                    <tr>
                        <td>Entrada Nro</td>
                        <td style="text-align: right"><b>000012</b></td>
                        <td rowspan="7" style="width: 90px; vertical-align: bottom;">
                            <div id="qrcode" style="margin-left: 10px;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td style="text-align: right"><b>16/Julio/2023</b></td>
                    </tr>
                    <tr>
                        <td>Hora</td>
                        <td style="text-align: right"><b>15:00</b></td>
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
        </div>
        <style>
            body {
                margin: 0;
                padding: 0;
                width: 8cm;
                /* border: 1px solid black */
            }
            .table-header td{
                text-align: center
            }
            .table-details {
                font-size: 11px
            }
            h2, h3 {
                margin: 5px 0px
            }
            h2 > small {
                font-size: 16px
            }
            h3 > small {
                font-size: 13px
            }
        </style>
        <script src="{{ asset('js/qrcode.js') }}"></script>
        <script>
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "$2y$10$m0ZVKxtWEsF4h.w928IPBOWs86gST1JMWwCUX/WZV8IwoZ2ouy8Qu",
                width: 80,
                height: 80,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        </script>
    </body>
</html>