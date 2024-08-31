<x-layouts.app>
    <div id="banner">
        <livewire:components.banner title="Tentang" subtitle="Tentang CSR Kabupaten Cirebon" breadcrumbs="Tentang"
            position="top" />
    </div>

    <div id="about" class="px-8 py-20">
        <div class="flex flex-wrap w-full">
            <div class="w-1/2">
                <livewire:components.container title="Apa Itu" subtitle="Kegiatan CSR?"
                    fontClass="text-2xl md:text-3xl font-bold" />
            </div>
            <div class="w-1/2">
                <!-- MAKE THIS TO OTHER COMPONENTS!! -->
                <p class="text-sm text-gray-500">Corporate Social Responsibility (CSR) merupakan konsep di mana
                    perusahaan secara sadar
                    mengintegrasikan kepedulian sosial dan lingkungan ke dalam operasional bisnisnya. Ini melibatkan
                    tindakan sukarela yang memberikan manfaat bagi masyarakat, seperti program pendidikan, kesehatan,
                    dan lingkungan, serta upaya untuk mengurangi dampak negatif terhadap lingkungan. CSR tidak hanya
                    mencerminkan tanggung jawab
                    perusahaan terhadap masyarakat, tetapi juga meningkatkan reputasi dan daya saing bisnis.
                </p>
            </div>
        </div>
        <div class="px-20 pt-10 text-sm text-gray-500">
            <!-- MAKE THIS TO OTHER COMPONENTS!! -->
            <p>Berdasarkan Undang-Undang nomor 40 Tahun 2007 tentang Perseroan Terbatas (UUPT) pasal 1 ayat 3,
                pengertian Tanggung Jawab Sosial dan Lingkungan Perusahaan (TJSLP) atau Corporate Social Responsibility
                (CSR)
                adalah komitmen perseroan untuk berperan serta dalam pembangunan ekonomi berkelanjutan guna meningkatkan
                kualitas kehidupan dan lingkungan
                yang bermanfaat, baik bagi perseroan sendiri, komunitas setempat, maupun masyarakat pada umumnya.
            </p>
        </div>
    </div>

    <div id="goverment">
        <div class="flex flex-wrap w-full px-10 pt-12 md:pt-24">
            <div class="w-full md:w-1/2">
                @php
                    $images = ['bg-kepala-daerah-4.png', 'bg-kepala-daerah-6.png', 'bg-kepala-daerah-5.png'];
                @endphp
                <livewire:components.image-custom-grid :images="$images" />
            </div>
            <div class="w-full md:w-1/2">
                <livewire:components.container title="Tujuan" class="items-start">
                    <livewire:components.about-csr
                        content="Maksud pemerintah kabupaten dalam Corporate Social Responsibility (CSR) adalah untuk
                    menciptakan sinergi yang kuat antara pemerintah, perusahaan, dan masyarakat. Tujuan utama dari upaya ini adalah untuk mendorong pembangunan
                    berkelanjutan di wilayah kabupaten. Dengan melibatkan perusahaan dalam program CSR, diharapkan dapat tercipta solusi komprehensif bagi berbagai
                    permasalahan sosial dan lingkungan, sehingga kesejahteraan masyarakat dapat meningkat secara signifikan." />
                </livewire:components.container>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap w-full py-24">
        <div id="SambutanBupati" class="w-full p-4 md:w-1/2">
            <livewire:components.container title="Manfaat">
                <livewire:components.about-csr
                    content="Pemerintah kabupaten memperoleh banyak manfaat dari pelaksanaan
                CSR. Salah satu manfaat utama adalah percepatan pembangunan di berbagai
                sektor. Dengan adanya dukungan dana dan sumber daya dari perusahaan, pemerintah
                dapat lebih cepat mewujudkan program-program pembangunan yang telah direncanakan,
                seperti pembangunan infrastruktur, peningkatan kualitas pendidikan dan kesehatan,
                serta pengembangan ekonomi masyarakat." />
            </livewire:components.container>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex items-end justify-end h-full bg-gray-100">
                <img src="{{ asset('storage/images/bg-bulding-1.png') }}" width="450" height="400"
                    alt="Building Cirebon">
            </div>
        </div>
    </div>

    <div id="laporan" class="py-20">
        <livewire:components.container title="Laporan Program" subtitle="Terbaru"
            fontClass="text-2xl md:text-3xl font-bold" class="items-center">
            <div class="grid grid-cols-1 px-4 py-10 lg:px-24 md:px-12 lg:grid-cols-4 md:grid-cols-3 gap-7">
                @forelse ($reports as $report)
                    <livewire:components.card-with-button :title="$report->title" :images="$report->files[0]" :description="$report->description"
                        name="admin" avatar="avatars/avatar-1.png" :date="$report->realization_date" />
                @empty
                    <h1>tidak ada data</h1>
                @endforelse

                <div class="flex items-center justify-center pt-6 pb-10 col-span-full">
                    <x-mary-button label="Lihat semua laporan program" class="btn-md btn-outline" link="/report" />
                </div>
            </div>
        </livewire:components.container>
    </div>

    <div class="flex flex-wrap w-full pb-32">
        <div id="SambutanBupati" class="w-full p-4 md:w-1/2">
            <livewire:components.container title="Sambutan Bupati" subtitle="Kabupaten Cirebon"
                fontClass="text-2xl md:text-3xl font-bold">
                <livewire:components.teks-bupati />
            </livewire:components.container>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex items-end justify-end h-full bg-gray-100">
                <img src="{{ asset('storage/images/bg-bupati-cirebon.png') }}" width="530" height="530"
                    alt="Bupati Cirebon">
            </div>
        </div>
    </div>

    <div id="panduan" class="py-20 text-white bg-dark">
        <livewire:components.container title="Panduan" subtitle="Bagaimana proses CSR berlangsung" class="items-center"
            fontClass="text-base mt-5">
            <livewire:components.steps />
            <div class="flex justify-center w-full mt-8">
                <x-mary-button label="Ajukan surat rekomendasi CSR"
                    class="text-white border-none bg-secondaryRed hover:bg-secondaryRed hover:opacity-80" responsive />
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
                <img src="{{ asset('storage/images/bg-basemap.png') }}" width="400" height="400" alt="Map Cirebon">
            </div>
        </div>
    </div>

    <livewire:components.footer />
</x-layouts.app>
