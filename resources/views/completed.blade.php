@extends('template')
@section('title', 'Tâches terminées')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Tâches terminées</h1>
                <ul class="list-group mt-3">
                    @foreach ($todos as $todo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $todo->texte }}</span>
                            <div class="actions">
                                <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger">Supprimer</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
