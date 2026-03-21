<div class="bg-black/80 rounded-2xl  bg-[url(https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1175&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)] bg-no-repeat bg-cover bg-center bg-blend-overlay  text-white">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <div
        class="max-w-4xl mx-auto  flex flex-col md:flex-row items-start justify-center gap-8 px-4 md:px-0 py-10">
        <img class="max-w-lg w-full rounded-xl h-fit"
           src="https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=1174&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Modern luxury home exterior" />
        <div>
            <p class="text-indigo-600 text-sm font-medium">Buying Guide</p>
            <h1 class="text-3xl font-semibold text-[#FF8F20]">Got questions about buying a home?</h1>
            <p class="text-sm text-white mt-2 pb-4">
                Everything you need to know about finding, financing, and purchasing your dream property — simplified.
            </p>

            <!-- FAQ Items -->
            <div id="faqContainer">
            </div>
        </div>
    </div>

    <script>
        const faqs = [{
                question: "What's the first step to buying a home?",
                answer: "Start by getting pre-approved for a mortgage to understand your budget. Then connect with a local real estate agent who can guide you through the market and help you find properties that match your needs.",
            },
            {
                question: "How much down payment do I need?",
                answer: "Down payments typically range from 3% to 20% of the home's purchase price, depending on the loan type. First-time homebuyer programs and FHA loans often offer lower down payment options.",
            },
            {
                question: "How long does the home buying process take?",
                answer: "From search to closing, the process typically takes 30-60 days. This includes finding a home, making an offer, inspections, appraisal, and finalizing your mortgage paperwork.",
            },
            {
                question: "What are closing costs and who pays them?",
                answer: "Closing costs are fees for services like appraisal, title search, and loan origination — usually 2-5% of the home price. Both buyers and sellers may cover different portions, which can be negotiated in your offer.",
            },
        ];

        const container = document.getElementById("faqContainer");

        faqs.forEach((faq, index) => {
            const wrapper = document.createElement("div");
            wrapper.className = "border-b border-slate-200 py-4 cursor-pointer";

            const header = document.createElement("div");
            header.className = "flex items-center justify-between";
            header.innerHTML = `
            <h3 class="text-white font-medium">${faq.question}</h3>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="white"
                xmlns="http://www.w3.org/2000/svg"
                class="transition-all duration-500 ease-in-out icon">
                <path d="m4.5 7.2 3.793 3.793a1 1 0 0 0 1.414 0L13.5 7.2"
                    stroke="#1D293D" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        `;

            const answer = document.createElement("p");
            answer.className =
                "text-sm text-slate-500 transition-all duration-500 ease-in-out max-w-md opacity-0 max-h-0 -translate-y-2 pt-0 answer";
            answer.textContent = faq.answer;

            wrapper.appendChild(header);
            wrapper.appendChild(answer);
            container.appendChild(wrapper);

            header.addEventListener("click", () => {
                const allAnswers = document.querySelectorAll(".answer");
                const allIcons = document.querySelectorAll(".icon");

                allAnswers.forEach((el, i) => {
                    if (i === index) {
                        const isOpen = el.classList.contains("opacity-100");
                        el.classList.toggle("opacity-100", !isOpen);
                        el.classList.toggle("max-h-[300px]", !isOpen);
                        el.classList.toggle("translate-y-0", !isOpen);
                        el.classList.toggle("pt-4", !isOpen);
                        el.classList.toggle("opacity-0", isOpen);
                        el.classList.toggle("max-h-0", isOpen);
                        el.classList.toggle("-translate-y-2", isOpen);

                        allIcons[i].classList.toggle("rotate-180", !isOpen);
                    } else {
                        el.classList.remove("opacity-100", "max-h-[300px]", "translate-y-0",
                            "pt-4");
                        el.classList.add("opacity-0", "max-h-0", "-translate-y-2");
                        allIcons[i].classList.remove("rotate-180");
                    }
                });
            });
        });
    </script>
</div>
