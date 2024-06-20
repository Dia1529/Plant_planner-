<x-guest-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="text-center">
        <img src="{{ asset('images/logo.gif') }}" alt="Logo" class="w-40 h-40 mx-auto mb-4">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-4">Plant Task Planner</h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">Welcome to Plant Task Planner, where your virtual gardening dreams bloom into reality!</p>
           
            <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-md shadow-md transition-colors duration-300">Get Started Now</a>

        </div>
    </div>
</x-guest-layout>
