<?php

use Livewire\Component;

new class extends Component {
    public $properties;
};
?>

<div>
    <div class='flex flex-col'>
        <div class=' overflow-x-auto'>
            <div class='min-w-full inline-block align-middle'>
                <div class='overflow-hidden border rounded-lg border-gray-300'>
                    <table class=' min-w-full  rounded-xl'>
                        <thead>
                            <tr class='bg-gray-50'>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    Title </th>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    Price</th>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    Type </th>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    Bathrooms </th>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    Bedrooms </th>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    Area </th>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    City </th>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    Address </th>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    Status </th>
                                <th scope='col'
                                    class='p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize'>
                                    Actions </th>
                            </tr>
                        </thead>
                        <tbody class='divide-y divide-gray-300 '>
                            @foreach ($properties as $property)
                                <tr>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 '>
                                        {{ $property->title }}</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        Ksh {{ $property->price }} </td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        {{ $property->listing_type }}</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        {{ $property->bathrooms }}</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        {{ $property->bedrooms }}</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        {{ $property->area }}m<sup>2</sup></td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        {{ $property->city }}</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        {{ $property->address }}</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        {{ $property->status }}</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        <button
                                            type='button'class='w-20 px-2 py-3 bg-red-500 active:scale-95 transition text-sm text-white rounded-full bg-red-700'>Delete</button>
                                        <a type='button' href="{{ route('properties.edit', $property->slug) }}"
                                            class='w-20 px-2 py-3 active:scale-95 transition text-sm text-white rounded-lg bg-slate-700'>edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
