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

    #contacto-file + label
    {

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
