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
            FORM DATA SISWA
        </h2>

        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto">
            @csrf

            @for ($i = 0; $i < $jumlah_siswa; $i++)
                <div class="siswa-form hidden bg-white shadow-md rounded-lg p-6 space-y-6 border border-gray-200"
                     data-step="{{ $i + 1 }}">
                    <h3 class="text-lg font-semibold text-blue-600 mb-4">
                        Siswa ke-{{ $i + 1 }}
                    </h3>

                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NAMA LENGKAP</label>
                        <input type="text" name="siswa[{{ $i }}][nama_siswa]"
                            value="{{ old('siswa.' . $i . '.nama_siswa') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="Nama lengkap siswa">
                         <p class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- NISN -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NISN</label>
                        <input type="text" name="siswa[{{ $i }}][nisn]" pattern="[0-9]{10}" title="NISN harus 10 digit angka"
                            maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            value="{{ old('siswa.' . $i . '.nisn') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="Masukkan NISN">
                        <p class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">TEMPAT LAHIR</label>
                            <input type="text" name="siswa[{{ $i }}][tempat_lahir]"
                                value="{{ old('siswa.' . $i . '.tempat_lahir') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                placeholder="Kota/Kabupaten">
                            <p class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL LAHIR</label>
                            <input type="date" name="siswa[{{ $i }}][tanggal_lahir]"
                                value="{{ old('siswa.' . $i . '.tanggal_lahir') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            <p class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                        </div>
                    </div>

                    <!-- Agama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">AGAMA</label>
                        <select name="siswa[{{ $i }}][agama]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required>
                            <option value="">-- Pilih Agama --</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                        <p class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- Kelas/Jurusan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">KELAS / JURUSAN</label>
                        <input type="text" name="siswa[{{ $i }}][kelas]"
                            value="{{ old('siswa.' . $i . '.kelas') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="Contoh: XII RPL / XI TKJ">
                        <p class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- No HP -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NO HP</label>
                        <input type="tel" name="siswa[{{ $i }}][no_hp]"
                            value="{{ old('siswa.' . $i . '.no_hp') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="08xxxxxxxxxx">
                        <p class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- Foto -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">FOTO SISWA</label>
                        <input type="file" id="foto_siswa_{{ $i }}" name="siswa[{{ $i }}][foto]"
                            data-index="{{ $i }}"
                            accept="image/*"
                            {{ empty($pendaftaran['siswa'][$i]['foto_temp'] ?? '') ? 'required' : '' }}
                            data-has-upload="{{ !empty($pendaftaran['siswa'][$i]['foto_temp'] ?? '') ? 'true' : 'false' }}"
                            class="foto-siswa-input block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0 file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 
                                    border border-gray-300 rounded-lg px-3 py-2 
                                    {{ !empty($pendaftaran['siswa'][$i]['foto_temp'] ?? '') ? 'border-green-500 bg-green-50' : 'border-gray-300' }}">

                        <p id="foto_error_{{ $i }}" class="text-red-500 text-sm mt-1 hidden"></p>
                        <p class="text-gray-500 text-sm mt-1">File maksimal 2MB. Format: JPEG, PNG, dan JPG.</p>

                        <!-- Preview Area -->
                        <div id="preview_foto_siswa_{{ $i }}" class="mt-3">
                            @if (!empty($pendaftaran['siswa'][$i]['foto_temp']))
                                <div class="flex items-center space-x-4">
                                    <img src="{{ Storage::url($pendaftaran['siswa'][$i]['foto_temp']) }}" 
                                        alt="Preview Foto" class="w-20 h-20 object-cover border rounded">
                                    <div>
                                        <p class="text-sm text-green-600">✓ Foto sudah diupload</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Alamat Rumah -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ALAMAT RUMAH</label>
                        <textarea name="siswa[{{ $i }}][alamat_rumah]" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required
                            placeholder="Alamat lengkap rumah">{{ old('siswa.' . $i . '.alamat_rumah') }}</textarea>
                        <p class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- Alamat Kos -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ALAMAT KOS (Opsional)</label>
                        <textarea name="siswa[{{ $i }}][alamat_kos]" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="Alamat kos (jika ada)">{{ old('siswa.' . $i . '.alamat_kos') }}</textarea>
                    </div>

                    {{-- Periode PKL --}}
                    <div class="mb-2">
                        <label class="block text-sm font-semibold text-gray-800">
                            Periode PKL <span class="text-gray-500 text-xs">(Opsional)</span>
                        </label>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL MULAI</label>
                            <input type="date" name="tgl_mulai" id="tgl_mulai_{{ $i }}" data-index="{{ $i }}"
                                value="{{ session('pendaftaran.tgl_mulai') ?? old('tgl_mulai') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL SELESAI</label>
                            <input type="date" name="tgl_selesai" id="tgl_selesai_{{ $i }}" data-index="{{ $i }}"
                                value="{{ session('pendaftaran.tgl_selesai') ?? old('tgl_selesai') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                    </div>
                </div>
            @endfor

            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center mt-6">
                <div class="flex space-x-2">
                    <a href="{{ route('pembimbing.form') }}"
                        class="py-2 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition duration-300 text-center">
                        < Form Pembimbing
                    </a>

                    <button type="button" id="prevBtn"
                        class="hidden py-2 px-4 bg-gray-300 rounded hover:bg-gray-400">Sebelumnya</button>
                </div>

                <div class="flex space-x-2">
                    <button type="button" id="nextBtn"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Lanjut</button>

                    <button type="submit" id="submitBtn"
                        class="hidden px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        <i class="fas fa-paper-plane mr-2 text-sm"></i>
                        Ajukan Pendaftaran
                    </button>
                </div>
            </div>

            <div class="flex justify-center mt-6 space-x-4">
                @for ($i = 1; $i <= $jumlah_siswa; $i++)
                    <button type="button"
                        class="page-btn w-8 h-8 rounded-full border border-gray-400 text-sm flex items-center justify-center"
                        data-step="{{ $i }}">
                        {{ $i }}
                    </button>
                @endfor
            </div>
        </form>


        <!-- MODAL KONFIRMASI -->
        <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <!-- Icon -->
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                        <i class="fas fa-exclamation-triangle text-blue-600 text-xl"></i>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-lg font-medium text-gray-900 mt-2">Konfirmasi Pengajuan</h3>
                    
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">
                            Apakah Anda yakin ingin mengajukan pendaftaran? 
                            Pastikan semua data siswa sudah benar.
                        </p>
                        
                        <!-- Detail Data -->
                        <div class="mt-4 text-left bg-gray-50 p-3 rounded-lg">
                            <h4 class="font-medium text-gray-700 text-sm mb-2">Ringkasan Data:</h4>
                            <div id="confirmationDetails" class="text-xs text-gray-600 space-y-1">
                                <p><strong>Jumlah Siswa:</strong> <span id="totalStudents">{{ $jumlah_siswa }}</span></p>
                                <p><strong>Status Validasi:</strong> <span id="validationStatus" class="text-green-600">Semua data valid</span></p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex justify-center space-x-3 mt-4">
                        <button type="button" id="cancelConfirm"
                            class="px-4 py-2 bg-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Periksa Lagi
                        </button>
                        <button type="button" id="confirmSubmit"
                            class="px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                            Ya, Ajukan Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </main>

