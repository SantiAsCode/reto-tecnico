<div wire:poll.5s="fetchData" class="relative overflow-x-auto shadow-md rounded-lg">
    <table class="w-full h-fit text-sm text-left text-gray-200">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">Tomate</th>
                <th scope="col" class="px-6 py-3 text-center">Limón</th>
                <th scope="col" class="px-6 py-3 text-center">Papa</th>
                <th scope="col" class="px-6 py-3 text-center">Arroz</th>
                <th scope="col" class="px-6 py-3 text-center">Ketchup</th>
                <th scope="col" class="px-6 py-3 text-center">Lechuga</th>
                <th scope="col" class="px-6 py-3 text-center">Cebolla</th>
                <th scope="col" class="px-6 py-3 text-center">Queso</th>
                <th scope="col" class="px-6 py-3 text-center">Carne</th>
                <th scope="col" class="px-6 py-3 text-center">Pollo</th>
            </tr>
        </thead>
        <tbody class="overflow-y-scroll">
            <tr class=" border-t bg-gray-800 border-gray-700 hover:bg-gray-600">
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->tomato ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->lemon ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->potato ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->rice ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->ketchup ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->lettuce ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->onion ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->cheese ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->meat ?? 0 }}</td>
                <td class="px-6 py-4 text-center">{{ $ingredients_stocks->chicken ?? 0 }}</td>
            </tr>
        </tbody>
    </table>
</div>