<div>
    <div class="divide-y divide-gray-200 w-36 {{ $owned ? 'bg-green-400 dark:bg-green-600' : 'bg-red-400 dark:bg-red-500' }}">
        <div class="relative flex items-center justify-between mr-2 ml-2 h-8">
            <div class="text">
                <label for="toxic" class="font-medium text-gray-700">Toxic</label>
            </div>
            <div class="">
                <input wire:click="toggle"
                       id="toxic"
                       aria-describedby="toxic-description"
                       name="recipe"
                       type="checkbox"
                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                        {{ $owned ? 'checked' : ''  }}
                >
            </div>
        </div>
    </div>
</div>
