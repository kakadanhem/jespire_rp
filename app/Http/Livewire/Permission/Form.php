<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Form extends Component
{
    public $name, $selected;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required|min:5|unique:permissions',
        'selected' => 'required|numeric',
    ];

    protected $listeners = [
        'editClicked' => 'edit',
        'destroyClicked' => 'destroy'
    ];

    private function resetInput()
    {
        $this->name = null;
        $this->selected = null;
        $this->resetValidation();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function clear(){
        $this->resetInput();
        $this->updateMode = false;
    }

    public function store()
    {
        $this->selected = 0;
        $this->validate();
        Permission::create([
            'name' => $this->name,
        ]);
        $this->resetInput();
        $this->emit('saved');
        $this->emitTo('permission.listing', 'refreshPermissions');
    }

    public function edit($id)
    {
        $record = Permission::findById($id);
        $this->selected = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|min:5|unique:permissions,name,' . $this->selected,
            'selected' => 'required|numeric',
        ]);

        if ($this->selected) {
            $record = Permission::findOrFail($this->selected);
            $record->update([
                'name' => $this->name,
            ]);
            $this->emit('saved');
            $this->emitTo('permission.listing', 'refreshPermissions');
            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = Permission::findOrFail($id);
            $name = $record->name;
            $record->delete();
            $this->emit('saved');
            $this->emitTo('permission.listing', 'refreshPermissions');
        }
    }

    public function render()
    {
        return view('livewire.permission.form');
    }
}
