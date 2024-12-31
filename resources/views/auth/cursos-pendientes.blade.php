@extends('layouts.default')

@section('main')
    <main class="w-full">
        <article class="max-w-[800px] w-[90%] m-auto flex flex-col gap-4">
            <h1 class="font-semibold text-2xl">Cursos pendientes por revisar</h1>
            @foreach ($cursos as $curso)
                <div class="flex gap-5 rounded-lg shadow-lg overflow-hidden">
                    <div class="max-h-[150px] w-[250px] overflow-hidden">
                        <img class="w-full h-full object-cover hover:scale-[1.1] transition-transform duration-300"
                            height="200" src="{{ asset('storage/' . $curso->imagen) }}" alt="">
                    </div>
                    <div class="flex-1">
                        <h2 class="h-[30%] content-center font-semibold text-xl">
                            {{ $curso->titulo }}
                        </h2>
                        <span>
                            {{ $curso->descripcion }}
                        </span>
                    </div>

                    <a class="content-center px-4 py-2 rounded-e-lg bg-gray-900 text-white font-semibold"
                        href="{{ url('/curso/verificar-cursos/' . $curso->id) }}">
                        Revisar
                    </a>

                </div>
            @endforeach
        </article>
    </main>
@endsection
