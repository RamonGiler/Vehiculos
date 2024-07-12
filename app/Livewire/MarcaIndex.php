<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\marca;

class MarcaIndex extends Component
{
    public $marca;
    public $estado;
    public $marcas;
    public $marca_id;

    public function render()
    {
        $this->marcas = marca::all();
        return view('livewire.marca-index')->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'marca' => 'required',
            'estado' => 'required',
        ]);
        marca::create(['marca' => $this->marca, 'estado' => $this->estado]);
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->marca = '';
        $this->estado = '';
    }

    public function edit($id)
    {
        $marca = marca::findOrFail($id);
        $this->marca_id = $id;
        $this->marca = $marca->marca;
        $this->estado = $marca->estado;
    }

    public function update($id)
    {
        $this->validate([
            'marca' => 'required',
            'estado' => 'required',
        ]);
        $marca = marca::find($this->marca_id);
        $marca->update(['marca' => $this->marca, 'estado' => $this->estado]);
        $this->resetInputFields();
    }
  
    public function delete($id)
    {
        Marca::find($id)->delete();
    }
}