<script>
// =============================================
// DEKLARASI VARIABEL
// =============================================
const tglMulai = document.getElementById("tgl_mulai");
const tglSelesai = document.getElementById("tgl_selesai");

let currentStep = 1;
let steps; 
let totalSteps;
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const submitBtn = document.getElementById("submitBtn");
const pageBtns = document.querySelectorAll(".page-btn");


// =============================================
// HELPER
// =============================================
function showError(errorMsg, message, input) {
    if (errorMsg) {
        errorMsg.textContent = message;
        errorMsg.classList.remove("hidden");
    }
    input.classList.add("border-red-500");
}

function updatePageIndicator(step, isValid) {
    const pageBtn = document.querySelector(`.page-btn[data-step="${step}"]`);
    if (isValid) {
        pageBtn.innerHTML = "✔"; 
        pageBtn.classList.add("bg-green-500", "text-white");
    } else {
        pageBtn.innerHTML = step;
        pageBtn.classList.remove("bg-green-500", "text-white");
    }
}

function scrollToElement(element) {
    const elementRect = element.getBoundingClientRect();
    const absoluteElementTop = elementRect.top + window.pageYOffset;
    const middle = absoluteElementTop - (window.innerHeight / 2.5);
    
    window.scrollTo({
        top: middle,
        behavior: 'smooth'
    });
    
    element.focus();
    element.classList.add('ring-2', 'ring-red-500', 'ring-opacity-50');
    
    setTimeout(() => {
        element.classList.remove('ring-2', 'ring-red-500', 'ring-opacity-50');
    }, 3000);
}


