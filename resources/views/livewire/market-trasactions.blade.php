<div wire:poll.5s="fetchData" class="relative h-56 overflow-x-auto shadow-md rounded-tl-lg rounded-bl-lg">
    <table class="w-full h-fit text-sm text-left text-gray-200">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">Ingrediente</th>
                <th scope="col" class="px-6 py-3 text-center">Cantidad</th>
                <th scope="col" class="px-6 py-3 text-center">Hora de compra</th>
            </tr>
        </thead>
        <tbody class="h-32 overflow-y-scroll">
            @if ($market_trasactions != [])
            @foreach($market_trasactions as $transaction)
            <tr class="border-t bg-gray-800 border-gray-700 hover:bg-gray-600">
                <td class="px-6 py-4 text-center">{{ App\Models\Ingredient::NAME_TRANSLATE[$transaction->ingredient_name ?? "tomato"] }}</td>
                <td class="px-6 py-4 text-center">{{ $transaction->quantity ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $transaction->created_at ?? "" }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>