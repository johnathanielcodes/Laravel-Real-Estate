<?php

namespace App\Livewire;

use Livewire\Component;

class Divider extends Component
{
    public $title;
    public $id = '';
    public function render()
    {
        return view('livewire.divider');
    }
}
