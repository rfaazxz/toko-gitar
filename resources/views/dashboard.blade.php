<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PPLG STORE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold text-indigo-600 mb-4">PPLG STORE</h3>

                    <!-- TUGAS 1 & TANTANGAN 1: Menampilkan Nama dan Email User -->
                    <div class="bg-gray-50 border border-gray-200 p-4 rounded-md mb-6">
                        <p class="text-lg text-gray-800 font-semibold mb-1">
                            Selamat datang, <span class="text-indigo-600">{{ Auth::user()->name }}</span>
                        </p>
                        <p class="text-sm text-gray-600">
                            <strong>Nama :</strong> {{ Auth::user()->name }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <strong>Email :</strong> {{ Auth::user()->email }}
                        </p>
                    </div>

                    <!-- Action Buttons: Kelola Produk & Logout -->
                    <div class="flex items-center space-x-4">
                        <!-- Tombol Kelola Produk -->
                        <a href="{{ route('produk.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kelola Produk
                        </a>

                        <!-- Tombol Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Logout
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>