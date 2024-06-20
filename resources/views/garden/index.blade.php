@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">My Garden</h1>
    <div class="grid grid-cols-3 gap-4">
        @foreach($plants as $plant)
            <div class="bg-white shadow-md p-4">
                <h2 class="text-xl font-semibold">{{ $plant->name ?? 'Unnamed Plant' }}</h2>
                <div class="progress-bar">
                    <div class="progress" style="width: {{ $plant->progress * 10 }}%;"></div>
                </div>
                <p>Progress: {{ $plant->progress }}/10</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
