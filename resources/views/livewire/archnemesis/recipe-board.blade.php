<div class="flex">
    <div class="w-64 mr-4">
        <div wire:ignore>
            <label
                    class="inline-block text-sm text-gray-600 dark:text-gray-300"
                    for="Multiselect"
            >
                Select Recipes
            </label>
            <div class="relative flex w-full">
                <select
                        id="enabledRecipes"
                        name="enabledRecipes[]"
                        wire:model="enabledRecipes"
                        wire:change="updateRecipes"
                        placeholder="Select recipes..."
                        autocomplete="off"
                        class="block w-full rounded-sm cursor-pointer focus:outline-none"
                        multiple
                >
                    @foreach($availableRecipes as $aRecipe => $aTier)
                        <option value="{{ $aRecipe }}" {{ in_array($aRecipe, $enabledRecipes) ? 'selected' : '' }}>{{ $aRecipe }} ({{ $aTier }})</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
        <script>
            new TomSelect('#enabledRecipes', {
                plugins: {
                    remove_button:{
                        title:'Remove this item',
                    }
                },
                persist: false,
                create: true,
                onDelete: function(values) {
                    return confirm(values.length > 1 ? 'Are you sure you want to remove these ' + values.length + ' items?' : 'Are you sure you want to remove "' + values[0] + '"?');
                }
            });
        </script>
    <div class="flex">
    @foreach ($enabledRecipes as $recipe)
        @switch($recipe)
            {{-- T5 --}}
            @case('innocence-touched')
                <div class="w-64">
                    @livewire('archnemesis.innocence-touched')
                </div>
            @break

            {{-- T4 --}}
            @case('lunaris-touched')
                <div class="w-64">
                    @livewire('archnemesis.lunaris-touched')
                </div>
            @break

            {{-- T4 --}}
            @case('solaris-touched')
                <div class="w-64">
                    @livewire('archnemesis.solaris-touched')
                </div>
            @break

            {{-- T4 --}}
            @case('arakaali-touched')
                <div class="w-64">
                    @livewire('archnemesis.arakaali-touched')
                </div>
            @break

            {{-- T4 --}}
            @case('kitava-touched')
                <div class="w-64">
                    @livewire('archnemesis.kitava-touched')
                </div>
            @break

            {{-- T4 --}}
            @case('shakari-touched')
                <div class="w-64">
                    @livewire('archnemesis.shakari-touched')
                </div>
            @break

            {{-- T3 --}}
            @case('empowering-minions')
                <div class="w-64">
                    @livewire('archnemesis.empowering-minions')
                </div>
            @break

            {{-- T3 --}}
            @case('corpse-detonater')
                <div class="w-64">
                    @livewire('archnemesis.corpse-detonater')
                </div>
            @break

            {{-- T3 --}}
            @case('abberath-touched')
                <div class="w-64">
                    @livewire('archnemesis.abberath-touched')
                </div>
            @break

            {{-- T3 --}}
            @case('tukohama-touched')
                <div class="w-64">
                    @livewire('archnemesis.tukohama-touched')\
                </div>
            @break

            {{-- T3 --}}
            @case('soul-eater')
                <div class="w-64">
                    @livewire('archnemesis.soul-eater')
                </div>
            @break

            {{-- T3 --}}
            @case('effigy')
                <div class="w-64">
                    @livewire('archnemesis.effigy')
                </div>
            @break

            {{-- T3 --}}
            @case('crystal-skinned')
                <div class="w-64">
                    @livewire('archnemesis.crystal-skinned')
                </div>
            @break

            {{-- T3 --}}
            @case('temporal-bubble')
                <div class="w-64">
                    @livewire('archnemesis.temporal-bubble')
                </div>
            @break

            {{-- T3 --}}
            @case('empowered-elements')
                <div class="w-64">
                    @livewire('archnemesis.empowered-elements')
                </div>
            @break

            {{-- T3 --}}
            @case('trickster')
                <div class="w-64">
                    @livewire('archnemesis.trickster')
                </div>
            @break

            {{-- T3 --}}
            @case('brine-king-touched')
                <div class="w-64">
                    @livewire('archnemesis.brine-king-touched')
                </div>
            @break

            {{-- T2 --}}
            @case('necromancer')
                <div class="w-64">
                    @livewire('archnemesis.necromancer')
                </div>
            @break

            {{-- T2 --}}
            @case('executioner')
                <div class="w-64">
                    @livewire('archnemesis.executioner')
                </div>
            @break

            {{-- T2 --}}
            @case('invulnerable')
                <div class="w-64">
                    @livewire('archnemesis.invulnerable')
                </div>
            @break

            {{-- T2 --}}
            @case('frost-strider')
                <div class="w-64">
                    @livewire('archnemesis.frost-strider')
                </div>
            @break

            {{-- T2 --}}
            @case('magma-barrier')
                <div class="w-64">
                    @livewire('archnemesis.magma-barrier')
                </div>
            @break

            {{-- T2 --}}
            @case('mirror-image')
                <div class="w-64">
                    @livewire('archnemesis.mirror-image')
                </div>
            @break

            {{-- T2 --}}
            @case('mana-siphoner')
                <div class="w-64">
                    @livewire('archnemesis.mana-siphoner')
                </div>
            @break

            {{-- T2 --}}
            @case('entangler')
                <div class="w-64">
                    @livewire('archnemesis.entangler')
                </div>
            @break

            {{-- T2 --}}
            @case('assassin')
                <div class="w-64">
                    @livewire('archnemesis.assassin')
                </div>
            @break

            {{-- T2 --}}
            @case('flame-strider')
                <div class="w-64">
                    @livewire('archnemesis.flame-strider')
                </div>
            @break

            {{-- T2 --}}
            @case('rejuvenating')
                <div class="w-64">
                    @livewire('archnemesis.rejuvenating')
                </div>
            @break

            {{-- T2 --}}
            @case('corrupter')
                <div class="w-64">
                    @livewire('archnemesis.corrupter')
                </div>
            @break

            {{-- T2 --}}
            @case('drought-bringer')
                <div class="w-64">
                    @livewire('archnemesis.drought-bringer')
                </div>
            @break

            {{-- T2 --}}
            @case('treant-horde')
                <div class="w-64">
                    @livewire('archnemesis.treant-horde')
                </div>
            @break

            {{-- T2 --}}
            @case('hexer')
                <div class="w-64">
                    @livewire('archnemesis.hexer')
                </div>
            @break

            {{-- T2 --}}
            @case('evocationist')
                <div class="w-64">
                    @livewire('archnemesis.evocationist')
                </div>
            @break

            {{-- T2 --}}
            @case('ice-prison')
                <div class="w-64">
                    @livewire('archnemesis.ice-prison')
                </div>
            @break

            {{-- T2 --}}
            @case('storm-strider')
                <div class="w-64">
                    @livewire('archnemesis.storm-strider')
                </div>
            @break

            {{-- T2 --}}
            @case('heralding-minions')
                <div class="w-64">
                    @livewire('archnemesis.heralding-minions')
                </div>
            @break
            @default
        @endswitch
    @endforeach
    </div>
</div>