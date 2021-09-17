<x-jet-form-section submit="">
    <x-slot name="title">
        {{ __('Managing Permission') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create and edit permissions using this form') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <input wire:model="name" class="w-full rounded-lg p-2  mr-0 text-gray-800 bg-white mr-2 @if(count($errors)>0)focus:outline-none border-2 border-red-700 @else border border-gray-200 @endif" placeholder="Permission name"/>
            @error('name') <span class="text-red-700 text-s">{{ $message }}</span> @enderror
        </div>
    </x-slot>
    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>
        @if($updateMode)
            <x-button wire:click="update()" type="edit" label="Update" class="bg-green-500 hover:bg-green-700"/>
        @else
            <x-button wire:click="store()" type="add" label="Create" class="bg-blue-500 hover:bg-blue-700"/>
        @endif
        @if(isset($edit))
            <x-button wire:click="clear()" label="Cancel" type="refresh" class="ml-2"/>
        @endif
    </x-slot>
</x-jet-form-section>
