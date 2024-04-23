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
                        <div class=overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-700">
                                @php
                                    $user_id = Auth::id();
                                    $user_tickets = $tikets->where('id_user', $user_id);
                                @endphp

                                @foreach ($user_tickets as $tiket)
                                    <div
                                        class="mx-4 mb-8 bg-gray-800 shadow-md rounded-lg overflow-hidden border border-gray-300">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                            <div class="px-6 py-4 bg-gray-200 rounded-lg shadow-lg">
                                                <div class="font-bold text-xl mb-2 text-white">Kode Penerbangan :
                                                    {{ $tiket->no_penerbangan }}</div>
                                                <p class="text-gray-300 text-base">Nama Maskapai:
                                                    {{ $tiket->nama_maskapai }}</p>
                                                <p class="text-gray-300 text-base">Dari Bandara:
                                                    {{ $tiket->dari_bandara }}</p>
                                                <p class="text-gray-300 text-base">Tujuan Bandara:
                                                    {{ $tiket->tujuan_bandara }}</p>
                                            </div>
                                            <div class="px-6 py-4 bg-gray-200 rounded-lg shadow-lg">
                                                <p class="text-gray-300 text-base">Tanggal Keberangkatan:
                                                    {{ $tiket->tanggal_keberangkatan }}</p>
                                                <p class="text-gray-300 text-base">Jam Pergi: {{ $tiket->jam_pergi }}
                                                </p>
                                                <p class="text-gray-300 text-base">Jam Sampai: {{ $tiket->jam_sampai }}
                                                </p>
                                                <p class="text-gray-300 text-base">Jumlah Kursi:
                                                    {{ $tiket->jumlah_kursi }}</p>
                                                <p class="text-gray-300 text-base">Harga: {{ $tiket->price }}</p>
                                            </div>
                                        </div>

                                        <div class="px-6 py-4">
                                            <button href="#" class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </button>
                                            <button onclick="hapusTiket({{ $tiket->id }})" class="block w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
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
    </div>

</x-app-layout>
