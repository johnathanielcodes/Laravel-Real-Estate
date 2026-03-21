<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProperty extends Component
{
    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('required|numeric|min:10')]
    public $price = '';

    #[Validate('required|in:apartment,land')]
    public $type = '';

    #[Validate('required|numeric|min:0')]
    public $bedrooms = '';

    #[Validate('required|numeric|min:0')]
    public $bathrooms = '';

    #[Validate('required|min:2')]
    public $city = '';

    #[Validate('required|min:5')]
    public $address = '';

    #[Validate('required|in:available,sold,leased')]
    public $status = '';

    #[Validate('required|min:10')]
    public $description = '';

    public function setPropertyType($type)
    {
        $this->type = $type;
    }

    public function saveProperty()
    {
        $this->validate();

        // Debug to see if it's working
        dd('saving', $this->all());
    }
    public function render()
    {
        return view('livewire.create-property');
    }
}
