@extends('layouts.signedProfile')

@section('title_page', 'Iniciar sesión')

@section('style_head')
    <style>
        body {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@section('style_head')

@endsection

@section('form')
    <section
        class="max-w-[1000px] w-[95%] h-auto m-auto flex flex-col md:flex-row items-center justify-between gap-3 shadow-2xl p-2 rounded-lg">

        <div class="p-5 lg:p-0 m-auto">
            <form action="{{ route('login') }}" method="POST" class="relative max-w-[400px] m-auto rounded-lg">
                @csrf
                <h1 class="text-2xl text-center font-semibold pb-2">Disfruta ahora de esta experiencia gratuita con los
                    cursos que
                    siempre quisiste
                    tomar
                </h1>
                <x-label-form :text="'Correo electrónico'" :type="'email'" :name="'email'" :id="'emailForm'"></x-label-form>
                <div>
                    <x-label-form :text="'Contraseña'" :type="'password'" :name="'password'" :id="'passwordForm'"></x-label-form>
                    <a class="float-right font-semibold text-blue-600 underline -mt-2" href="{{ url('/register') }}">¿Aún no
                        tienes una cuenta?</a>
                </div>

                <button class="bg-gray-900 text-white rounded-lg px-4 py-2 mt-4" type="submit">Iniciar sesión</button>
            </form>
        </div>
        <div class="h-full w-[400px] rounded-lg overflow-hidden">
            <img class="w-[400px] h-auto" src="{{ asset('img/img-login.jpg') }}" alt="">
        </div>
        {{-- <picture class="order-0 md:order-1">
        <source media="(min-width: 768px)" srcset="{{ asset('svgs/sign-in.svg') }}">
        <img width="300" src="{{ asset('svgs/sign-mobile-1.svg') }}" alt="">
    </picture> --}}
    </section>
@endsection
