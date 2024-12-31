@extends('layouts.default')

@section('main')
    <span>{{ $curso }}</span>
    <section class="flex-grow flex flex-col md:flex-row gap-4">
        <article class="flex-1 flex flex-col p-3">
            <h2 class="text-xl font-semibold">Lista de videos del curso</h2>
            <main class="flex-1 rounded-lg border-[1px] border-gray-900">
            </main>
            <div class="flex flex-col md:flex-row items-center justify-end gap-4 p-2">
                <span class="font-semibold">¿Deseas aprobar este curso?</span>
                <form class="flex flex-row gap-2 font-semibold" id="verificarCurso" action="">
                    <button class="rounded-lg px-4 py-2 text-white bg-blue-500 outline outline-3 outline-blue-500"
                        data-id="{{ $idCurso }}">Aprobar</button>
                    <button
                        class="rounded-lg px-4 py-2 outline outline-3 outline-gray-900 hover:bg-red-500 hover:text-white hover:outline-red-500 transition-colors duration-300"
                        data-id="{{ $idCurso }}">Rechazar</button>
                </form>
            </div>
        </article>
    </section>
@endsection
