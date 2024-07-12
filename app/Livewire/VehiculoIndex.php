<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Color;
class VehiculoIndex extends Component
{
    public $descripcion;
    public $estado;
    public $marca_id;
    public $modelo_id;
    public $color_id;
    public $vehiculos;
    public $vehiculo_id;

    public $marcas;
    public $modelos;
    public $colors;

    public function mount()
    {
        $this->marcas = Marca::all();
        $this->modelos = Modelo::all();
        $this->colors = Color::all();
    }

    public function render()
    {
        $this->vehiculos = Vehiculo::with(['marca', 'modelo', 'color'])->get();
        return view('livewire.vehiculo-index')->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required',
            'estado' => 'required',
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'color_id' => 'required|exists:colors,id',
        ]);

        Vehiculo::create([
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'marca_id' => $this->marca_id,
            'modelo_id' => $this->modelo_id,
            'color_id' => $this->color_id,
        ]);

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->descripcion = '';
        $this->estado = '';
        $this->marca_id = '';
        $this->modelo_id = '';
        $this->color_id = '';
    }

    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $this->vehiculo_id = $id;
        $this->descripcion = $vehiculo->descripcion;
        $this->estado = $vehiculo->estado;
        $this->marca_id = $vehiculo->marca_id;
        $this->modelo_id = $vehiculo->modelo_id;
        $this->color_id = $vehiculo->color_id;
    }

    public function update()
    {
        $this->validate([
            'descripcion' => 'required',
            'estado' => 'required',
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'color_id' => 'required|exists:colors,id',
        ]);

        $vehiculo = Vehiculo::find($this->vehiculo_id);
        $vehiculo->update([
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'marca_id' => $this->marca_id,
            'modelo_id' => $this->modelo_id,
            'color_id' => $this->color_id,
        ]);

        $this->resetInputFields();
    }

    public function delete($id)
    {
        Vehiculo::find($id)->delete();
    }
}
