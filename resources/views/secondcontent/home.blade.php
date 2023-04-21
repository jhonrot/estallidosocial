@php $cantidad_imagenes_carousel = 0 @endphp

<x-app-layout>

    <div class="home-principal">
        <img class="home-image-fondo" src="{{ Storage::url('home/home_v3.jpg') }}" alt="" style="width: 100%">

        <div class="home-contenedor-botones">
            <div class="home-contenedor-boton">
                <img class="home-image-boton home-image-boton-1" src="{{ Storage::url('home/boton1.png') }}" alt="" onclick="ir_to('{{Route('secondcontent.index')}}')">
            </div>
            <div class="home-contenedor-boton home-image-boton" onmouseover="home_mostrar_submenu('home-menu-boton-2')">
                <img class="home-image-boton-2" src="{{ Storage::url('home/boton2.png') }}" alt="">
                <div class="home-menu-boton-2" id="home-menu-boton-2">
                    <div class="btn-group-vertical home-contenedor-submenu">
                        <a class="btn btn-primary home-boton-submenu" href="{{Route('generales_panorámica.index')}}">Una mirada Panorámica</a>
                        <a class="btn btn-primary home-boton-submenu" href="{{Route('secondcontent.analisis')}}">Análisis y reflexiones</a>
                        <a class="btn btn-primary home-boton-submenu" href="{{Route('secondcontent.derechos_humanos')}}">Derechos humanos</a>
                        <a class="btn btn-primary home-boton-submenu" href="{{Route('secondcontent.territorio')}}">Territorio y representaciones colectivas</a>
                    </div>
                </div>
            </div>
            <div class="home-contenedor-boton">
                <img class="home-image-boton home-image-boton-3" src="{{ Storage::url('home/boton3_v2.jpg') }}" alt="" onclick="ir_to('{{Route('dialogo.index')}}')">
            </div>
            <div class="home-contenedor-boton">
                <img class="home-image-boton home-image-boton-4" src="{{ Storage::url('home/boton4.png') }}" alt="" onclick="ir_to('{{Route('atencion.index')}}')">
            </div>
            <div class="home-contenedor-boton">
                <img class="home-image-boton home-image-boton-5" src="{{ Storage::url('home/boton5.png') }}" alt="" onclick="ir_to('{{Route('inclusion.index')}}')">
            </div>
            <div class="home-contenedor-boton">
                <img class="home-image-boton home-image-boton-6" src="{{ Storage::url('home/boton6.png') }}" alt="" onclick="ir_to('{{Route('arte.index')}}')">
            </div>
        </div>
    </div>

    <div class="container p-8">
        @foreach ($seconds as $second)
            @if ($second->id == '30')
                <article class="mb-8 bg-white shadow-xl rounded-md">
                    <div class="grid grid-cols-6 lg:grid-cols-4 gap-4">

                        <div class="col-start-2 col-span-4 lg:col-span-2">
                            <div class="px-6 py-4" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                                {{--<iframe class="rounded-md w-full h-72" src="{{ $second->url }}?start=2"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen id="home-video-entrevista">
                                </iframe>--}}
                                <div class="rounded-md w-full h-72" id="home-video-entrevista"></div>
                            </div>
                        </div>

                        <div class="col-start-1 col-end-7 lg:col-span-2">
                            <div class="px-6 py-4" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                                <h2 class="lg:text-xl text-sm text-left font-bold font-ral text-black mb-6"> {{ $second->title }}</h2>
                                <div class="text-gray-700 text-base">
                                    <p class="mb-7">{{ $second->description }}</p>
                                </div>
                                <p class="font-ral font-semibold flex justify-end mr-3" style="color: green">{{ $second->date }}</p>
                                <span class="text-sm font-ral font-semibold text-slate-900 flex justify-end mr-3">
                                    {{ $second->font }}
                                </span>
                                <div class="row">
                                        <div class="col-sm-12">
                                            <a class="text-sm text-gray-900 font-semibold bg-gray-300 rounded-md font-ral px-3 py-1 my-1 float-right "
                                            href='javascript:view_ficha("{{ $second->title }}", "Medios de comunicación - Video - Entrevista", "{{ $second->description }}", "{{ $second->font }}", "{{ $second->date }}", "{{ $second->url }}");//click_modal_view("{{ Storage::url($second->content_tab) }}")'>
                                            Ficha de contenido
                                            </a>
                                        </div>
                                        <button type="button" class="badge text-sm bg-gray-400 rounded-md font-ral px-3 py-1 "
                                        data-modal-toggle="defaultModal" id="modal_view" style="display:none;">Ficha de
                                        contenido
                                    </button>
                                    </div>
                            </div>
                        </div>
                        
                    </div>
                </article>
            @endif
        @endforeach

        @foreach ($seconds as $second)
            @if ($second->id == '47')
                <article class="mb-8 bg-white shadow-xl rounded-md">
                    <div class="grid grid-cols-6 lg:grid-cols-4 gap-4">

                        <div class="col-start-1 col-end-7 lg:col-span-2">
                            <div class="px-6 py-4" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                                <h2 class="lg:text-xl text-sm text-left font-bold font-ral text-black mb-6"> {{ $second->title }}</h2>
                                <div class="text-gray-700 text-base">
                                    <p class="mb-7">{{ $second->description }}</p>
                                </div>
                                <p class="font-ral font-semibold flex justify-end mr-3" style="color: green">{{ $second->date }}</p>
                                <span class="text-sm font-ral font-semibold text-slate-900 flex justify-end mr-3">
                                    {{ $second->font }}
                                </span>
                                <div class="col-sm-12">
                                            <a class="text-sm text-gray-900 font-semibold bg-gray-300 rounded-md font-ral px-3 py-1 my-1 float-right "
                                            href="javascript:view_ficha('{{ $second->title }}', '{{ $second->insumo }}', '{{ $second->description }}', '{{ $second->font }}', '{{ $second->date }}', '{{ $second->url }}');">
                                            Ficha de contenido
                                            </a>
                                        </div>
                                        <button type="button" class="badge text-sm bg-gray-400 rounded-md font-ral px-3 py-1 "
                                        data-modal-toggle="defaultModal" id="modal_view" style="display:none;">Ficha de
                                        contenido
                                    </button>
                                    <br>
                                    <br>
                            </div>
                        </div>

                        <div class="col-start-2 col-span-4 lg:col-span-2">
                            <div class="px-6 py-4" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                                <iframe class="rounded-md w-full h-72" src="{{ $second->url }}?start=2"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>

                    </div>
                </article>
            @endif
        @endforeach

        <h2 class="text-3xl text-gray-600 font-ral font-bold mb-6 mr-2">La noticia en fotos</h2>

        @php
            $contador = 0;
        @endphp

        <div id="carrusel">
            <a href="#" class="left-arrow" id="left-arrow"><img src="images/left-arrow.png" /></a>
            <a href="#" class="right-arrow" id="right-arrow"><img src="images/right-arrow.png" /></a>

            <div class="carrusel">
                @foreach ($second_contents as $secon)
                    @if($secon->id != 104 && $secon->id != 110 && $secon->id != 114 && $secon->id !=117 && $secon->id != 120 && $secon->id != 129)
                    <div class="product" id="product_{{ $contador }}" onmouseover="mostrar('slider-item_{{ $contador }}')">
                        @foreach ($secon->image as $img)
                        <img src="{{ Storage::url($img->url) }}" data-id="{{ $secon->id }}" alt="{{ $secon->title }}" width="195" height="100" />
                        <div class="carousel-contenedor-link" id="slider-item_{{ $contador }}">
                            <h5>{{ $secon->title }}</h5>
                            <br>
                            <a href="{{ $secon->url }}" target="_blank" class="bg-lime-600 rounded-md px-1 py-1 text-sm mr-3 carousel-color-link">Leer más</a>
                        </div>
                        @endforeach
                    </div>
                        @php
                            $contador++;
                            $cantidad_imagenes_carousel++;
                        @endphp
                    @endif
                @endforeach
            </div>
        </div>
    </div>

