<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Listing extends Component
{
    public $data, $columns;

    protected $listeners = [
        'refreshPermissions' => 'refresh',
    ];

    public function render()
    {
        $this->data = Permission::all();
        $this->columns = array('Name', 'Created At');
        return view('livewire.permission.listing');
    }
    public function refresh(){
        $this->data = Permission::all();
    }
    public function edit($id)
    {
        $this->emitTo('permission.form', 'editClicked', $id);
    }
    public function destroy($id)
    {
        $this->emitTo('permission.form', 'destroyClicked', $id);
    }
}
