<?php

namespace App\Livewire;

use Livewire\Component;

class ListFileUser extends Component
{
    use \Livewire\WithPagination;

    public function placeholder(){
        return view('livewire.skeleton.loading');
    }
    protected $queryString = ['search' => ['except' => '']];

    public string $search = '';

    public $filterKurikulum = '';

    public $perPage = 10;

    public function render()
    {
        $userFiles = \App\Models\UserFile::where('user_id', auth()->user()->id)
        ->when($this->search != '', function($query){
            $query->where('labels', 'like', "%" . $this->search . "%")
            ->orWhere( 'file', 'like', "%" . $this->search . "%")
            ->orWhere( 'type', 'like', "%" . $this->search . "%");
        })
        ->paginate($this->perPage);

        return view('livewire.list-file-user', compact('userFiles'));
    }
}
