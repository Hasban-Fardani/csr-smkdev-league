<x-layouts.app>
    <div id="banner">
        <livewire:components.banner title="Pemkab Cirebon Terima Bantuan PJU Tematik Dari Bank BJB"
            subtitle="July 12, 2024" breadcrumbs="Kegiatan / Detail" position="center" />
    </div>

    <div id="detailActivity" class="px-40 pt-20 pb-10">
        <livewire:components.container>
            <div class="px-20">
                <p class="text-lg text-gray-500">KABUPATEN CIREBON Pemerintah Kabupaten Cirebon menerima bantuan
                    Corporate Social Responsibility (CSR) dari Bank BJB, berupa lampu penerangan jalan umum (PJU)
                    tematik.
                    <br>

                    <br>
                    Penyerahan bantuan ini dihadiri langsung oleh Penjabat (Pj) Bupati Cirebon, Drs H Wahyu Mijaya SH
                    MSi di Pendopo Bupati Cirebon, Jumat (12/7/2024).
                    <br>

                    <br>
                    "Kami berterima kasih kepada Ba BJB yang telah memberikan PJU untuk dipasang di beberapa titik di
                    wilayah Sumber, Kabupaten Cirebon," ujar Wahyu.
                    <br>

                    <br>
                    la menjelaskan, bahwa pemasangan PJU di kawasan Sumber, yang dekat dengan kantor pemerintahan, tidak
                    hanya akan memperindah lingkungan, tetapi juga dapat meningkatkan keselamatan masyarakat.
                    <br>

                    <br>
                    Langkah ini, menurut Wahyu, merupakan bagian dari upaya untuk menciptakan ruang publik yang lebih
                    aman dan nyaman Dengan penerangan yang baik, warga dapat beraktivitas dengan tenang, terutama di
                    malam hari.
                    <br>
                </p>
                <div class="flex flex-col my-10">
                    <img src="{{ asset('images/bg-activity.png') }}" alt="image activity">
                    <a href="https://www.figma.com/exit?url=https%3A%2F%2Fwww.pexels.com%2Fphoto%2Fphoto-of-woman-leaning-on-wooden-table-3182746%2F"
                        class="pt-3 text-sm text-gray-500">sumber gambar: <span class="underline">Pexels</span></a>
                </div>
                <p class="text-lg text-gray-500">
                    "Inisiatif ini menjadi langkah strategis bagi Kabupaten Cirebon, dalam meningkatkan kualitas
                    infrastruktur dan pelayanan publik," tambahnya.
                    <br>

                    <br>
                    Pemasangan PJU tematik ini ditargetkan mulai dilaksanakan pada Agustus 2024, Wahyu berharap,
                    fasilitas tersebut memberikan dampak positif bagi masyarakat.
                    <br>

                    <br>
                    "Kami sudah berkomitmen dalam menciptakan lingkungan yang lebih aman dan nyaman bagi masyarakat,"
                    katanya.
                    <br>

                    <br>
                    Kepala has Perhubungan Kabupaten Cirebon, Hilman Firmansyah ST menjelaskan,
                    bahwa PJU artistik ini akan dipasang di 33 titik setelah dilakukan survei dan pengecekan.
                    <br>

                    <br>
                    la mengungkapkan, bahwa saat ini, Kabupaten Cirebon masih kekurangan PJU. Dari total kebutuhan
                    sekitar 32 ribu titik, baru 16 ribu titik yang terpasang.
                    <br>

                    <br>
                    Hilman menekankan pentingnya upaya terus-menerus untuk memenuhi kebutuhan ini, termasuk mengajak
                    instansi lain, baik dari pemerintah maupun pihak swasta, untuk menyediakan CSR.
                    <br>

                    <br>
                    "Kalau lihat eksisting jalan itu kurang lebih 32 ribu titik, kekurangannya masih banyak. Idealnya
                    melakukan kolaborasi seperti itu," ujar Hilman (DISKOMINFO)

                </p>
                
                <div class="mt-16 divider"></div>
                
                <div class="flex flex-col">
                    <div>
                        <livewire:components.tags tag="Bank BJB" />
                        <livewire:components.tags tag="Cirebon" />
                        <livewire:components.tags tag="CSR" />
                        <livewire:components.tags tag="Kabupaten Cirebon" />
                        <livewire:components.tags tag="Pemkab Cirebon" />
                        <livewire:components.tags tag="PJ Bupati Cirebon" />
                        <livewire:components.tags tag="PJU Tematik" />
                        <livewire:components.tags tag="Wahyu Mijaya" />
                    </div>
                    <div class="flex justify-end mt-10">
                        <livewire:components.sosmed-container />
                    </div>
                </div>
            </div>
        </livewire:components.container>
    </div>

    <div class="px-28 divider"></div>

    <div id="kegiatan" class="px-8 pt-10 pb-20">
        <livewire:components.container title="Kegiatan Terbaru">
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

    <div class="flex flex-wrap w-full">
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
