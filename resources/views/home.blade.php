@extends('template')
@section('title', 'Ma Todo List')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- Formulaire -->
                <form action="{{ route('todo.save') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="oi oi-pencil"></span></span>
                        <input id="texte" name="texte" type="text" class="form-control"
                            placeholder="Prendre une note…" aria-label="My new idea" aria-describedby="basic-addon1" />
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
                <!-- Liste -->
                <ul class="list-group">
                    @forelse ($todos as $todo)
                        <li class="list-group-item">
                            <span>{{ $todo->texte }}</span>
                            <!-- Actions pour Terminer et supprimer -->
                            <div class="actions">
                                <a href="{{ route('todo.done', ['id' => $todo->id]) }}" class="btn btn-success">Terminer</a>
                                <a href="{{ route('todo.delete', ['id' => $todo->id]) }}"
                                    class="btn btn-danger">Supprimer</a>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item text-center">C'est vide !</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
