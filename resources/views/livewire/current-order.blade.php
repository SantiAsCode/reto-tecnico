<div wire:poll.1s="fetchData" class="relative w-full overflow-x-auto shadow-md rounded-lg">
    <table class="w-full h-fit text-sm text-left text-gray-200">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">Orden Nº</th>
                <th scope="col" class="px-6 py-3 text-center">Plato</th>
                <th scope="col" class="px-6 py-3 text-center">Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-800 hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 text-center font-medium whitespace-nowrap text-white">{{ $current_order->id }}</th>
                <td class="px-6 py-4 text-center">{{ $current_order->recipe_name }}</td>
                <td class="px-6 py-4 text-center {{ $current_order->status }}-bg">{{ $status }}</td>
            </tr>
        </tbody>
    </table>
</div>