<div class="">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        @keyframes rotate {
            100% {
                transform: rotate(1turn);
            }
        }

        .rainbow::before {
            content: '';
            position: absolute;
            z-index: -50;
            left: -50%;
            top: -50%;
            width: 200%;
            height: 200%;
            background-position: 100% 50%;
            background-repeat: no-repeat;
            background-size: 50% 30%;
            filter: blur(6px);
            background-image: linear-gradient(#fff);
            animation: rotate 4s linear infinite;
        }

        .rainbow::after {
            z-index: 0
        }
    </style>

    <header
        class="relative bg-black/20 rounded-2xl text-white h-screen flex flex-col items-center justify-center overflow-hidden">
        <!-- Video Background -->
        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted playsinline
            style="z-index: -1;">
            <source src="{{ asset('videos/4770380-hd_1920_1080_30fps.mp4') }}" type="video/mp4">
        </video>


        <div
            class="rainbow relative z-0 bg-white/15 overflow-hidden p-px flex items-center justify-center rounded-full transition duration-300 active:scale-100 mt-28 md:mt-32 pointer-events-none">
            <button
                class="flex items-center justify-center gap-3 pl-4 pr-6 py-3 text-white rounded-full font-medium bg-gray-900/80 backdrop-blur pointer-events-auto">
                <div class="relative flex size-3.5 items-center justify-center">
                    <span
                        class="absolute inline-flex h-full w-full rounded-full bg-[#FF8F20] opacity-75 animate-ping duration-300"></span>
                    <span class="relative inline-flex size-2 rounded-full bg-[#FF8F20]"></span>
                </div>
                <span class='text-xs'>Trusted by 10,000+ happy homeowners</span>
            </button>
        </div>

        <h1
            class="text-4xl md:text-[64px]/[82px] text-[#FF8F20] text-center max-w-4xl mt-5 bg-clip-text leading-tight px-4">
            Find your dream home in the perfect neighborhood
        </h1>
        <p class="text-sm md:text-base text-white bg-clip-text text-center max-w-lg mt-4.5 px-4">
            Discover luxury apartments, modern villas, and premium real estate tailored to your lifestyle.
        </p>

        <div class='flex gap-3 mt-8'>
            <button
                class="bg-[#FF8F20] hover:bg-[#FF8F20]/90 text-gray-800 px-6 py-2.5 rounded-full text-sm transition cursor-pointer group">
                <div class="relative overflow-hidden">
                    <span class="block transition-transform duration-200 group-hover:-translate-y-full">
                        Browse properties
                    </span>
                    <span
                        class="absolute top-0 left-0 block transition-transform duration-200 group-hover:translate-y-0 translate-y-full">
                        Browse properties
                    </span>
                </div>
            </button>
            <div
                class="bg-white hover:bg-white p-px flex items-center justify-center rounded-full hover:scale-105 transition duration-300 active:scale-100">
                <button class="px-6 text-sm py-3 text-black rounded-full bg-white/5 cursor-pointer">
                    Contact an agent
                </button>
            </div>
        </div>

        <a href="#features" class='scroll-down flex flex-col items-center gap-4 mt-20 animate-bounce cursor-pointer'>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 9A7 7 0 1 0 5 9v6a7 7 0 1 0 14 0zm-7-3v4" stroke="#fff" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class='text-sm text-white'>Scroll Down</p>
        </a>
    </header>

</div>
