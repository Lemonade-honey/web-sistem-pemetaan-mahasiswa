@extends('layout.app')

@section('body')
<header class="mb-10">
    <h1 class="text-3xl font-medium text-golden-600">My Dashboard</h1>
    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore blanditiis officiis quaerat vitae, quas ex quo natus veritatis tenetur ipsa.</p>
</header>
<main>
    <section class="mb-10">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <div class="col-span-2">
                <div class="w-full p-2 border border-golden-200 shadow rounded-lg">
                    <div class="mb-4">
                        <h2 class="text-xl font-medium text-golden-600">Profile</h2>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="w-full p-2 border border-golden-200 shadow rounded-lg">
                    <div class="mb-4">
                        <h2 class="text-xl font-medium text-golden-600">Statistik</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mb-4">
            <div class="sm:flex items-center sm:justify-between">
                <div class="">
                    <h2 class="text-xl font-medium text-golden-600">File User</h2>
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

        @include('includes.alert')

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            {{-- pop over start --}}
            <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-golden-200 rounded-lg shadow-sm opacity-0">
                <div class="px-3 py-2 bg-golden-100 border-b border-golden-200 rounded-t-lg">
                    <h3 class="font-semibold text-gray-900">Score File</h3>
                </div>
                <div class="px-3 py-2">
                    <p>merupakan score hasil dari klasifikasi file dokumen oleh mesin</p>
                </div>
                <div data-popper-arrow></div>
            </div>
            {{-- pop over end --}}

            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-golden-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-4 w-2/5 font-medium text-gray-900 whitespace-nowrap">
                            File
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Scores <span data-popover-target="popover-default"><i class="fa-regular fa-circle-question"></i></span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Labels
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($userFiles as $key => $item)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="px-6 py-4">
                            {{ ($userFiles->currentPage() - 1) * $userFiles->perPage() + $key + 1 }}
                        </td>
                        <th scope="row" class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ env('CLASSIFICATION_CONNECTION') . 'library?folder_path=' . $item->path }}" target="__blank" class="text-golden-700 hover:underline">{{ $item->file }}</a>
                        </th>
                        <td class="px-6 py-4">
                            @foreach ($item->scores as $key => $score)
                                <div class="flex justify-between">
                                    <div class="{{ $score > 50 ? 'font-medium' : '' }} capitalize">{{ $key }}</div>
                                    <div class=""> {{ $score }}</div>
                                </div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            @foreach ($item->labels as $label)
                                <div class="font-medium capitalize">{{ $label }}</div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ $item->type }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-900 font-medium text-md">Tidak Ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection


@push('style')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
@endpush


@push('script')
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
        acceptedFileTypes: ['image/*', 'application/pdf'],

        server: {
            process: {
                url: "{{ env('CLASSIFICATION_CONNECTION') . 'upload-file' }}",
            },
            revert: {
                url: "{{ env('CLASSIFICATION_CONNECTION') . 'delete-file' }}",
            }
        },
    });
</script>
@endpush