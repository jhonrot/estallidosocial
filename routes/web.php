<?php

use App\Http\Controllers\Alcaldia;
use App\Http\Controllers\Arte;
use App\Http\Controllers\Atencion;
use App\Http\Controllers\Dialogo;
use App\Http\Controllers\GeneralesPanoramica;
use App\Http\Controllers\Inclusion;
use App\Http\Controllers\secondContent;
use App\Http\Controllers\Ajax;
use Illuminate\Support\Facades\Route;

Route::get('/', [secondContent::class, 'home'])->name('secondcontent.home');

Route::get('antecedentes_contexto', [secondContent::class, 'index'])->name('secondcontent.index');

Route::get('Secondary_Content/{secondary}', [secondContent::class, 'show'])->name('secondcontent.show');

//////// generales panoramica ////////////////////

Route::get('generales_panorámica', [GeneralesPanoramica::class, 'index'])->name('generales_panorámica.index');


// Route::get('LT', [secondContent::class, 'LT'])->name('secondcontent.LT');
// Route::get('alcaldia', [secondContent::class, 'alcaldia'])->name('secondcontent.alcaldia');
Route::get('analisis', [secondContent::class, 'analisis'])->name('secondcontent.analisis');
Route::get('derechos_humanos', [secondContent::class, 'derechos_humanos'])->name('secondcontent.derechos_humanos');
Route::get('territorio', [secondContent::class, 'territorio'])->name('secondcontent.territorio');
Route::get('humanos_resistencia', [secondContent::class, 'humanos_resistencia'])->name('secondcontent.humanos_resistencia');


Route::get('dialogo', [Dialogo::class, 'index'])->name('dialogo.index');

Route::get('atencion', [Atencion::class, 'index'])->name('atencion.index');

Route::get('inclusion', [Inclusion::class, 'index'])->name('inclusion.index');

Route::get('arte', [Arte::class, 'index'])->name('arte.index');

Route::get('category/{category}', [secondContent::class, 'category'])->name('secondcontent.category');

Route::get('categoryuno/{categoryuno}', [secondContent::class, 'categoryuno'])->name('secondcontent.categoryuno');

Route::get('contacto', [Ajax::class, 'contacto']);



// Route::middleware([])->group(function () {
//     Route::get('/', Showcontent::class)->name('livewire.showcontent');
// });



