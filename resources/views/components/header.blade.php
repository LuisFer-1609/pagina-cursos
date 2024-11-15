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

<header class="relative">
    <input class="peer/menu hidden" type="checkbox" name="" id="menu">
    <label class="relative z-[2] inline-flex p-4" for="menu">
        <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path class="line line1" d="M4 6l16 0" />
            <path class="line line2" d="M4 12l16 0" />
            <path class="line line3" d="M4 18l16 0" />
        </svg>
    </label>

    <nav
        class="absolute left-[-100%] top-0 z-[1] peer-checked/menu:left-0 transition-all duration-300 w-full min-h-screen flex flex-col justify-between items-center bg-gray-200">
        <div></div>
        @if (auth()->check())
            <span>
                {{ auth()->user()->name }}
            </span>
            <a class="w-[90%] flex justify-center items-center gap-2 bg-gray-900 text-white py-2 rounded-lg mb-2"
                href="{{ url('subir-curso') }}">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none">
                    <style>
                        @keyframes slide-right {
                            0% {
                                transform: translateY(0)
                            }

                            to {
                                transform: translateY(-1px)
                            }
                        }
                    </style>
                    <path fill="#FFFFFF"
                        d="M7.77 9.87l.724.2-.723-.2zm8.46 0l.723-.197-.724.198zm-7.198 4.27a.75.75 0 000-1.5v1.5zm5.982-1.5a.75.75 0 100 1.5v-1.5zm-9.363.063c0-1.085.88-1.964 1.964-1.964v-1.5a3.464 3.464 0 00-3.464 3.464h1.5zm1.964-1.964a.911.911 0 00.88-.67l-1.447-.396a.589.589 0 01.567-.434v1.5zm.88-.67A3.637 3.637 0 0112 7.398v-1.5a5.137 5.137 0 00-4.952 3.775l1.446.396zM12 7.398a3.636 3.636 0 013.506 2.671l1.447-.396A5.137 5.137 0 0012 5.898v1.5zm3.506 2.671c.11.402.475.67.879.67v-1.5c.259 0 .496.171.567.434l-1.446.396zm.879.67c1.085 0 1.964.879 1.964 1.964h1.5a3.464 3.464 0 00-3.464-3.464v1.5zM5.684 14.14h3.348v-1.5H5.684v1.5zm9.33 0h3.302v-1.5h-3.301v1.5zm3.335-1.438c0-.014.004-.034.013-.053a.083.083 0 01.018-.025c.001-.001-.004.003-.017.008a.146.146 0 01-.047.008v1.5c.692 0 1.533-.493 1.533-1.438h-1.5zm-14.198 0c0 .945.842 1.438 1.533 1.438v-1.5a.145.145 0 01-.047-.008c-.013-.005-.018-.009-.017-.008a.114.114 0 01.031.078h-1.5z" />
                    <path fill="#265BFF"
                        d="M12.566 14.927a.566.566 0 11-1.132 0h1.132zm-1.132-4.53a.566.566 0 011.132 0h-1.132zm-.921 1.91a.566.566 0 11-.801-.8l.8.8zM12 10.02l-.4-.4a.566.566 0 01.8 0l-.4.4zm2.288 1.487a.566.566 0 11-.8.801l.8-.8zm-2.854 3.421v-4.53h1.132v4.53h-1.132zm-1.722-3.42l1.888-1.89.8.8-1.887 1.888-.801-.8zm2.688-1.89l1.888 1.887-.8.801L11.6 10.42l.8-.801z"
                        style="animation:slide-right .5s cubic-bezier(1,-.43,.68,.57) infinite alternate both" />
                </svg>
                Subir curso
            </a>
        @else
            <a class="w-[90%] flex justify-center items-center gap-2 bg-gray-900 text-white py-2 rounded-lg mb-2"
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
                    <circle class="user-2" cx="12" cy="7.858" r="2.5" stroke="#265BFF" stroke-width="1.5" />
                    <rect width="10" height="4" x="7" y="13.926" stroke="#FFFFFF" stroke-width="1.5"
                        rx="2" />
                </svg>

                Iniciar sesión
            </a>
        @endif
    </nav>

</header>
