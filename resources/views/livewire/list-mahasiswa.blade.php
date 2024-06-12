<div>
    <div class="flex flex-wrap justify-between gap-4 mb-2">
        <div class="sm:flex w-full sm:w-3/12 items-center gap-3">
            <p class="text-sm">Filter Type</p>
            <div class="flex">
                <select wire:model.change="filterBadge" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-golden-500 focus:border-golden-500 block w-full p-2.5 capitalize">
                    <option value="">--Semua--</option>
                    <option value="web progammer">Web Progammer</option>
                    <option value="cyber crime analysis">cyber crime analysis</option>
                </select>
            </div>
        </div>
        <div class="w-full sm:w-3/12">
            <input type="search" wire:model.live.debounce.400ms="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-golden-500 focus:border-golden-500 block w-full p-2.5" placeholder="Search...">
        </div>
    </div>
    <div wire:loading class="w-full gap-3 p-4 border border-gray-100 shadow rounded-md mb-2">
        <div class="flex justify-center">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin fill-golden-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
        </div>
    </div>
    <div wire:loading.remove class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-golden-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Mahasiswa
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Prodi
                    </th>
                    <th scope="col" class="px-6 py-4 w-4/12">
                        Badge
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Score Akademik
                    </th>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $key => $item)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td class="px-6 py-4">
                        {{ ($users->currentPage() - 1) * $users->perPage() + $key + 1 }}
                    </td>
                    <th scope="row" class="px-6 py-4">
                        {{ $item->name }}
                    </th>
                    <td class="px-6 py-4">
                        Informatika S1
                    </td>
                    <td class="px-6 py-4 flex">
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($item->oneProfile->transkip_badge as $badge => $level)
                            @if ($level == 2)
                            <p class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-yellow-300">{{ $badge}}</p>
                            @elseif($level == 1)
                            <p class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-blue-300">{{ $badge}}</p>
                            @else
                            <p class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-gray-300">{{ $badge}}</p>
                            @endif

                            @php
                                $count++;
                            @endphp

                            @if($count == 2)
                                <p>{{ count($item->oneProfile->transkip_badge) - 2 }}+ more</p>
                                @break
                            @endif
                        @endforeach
                    </td>
                    <th scope="row" class="px-6 py-4">
                        {{ $item->oneProfile->transkip_point }} pt
                    </th>
                    <td class="px-6 py-4">
                        <a href="#{{ $item->uuid }}">view</a>
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

    <div class="flex items-center gap-3 mt-4">
        <p class="text-sm">Per Page</p>
        <select name="filter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-1" wire:model.change="perPage">
            <option>10</option>
            <option>50</option>
            <option>100</option>
        </select>
    </div>
    
    <div class="w-full mt-4">
        {{ $users->links() }}
    </div>
</div>