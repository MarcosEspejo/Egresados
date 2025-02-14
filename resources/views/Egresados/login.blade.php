@extends('layouts.app')

@section('title', 'Iniciar Sesión - Egresados')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-cover bg-center relative" style="background-image: url('{{ asset('imagenes/cartagena.jpg') }}');">
    <!-- Overlay para mejor contraste -->
    <div class="absolute inset-0 bg-black opacity-50"></div>

    <!-- Contenido del login -->
    <div class="z-10 max-w-md w-full space-y-8 bg-white shadow-md rounded-lg p-8">
        <div>
            <img class="mx-auto h-13 w-auto" src="{{ asset('imagenes/logo-full.png') }}" alt="Logo">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Iniciar Sesión
            </h2>
        </div>

        <!-- Mensajes de éxito -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mensajes de error -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Formulario de login -->
        <form class="mt-8 space-y-6" action="{{ route('egresados.login.post') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Correo electrónico</label>
                    <input id="email" name="email" type="email" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" placeholder="Correo electrónico">
                </div>
                <div>
                    <label for="documento" class="sr-only">Documento</label>
                    <input id="documento" name="documento" type="text" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out" placeholder="Documento">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    Iniciar Sesión
                </button>
            </div>
        </form>

        <!-- Enlace para registrarse -->
        <div class="mt-6">
            <p class="text-center text-sm text-gray-600">
                ¿No tienes una cuenta? 
                <a href="{{ route('egresados.register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Regístrate aquí
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
