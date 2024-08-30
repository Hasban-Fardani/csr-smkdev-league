<x-filament-panels::page>
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-start space-x-6">
            <div class="w-48 h-48 bg-gray-200 rounded-lg overflow-hidden">
                <img src="{{ asset(auth()->user()->avatar)  ?? asset('path/to/default/avatar.png') }}" alt="Avatar" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
                <h3 class="text-xl font-semibold mb-2">{{ auth()->user()->name }}</h3>
                <p class="text-gray-600 mb-2">{{ auth()->user()->email }}</p>
                <p class="text-gray-700">
                    {{ auth()->user()->bio ?? 'Belum ada deskripsi profil.' }}
                </p>
            </div>
        </div>
    </div>
</x-filament-panels::page>