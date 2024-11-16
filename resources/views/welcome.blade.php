<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <x-header></x-header>
    <main class="flex-1 p-2">
        <section>
            <h2 class="font-semibold text-2xl">Cursos recién lanzados</h2>
            <article class="flex gap-4">
                @foreach ($cursos as $curso)
                    <x-card-curso :imagen="$curso->imagen" :titulo="$curso->titulo" :descripcion="$curso->descripcion"></x-card-curso>
                @endforeach
            </article>
        </section>
    </main>
</body>

</html>
