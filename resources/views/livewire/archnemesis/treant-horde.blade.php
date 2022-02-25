<div x-data={show:true} class="border">
    <div class="divide-y divide-gray-200 w-48 {{ $owned ? 'bg-green-400 dark:bg-green-600' : ($childOwned ? 'bg-yellow-400 dark:bg-yellow-600' : 'bg-red-400 dark:bg-red-500')}}">
        <div class="relative flex items-center justify-between mr-2 ml-2 h-8">

            <div class="text">
                <div class="flex items-center">
                    <div @click="show=!show" class="transition" :class="show ? 'rotate-90' : ''">
                        <svg class="w-4 h-4" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7">

                            </path>
                        </svg>
                    </div>
                    <label for="sentinel" class="font-medium text-gray-700">Treant Horde</label>
                </div>
            </div>
            <div class="">
                <input wire:click="toggle"
                       id="sentinel"
                       aria-describedby="sentinel-description"
                       name="recipe"
                       type="checkbox"
                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                        {{ $owned ? 'checked' : ''  }}
                >
            </div>
        </div>
        <div x-show="show" class="ml-4 border-l-2" x-collapse="">
            @livewire('archnemesis.toxic', ['parent' => $parent])
            @livewire('archnemesis.steel-infused', ['parent' => $parent])
            @livewire('archnemesis.sentinel', ['parent' => $parent])
        </div>
    </div>
</div>
