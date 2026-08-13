<!doctype html>
<html>
<head><meta charset="utf-8"><title>Créer une tâche</title></head>
<body>
<h1>Créer une tâche</h1>

<form action="{{ route('tasks.store') }}" method="post">
    @csrf
    <div>
        <label>Titre: <input type="text" name="title" value="{{ old('title') }}" required></label>
        @error('title')<div style="color:red">{{ $message }}</div>@enderror
    </div>
    <div>
        <label>Description:<br>
            <textarea name="description">{{ old('description') }}</textarea>
        </label>
        @error('description')<div style="color:red">{{ $message }}</div>@enderror
    </div>
    <div>
        <label>Status:
            <select name="status" required>
                <option value="pending" {{ old('status')=='pending' ? 'selected' : '' }}>pending</option>
                <option value="in_progress" {{ old('status')=='in_progress' ? 'selected' : '' }}>in_progress</option>
                <option value="done" {{ old('status')=='done' ? 'selected' : '' }}>done</option>
            </select>
        </label>
        @error('status')<div style="color:red">{{ $message }}</div>@enderror
    </div>
    <div>
        <label>Due date: <input type="datetime-local" name="due_date" value="{{ old('due_date') }}"></label>
        @error('due_date')<div style="color:red">{{ $message }}</div>@enderror
    </div>
    <button type="submit">Créer</button>
    <a href="{{ route('tasks.index') }}">Retour</a>
</form>
</body>
</html>