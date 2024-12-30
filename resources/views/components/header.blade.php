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
</style>

<header class="relative w-full">
    <input class="peer/menu hidden" type="checkbox" name="" id="menu">
    <label class="inline-flex md:hidden relative cursor-pointer z-[999] p-4" for="menu">
        <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path class="line line1" d="M4 6l16 0" />
            <path class="line line2" d="M4 12l16 0" />
            <path class="line line3" d="M4 18l16 0" />
        </svg>
    </label>

    <nav
        class="absolute left-[-100%] top-0 z-[998] peer-checked/menu:left-0 transition-all duration-300 md:static w-full min-h-screen md:min-h-min flex flex-col md:flex-row justify-end bg-gray-200 md:p-2">
        <div></div>
        <div class="md:w-auto md:m-0 flex flex-col md:flex-row gap-5">
            <div class="w-[50%] m-auto md:w-auto flex flex-col md:flex-row gap-4">
                @if (auth()->check())
                    <button
                        class="relative w-full md:w-full h-auto group flex justify-center items-center gap-2 bg-gray-900 text-white rounded-lg px-4 py-2">
                        <span class="">
                            {{ auth()->user()->name }}
                        </span>
                        <x-arrow-down :class="'group-focus-within:rotate-180 transition-transform duration-300'"></x-arrow-down>
                        <ul
                            class="absolute -top-[220%] md:top-[150%] left-[50%] translate-x-[-50%] w-full h-0 overflow-hidden bg-gray-900 group-focus-within:h-auto rounded-lg">
                            <li class="w-full hover:bg-white/20 px-4 py-2 transition-colors duration-300">
                                <a class="w-full h-full" href="{{ url('/curso/cursos-pendientes') }}">Revisar cursos</a>
                            </li>
                            <li class="hover:bg-white/20 px-4 py-2 transition-colors duration-300">
                                <a class="w-full h-full" href="{{ url('/curso/cursos-pendientes') }}">Cerrar sesión</a>
                            </li>
                        </ul>
                    </button>

                    <a class="w-full flex justify-center items-center gap-2 bg-gray-900 text-white rounded-lg mb-2 md:mb-0 px-4 py-2 whitespace-nowrap"
                        href="{{ url('/curso/subir-curso') }}">
                        <x-upload-file></x-upload-file>
                        Subir curso
                    </a>
                @else
                    <a class="w-[90%] md:w-auto flex justify-center items-center gap-2 bg-gray-900 text-white rounded-lg mb-2 md:mb-0 px-4 py-2"
                        href="{{ url('/login') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <style>
                                .user-2 {
                                    animation: user-2 1s cubic-bezier(0.83, -0.07, 0, 1.04) both infinite alternate-reverse;
                                }

                                @keyframes user-2 {
                                    0% {
                                        transform: translateY(0) translateX(0);
                                    }

                                    100% {
                                        transform: translateY(-1px) translateX(2px);
                                    }
                                }
                            </style>
                            <circle class="user-2" cx="12" cy="7.858" r="2.5" stroke="#265BFF"
                                stroke-width="1.5" />
                            <rect width="10" height="4" x="7" y="13.926" stroke="#FFFFFF" stroke-width="1.5"
                                rx="2" />
                        </svg>

                        Iniciar sesión
                    </a>
                @endif
            </div>
        </div>
    </nav>

</header>
