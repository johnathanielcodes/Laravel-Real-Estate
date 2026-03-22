<?php

use App\Models\Property;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

new class extends Component {
    public $property;

    use WithSweetAlert, WithFileUploads;
    #[Validate('required|min:3')]
    public $title = '';

    #[Validate(['property_images.*' => 'file|max:10240|nullable'])]
    public $property_images = [];

    #[Validate('image|max:10240|nullable')]
    public $featured_image;

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
    public function mount(Property $property)
    {
        $this->property = $property;
        $this->user = Auth::user();
        $this->title = $this->property->title;
        $this->price = $this->property->price;
        $this->listing_type = $this->property->listing_type;
        $this->type = $this->property->listing_type;
        $this->bedrooms = $this->property->bedrooms;
        $this->bathrooms = $this->property->bathrooms;
        $this->area = $this->property->area;
        $this->city = $this->property->city;
        $this->address = $this->property->address;
        $this->status = $this->property->status;
        $this->description = $this->property->description;
    }
    public function setPropertyType($type)
    {
        $this->type = $type;
    }
    public function removeImage($index)
    {
        unset($this->property_images[$index]);
        $this->property_images = array_values($this->property_images); // Re-index the array
    }
    public function saveProperty()
    {
        $data = $this->validate();
        if ($this->featured_image) {
            $prevFeaturedImagePath = $this->property->isFeaturedImage();
            if ($prevFeaturedImagePath) {
                Storage::disk('public')->delete($prevFeaturedImagePath->path);
                $prevFeaturedImagePath->delete();

                $featured_image_name = $this->featured_image->getClientOriginalName();
                $featured_image_path = $this->featured_image->storePubliclyAs('properties', $featured_image_name, 'public');

                $this->property->images()->create([
                    'name' => $featured_image_name,
                    'path' => $featured_image_path,
                    'is_featured' => true,
                ]);
            } else {
                $featured_image_name = $this->featured_image->getClientOriginalName();
                $featured_image_path = $this->featured_image->storePubliclyAs('properties', $featured_image_name, 'public');

                $this->property->images()->create([
                    'name' => $featured_image_name,
                    'path' => $featured_image_path,
                    'is_featured' => true,
                ]);
            }
        }
        if (count($this->property_images) > 0) {
            foreach ($this->property_images as $image) {
                $image_name = $image->getClientOriginalName();
                $image_path = $image->storePubliclyAs('properties', $image_name, 'public');
                $this->property->images()->create([
                    'name' => $image_name,
                    'path' => $image_path,
                    'is_featured' => false,
                ]);
            }
        }

        // // Debug to see if it's working
        $update = [
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
        $this->property->update($update);
        $this->swalToastSuccess([
            'position' => 'top-end',
            'title' => 'Success',
            'text' => $this->property->title . ' updated successfully!',
            'showConfirmButton' => false,
            'timer' => 2000,
            'timerProgressBar' => true,
        ]);
        $this->reset();
    }
};
?>

<div>
    <form wire:submit.prevent='saveProperty' method="POST"
        class='bg-white text-gray-500 max-w-[
  340px
  ] mx-4 p-6 text-left text-sm rounded-lg border border-gray-300/60'>

        <label class='font-medium' for='title'>Property Title</label>
        <input id='title' wire:model.live='title'
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='text'
            placeholder='Enter title'>
        @error('title')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror

        <label class='font-medium' for='price'>Price</label>
        <input id='price' class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3'
            type='number' wire:model.live='price' placeholder='Enter price'>
        @error('price')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <label class='font-medium block mb-3' for='type'>Type</label>
        <div class="block mb-2">
            <button wire:click="setPropertyType('apartment')"
                class='font-medium px-2 py-2 @if ($type === 'apartment') bg-green-500 @else bg-blue-500 @endif text-white rounded-lg'
                type='button'>Apartment</button>
            <button wire:click="setPropertyType('land')"
                class='font-medium px-2 py-2  @if ($type === 'land') bg-green-500 @else bg-blue-500 @endif  text-white rounded-lg'
                type='button'>Land</button>
        </div>
        <label class='font-medium' for='featured_image'>Featured Image</label>
        <input id='featured_image' class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3'
            type='file' accept="image/*" wire:model.live='featured_image' placeholder='Enter featured_image'>
        @error('featured_image')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror

        @if ($featured_image)
            <img src="{{ $featured_image->temporaryUrl() }}" alt="" class="w-48 h-48 rounded-2xl">
        @endif
        <label class='font-medium' for='property_images'>Property Images</label>
        <input id='property_images'
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='file'
            accept="image/*" wire:model='property_images' placeholder='Enter property_images' multiple>

        @error('property_images')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror

        @if ($property_images)
            <div class="flex flex-wrap gap-4 mt-4">
                @foreach ($property_images as $index => $property_image)
                    @if ($property_image)
                        <div class="relative">
                            <img src="{{ $property_image->temporaryUrl() }}" alt="Property image {{ $index }}"
                                class="w-48 h-48 rounded-2xl object-cover">
                            <button type="button" wire:click="removeImage({{ $index }})"
                                class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center">
                                ×
                            </button>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
        @error('type')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <label class='font-medium' for='bedrooms'>Bedrooms</label>
        <input id='bedrooms' wire:model.live='bedrooms'
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='number'
            placeholder='Enter bedrooms'>
        @error('bedrooms')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <label class='font-medium' for='bathrooms'>Bathrooms</label>
        <input id='bathrooms' wire:model.live='bathrooms'
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='number'
            placeholder='Enter bathrooms'>
        @error('bathrooms')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <label class='font-medium' for='city'>City</label>
        <input id='city' wire:model.live='city'
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='text'
            placeholder='Enter city'>
        @error('city')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <label class='font-medium' for='address'>Address</label>
        <input id='address' wire:model.live='address'
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='text'
            placeholder='Enter address'>
        @error('address')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <label class='font-medium' for='area'>Area</label>
        <input id='area' wire:model.live='area'
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='number'
            placeholder='Enter area'>
        @error('area')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <label class='font-medium' for='status'>Status</label>
        <select id='status' wire:model.live='status'
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='text'
            placeholder='Enter status'>
            <option value="">-- Choose ---</option>
            <option value="available">Available</option>
            <option value="sold">Sold Out</option>
            <option value="leased">Leased</option>
        </select>
        @error('status')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <label class='font-medium' for='description'>Description</label>
        <textarea rows='3' id='description' wire:model.live='description'
            class='w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3' type='title'
            placeholder='Enter description'></textarea>
        @error('description')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <div class='flex items-center justify-between'>
            <button type='submit' class='my-3 bg-indigo-500 py-2 px-5 rounded text-white font-medium'>Update</button>
        </div>
    </form>
</div>
