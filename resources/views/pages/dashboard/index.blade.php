@extends('layout.app', ['target' => 'dashboard'])

@section('body')
<header class="mb-10">
    <h1 class="text-3xl font-medium text-golden-600">Profile User</h1>
    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore blanditiis officiis quaerat vitae, quas ex quo natus veritatis tenetur ipsa.</p>
</header>
<main>
    <section class="mb-10">
        @include('includes.alert')

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <div class="col-span-2">
                <div class="w-full p-2 border border-golden-200 shadow rounded-lg mb-5">
                    <div class="w-full p-4 border border-golden-200 rounded-md mb-5 flex justify-between">
                        <div class="">
                            <p class="text-lg capitalize">{{ $userProfile->oneUser->name }}</p>
                            <p class="text-xs">{{ $userProfile->oneUser->email }}</p>
                        </div>
                        <div class="">
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                 <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                            </button>

                            <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton">
                                    <li>
                                        <p data-modal-target="transkip-modal" data-modal-toggle="transkip-modal" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Transkip</p>
                                    </li>
                                    <li>
                                        <p data-modal-target="about-me-modal" data-modal-toggle="about-me-modal" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">About Me</p>
                                    </li>
                                </ul>
                            </div>

                            <!-- Main modal -->
                            <div id="transkip-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <form action="{{ route('user-file-transkip.post') }}" method="POST" class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                            <div class="">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Transkip Nilai
                                                </h3>
                                                <p class="text-sm">tenang aja, transkip file <span class="font-medium">tidak ditampilkan</span></p>
                                            </div>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="transkip-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            @csrf
                                            <div class="mb-4">
                                                <input type="file" name="file" id="file-transkip">
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                            <button type="submit" class="text-white bg-golden-700 hover:bg-golden-800 focus:ring-4 focus:outline-none focus:ring-golden-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Upload</button>
                                            <button id="clear-cpmk" data-modal-hide="transkip-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-golden-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Main modal end-->

                            <!-- Main modal -->
                            <div id="about-me-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <form action="{{ route('user-massage.post') }}" method="POST" class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                            <div class="">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    About Me
                                                </h3>
                                                <p class="text-sm">hanya text plain biasa, tidak ada tab ataupun enter</p>
                                            </div>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="about-me-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">max chart 500</label>
                                                <textarea id="message" name="massage" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here...">{{ $userProfile->massage }}</textarea>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                            <button type="submit" class="text-white bg-golden-700 hover:bg-golden-800 focus:ring-4 focus:outline-none focus:ring-golden-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
                                            <button id="clear-cpmk" data-modal-hide="about-me-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-golden-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Main modal end-->
                        </div>
                    </div>

                    <div class="w-full p-4 border border-golden-200 rounded-md mb-5">
                        <h2 class="text-lg text-golden-600 font-medium">About Me</h2>
                        <div class="text-sm">
                            {{ $userProfile->massage }}
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
                                    <p class="text-2xl">{{ $userProfile->transkip_point }} pt</p>
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
                                @foreach ($userProfile->transkip_badge as $key => $item)
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

    <section>
        <div class="mb-4">
            <div class="sm:flex items-center sm:justify-between">
                <div class="">
                    <h2 class="text-xl font-medium text-golden-600">Research dan Sertifikat User</h2>
                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, explicabo!</p>
                </div>
                <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="text-white bg-golden-700 hover:bg-golden-800 focus:ring-4 focus:outline-none focus:ring-golden-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah</button>

                <!-- Main modal -->
                <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <form action="{{ route('user-file.post') }}" method="POST" class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <div class="">
                                    <h3 class="text-xl font-semibold text-gray-900">
                                        Tambah File
                                    </h3>
                                    <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, eum?</p>
                                </div>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                @csrf
                                <div class="mb-4">
                                    <label for="aspek" class="block mb-2 text-sm font-medium text-gray-900">File Dokumen</label>
                                    <input type="file" name="file" id="file">
                                </div>
                                <div class="">
                                    <label for="aspek" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                                    <select name="type" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                                        <option value="laporan">Laporan</option>
                                        <option value="sertifikat">Sertifikat</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                <button type="submit" class="text-white bg-golden-700 hover:bg-golden-800 focus:ring-4 focus:outline-none focus:ring-golden-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Upload</button>
                                <button id="clear-cpmk" data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-golden-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Main modal end-->
            </div>
        </div>
        @livewire('list-file-user', ['lazy' => true])
    </section>
</main>
@endsection


@push('style')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
@livewireStyles
@endpush


@push('script')
@livewireScripts
{{-- plugin filepond start --}}
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
{{-- plugin filepond end --}}

<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="file"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

    FilePond.setOptions({
        // validate
        acceptedFileTypes: ['application/pdf'],

        server: {
            process: {
                url: "{{ env('CLASSIFICATION_CONNECTION') . 'upload-file-document' }}",
            },
            revert: {
                url: "{{ env('CLASSIFICATION_CONNECTION') . 'revert-file-document' }}",
            }
        },
    });
</script>

<script>

    // Get a reference to the file input element
    const inputTranskip = document.querySelector('input[id="file-transkip"]');

    // Create a FilePond instance
    const test = FilePond.create(inputTranskip);

    test.setOptions({
        // validate
        acceptedFileTypes: ['application/pdf'],

        server: {
            process: {
                url: "{{ env('CLASSIFICATION_CONNECTION') . 'upload-file-transkip' }}",
            },
            revert: {
                url: "{{ env('CLASSIFICATION_CONNECTION') . 'revert-file-transkip' }}",
            }
        },
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = 
{
    series: [{
        name: 'Avg Score',
        data: @json($userProfile->statistik_scores),
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