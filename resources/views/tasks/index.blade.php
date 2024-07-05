<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Task List') }}
            </h2>
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/icons/droplet.gif') }}" alt="Droplet Icon" class="w-10 h-10">
                <span class="text-gray-500">{{ auth()->user()->droplet_count }} Droplets</span>
            </div>
        </div>
    </x-slot>

    <style>
        .task-container {
            background-image: url('{{ asset('images/bg8.jpg') }}');
            background-size: cover;
            background-position: center;
            padding: 2rem;
            border-radius: 0px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        
        }

        .custom-button {
            background-image: url('{{ asset('images/button-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            color: black;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .custom-button:hover {
            transform: scale(1.05);
        }
        .icon-button:hover {
            animation: icon-hover 0.5s ease-in-out forwards;
        }
     
        .task-list-item {
            background-color: white;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            text-align: left;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .task-popup-form {
            z-index: 10;
        }

        .icon-button {
            width: 40px;
            height: 40px;
            background-size: cover;
            border: none;
            cursor: pointer;
        }

        .add-task-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-task-form input {
            margin-right: 0.5rem;
        
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6  text-center ">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6 ">Tasks</h3>
            
                <!-- Task Container -->
                <div class="task-container">
                    <!-- Add Task Form -->
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg add-task-form">
                        <form action="{{ route('tasks.store') }}" method="POST" style="width: 100%;">
                            @csrf
                            <div style="display: flex; width: 100%;">
                                <div style="flex: 1;">
                                    <input type="text" name="title" placeholder="Task Title" class="border p-2" required>
                                    <input type="text" name="description" placeholder="Task Description" class="border p-2">
                                </div>
                                <button type="submit" class="icon-button" style="background-image: url('{{ asset('images/icons/add.png') }}');"></button>
                            </div>
                        </form>
                    </div>
                    <br>

                    <!-- Task List -->
                    @foreach($tasks as $task)
                        <div class="task-list-item relative">
                            <!-- Task Details -->
                            <div class="flex justify-between items-center">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-900">{{ $task->title }}</h2>
                                    <p class="text-gray-700">{{ $task->description }}</p>
                                </div>
                                <!-- Action Buttons -->
                                <div class="flex items-center space-x-4 absolute top-4 right-4">
                                    <!-- Complete Button -->
                                    <button onclick="toggleCompletionForm({{ $task->id }})" class="icon-button" style="background-image: url('{{ asset('images/icons/complete.gif') }}');"></button>
                                    
                                    <!-- Edit Button -->
                                    <button onclick="toggleEditForm({{ $task->id }})" class="icon-button" style="background-image: url('{{ asset('images/icons/edit.gif') }}');"></button>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="icon-button" style="background-image: url('{{ asset('images/icons/trash.gif') }}');"></button>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Complete Task Form (hidden by default) -->
                            <form id="complete-task-form-{{ $task->id }}" action="{{ route('tasks.updateCompletion', $task) }}" method="POST" class="hidden task-popup-form absolute top-16 right-4 bg-white p-4 dark:bg-gray-800 shadow sm:rounded-lg">
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
                                <button type="submit" class="custom-button mt-2">Save</button>
                            </form>
                            
                            <!-- Edit Task Form (hidden by default) -->
                            <form id="edit-task-form-{{ $task->id }}" action="{{ route('tasks.update', $task) }}" method="POST" class="hidden task-popup-form absolute top-16 right-4 bg-white p-4 dark:bg-gray-800 shadow sm:rounded-lg">
                                @csrf
                                @method('PUT')
                                <input type="text" name="title" value="{{ $task->title }}" class="border p-2 mr-2" required>
                                <input type="text" name="description" value="{{ $task->description }}" class="border p-2 mr-2">
                                <button type="submit" class="custom-button mt-2">Save</button>
                            </form>
                        </div>
                    @endforeach

                    <!-- Pagination Links -->
                    <div class="mt-4 items-center">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
                            <div class="rights-reserved">
                             © 2024 Khine Zar Thwel, Ladia. All rights reserved.
                            </div>
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
