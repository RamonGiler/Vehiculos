<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\color;

class ColorIndex extends Component
{
    public $color;
    public $estado;
    public $colores;
    public $color_id;

    public function render()
    {
        $this->colores = Color::all();
        return view('livewire.color-index')->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'color' => 'required',
            'estado' => 'required',
        ]);
        Color::create(['color' => $this->color, 'estado' => $this->estado]);
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->color = '';
        $this->estado = '';
    }

    public function edit($id)
    {
        $color = Color::findOrFail($id);
        $this->color_id = $id;
        $this->color = $color->color;
        $this->estado = $color->estado;
    }

    public function update()
    {
        $this->validate([
            'color' => 'required',
            'estado' => 'required',
        ]);
        $color = Color::find($this->color_id);
        $color->update(['color' => $this->color, 'estado' => $this->estado]);
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Color::find($id)->delete();
    }
}
