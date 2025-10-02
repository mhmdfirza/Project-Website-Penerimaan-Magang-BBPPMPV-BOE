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
        <div class="relative">
            <label class="block text-lg font-medium text-gray-700 mb-1">ASAL SEKOLAH</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah"
                value="{{ old('asal_sekolah', $pendaftaran['asal_sekolah'] ?? '') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                placeholder="Nama sekolah" required autocomplete="off">

            <input type="hidden" name="npsn_sekolah" id="npsn_sekolah" value="{{ old('npsn_sekolah', $pendaftaran['npsn_sekolah'] ?? '') }}">

            <div id="suggestions" class="border border-gray-300 mt-1 rounded-lg bg-white absolute z-10 w-full 
            max-h-48 overflow-y-auto shadow-md">
            <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Sekolah A</div>
    <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Sekolah B</div>
    <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Sekolah C</div>
    <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Sekolah D</div>
    <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Sekolah E</div>
    <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Sekolah F</div>
    <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Sekolah G</div>
    <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Sekolah H</div>
</div>

             <p id="asal_sekolah_error" class="text-red-500 text-sm mt-1 hidden">Harap pilih sekolah dari daftar.</p>
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
                    @foreach ($departemen as $dept)
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
                    @foreach ($progli as $prog)
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


@push('scripts')
<script>
const input = document.getElementById('asal_sekolah');
const suggestions = document.getElementById('suggestions');
const hiddenNpsn = document.getElementById('npsn_sekolah');
const errorMsg = document.getElementById('asal_sekolah_error');

input.addEventListener('keyup', function() {
    const query = this.value;

    // Reset hidden input saat user ketik manual
    hiddenNpsn.value = '';

    if (query.length < 2) {
        suggestions.innerHTML = '';
        suggestions.classList.add('hidden');
        return;
    }

    fetch(`/search-sekolah?q=${query}`)
        .then(res => res.json())
        .then(data => {
            let html = '';
            data.forEach(item => {
                html += `<div class="px-3 py-2 hover:bg-gray-200 cursor-pointer" 
                             data-npsn="${item.npsn}" 
                             onclick="selectSchool('${item.nama}', '${item.npsn}')">
                            ${item.nama}
                         </div>`;
            });
            suggestions.innerHTML = html;
            suggestions.classList.remove('hidden');
        });
});

function selectSchool(nama, npsn) {
    input.value = nama;
    hiddenNpsn.value = npsn; 
    suggestions.innerHTML = '';
    suggestions.classList.add('hidden');
    errorMsg.classList.add('hidden'); // sembunyikan error kalau sudah pilih
}

// klik di luar untuk menutup suggestion
document.addEventListener('click', function(e) {
    if (!input.contains(e.target)) {
        suggestions.innerHTML = '';
        suggestions.classList.add('hidden');
    }
});

// 🚀 Validasi sebelum submit
const form = document.querySelector("form");
form.addEventListener("submit", function (e) {
    if (hiddenNpsn.value === "") {
        e.preventDefault(); 
        errorMsg.classList.remove('hidden'); // tampilkan pesan error
        input.classList.add("border-red-500", "focus:ring-red-500"); // kasih highlight merah
        input.focus();
    } else {
        errorMsg.classList.add('hidden'); // sembunyikan error jika valid
        input.classList.remove("border-red-500", "focus:ring-red-500");
    }
});
</script>
@endpush