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
                        <input type="text" name="siswa[{{ $i }}][nama]"
                            value="{{ old('siswa.' . $i . '.nama') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                      focus:border-blue-500 outline-none transition"
                            placeholder="Nama lengkap siswa">
                         <p id="nama_error" class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- NISN -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NISN</label>
                        <input type="text" name="siswa[{{ $i }}][nisn]"
                            value="{{ old('siswa.' . $i . '.nisn') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                      focus:border-blue-500 outline-none transition"
                            placeholder="Masukkan NISN">
                        <p id="nisn_error" class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
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
                            <p id="tempat_error" class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL LAHIR</label>
                            <input type="date" name="siswa[{{ $i }}][tanggal_lahir]"
                                value="{{ old('siswa.' . $i . '.tanggal_lahir') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                          focus:border-blue-500 outline-none transition">
                            <p id="lahir_error" class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                        </div>
                    </div>


                    <!-- Agama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">AGAMA</label>
                        <select name="siswa[{{ $i }}][agama]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                       focus:border-blue-500 outline-none transition" required>
                            <option value="">-- Pilih Agama --</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option {{ old('siswa.' . $i . '.agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                        <p id="agama_error" class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- Kelas/Jurusan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">KELAS / JURUSAN</label>
                        <input type="text" name="siswa[{{ $i }}][kelas]"
                            value="{{ old('siswa.' . $i . '.kelas') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                      focus:border-blue-500 outline-none transition"
                            placeholder="Contoh: XII RPL / XI TKJ">
                        <p id="kelas_error" class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- No HP -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NO HP</label>
                        <input type="tel" name="siswa[{{ $i }}][no_hp]"
                            value="{{ old('siswa.' . $i . '.no_hp') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                      focus:border-blue-500 outline-none transition"
                            placeholder="08xxxxxxxxxx">
                        <p id="no_hp_error" class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- Foto -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">FOTO SISWA</label>
                        <input type="file" id="foto" name="siswa[{{ $i }}][foto]" accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0 file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100" required>
                        <p id="foto_error" class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                        <p class="text-gray-500 text-sm mt-1">File maksimal 2MB. Format: JPEG, PNG, dan JPG.</p>
                    </div>

                    <!-- Alamat Rumah -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ALAMAT RUMAH</label>
                        <textarea name="siswa[{{ $i }}][alamat_rumah]" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                         focus:border-blue-500 outline-none transition" required
                            placeholder="Alamat lengkap rumah">{{ old('siswa.' . $i . '.alamat_rumah') }}</textarea>
                        <p id="alamat_error" class="text-red-500 text-sm mt-1 hidden">Wajib diisi</p>
                    </div>

                    <!-- Alamat Kos -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ALAMAT KOS (Opsional)</label>
                        <textarea name="siswa[{{ $i }}][alamat_kos]" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500
                                         focus:border-blue-500 outline-none transition"
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
                            <input type="date" id="tgl_mulai" name="tgl_mulai"
                                value="{{ session('pendaftaran.tgl_mulai') ?? old('tgl_mulai') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">TANGGAL SELESAI</label>
                            <input type="date" id="tgl_selesai" name="tgl_selesai"
                                value="{{ session('pendaftaran.tgl_selesai') ?? old('tgl_selesai') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                    </div>
                </div>
            @endfor

            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center mt-6">
                <button type="button" id="prevBtn"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</button>

                <button type="button" id="nextBtn"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Lanjut</button>

                <button type="submit" id="submitBtn"
                    class="hidden px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Kirim</button>
            </div>

            <div class="flex justify-center mt-6 space-x-4">
                <!-- Tombol kembali ke halaman sebelumnya -->
                <a href="{{ route('pembimbing.form') }}"
                class="py-2.5 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium
                          rounded-lg transition duration-300 text-center">
                    Kembali
                </a>

                <!-- Navigasi nomor halaman siswa -->
                @for ($i = 1; $i <= $jumlah_siswa; $i++)
                    <button type="button"
                        class="page-btn w-8 h-8 rounded-full border border-gray-400 text-sm flex items-center justify-center"
                        data-step="{{ $i }}">
                        {{ $i }}
                    </button>
                @endfor
            </div>

        </form>
    </main>

    <!-- Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const steps = document.querySelectorAll(".siswa-form");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const submitBtn = document.getElementById("submitBtn");
    const pageBtns = document.querySelectorAll(".page-btn");

    let currentStep = 1;
    const totalSteps = steps.length;

    function validateStep(step) {
        let valid = true;
        const inputs = steps[step - 1].querySelectorAll("input[required], select[required], textarea[required]");

        inputs.forEach(input => {
            const errorMsg = input.parentElement.querySelector("p.text-red-500");
            if (input.type === "file") {
                if (input.files.length === 0) {
                    valid = false;
                    if (errorMsg) errorMsg.textContent = "Wajib diisi";
                    if (errorMsg) errorMsg.classList.remove("hidden");
                    input.classList.add("border-red-500");
                } else {
                    const file = input.files[0];
                    if (file.size > 2 * 1024 * 1024) { // 2MB
                        valid = false;
                        if (errorMsg) errorMsg.textContent = "Ukuran maksimal 2MB";
                        if (errorMsg) errorMsg.classList.remove("hidden");
                        input.classList.add("border-red-500");
                    } else {
                        if (errorMsg) errorMsg.classList.add("hidden");
                        input.classList.remove("border-red-500");
                        input.classList.add("border-green-500");
                    }
                }
            } else {
                if (!input.value.trim()) {
                    valid = false;
                    if (errorMsg) errorMsg.classList.remove("hidden");
                    input.classList.add("border-red-500");
                } else {
                    if (errorMsg) errorMsg.classList.add("hidden");
                    input.classList.remove("border-red-500");
                    input.classList.add("border-green-500");
                }
            }

        });

        // update indikator page
        const pageBtn = document.querySelector(`.page-btn[data-step="${step}"]`);
        if (valid) {
            pageBtn.innerHTML = "✔"; 
            pageBtn.classList.add("bg-green-500", "text-white");
        } else {
            pageBtn.innerHTML = step;
            pageBtn.classList.remove("bg-green-500", "text-white");
        }

        return valid;
    }

    function showStep(step) {
        steps.forEach((form, index) => {
            form.classList.add("hidden");
            if (index === step - 1) form.classList.remove("hidden");
        });

        // tombol navigasi
        prevBtn.style.display = step === 1 ? "none" : "inline-block";
        nextBtn.style.display = step === totalSteps ? "none" : "inline-block";
        submitBtn.classList.toggle("hidden", step !== totalSteps);

        // highlight nomor page
        pageBtns.forEach(btn => {
            btn.classList.remove("bg-blue-600", "text-white");
            if (parseInt(btn.dataset.step) === step) {
                btn.classList.add("bg-blue-600", "text-white");
            }
        });

        currentStep = step;
    }

    // Next & Prev
    nextBtn.addEventListener("click", () => {
        if (validateStep(currentStep) && currentStep < totalSteps) {
            showStep(currentStep + 1);
        }
    });

    prevBtn.addEventListener("click", () => {
        if (currentStep > 1) showStep(currentStep - 1);
    });

    // Page buttons
    pageBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            const step = parseInt(btn.dataset.step);
            if (step < currentStep || validateStep(currentStep)) {
                showStep(step);
            }
        });
    });

    // saat submit terakhir, validasi semua step
    submitBtn.addEventListener("click", (e) => {
        let allValid = true;
        for (let i = 1; i <= totalSteps; i++) {
            if (!validateStep(i)) {
                allValid = false;
                showStep(i);
                break;
            }
        }
        if (!allValid) e.preventDefault();
    });

    // tampilkan step pertama
    showStep(currentStep);
});
</script>

@endsection
