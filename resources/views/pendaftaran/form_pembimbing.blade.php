@extends('layouts.blank')

@section('content')
    <!-- Header -->
    <header class="bg-blue-600 py-6 px-6 text-center shadow-md">
        <h1 class="text-2xl font-bold text-white">PENDAFTARAN PKL 2025</h1>
        <p class="text-blue-100 text-sm mt-1">BBPPMPV BOE MALANG</p>
    </header>

    <!-- Main Content -->
    <main class="flex-1 px-6 py-8">
        <h2 class="text-xl font-semibold text-gray-800 text-center mb-8">
            FORM DATA PEMBIMBING
        </h2>

        <form action="{{ route('pembimbing.store') }}" method="POST" class="space-y-6 max-w-2xl mx-auto">
            @csrf

            <!-- Nama Pembimbing -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NAMA PEMBIMBING</label>
                <input type="text" name="nama_pembimbing"
                    value="{{ old('nama_pembimbing', $pendaftaran['pembimbing']['nama'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="Nama lengkap pembimbing" required>
            </div>

            <!-- No HP -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NO HP PEMBIMBING</label>
                <input type="tel" name="no_hp" value="{{ old('no_hp', $pendaftaran['pembimbing']['no_hp'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="08xxxxxxxxxx" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">EMAIL PEMBIMBING</label>
                <input type="email" name="email" value="{{ old('email', $pendaftaran['pembimbing']['email'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="email@contoh.com" required>
            </div>

            <!-- Jumlah Siswa -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">JUMLAH SISWA PKL</label>
                <input type="number" name="jumlah_siswa" min="1"
                    value="{{ old('jumlah_siswa', $pendaftaran['pembimbing']['jumlah_siswa'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="Masukkan jumlah siswa" required>
            </div>

            <!-- Button Group -->
            <div class="flex space-x-4 pt-4">
                <a href="{{ route('pendaftaran.form') }}"
                    class="cursor-pointer flex-1 py-2.5 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg text-center transition">
                    Kembali
                </a>
                <button type="submit"
                    class="cursor-pointer flex-1 py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg flex items-center justify-center transition">
                    Lanjutkan <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </button>
            </div>
        </form>
    </main>
@endsection
