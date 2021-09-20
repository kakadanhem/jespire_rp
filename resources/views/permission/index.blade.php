<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('main.manage') }} {{ __('main.permission') }}s
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @livewire('permission.form')
        <x-jet-section-border />
        @livewire('permission.listing')
    </div>
</x-app-layout>
