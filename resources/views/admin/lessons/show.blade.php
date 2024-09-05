@extends('layouts.admin')

@section('content')
    <div class="p-4 border mb-4">
        <h1 class="text-2xl font-bold">{{ $lesson->title }}</h1>
        <p>Durée : {{ $lesson->duration }} minutes</p>

        <h2 class="text-xl font-bold mt-4">Contenu de la Leçon</h2>
        <div>
            {!! nl2br(e($lesson->content)) !!} <!-- Affiche le contenu avec les retours à la ligne -->
        </div>
        
        <a href="{{ route('admin.cours.lessons.index', ['cours_id' => $lesson->cours_id]) }}" class="btn btn-secondary mt-4">Retour aux leçons</a>
    </div>
@endsection