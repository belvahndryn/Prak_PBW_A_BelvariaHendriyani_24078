<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontak') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <div class="site-name text-xs font-semibold tracking-widest text-gray-500 uppercase pb-2 border-b border-gray-200 mb-6">
                    LaraPress
                </div>

                <h1 class="text-3xl font-bold text-gray-800 mb-4">Hubungi Kami</h1>
                <p class="text-gray-600 leading-relaxed text-lg mb-6">
                    Silakan hubungi kami melalui email atau media sosial jika ada pertanyaan mengenai proyek ini.
                </p>

                <div class="pt-4 border-t border-gray-200 flex gap-4 text-sm font-medium">
                    <a href="{{ route('dashboard') }}" class="text-indigo-600 hover:text-indigo-900 underline">Kembali ke Dashboard</a>
                    <a href="{{ url('/tentang-kami') }}" class="text-indigo-600 hover:text-indigo-900 underline">Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>