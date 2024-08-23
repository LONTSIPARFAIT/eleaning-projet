{{-- @extends('layouts.app')


@section('content')
<div class="container mx-auto my-8">
    <div class="flex justify-center">
        <div class="w-full md:w-8/12">
            <div class="bg-white shadow-md rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-medium">Cours</h2>
                </div>

                <div class="p-6">
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="w-full text-left table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cours as $cour)
                            <tr>
                                <td class="border px-4 py-2">{{ $cour->id }}</td>
                                <td class="border px-4 py-2">{{ $cour->title }}</td>
                                <td class="border px-4 py-2">{{ $cour->description }}</td>
                                <td class="border px-4 py-2"> --}}
                                    {{-- <div class="flex space-x-2">
                                        <a href="{{ route('admin.cours.show', $cour->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-sm">View</a>
                                        <a href="{{ route('admin.cours.edit', $cour->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md text-sm">Edit</a>
                                        <form action="{{ route('admin.cours.destroy', $cour->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-sm" onclick="return confirm('Voulez vous supprimer ??')">Delete</button>
                                        </form>
                                    </div> --}}
                                {{-- </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}