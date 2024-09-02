<footer class="w-full px-20 py-10 text-white bg-dark">
    <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
        <div class="flex flex-col gap-3">
            <p class="text-sm">&#169; 2024 Corporate Social Responsibility Kabupaten Cirebon</p>
            <p class="text-sm">Pemkab Kabupaten Cirebon, Badan Pendapatan Daerah (Bapenda) Kabupaten Cirebon.</p>
        </div>
        @auth
            @can('admin')
                <x-mary-button label="Kembali Halaman Utama" class="text-white btn-md btn-outline" />
            @endcan
        @else
            <x-mary-button label="Masuk sebagai mitra" class="text-white btn-md btn-outline" link="/partner" />
        @endauth
    </div>
</footer>
