<?php
use App\Livewire\MarcaIndex;
use App\Livewire\ModeloIndex;
use App\Livewire\ColorIndex;
use App\Livewire\VehiculoIndex;

Route::get('/marcas', MarcaIndex::class);
Route::get('/modelos', ModeloIndex::class);
Route::get('/colores', ColorIndex::class);
Route::get('/vehiculos', VehiculoIndex::class);
