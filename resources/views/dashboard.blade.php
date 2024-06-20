<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('garden.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-4 hover:bg-blue-600">Go to Garden</a>

                <!-- Tasks Button -->
                <a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-gray-900">Go to Tasks</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
