<x-layouts.app>
    <div id="banner">
        <livewire:components.banner :title="$sectors->name" subtitle="Program CSR Yang Sudah Berjalan Di Kabupaten Cirebon"
            breadcrumbs="Sektor / {{ $sectors->name }}" position="center" />
    </div>

    <div id="speech" class="px-8 py-20">
        <livewire:components.container>
            <div class="flex w-full gap-5 px-20">
                <div class="w-1/2">
                    <p class="text-sm text-gray-500">{{ $sectors->description }}</p>
                </div>
                <div class="w-1/2">
                    <!-- MAKE THIS TO OTHER COMPONENTS!! -->
                    <p class="text-sm text-gray-500">Corporate Social Responsibility (CSR) merupakan konsep di mana
                        perusahaan secara sadar
                        mengintegrasikan kepedulian sosial dan lingkungan ke dalam operasional bisnisnya. Ini melibatkan
                        tindakan sukarela yang memberikan manfaat bagi masyarakat, seperti program pendidikan,
                        kesehatan,
                        dan lingkungan, serta upaya untuk mengurangi dampak negatif terhadap lingkungan. CSR tidak hanya
                        mencerminkan tanggung jawab
                        perusahaan terhadap masyarakat, tetapi juga meningkatkan reputasi dan daya saing bisnis.
                    </p>
                </div>
            </div>
        </livewire:components.container>
    </div>

    <!-- TODO PROGRAM -->
    <div id="program" class="px-6">
        <livewire:components.container title="Program CSR" subtitle="Bidang program CSR Kabupaten Cirebon yang tersedia"
            fontClass="text-sm text-stone-500 mt-5">
            <div class="flex w-full gap-4">
                <div class="w-1/2">
                    @forelse ($programs as $program)
                        <x-mary-list-item :item="$programs" no-separator no-hover class="mx-20">
                            <x-slot:value>
                                {{ $program->name }}
                            </x-slot:value>
                            <x-slot:sub-value>
                                {{ $program->project_count }} proyek
                            </x-slot:sub-value>
                        </x-mary-list-item>
                    @empty
                        <h1>tidak ada data</h1>
                    @endforelse
                </div>
                <div class="w-1/2">
                    @forelse ($projects as $project)
                        <x-mary-list-item :item="$projects" no-separator no-hover class="mx-20">
                            <x-slot:value>
                                {{ $project->title }}
                            </x-slot:value>
                            <x-slot:sub-value>
                                {{ $project->subdistrict_name }}
                            </x-slot:sub-value>
                            <x-slot:actions>
                                <x-mary-button label="Lihat detail" icon="o-eye"
                                    class="text-white bg-secondaryRed btn-md hover:bg-secondaryRed hover:opacity-80"
                                    link="/project/{{ $project->id }}" spinner />
                            </x-slot:actions>
                        </x-mary-list-item>
                    @empty
                        <h1>tidak ada data</h1>
                    @endforelse
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
                <img src="{{ asset('storage/images/bg-basemap.png') }}" width="400" height="400" alt="Map Cirebon">
            </div>
        </div>
    </div>

    <livewire:components.footer />
</x-layouts.app>