// =============================================
// FUNGSI VALIDASI
// =============================================
function validateStep(step) {
    let valid = true;
    const inputs = steps[step - 1].querySelectorAll("input[required], select[required], textarea[required]");
    let firstErrorElement = null;

    inputs.forEach(input => {
        if (input.type === 'file' && input.getAttribute('data-has-upload') === 'true') {
            input.classList.add('border-green-500');
            return;
        }

        const errorMsg = input.parentElement.querySelector("p.text-red-500");

        if (errorMsg) errorMsg.classList.add("hidden");
        input.classList.remove("border-red-500", "border-green-500");

        const value = input.value.trim();

        if (input.name.includes('[nisn]')) {
            if (value === "") {
                valid = false;
                showError(errorMsg, "Wajib diisi", input);
                if (!firstErrorElement) firstErrorElement = input;
            } else if (value.length !== 10) {
                valid = false;
                showError(errorMsg, "NISN harus 10 digit", input);
                if (!firstErrorElement) firstErrorElement = input;
            } else if (!/^\d+$/.test(value)) {
                valid = false;
                showError(errorMsg, "NISN harus angka", input);
                if (!firstErrorElement) firstErrorElement = input;
            } else {
                input.classList.add("border-green-500");
            }
        } else if (input.type === "file") {
            if (input.files.length === 0) {
                valid = false;
                showError(errorMsg, "Wajib diisi", input);
                if (!firstErrorElement) firstErrorElement = input;
            } else {
                const file = input.files[0];
                if (file.size > 2 * 1024 * 1024) {
                    valid = false;
                    showError(errorMsg, "Ukuran maksimal 2MB", input);
                    if (!firstErrorElement) firstErrorElement = input;
                } else {
                    input.classList.add("border-green-500"); 
                }
            }
        } else {
            if (!input.value.trim()) {
                valid = false;
                showError(errorMsg, "Wajib diisi", input);
                if (!firstErrorElement) firstErrorElement = input;
            } else {
                input.classList.add("border-green-500"); 
            }
        }
    });

    if (!validateDates(step)) {
        valid = false;
        const tglSelesai = steps[step - 1].querySelector(`#tgl_selesai_${step-1}`);
        if (tglSelesai && !firstErrorElement) {
            firstErrorElement = tglSelesai;
        }
    }

    if (!valid && firstErrorElement){
        scrollToElement(firstErrorElement);
    }

    updatePageIndicator(step, valid);
    return valid;
}

function validateSingleInput(input) {
    const errorMsg = input.parentElement.querySelector("p.text-red-500");
    
    if (errorMsg) errorMsg.classList.add("hidden");
    input.classList.remove("border-red-500", "border-green-500");

    const value = input.value.trim();

    if (input.name.includes('[nisn]')) {
        if (value === "") {
            input.classList.add("border-red-500");
        } else if (value.length !== 10) {
            showError(errorMsg, "NISN harus 10 digit", input);
        } else if (!/^\d+$/.test(value)) {
            showError(errorMsg, "NISN harus angka", input);
        } else {
            input.classList.add("border-green-500");
        }
    } else if (input.type === "file") {
        if (input.files.length > 0) {
            const file = input.files[0];
            if (file.size <= 2 * 1024 * 1024) {
                input.classList.add("border-green-500");
            } else {
                showError(errorMsg, "Ukuran maksimal 2MB", input);
            }
        } else {
            input.classList.add("border-red-500");
        }
    } else if (input.name.includes('tgl_mulai') || input.name.includes('tgl_selesai')) {
        const step = parseInt(input.getAttribute('data-index')) + 1;
        validateDates(step);
    } else {
        if (input.value.trim() !== "") {
            input.classList.add("border-green-500"); 
        } else {
            input.classList.add("border-red-500"); 
        }
    }
}

