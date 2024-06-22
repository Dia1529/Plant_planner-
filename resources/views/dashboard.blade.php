<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
            {{ __('Dashboard') }}
            <span class="text-gray-500 dark:text-gray-400">{{ auth()->user()->droplet_count }} Droplets</span>
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 flex justify-between items-center">
                <!-- Left-aligned links -->
                <div>
                    <a href="{{ route('garden.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-4 hover:bg-blue-600">Go to Garden</a>
                    <a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-gray-900">Go to Tasks</a>
                </div>

                <!-- Right-aligned link -->
                <div>
                    <a href="{{ route('shop.index') }}" class="text-gray-700 hover:text-gray-900">Shop</a>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
