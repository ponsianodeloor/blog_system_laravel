<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class Roles extends Component
{
    use WithPagination;
    protected  $paginationTheme = 'bootstrap';

    public $search;

    public function render()
    {
        $roles = Role::where('name', 'LIKE', '%'.$this->search.'%')
            ->paginate();

        return view('livewire.admin.roles', compact('roles'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
