@extends('template')
@section('title', 'Ma Todo List')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- Formulaire -->
                <form action="{{ route('todo.save') }}" method="post" class="add">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="oi oi-pencil"></span></span>
                        <input id="texte" name="texte" type="text" class="form-control"
                            placeholder="Prendre une note…" aria-label="My new idea" aria-describedby="basic-addon1" />
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Enregistrer</button>
                </form>
                <!-- Liste des tâches en cours -->
                <h1>Tâches en cours</h1>
                <ul class="list-group mt-3">
                    @foreach ($todos->where('fin', 0) as $todo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $todo->texte }}</span>
                            <!-- Actions pour Terminer et supprimer -->
                            <div class="actions">
                                <a href="{{ route('todo.done', ['id' => $todo->id]) }}" class="btn btn-primary">Terminer</a>
                                <a href="{{ route('todo.delete', ['id' => $todo->id]) }}"
                                    class="btn btn-danger">Supprimer</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <!-- Liste des tâches terminées ->
                    @if ($todos->where('fin', 1)->count())
                        <h1>Tâches terminées</h1>
                        <ul class="list-group mt-3">
                            @foreach ($todos->where('fin', 1) as $todo)
    <li class="list-group-item d-flex justify-content-between align-items-center text-muted">
                                    <span>{{ $todo->texte }}</span>
                                    <!-- Action pour supprimer -->
                <div class="actions">
                    <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger">Supprimer</a>
                </div>
                </li>
                @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
