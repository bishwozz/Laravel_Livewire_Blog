<x-layouts.app>
    <x-header />
 
    <div> 
        <x-sidebar>
            @include('livewire.navbar')
        </x-sidebar>
 
        <div>
            {{ $slot }}
       </div>
    </div>
 
    <x-footer />
</x-layouts.app>