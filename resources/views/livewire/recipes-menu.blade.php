<div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 mx-2 mb-6">
    @if($recipes_menu)
    @foreach($recipes_menu as $recipe)
    <div class="flex flex-col items-center border rounded-lg shadow md:flex-row md:max-w-xl border-gray-700 bg-gray-800 hover:bg-gray-700">
        <img class="object-cover w-full h-96 md:h-auto md:w-48 rounded-lg" src="{{url('/img/recipe_'.$recipe['id'].'.webp')}}" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ $recipe['name'] }}</h5>
            <p class="mb-3 font-normal text-gray-400">{{ $recipe['description'] }}</p>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-l-lg">Ingrediente</th>
                        <th scope="col" class="px-6 py-3">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['tomato'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Tomate</th>
                            <td class="px-6 py-4">{{ $recipe['tomato'] }}</td>
                        @endif
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['lemon'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Limón</th>
                            <td class="px-6 py-4">{{ $recipe['lemon'] }}</td>
                        @endif
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['potato'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Papa</th>
                            <td class="px-6 py-4">{{ $recipe['potato'] }}</td>
                        @endif
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['rice'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Arroz</th>
                            <td class="px-6 py-4">{{ $recipe['rice'] }}</td>
                        @endif
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['ketchup'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Ketchup</th>
                            <td class="px-6 py-4">{{ $recipe['ketchup'] }}</td>
                        @endif
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['lettuce'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Lechuga</th>
                            <td class="px-6 py-4">{{ $recipe['lettuce'] }}</td>
                        @endif
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['onion'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Cebolla</th>
                            <td class="px-6 py-4">{{ $recipe['onion'] }}</td>
                        @endif
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['cheese'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Queso</th>
                            <td class="px-6 py-4">{{ $recipe['cheese'] }}</td>
                        @endif
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['meat'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Carne</th>
                            <td class="px-6 py-4">{{ $recipe['meat'] }}</td>
                        @endif
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        @if($recipe['chicken'] > 0)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Pollo</th>
                            <td class="px-6 py-4">{{ $recipe['chicken'] }}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
    @endif
</div>
