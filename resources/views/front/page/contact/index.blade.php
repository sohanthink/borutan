@extends('front.layout.app')
@push('title')
    Contact
@endpush
@section('body')
    <!-- <section>
                                                                                        <div class="h-[400px] flex justify-center items-center">
                                                                                            <h2 class="font-medium font-primary text-4xl">Home > Contact</h2>
                                                                                        </div>
                                                                                    </section> -->


    <section>
        <div class="bg-cover w-100 h-[300px] lg:h-[600px] flex justify-center items-center flex-col"
            style="background-image: url({{ asset('Images/Stockholm-x-Home--1--.webp') }});">
            {{-- <span class="p-3 border">Kontakt</span> --}}
            <div class="w-full h-[300px] lg:h-[600px] flex justify-center items-center bg-black bg-opacity-70">
                <h2 class="lg:text-7xl md:text-4xl text-4xl text-white font-bold text-center pb-10 pt-3">Hur kan vi
                    hjälpa dig?
                </h2>
            </div>
        </div>
    </section>



    <!-- form section starts from here -->
    <section class="body-font relative bg-gray-900 text-gray-400 font-primary">

        <div class="w-10/12 mx-auto px-5 py-24">

            <div class="mb-12 flex w-full flex-col text-center">


                <p class="mx-auto text-base leading-relaxed lg:w-2/3">Tveka inte att kontakta oss!
                </p>
            </div>

            <div class="flex w-full justify-center">
                <div class="-m-2 flex flex-wrap">
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="p-2">
                            <div class="relative md:w-96">
                                <input type="text" id="name" name="name"
                                    class="peer w-full rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900"
                                    placeholder="Name" />
                                <label for="name"
                                    class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">Namn</label>
                            </div>
                        </div>
                        <div class=" p-2">
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="peer w-full rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900"
                                    placeholder="Email" />
                                <label for="email"
                                    class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">E-post</label>
                            </div>
                        </div>
                        <div class=" p-2">
                            <div class="relative">
                                <input type="text" id="subject" name="subject"
                                    class="peer w-full rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900"
                                    placeholder="subject" />
                                <label for="subject"
                                    class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">Ämne</label>
                            </div>
                        </div>
                        <div class="mt-4 w-full p-2">
                            <div class="relative">
                                <textarea id="message" name="message"
                                    class="peer h-32 w-full resize-none rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-6 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900"
                                    placeholder="Message"></textarea>
                                <label for="message"
                                    class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">Meddelande</label>
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <button
                                class="mx-auto flex rounded border-0 bg-indigo-500 py-2 px-8 text-lg text-white hover:bg-indigo-600 focus:outline-none">Skicka</button>
                        </div>
                </div>
            </div>
            </form>

            <!-- <div class="flex justify-center flex-col py-20">
                                                                                                <span class="text-center p-2 text-white">Contact Informations</span>
                                                                                                <div class="flex justify-center">
                                                                                                    <span class="lg:text-7xl md:text-4xl text-4xl text-white font-bold text-center pb-10 pt-3">Feel free to contact Us anytime</span>
                                                                                                </div>
                                                                                                <div class="flex justify-between">
                                                                                                    <div class="border-[#45B3BA] border  px-14 py-20 text-white rounded">
                                                                                                        Info@BoRutan.se
                                                                                                    </div>
                                                                                                    <div class="border-[#45B3BA] border  px-14 py-20 text-white rounded">
                                                                                                    08 - 506 362 00
                                                                                                    </div>
                                                                                                    <div class="border-[#45B3BA] border  px-14 py-20 text-white rounded">
                                                                                                    Klarabergsviadukten 70,<br>
                                                                                                    111 64 Stockholm, Sweden
                                                                                                    </div>
                                                                                                    <div class=" border-[#45B3BA] border px-14 py-20 text-white rounded">
                                                                                                        Info@BoRutan.se
                                                                                                    </div>
                                                                                                    
                                                                                                </div>
                                                                                           </div> -->


        </div>

    </section>


    <!-- faq page started from here -->
    <section id="faq">
        <div class="py-24 px-8 max-w-5xl mx-auto flex flex-col md:flex-row gap-12">
            <div class="flex flex-col text-left basis-1/2">
                <p class="inline-block font-semibold text-primary mb-4 text-center md:text-left">Vanliga frågor om BoRutan
                </p>
                <p class="sm:text-4xl text-3xl font-extrabold text-base-content text-center md:text-left">Frågor och svar
                </p>
            </div>
            <ul class="basis-1/2">
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Vad är BoRutan?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">Med hjälp av vårt dedikerade team och avancerad
                                AI-teknologi tar BoRutan hand om hela processen med att hitta din perfekta hyresrätt åt våra
                                medlemmar. Vi sköter allt från att söka efter lägenheter, att kontakta hyresvärdar och att
                                vara vid din sida under avtalsprocessen. När vi hittar en lägenhet som matchar dina
                                kriterier, kontaktar vi dig för att avtala om visning eller kontraktsskrivning. På så sätt
                                frigörs din värdefulla tid så att du kan fokusera på att göra roliga och meningsfulla saker
                                medan vi tar hand om resten.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">När kan jag få en hyresrätt?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">I genomsnitt har det tagit 6-9 månader för en medlem att
                                säkra en hyresrätt efter deras medlemskap hos BoRutan, men det beror på olika faktorer som
                                var medlemmen söker en bostad i Sverige.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Är medlemmar garanterade en hyresrätt?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">Ja, om vi inte hittar en lägenhet inom 12 månader enligt
                                dina kriterier, återbetalar vi det du har betalat till BoRutan under dessa 12 månader.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Hur fungerar BoRutans AI?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">identifiera och förstå mönster och preferenser hos både
                                hyresgäster och hyresvärdar. Liksom andra AI-system använder BoRutan avancerade algoritmer
                                och maskininlärningstekniker för att effektivt sortera och matcha lämpliga bostäder med
                                potentiella hyresgäster. BoRutan söker igenom alla tillgängliga system för att hitta
                                lämpliga hyresvärdar och bostäder som matchar medlemmarnas kriterier, vilket resulterar i en
                                smidig och effektiv matchningsprocess.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Hur kan BoRutan garantera en hyresrätt?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">Nästan 90% av våra medlemmar har fått en hyresrätt tack
                                vare vårt ambitiösa team, vår teknologi och våra partners. Vi strävar efter att ha färre
                                medlemmar, men att säkerställa så många bostäder som möjligt åt dem. Vi sätter stor vikt vid
                                kvalitet framför kvantitet och vår inkomst kommer också från våra API-lösningar gentemot
                                större partners och plattformar. Dessutom tar vi ut en avgift från hyresvärdar, partners och
                                större marknadsplatser för att effektivt och smidigt hitta de bästa hyresgästerna.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Hur kontaktar ni mig när ni hittar en bostad enligt mina
                            kriterier?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">Vi kontaktar dig vanligtvis via e-post eller telefon,
                                antingen genom ett samtal eller ett sms, när vi hittar en bostad som matchar dina kriterier.
                                Det är viktigt att se till att dina kontaktuppgifter är uppdaterade så att vi kan nå dig så
                                snabbt som möjligt när vi har en lämplig bostad att erbjuda.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Vad är skillnaden mellan Bas- och ert
                            Prio-medlemskap?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">Enda skillnaden är att med Basmedlemskapet får du ett
                                garanterat hyreskontraktsförslag efter dina kriterier, till skillnad från Prio där du får
                                tre hyreskontraktsförslag under 12 månader.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Vad händer om jag tackar nej till alla bostadsförslag från
                            BoRutan?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">Om du är Basmedlem får du ett hyresrättsförslag, och som
                                Priomedlem får du tre under en period på 12 månader. Om du tackar nej kan det ta ytterligare
                                12 månader innan du får nya förslag. Är du kräsen rekommenderar vi att du blir Priomedlem
                                för att få fler alternativ tillsammans.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Kan jag säga upp mitt medlemskap?</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">Ja, du kan när som helst säga upp ditt medlemskap.</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <script>
            function toggleFAQ(button) {
                const content = button.nextElementSibling;
                button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
                content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
            }
        </script>

    </section>
@endsection
