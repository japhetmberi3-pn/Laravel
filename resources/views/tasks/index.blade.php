<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mes tâches</title>
</head>
<body>
    <h1>Mes tâches</h1>
    <a href="{{ route('tasks.create') }}">Nouvelle tâche</a>

    <ul id="tasks">
        @foreach($tasks as $task)
            <li data-id="{{ $task->id }}">
                <strong>{{ $task->title }}</strong> ({{ $task->status }})
            </li>
        @endforeach
    </ul>

    
</body>
</html>