function initRealTimeValidation() {
    steps.forEach((step, index) => {
        const stepNumber = index + 1;
        const inputs = step.querySelectorAll("input, select, textarea");
        
        inputs.forEach(input => {
            input.addEventListener('input', () => validateSingleInput(input));
            input.addEventListener('change', () => validateSingleInput(input));
        });

        // ⭐⭐ EVENT LISTENERS UNTUK TANGGAL DI SETIAP STEP
        const tglMulai = step.querySelector(`#tgl_mulai_${index}`);
        const tglSelesai = step.querySelector(`#tgl_selesai_${index}`);

        if (tglMulai && tglSelesai) {
            tglMulai.addEventListener("change", function () {
                setMinEndDate(stepNumber);
                validateDates(stepNumber);
            });

            tglSelesai.addEventListener("change", function () {
                validateDates(stepNumber);
            });
        }
    });
}


// =============================================
// FUNGSI VALIDASI DATES SISWA
// =============================================
function validateDates(step) {
    const currentForm = steps[step - 1];
    const tglMulai = currentForm.querySelector(`#tgl_mulai_${step-1}`);
    const tglSelesai = currentForm.querySelector(`#tgl_selesai_${step-1}`);
    
    if (!tglMulai || !tglSelesai) return true;
    
    const startDate = new Date(tglMulai.value);
    const endDate = new Date(tglSelesai.value);
    
    // Reset error states
    tglMulai.classList.remove('border-red-500');
    tglSelesai.classList.remove('border-red-500');
    hideDateError(step);
    
    // Validasi: Cek jika kedua tanggal terisi
    if (!tglMulai.value || !tglSelesai.value) {
        return true;
    }
    
    // Validasi: Tanggal selesai harus setelah tanggal mulai
    if (endDate <= startDate) {
        showDateError('Tanggal selesai harus setelah tanggal mulai', step);
        tglSelesai.classList.add('border-red-500');
        return false;
    }
    
    return true;
}

function showDateError(message, step) {
    const currentForm = steps[step - 1];
    let errorElement = currentForm.querySelector(`#date-error-${step}`);
    
    if (!errorElement) {
        errorElement = document.createElement('div');
        errorElement.id = `date-error-${step}`;
        errorElement.className = 'mt-2 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg';
        // Tambahkan error element setelah container tanggal
        const dateContainer = currentForm.querySelector('.grid.md\\:grid-cols-2.gap-4');
        dateContainer.parentNode.appendChild(errorElement);
    }
    errorElement.innerHTML = `<p class="text-sm font-medium">${message}</p>`;
    errorElement.classList.remove('hidden');
}

function hideDateError(step) {
    const currentForm = steps[step - 1];
    const errorElement = currentForm.querySelector(`#date-error-${step}`);
    if (errorElement) {
        errorElement.classList.add('hidden');
    }
}

function setMinEndDate(step) {
    const currentForm = steps[step - 1];
    const tglMulai = currentForm.querySelector(`#tgl_mulai_${step-1}`);
    const tglSelesai = currentForm.querySelector(`#tgl_selesai_${step-1}`);
    
    if (!tglMulai || !tglSelesai) return;
    
    if (tglMulai.value) {
        let startDate = new Date(tglMulai.value);
        startDate.setDate(startDate.getDate() + 1);
        
        let minDate = startDate.toISOString().split("T")[0];
        tglSelesai.min = minDate;
        
        // Jika tgl_selesai sudah ada tapi < minDate, reset
        if (tglSelesai.value && tglSelesai.value < minDate) {
            tglSelesai.value = '';
            hideDateError(step);
        }
    }
}


