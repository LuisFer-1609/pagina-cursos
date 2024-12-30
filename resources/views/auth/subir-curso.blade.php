<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Subir curso</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-header></x-header>
    <main class="max-w-[1400px] p-4">
        <form class="w-full md:w-[50%] flex flex-col gap-3 justify-start" id="formSubirCurso">
            @csrf
            <div class="flex flex-col">
                <h2 class="font-semibold text-xl">Sube tu portada</h2>
                <label
                    class="relative w-full min-h-[200px] flex flex-col items-center justify-center border-2 border-dashed border-gray-300 hover:border-blue-400 hover:cursor-pointer rounded-[16px]"
                    id="dragDrop" for="" id="portadaForm">
                    <div class="font-semibold flex flex-col items-center">
                        <x-image-plus-icon></x-image-plus-icon>
                        <span class="text-xl block">Arrastrar y soltar</span>
                        <div>
                            <span>o</span>
                            <span class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg px-3 py-1">Seleccionar
                                archivo</span>
                        </div>
                    </div>
                    <input class="hidden" type="file" name="portada" id="filePortada">
                </label>
            </div>
            <x-label-form :text="'Título del curso'" :type="'text'" :name="'titulo'" :id="'tituloForm'"></x-label-form>
            <x-textarea-form :text="'Descripción del curso'" :type="'textarea'" :name="'descripcion'" :id="'descripcionForm'"></x-textarea-form>
            <label class="relative py-4" for="" id="categoriaForm">
                <select class="w-full" name="categoria">
                    <option value="" selected disabled>Selecciona una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
            </label>
            {{-- <label class="relative py-4" for="" id="leccionesForm">
                <input type="file" name="lecciones">
            </label> --}}
            <button id="btnSubirCurso" class="rounded-lg px-4 py-2 text-white bg-gray-900"
                type="submit">Enviar</button>
        </form>
    </main>

    @vite(['resources/js/forms/subir-curso.js'])
</body>

</html>
