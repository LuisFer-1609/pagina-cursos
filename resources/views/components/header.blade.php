<style>
    .menu-icon .line {
        transition: transform 0.3s ease, opacity 0.3s ease;
        /* Suaviza la transición */
        transform-origin: center;
        /* Define el centro como el punto de transformación */
    }

    #menu:checked~label .menu-icon .line1 {
        transform: rotate(45deg) translate(3px, 3px);
        /* Rota y ajusta la línea superior */
    }

    #menu:checked~label .menu-icon .line2 {
        opacity: 0;
        /* Oculta la línea central al hacer clic */
    }

    #menu:checked~label .menu-icon .line3 {
        transform: rotate(-45deg) translate(3px, -3px);
        /* Rota y ajusta la línea inferior */
    }

    #optionsProfile {
        display: none;
    }

    #profile:focus-within #optionsProfile {
        display: inline-flex;
    }
</style>

<header class="relative max-w-[1400px] m-auto flex items-center justify-between md:justify-end gap-3 p-4">
    <input class="peer/menu hidden" type="checkbox" name="" id="menu">
    <label class="inline-flex md:hidden relative cursor-pointer z-[999] p-2" for="menu">
        <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path class="line line1" d="M4 6l16 0" />
            <path class="line line2" d="M4 12l16 0" />
            <path class="line line3" d="M4 18l16 0" />
        </svg>
    </label>

    {{-- Input busqueda de cursos --}}
    <input class="w-fit md:focus:w-[50%] transition-all duration-300 p-2 rounded-lg border-[1px] border-gray-300"
        style="interpolate-size: allow-keywords;" type="search" name="buscar" id="buscarCursos"
        placeholder="Buscar cursos">

    {{-- Nav desktop --}}
    <nav id="navDesktop" class="flex justify-end gap-4 cursor-pointer">
        @if (Auth::check())
            <span id="profile" tabindex="0">
                <img class="w-[32px] h-auto" src="{{ asset('/img/default-profile-image.webp') }}" alt="">
                {{-- Opciones del perfil de usuario --}}
                <div class="w-full md:max-w-[200px] md:w-fit flex flex-col absolute right-0 top-[60px] [&>a:hover]:bg-black/20 bg-white shadow-lg rounded-lg overflow-hidden"
                    id="optionsProfile">
                    <div class="w-full flex flex-col items-center justify-center gap-2 p-2">
                        <img class="w-[32px] h-auto" src="{{ asset('/img/default-profile-image.webp') }}"
                            alt="">
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="flex flex-col">
                        <a class="p-2" href="{{ url('/perfil') }}">Perfil</a>
                        <a class="p-2" href="{{ url('/curso/cursos-pendientes') }}">Cursos pendientes</a>
                        <a class="p-2" href="{{ url('/curso/subir-curso') }}">Subir curso</a>
                        <a href="">
                            <form action="{{ url('/logout') }}" method="post">
                                @csrf
                                <button class="p-2" type="submit">Cerrar sesión</button>
                            </form>
                        </a>
                    </div>
                </div>
            </span>
        @else
            <a class="" href="{{ url('/login') }}">Iniciar sesión</a>
            <a href="{{ url('/register') }}">Registrarse</a>
        @endif

    </nav>


</header>
