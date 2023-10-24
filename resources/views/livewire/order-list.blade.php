<div wire:poll.5s="fetchData" class="relative h-56 overflow-x-auto shadow-md rounded-tl-lg rounded-bl-lg">
    <table class="w-full h-fit text-sm text-left text-gray-200">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">Orden Nº</th>
                <th scope="col" class="px-6 py-3 text-center">Plato</th>
                <th scope="col" class="px-6 py-3 text-center">Estado</th>
                <th scope="col" class="px-6 py-3 text-center">Hora de Pedido</th>
            </tr>
        </thead>
        <tbody class="h-32 overflow-y-scroll">
            @if ($order_list != [])
            @foreach($order_list as $order)
            <tr class="border-t bg-gray-800 border-gray-700 hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 text-center font-medium whitespace-nowrap text-white">{{ $order->id ?? 0 }}</th>
                <td class="px-6 py-4 text-center">{{ $order->recipe_name ?? "" }}</td>
                <td class="px-6 py-4 text-center {{ $order->status ?? '' }}-bg">{{ App\Models\Order::STATUS_TRANSLATE[$order->status ?? "queued"] }}</td>
                <td class="px-6 py-4 text-center">{{ $order->created_at ?? "" }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>