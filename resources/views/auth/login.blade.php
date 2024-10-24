<!-- component -->
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<style>
    /*remove custom style*/
    .circles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .circles li {
        position: absolute;
        display: block;
        list-style: none;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.2);
        animation: animate 25s linear infinite;
        bottom: -150px;
    }

    .circles li:nth-child(1) {
        left: 25%;
        width: 80px;
        height: 80px;
        animation-delay: 0s;
    }


    .circles li:nth-child(2) {
        left: 10%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 12s;
    }

    .circles li:nth-child(3) {
        left: 70%;
        width: 20px;
        height: 20px;
        animation-delay: 4s;
    }

    .circles li:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        animation-delay: 0s;
        animation-duration: 18s;
    }

    .circles li:nth-child(5) {
        left: 65%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
    }

    .circles li:nth-child(6) {
        left: 75%;
        width: 110px;
        height: 110px;
        animation-delay: 3s;
    }

    .circles li:nth-child(7) {
        left: 35%;
        width: 150px;
        height: 150px;
        animation-delay: 7s;
    }

    .circles li:nth-child(8) {
        left: 50%;
        width: 25px;
        height: 25px;
        animation-delay: 15s;
        animation-duration: 45s;
    }

    .circles li:nth-child(9) {
        left: 20%;
        width: 15px;
        height: 15px;
        animation-delay: 2s;
        animation-duration: 35s;
    }

    .circles li:nth-child(10) {
        left: 85%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        animation-duration: 11s;
    }

    @keyframes animate {

        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }

        100% {
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
        }

    }
</style>
<div class="relative min-h-screen flex ">
    <div
        class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
        <div class="sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
            style="background-image: url(https://pbs.twimg.com/media/E1UtHfGWEAE6NDS?format=jpg&name=4096x4096);">
            <div class="absolute bg-gradient-to-b from-green-600 to-lime-500 opacity-75 inset-0 z-0"></div>
            <div class="w-full  max-w-md z-10">
                <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6">Sistema para el Control y Seguimiento
                    de Modalidades de Titulación</div>
                <div class="sm:text-sm xl:text-md text-gray-200 font-normal"> ----
                </div>
            </div>
            <!---remove custom style-->
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div
            class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full w-2/5 xl:w-2/5 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white">
            <div class="max-w-md w-full space-y-8">
                <div class="text-center">
                    <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="10" height="">
                    <h2 class="mt-6 text-3xl font-bold text-gray-900">
                        ¡Bienvenido de nuevo!
                    </h2>
                    <p class="mt-2 text-sm text-gray-500">Por favor inicia sesión en tu cuenta</p>
                </div>
                <div class="flex flex-row justify-center items-center space-x-3">
                            {{-- <a href="https://in.linkedin.com/in/ajeeshmon" target="_blank"
                               class="w-11 h-11 items-center justify-center inline-flex rounded-2xl font-bold text-lg  text-white bg-blue-500 hover:shadow-lg cursor-pointer transition ease-in duration-300"><img
                               src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yMy45OTQgMjR2LS4wMDFoLjAwNnYtOC44MDJjMC00LjMwNi0uOTI3LTcuNjIzLTUuOTYxLTcuNjIzLTIuNDIgMC00LjA0NCAxLjMyOC00LjcwNyAyLjU4N2gtLjA3di0yLjE4NWgtNC43NzN2MTYuMDIzaDQuOTd2LTcuOTM0YzAtMi4wODkuMzk2LTQuMTA5IDIuOTgzLTQuMTA5IDIuNTQ5IDAgMi41ODcgMi4zODQgMi41ODcgNC4yNDN2Ny44MDF6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtLjM5NiA3Ljk3N2g0Ljk3NnYxNi4wMjNoLTQuOTc2eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTIuODgyIDBjLTEuNTkxIDAtMi44ODIgMS4yOTEtMi44ODIgMi44ODJzMS4yOTEgMi45MDkgMi44ODIgMi45MDkgMi44ODItMS4zMTggMi44ODItMi45MDljLS4wMDEtMS41OTEtMS4yOTItMi44ODItMi44ODItMi44ODJ6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg=="
                               class="w-4 h-4"></a> --}}
                </div>
                <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="hidden" name="remember" value="true">
                    <div class="relative">
                        <div class="absolute right-3 mt-4"><svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <label for="email" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Email</label>
                        <input id="email"
                            class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500"
                            type="text" @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email', 'admin@themesbrand.com') }}"
                            placeholder="Introduzca la dirección de correo electrónico">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-8 content-center">
                        <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide" for="userpassword">
                            Contraseña
                        </label>
                        <input type="password"
                            class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500"
                            @error('password') is-invalid @enderror" value="12345678" name="password" id="userpassword"
                            placeholder="Introduce su contraseña">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox"
                                class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded"
                                id="auth-remember-check" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="auth-remember-check" class="ml-2 block text-sm text-gray-900">
                                Recuérdame
                            </label>
                        </div>

                        <div class="text-sm">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-indigo-400 hover:text-blue-500">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center bg-gradient-to-r from-red-400 to-blue-600  hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                            Inicia sesión
                        </button>
                    </div>

                    <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                        <span>¿Todavía no tienes una cuenta?</span>
                        <a href="{{ url('register') }}"
                            class="text-green-400 hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">
                            Regístrate</a>
                    </p>
                    
                    <div class="flex items-center justify-center space-x-2">
                        <span class="h-px w-16 bg-gray-200"></span>
                        <span class="text-gray-300 font-normal">© U-TIC. Developed by Themesbrand</span>
                        <span class="h-px w-16 bg-gray-200"></span>
                        {{-- Mini-texto
                    <p class="flex flex-col items-center justify-center mt-10 text-center text-xs text-gray-500">©
                        U-TIC. Developed by Themesbrand</p> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
