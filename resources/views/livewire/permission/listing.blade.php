<x-jet-form-section submit="">
    <x-slot name="title">
        {{ __('Permission Listing') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create and edit permissions using this form') }}
    </x-slot>

    <x-slot name="form">
        <table class="min-w-full table-fixed col-span-6">
            <thead>
            <tr>
                @for ($i = 0; $i < count($columns); $i++)
                    <x-list-table-header>
                        {{ $columns[$i] }}
                    </x-list-table-header>
                @endfor
                <x-list-table-header style="width: 100px">
                    Action
                </x-list-table-header>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach ($data as $row)
                <tr>
                    <x-list-table-data>
                        {{ $row->name }}
                    </x-list-table-data>

                    <x-list-table-data>
                        {{ $row->created_at }}
                    </x-list-table-data>

                    <x-list-table-data>
                        <div class="flex items-center">
                            <x-button wire:click="edit({{$row->id}})" label="Edit" type="edit" class="mr-2 bg-green-400 hover:bg-green-600"/>
                            <x-button wire:click="destroy({{$row->id}})" label="Delete" type="delete" class="bg-red-400 hover:bg-red-600"/>
                        </div>
                    </x-list-table-data>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-slot>
    <x-slot name="actions">
        Great opportunity comes great responsibility.
    </x-slot>
</x-jet-form-section>
