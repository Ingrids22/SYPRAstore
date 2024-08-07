<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenid@') }} {{ Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("¡Iniciaste sesión!") }}
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ url('/catalogo') }}">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded">
                        Ir al Catálogo
                    </button>
                </a>
            </div>
            <div class="mt-4">
                <form action="{{ route('cliente.ordenes') }}" method="GET">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                        Ver Órdenes
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
