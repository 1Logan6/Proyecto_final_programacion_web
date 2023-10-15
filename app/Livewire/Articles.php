<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;


class Articles extends Component
{

    use WithPagination;

    public function render()
    {
        $productos = Producto::all();

        return view('livewire.articles',[
            'productos' => $productos,
        ]);
    }
}
