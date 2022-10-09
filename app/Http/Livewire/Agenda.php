<?php

namespace App\Http\Livewire;

use App\Models\Agenda as ModelsAgenda;
use App\Models\Category;
use App\Models\PlayerSerie;

class Agenda extends Component
{
    public $search = '';
    public $agendas;
    public $series;
    public $categories;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->reset();
    }
    public function render()
    {
        $this->categories = Category::all();
        $this->series = PlayerSerie::all();
        $this->agendas = ModelsAgenda::all();
        return view('livewire.agenda');
    }
}
