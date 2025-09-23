@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-6">
        <div class="bg-white shadow-lg rounded-xl p-8 max-w-lg w-full text-center border border-gray-200">
            <!-- Icon -->
            <div class="flex justify-center mb-4">
                <div class="bg-green-100 text-green-600 rounded-full p-4">
                    <i class="fas fa-check text-3xl"></i>
                </div>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-green-600 mb-2">
                ✅ Pendaftaran Berhasil!
            </h2>
            <p class="text-gray-600 mb-6">
                Data pendaftaran, pembimbing, dan siswa berhasil disimpan ke sistem.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}"
                    class="flex-1 py-2.5 px-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium
                          rounded-lg transition duration-300 text-center">
                    🏠 Kembali ke Home
                </a>
                <a href="{{ route('pendaftaran.form') }}"
                    class="flex-1 py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium
                          rounded-lg transition duration-300 text-center">
                    ➕ Daftar Lagi
                </a>
            </div>
        </div>
    </div>
@endsection
