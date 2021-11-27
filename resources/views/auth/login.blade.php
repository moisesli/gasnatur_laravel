<x-guest-layout>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('img/login-gas.jpeg') }}" alt="Office"/>
          <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{ asset('img/login-gas.jpeg') }}" alt="Office"/>
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1 class="mb-1 text-xl font-semibold text-gray-700 dark:text-gray-200">
              GasNatur
            </h1>
            <p class="text-xs mb-4 text-gray-500">
              Llena los datos con tu correo y contrasenia por favor.
              <x-jet-validation-errors class="mb-4" />
              @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                  {{ session('status') }}
                </div>
              @endif
            </p>
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <label class="block text-sm" for="email">
                <span class="text-gray-700 dark:text-gray-400">Correo</span>
                <input id="email" name="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="micorreo@gmail.com"/>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Contrasenia</span>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************"/>
              </label>

              <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Entrar al Sistema
              </button>

            </form>

            <hr class="my-8" />

            <p class="mt-4">
              <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./forgot-password.html">
                Olvidaste tu contrasenia?
              </a>
            </p>
            <p class="mt-1">
              <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./create-account.html">
                Create una cuenta.
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-guest-layout>
