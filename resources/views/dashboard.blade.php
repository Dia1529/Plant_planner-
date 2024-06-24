<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        body {
            background-color: whitesmoke;
        }
        .custom-button {
            width: 150px;
            height: 150px;
            background-color: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .custom-button:hover {
            transform: scale(1.1);
        }
        .custom-button img {
            width: 80px;
            height: 70px;
        }
        .custom-button-text {
            margin-top: 10px;
            font-size: 1.2em;
            color: #6b7280;
            text-align: center;
        }
        .buttons {
            display: flex;
            justify-content: space-around; /* Evenly space buttons */
            width: 100%; /* Ensure it spans full width */
            padding-top: 2rem; /* Adjust top padding as needed */
        }
        .background-container {
            position: relative;
            width: 100%;
            height: 100%;
        }
        .background-container img {
            width: 100%;
            height: auto;
        }
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Plants & Tasks</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="col-span-1 md:col-span-3 flex justify-center relative">
                        <div class="background-container">
                            <img src="{{ asset('images/bg4.jpg') }}" alt="Garden Icon" class="mx-auto">
                            <div class="content">
                                <div class="buttons">
                                    <a href="{{ route('garden.index') }}" class="custom-button">
                                        <div>
                                            <img src="{{ asset('images/icons/garden2.gif') }}" alt="Garden Icon">
                                            <div class="custom-button-text">Garden</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('tasks.index') }}" class="custom-button">
                                        <div>
                                            <img src="{{ asset('images/icons/task.gif') }}" alt="Task Icon">
                                            <div class="custom-button-text">Tasks</div>
                                        </div>
                                    </a>
                                    <a href="{{ route('shop.index') }}" class="custom-button">
                                        <div>
                                            <img src="{{ asset('images/icons/shop2.gif') }}" alt="Shop Icon">
                                            <div class="custom-button-text">Shop</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
