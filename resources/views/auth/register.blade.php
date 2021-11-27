<x-guest-layout>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
          <img
            aria-hidden="true"
            class="object-cover w-full h-full dark:hidden"
            src="{{ asset('img/login-gas.jpeg') }}"
            alt="Office"
          />
          <img
            aria-hidden="true"
            class="hidden object-cover w-full h-full dark:block"
            src="{{ asset('img/login-gas.jpeg') }}"
            alt="Office"
          />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
          <div class="w-full">
            <h1 class="mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Registrarse
            </h1>
            <x-jet-validation-errors class="mb-4"/>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <label class="block text-sm">
                <x-jet-label for="name" class="text-sm text-gray-700 dark:text-gray-400" value="{{ __('Name') }}"/>
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
              </label>
              <label class="block mt-4 text-sm">
                <x-jet-label for="email" class="text-sm text-gray-700 dark:text-gray-400" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
              </label>
              <label class="block mt-4 text-sm">
                <x-jet-label for="password" value="{{ __('Contrasenia') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"/>
              </label>
              <label class="block mt-4 text-sm">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Consenia') }}"/>
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password"/>
              </label>
              <div class="flex mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                  <span class="ml-2">
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                      <div class="mt-4">
                        <x-jet-label for="terms">
                          <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>
                            <div class="ml-2">
                              {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                      'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                      'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                              ]) !!}
                            </div>
                          </div>
                        </x-jet-label>
                      </div>
                    @endif
                  </span>
                </label>
              </div>

              <button
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit">
                Crear Cuenta
              </button>
            </form>
            <hr class="my-8" />

            <p class="mt-4">
              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Ya estas registrado?') }}
              </a>

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-guest-layout>
