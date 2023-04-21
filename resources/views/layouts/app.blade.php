<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Movilización 2021</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

    <style>
        
    </style>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-50">
        @livewire('navigation')


        <!-- Page Heading -->
        {{-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')


    @livewireScripts

    <script>
        AOS.init();

        function click_modal_view(url) {
            document.getElementById("main_iframe").src = url;
            document.getElementById("modal_view").click();
            console.log('url');
        }

        function view_ficha(title, tipo_insumo, ideas_generales, fuente, fecha, url)
        {
            document.getElementById("modal-ficha-link").href = url;

            document.getElementById("modal-ficha-titulo").innerHTML = title;
            document.getElementById("modal-ficha-tipo-insumo").innerHTML = tipo_insumo;
            document.getElementById("modal-ficha-ideas-generales").innerHTML = ideas_generales;
            document.getElementById("modal-ficha-fuente").innerHTML = fuente;
            document.getElementById("modal-ficha-fecha").innerHTML = fecha;

            document.getElementById("modal_view").click();
        }

        function ocultar(id)
        {
            if(document.getElementById(id))
            {
                //document.getElementById(id).style.display = 'none';
                $("#" + id).animate({bottom: '-203px'});
            }
            else
            {
                alert('Error, no existe el elemento ' + id);
            }
        }

        function mostrar(id)
        {
            if(document.getElementById(id))
            {
                //document.getElementById(id).style.display = 'block';
                $("#" + id).animate({bottom: '0px'});

                setTimeout(function()
                {
                    ocultar(id);
                }, 10000);
            }
            else
            {
                alert('Error, no existe el elemento ' + id);
            }
        }

        function ocultar_elemento(id)
        {
            if(document.getElementById(id))
            {
                document.getElementById(id).style.display = 'none';
            }
            else
            {
                alert('Error, no existe el elemento ' + id);
            }
        }

        function mostrar_elemento(id)
        {
            if(document.getElementById(id))
            {
                document.getElementById(id).style.display = 'block';
            }
            else
            {
                alert('Error, no existe el elemento ' + id);
            }
        }

        function generarClick(id)
        {
            if(document.getElementById(id))
            {
                document.getElementById(id).click();
            }
            else
            {
                alert('Error, no existe el elemento ' + id);
            }
        }

        function filtro_cambiar_tipo(valor_tipo)
        {
            valor_tipo = valor_tipo.trim();

            if(valor_tipo != '')
            {
                $('#filtro-tipo').removeClass('out-border-radius-rigth');

                document.getElementById("filtro-fecha-creacion").required = false;
                document.getElementById("filtro-fecha-inicio").required = false;
                document.getElementById("filtro-fecha-fin").required = false;
                document.getElementById("filtro-palabra").required = false;

                ocultar_elemento('filtro-contenedor-fecha-creacion');
                ocultar_elemento('filtro-contenedor-fecha-inicio');
                ocultar_elemento('filtro-contenedor-fecha-fin');
                ocultar_elemento('filtro-contenedor-palabra');
                ocultar_elemento('filtro-contenedor-boton');

                switch(valor_tipo)
                {

                    case '0':
                    {
                        //$('#filtro-contenedor-tipo').removeClass('col-sm-4');
                        //$('#filtro-contenedor-tipo').addClass('col-sm-6');
                        $('#filtro-tipo').addClass('out-border-radius-rigth');

                        mostrar_elemento('filtro-contenedor-boton');

                        break;
                    }

                    case '1':
                    {
                        //$('#filtro-contenedor-tipo').removeClass('col-sm-4');
                        //$('#filtro-contenedor-tipo').addClass('col-sm-6');

                        document.getElementById("filtro-fecha-creacion").required = true;

                        mostrar_elemento('filtro-contenedor-fecha-creacion');

                        break;
                    }

                    case '2':
                    {
                        //$('#filtro-contenedor-tipo').removeClass('col-sm-6');
                        //$('#filtro-contenedor-tipo').addClass('col-sm-4');

                        document.getElementById("filtro-fecha-inicio").required = true;
                        document.getElementById("filtro-fecha-fin").required = true;

                        mostrar_elemento('filtro-contenedor-fecha-inicio');
                        mostrar_elemento('filtro-contenedor-fecha-fin');

                        break;
                    }

                    case '3':
                    {
                        document.getElementById("filtro-palabra").required = true;

                        mostrar_elemento('filtro-contenedor-palabra');

                        break;
                    }

                    default:
                    {
                        break;
                    }
                }
            }
        }

        function contacto()
        {
            /*var parametros = 
            {
                nombres: $('#contacto-nombres').val(), 
                apellidos: $('#contacto-apellidos').val(),
                correo: $('#contacto-correo').val(),
                telefono: $('#contacto-telefono').val(),
                mensaje: $('#contacto-mensaje').val()
            };

            $.ajax(
            {
                type: 'GET',
                url: 'contacto',
                data: parametros,
                success: function(respuesta)
                {
                    var response = respuesta.trim();
                    console.log(response);

                    if(response == '0')
                    {
                        $('#contacto-notificacion').removeClass('alert-danger');
                        $('#contacto-notificacion').addClass('alert-success');

                        $('#contacto-notificacion').html('<strong>Success!</strong> Mensaje enviado.');

                        ocultar_elemento('contacto-formulario');
                    }
                    else
                    {
                        $('#contacto-notificacion').removeClass('alert-success');
                        $('#contacto-notificacion').addClass('alert-danger');

                        $('#contacto-notificacion').html('<strong>Warning!</strong> Ha ocurrido un error inesperado al enviar el mensaje.');
                    }

                    mostrar_elemento('contacto-notificacion');
                }
            });*/

            var parametros = new FormData($('#contacto-formulario')[0]);

            $.ajax(
            {
                data: parametros,
                url: 'https://calivirtual.net/correos/estallidosocial/correo.php',
                type: 'POST',
                contentType: false,
                processData: false,
                beforesend: function()
                {

                },
                xhr: function()
                {
                    var xhr = new window.XMLHttpRequest();

                    //Upload progress, request sending to server

                    xhr.upload.addEventListener("progress", function(evt)
                    {
                        if(evt.lengthComputable)
                        {
                            //percentComplete = (e.loaded / e.total) * 100;

                            percentComplete = parseInt( (evt.loaded / evt.total * 100), 10);
                            //$('#documentos-pendientes-barra').html('<b>Enviando Datos ' + percentComplete + '%</b>');
                            //document.getElementById('documentos-pendientes-barra').style.width = percentComplete + '%';
                            //console.log(percentComplete);
                        }
                        else
                        {
                            //console.log("Length not computable.");
                        }
                        
                    }, false);

                    //Download progress, waiting for response from server

                    xhr.addEventListener("progress", function(e)
                    {
                        //console.log("in Download progress");
                        if(e.lengthComputable)
                        {
                            //percentComplete = (e.loaded / e.total) * 100;

                            percentComplete = parseInt( (e.loaded / e.total * 100), 10);
                            //console.log(percentComplete);
                        }
                        else
                        {
                            //console.log("Length not computable.");
                        }

                    }, false);

                    return xhr;
                },
                success: function(respuesta)
                {
                    var response = respuesta.trim();
                    console.log(response);

                    if(response == '0')
                    {
                        $('#contacto-notificacion').removeClass('alert-danger');
                        $('#contacto-notificacion').addClass('alert-success');

                        $('#contacto-notificacion').html('<strong>Success!</strong> Mensaje enviado.');

                        ocultar_elemento('contacto-formulario');
                    }
                    else
                    {
                        $('#contacto-notificacion').removeClass('alert-success');
                        $('#contacto-notificacion').addClass('alert-danger');

                        $('#contacto-notificacion').html('<strong>Warning!</strong> Ha ocurrido un error inesperado al enviar el mensaje.');
                    }

                    mostrar_elemento('contacto-notificacion');
                }
            });
        }

        function filtro_paginacion(valor)
        {
            var lista = document.getElementById('filtro-tipo').options;

            for(var i = 0; i < lista.length; i++)
            {
                if(lista[i].value == valor)
                {
                    lista[i].selected = true;

                    generarClick('filtro-boton');

                    break;
                }
            }
        }

        function filtro_palabra_buscar(e)
        {
            var key;

            if(window.event)
            {
                key = window.event.keyCode;
            }
            else
            {
                key = e.which;
            }

            if(key == 13)
            {
                filtro_paginacion('3');
            }
        }
    </script>

    <style type="text/css">
        .paginacion .text-muted
        {
            color: #fff !important;
        }

        footer
        {
            color: #FFFFFF;
            padding: 30px 0;
            background: #215A9A;
        }

        .row
        {
            margin-right: -15px;
            margin-left: -15px;
        }

        .row:before, .row:after
        {
            display: table;
            content: " ";
        }

        .row:after
        {
            clear: both;
        }

        .col-sm-3, .col-sm-4, .col-sm-5
        {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-sm-5
        {
            width: 41.66666667%;
        }

        .col-sm-4
        {
            width: 33.33333333%;
        }

        .col-sm-3
        {
            width: 25%;
        }

        .btn-primary
        {
            background-color: #007bff !important;
        }

        .white-text
        {
            font-size: 24px;
            padding-bottom: 15px;
        }

        .info-footer
        {
            font-size: 15px;
            margin-bottom: 3px;
        }

        .info-footer > i
        {
            color: #66a9f4;
            margin-right: 10px;
        }

        .info-footer > a
        {
            color: #fff;
        }

        .info-footer > a:hover
        {
            text-decoration: underline;
        }

        .title-color-green
        {
            color: #009245;
        }
        
        .title-fondo
        {
            background: white;
            padding: 12px 0;
            border-radius: 0.5rem;
            margin-left: 0;
            margin-right: 0;
        }
        
        .descripcion-fondo
        {
            background: white;
            padding: 15px 15px;
            border-radius: 0.5rem;
        }

        .contenedor-fondo
        {
            background: white;
            padding: 10px 15px 10px 15px;
            margin: 10px 0 20px 0;
            border-radius: 0.5rem;
        }

        .form-control
        {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem !important;
            font-size: 1rem !important;
            font-weight: 400;
            line-height: 1.5 !important;
            color: #495057;
            background-color: #fff !important;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem !important;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
        }

        .out-border-radius-rigth
        {
            border-top-right-radius: 0rem !important;
            border-bottom-right-radius: 0rem !important;
        }

        .out-border-radius-left
        {
            border-top-left-radius: 0rem !important;
            border-bottom-left-radius: 0rem !important;
        }

        .article-img-color
        {
            /*box-shadow: 0px 0px 7px 1.3px #0071bcb3;*/
        }

        .article-video-color
        {
            
        }

        .contacto
        {
            position: fixed;
            bottom: 20px;
            right: 20px;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            background: #3366cc;
            color: white;
            padding-top: 4px;
            border: 2px solid white;
        }

        .contacto:hover
        {
            background: #66a9f4;
        }

        .contacto i
        {
            font-size: 21px;
        }

        .filtro-subrayar
        {
            background: greenyellow;
            padding: 0 5px;
            border-radius: 0.2rem;
        }

        @media (min-width: 768px)
        {
            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12
            {
                float: left;
            }
        }

        @media (max-width: 767px)
        {
            .element-form
            {
                width: 100% !important;
                max-width: 100% !important;
            }
        }
    </style>

    <button class="contacto" title="Contacto" id="boton-myModal" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-envelope"></i>
    </button>

    <button title="Contacto" id="boton-modal-inicial" data-toggle="modal" data-target="#modal-inicial" style="display: none"></button>

    <script src="https://kit.fontawesome.com/eda676de8b.js" crossorigin="anonymous"></script>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 seccionFooter">
                    <h3 class="white-text">Alcaldía de Santiago de Cali</h3>
                    <div class="info-footer clock">
                        <i class="fa-solid fa-clock"></i><a href="https://www.cali.gov.co/participacion/publicaciones/136949/canales-de-atencion-al-ciudadano/"> Canales de atención al ciudadano </a>
                    </div>
                    <div class="info-footer email">
                        <i class="fa-solid fa-envelope"></i><a href="https://servicios.cali.gov.co:9090/FormulariosAD/index_denuncia.html" title="Alcaldía de Santiago de Cali">Denuncias por acto de corrupción </a>
                    </div>
                    <div class="info-footer email">
                        <i class="fa-solid fa-envelope"></i><a href="https://www.cali.gov.co/participacion/publicaciones/43/oficina_de_atencin_al_ciudadano/"> Peticiones, quejas, reclamos, denuncias y sugerencias </a>
                    </div>
                    <div class="info-footer directory">
                        <i class="fa-solid fa-book"></i><a href="/directorio/">Directorio dependencias</a>
                    </div>
                    <div class="info-footer site-map">
                        <i class="fa-solid fa-clock"></i><a href="https://www.cali.gov.co/mapa-del-sitio">Mapa del sitio</a>
                    </div>
                    <div class="info-footer directory">
                        <i class="fa-solid fa-earth-americas"></i><a href="https://sig.cali.gov.co/app.php/staff/document/viewPublic/index/1195">Política de privacidad y tratamiento de datos personales</a> 
                    </div>
                </div>
                <div class="col-sm-5 seccionFooter">
                    <h3 class="white-text">Contáctanos</h3>
                    <div class="info-footer place">
                        <i class="fa-solid fa-earth-americas"></i><b>Dirección:</b> Centro Administrativo Municipal (CAM) Avenida 2 Norte #10 - 70. Santiago de Cali - Valle del Cauca - Colombia.
                    </div>
                    <div class="info-footer clock">
                        <i class="fa-solid fa-clock"></i><b>Horario atención presencial:</b> lunes a viernes de 8:00 a.m. a 11:30 a.m. y de 2:00 p.m. a 4:30 p.m.
                    </div>
                    <div class="info-footer phone">
                        <i class="fa-solid fa-phone"></i><b>Línea Nacional:</b> 01 8000 222 195
                    </div>
                    <div class="info-footer phone">
                        <i class="fa-solid fa-phone"></i><b>Líneas Locales:</b> 195 - (60+2) 887 9020
                    </div>
                    <div class="info-footer email">
                        <i class="fa-solid fa-envelope"></i><b>Correo institucional:</b> <a href="mailto:contactenos@cali.gov.co" title="Alcaldía de Santiago de Cali">contactenos@cali.gov.co</a>
                    </div>
                    <div class="info-footer directory">
                        <i class="fa-solid fa-book"></i><span><a href="https://www.cali.gov.co/hacienda/publicaciones/159070/el-numero-de-identificacion-tributaria-de-santiago-de-cali-distrito-especial-deportivo-cultural-turistico-empresarial-y-de-servicios/" title="Alcaldía de Santiago de Cali">NIT: </a></span><a href="https://www.cali.gov.co/hacienda/publicaciones/159070/el-numero-de-identificacion-tributaria-de-santiago-de-cali-distrito-especial-deportivo-cultural-turistico-empresarial-y-de-servicios/" title="Alcaldía de Santiago de Cali">890399011-3 </a>
                    </div>
                    <div class="info-footer email">
                        <i class="fa-solid fa-envelope"></i><a href="mailto:facturaselectronicas@cali.gov.co" title="Alcaldía de Santiago de Cali"><span>Recepción de facturas electrónicas:</span> facturaselectronicas@cali.gov.co</a>
                    </div>
                    <div class="info-footer email">
                        <i class="fa-solid fa-envelope"></i><a href="mailto:notificacionesjudiciales@cali.gov.co" title="Alcaldía de Santiago de Cali"><span>Notificaciones Judiciales:</span> notificacionesjudiciales@cali.gov.co</a>
                    </div>
                </div>
                <div class="col-sm-3 seccionFooter socialFooter">
                    <h3 class="white-text">Síguenos</h3>
                    <div class="socialItem">
                        <a href="https://www.facebook.com/AlcaldiaDeCali/" target="_blank" style="color: #fff"><span class="icon fa fa-facebook" style="color: #66a9f4"></span>&nbsp;&nbsp;Facebook</a>
                    </div>
                    <div class="socialItem">
                        <a href="https://twitter.com/alcaldiadecali" target="_blank" style="color: #fff"><span class="icon fa fa-twitter" style="color: #66a9f4"></span>&nbsp;&nbsp;Twitter</a>
                    </div>
                    <div class="socialItem">
                        <a href="https://www.youtube.com/user/AlcaldiadeCaliTV" target="_blank" style="color: #fff"><span class="icon fa fa-youtube" style="color: #66a9f4"></span>&nbsp;&nbsp;YouTube</a>
                    </div>
                    <div class="socialItem"><a href="https://www.instagram.com/alcaldiadecali/" target="_blank" style="color: #fff"><span class="icon fa fa-instagram" style="color: #66a9f4"></span>&nbsp;&nbsp;Instagram</a></div>
                    <!--<div class="logosGovCo">
                        <div class="row">
                            <div class="col-xs-6 col-sm-12 govCoImg"><img alt="Gov.co" id="218721" longdesc="Gov.co" src="info/principal/media/galeria218721.png" class="img-responsive" title="Gov.co"></div>
                            <div class="col-xs-6 col-sm-12"><img alt="CO" id="218722" longdesc="CO" src="info/principal/media/galeria218722.png" title="CO" class="img-responsive"></div>
                            
                        </div>
                        
                        
                    </div>-->
                </div>
            </div>
        </div>
    </footer>

</body>

</html>


{{-- C:\xampp\htdocs\movilizacion\node_modules\flowbite\dist\flowbite.js --}}
