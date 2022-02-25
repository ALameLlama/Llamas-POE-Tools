<x-app-layout>
    <div class="flex min-w-full justify-between">
        <div class="w-56">
            @livewire('archnemesis.treant-horde')
{{--            @livewire('archnemesis.hexer')--}}
{{--            @livewire('archnemesis.corrupter')--}}
            @livewire('archnemesis.effigy')
            @livewire('archnemesis.crystal-skinned')
        </div>

        <div class="float-right">
            @livewire('archnemesis.base-recipe')
        </div>
    </div>
</x-app-layout>