<style>
    .ficha-titulo
    {
        width: 98%;
        background: #36c;
        color: #fff;
        padding: 10px 0px;
        border-radius: 0.4rem;
    }

    .btn-danger
    {
        background-color: #dc3545 !important;
    }

    .close
    {
        padding: initial;
        margin: initial;
    }

    .modal-contacto 
    {
        width: 60%;
        max-width: initial;
    }
</style>

<div id="defaultModal" tabindex="-1" aria-hidden="true"
    class="fixed inset-0 top-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto   md:inset-0 h-modal md:h-full ">
    <div class="relative flex items-end justify-center w-full h-full max-w-md lg:max-w-2xl p-4 md:h-auto pt-4 px-4 pb-20 sm:block sm:p-0 ">
        <!-- Modal content -->
        {{-- <div class="hidden sm:inline-flex sm:align-text-bottom sm:h-screen"></div> --}}
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-toggle="defaultModal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl text-center font-medium text-gray-900 dark:text-white ficha-titulo">Ficha de contenido</h3>
                <div class="w-full h-60 lg:h-96 overflow-auto touch-pan-y">
                    <table class="table table-bordered">
                        <tr>
                            <td><b>Título: </b><br><div id="modal-ficha-titulo"></div><br></td>
                        </tr>

                        <tr>
                            <td><b>Tipo de insumo: </b><br><div id="modal-ficha-tipo-insumo"></div><br></td>
                        </tr>

                        <tr>
                            <td><b>Ideas generales: </b><br><div id="modal-ficha-ideas-generales"></div><br></td>
                        </tr>

                        <tr>
                            <td><b>Fuente: </b><br><div id="modal-ficha-fuente"></div><br></td>
                        </tr>

                        <tr>
                            <td><b>Fecha: </b><br><div id="modal-ficha-fecha"></div><br></td>
                        </tr>
                    </table>
                    
                    <center>
                        <a href="" id="modal-ficha-link" target="_blank" class="text-sm text-gray-900 font-semibold bg-lime-400 rounded-md px-3 py-1 pb-0">Leer más</a>
                    </center>
                    <br>
                </div>
                {{-- @foreach ($seconds as $item)
                    {{$item->title}}
                @endforeach --}}
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-contacto">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="linea-menu" style="border-top-left-radius: 0.2rem;border-top-right-radius: 0.2rem;"></div>
            <div class="modal-header">
                <h2 class="modal-title" style="text-align: center;width: 100%"><b>Si tienes material que quieras compartirnos y mostrar en este espacio, únete aquí:</b></h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="javascript: contacto()" id="contacto-formulario" name="contacto-formulario" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for=""><b>Nombres:</b></label>
                                    <input id="contacto-nombres" name="contacto-nombres" type="text" class="form-control" minlength="1" placeholder="Nombres" required>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for=""><b>Apellidos:</b></label>
                                    <input id="contacto-apellidos" name="contacto-apellidos" type="text" class="form-control" minlength="1" placeholder="Apellidos" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for=""><b>Email:</b></label>
                                    <input id="contacto-correo" name="contacto-correo" type="mail" class="form-control" minlength="1" placeholder="Email" required>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for=""><b>Teléfono de contacto:</b></label>
                                    <input id="contacto-telefono" name="contacto-telefono" type="tel" class="form-control" placeholder="Teléfono de contacto" minlength="1">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for=""><b>Déjanos un mensaje:</b></label>
                                    <textarea id="contacto-mensaje" name="contacto-mensaje" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="contacto-file"><b>Archivo adjunto:</b></label>
                                    <input id="contacto-file" name="contacto-file" type="file" class="form-control" style="padding: 0 !important">
                                </div>
                            </div>

                            <center>
                                <button class="btn btn-primary" type="submit" style="background-color: #007bff">Enviar</button>
                            </center><br>
                        </form>

                        <div class="alert alert-success" id="contacto-notificacion" style="display: none">
                            <strong>Success!</strong> Indicates a successful or positive action.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton-cerrar-myModal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<div id="modal-inicial" class="modal fade" role="dialog">
    <div class="modal-dialog modal-contacto">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="linea-menu" style="border-top-left-radius: 0.2rem;border-top-right-radius: 0.2rem;"></div>
            <div class="modal-header">
                <h2 class="modal-title" style="text-align: center;width: 100%;font-size: 18px">
                    <b>Si tienes material que quieras compartirnos y mostrar en este espacio, únete <a href="javascript: generarClick('boton-cerrar-modal-inicial');generarClick('boton-myModal')">aquí</a>:</b>
                </h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton-cerrar-modal-inicial">Cerrar</button>
            </div>
        </div>

    </div>
