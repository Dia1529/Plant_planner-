<!-- resources/views/tasks/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Task List') }}
            </h2>
            <span class="text-gray-500 dark:text-gray-400">{{ auth()->user()->droplet_count }} Droplets</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Add Task Form -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <input type="text" name="title" placeholder="Task Title" class="border p-2 mr-2" required>
                        <input type="text" name="description" placeholder="Task Description" class="border p-2 mr-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Task</button>
                    </form>
                </div>
            </div>

            <!-- Task List -->
            @foreach($tasks as $task)
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg relative">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $task->title }}</h2>
                            <p class="text-gray-700 dark:text-gray-300">{{ $task->description }}</p>
                        </div>
                        <div class="flex items-center space-x-4 absolute top-4 right-4">
                            <!-- Complete Button -->
                            <button onclick="toggleCompletionForm({{ $task->id }})" class="bg-blue-500 text-white px-4 py-2 rounded-md">Complete</button>
                            
                            <!-- Edit Button -->
                            <button onclick="toggleEditForm({{ $task->id }})" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Edit</button>
                            
                            <!-- Delete Button -->
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Delete</button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Complete Task Form (hidden by default) -->
                    <form id="complete-task-form-{{ $task->id }}" action="{{ route('tasks.updateCompletion', $task) }}" method="POST" class="hidden absolute top-16 right-4 bg-white p-4 dark:bg-gray-800 shadow sm:rounded-lg">
                        @csrf
                        @method('PUT')
                        <label>
                            <input type="radio" name="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
                            Yes
                        </label>
                        <label>
                            <input type="radio" name="completed" value="0" {{ $task->completed ? '' : 'checked' }}>
                            No
                        </label>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md mt-2">Save</button>
                    </form>
                    
                    <!-- Edit Task Form (hidden by default) -->
                    <form id="edit-task-form-{{ $task->id }}" action="{{ route('tasks.update', $task) }}" method="POST" class="hidden absolute top-16 right-4 bg-white p-4 dark:bg-gray-800 shadow sm:rounded-lg">
                        @csrf
                        @method('PUT')
                        <input type="text" name="title" value="{{ $task->title }}" class="border p-2 mr-2" required>
                        <input type="text" name="description" value="{{ $task->description }}" class="border p-2 mr-2">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md mt-2">Save</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleEditForm(taskId) {
            document.getElementById(`edit-task-form-${taskId}`).classList.toggle('hidden');
        }

        function toggleCompletionForm(taskId) {
            document.getElementById(`complete-task-form-${taskId}`).classList.toggle('hidden');
        }
    </script>
</x-app-layout>
