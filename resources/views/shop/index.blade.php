<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Shop') }}
            </h2>
            <span class="text-gray-500 dark:text-gray-400">{{ auth()->user()->droplet_count }} Droplets</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Seed List -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($seeds as $seed)
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h2 class="text-2xl font-semibold mb-2">{{ ucfirst($seed) }}</h2>
                        <img src="{{ asset('images/' . $seed . '/fullbloom.gif') }}" alt="{{ $seed }} full bloom" class="w-full h-48 object-cover rounded-lg mb-2">
                        <form method="POST" action="{{ route('shop.buy') }}">
                            @csrf
                            <input type="hidden" name="seed" value="{{ $seed }}">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                                Buy Seed (10 droplets)
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