</div>
</x-app-layout>

<script src="https://www.youtube.com/iframe_api"></script>

<style>

    .home-principal
    {
        position: relative;
        width: 100%;
        height: fit-content;
    }

    .home-contenedor-botones
    {
        position: absolute;
        width: 68%;
        height: 52%;
        top: 39%;
        left: 4%;
    }

    .home-image-fondo
    {

    }

    .home-image-boton:hover
    {
        transform: scale(1.1);
    }

    .home-image-boton-1
    {
        height: 100%;
    }

    .home-contenedor-boton
    {
        position: relative;
        height: 100%;
        margin: 0 2px 0 0;
        display: inline-block;
        cursor: pointer;
    }

    .home-image-boton-2
    {
        height: 100%;
    }

    .home-image-boton-3
    {
        height: 100%;
    }

    .home-image-boton-4
    {
        height: 100%;
    }

    .home-image-boton-5
    {
        height: 100%;
    }

    .home-image-boton-6
    {
        height: 100%;
        margin: 0 0 0 0;
    }

    .home-menu-boton-2
    {
        position: absolute;
        width: 100%;
        height: 0px;
        left: 0 !important;
        right: 0 !important;
        bottom: 0;
        background: #215a9aba;
        color: #fff;
        overflow: hidden;
    }

    .home-contenedor-submenu
    {
        width: 100%;
    }

    .home-contenedor-submenu a
    {
        font-size: 1.1vw;
    }

    .home-boton-submenu
    {
        border-bottom: 1px solid #a6c3fd;
        margin-bottom: 1px;
    }

    .carousel-inner img
    {
        width: 100%;
        height: 600px;
        border-radius: 0.3rem;
        cursor: pointer;
    }

    .carousel-control-prev-icon
    {
        width: 75px !important;
        height: 75px !important;
    }

    .carousel-control-next-icon
    {
        width: 75px !important;
        height: 75px !important;
    }

    .carousel-contenedor-link
    {
        position: absolute;
        height: 203px;
        left: 0 !important;
        right: 0 !important;
        bottom: -203px;
        background: #215a9aba;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fff;
        text-align: center;
    }

    .carousel-color-link
    {
        color: #fff !important;
    }

    /* ///////////////// */

    #carrusel
    {
        width: 100%;
        max-width: 1200px;
        overflow:hidden;
        height:203px;
        position:relative;
        margin-top:20px;
        margin-bottom:20px;
    }

    #carrusel .left-arrow
    {
        position:absolute;
        left:10px;
        z-index:1;
        top:50%;
        margin-top:-9px;
    }
    
    #carrusel .right-arrow
    {
        position:absolute;
        right:10px;
        z-index:1;
        top:50%;
        margin-top:-9px;
    }
    
    .carrusel
    {
        width:{{ ($contador * 201) }}px;
        left:0px;
        position:absolute;
        z-index:0;
    }
    
    .carrusel>div
    {
        float: left;
        height: 203px;
        margin-right: 5px;
        width: 195px;
        text-align:center;
        border: none;
    }
    
    .carrusel img
    {
        cursor:pointer;
    }
    
    .product
    {
        position: relative;
        border:#CCCCCC 1px solid;
    }

    .product img
    {
        height: 203px;
        border-radius: 0.4rem;
    }

    @media screen and (max-width: 700px)
    {
        .home-contenedor-boton
        {
            margin-right: 0px;
        }
    }

    @media screen and (max-width: 500px)
    {
        .home-contenedor-botones
        {
            height: 50%;
        }
    }

    @media screen and (max-width: 350px)
    {
        .home-contenedor-botones
        {
            height: 47%;
        }
    }
