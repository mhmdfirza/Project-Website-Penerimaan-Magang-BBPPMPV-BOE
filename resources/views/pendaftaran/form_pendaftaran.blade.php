@extends('layouts.app')

@section('title', 'Pendaftaran PKL 2025 - BBPPMPV BOE Malang')

@section('content')
    <!-- Header -->
    <header class="bg-blue-600 py-6 px-6 text-center shadow-md rounded-lg mb-8">
        <h1 class="text-2xl font-bold text-white">PENDAFTARAN PKL 2025</h1>
        <p class="text-blue-100 text-sm mt-1">BBPPMPV BOE MALANG</p>
    </header>

    <!-- Main Content -->
    <main class="flex-1 px-6 py-8">
        <h2 class="text-xl font-semibold text-gray-800 text-center mb-8">
            FORM PENGAJUAN PKL
        </h2>

        <form action="{{ route('pendaftaran.store') }}" method="POST" class="space-y-6 max-w-2xl mx-auto">
            @csrf

            <!-- Asal Sekolah -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">ASAL SEKOLAH</label>
                <input type="text" name="asal_sekolah"
                    value="{{ old('asal_sekolah', $pendaftaran['asal_sekolah'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    placeholder="Nama sekolah" required>
            </div>

            <!-- Department -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">DEPARTMENT</label>
                <select name="id_departemen"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    required>
                    <option value="" disabled {{ empty($pendaftaran['id_departemen']) ? 'selected' : '' }}>
                        Pilih department
                    </option>
                    @foreach ($departments as $dept)
                        <option value="{{ $dept->id_departemen }}"
                            {{ old('id_departemen', $pendaftaran['id_departemen'] ?? '') == $dept->id_departemen ? 'selected' : '' }}>
                            {{ $dept->nama_departemen }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Program Keahlian -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">PROGRAM KEAHLIAN</label>
                <select name="id_progli"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                    required>
                    <option value="" disabled {{ empty($pendaftaran['id_progli']) ? 'selected' : '' }}>
                        Pilih program keahlian
                    </option>
                    @foreach ($proglis as $prog)
                        <option value="{{ $prog->id_progli }}"
                            {{ old('id_progli', $pendaftaran['id_progli'] ?? '') == $prog->id_progli ? 'selected' : '' }}>
                            {{ $prog->nama_progli }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Button Group -->
            <div class="flex space-x-4 pt-4">
                <a href="{{ route('pendaftaran.cancel') }}"
                    class="flex-1 py-2.5 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg text-center transition">
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg flex items-center justify-center transition">
                    Lanjutkan <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </button>
            </div>
        </form>
    </main>
@endsection
