<?php

namespace App\Livewire;

use Livewire\Component;

class ListMahasiswa extends Component
{
    use \Livewire\WithPagination;

    public function placeholder(){
        return view('livewire.skeleton.loading');
    }
    protected $queryString = ['search' => ['except' => '']];

    public string $search = '';

    public $filterBadge = '';

    public $perPage = 10;


    public function render()
    {
        $users = \App\Models\User::with('oneProfile')
        ->when($this->search != '', function($query){
            $query->where('name', 'like', "%" . $this->search . "%")
            ->orWhereHas('oneProfile', function($subQuery){
                $subQuery->where('transkip_badge', 'like', "%" . $this->search . "%");
            });
        })
        ->when($this->filterBadge != '', function($query){
            $query->whereHas('oneProfile', function($subQuery){
                $subQuery->where('transkip_badge', 'like', "%" . $this->filterBadge . "%");
            });
        })
        ->paginate($this->perPage);

        return view('livewire.list-mahasiswa', compact('users'));
    }
}
