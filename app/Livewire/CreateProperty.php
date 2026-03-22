<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class CreateProperty extends Component
{
    use WithSweetAlert, WithFileUploads;
    #[Validate('required|min:3')]
    public $title;
    #[Validate(['property_images.*' => 'file|max:102400|nullable'])]
    public $property_images = [];

    #[Validate('image|max:10240|nullable')]
    public $featured_image;
    #[Validate('required|numeric|min:10')]
    public $price;

    #[Validate('required|in:apartment,land')]
    public $type;

    #[Validate('required|numeric|min:0')]
    public $bedrooms;

    #[Validate('required|numeric|min:0')]
    public $bathrooms;

    #[Validate('required|min:2')]
    public $area;
    #[Validate('required|min:2')]
    public $city;

    #[Validate('required|min:5')]
    public $address;

    #[Validate('required|in:available,sold,leased')]
    public $status;


    #[Validate('required|min:10')]
    public $description;
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
        $dataValid = [
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'price' => $data['price'],
            'listing_type' => $data['type'],
            'bedrooms' => $data['bedrooms'],
            'bathrooms' => $data['bathrooms'],
            'city' => $data['city'],
            'address' => $data['address'],
            'area' => $data['area'],
            'status' => $data['status'],
            'description' => $data['description'],
        ];
        $property =  $this->user->properties()->create($dataValid);
        if ($this->featured_image) {
            $featured_image_name = $this->featured_image->getClientOriginalName();
            $featured_image_path = $this->featured_image->storePubliclyAs('properties', $featured_image_name, 'public');

            $property->images()->create([
                'name' => $featured_image_name,
                'path' => $featured_image_path,
                'is_featured' => true,
            ]);
        }
        if (count($this->property_images) > 0) {
            foreach ($this->property_images as $image) {
                $image_name = $image->getClientOriginalName();
                $image_path = $image->storePubliclyAs('properties', $image_name, 'public');
                $property->images()->create([
                    'name' => $image_name,
                    'path' => $image_path,
                    'is_featured' => false,
                ]);
            }
        }
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
