<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Garden') }}
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

        .plant-container {
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
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Plants</h3>

                <!-- Plant Container -->
                <div class="plant-container">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($plants as $plant)
                            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 relative">
                                <div class="flex justify-between items-center mb-2">
                                    <h2 class="text-2xl font-semibold">{{ ucfirst($plant->type) }}</h2>

                                    @if ($plant->stage >= 4)
                                        <!-- Memo Button for Full Bloom -->
                                        <button onclick="document.getElementById('memo-form-{{ $plant->id }}').classList.toggle('hidden');" class="icon-button" style="background-image: url('{{ asset('images/icons/memo.png') }}');"></button>
                                    @endif

                                    <!-- Delete Button (Always Visible) -->
                                    <form method="POST" action="{{ route('garden.delete', $plant) }}" class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="icon-button" style="background-image: url('{{ asset('images/icons/cross.png') }}');"></button>
                                    </form>
                                </div>

                                <p class="text-gray-700 dark:text-gray-300 mb-2">{{ $plant->stageDescription }}</p>
                                <img src="{{ asset('images/' . $plant->type . '/' . $plant->stage . '.gif') }}" alt="{{ $plant->type }} stage {{ $plant->stage }}" class="w-full h-48 object-cover rounded-lg mb-2">

                                <div class="w-full bg-gray-200 rounded-full h-4 mb-4">
                                    <div class="bg-green-500 h-4 rounded-full" style="width: {{ $plant->wateringProgress }}%"></div>
                                </div>

                                @if ($plant->stage < 4)
                                    <form method="POST" action="{{ route('garden.water', $plant) }}">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                                            Water Plant (1 droplet)
                                        </button>
                                    </form>
                                @endif

                                @if ($plant->memo && $plant->stage >= 4)
                                    <!-- Memo Display for Full Bloom -->
                                    <p class="text-gray-700 dark:text-gray-300 mt-4">{{ $plant->memo }}</p>
                                @endif

                                @if ($plant->stage >= 4)
                                    <!-- Memo Form for Full Bloom -->
                                    <form method="POST" action="{{ route('garden.memo', $plant) }}" id="memo-form-{{ $plant->id }}" class="hidden mt-4">
                                        @csrf
                                        <textarea name="memo" class="w-full mt-2 rounded-md" placeholder="Write a memo...">{{ $plant->memo }}</textarea>
                                        <div class="grid place-items-center">
                                            <button class="custom-button">Save Memo</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination Links -->
                <div class="mt-6">
                    {{ $plants->links() }}
                </div>
            </div>
            <div class="rights-reserved">
                             © 2024 Khine Zar Thwel, Ladia. All rights reserved.
                            </div>
        </div>
    </div>
</x-app-layout>
