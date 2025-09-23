@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="bg-blue-600 py-6 px-6 text-center shadow-md">
        <h1 class="text-2xl font-bold text-white">PENDAFTARAN PKL 2025</h1>
        <p class="text-blue-100 text-sm mt-1">BBPPMPV BOE MALANG</p>
    </header>

    <!-- Main Content -->
    <main class="flex-1 px-6 py-8">
        <h2 class="text-xl font-semibold text-gray-800 text-center mb-8">
            FORM DATA SISWA
        </h2>

        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-10 max-w-3xl mx-auto">
            @csrf

            @for ($i = 0; $i < $jumlah_siswa; $i++)
                <div class="bg-white shadow-md rounded-lg p-6 space-y-6 border border-gray-200">
                    <h3 class="text-lg font-semibold text-blue-600 mb-4">
                        Siswa ke-{{ $i + 1 }}
                    </h3>

                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NAMA LENGKAP</label>
                        <input type="text" name="siswa[{{ $i }}][nama]"
                            value="{{ old('siswa.' . $i . '.nama') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                      focus:border-blue-500 outline-none transition"
                            placeholder="Nama lengkap siswa">
                    </div>

                    <!-- NISN -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NISN</label>
                        <input type="text" name="siswa[{{ $i }}][nisn]"
                            value="{{ old('siswa.' . $i . '.nisn') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                      focus:border-blue-500 outline-none transition"
                            placeholder="Masukkan NISN">
                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">TEMPAT LAHIR</label>
                            <input type="text" name="siswa[{{ $i }}][tempat_lahir]"
                                value="{{ old('siswa.' . $i . '.tempat_lahir') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                          focus:border-blue-500 outline-none transition"
                                placeholder="Kota/Kabupaten">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL LAHIR</label>
                            <input type="date" name="siswa[{{ $i }}][tanggal_lahir]"
                                value="{{ old('siswa.' . $i . '.tanggal_lahir') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                          focus:border-blue-500 outline-none transition">
                        </div>
                    </div>

                    <!-- Agama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">AGAMA</label>
                        <select name="siswa[{{ $i }}][agama]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                       focus:border-blue-500 outline-none transition">
                            <option value="">-- Pilih Agama --</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                    </div>

                    <!-- Kelas/Jurusan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">KELAS / JURUSAN</label>
                        <input type="text" name="siswa[{{ $i }}][kelas]"
                            value="{{ old('siswa.' . $i . '.kelas') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                      focus:border-blue-500 outline-none transition"
                            placeholder="Contoh: XII RPL / XI TKJ">
                    </div>

                    <!-- No HP -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NO HP</label>
                        <input type="tel" name="siswa[{{ $i }}][no_hp]"
                            value="{{ old('siswa.' . $i . '.no_hp') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                      focus:border-blue-500 outline-none transition"
                            placeholder="08xxxxxxxxxx">
                    </div>

                    <!-- Foto -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">FOTO SISWA</label>
                        <input type="file" name="siswa[{{ $i }}][foto]" accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0 file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                    </div>

                    <!-- Alamat Rumah -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ALAMAT RUMAH</label>
                        <textarea name="siswa[{{ $i }}][alamat_rumah]" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                         focus:border-blue-500 outline-none transition"
                            placeholder="Alamat lengkap rumah">{{ old('siswa.' . $i . '.alamat_rumah') }}</textarea>
                    </div>

                    <!-- Alamat Kos -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ALAMAT KOS (Opsional)</label>
                        <textarea name="siswa[{{ $i }}][alamat_kos]" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                         focus:border-blue-500 outline-none transition"
                            placeholder="Alamat kos (jika ada)">{{ old('siswa.' . $i . '.alamat_kos') }}</textarea>
                    </div>
                </div>
            @endfor

            <!-- Button Group -->
            <div class="flex space-x-4 pt-4">
                <a href="{{ route('pembimbing.form') }}"
                    class="flex-1 py-2.5 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium
                          rounded-lg transition duration-300 text-center">
                    Kembali
                </a>

                <button type="submit"
                    class="flex-1 py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium
                               rounded-lg transition duration-300 flex items-center justify-center">
                    Kirim
                    <i class="fas fa-paper-plane ml-2 text-sm"></i>
                </button>
            </div>
        </form>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 py-4 px-6 text-center border-t">
        <p class="text-xs text-gray-600">BBPPMPV BOE Malang &copy; 2025</p>
    </footer>
@endsection
