@extends('front.layout.app')
@push('title')
    Home
@endpush
@section('body')
    <!-- banner section starts from here -->
    <div class="banner h-[85vh] md:h-screen bg-cover w-11/12 mx-auto">
        <div class="h-full w-full">
            <div
                class="h-full w-[85%] mx-auto font-primary font-medium flex flex-col gap-8 justify-center items-start md:items-center">
                <h3 class="lg:text-7xl md:text-4xl text-4xl text-gray-800 font-bold md:text-center">
                    Vi hittar din hyresrätt enligt dina kriterier. Enklare blir det inte.</h3>
                <h6 class="text-gray-800 md:px-20 md:text-center hidden md:block">Vårt erfarna team och avancerade AI-teknik
                    övervakar den
                    svenska
                    hyresmarknaden åt dig. Vi hittar din drömbostad<br> och sköter alla detaljer, så att du kan
                    fokusera på annat.
                </h6>
                <h6 class="text-gray-800 md:px-20 md:text-center md:hidden">Vårt erfarna team och avancerade AI-teknik
                    övervakar den
                    svenska
                    hyresmarknaden åt dig. Vi hittar din drömbostad och sköter alla detaljer,<br> så att du kan
                    fokusera på annat.
                </h6>

                <div class="flex gap-5">
                    <a href="{{ route('register') }}">
                        <div class="flex gap-5 text-white bg-[#9628fd] px-5 py-2 rounded">
                            <button>Bli medlem</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- banner after section starts from here -->
    <section>
        <div class="w-11/12 md:w-4/5 mx-auto md:h-[700px]">
            <img class="hidden md:block h-full w-full bg-cover overflow-hidden object-cover shadow-2xl shadow-black"
                src="{{ asset('Images/Home-7.webp') }}" alt="">
            <img class="md:hidden h-full w-full bg-cover overflow-hidden object-cover shadow-2xl shadow-black"
                src="{{ asset('Images') }}/mobile/home2.webp" alt="">
        </div>
    </section>

    <!-- partners section starts from here -->
    <section id="about" class="w-11/12 md:w-4/5 mx-auto lg:py-24 font-primary">
        <p class="text-2xl md:text-4xl text-center py-8">Använt av över <span class="text-[#9628fd]">700+</span> nöjda
            medlemmar. Bli medlem idag!</p>

        <h3 class="lg:text-7xl md:text-4xl text-4xl text-gray-800 font-bold text-center leading-10">
            Om oss</h3>
        <p class="text-gray-800 md:px-20 text-center pb-14 pt-8 md:text-lg text-sm">BoRutan är en plattform för bostadssökande som erbjuder en heltäckande lösning med ett passionerat och dedikerat team. Vår ambition är att inte bara underlätta, utan också förbättra bostadssökandet för alla våra medlemmar. Med hjälp av vår AI-teknologi skapar vi perfekta matchningar mellan varje medlems unika kriterier och deras drömbostad. På BoRutan tar vi på oss bördan av lägenhetssökandet så att du kan fokusera på det som verkligen betyder mest i ditt liv.</p>

        <div class="">
            <img class="w-full bg-cover overflow-hidden object-cover pb-4 hidden md:block"
                src="{{ asset('Images') }}/Stockholm-x-Home--1--.webp" alt="">

            <img class="w-full bg-cover overflow-hidden object-cover pb-4 md:hidden"
                src="{{ asset('Images') }}/mobile/home-3.webp" alt="">
        </div>

    </section>

    <!-- why choose section starts from here -->
    <section class="font-primary pt-5 md:pt-0 md:py-24">
        <div class="w-11/12 md:w-4/5 mx-auto space-y-10">
            <div class="w-[85%] mx-auto">
                <h3 class="lg:text-7xl md:text-4xl text-4xl text-gray-800 font-bold text-center leading-10">
                    Varför ska du välja BoRutan?</h3>
                <p class="text-gray-800 md:px-20 text-center py-6 text-base md:text-lg">Dagens läge gör det tidskrävande och
                    nästan
                    omöjligt att hitta en hyresrätt som matchar dina önskemål. Men med BoRutan blir
                    processen smidig och enkel tack vare vår unika affärsmodell och teknologi. Vi
                    samarbetar med över 28 fastighetsbolag på vår plattform och erbjuder en pengarna-
                    tillbaka-garanti om vi inte hittar en bostad som motsvarar dina kriterier.</p>
            </div>
            <div class="">
                <div class="">
                    <img class="w-full bg-cover overflow-hidden object-cover pb-4 hidden md:block"
                        src="{{ asset('Images') }}/Founder.webp" alt="">

                    <img class="w-full bg-cover overflow-hidden object-cover pb-4 md:hidden"
                        src="{{ asset('Images') }}/mobile/women.webp" alt="">

                </div>
                <div class="gap-2 md:gap-5 justify-between hidden md:flex">
                    <div>
                        <span class="bold text-xl md:text-2xl lg:text-4xl">86.4%</span>
                        <p class="text-sm md:text-xl">av våra medlemmar har fått hyresrätt</p>
                    </div>
                    <div>
                        <span class="bold text-xl md:text-2xl lg:text-4xl">78X</span>
                        <p class="text-sm md:text-xl">effektivare att söka bostad med AI</p>
                    </div>
                    <div class="">
                        <span class="bold text-xl md:text-2xl lg:text-4xl">57</span>
                        <p class="text-sm md:text-xl">fastighetsbolag som samarbetspartners</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- our client section starts from here -->
    <section class="py-14">
        <div class="w-11/12 mx-auto space-y-9">
            <h3 class="lg:text-7xl md:text-4xl text-4xl text-gray-800 font-bold text-center leading-10 md:pb-14">
                Använd teknologi för att söka smartare</h3>

            <img class="w-full hidden md:block" src="{{ asset('Images') }}/Home-8--.webp" alt="">
            <img class="w-full md:hidden" src="{{ asset('Images') }}/mobile/home1.webp" alt="">
        </div>
    </section>

    <!-- what client say section starts from here -->
    <div class="bg-neutral-950">
        <section class=" mx-auto w-full md:py-24">


            <div class="flex items-center justify-center flex-col gap-y-2 py-14">
                <h2 class="text-xl lg:text-6xl font-bold mx-auto text-center text-white">
                    Här är vad våra
                    <span class="text-[#9628fd]">medlemmar</span></br> har att säga.
                </h2>
                <p class="text-base md:text-lg font-medium text-slate-400/70">Upptäck hur vår tjänst kan gynna dig.</p>
            </div>

            <div class="recent_slider">

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">BoRutan gjorde verkligen allt enklare för mig och min familj
                                eftersom de sökte och hade kontakt med hyresvärden. Allt jag behövde göra var att skriva
                                under förstahandskontraktet.</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Patrik Larsson </p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item  p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">BoRutan är ett smart sätt att förenkla bostadssökandet. Med
                                en
                                djungel av alternativ på bostadsmarknaden kan det vara svårt att hitta rätt, men med BoRutan
                                får du hjälp av proffs och AI för att navigera genom den.</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Anna Berg </p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3 ">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">BoRutan erbjuder den bästa tjänsten för bostadssökande. Till
                                skillnad från konkurrenter behöver du inte spendera tid på att söka, och dessutom är du
                                garanterad en lägenhet eller pengarna tillbaka.</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Hassan Omar </p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>


                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">BoRutan är ett seriöst företag med verkliga ambitioner att
                                göra sitt yttersta för att hitta ett hem åt sina medlemmar.</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Daniel Lundgren </p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Bas </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Inga kötider, inget letande, ingen väntan! BoRutan är
                                fantastisk, och jag älskar idén att de tar hand om sökandet efter en hyresbostad enligt mina
                                kriterier.</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Nathalie Westin </p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Bas </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">BoRutan är mer direkt och effektiv än andra liknande tjänster
                                jag har använt! Jättetacksam för min nya lägenhet i Stockholm tack vare BoRutan.
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Cajsa Ahlström</p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Rekommenderar BoRutan till dig som vill spara tid och
                                faktiskt få en lägenhet till dig och din familj.
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Manuel Hernández</p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Fick en lägenhet samma dag jag blev medlem. Tror jag är den
                                lyckligaste personen i världen.
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Hannes Lundqvist</p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Min kompis från universitetet rekommenderade BoRutan, och jag
                                är så glad att jag hittade dem och min hyresrätt. Sparade tid och pengar.
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Sophie Pettersson</p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Bas </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Jag hade länge letat efter en tjänst som kunde hjälpa mig att
                                göra letandet med bra kontakt med hyresvärdar och fastighetsbolag. BoRutan levererar
                                verkligen det de lovar.
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Josef Nasser</p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Skrev på förstahandskontraktet för min bostad i Göteborg,
                                trodde det skulle vara en dröm men BoRutan gör allt möjligt. Ni är underbara.
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Mikaela Åberg</p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Bra kundtjänst som hjälpte mig genom allt, tack för den
                                fantastiska supporten och förslagen på olika bostadsmöjligheter.

                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Aylin Yılmaz</p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Jag hittade BoRutan på Instagram, och de var hjälpsamma från
                                början till slut av vår bostadssökning. En tjänst som verkligen behövs!
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Hanna Berglund </p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Att leta efter en bostad har varit både ångestfyllt och
                                jobbigt, men efter att jag anslöt mig till BoRutan kände jag en lättnad och fick en bostad
                                efter bara 5 månader.
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Maria Santiago</p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

                <div class="recent_slide_item p-3">
                    <div class="border p-7 rounded-xl bg-neutral-900 drop-shadow-md border-neutral-800/50">
                        <div class="flex flex-col gap-y-3.5">
                            <div class="flex">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                                <img src="{{ asset('Images') }}/start-2.png" alt="Michael Johnson" class="h-10 w-10">
                            </div>
                            <p class="font-medium text-white">Det var en oväntad och uppfriskande upplevelse att få samtal,
                                SMS och mail med olika förslag på hyreslägenheter, och jag känner mig väldigt nöjd över mitt
                                beslut att ansluta mig till BoRutan.
                            </p>
                        </div>
                        <div class="flex flex-col">
                            <p class="pt-2 text-sm font-semibold text-white">Joel Karlsson</p>
                            <p class="text-sm font-medium text-slate-100/70">membership: Prio </p>
                        </div>

                    </div>
                </div>

            </div>

        </section>
    </div>

    <!-- pricing page -->
    <section>
        <div class="space-y-5 px-4 py-12 md:py-20 font-primary w-full md:w-4/6 mx-auto" id="pricing">
            <p
                class="lg:text-7xl md:text-4xl text-2xl text-gray-800 font-bold text-center leading-10 px-10 pb-4 hidden md:block">
                Priset för att hitta ditt hem</p>
            <p
                class="lg:text-7xl md:text-4xl text-2xl text-gray-800 font-bold text-center leading-10 px-10 pb-4 md:hidden">
                Priset för att hitta<br> ditt hem</p>
            <span class=" justify-center pb-2 text-center hidden md:block">Prissättning för dig som vill ha en
                hyresrätt.</span>
            <span class="flex justify-center pb-2 text-center md:hidden">Prissättning för dig som vill<br> ha en
                hyresrätt.</span>

                <div class="demo-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 md:gap-3 lg:gap-5 gap-2">
                    <!-- premium package -->
                    <div
                        class="shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] rounded-[30px] md:rounded-[36px] bg-[#FAFAFA] overflow-hidden border-[1px] border-gray-200 p-8 relative">
                        <div class="h-full">
                            <div class="h-full z-10 relative">
                                <div class="flex flex-col flex-1 justify-between h-full space-y-5">
                                    <div class="flex justify-between flex-col">
                                        <div class="text-xl md:text-2xl font-bold text-gray-900 flex justify-between">
                                            <span>{{ $package[1]->name }}</span>
                                            <span class="bg-[#9628fd] text-sm rounded-xl text-white p-2">Populärst</span>
                                        </div>
                                        <div class="pt-5 text-gray-500 font-medium text-base space-y-1">
                                            <div class="flex items-center align-bottom"><span class="pt-1.5">NOK</span>
                                                <div class="ml-1 mr-2 text-2xl md:text-3xl font-bold text-gray-900">
                                                    <span>{{ $package[1]->price }}</span>
                                                </div><span class="pt-1.5">per månad</span>
                                            </div>
                                        </div>
                                        <div class="">
                                            <ul class="space-y-2 pt-8">
                                                <li class="flex items-center font-medium space-x-2 text-black">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                    <span>24/7 personlig service </span>
                                                </li>
                                                <li class="flex items-center font-medium space-x-2 text-black">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg><span>Få {{ $package[1]->contract }} hyreskontraktsförslag </span>
                                                </li>
                                                <li class="flex items-center font-medium space-x-2 text-black">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg><span>Pengarna tillbaka garanti</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        @auth
                                            @php
                                                $subscription = App\Models\Subscription::where('user_id', auth()->id())->where('status', 'Active')->first();
                                            @endphp
                                            @if ($subscription && $subscription->package_id == $package[1]->id)
                                                <a href="{{ route('user.invoice.cancel') }}"
                                                    type="button"
                                                    class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                        class="w-full font-semibold text-base">iptal etmek</span>
                                                    <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                            
                                            @else
                                            <a href="{{ route('user.invoice.buy', $package[1]->id) }}"
                                                type="button"
                                                class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                    class="w-full font-semibold text-base">Välj {{ $package[1]->name }}</span>
                                                <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                            @endif
                                        @else
                                        <a href=" {{ route('register') }}?package={{ $package[1]->id }} "
                                            type="button"
                                            class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                class="w-full font-semibold text-base">Välj {{ $package[1]->name }}</span>
                                            <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
    
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- standard package -->
                    <div
                        class="shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] rounded-[30px] md:rounded-[36px] bg-[#FAFAFA] overflow-hidden border-[1px] border-gray-200 p-8 relative">
                        <div class="h-full">
                            <div class="h-full z-10 relative">
                                <div class="flex flex-col flex-1 justify-between h-full space-y-5">
                                    <div class="flex justify-between flex-col">
                                        <div class="text-xl md:text-2xl font-bold text-gray-900 flex justify-between">
                                            <span>{{ $package[0]->name }}</span>
                                            <svg class="h-6 w-6 animate-ping-slow text-gray-500" viewBox="0 0 50 50"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M30.5 25C30.5 28.0376 28.0376 30.5 25 30.5C21.9624 30.5 19.5 28.0376 19.5 25C19.5 21.9624 21.9624 19.5 25 19.5C28.0376 19.5 30.5 21.9624 30.5 25Z"
                                                    stroke="currentColor" stroke-opacity="0.7" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M38.75 25C38.75 32.5939 32.5939 38.75 25 38.75C17.4061 38.75 11.25 32.5939 11.25 25C11.25 17.4061 17.4061 11.25 25 11.25C32.5939 11.25 38.75 17.4061 38.75 25Z"
                                                    stroke="currentColor" stroke-opacity="0.4" stroke-width="4.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M47.5 25C47.5 37.4264 37.4264 47.5 25 47.5C12.5736 47.5 2.5 37.4264 2.5 25C2.5 12.5736 12.5736 2.5 25 2.5C37.4264 2.5 47.5 12.5736 47.5 25Z"
                                                    stroke="currentColor" stroke-opacity="0.1" stroke-width="5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div class="pt-5 text-gray-500 font-medium text-base space-y-1">
                                            <div class="flex items-center align-bottom"><span class="pt-1.5">NOK</span>
                                                <div class="ml-1 mr-2 text-2xl md:text-3xl font-bold text-gray-900">
                                                    <span>{{ $package[0]->price }}</span>
                                                </div><span class="pt-1.5">per månad</span>
                                            </div>
                                        </div>
                                        <div class="">
                                            <ul class="space-y-2 pt-8">
                                                <li class="flex items-center font-medium space-x-2 text-black">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                    <span>24/7 personlig service </span>
                                                </li>
    
    
                                                <li class="flex items-center font-medium space-x-2 text-black">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                    <span>Få {{ $package[0]->contract }} hyreskontraktsförslag </span>
                                                </li>
                                                <li class="flex items-center font-medium space-x-2 text-black">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg><span>Pengarna tillbaka garanti</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        @auth
                                            @php
                                                $subscription = App\Models\Subscription::where('user_id', auth()->id())->where('status', 'Active')->first();
                                            @endphp
                                        @if ($subscription && $subscription->package_id == $package[0]->id)
                                            <a href="{{route('user.invoice.cancel')}}"
                                                type="button"
                                                class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                    class="w-full font-semibold text-base">iptal etmek</span>
                                                <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                         @else
                                         <a href="{{ route('user.invoice.buy', $package[0]->id) }}"
                                                type="button"
                                                class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                    class="w-full font-semibold text-base">Välj {{ $package[0]->name }}</span>
                                                <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                         @endif
                                        
                                        @else
                                        <a href="{{ route('register') }}?package={{ $package[0]->id }}"
                                                type="button"
                                                class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                    class="w-full font-semibold text-base">Välj {{ $package[0]->name }}</span>
                                                <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                         @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <div class="space-y-2 leading-relaxed">Identifiera och förstå mönster och preferenser hos både
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
