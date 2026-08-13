<!doctype html>
<html>
<head><meta charset="utf-8"><title>Éditer la tâche</title></head>
<body>
<h1>Éditer la tâche</h1>

<form action="{{ route('tasks.update', $task) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label>Titre: <input type="text" name="title" value="{{ old('title', $task->title) }}" required></label>
        @error('title')<div style="color:red">{{ $message }}</div>@enderror
    </div>
    <div>
        <label>Description:<br>
            <textarea name="description">{{ old('description', $task->description) }}</textarea>
        </label>
        @error('description')<div style="color:red">{{ $message }}</div>@enderror
    </div>
    <div>
        <label>Status:
            <select name="status" required>
                <option value="pending" {{ old('status', $task->status)=='pending' ? 'selected' : '' }}>pending</option>
                <option value="in_progress" {{ old('status', $task->status)=='in_progress' ? 'selected' : '' }}>in_progress</option>
                <option value="done" {{ old('status', $task->status)=='done' ? 'selected' : '' }}>done</option>
            </select>
        </label>
        @error('status')<div style="color:red">{{ $message }}</div>@enderror
    </div>
    <div>
        <label>Due date: <input type="datetime-local" name="due_date" value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d\TH:i') : '') }}"></label>
        @error('due_date')<div style="color:red">{{ $message }}</div>@enderror
    </div>
    <button type="submit">Enregistrer</button>
    <a href="{{ route('tasks.index') }}">Retour</a>
</form>
</body>
</html>