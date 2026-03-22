<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Back Button --}}
            <div class="mb-6">
                <a href="{{ route('properties') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Properties
                </a>
            </div>


            {{-- Image Gallery --}}
            @php
                $images = $property->images ?? collect();
                $image_count = $images->count();
            @endphp

            @if ($image_count > 0)
                <div class="mb-8">
                    <div id="property-carousel" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-64 sm:h-96 md:h-[500px] overflow-hidden rounded-xl bg-gray-100">
                            @foreach ($images as $index => $image)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ Storage::url($image->path) }}"
                                        class="absolute block w-full h-full object-cover"
                                        alt="{{ $property->title }} - Image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>

                        <!-- Slider indicators -->
                        @if ($image_count > 1)
                            <div class="absolute z-30 flex -translate-x-1/2 bottom-4 left-1/2 space-x-2">
                                @foreach ($images as $index => $image)
                                    <button type="button"
                                        class="w-2 h-2 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-white w-4' : 'bg-white/50 hover:bg-white/75' }}"
                                        aria-label="Slide {{ $index + 1 }}"
                                        data-carousel-slide-to="{{ $index }}"></button>
                                @endforeach
                            </div>
                        @endif

                        <!-- Slider controls -->
                        @if ($image_count > 1)
                            <button type="button"
                                class="absolute top-1/2 left-4 -translate-y-1/2  bg-black/30 hover:bg-black/50 text-white rounded-full p-2 transition"
                                data-carousel-prev>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button type="button"
                                class="absolute top-1/2 right-4 -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white rounded-full p-2 transition"
                                data-carousel-next>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="sr-only">Next</span>
                            </button>
                        @endif
                    </div>
                </div>
            @else
                <div class="mb-8 bg-gray-200 rounded-xl h-64 sm:h-96 md:h-[500px] flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-gray-500 mt-2">No images available</p>
                    </div>
                </div>
            @endif
            {{-- Property Title --}}
            <div class="mb-6">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $property->title }}</h1>
                <p class="text-gray-600 mt-2 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ $property->address }}, {{ $property->city }}
                </p>
            </div>


            {{-- Main Content Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Left Column - Property Details --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- Price and Status --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="text-3xl font-bold text-blue-600">
                                    ${{ number_format($property->price, 2) }}
                                </div>
                                @if ($property->area)
                                    <p class="text-gray-600 mt-1">
                                        ${{ number_format($property->price / $property->area, 2) }} per sq ft
                                    </p>
                                @endif
                            </div>
                            <div>
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-semibold 
                                    {{ $property->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($property->status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Key Features --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-xl font-semibold mb-4">Key Features</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @if ($property->bedrooms)
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-6 h-6 mx-auto text-gray-600 mb-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                    <div class="text-xl font-bold">{{ $property->bedrooms }}</div>
                                    <div class="text-sm text-gray-600">Bedrooms</div>
                                </div>
                            @endif

                            @if ($property->bathrooms)
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-6 h-6 mx-auto text-gray-600 mb-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                        </path>
                                    </svg>
                                    <div class="text-xl font-bold">{{ $property->bathrooms }}</div>
                                    <div class="text-sm text-gray-600">Bathrooms</div>
                                </div>
                            @endif

                            @if ($property->area)
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-6 h-6 mx-auto text-gray-600 mb-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                        </path>
                                    </svg>
                                    <div class="text-xl font-bold">{{ number_format($property->area) }}</div>
                                    <div class="text-sm text-gray-600">Square Feet</div>
                                </div>
                            @endif

                            @if ($property->property_type)
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <svg class="w-6 h-6 mx-auto text-gray-600 mb-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    <div class="text-sm font-medium">{{ ucfirst($property->property_type) }}</div>
                                    <div class="text-sm text-gray-600">Property Type</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-xl font-semibold mb-4">Description</h2>
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $property->description }}</p>
                    </div>

                    {{-- Additional Details --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-xl font-semibold mb-4">Property Details</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Listing Type</span>
                                <span class="font-medium">{{ ucfirst($property->listing_type) }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Property ID</span>
                                <span class="font-medium">#{{ $property->id }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Listed Date</span>
                                <span class="font-medium">{{ $property->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-600">Last Updated</span>
                                <span class="font-medium">{{ $property->updated_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column - Contact & Actions --}}
                <div class="space-y-6">
                    {{-- Contact Agent Card --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-6">
                        <h3 class="text-lg font-semibold mb-4">Contact Agent</h3>

                        @if ($property->user)
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-semibold">
                                        {{ $property->user->id === Auth::id() ? ' You ' : $property->user->id }}</p>
                                    <p class="text-sm text-gray-600">Real Estate Agent</p>
                                </div>
                            </div>
                        @endif

                        <form action="#" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <input type="text" name="name" placeholder="Your Name" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Your Email" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <input type="tel" name="phone" placeholder="Phone Number (Optional)" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <textarea name="message" rows="3" placeholder="I'm interested in this property..." 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <button type="submit" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                                Send Message
                            </button>
                        </form>
                    </div>

                    {{-- Share Property --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h3 class="text-lg font-semibold mb-3">Share Property</h3>
                        <div class="flex space-x-3">
                            <a href="#"
                                class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition">
                                Facebook
                            </a>
                            <a href="#"
                                class="flex-1 bg-blue-400 text-white text-center py-2 rounded-lg hover:bg-blue-500 transition">
                                Twitter
                            </a>
                            <a href="#"
                                class="flex-1 bg-gray-600 text-white text-center py-2 rounded-lg hover:bg-gray-700 transition">
                                Copy Link
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
    <script>
        // Initialize Flowbite carousel if needed
        if (typeof window.initFlowbite !== 'undefined') {
            window.initFlowbite();
        }
    </script>
@endpush
