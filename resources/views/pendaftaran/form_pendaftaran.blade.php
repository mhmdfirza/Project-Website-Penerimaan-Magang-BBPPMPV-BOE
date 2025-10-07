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

    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-6 max-w-2xl mx-auto">
        @csrf

        <!-- Asal Sekolah -->
        <div class="relative">
            <label class="block text-lg font-medium text-gray-700 mb-1">ASAL SEKOLAH</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah"
                value="{{ old('asal_sekolah', $pendaftaran['asal_sekolah'] ?? '') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                placeholder="Nama sekolah" required autocomplete="off">

            <input type="hidden" name="npsn_sekolah" id="npsn_sekolah"
                value="{{ old('npsn_sekolah', $pendaftaran['npsn_sekolah'] ?? '') }}">

            <div id="suggestions" class="border border-gray-300 mt-1 rounded-lg bg-white absolute z-10 w-full 
            max-h-48 overflow-y-auto shadow-md hidden">
            </div>

            <p id="asal_sekolah_error" class="text-red-500 text-sm mt-1 hidden">Harap pilih sekolah dari daftar.</p>
        </div>

        <!-- Department -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">DEPARTMENT</label>
            <select name="id_departemen" id="id_departemen"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                required>
                <option value="" disabled selected>Pilih department</option>
                @foreach ($departemen as $dept)
                <option value="{{ $dept->id_departemen }}">
                    {{ $dept->nama_departemen }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Program Keahlian -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">PROGRAM KEAHLIAN</label>
            <select name="id_progli" id="id_progli"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                required>
                <option value="" disabled selected>Pilih program keahlian</option>
            </select>
        </div>

        {{-- Periode PKL --}}
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL MULAI</label>
                <input type="date" id="tgl_mulai" name="tgl_mulai" value="{{ old('tgl_mulai') }}"
                    required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="Kota/Kabupaten">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL SELESAI</label>
                <input type="date" id="tgl_selesai" name="tgl_selesai"
                    value="{{ old('tgl_selesai') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                          focus:border-blue-500 outline-none transition">
            </div>
        </div>

        {{-- Surat Pengajuan --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">SURAT PENGAJUAN</label>
            <input type="file" id="surat_pengajuan" name="surat_pengajuan" accept="image/*,application/pdf" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0 file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100"
                        @if (!empty($pendaftaran['surat_pengajuan'])) data-has-file="true" @endif>
            <p id="surat_pengajuan_error" class="text-red-500 text-sm mt-1 hidden"></p>
            <p class="text-gray-500 text-sm mt-1">File maksimal 2MB. Format: JPEG, PNG, JPG, atau PDF.</p>

            <div id="preview_surat_pengajuan" class="mt-3">
                {{-- Preview dari session --}}
                @if (!empty($pendaftaran['surat_pengajuan']))
                    @php
                        $ext = pathinfo($pendaftaran['surat_pengajuan'], PATHINFO_EXTENSION);
                    @endphp
                    <p class="text-sm text-green-600 mb-2">✓ File sudah diupload</p>
                    
                    @if (in_array($ext, ['jpg','jpeg','png']))
                        <img src="{{ Storage::url($pendaftaran['surat_pengajuan']) }}" 
                            alt="Surat Pengajuan" class="w-40 border rounded mt-2">
                    @elseif ($ext === 'pdf')
                        <a href="{{ Storage::url($pendaftaran['surat_pengajuan']) }}" 
                        target="_blank" class="text-blue-600 underline mt-2 inline-block">
                        Lihat File PDF
                        </a>
                    @endif
                @endif
            </div>
        </div>


        <!-- Button Group -->
        <div class="flex space-x-4 pt-4">
            <a href="{{ route('pendaftaran.cancel') }}"
                class="cursor-pointer flex-1 py-2.5 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg text-center transition">
                Batal
            </a>
            <button type="submit"
                class=" cursor-pointer flex-1 py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg flex items-center justify-center transition">
                Lanjutkan <i class="fas fa-arrow-right ml-2 text-sm"></i>
            </button>
        </div>
    </form>
</main>
@endsection


@push('scripts')
<script>
    const inputSekolah = document.getElementById('asal_sekolah');
    const suggestions = document.getElementById('suggestions');
    const hiddenNpsn = document.getElementById('npsn_sekolah');
    const errorMsgSekolah = document.getElementById('asal_sekolah_error');

    const inputSurat = document.getElementById('surat_pengajuan');
    const errorMsgSurat = document.getElementById('surat_pengajuan_error');



    // validasi tanggal
    document.addEventListener("DOMContentLoaded", function () {
        const tglMulai = document.getElementById("tgl_mulai");
        const tglSelesai = document.getElementById("tgl_selesai");
            tglMulai.addEventListener("change", function () {
                let startDate = new Date(this.value);
                startDate.setDate(startDate.getDate() + 1); // tambah 1 hari

                let minDate = startDate.toISOString().split("T")[0];
                tglSelesai.min = minDate;
            });
    });



    inputSekolah.addEventListener('keyup', function () {
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
        inputSekolah.value = nama;
        hiddenNpsn.value = npsn;
        suggestions.innerHTML = '';
        suggestions.classList.add('hidden');
        errorMsgSekolah.classList.add('hidden');
    }

    // klik di luar untuk menutup suggestion
    document.addEventListener('click', function (e) {
        if (!inputSekolah.contains(e.target)) {
            suggestions.innerHTML = '';
            suggestions.classList.add('hidden');
        }
    });


    // Ambil progli sesuai pilihan departemen
    document.getElementById('id_departemen').addEventListener('change', function () {
        const deptId = this.value;
        const progliSelect = document.getElementById('id_progli');

        progliSelect.innerHTML = '<option value="" disabled selected>Loading...</option>';

        fetch(`/get-progli/${deptId}`)
            .then(response => response.json())
            .then(data => {
                let options = '<option value="" disabled selected>Pilih program keahlian</option>';
                data.forEach(item => {
                    options += `<option value="${item.id_progli}">${item.nama_progli}</option>`;
                });
                progliSelect.innerHTML = options;
            })
            .catch(() => {
                progliSelect.innerHTML = '<option value="" disabled selected>Gagal memuat data</option>';
            });
    });


    document.getElementById('surat_pengajuan').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('preview_surat_pengajuan');
        const errorElement = document.getElementById('surat_pengajuan_error');
        
        // Reset state
        previewContainer.innerHTML = '';
        errorElement.classList.add('hidden');
        
        if (!file) return;

        // Validasi client-side
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
        const maxSize = 2 * 1024 * 1024; // 2MB

        if (!validTypes.includes(file.type)) {
            errorElement.textContent = 'Format file tidak didukung. Gunakan JPEG, PNG, JPG, atau PDF.';
            errorElement.classList.remove('hidden');
            return;
        }

        if (file.size > maxSize) {
            errorElement.textContent = 'Ukuran file melebihi 2MB.';
            errorElement.classList.remove('hidden');
            return;
        }

        // Show loading
        previewContainer.innerHTML = '<p class="text-blue-500 text-sm">Mengupload file...</p>';

        const formData = new FormData();
        formData.append('surat_pengajuan', file);

        fetch("{{ route('pendaftaran.uploadSurat') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                previewContainer.innerHTML = '';
                const ext = data.extension.toLowerCase();

                if (['jpg', 'jpeg', 'png'].includes(ext)) {
                    const img = document.createElement('img');
                    img.src = data.path;
                    img.alt = 'Preview Surat Pengajuan';
                    img.className = 'w-40 border rounded mt-2';
                    previewContainer.appendChild(img);
                } else if (ext === 'pdf') {
                    const link = document.createElement('a');
                    link.href = data.path;
                    link.target = '_blank';
                    link.className = 'text-blue-600 underline mt-2 inline-block';
                    link.textContent = 'Lihat File PDF (' + data.filename + ')';
                    previewContainer.appendChild(link);
                }
                
                // Tambahkan info file berhasil diupload
                const successMsg = document.createElement('p');
                successMsg.className = 'text-green-500 text-sm mt-1';
                successMsg.textContent = 'File berhasil diupload!';
                previewContainer.appendChild(successMsg);
                
            } else {
                errorElement.textContent = data.message || 'Gagal upload file.';
                errorElement.classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorElement.textContent = 'Terjadi kesalahan saat upload.';
            errorElement.classList.remove('hidden');
        });
    });
    


    // 🚀 Validasi sebelum submit
    const form = document.querySelector("form");
    form.addEventListener("submit", function (e) {
        let valid = true;

        // Validasi sekolah
        if (hiddenNpsn.value === "") {
            errorMsgSekolah.classList.remove('hidden'); 
            inputSekolah.classList.add("border-red-500", "focus:ring-red-500"); 
            inputSekolah.focus();
            valid = false;
        } else {
            errorMsgSekolah.classList.add('hidden'); 
            inputSekolah.classList.remove("border-red-500", "focus:ring-red-500");
        }


    // Validasi surat pengajuan (file wajib jika belum ada, max 2MB)
    if (inputSurat) {
        const hasFile = inputSurat.dataset.hasFile === "true";

        if (inputSurat.files.length === 0) {
            if (!hasFile) {
                // Jika belum ada file lama dan belum upload baru
                errorMsgSurat.textContent = "Surat pengajuan wajib diunggah.";
                errorMsgSurat.classList.remove('hidden');
                inputSurat.focus();
                valid = false;
            } else {
                // Jika sudah ada file lama, lanjut saja
                errorMsgSurat.classList.add('hidden');
            }
        } else {
            const file = inputSurat.files[0];
            if (file.size > 2 * 1024 * 1024) {
                errorMsgSurat.textContent = "Ukuran file maksimal 2 MB.";
                errorMsgSurat.classList.remove('hidden');
                inputSurat.focus();
                valid = false;
            } else {
                errorMsgSurat.classList.add('hidden');
            }
        }
    }



        // Jika ada error lain, mencegah submit
        if (!valid) {
            e.preventDefault();
        }
    });

</script>
@endpush