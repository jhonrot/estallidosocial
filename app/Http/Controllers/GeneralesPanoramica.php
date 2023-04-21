<?php

namespace App\Http\Controllers;

use App\Models\MainContent;
use App\Models\Secondary_Content;
use Illuminate\Http\Request;

class GeneralesPanoramica extends Controller
{
    public function index(Request $request)
    {
        $tipo = trim($request->get('filtro-tipo'));
        $fecha_creacion = trim($request->get('filtro-fecha-creacion'));
        $fecha_inicio = trim($request->get('filtro-fecha-inicio'));
        $fecha_fin = trim($request->get('filtro-fecha-fin'));
        $palabra = trim($request->get('filtro-palabra'));
        $paginacion = intval(trim($request->get('filtro-paginacion')));

        $pivot_fecha_inicial = strtotime($fecha_inicio);
        $pivot_fecha_final = strtotime($fecha_fin);

        if($pivot_fecha_inicial > $pivot_fecha_final)
        {
            $fecha_inicio = trim($request->get('filtro-fecha-fin'));
            $fecha_fin = trim($request->get('filtro-fecha-inicio'));
        }

        if($paginacion < 1)
        {
            $paginacion = 5;
        }

        $maincontents = MainContent::all();
        $seconContents = Secondary_Content::where('maincontent_id', '=', 31)
                                            ->where('category_id', '=', 1)
                                            ->oldest('date')
                                            ->paginate(6, ['*'], 'videos');

        $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 31)
                                            ->where('category_id', '=', 2)
                                            ->oldest('date')
                                            ->paginate($paginacion, ['*'], 'podcats');

        $seconds = Secondary_Content::where('maincontent_id', '=', 31)
                                      ->where('category_id', '!=', 1)
                                      ->where('category_id', '!=', 2)
                                      ->where('id', '!=', 4)
                                      ->where('id', '!=', 19)
                                      ->oldest('date')
                                      ->paginate($paginacion, ['*'], 'articles');

        if($tipo == '3')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 31)
                                                ->where('category_id', '=', 1)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->oldest('date')
                                                ->paginate(6, ['*'], 'videos');

            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 31)
                                                ->where('category_id', '=', 2)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->oldest('date')
                                                ->paginate($paginacion, ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 31)
                                        ->where('category_id', '!=', 1)
                                        ->where('category_id', '!=', 2)
                                        ->where('id', '!=', 4)
                                        ->where('id', '!=', 19)
                                        ->where(function($query) use ($palabra)
                                        {
                                            $query->where('title', 'LIKE', '%'.$palabra.'%')
                                            ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                        })
                                        ->oldest('date')
                                        ->paginate($paginacion, ['*'], 'articles');
        }

        if($tipo == '4')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 31)
                                                ->where('category_id', '=', 1)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->oldest('date')
                                                ->paginate(6, ['*'], 'videos');
            
            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 31)
                                                ->where('category_id', '=', 2)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->oldest('date')
                                                ->paginate($paginacion ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 31)
                                    ->where('category_id', '!=', 1)
                                    ->where('category_id', '!=', 2)
                                    ->where('id', '!=', 4)
                                    ->where('id', '!=', 19)
                                    ->whereDate('date', '>=', $fecha_inicio)
                                    ->whereDate('date', '<=', $fecha_fin)
                                    ->oldest('date')
                                    ->paginate($paginacion, ['*'], 'articles');
        }
        
        return view('generales_panorámica.index', compact('maincontents', 'seconContents', 'seconContents_2', 'seconds', 'tipo', 'fecha_creacion', 'fecha_inicio', 'fecha_fin', 'palabra', 'paginacion'));
    }
}
