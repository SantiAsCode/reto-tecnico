@extends('layouts.app')

@section('content')
    <div class="queued-bg preparing-bg delayed-bg served-bg"></div>
    <div class="relative flex flex-col justify-start items-center min-h-screen bg-dots-darker bg-center bg-dots-lighter bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="flex flex-col divide-y-2 justify-center items-center my-8 gap-2">
            <h1 class="text-3xl font-semibold text-gray-400">Jornada de almuerzo ¡gratis!</h1>
            <h2 class="text-2xl font-semibold text-gray-400">Reto técnico</h2>
        </div>
        <div>
            <div class="relative h-fit scale-100 p-6 mb-6 mx-2 bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
                    <livewire:make-order-btn />
                    <livewire:reset-day-btn />
                </div>
                <livewire:current-order />
            </div>
            <div class="scale-100 p-6 mb-6 mx-2 bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <h2 class="mb-4 text-xl font-semibold text-white">Historial de Ordenes</h2>
                <livewire:order-list />
            </div>
            <div class="scale-100 p-6 mb-6 mx-2 bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <h2 class="mb-4 text-xl font-semibold text-white">Stock de Ingredientes</h2>
                <livewire:ingredients-stocks />
            </div>
            <div class="scale-100 p-6 mb-6 mx-2 bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <h2 class="mb-4 text-xl font-semibold text-white">Compras del Mercado</h2>
                <livewire:market-transactions />
            </div>
            <div class="scale-100 p-6 mb-6 mx-2 bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <h2 class="mb-4 text-xl font-semibold text-white">Menú</h2>
                <livewire:recipes-menu />
            </div>
        </div>
    </div>
@endsection
