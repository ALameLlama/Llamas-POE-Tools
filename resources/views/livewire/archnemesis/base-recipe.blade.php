<div class="flex flex-col w-80 mr-12">
    <div class="overflow-x-auto">
        <div class="shadow overflow-hidden border-b border-gray-200 dark">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-inherit">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Recipe Component</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                </tr>
                </thead>
                <tbody class="bg-inherit divide-y divide-gray-200">
                {{ json_encode($recipes) }}
                @foreach($recipes as $recipe => $amount)
                    @if ($amount > 0)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-300">{{ Str::headline($recipe) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $amount }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>