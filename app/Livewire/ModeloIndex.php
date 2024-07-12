<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\modelo;

class ModeloIndex extends Component
{
    public $modelo;
    public $estado;
    public $modelos;
    public $modelo_id;

    public function render()
    {
        $this->modelos = Modelo::all();
        return view('livewire.modelo-index')->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'modelo' => 'required',
            'estado' => 'required',
        ]);
        Modelo::create(['modelo' => $this->modelo, 'estado' => $this->estado]);
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->modelo = '';
        $this->estado = '';
    }

    public function edit($id)
    {
        $modelo = Modelo::findOrFail($id);
        $this->modelo_id = $id;
        $this->modelo = $modelo->modelo;
        $this->estado = $modelo->estado;
    }

    public function update()
    {
        $this->validate([
            'modelo' => 'required',
            'estado' => 'required',
        ]);
        $modelo = Modelo::find($this->modelo_id);
        $modelo->update(['modelo' => $this->modelo, 'estado' => $this->estado]);
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Modelo::find($id)->delete();
    }
}