// =============================================
// FUNGSI UPLOAD FOTO SISWA
// =============================================
function handleStudentPhotoUpload(event) {
    const file = event.target.files[0];
    const index = this.getAttribute('data-index');
    const previewContainer = document.getElementById(`preview_foto_siswa_${index}`);
    const errorElement = document.getElementById(`foto_error_${index}`);
    const inputElement = this;
    
    previewContainer.innerHTML = '';
    if (errorElement) errorElement.classList.add('hidden');
    
    if (!file) return;

    const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    const maxSize = 2 * 1024 * 1024;

    if (!validTypes.includes(file.type)) {
        showError(errorElement, 'Format file tidak didukung. Gunakan JPEG, PNG, atau JPG.', inputElement);
        return;
    }

    if (file.size > maxSize) {
        showError(errorElement, 'Ukuran file melebihi 2MB.', inputElement);
        return;
    }

    previewContainer.innerHTML = '<p class="text-blue-500 text-sm">Mengupload foto...</p>';

    const formData = new FormData();
    formData.append('foto_siswa', file);
    formData.append('index', index);

    fetch("{{ route('siswa.uploadFotoSiswa') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const previewHTML = `
                <div class="flex items-center space-x-4">
                    <img src="${data.path}" 
                         alt="Preview Foto" class="w-20 h-20 object-cover border rounded">
                    <div>
                        <p class="text-sm text-green-600">Foto berhasil diupload</p>
                    </div>
                </div>
            `;
            previewContainer.innerHTML = previewHTML;

            inputElement.removeAttribute('required');
            inputElement.setAttribute('data-has-upload', 'true');
            inputElement.classList.add('border-green-500', 'bg-green-50');
            inputElement.classList.remove('border-red-500', 'border-gray-300');
        } else {
            showError(errorElement, data.message || 'Gagal upload foto.', inputElement);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showError(errorElement, 'Terjadi kesalahan saat upload.', inputElement);
    });
}

// =============================================
// FUNGSI NAVIGASI
// =============================================
function showStep(step) {
    steps.forEach((form, index) => {
        form.classList.toggle("hidden", index !== step - 1);
    });

    // Update tombol navigasi
    prevBtn.classList.toggle("hidden", step === 1);
    nextBtn.classList.toggle("hidden", step === totalSteps);
    submitBtn.classList.toggle("hidden", step !== totalSteps);

    // Update page buttons
    pageBtns.forEach(btn => {
        btn.classList.remove("bg-blue-600", "text-white");
        if (parseInt(btn.dataset.step) === step) {
            btn.classList.add("bg-blue-600", "text-white");
        }
    });

    currentStep = step;
    window.scrollTo({ top: 0, behavior: 'smooth' });
}


// =============================================
// FUNGSI KONFIRMASI SUBMIT
// =============================================
function showConfirmationModal() {
    let allValid = true;
    let invalidSteps = [];
    
    for (let i = 1; i <= totalSteps; i++) {
        if (!validateStep(i)) {
            allValid = false;
            invalidSteps.push(i);
        }
    }
    
    // Update status validasi di modal
    const validationStatus = document.getElementById('validationStatus');
    if (allValid) {
        validationStatus.textContent = "Semua data valid";
        validationStatus.className = "text-green-600";
    } else {
        validationStatus.textContent = `Data siswa ${invalidSteps.join(', ')} perlu diperbaiki`;
        validationStatus.className = "text-red-600";
        return false; 
    }
    
    document.getElementById('confirmationModal').classList.remove('hidden');
    return true;
}

function hideConfirmationModal() {
    document.getElementById('confirmationModal').classList.add('hidden');
}

function submitForm() {
    document.querySelector('form').submit();
}


// =============================================
// EVENT LISTENERS
// =============================================
document.addEventListener("DOMContentLoaded", function() {
    steps = document.querySelectorAll(".siswa-form");
    totalSteps = steps.length;

    initRealTimeValidation();

    document.querySelectorAll('.foto-siswa-input').forEach(input => {
        input.addEventListener('change', handleStudentPhotoUpload);
    });

    if (tglMulai && tglSelesai) {
        tglMulai.addEventListener("change", function () {
            setMinEndDate();
            validateDates();
        });

        tglSelesai.addEventListener("change", function () {
            validateDates();
        });
    }

    nextBtn.addEventListener("click", () => {
        if (validateStep(currentStep) && currentStep < totalSteps) {
            showStep(currentStep + 1);
        }
    });

    prevBtn.addEventListener("click", () => {
        if (currentStep > 1) {
            showStep(currentStep - 1);
        }
    });

    pageBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            const step = parseInt(btn.dataset.step);
            if (step < currentStep || validateStep(currentStep)) {
                showStep(step);
            }
        });
    });


    document.getElementById('confirmSubmit').addEventListener('click', submitForm);
    document.getElementById('cancelConfirm').addEventListener('click', hideConfirmationModal);
    
    document.getElementById('confirmationModal').addEventListener('click', function(e) {
        if (e.target.id === 'confirmationModal') {
            hideConfirmationModal();
        }
    });

    submitBtn.addEventListener("click", (e) => {
        e.preventDefault(); 
        
        if (!showConfirmationModal()) {
            let firstErrorStep = null;
            for (let i = 1; i <= totalSteps; i++) {
                if (!validateStep(i)) {
                    firstErrorStep = i;
                    break;
                }
            }
            if (firstErrorStep) {
                showStep(firstErrorStep);
            }
        }
    });

    showStep(currentStep);
});
</script>
@endsection