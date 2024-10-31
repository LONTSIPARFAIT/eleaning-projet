@extends('layouts.admin')

@section('content')
<section class="py-8 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800">Mes Cours</h2>

        @if($courses->isEmpty())
            <p class="mt-4">Vous n'êtes abonné à aucun cours.</p>
        @else
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach ($cours as $cour)
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-semibold">{{ $course->title }}</h3>
                        <p class="mt-2">{{ $course->description }}</p>
                        <p class="mt-2">Durée : {{ $cour->duration }} minutes</p>
                        <p class="mt-2">Prix : {{ $cour->price }} €</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection