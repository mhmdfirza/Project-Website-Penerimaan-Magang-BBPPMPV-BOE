@extends('layouts.blank')
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
                <option value="" disabled {{ empty($pendaftaran['id_departemen']) ? 'selected' : '' }}>Pilih department</option>
                @foreach ($departemen as $dept)
                <option value="{{ $dept->id_departemen }}" 
                    {{ ($pendaftaran['id_departemen'] ?? '') == $dept->id_departemen ? 'selected' : '' }}>
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
                <option value="" disabled {{ empty($pendaftaran['id_progli']) ? 'selected' : '' }}>Pilih program keahlian</option>
            </select>
        </div>

        <!-- Periode PKL -->
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL MULAI</label>
                <input type="date" id="tgl_mulai" name="tgl_mulai" 
                    value="{{ old('tgl_mulai', $pendaftaran['tgl_mulai'] ?? '') }}"
                    required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2
                                focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL SELESAI</label>
                <input type="date" id="tgl_selesai" name="tgl_selesai"
                    value="{{ old('tgl_selesai', $pendaftaran['tgl_selesai'] ?? '') }}" 
                    required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 
                                focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>
        </div>

        <!-- Surat Pengajuan -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">SURAT PENGAJUAN</label>
            <input type="file" id="surat_pengajuan" name="surat_pengajuan" accept="image/*,application/pdf" 
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0 file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100"
                @if (!empty($pendaftaran['surat_pengajuan'])) data-has-file="true" @endif>
            
            <p id="surat_pengajuan_error" class="text-red-500 text-sm mt-1 hidden"></p>
            <p class="text-gray-500 text-sm mt-1">File maksimal 2MB. Format: JPEG, PNG, JPG, atau PDF.</p>

            <!-- Preview Area -->
            <div id="preview_surat_pengajuan" class="mt-3">
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
                class="cursor-pointer flex-1 py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg flex items-center justify-center transition">
                Lanjutkan <i class="fas fa-arrow-right ml-2 text-sm"></i>
            </button>
        </div>
    </form>
</main>

<script>

// =============================================
// DEKLARASI VARIABEL
// =============================================
const inputSekolah = document.getElementById('asal_sekolah');
const suggestions = document.getElementById('suggestions');
const hiddenNpsn = document.getElementById('npsn_sekolah');
const errorMsgSekolah = document.getElementById('asal_sekolah_error');

const tglMulai = document.getElementById("tgl_mulai");
const tglSelesai = document.getElementById("tgl_selesai");

const inputSurat = document.getElementById('surat_pengajuan');
const errorMsgSurat = document.getElementById('surat_pengajuan_error');

const form = document.querySelector("form");




// =============================================
// FUNGSI BANTUAN (HELPER FUNCTIONS)
// =============================================
function showError(errorElement, message, inputElement = null) {
    if (errorElement) {
        errorElement.textContent = message;
        errorElement.classList.remove("hidden");
    }
    if (inputElement) {
        inputElement.classList.add("border-red-500");
    }
}

function hideError(errorElement, inputElement = null) {
    if (errorElement) {
        errorElement.classList.add("hidden");
    }
    if (inputElement) {
        inputElement.classList.remove("border-red-500");
    }
}

function showElement(element) {
    element.classList.remove("hidden");
}

function hideElement(element) {
    element.classList.add("hidden");
}


// =============================================
// FUNGSI SCHOOL SEARCH
// =============================================
function selectSchool(nama_sekolah, npsn) {
    inputSekolah.value = nama_sekolah;
    hiddenNpsn.value = npsn;
    suggestions.innerHTML = '';
    hideElement(suggestions);
    hideError(errorMsgSekolah);
}

function fillSchoolFromSession() {
    const asalSekolah = '{{ $pendaftaran["asal_sekolah"] ?? "" }}';
    const npsnSekolah = '{{ $pendaftaran["npsn_sekolah"] ?? "" }}';
    
    if (asalSekolah && npsnSekolah) {
        inputSekolah.value = asalSekolah;
        hiddenNpsn.value = npsnSekolah;
    }
}


// =============================================
// FUNGSI DEPARTMENT & PROGLI
// =============================================
function loadProgliFromSession() {
    const selectedDepartemen = '{{ $pendaftaran["id_departemen"] ?? "" }}';
    const selectedProgli = '{{ $pendaftaran["id_progli"] ?? "" }}';

    if (selectedDepartemen) {
        document.getElementById('id_departemen').value = selectedDepartemen;
        
        fetch(`/get-progli/${selectedDepartemen}`)
            .then(response => response.json())
            .then(progli => {
                const progliSelect = document.getElementById('id_progli');
                progliSelect.innerHTML = '<option value="" disabled>Pilih program keahlian</option>';
                
                progli.forEach(p => {
                    const option = document.createElement('option');
                    option.value = p.id_progli;
                    option.textContent = p.nama_progli;
                    option.selected = (p.id_progli == selectedProgli);
                    progliSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error loading progli:', error));
    }
}


// =============================================
// FUNGSI VALIDASI DATES
// =============================================
function validateDates() {
    const startDate = new Date(tglMulai.value);
    const endDate = new Date(tglSelesai.value);
    
    // Reset error states
    tglMulai.classList.remove('border-red-500');
    tglSelesai.classList.remove('border-red-500');
    hideDateError();
    
    // Validasi: Cek jika kedua tanggal terisi
    if (!tglMulai.value || !tglSelesai.value) {
        return true;
    }
    
    // Validasi: Tanggal selesai harus setelah tanggal mulai
    if (endDate <= startDate) {
        showDateError('Tanggal selesai harus setelah tanggal mulai');
        tglSelesai.classList.add('border-red-500');
        return false;
    }
    
    return true;
}

function showDateError(message) {
    let errorElement = document.getElementById('date-error');
    if (!errorElement) {
        errorElement = document.createElement('div');
        errorElement.id = 'date-error';
        errorElement.className = 'mt-2 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg';
        tglSelesai.parentNode.appendChild(errorElement);
    }
    errorElement.innerHTML = `<p class="text-sm font-medium">${message}</p>`;
    showElement(errorElement);
}

function hideDateError() {
    const errorElement = document.getElementById('date-error');
    if (errorElement) {
        hideElement(errorElement);
    }
}

function setMinEndDate() {
    if (tglMulai.value) {
        let startDate = new Date(tglMulai.value);
        startDate.setDate(startDate.getDate() + 1);
        
        let minDate = startDate.toISOString().split("T")[0];
        tglSelesai.min = minDate;
        
        if (tglSelesai.value && tglSelesai.value < minDate) {
            tglSelesai.value = '';
            hideDateError();
        }
    }
}

function fillDatesFromSession() {
    const sessionTglMulai = '{{ $pendaftaran["tgl_mulai"] ?? "" }}';
    const sessionTglSelesai = '{{ $pendaftaran["tgl_selesai"] ?? "" }}';
    
    if (sessionTglMulai) {
        tglMulai.value = sessionTglMulai;
        setMinEndDate();
    }
    
    if (sessionTglSelesai) {
        tglSelesai.value = sessionTglSelesai;
    }
    
    // Validasi jika kedua tanggal ada di session
    if (sessionTglMulai && sessionTglSelesai) {
        validateDates();
    }
}


// =============================================
// FUNGSI UPLOAD FILE
// =============================================
function handleFileUpload(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('preview_surat_pengajuan');
    
    // Reset state
    previewContainer.innerHTML = '';
    hideError(errorMsgSurat);
    
    if (!file) return;

    // Validasi
    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
    const maxSize = 2 * 1024 * 1024; // 2MB

    if (!validTypes.includes(file.type)) {
        showError(errorMsgSurat, 'Format file tidak didukung. Gunakan JPEG, PNG, JPG, atau PDF.');
        return;
    }

    if (file.size > maxSize) {
        showError(errorMsgSurat, 'Ukuran file melebihi 2MB.');
        return;
    }

    // loading
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
                link.textContent = 'Lihat File PDF';
                previewContainer.appendChild(link);
            }
            
            // Tambahkan info file berhasil diupload
            const successMsg = document.createElement('p');
            successMsg.className = 'text-green-500 text-sm mt-1';
            successMsg.textContent = 'File berhasil diupload!';
            previewContainer.appendChild(successMsg);
            
        } else {
            showError(errorMsgSurat, data.message || 'Gagal upload file.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showError(errorMsgSurat, 'Terjadi kesalahan saat upload.');
    });
}


// =============================================
// FUNGSI FORM VALIDATION 
// =============================================
function validateForm() {
    let valid = true;

    // Validasi sekolah
    if (hiddenNpsn.value === "") {
        showError(errorMsgSekolah, "Harap pilih sekolah dari daftar.", inputSekolah);
        inputSekolah.focus();
        valid = false;
    } else {
        hideError(errorMsgSekolah, inputSekolah);
    }

    // Validasi tanggal
    if (!validateDates()) {
        valid = false;
    }

    // Validasi surat pengajuan
    if (inputSurat) {
        const hasFile = inputSurat.dataset.hasFile === "true";

        if (inputSurat.files.length === 0) {
            if (!hasFile) {
                showError(errorMsgSurat, "Surat pengajuan wajib diunggah.", inputSurat);
                inputSurat.focus();
                valid = false;
            } else {
                hideError(errorMsgSurat, inputSurat);
            }
        } else {
            const file = inputSurat.files[0];
            if (file.size > 2 * 1024 * 1024) {
                showError(errorMsgSurat, "Ukuran file maksimal 2 MB.", inputSurat);
                inputSurat.focus();
                valid = false;
            } else {
                hideError(errorMsgSurat, inputSurat);
            }
        }
    }

    return valid;
}


// =============================================
// EVENT LISTENERS
// =============================================
document.addEventListener("DOMContentLoaded", function () {
    // Initialize session data
    fillSchoolFromSession();
    loadProgliFromSession();

    // Date event listeners
    tglMulai.addEventListener("change", function () {
        setMinEndDate();
        validateDates();
    });

    tglSelesai.addEventListener("change", function () {
        validateDates();
    });
});

// School search event listener
inputSekolah.addEventListener('keyup', function () {
    const query = this.value;

    hiddenNpsn.value = '';

    if (query.length < 2) {
        suggestions.innerHTML = '';
        hideElement(suggestions);
        return;
    }

    fetch(`/search-sekolah?q=${query}`)
        .then(res => res.json())
        .then(data => {
            let html = '';
            data.forEach(item => {
                html += `<div class="px-3 py-2 hover:bg-gray-200 cursor-pointer" 
                         data-npsn="${item.npsn}" 
                         onclick="selectSchool('${item.nama_sekolah}', '${item.npsn}')">
                        ${item.nama_sekolah}
                     </div>`;
            });
            suggestions.innerHTML = html;
            showElement(suggestions);
        });
});

// Department change event listener
document.getElementById('id_departemen').addEventListener('change', function() {
    const idDepartemen = this.value;
    const progliSelect = document.getElementById('id_progli');
    
    progliSelect.innerHTML = '<option value="" disabled selected>Loading...</option>';
    
    if (idDepartemen) {
        fetch(`/get-progli/${idDepartemen}`)
            .then(response => response.json())
            .then(progli => {
                progliSelect.innerHTML = '<option value="" disabled selected>Pilih program keahlian</option>';
                progli.forEach(p => {
                    const option = document.createElement('option');
                    option.value = p.id_progli;
                    option.textContent = p.nama_progli;
                    progliSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                progliSelect.innerHTML = '<option value="" disabled selected>Error loading data</option>';
            });
    } else {
        progliSelect.innerHTML = '<option value="" disabled selected>Pilih program keahlian</option>';
    }
});

// File upload event listener
inputSurat.addEventListener('change', handleFileUpload);

// Form submit event listener
form.addEventListener("submit", function (e) {
    if (!validateForm()) {
        e.preventDefault();
        // Scroll ke error message
        document.getElementById('date-error')?.scrollIntoView({ 
            behavior: 'smooth', 
            block: 'center' 
        });
    }
});

// tutup suggestion
document.addEventListener('click', function (e) {
    if (!inputSekolah.contains(e.target)) {
        suggestions.innerHTML = '';
        hideElement(suggestions);
    }
});
</script>
@endsection