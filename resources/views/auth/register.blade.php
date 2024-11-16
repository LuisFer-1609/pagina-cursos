@extends('layouts.signedProfile')

@section('title_page', 'Registro')

@section('form')
    <section class="max-w-[1400px] w-[90%] m-auto flex flex-col md:flex-row items-center justify-center gap-3">
        <form action="{{ route('register') }}" method="POST"
            class="relative max-w-[500px] w-[90%] -mt-[50px] bg-white p-10 mb-2 rounded-lg order-1 shadow-2xl md:-mt-0 md:bg-none md:shadow-none md:mb-0 md:order-0">
            @csrf
            <h1 class="text-xl text-center font-semibold pb-2">Disfruta ahora de esta experiencia gratuita con los
                cursos que
                siempre quisiste
                tomar
            </h1>
            <x-label-form :text="'Nombre de usuario'" :type="'text'" :name="'name'"></x-label-form>
            <x-label-form :text="'Correo electrónico'" :type="'email'" :name="'email'"></x-label-form>
            <x-label-form :text="'Contraseña'" :type="'password'" :name="'password'"></x-label-form>
            <div class="">
                <x-label-form :text="'Confirmar contraseña'" :type="'password'" :name="'password_confirmation'"></x-label-form>
                <a class="float-right font-semibold text-blue-600 underline -mt-2" href="{{ url('/login') }}">¿Ya tienes una
                    cuenta?</a>
            </div>

            <button class="bg-gray-900 text-white rounded-lg px-4 py-2 mt-4" type="submit">Registrarse</button>
        </form>
        <picture class="order-0 md:order-1">
            <source media="(min-width: 768px)" srcset="{{ asset('svgs/sign-mobile-1.svg') }}">
            <img width="300" src="{{ asset('svgs/sign-mobile-1.svg') }}" alt="">
        </picture>
    </section>
@endsection
