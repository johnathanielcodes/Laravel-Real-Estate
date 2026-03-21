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
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='number'
            placeholder='Enter city'>
        @error('city')
            <span class="text-red-500 text-xs block">{{ $message }}</span>
        @enderror
        <label class='font-medium' for='address'>Address</label>
        <input id='address' wire:model.live='address'
            class='w-full border mt-1.5 mb-4 border-gray-500/30 outline-none rounded py-2.5 px-3' type='number'
            placeholder='Enter address'>
        @error('address')
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
            <button type='submit' class='my-3 bg-indigo-500 py-2 px-5 rounded text-white font-medium'>Create</button>
        </div>
    </form>
</div>
