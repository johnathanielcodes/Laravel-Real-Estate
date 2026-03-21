<x-app-layout>
    <div class="py-5">
        <div class="flex flex-row gap-2 mb-2">
            <a href='{{ route('properties.create') }}'
                class='w-fit px-2 py-3 active:scale-95 transition text-sm text-white rounded-lg bg-slate-700'>Add
                Property</a>
        </div>

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
                                <tr>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 '>
                                        Louis Vuitton</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        Ksh 20,010,510 </td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        Apartment</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        2</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        3</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        20m<sup>2</sup></td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        Nairobi</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        00100</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        Available</td>
                                    <td class='p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900'>
                                        <button
                                            type='button'class='w-20 px-2 py-3 bg-red-500 active:scale-95 transition text-sm text-white rounded-full bg-red-700'>Delete</button>
                                        <button type='button'
                                            class='w-20 px-2 py-3 active:scale-95 transition text-sm text-white rounded-lg bg-slate-700'>message</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

