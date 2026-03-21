<?php

namespace App\Livewire;

use Livewire\Component;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class Counter extends Component
{
    use WithSweetAlert;
    public $count = 1;
    public function render()
    {
        return view('livewire.counter');
    }
    public function increment()
    {
        $this->count += 1;
    }
    public function decrement()
    {
        if ($this->count > 1) {
            $this->count -= 1;
        } else {
            $this->swalWarning ([
    'title' => 'Popup with a question icon',
]);
        }
    }
}
