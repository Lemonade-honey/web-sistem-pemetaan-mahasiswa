@extends('layout.app')

@section('body')
<main class="">
    <section class="w-full flex justify-around items-center flex-wrap gap-5 sm:min-h-dvh sm:mt-0" id="home">
        <div class="w-full lg:w-3/6">
            <img src="https://static.vecteezy.com/system/resources/previews/010/974/056/original/3d-courier-service-delivery-delivery-man-and-boxes-courier-or-delivery-service-men-characters-with-parcels-packages-boxes-3d-rendering-png.png" alt="">
        </div>
        <header class="max-w-xl text-center sm:text-left">
            <h1 class="text-gray-700 text-5xl mb-4 font-medium">Sistem Pemetaan <span class="text-golden-600">Mahasiswa</span></h1>
            <p class="text-gray-700 text-xl">Sistem untuk memetakan mahasiswa Universitas Ahmad Dahlan, menjadi beberapa kategori yang telah ditetapkan</p>

            <div class="flex justify-center sm:justify-end mt-5">
                <a href="{{ route('mahasiswa-list') }}" class="text-gray-600 hover:text-white bg-yellow-300 hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-200 font-bold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Lihat Mahasiswa Terdaftar</a>
            </div>
        </header>
    </section>
    <section class="mt-20 scroll-mt-28" id="service">
        <div class="mb-5">
            <h2 class="text-4xl font-medium mb-4 text-gray-600">Fitur Sistem</h2>
            <p class="text-gray-700 text-lg text-justify">Untuk saat ini hanya ada 3 fitur utama dalam sistem ini, kedepannya dapat ditingkatkan lebih baik lagi</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
            <div class="w-full p-4 border border-yellow-300 shadow-yellow-50 rounded-lg">
                <div class="">
                    <h3 class="text-lg font-medium uppercase mb-2">Pemetaan Nilai Transkip</h3>
                    <p>Memetakan hasil transkip nilai mahasiswa Universitas Ahmad Dahlan. Mahasiswa akan mendapatkan <span class="font-medium">Badge</span> tertentu jika <span class="font-medium">memenuhi kiteria tertentu</span> pada nilai transkip</p>
                </div>
            </div>
            <div class="w-full p-4 border border-yellow-300 shadow-yellow-50 rounded-lg">
                <div class="">
                    <h3 class="text-lg font-medium uppercase mb-2">Klasifikasi Dokumen</h3>
                    <p>Mengklasifikasikan dokumen yang dimiliki mahasiswa menjadi 4 jenis yaitu, programmer, ui/ux, data sains, dan sistem cerdas. Dokumen dapat berupa jurnal, SKPI, skripsi ataupun tugas akhir mahasiswa</p>
                </div>
            </div>
            <div class="w-full p-4 border border-yellow-300 shadow-yellow-50 rounded-lg">
                <div class="">
                    <h3 class="text-lg font-medium uppercase mb-2">Hasil Akhir Mahasiswa</h3>
                    <p>Memberikan graph arah akhir mahasiswa yang telah ditempuh hingga saat ini</p>
                </div>
            </div>
        </div>
        
    </section>

    <section class="mt-40 sm:mt-60 scroll-mt-28 flex flex-wrap" id="about">
        <div class="mb-5">
            <h2 class="text-4xl font-medium mb-4 text-gray-600">Kampus <span class="text-yellow-400">Kami</span></h2>
            <p class="text-lg text-gray-700 text-justify">Kampus kami berada di Kota Yogyakarta</p>
        </div>
        <div class="relative w-full h-96">
            <iframe class="absolute top-0 left-0 w-full h-full rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5891295163838!2d110.3805462750054!3d-7.833234892187854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5701a2ae1c23%3A0x173dbeeddc56d9e!2sUniversitas%20Ahmad%20Dahlan%20-%20Kampus%204!5e0!3m2!1sid!2sid!4v1718627025037!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section class="mt-20 scroll-mt-28" id="service">
        <div class="mb-5">
            <h2 class="text-4xl font-medium mb-4 text-gray-600">FAQ</h2>
            <p class="text-gray-700 text-lg text-justify">Pertanyaan yang sering muncul mengenai <span class="font-medium">Sistem Pemetaan</span> <span class="text-golden-600">Mahasiswa</span></p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
            <div class="w-full p-4 border border-gray-300 shadow rounded-lg">
                <div class="">
                    <h3 class="text-lg font-medium uppercase mb-2">Apa Kegunaan Sistem Ini ?</h3>
                    <p>Untuk memetakan mahasiswa</p>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-300 shadow rounded-lg">
                <div class="">
                    <h3 class="text-lg font-medium uppercase mb-2">Apa Tujuan Sistem Ini ?</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus voluptates eius, delectus a non optio.</p>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-300 shadow rounded-lg">
                <div class="">
                    <h3 class="text-lg font-medium uppercase mb-2">Untuk siapa sistem ini ?</h3>
                    <p>Untuk saat ini, sistem dapat digunakan untuk <span class="font-medium">mahasiswa informatika</span> Universitas Ahmad Dahlan, kedepannya mungkin dapat kesemua prodi</p>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-300 shadow rounded-lg">
                <div class="">
                    <h3 class="text-lg font-medium uppercase mb-2">apa itu badge ?</h3>
                    <p></p>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-300 shadow-yellow-50 rounded-lg">
                <div class="">
                    <h3 class="text-lg font-medium uppercase mb-2">Lorem, ipsum dolor.</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, sit?</p>
                </div>
            </div>
        </div>
        
    </section>
</main>
<footer class="flex justify-center my-2">
    <p>&copy; 2024 Dapa.</p>
</footer>
@endsection