@extends('layout.app')

@push('style')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js" defer></script>
@endpush

@section('body')
<section>
    <div class="mb-20">
        <h2 class="text-2xl text-golden-600 font-bold mb-2">Fundamental</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Basic Programmer</h3>
                <p>berfokus pada pengembangan kemampuan dasar seorang pemrograman, memiliki pemahaman kuat tentang konsep-konsep dasar dalam pemrograman, baik itu pemahaman dari variabel, syntax dasar hingga OOP</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 1 - Dasar Pemograman</li>
                        <li>Sem. 1 - Dasar Sistem Komputer</li>
                        <li>Sem. 1 - Kalkulus Informatika</li>
                        <li>Sem. 1 - Logika Informatika</li>
                        <li>Sem. 2 - Arsitektur Komputer</li>
                        <li>Sem. 2 - Algoritma Pemrograman</li>
                        <li>Sem. 3 - Pemrograman Berorientasi Objek</li>
                        <li>Sem. 3 - Sistem Operasi</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Algorithmic Mathematics</h3>
                <p>mengkhususkan pada pemahaman dan penerapan matematika serta algoritma pemrograman. memiliki kemampuan analitis dan memahami konsep-konsep matematika yang mendasari algoritma dan struktur data.</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 1 - Kalkulus Informatika</li>
                        <li>Sem. 1 - Logika Informatika</li>
                        <li>Sem. 1 - Algoritma Pemrograman</li>
                        <li>Sem. 2 - Aljabar Linear Metrik</li>
                        <li>Sem. 2 - Matematika Diskrit</li>
                        <li>Sem. 3 - Statistika Informatika</li>
                        <li>Sem. 4 - Strategi Algoritma</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-20">
        <h2 class="text-2xl text-golden-600 font-bold mb-2">Skill</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Analytic and Visual Data</h3>
                <p>berfokus pada analisis data dan visualisasi informasi, keterampilan dalam mengumpulkan, menganalisis, dan menyajikan data dengan cara yang mudah dipahami dan bermakna.</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 1 - Manajemen Data dan Informasi</li>
                        <li>Sem. 3 - Basis Data</li>
                        <li>Sem. 3 - Statistika Informatika</li>
                        <li>Sem. 3 - Struktur Data</li>
                        <li>Sem. 3 - Strategi Algoritma</li>
                        <li>Sem. 5 - Penambangan Data/Data Mining</li>
                        <li>Sem. 5 - Visualisasi Data</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Visualization Data</h3>
                <p>representasi grafis dari data untuk memudahkan pemahaman dan analisis, memiliki keterampilan dalam membuat visualisasi yang efektif, mengubah data mentah menjadi grafik, peta, dan diagram yang informatif,</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 1 - Manajemen Data dan Informasi</li>
                        <li>Sem. 3 - Basis Data</li>
                        <li>Sem. 6 - Sistem Informasi Geografis</li>
                        <li>Sem. 6 - Visualisasi Data</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Software Architecture</h3>
                <p>berfokus pada desain dan pengembangan arsitektur perangkat lunak. pemahaman mendalam tentang prinsip-prinsip desain perangkat lunak dan mampu merancang sistem yang scalable dan maintainable.</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 4 - Analisis dan Perancangan Perangkat Lunak</li>
                        <li>Sem. 4 - Interaksi Manusia dan Komputer</li>
                        <li>Sem. 5 - Pengantar Manajemen dan Prinsip Proyek</li>
                        <li>Sem. 5 - Penjamin Kualitas Perangkat Lunak</li>
                        <li>Sem. 6 - Manajemen Proyek Teknologi Informasi</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Networking</h3>
                <p>berfokus pada pengelolaan dan pemeliharaan jaringan komputer. mampu merancang, mengimplementasikan, dan memelihara infrastruktur jaringan</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 1 - Dasar Sistem Komputer</li>
                        <li>Sem. 2 - Arsitektur Komputer</li>
                        <li>Sem. 3 - Sistem Operasi</li>
                        <li>Sem. 4 - Komunikasi Data dan Jaringan Komputer</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Cyber Data</h3>
                <p>perlindungan data dan keamanan, kelompok ini memiliki keterampilan dan pengetahuan dalam mendeteksi, mencegah, dan merespons ancaman keamanan.</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 5 - Keamanan Komputer</li>
                        <li>Sem. 5 - Keamanan Informasi</li>
                        <li>Sem. 6 - Kriptografi</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">DevOps Enginering</h3>
                <p>berfokus pada integrasi pengembangan perangkat lunak (Development) dan operasi teknologi informasi (Operations). serta memiliki keahlian dalam otomasi dan pengelolaan infrastruktur</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 1 - Manajemen Data dan Informasi</li>
                        <li>Sem. 1 - Dasar Sistem Komputer</li>
                        <li>Sem. 2 - Arsitektur Komputer</li>
                        <li>Sem. 3 - Sistem Operasi</li>
                        <li>Sem. 5 - Pengantar Manajemen dan Prinsip Proyek</li>
                        <li>Sem. 5 - Penjamin Kualitas Perangkat Lunak</li>
                        <li>Sem. 6 - Manajemen Proyek Teknologi Informasi</li>
                        <li>Sem. 6 - Rekayasa Perangkat Lunak</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Artificial Intelligence</h3>
                <p>pengembangan dan penerapan teknologi kecerdasan buatan. memiliki keahlian dalam pembelajaran mesin (machine learning), pembelajaran mendalam (deep learning), pemrosesan bahasa alami (natural language processing), dan teknik AI lainnya</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 4 - Kecerdasan Buatan</li>
                        <li>Sem. 5 - Pembelajaran Mesin</li>
                        <li>Sem. 5 - Sistem Pendukung Keputusan</li>
                        <li>Sem. 6 - Deep Learning</li>
                        <li>Sem. 6 - Pengenalan Pola</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Cyber Crime Analytic</h3>
                <p>berfokus pada analisis dan investigasi kejahatan siber. keterampilan dalam mengidentifikasi, melacak, dan menganalisis aktivitas kejahatan siber</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 5 - Keamanan Komputer</li>
                        <li>Sem. 5 - Forensik Digital</li>
                        <li>Sem. 6 - Keamanan Informasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <h2 class="text-2xl text-golden-600 font-bold mb-2">Developer</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Web Developer</h3>
                <p>pengembangan aplikasi dan situs web. memiliki keahlian dalam pemrograman web menggunakan berbagai bahasa pemrograman seperti HTML, CSS, JavaScript, dan kerangka kerja (framework). berfokus dalam merancang, mengembangkan, dan memelihara aplikasi web yang responsif, interaktif,</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 2 - Pemrograman Web</li>
                        <li>Sem. 3 - Pemrograman Berorientasi Objek</li>
                        <li>Sem. 5 - Pemrograman Web Dinamis</li>
                        <li>Sem. 6 - Rekayasa Web</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Mobile Developer</h3>
                <p>berfokus pada pengembangan aplikasi mobile untuk berbagai platform seperti Android atau iOS.</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 3 - Pemrograman Berorientasi Objek</li>
                        <li>Sem. 5 - Pemrograman Mobile</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 border border-gray-100 hover:border-golden-200 shadow rounded-lg">
                <h3 class="text-lg text-golden-600 font-medium">Game Developer</h3>
                <p>berfokus pada pengembangan dan pembuatan permainan (games). kelompok ini memiliki keahlian dalam merancang, mengembangkan, dan memelihara permainan menggunakan berbagai teknologi dan bahasa pemrograman seperti Unity,</p>
                <div x-data="{ open: false }" class="mt-2">
                    <p>matakuliah yang diperlukan <i @click="open = ! open" class="fa-solid fa-sort-down hover:text-blue-600 cursor-pointer"></i></p>
                    <ul x-show="open" @click.outside="open = false" class="list-disc ml-5">
                        <li>Sem. 3 - Pemrograman Berorientasi Objek</li>
                        <li>Sem. 6 - Pengembangan Aplikasi Game</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection