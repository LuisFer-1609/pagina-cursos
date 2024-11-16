@props(['imagen', 'titulo', 'descripcion'])

<a class="max-w-[300px] shadow rounded overflow-hidden" href="">
    <div class="overflow-hidden">
        <img class="w-full h-auto object-cover aspect-video hover:scale-[1.1] transition duration-300 overflow-hidden"
            width="400" src="{{ asset('storage/' . $imagen) }}" alt="Portada del curso">
    </div>
    <div class="p-2">
        <h3 class="font-semibold text-xl"> {{ $titulo }} </h3>
        <span class=""> {{ $descripcion }} </span>
    </div>
</a>
