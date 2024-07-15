@extends('layout.app', ['target' => 'dashboard'])

@section('body')
<header class="mb-10">
    <h1 class="text-3xl font-medium text-golden-600">Profile User</h1>
</header>
<main>
    <section class="mb-10">
        @include('includes.alert')

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <div class="col-span-2">
                <div class="w-full p-2 border border-golden-200 shadow rounded-lg mb-5">
                    <div class="">
                        <div class="grid grid-cols-1 sm:grid-cols-4">
                            <div class="p-1 flex flex-col justify-center items-center">
                                <img class="w-28 h-28 mb-3 rounded-full shadow-lg" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Bonnie image"/>
                            </div>
                            <div class="col-span-3 w-full p-2 border border-golden-200 rounded-md">
                                <div class="mb-2 flex justify-between">
                                    <div class="">
                                        <h5 class="text-xl font-medium text-gray-900 capitalize">{{ $mahasiswa->name }}</h5>
                                        <p class="text-xs">{{ $mahasiswa->email}}</p>
                                    </div>
                                </div>
                                <div class="text-sm">
                                    <div class="">
                                        {!! $mahasiswa->oneProfile->massage ?? 'no desc' !!}
                                    </div>
                                    <div class="mt-3 text-xs flex justify-end">
                                        Informatika, 2000018160
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>

                </div>

                <div class="w-full p-4 border border-golden-200 rounded-md">
                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-2">
                        <div class="">
                            <div class="p-2 border border-golden-100">
                                <div class="">
                                    <p class="font-medium">Scores Akademik</p>
                                    <p class="text-xs">total score transkip nilai yang diperoleh</p>
                                </div>
                                <div class="flex justify-end">
                                    <p class="text-2xl">{{ $mahasiswa->oneProfile->transkip_point }} pt</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 border border-golden-100 sm:col-span-3">
                            {{-- pop over start --}}
                            <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-golden-200 rounded-lg shadow-sm opacity-0">
                                <div class="px-3 py-2 bg-golden-100 border-b border-golden-200 rounded-t-lg">
                                    <h3 class="font-semibold text-gray-900">Badge Achievement</h3>
                                </div>
                                <div class="px-3 py-2">
                                    <p>badge tertinggi dimulai dari <span class="text-yellow-500">kuning</span>, <span class="text-blue-500">biru</span>, dan abu abu</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                            {{-- pop over end --}}
                            <div class="mb-2">
                                <p class="font-medium">Badge <span data-popover-target="popover-default"><i class="fa-regular fa-circle-question"></i></span></p>
                                <p class="text-xs">penghargaan matakuliah yang diperoleh</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($mahasiswa->oneProfile->transkip_badge as $key => $item)
                                    @if ($item == 2)
                                    <p class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-yellow-300">{{ $key }}</p>
                                    @elseif($item == 1)
                                    <p class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-blue-300">{{ $key }}</p>
                                    @else
                                    <p class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-gray-300">{{ $key }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="w-full p-2 border border-golden-200 shadow rounded-lg">
                    <div class="mb-4">
                        <h2 class="text-xl font-medium text-golden-600">Statistik</h2>
                    </div>

                    <div class="" id="chart"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-10">
        <div class="mb-4">
            <div class="sm:flex items-center sm:justify-between">
                <div class="">
                    <h2 class="text-xl font-medium text-golden-600">Skripsi / Tugas Akhir</h2>
                </div>
            </div>

            <div class="w-full p-4 border border-golden-200 rounded-md">
                @if ($userProject)
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <div class="border border-golden-200 grid grid-cols-1 p-2">
                        <div class="mb-2">
                            <a href="{{ env('CLASSIFICATION_CONNECTION') . 'library?folder_path=' . $userProject->path }}" target="__blank" class="text-gray-700 text-lg hover:underline">{{ strlen($userProject->title) > 55 ? substr($userProject->title, 0, 50) . '...' : $userProject->title}}</a>
                        </div>
                        <div class="">
                            <div class="mb-2 font-medium">
                                Akurasi : {{ $userProject->akurasi }}%
                            </div>
                            <div class="max-w-xs">
                                @foreach ($userProject->scores as $key => $score)
                                <div class="flex justify-between">
                                    <div class="{{ $score > 30 ? 'font-medium' : '' }} capitalize">{{ $key }}</div>
                                    <div class=""> {{ $score }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="border border-golden-200 col-span-2 p-2">
                        {{ $userProject->ringkasan }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <section>
        <div class="mb-4">
            <div class="sm:flex items-center sm:justify-between">
                <div class="">
                    <h2 class="text-xl font-medium text-golden-600">Dokumen Lainnya</h2>
                </div>
            </div>
        </div>
        @livewire('list-file-mahasiswa', ['lazy' => true, 'userId' => $mahasiswa->id])
    </section>
</main>
@endsection


@push('style')
@livewireStyles
@endpush


@push('script')
@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = 
{
    series: [{
        name: 'Avg Score',
        data: @json($mahasiswa->oneProfile->statistik_scores),
    }],
    colors: ['#fcc200'],
    chart: {
        height: 350,
        type: 'radar',
    },
    yaxis: {
        stepSize: 20
    },
    xaxis: {
        categories: ['Data Sain', 'Progammer', 'Sistem Cerdas', 'UI/UX']
    }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

</script>
@endpush