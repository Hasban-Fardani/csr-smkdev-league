<x-filament-panels::page>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white rounded-xl p-6">
            <div class="flex flex-col items-center">
                <div class="w-48 h-48 bg-gray-200 rounded-lg overflow-hidden mb-4">
                    <img src="{{ auth()->user()->avatar ?? asset('path/to/default/avatar.png') }}" alt="Avatar" class="w-full h-full object-cover">
                </div>

            </div>
            <div class="flex flex-col space-y-4">
                {{ $this->form }}
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-8 bg-white py-4 px-6 rounded-lg">
            <a href="{{ route('filament.admin.pages.profile') }}" class="text-gray-500 border btn btn-outline">Kembali</a>
            <x-filament::button type="submit" class="bg-primary-red text-white">
                Simpan
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
