<x-guest-layout>
<div class="flex justify-center items-center h-screen">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg border-light-green border-4">
        <div class="text-center">
            <img src="{{ asset('images/logo4.gif') }}" alt="Logo" class="w-40 h-40 mx-auto mb-4">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-4">Plant Task Planner</h1>
            <p class="text-base text-gray-600 dark:text-gray-300 mb-8">Welcome to Ladii's Green Realm, Plant Task Planner,<br>where your virtual gardening dreams bloom into reality!</p>

            <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-md shadow-md transition-colors duration-300">Get Started Now</a>
        </div>
    </div>
</div>

<style>
    .border-light-green {
        border-color: #D3E8C9; /* Border color */
    }
</style>
</x-guest-layout>
