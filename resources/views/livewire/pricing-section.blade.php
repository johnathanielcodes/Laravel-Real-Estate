<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <section class="bg-[#05070F] flex items-center justify-center py-16 px-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full grid md:grid-cols-2 overflow-hidden">
            <div class="relative hidden md:flex items-center justify-start">
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-10 size-11.5 rounded-full bg-white/40 flex items-center justify-center cursor-pointer">
                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.25 13.193A1.5 1.5 0 0 1 0 11.894V1.502a1.5 1.5 0 0 1 2.25-1.3l9 5.197c1 .577 1 2.02 0 2.598z"
                            fill="#fff" />
                    </svg>
                </div>
                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=800&auto=format&fit=crop"
                    alt="Luxury home interior" class="w-full max-w-96 h-full object-cover" />
            </div>

            <div class="p-6 relative">
                <button
                    class="absolute top-5 right-5 text-neutral-500 hover:text-neutral-700 transition-colors cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>

                <h2 class="text-[20px] font-semibold text-neutral-800 mb-5.5">Choose your property plan</h2>

                <div class="flex items-center gap-3 bg-neutral-100 p-1 rounded-sm mb-3.5">
                    <button id="monthlyBtn"
                        class="flex-1 py-2.5 rounded-sm transition-all text-xs bg-transparent text-gray-600">Monthly</button>

                    <button id="yearlyBtn"
                        class="flex-1 py-2.5 rounded-sm font-medium transition-all relative text-xs bg-white text-neutral-500 shadow-sm">
                        Yearly
                        <span class="ml-2 bg-neutral-800 text-neutral-50 text-[10px] px-2 py-0.5 rounded-full">Save 20%</span>
                    </button>
                </div>

                <div class="space-y-4 mb-3.5 max-w-full">
                    <div id="proPlan"
                        class="border-2 rounded-xl p-4 cursor-pointer transition-all border-indigo-600 bg-indigo-50">
                        <div class="flex items-start gap-3">
                            <div id="proRadio"
                                class="w-5 h-5 rounded-full border-2 flex items-center justify-center mt-1 border-indigo-600 bg-indigo-600">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 3L4.5 8.5L2 6" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>

                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-sm font-medium text-neutral-800">Essential Plan</h3>
                                    <div class="flex items-center gap-1">
                                        <span id="proOriginal"
                                            class="text-neutral-400 line-through text-base font-medium">$2,500</span>
                                        <span id="proPrice"
                                            class="text-[18px] font-semibold text-neutral-800">$1,990</span>
                                        <span class="text-neutral-400 text-xs">/mo, yearly</span>
                                    </div>
                                </div>
                                <p class="text-xs text-neutral-500">Perfect for first-time buyers. Includes property search, agent consultation, and closing assistance.</p>
                            </div>
                        </div>
                    </div>

                    <div id="maxPlan"
                        class="border-2 rounded-xl p-4 cursor-pointer transition-all border-gray-200 hover:border-gray-300">
                        <div class="flex items-start gap-3">
                            <div id="maxRadio"
                                class="w-5 h-5 rounded-full border-2 flex items-center justify-center mt-1 border-gray-300">
                            </div>

                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-sm font-medium text-neutral-800">Premium Plan</h3>
                                    <div class="flex items-center gap-1">
                                        <span id="maxOriginal"
                                            class="text-neutral-400 line-through text-base font-medium">$4,500</span>
                                        <span id="maxPrice"
                                            class="text-[18px] font-semibold text-neutral-800">$3,590</span>
                                        <span class="text-neutral-400 text-sm">/mo, yearly</span>
                                    </div>
                                </div>
                                <p class="text-xs text-neutral-500">Everything in Essential, plus luxury listings, VIP tours, legal consultation, and priority support.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <button
                    class="text-neutral-800 text-xs mb-4 hover:text-neutral-900 transition-colors flex items-center gap-1 cursor-pointer">
                    Compare plans
                    <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="m.75 9.75 5-4.5-5-4.5" stroke="#262626" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>

                <button
                    class="w-full bg-neutral-950 text-white text-sm py-3 rounded-sm font-medium hover:bg-neutral-800 transition-colors mb-3.5 cursor-pointer">
                    Start your home search
                </button>

                <button
                    class="text-neutral-800 text-xs hover:text-neutral-900 transition-colors cursor-pointer">Browse free listings</button>
            </div>
        </div>
    </section>

    <script>
        let billingCycle = 'yearly';
        let selectedPlan = 'pro';

        const monthlyBtn = document.getElementById('monthlyBtn');
        const yearlyBtn = document.getElementById('yearlyBtn');
        const proPlan = document.getElementById('proPlan');
        const maxPlan = document.getElementById('maxPlan');
        const proRadio = document.getElementById('proRadio');
        const maxRadio = document.getElementById('maxRadio');
        const proPrice = document.getElementById('proPrice');
        const maxPrice = document.getElementById('maxPrice');
        const proOriginal = document.getElementById('proOriginal');
        const maxOriginal = document.getElementById('maxOriginal');

        monthlyBtn.onclick = () => {
            billingCycle = 'monthly';
            monthlyBtn.className =
            'flex-1 py-2.5 rounded-sm transition-all text-xs bg-white text-neutral-500 shadow-sm';
            yearlyBtn.className =
                'flex-1 py-2.5 rounded-sm font-medium transition-all relative text-xs bg-transparent text-gray-600';
            proPrice.textContent = '$2,500';
            maxPrice.textContent = '$4,500';
            proOriginal.style.display = 'none';
            maxOriginal.style.display = 'none';
        };

        yearlyBtn.onclick = () => {
            billingCycle = 'yearly';
            yearlyBtn.className =
                'flex-1 py-2.5 rounded-sm font-medium transition-all relative text-xs bg-white text-neutral-500 shadow-sm';
            monthlyBtn.className = 'flex-1 py-2.5 rounded-sm transition-all text-xs bg-transparent text-gray-600';
            proPrice.textContent = '$1,990';
            maxPrice.textContent = '$3,590';
            proOriginal.style.display = 'inline';
            maxOriginal.style.display = 'inline';
        };

        proPlan.onclick = () => {
            selectedPlan = 'pro';
            proPlan.className = 'border-2 rounded-xl p-4 cursor-pointer transition-all border-indigo-600 bg-indigo-50';
            maxPlan.className =
                'border-2 rounded-xl p-4 cursor-pointer transition-all border-gray-200 hover:border-gray-300';
            proRadio.className =
                'w-5 h-5 rounded-full border-2 flex items-center justify-center mt-1 border-indigo-600 bg-indigo-600';
            maxRadio.className = 'w-5 h-5 rounded-full border-2 flex items-center justify-center mt-1 border-gray-300';
            proRadio.innerHTML =
                '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3L4.5 8.5L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            maxRadio.innerHTML = '';
        };

        maxPlan.onclick = () => {
            selectedPlan = 'max';
            maxPlan.className = 'border-2 rounded-xl p-4 cursor-pointer transition-all border-indigo-600 bg-indigo-50';
            proPlan.className =
                'border-2 rounded-xl p-4 cursor-pointer transition-all border-gray-200 hover:border-gray-300';
            maxRadio.className =
                'w-5 h-5 rounded-full border-2 flex items-center justify-center mt-1 border-indigo-600 bg-indigo-600';
            proRadio.className = 'w-5 h-5 rounded-full border-2 flex items-center justify-center mt-1 border-gray-300';
            maxRadio.innerHTML =
                '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3L4.5 8.5L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            proRadio.innerHTML = '';
        };
    </script>
</div>