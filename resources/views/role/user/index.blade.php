<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Airplane Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-700"> <!-- Ubah ke text-gray-700 untuk teks -->
                                @foreach ($tikets as $tiket)
                                    <div class="mx-4 mb-8 bg-white shadow-md rounded-lg overflow-hidden border border-gray-300"> <!-- Ubah ke bg-white dan border-gray-300 untuk latar belakang dan border -->
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <div class="px-6 py-4 bg-gray-200 rounded-lg shadow-lg"> <!-- Ubah ke bg-gray-200 untuk latar belakang -->
                                                <div class="font-bold text-xl mb-2 text-gray-800"> <!-- Ubah ke text-gray-800 untuk teks -->
                                                    {{ $tiket->no_penerbangan }}</div>Kode Penerbangan :
                                                <p class="text-gray-700 text-base">Nama Maskapai:
                                                    {{ $tiket->nama_maskapai }}</p> <!-- Ubah ke text-gray-700 untuk teks -->
                                                <p class="text-gray-700 text-base">Dari Bandara:
                                                    {{ $tiket->dari_bandara }}</p> <!-- Ubah ke text-gray-700 untuk teks -->
                                                <p class="text-gray-700 text-base">Tujuan Bandara:
                                                    {{ $tiket->tujuan_bandara }}</p> <!-- Ubah ke text-gray-700 untuk teks -->
                                            </div>
                                            <div class="px-6 py-4 bg-gray-200 rounded-lg shadow-lg"> <!-- Ubah ke bg-gray-200 untuk latar belakang -->
                                                <p class="text-gray-700 text-base">Tanggal Keberangkatan:
                                                    {{ $tiket->tanggal_keberangkatan }}</p> <!-- Ubah ke text-gray-700 untuk teks -->
                                                <p class="text-gray-700 text-base">Jam Pergi: {{ $tiket->jam_pergi }}
                                                </p> <!-- Ubah ke text-gray-700 untuk teks -->
                                                <p class="text-gray-700 text-base">Jam Sampai: {{ $tiket->jam_sampai }}
                                                </p> <!-- Ubah ke text-gray-700 untuk teks -->
                                                <p class="text-gray-700 text-base">Jumlah Kursi:
                                                    {{ $tiket->jumlah_kursi }}</p> <!-- Ubah ke text-gray-700 untuk teks -->
                                                <div class="font-bold text-xl mb-2 text-gray-800">IDR: {{ $tiket->price }}</div> <!-- Ubah ke text-gray-800 untuk teks -->
                                            </div>
                                        </div>

                                        <div class="px-6 py-4">
                                            <a href="{{ route('order.tiket', ['tiketId' => $tiket->id]) }}" class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Pilih Tiket
                                            </a>
                                        </div>


                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
