<!doctype html>
<html>
<head><meta charset="utf-8"><title>Liste des tâches</title></head>
<body>
<h1>Liste des tâches</h1>

<form method="get" action="{{ route('tasks.index') }}">
    <label>Status:
        <select name="status">
            <option value="">Tous</option>
            <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>pending</option>
            <option value="in_progress" {{ request('status')=='in_progress' ? 'selected' : '' }}>in_progress</option>
            <option value="done" {{ request('status')=='done' ? 'selected' : '' }}>done</option>
        </select>
    </label>
    <label>Trier:
        <select name="direction">
            <option value="asc" {{ request('direction','asc')=='asc' ? 'selected' : '' }}>Due date ↑</option>
            <option value="desc" {{ request('direction')=='desc' ? 'selected' : '' }}>Due date ↓</option>
        </select>
    </label>
    <label>Par page:
        <input type="number" name="per_page" value="{{ request('per_page',15) }}" min="1" />
    </label>
    <button type="submit">Filtrer</button>
    <a href="{{ route('tasks.create') }}">Créer une tâche</a>
</form>

@if($tasks->count())
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Status</th>
                <th>Échéance</th>
                <th>Créée le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></td>
                <td>{{ Str::limit($task->description, 100) }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->due_date ? $task->due_date->format('Y-m-d H:i') : '-' }}</td>
                <td>{{ $task->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}">Éditer</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $tasks->withQueryString()->links() }}
@else
    <p>Aucune tâche trouvée.</p>
@endif

</body>
</html>