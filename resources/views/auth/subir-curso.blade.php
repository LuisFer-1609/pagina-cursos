<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-header></x-header>
    <main class="max-w-[1400px] p-4">
        <form class="w-full md:w-[50%] flex flex-col gap-3 justify-start" action="{{ url('/post-curso') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="file" name="portada" id="">
            <x-label-form :text="'Título del curso'" :type="'text'" :name="'titulo'"></x-label-form>
            <x-textarea-form :text="'Descripción del curso'" :type="'textarea'" :name="'descripcion'"></x-textarea-form>
            <select name="categoria" id="">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
            <button class="rounded-lg px-4 py-2 text-white bg-gray-900" type="submit">Enviar</button>
        </form>
    </main>
</body>

</html>
