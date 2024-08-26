<x-layouts.app>
    <div id="hero">
        <livewire:components.hero />
    </div>
    
    <div id="mitra" class="px-4 pt-20 md:px-7">
        <livewire:components.container title="Mitra CSR" subtitle="Kabupaten Cirebon"
            fontClass="text-2xl md:text-3xl font-bold">
            <livewire:components.card-mitra />
            <div class="pt-12 md:pt-20">
                <livewire:components.container title="Data Statistik" class="items-center">
                    <div class="w-full px-4 py-8 md:py-12 lg:px-20">
                        <div class="flex flex-wrap justify-center w-full">
                            <livewire:components.data-stats value="124" subtitle="Total Proyek CSR" />
                            <livewire:components.data-stats value="119" subtitle="Proyek terealisasi" />
                            <livewire:components.data-stats value="89" subtitle="Mitra bergabung" />
                            <livewire:components.data-stats value="Rp200T +" subtitle="Dana realisasi CSR" />
                        </div>
                    </div>
                </livewire:components.container>
                <div class="flex flex-wrap w-full pt-12 md:pt-24">
                    <div class="w-full md:w-1/2">
                        <!-- FIX THIS CODE -->
                        @php
                            $images = ['bg-kepala-daerah-1.png', 'bg-kepala-daerah-2.png', 'bg-kepala-daerah-3.png'];
                        @endphp
                        <livewire:components.image-custom-grid :images="$images" />
                    </div>
                    <div class="w-full md:w-1/2">
                        <livewire:components.container title="Apa Itu" subtitle="Kegiatan CSR?"
                            fontClass="text-2xl md:text-3xl font-bold" class="items-start">
                            <livewire:components.about-csr
                                content="Corporate Social Responsibility (CSR) merupakan konsep di mana perusahaan secara
                                sadar
                                mengintegrasikan kepedulian sosial dan lingkungan ke dalam operasional bisnisnya.
                                Ini
                                melibatkan tindakan sukarela yang memberikan manfaat bagi masyarakat, seperti
                                program
                                pendidikan, kesehatan, dan lingkungan, serta upaya untuk mengurangi dampak negatif
                                terhadap lingkungan. CSR tidak hanya mencerminkan tanggung jawab perusahaan terhadap
                                masyarakat, tetapi juga dapat meningkatkan reputasi dan daya saing bisnis.
                                Berdasarkan Undang-Undang nomor 40 Tahun 2007 tentang Perseroan Terbatas (UUPT)
                                pasal 1
                                ayat 3, pengertian Tanggung Jawab Sosial dan Lingkungan Perusahaan (TJSLP) atau
                                Corporate Social Responsibility (CSR) adalah komitmen perseroan untuk berperan serta
                                dalam pembangunan ekonomi berkelanjutan guna meningkatkan kualitas kehidupan dan
                                lingkungan yang bermanfaat, balk bagi perseroan sendiri, komunitas setempat, maupun
                                masyarakat pada umumnya." />
                        </livewire:components.container>
                    </div>
                </div>
            </div>
        </livewire:components.container>
    </div>
    
    <div id="sektorCSR" class="pt-20 pb-5 text-white bg-dark">
        <livewire:components.container title="Sektor CSR" subtitle="Bidang sektor CSR Kabupaten Cirebon yang tersedia"
            class="text-base font-light" fontClass="pt-4">
            <div class="flex flex-wrap w-full">
                <div class="w-1/2 pt-10 px-14">

                    <!-- REUSABLE ACCORDION -->
                    <livewire:components.accordion-group groupModel="sektorGroup">
                        <livewire:components.according groupName="sosial" heading="Sosial" content="sosial" />
                        <livewire:components.according groupName="lingkungan" heading="Lingkungan"
                            content="lingkungan" />
                        <livewire:components.according groupName="lingkungan" heading="Lingkungan"
                            content="lingkungan" />
                        <livewire:components.according groupName="kesehatan" heading="Kesehatan" content="kesehatan" />
                        <livewire:components.according groupName="infrastruktur"
                            heading="Infrastruktur dan sanitasi lingkungan" content="infrastruktur" />
                        <livewire:components.according groupName="sarana" heading="Sarana dan prasarana keagamaan"
                            content="sarana" />
                        <livewire:components.according groupName="lainnya" heading="Lainnya" content="lainnya" />
                    </livewire:components.accordion-group>
                </div>
                <div class="relative w-1/2 py-10 px-14">
                    <div class="w-56 h-[215px] bg-primaryRed"></div>
                    <img src="{{ asset('images/bg-feature-airport.png') }}" class="absolute top-10 ml-7" width="300"
                        height="300" alt="">
                    <livewire:components.teks-csr />
                    <div class="flex gap-6 pt-4">
                        <x-mary-button label="Lihat program tersedia"
                            class="text-white border-none outline-none bg-secondaryRed hover:bg-secondaryRed hover:opacity-80" />
                        <x-mary-button label="Lihat realisasi program" class="text-white bg-transparent" />
                    </div>
                </div>
            </div>
        </livewire:components.container>
    </div>

    <div class="flex flex-wrap w-full py-24">
        <div id="SambutanBupati" class="w-full p-4 md:w-1/2">
            <livewire:components.container title="Sambutan Bupati" subtitle="Kabupaten Cirebon"
                fontClass="text-2xl md:text-3xl font-bold">
                <livewire:components.teks-bupati />
            </livewire:components.container>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex items-end justify-end h-full bg-gray-100">
                <img src="{{ asset('images/bg-bupati-cirebon.png') }}" width="530" height="530"
                    alt="Bupati Cirebon">
            </div>
        </div>
    </div>

    <div id="kegiatan">
        <livewire:components.container title="Kegiatan Terbaru" class="items-center">
            <div class="grid grid-cols-1 px-4 py-10 lg:px-24 md:px-12 lg:grid-cols-4 md:grid-cols-3 gap-7">
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-1.png"
                    description="testing" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-2.png"
                    description="testing" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-3.png"
                    description="testing" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-4.png"
                    description="testing" />

                <div class="flex items-center justify-center pt-6 col-span-full">
                    <x-mary-button label="Lihat semua kegiatan" class="btn-md btn-outline" />
                </div>
            </div>
        </livewire:components.container>
    </div>

    <div id="laporan" class="pt-32">
        <livewire:components.container title="Laporan Program" subtitle="Terbaru"
            fontClass="text-2xl md:text-3xl font-bold" class="items-center">
            <div class="grid grid-cols-1 px-4 py-10 lg:px-24 md:px-12 lg:grid-cols-4 md:grid-cols-3 gap-7">
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-1.png"
                    description="testing" name="Andri Sapulalung" avatar="avatar-1.png" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-2.png"
                    description="testing" name="Hesti Septian" avatar="avatar-2.png" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-3.png"
                    description="testing" name="Fera Pablo" avatar="avatar-3.png" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-4.png"
                    description="testing" name="Fera Pablo" avatar="avatar-3.png" />

                <div class="flex items-center justify-center pt-6 pb-10 col-span-full">
                    <x-mary-button label="Lihat semua laporan program" class="btn-md btn-outline" />
                </div>
            </div>
        </livewire:components.container>
    </div>
    
    <div id="faq" class="py-20 text-white bg-dark">
        <livewire:components.container title="Frequently Asked Question (FAQ)"
            subtitle="Pertanyaan yang sering muncul" fontClass="pt-5">
            <div class="flex flex-wrap w-full">
                <div class="w-1/2 pt-10 px-14">
                    <div class="px-10">

                        <!-- REUSABLE ACCORDION -->
                        <livewire:components.accordion-group groupModel="faqGroup">
                            <livewire:components.according groupName="csr" heading="Apa itu CSR?"
                                content="CSR adalah ..." />
                            <livewire:components.according groupName="csr"
                                heading="Mengapa CSR penting di Kabupaten Cirebon?" content="karena CSR ..." />
                            <livewire:components.according groupName="csr"
                                heading="Bagaimana cara perusahaan di Kabupaten Cirebon menjalankan program CSR?"
                                content="caranha adalah ..." />
                            <livewire:components.according groupName="csr"
                                heading="Apa saja contoh program CSR di Kabupaten Cirebon?"
                                content="contohnya adalah ..." />
                            <livewire:components.according groupName="csr"
                                heading="Bagaimana pemerintah Kabupaten Cirebon mendukung program CSR?"
                                content="caranya dengan ..." />
                        </livewire:components.accordion-group>
                    </div>
                </div>
                <div class="w-1/2 py-10 px-14">
                    <!-- MAKE THIS COMPONENT FROM TEKS FAQ SECTION! -->
                    <div class="pt-8">
                        <p class="text-sm">
                            CSR atau Corporate Social Responsibility adalah komitmen perusahaan untuk berkontribusi
                            dalam pembangunan berkelanjutan dengan cara memberikan dampak positif bagi masyarakat dan
                            lingkungan sekitar. Di kabupaten Cirebon, CSR dapat diwujudkan melalui berbagai program
                            seperti pendidikan, kesehatan, lingkungan, dan pemberdayaan masyarakat.
                        </p>
                    </div>

                </div>
            </div>
        </livewire:components.container>
    </div>

    <div class="flex flex-wrap w-full pt-10">
        <div id="contact" class="w-full p-4 md:w-1/2">
            <livewire:components.container title="Hubungi Kami"
                subtitle="hubungi kami melalui formulir di samping, atau melalui kontak di bawah"
                fontClass="pt-4 text-stone-500">
                <div class="px-20 py-8">
                    <livewire:components.contact-form icon="o-map-pin" title="Alamat"
                        content="Jl. Sunan Kalijaga No.7,Sumber, Kec. Sumber, Kabupaten Cirebon,
                        Jawa Barat 45611" />
                    <livewire:components.contact-form icon="o-phone" title="Phone"
                        content="(0231) 321197 atau (0231) 3211792" />
                    <livewire:components.contact-form icon="o-envelope" title="Email"
                        content="pemkab@cirebonkab.go.id" />
                </div>
            </livewire:components.container>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex items-start justify-center h-full p-16">
                <img src="{{ asset('images/bg-basemap.png') }}" width="400" height="400" alt="Map Cirebon">
            </div>
        </div>
    </div>

    <livewire:components.footer />
</x-layouts.app>
