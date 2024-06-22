<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Garden') }}
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

            <!-- Plant List -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($plants as $plant)
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h2 class="text-2xl font-semibold mb-2">{{ ucfirst($plant->type) }}</h2>
                        <p class="text-gray-700 dark:text-gray-300">{{ getPlantStageDescription($plant->stage) }}</p>
                        <img src="{{ asset('images/' . $plant->type . '/' . $plant->stage . '.png') }}" alt="{{ $plant->type }} stage {{ $plant->stage }}" class="w-full h-48 object-cover rounded-lg mb-2">
                        @if ($plant->stage < 4)
                            <form method="POST" action="{{ route('garden.water', $plant) }}">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                                    Water Plant ({{ getDropletsRequired($plant->stage) }} droplets)
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('garden.memo', $plant) }}">
                                @csrf
                                <textarea name="memo" class="w-full mt-2 rounded-md" placeholder="Write a memo...">{{ $plant->memo }}</textarea>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mt-2">
                                    Add Memo
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @php
        function getPlantStageDescription($stage) {
            switch ($stage) {
                case 1:
                    return 'Seed';
                case 2:
                    return 'Leaflet';
                case 3:
                    return 'Young Plant';
                case 4:
                    return 'Full Bloom';
                default:
                    return 'Unknown Stage';
            }
        }

        function getDropletsRequired($stage) {
            switch ($stage) {
                case 1:
                case 2:
                    return 3;
                case 3:
                    return 4;
                default:
                    return 0;
            }
        }
    @endphp
</x-app-layout>
