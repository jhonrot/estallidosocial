<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ajax extends Controller
{
    public function contacto(Request $request)
    {
        //$to = 'andresmrzgamer@gmail.com';
        $to = 'jhonrot@gmail.com';

        $nombres = trim($request->get('nombres'));
        $apellidos = trim($request->get('apellidos'));
        $correo = trim($request->get('correo'));
        $telefono = trim($request->get('telefono'));
        $mensaje = trim($request->get('mensaje'));
        $nombre_completo = "$nombres $apellidos";

        $file = '';

        $subject = "Portal Estallido Social";
        $headers = "From: administracion@estallidosocial.calivirtual.net\r\nMIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $message = '<html lang="es" id="html">
        <head>
            <title>Estallido Social</title>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, user-scalable=1.0, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
            <meta name="description" content="">

            <style>
                .contenedor
                {
                    padding: 100px 0;
                    background-color: #f1f1f1;
                    font-family: -webkit-pictograph;
                }

                .logo
                {
                    margin-top: 50px;
                }

                .logo img
                {
                    position: relative;
                    width: 340px;
                }

                .titulo
                {
                    position: relative;
                    margin: 70px 0 50px 0;
                    text-align: center;
                    font-size: 40px;
                }

                .mensaje
                {
                    position: relative;
                    width: 80%;
                    max-width: 800px;
                    background: white;
                    padding: 10px 20px;
                    font-size: 20px;
                    margin-top: 50px;
                    border-radius: 0.5rem;
                }

                .mensaje a
                {
                    text-decoration: none;
                    color: #246bed;
                }

                .linea
                {
                    text-align: justify;
                    font-family: "calibri";
                }
            </style>

        </head>
        <body>
        <div class="contenedor">
            <div class="contenedor-principal">
                <div class="logo">
                    <center>
                        <img src="https://calivirtual.net/extras/estallidosocial/logo.png" alt="">
                    </center>
                </div>

                <center>
                    <div class="mensaje">
                        <p class="linea"><b>Nombre Completo: </b>'.$nombre_completo.'</p>
                        <p class="linea"><b>Correo: </b>'.$correo.'</p> 
                        <p class="linea"><b>Teléfono de contacto: </b>'.$telefono.'</p>
                        <p class="linea"><b>Mensaje: </b>'.$mensaje.'</p>         
                    </div>
                </center>
            </div>
        </div>
        </body>';

        if(mail($to, $subject, $message, $headers))
        {
            echo '0';
        }
        else
        {
            echo '1';
        }
    }
}