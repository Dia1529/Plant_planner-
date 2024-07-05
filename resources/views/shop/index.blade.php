<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Shop') }}
            </h2>
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/icons/droplet.gif') }}" alt="Droplet Icon" class="w-10 h-10">
                <span class="text-gray-500">{{ auth()->user()->droplet_count }} Droplets</span>
            </div>
        </div>
    </x-slot>

    <style>
        .icon-button {
            width: 20px;
            height: 20px;
            background-size: cover;
            border: none;
            cursor: pointer;
        }

        .custom-button {
            background-image: url('{{ asset('images/button-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            color: black;
            padding: 0.5rem 1rem;
            border: 1px solid black; /* Adding a thin black border */
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .custom-button:hover {
            transform: scale(1.05);
        }

        .shop-container {
            background-color: #D3E8C9;
            background-size: cover;
            background-position: center;
            padding: 2rem;
            border-radius: 0px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .rights-reserved {
            margin-top:auto; /* Push the element to the bottom */
            font-size: 0.9em;
            color: #6b7280;
            text-align: center;
            padding-top: 20px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Shop</h3>

                <!-- Shop Container -->
                <div class="shop-container">
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
            <div class="rights-reserved">
                             © 2024 Khine Zar Thwel, Ladia. All rights reserved.
                            </div>
        </div>
        </div>
    </div>
</x-app-layout>
