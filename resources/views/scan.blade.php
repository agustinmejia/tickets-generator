@extends('layouts.app')

@section('seo')
    <title>Escanea tu entrada | {{ setting('site.title') }}</title>
    <meta content="Verifica la autenticidad de tu entrada" name="description">
    <meta content="{{ setting('site.description') }}" name="keywords">
@endsection

@section('content')
    <main id="main">
        <!-- Hero Section - Home Page -->
        <section id="hero" class="hero">

            <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-instructions">
                        <h2 data-aos="fade-up" data-aos-delay="100">Verificar entrada</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Para verificar la autenticidad de tu entrada puedes escanear el código QR.</p>
                        <div class="img-instructions" data-aos="fade-up" data-aos-delay="300" style="margin-top: 50px; text-align: center">
                            <img src="{{ asset('images/scan.gif') }}" style="position:static; width: 300px !important" alt="Scan">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="reader"></div>
                    </div>
                </div>
            </div>
        </section><!-- End Hero Section -->
    </main>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
    <style>
        #reader {
            width: 100%;
            height: 60vh
        }
        @media (max-width: 480px) {
            .text-instructions {
                text-align: center
            }
            .img-instructions {
                display: none
            }
        }
    </style>
@endsection

@section('javascript')
    <script src="{{ asset('js/jsqrcode-combined.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <script>
        var scan = false;
        $(document).ready(function(){
            $('#reader').html5_qrcode(function(data){
                if (!scan) {
                    $.get("{{ url('scan') }}/"+data, function(res){
                        scan = true;
                        if(res.code) {
                            Swal.fire({
                                'title': 'Entrada válida',
                                'text': 'Tu entrada ha sido verificada correctamente',
                                'icon': 'success',
                                'confirmButtonText': 'Listo'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    scan = false;
                                }
                            });
                        }else{
                            Swal.fire({
                                'title': 'Entrada no válida',
                                'text': 'El código escaneado no es válido o pertenece a una entrada caducada',
                                'icon': 'error',
                                'confirmButtonText': 'Entendido'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    scan = false;
                                }
                            });
                        }
                    });   
                }
            },
            function(error){
                console.log("Escaneando...");
            }, function(videoError){
                console.log("Camera error.", videoError);
            });
        });
    </script>
@endsection