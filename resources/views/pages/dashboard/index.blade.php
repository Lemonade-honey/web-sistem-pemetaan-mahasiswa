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
            <h2 class="text-xl font-medium text-golden-600">File User</h2>
            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, explicabo!</p>
        </div>
        {{-- pop over start --}}
        <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-golden-200 rounded-lg shadow-sm opacity-0">
            <div class="px-3 py-2 bg-golden-100 border-b border-golden-200 rounded-t-lg">
                <h3 class="font-semibold text-gray-900">Score File</h3>
            </div>
            <div class="px-3 py-2">
                <p>merupakan hasil dari klasifikasi file dokumen oleh mesin</p>
            </div>
            <div data-popper-arrow></div>
        </div>
        {{-- pop over end --}}

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                            Score <span data-popover-target="popover-default"><i class="fa-regular fa-circle-question"></i></span>
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
                    
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection