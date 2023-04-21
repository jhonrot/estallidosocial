<x-app-layout>
    <div class="container p-8">
        <div class="contenedor-fondo">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{Route('secondcontent.home')}}" class="migas_pan">Inicio</a> / <a href="" class="migas_pan">Exploración y diálogo</a>
                </div>
            </div>

            <h1 class="mb-12 title-color-green">Exploración y Diálogo</h1>

            <div class="row">
                <div class="col-sm-12">
                    <p>
                        @foreach ($maincontents as $maincont)
                            @if ($maincont->id == '3')
                                {{ $maincont->description }}
                            @endif
                        @endforeach
                    </p>
                </div>
            </div><br><br>

            <div class="row">
                <div class="col-sm-12">
                    <form action="" id="form-filtro-palabra">
                        <div class="form-group col-sm-6 element-form" id="filtro-contenedor-tipo" style="display: none">
                            <label for=""><b>Visualización:</b></label>
                            <div class="input-group">
                                <select name="filtro-paginacion" id="filtro-paginacion" class="form-control out-border-radius-rigth">
                                    <option @php echo ($paginacion == 5)?'selected':''; @endphp value="5">5 articulos por pagina</option>
                                    <option @php echo ($paginacion == 10)?'selected':''; @endphp value="10">10 articulos por pagina</option>
                                    <option @php echo ($paginacion == 20)?'selected':''; @endphp value="20">20 articulos por pagina</option>
                                    <option @php echo ($paginacion == 50)?'selected':''; @endphp value="50">50 articulos por pagina</option>
                                    <option @php echo ($paginacion == 100)?'selected':''; @endphp value="100">100 articulos por pagina</option>
                                </select>
                                <select class="form-control out-border-radius-left" name="filtro-tipo" id="filtro-tipo" onchange="filtro_cambiar_tipo(this.value)" style="display: none">
                                    <option value="" disabled selected>Seleccione el filtro</option>
                                    <option @php echo ($tipo == '3')?'selected':''; @endphp value="3">Palabra clave</option>
                                    <option @php echo ($tipo == '1')?'selected':''; @endphp value="1">Fecha de creación</option>
                                    <option @php echo ($tipo == '2')?'selected':''; @endphp value="2">Rango de fecha de creación</option>
                                    <option @php echo ($tipo == '0')?'selected':''; @endphp value="0">Todos</option>
                                </select>

                                <span class="input-group-btn" id="filtro-contenedor-boton">
                                    <button class="btn btn-primary out-border-radius-left" title="Buscar" onclick="filtro_paginacion('0')">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-sm-6 element-form" id="filtro-contenedor-fecha-creacion" style="display: none">
                            <label for=""><b>Fecha de creación:</b></label>
                            <div class="input-group">
                                <input type="date" class="form-control out-border-radius-rigth" name="filtro-fecha-creacion" id="filtro-fecha-creacion" value="{{ $fecha_creacion }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary out-border-radius-left" title="Buscar">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>                        
                        </div>

                        <div class="form-group col-sm-3 element-form" id="filtro-contenedor-fecha-inicio" style="display: none">
                            <label for=""><b>Fecha de creación:</b></label>
                            <input type="date" class="form-control" name="filtro-fecha-inicio" id="filtro-fecha-inicio" value="{{ $fecha_inicio }}">
                        </div>

                        <div class="form-group col-sm-3 element-form" id="filtro-contenedor-fecha-fin" style="display: none">
                            <label for=""><b>Fecha de creación:</b></label>
                            <div class="input-group">
                                <input type="date" class="form-control out-border-radius-rigth" name="filtro-fecha-fin" id="filtro-fecha-fin" value="{{ $fecha_fin }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary out-border-radius-left" title="Buscar">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>  
                        </div>

                        <div class="form-group col-sm-6 element-form" id="filtro-contenedor-palabra">
                            <label for=""><b>Búsqueda por palabra clave:</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control out-border-radius-rigth" name="filtro-palabra" id="filtro-palabra" minlength="" maxlength="50" value="{{ $palabra }}" onkeypress="filtro_palabra_buscar()">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-primary out-border-radius-left" title="Buscar" onclick="filtro_paginacion('3')">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>                        
                        </div>

                        <button type="submit" id="filtro-boton" style="display: none"></button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <form action="">
                        <div class="form-group col-sm-12 element-form">
                            <label for=""><b>Fecha:</b></label>
                            <div class="input-group">
                                <input type="date" class="form-control out-border-radius-rigth" name="filtro-fecha-inicio" id="filtro-fecha-inicio" value="{{ $fecha_inicio }}">
                                <input type="date" class="form-control out-border-radius-rigth" name="filtro-fecha-fin" id="filtro-fecha-fin" value="{{ $fecha_fin }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary out-border-radius-left" title="Buscar">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>  
                        </div>

                        <input type="text" name="filtro-tipo" id="filtro-tipo" value="4" style="display: none">
                    </form>
                </div>
            </div>
        </div>

        @foreach ($seconds as $second)
            @if ($second->category_id !=1 && $second->category_id != 2)
                @php
                    $mostrar = false;
                    $fecha_pivot = date_create(date_create($second->date)->format('Y-m-d'));

                    $nuevo_titulo = $second->title;
                    $nueva_descripcion = $second->description;

                    if($tipo != '')
                    {
                        if($tipo == '1')
                        {
                            $fecha_pivot_creacion = date_create($fecha_creacion);

                            if($fecha_pivot == $fecha_pivot_creacion)
                            {
                                $mostrar = true;
                            }
                        }

                        if($tipo == '2')
                        {
                            $fecha_pivot_inicio = date_create($fecha_inicio);
                            $fecha_pivot_fin = date_create($fecha_fin);

                            if($fecha_pivot >= $fecha_pivot_inicio && $fecha_pivot <= $fecha_pivot_fin)
                            {
                                $mostrar = true;
                            }
                        }

                        if($tipo == '3')
                        {
                            $nuevo_titulo = str_replace($palabra, '<span class="filtro-subrayar">'.$palabra.'</span>', $second->title);
                            $nueva_descripcion = str_replace($palabra, '<span class="filtro-subrayar">'.$palabra.'</span>', $second->description);

                            $mostrar = true;
                        }

                        if($tipo == 4)
                        {
                            $mostrar = true;
                        }

                        if($tipo == '0')
                        {
                            $mostrar = true;
                        }
                    }
                    else
                    {
                        $mostrar = true;
                    }

                    if(false)
                    {
                        $mostrar = false;
                    }
                
                    if($mostrar)
                    {
                @endphp
                    <article class="mb-8 bg-white shadow-xl rounded-md">
                        <div class="grid grid-cols-6 lg:grid-cols-7 lg:gap-5">

                            <div class="col-start-2 col-span-4 lg:col-span-3" data-aos="fade-right">
                                <div class="px-6 py-4">
                                    @foreach ($second->image as $img)
                                        <img src="{{ Storage::url($img->url) }}" alt=""
                                            class="w-full lg:h-full md:h-60 h-52 object-cover object-center rounded-md article-img-color" data-id="{{$second->id}}">
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-start-1 col-end-7 lg:col-span-4" data-aos="fade-left">
                                <div class="px-6 py-4">
                                    <h2 class="mb-2">
                                        <a href="{{ route('secondcontent.show', $second) }}"
                                            class=" text-sm lg:text-xl text-left font-bold text-black"
                                            target="_blank"><?php echo $nuevo_titulo; ?></a>
                                    </h2>
                                    <p class="font-bold text-sm lg:text-base mb-3" style="color: green">{{ $fecha_pivot->format('d-m-Y') }}
                                    </p>

                                    <div>
                                        <p class="text-gray-700 mb-6"><?php echo $nueva_descripcion; ?></p>
                                    </div>

                                    <span class="text-sm text-blue-500 font-semibold px-0 py-1 pb-4 flex justify-end">
                                        {{ $second->font }}
                                    </span>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="{{ $second->url }}" target="_blank" class="text-sm text-gray-900 font-semibold bg-lime-400 rounded-md px-3 py-1 pb-0 float-right">Leer más</a>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="text-sm text-gray-900 font-semibold bg-gray-300 rounded-md font-ral px-3 py-1 my-1 float-right "
                                            href="javascript:view_ficha('{{ $second->title }}', '{{ $second->insumo }}', '{{ $second->description }}', '{{ $second->font }}', '{{ $second->date }}', '{{ $second->url }}');">
                                            Ficha de contenido
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <button type="button" class="badge text-sm bg-gray-400 rounded-md font-ral px-3 py-1 "
                                        data-modal-toggle="defaultModal" id="modal_view" style="display:none;">Ficha de
                                        contenido
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                @php
                    }
                @endphp
            @endif
        @endforeach

        <div class="mt-4 paginacion">
            {{ $seconds->appends(['videos' => $seconContents->currentPage(), 'podcats' => $seconContents_2->currentPage()])->links("pagination::bootstrap-5") }}
        </div>
        <x-modal />
        <br>
        @if(true)
            {{-- Catgoria Música y videoclips --}}
            <h2 class="text-2xl text-gray-700 font-ral font-semibold mb-6 contenedor-fondo" id="titulo-musica">Videos</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                @php
                $contador = 0
                @endphp
                @foreach ($seconContents as $second)
                    @if ($second->category_id == 1)
                        @php

                            $nuevo_titulo = $second->title;
                            $nueva_descripcion = $second->description;

                            if($tipo == '3')
                            {
                                $nuevo_titulo = str_replace($palabra, '<span class="filtro-subrayar">'.$palabra.'</span>', $second->title);
                                $nueva_descripcion = str_replace($palabra, '<span class="filtro-subrayar">'.$palabra.'</span>', $second->description);
                            }

                            $contador++;
                        @endphp
                    <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                        style="cursor: pointer">
                        <iframe class="w-full object-cover object-center rounded-lg mb-3" src="{{ $second->url }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen data-aos="flip-left">
                        </iframe>
                        <div class="px-6 py-4">
                            <h5 class="text-base font-ral font-extrabold tracking-tight text-gray-700 dark:text-white">
                                <?php echo $nuevo_titulo; ?>
                            </h5>
                            <h2 class="text-sm font-ral font-extrabold tracking-tight text-gray-500 dark:text-white pb-4">{{$second->font}}</h2>
                            <a href="{{ $second->url }}"
                                class="inline-block bg-blue-300 rounded-full px-3 py-1 text-sm font-ral font-semibold text-gray-700 mr-20"
                                target="_blank">Ver más
                            </a>
                            <small class="text-lime-500 text-base font-bold">{{ $second->date }}</small>
                            <br>
                            <a href="javascript:view_ficha('{{ $second->title }}', '{{ $second->insumo }}', '{{ $second->description }}', '{{ $second->font }}', '{{ $second->date }}', '{{ $second->url }}');"
                                class="inline-block rounded-full px-3 py-1 text-sm font-ral font-semibold bg-gray-300 mr-20" style="margin-top: 5px;">Ficha de contenido
                            </a>

                        </div>

                    </div>
                    @endif
                @endforeach
                @if($contador == 0)
                <script type="text/javascript">
                    document.getElementById('titulo-musica').style.display = "none";
                </script>
                @endif
            </div>

            <div class="mt-4 paginacion">
                {{ $seconContents->appends(['articles' => $seconds->currentPage(), 'podcats' => $seconContents_2->currentPage()])->links("pagination::bootstrap-5") }}
            </div>
            <br><br>

            {{-- Catgoria podcast --}}
            <h2 class="text-2xl text-gray-700 font-ral font-semibold mb-6 contenedor-fondo" id="titulo-podcats">Podcast</h2>
            @php
            $contador = 0
            @endphp
            @foreach ($seconContents_2 as $second)
                @if ($second->category_id == 2)
                    @php

                        $nuevo_titulo = $second->title;
                        $nueva_descripcion = $second->description;

                        if($tipo == '3')
                        {
                            $nuevo_titulo = str_replace($palabra, '<span class="filtro-subrayar">'.$palabra.'</span>', $second->title);
                            $nueva_descripcion = str_replace($palabra, '<span class="filtro-subrayar">'.$palabra.'</span>', $second->description);
                        }

                        $contador++;
                    @endphp
                    <article class="mb-8 bg-white shadow-xl rounded-md">
                        <div class="grid grid-cols-6 lg:grid-cols-7 lg:gap-5">

                            <div class="col-start-2 col-span-4 lg:col-span-3" data-aos="fade-up"
                            data-aos-anchor-placement="bottom-bottom">
                                <div class="px-6 py-4">
                                    @foreach ($second->image as $img)
                                        <img src="{{ Storage::url($img->url) }}" alt=""
                                            class="w-full lg:h-full md:h-60 h-52 object-cover object-center rounded-md">
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-start-1 col-end-7 lg:col-span-4" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                                <div class="px-6 py-4">
                                    <h2 class="mb-2">
                                        <a href="{{ route('secondcontent.show', $second) }}"
                                            class=" text-sm lg:text-xl text-left font-bold text-black"
                                            target="_blank"><?php echo $nuevo_titulo; ?></a>
                                    </h2>
                                    <p class="font-bold text-sm lg:text-base mb-3" style="color: green">{{ $second->date }}
                                    </p>

                                    <div>
                                        <p class="text-gray-700 mb-6"><?php echo $nueva_descripcion; ?></p>
                                    </div>

                                    <span class="text-sm text-blue-500 font-semibold px-0 py-1 pb-4 flex justify-end">
                                        {{ $second->font }}
                                    </span>

                                    <a href="{{ $second->url }}" target="_blank"
                                        class="text-sm text-gray-900 font-semibold bg-lime-400 rounded-md px-3 py-1 pb-0 float-right">Leer
                                        más
                                    </a>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </article>
                @endif
            @endforeach

            <div class="mt-4 paginacion">
                {{ $seconContents_2->appends(['videos' => $seconContents->currentPage(), 'articles' => $seconds->currentPage()])->links("pagination::bootstrap-5") }}
            </div>
            
            @if($contador == 0)
            <script type="text/javascript">
                document.getElementById('titulo-podcats').style.display = "none";
            </script>
            @endif
        @endif
    </div>
</x-app-layout>

<style>
    main
    {
        background: url('{{ Storage::url('home/background3.png') }}');
        background-size: contain;
    }
</style>

<script>
    $(function ()
    {
        $("#form-filtro-palabra").keypress(function (e)
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
              
            return (key != 13);
        });
    });

    //filtro_cambiar_tipo('{{ $tipo }}')

<?php
    if($tipo == '')
    {
?>
    generarClick('boton-modal-inicial');
<?php
    }
?>
</script>