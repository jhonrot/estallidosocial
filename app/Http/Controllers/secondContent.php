<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainContent;
use App\Models\Secondary_Content;
use Illuminate\Http\Request;
use Livewire\Commands\CpCommand;

class secondContent extends Controller
{
    public function home()
    {
        $second_contents = Secondary_Content::where('category_id', '=', 30)->get();
        $seconds = Secondary_Content::where('maincontent_id', '=', 1)
                                        ->latest('id')
                                        ->get();

        return view('secondcontent.home', compact('second_contents', 'seconds'));
    }

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
        $seconContents = Secondary_Content::where('maincontent_id', '=', 1)
                                            ->where('category_id', '=', 1)
                                            ->latest('id')
                                            ->paginate(6, ['*'], 'videos');

        $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 1)
                                            ->where('category_id', '=', 2)
                                            ->latest('id')
                                            ->paginate($paginacion, ['*'], 'podcats');

        $seconds = Secondary_Content::where('maincontent_id', '=', 1)
                                        ->where('category_id', '!=', 1)
                                        ->where('category_id', '!=', 2)
                                        ->where('id', '!=', 30)
                                        ->where('id', '!=', 47)
                                        ->where('id', '!=', 62)
                                        ->where('id', '!=', 68)
                                        ->where('id', '!=', 77)
                                        ->where('id', '!=', 81)
                                        ->latest('id')
                                        ->paginate($paginacion, ['*'], 'articles');
                
        if($tipo == '3')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 1)
                                                ->where('category_id', '=', 1)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->latest('id')
                                                ->paginate(6, ['*'], 'videos');

            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 1)
                                                ->where('category_id', '=', 2)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->latest('id')
                                                ->paginate($paginacion, ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 1)
                                    ->where('category_id', '!=', 1)
                                    ->where('category_id', '!=', 2)
                                    ->where('id', '!=', 30)
                                    ->where('id', '!=', 47)
                                    ->where('id', '!=', 62)
                                    ->where('id', '!=', 68)
                                    ->where('id', '!=', 77)
                                    ->where('id', '!=', 81)
                                    ->where(function($query) use ($palabra)
                                    {
                                        $query->where('title', 'LIKE', '%'.$palabra.'%')
                                        ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                    })
                                    ->latest('id')
                                    ->paginate($paginacion, ['*'], 'articles');
        }

        if($tipo == '4')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 1)
                                                ->where('category_id', '=', 1)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->latest('id')
                                                ->paginate(6, ['*'], 'videos');
            
            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 1)
                                                ->where('category_id', '=', 2)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->latest('id')
                                                ->paginate($paginacion ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 1)
                                    ->where('category_id', '!=', 1)
                                    ->where('category_id', '!=', 2)
                                    ->where('id', '!=', 30)
                                    ->where('id', '!=', 47)
                                    ->where('id', '!=', 62)
                                    ->where('id', '!=', 68)
                                    ->where('id', '!=', 77)
                                    ->where('id', '!=', 81)
                                    ->whereDate('date', '>=', $fecha_inicio)
                                    ->whereDate('date', '<=', $fecha_fin)
                                    ->latest('id')
                                    ->paginate($paginacion, ['*'], 'articles');
        }
               
        return view('secondcontent.index', compact('maincontents', 'seconContents', 'seconContents_2', 'seconds', 'tipo', 'fecha_creacion', 'fecha_inicio', 'fecha_fin', 'palabra', 'paginacion'));
    }

    
    public function show(Secondary_Content $secondary)
    {
        $similares = Secondary_Content::where('category_id', $secondary->category_id)
                                         ->where('id', '!=', $secondary->id)
                                         ->latest('id')
                                         ->take(5)
                                         ->get();

        return view('secondcontent.show', compact('secondary', 'similares'));
    }

    public function category(Category $category){
        $seconContents = Secondary_Content::where('category_id', $category->id)
                                             ->latest('id')
                                             ->paginate(4);
                                             
        return view('secondcontent.category', compact('seconContents', 'category'));
    }

    public function categoryuno(Category $categoryuno){
        $seconContents = Secondary_Content::where('category_id', $categoryuno->id)->get();
                                             
        return view('secondcontent.categoryuno', compact('seconContents', 'categoryuno'));
    }

    // public function LT(){
    //     $seconds = Secondary_Content::where('maincontent_id', '=', 2)
    //                                   ->where('category_id', '=', 10)
    //                                   ->get();
    //     return view('secondcontent.LT', compact('seconds'));
    // }

    // public function alcaldia(){
    //     $seconds = Secondary_Content::where('maincontent_id', '=', 2)
    //                                   ->where('category_id', '=', 11)
    //                                   ->get();
    //     return view('secondcontent.alcaldia', compact('seconds'));
    // }

    public function analisis(Request $request)
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
        $seconContents = Secondary_Content::where('maincontent_id', '=', 28)
                                            ->where('category_id', '=', 1)
                                            ->latest('id')
                                            ->paginate(6, ['*'], 'videos');

        $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 28)
                                            ->where('category_id', '=', 2)
                                            ->latest('id')
                                            ->paginate($paginacion, ['*'], 'podcats');

        $seconds = Secondary_Content::where('maincontent_id', '=', 28)
                                    ->where('id', '!=', 40)
                                    ->latest('id')
                                    ->paginate($paginacion, ['*'], 'articles');
        
        if($tipo == '3')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 28)
                                                ->where('category_id', '=', 1)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->latest('id')
                                                ->paginate(6, ['*'], 'videos');

            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 28)
                                                ->where('category_id', '=', 2)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->latest('id')
                                                ->paginate($paginacion, ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 28)
                                        ->where('id', '!=', 40)
                                        ->where(function($query) use ($palabra)
                                        {
                                            $query->where('title', 'LIKE', '%'.$palabra.'%')
                                            ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                        })
                                        ->latest('id')
                                        ->paginate($paginacion, ['*'], 'articles');
        }

        if($tipo == '4')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 28)
                                                ->where('category_id', '=', 1)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->latest('id')
                                                ->paginate(6, ['*'], 'videos');
            
            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 28)
                                                ->where('category_id', '=', 2)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->latest('id')
                                                ->paginate($paginacion ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 28)
                                    ->where('id', '!=', 40)
                                    ->whereDate('date', '>=', $fecha_inicio)
                                    ->whereDate('date', '<=', $fecha_fin)
                                    ->latest('id')
                                    ->paginate($paginacion, ['*'], 'articles');
        }

        return view('secondcontent.analisis', compact('maincontents', 'seconContents', 'seconContents_2', 'seconds', 'tipo', 'fecha_creacion', 'fecha_inicio', 'fecha_fin', 'palabra', 'paginacion'));
    }

    public function derechos_humanos(Request $request)
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
        $seconContents = Secondary_Content::where('maincontent_id', '=', 29)
                                            ->where('category_id', '=', 1)
                                            ->latest('id')
                                            ->paginate(6, ['*'], 'videos');

        $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 29)
                                            ->where('category_id', '=', 2)
                                            ->latest('id')
                                            ->paginate($paginacion, ['*'], 'podcats');

        $seconds = Secondary_Content::where('maincontent_id', '=', 29)
                                    ->where('id', '!=', 2)
                                    ->latest('id')
                                    ->paginate($paginacion, ['*'], 'articles');
        
        if($tipo == '3')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 29)
                                                ->where('category_id', '=', 1)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->latest('id')
                                                ->paginate(6, ['*'], 'videos');

            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 29)
                                                ->where('category_id', '=', 2)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->latest('id')
                                                ->paginate($paginacion, ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 29)
                                        ->where('id', '!=', 2)
                                        ->where(function($query) use ($palabra)
                                        {
                                            $query->where('title', 'LIKE', '%'.$palabra.'%')
                                            ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                        })
                                        ->latest('id')
                                        ->paginate($paginacion, ['*'], 'articles');
        }

        if($tipo == '4')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 29)
                                                ->where('category_id', '=', 1)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->latest('id')
                                                ->paginate(6, ['*'], 'videos');
            
            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 29)
                                                ->where('category_id', '=', 2)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->latest('id')
                                                ->paginate($paginacion ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 29)
                                    ->where('id', '!=', 2)
                                    ->whereDate('date', '>=', $fecha_inicio)
                                    ->whereDate('date', '<=', $fecha_fin)
                                    ->latest('id')
                                    ->paginate($paginacion, ['*'], 'articles');
        }

        return view('secondcontent.derechos_humanos', compact('maincontents', 'seconContents', 'seconContents_2', 'seconds', 'tipo', 'fecha_creacion', 'fecha_inicio', 'fecha_fin', 'palabra', 'paginacion'));
    }

    public function territorio(Request $request)
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
        $seconContents = Secondary_Content::where('maincontent_id', '=', 30)
                                            ->where('category_id', '=', 1)
                                            ->latest('id')
                                            ->paginate(6, ['*'], 'videos');

        $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 30)
                                            ->where('category_id', '=', 2)
                                            ->latest('id')
                                            ->paginate($paginacion, ['*'], 'podcats');

        $seconds = Secondary_Content::where('maincontent_id', '=', 30)
                                    ->latest('id')
                                    ->paginate($paginacion, ['*'], 'articles');
        
        if($tipo == '3')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 30)
                                                ->where('category_id', '=', 1)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->latest('id')
                                                ->paginate(6, ['*'], 'videos');

            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 30)
                                                ->where('category_id', '=', 2)
                                                ->where(function($query) use ($palabra)
                                                {
                                                    $query->where('title', 'LIKE', '%'.$palabra.'%')
                                                    ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                                })
                                                ->latest('id')
                                                ->paginate($paginacion, ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 30)
                                        ->where(function($query) use ($palabra)
                                        {
                                            $query->where('title', 'LIKE', '%'.$palabra.'%')
                                            ->orWhere('description', 'LIKE', '%'.$palabra.'%');
                                        })
                                        ->latest('id')
                                        ->paginate($paginacion, ['*'], 'articles');
        }

        if($tipo == '4')
        {
            $seconContents = Secondary_Content::where('maincontent_id', '=', 30)
                                                ->where('category_id', '=', 1)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->latest('id')
                                                ->paginate(6, ['*'], 'videos');
            
            $seconContents_2 = Secondary_Content::where('maincontent_id', '=', 30)
                                                ->where('category_id', '=', 2)
                                                ->whereDate('date', '>=', $fecha_inicio)
                                                ->whereDate('date', '<=', $fecha_fin)
                                                ->latest('id')
                                                ->paginate($paginacion ['*'], 'podcats');

            $seconds = Secondary_Content::where('maincontent_id', '=', 30)
                                    ->whereDate('date', '>=', $fecha_inicio)
                                    ->whereDate('date', '<=', $fecha_fin)
                                    ->latest('id')
                                    ->paginate($paginacion, ['*'], 'articles');
        }

        return view('secondcontent.territorio', compact('maincontents', 'seconContents', 'seconContents_2', 'seconds', 'tipo', 'fecha_creacion', 'fecha_inicio', 'fecha_fin', 'palabra', 'paginacion'));
    }

    public function humanos_resistencia(){
       
        $maincontents = MainContent::all();
        $seconds = Secondary_Content::all();
        return view('secondcontent.humanos_resistencia', compact('maincontents', 'seconds'));
    }
}

