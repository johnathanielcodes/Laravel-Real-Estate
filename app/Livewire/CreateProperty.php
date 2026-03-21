<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class CreateProperty extends Component
{
    use WithSweetAlert;
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
    public $area = '';
    #[Validate('required|min:2')]
    public $city = '';

    #[Validate('required|min:5')]
    public $address = '';

    #[Validate('required|in:available,sold,leased')]
    public $status = '';

    #[Validate('required|min:10')]
    public $description = '';
    public $user;
    public function mount()
    {
        $this->user = Auth::user();
    }
    public function setPropertyType($type)
    {
        $this->type = $type;
    }

    public function saveProperty()
    {
        $data =  $this->validate();
        // Debug to see if it's working
        $property =  $this->user->properties()->create([
            "title" => $data['title'],
            "price" => $data['price'],
            "listing_type" => $data['type'],
            "bedrooms" => $data['bedrooms'],
            "bathrooms" => $data['bathrooms'],
            "city" => $data['city'],
            "address" => $data['address'],
            "area" => $data['area'],
            "status" => $data['status'],
            "description" => $data['description']
        ]);
        $this->swalToastSuccess([
            'position' => "top-end",
            'title' => "Success",
            'text' => $property->title . " added successfully!",
            'showConfirmButton' => false,
            'timer' => 2000,
            'timerProgressBar' => true
        ]);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.create-property');
    }
}