</style>

<script>
    var current = 0;
    var imagenes = new Array();
    var interval = null;

    var player;

    function onYouTubeIframeAPIReady()
    {
        player = new YT.Player('home-video-entrevista',
        {
            videoId: 'WOm5_UOiX54',
            events:
            {
                'onReady': onPlayerReady
            }
        });
    }

    function onPlayerReady(event)
    {
        setTimeout(iniciarVideo, 3000);
    }

    function iniciarVideo()
    {
        player.playVideo();

        setTimeout(pauseVideo, 3000);
    }
    
    function pauseVideo()
    {
        player.pauseVideo();
    }

    function iniciar()
    {
        clearInterval(interval);

        interval = setInterval(function()
        {
            document.getElementById('right-arrow').click();
        }, 5000);
    }

    function home_mostrar_submenu(id)
    {
        if(document.getElementById(id))
        {
            $("#" + id).animate({height: '100%'});

            setTimeout(function()
            {
                home_ocultar_submenu(id);
            }, 10000);
        }
        else
        {
            alert('Error, no existe el elemento ' + id);
        }
    }

    function home_ocultar_submenu(id)
    {
        if(document.getElementById(id))
        {
            $("#" + id).animate({height: '0px'});
        }
        else
        {
            alert('Error, no existe el elemento ' + id);
        }
    }
    
    $(document).ready(function()
    {
        var numImages = {{ $cantidad_imagenes_carousel }};
        var cant_img = 6;

        if (numImages <= cant_img)
        {
            $('.right-arrow').css('display', 'none');
            $('.left-arrow').css('display', 'none');
        }
    
        $('.left-arrow').on('click',function()
        {
            if(current > 0)
            {
                current = current - 1;
            }
            else 
            {
                current = numImages - cant_img;
            }
    
            $(".carrusel").animate({"left": -($('#product_'+current).position().left)}, 600);

            iniciar();
    
            return false;
        });
    
        $('.left-arrow').on('hover', function()
        {
            $(this).css('opacity','0.5');
        }, function()
        {
            $(this).css('opacity','1');
        });
    
        $('.right-arrow').on('hover', function()
        {
            $(this).css('opacity','0.5');
        }, function()
        {
            $(this).css('opacity','1');
        });
    
        $('.right-arrow').on('click', function()
        {
            if(numImages > current + cant_img)
            {
                current = current+1;
            }
            else
            {
                current = 0;
            }
    
            $(".carrusel").animate({"left": -($('#product_'+current).position().left)}, 600);

            iniciar();
    
            return false;
        }); 

        iniciar();
    });

    function ir_to(url)
    {
        window.location = url;
    }

    function ocultar_iniciar()
    {
        ocultar_elemento('linea-menu');
        ocultar_elemento('menu');
    }

    ocultar_iniciar();

    generarClick('boton-modal-inicial');
</script>