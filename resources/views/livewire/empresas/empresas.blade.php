<div>
  <!-- Titulo -->
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Empresas</h2>

  <!-- Table Empresa -->
  <div class="mr-10 pl-0 pr-4">
    <div class="w-full bg-white dark:bg-gray-800 dark:border-gray-700 shadow-lg rounded-md border border-gray-200 px-4">
      <header class="px-5 pt-5 pb-4 border-b border-gray-100 dark:border-gray-700">
        <a
          wire:click="openModal()"
          href="#"
          class="text-center px-4 py-2 bg-purple-500 text-gray-200 rounded-md text-sm font-medium">
          <i wire:loading wire:target="openModal" class="text-xl fas fa-spinner fa-spin"></i>
          <i wire:loading.remove wire:target="openModal" class="fa fa-plus"></i>
          Nuevo
        </a>
      </header>

      {{--Modal --}}
      @if($modal)
        <div
          class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
          style="background: rgba(0,0,0,.7);">
          <div class="border border-teal-500 shadow-lg modal-container bg-white w-full max-w-xl mx-auto rounded-md shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
              <!--Title-->
              <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Nueva Empresa</p>
                <div wire:click="closex()" class="modal-close cursor-pointer z-50">
                  <i wire:loading wire:target="closex" class="text-xl fas fa-spinner fa-spin"></i>
                  <i wire:loading.remove wire:target="closex" class="text-xl fas fa-times"></i>
                </div>
              </div>

              <!-- Body -->
              <div class="my-5">

                {{-- Primera Fila --}}
                <div class="flex">
                  <div class="w-1/2 mr-0">
                    <x-jet-label
                      for="ruc"
                      class="text-sm text-gray-700 dark:text-gray-400"
                      value="Ruc"/>
                    <x-g-input wire:model="empresa.ruc" type="text" name="ruc" class="mt-1" placeholder="10425162530"/>
                  </div>
                  <div class="w-1/2 ml-2">
                    <x-jet-label
                      for="razon_social" class="text-sm text-gray-700 dark:text-gray-400"
                      value="{{ __('Razon Social') }}"/>
                    <x-g-input wire:model="empresa.razon_social" type="text" name="razon_social" class="mt-1" placeholder="Empresa Asociados S.R.L."/>
                  </div>
                </div>

                {{-- Segunda Fila--}}
                <div class="flex mt-5">
                  {{-- Nombre Comercial --}}
                  <div class="w-1/2 mr-0">
                    <x-label-form for="nombre_comercial" value="Nombre Comercial"/>
                    <x-g-input type="text" name="nombre_comercial" class="mt-1" placeholder="Nombre Comercial"/>
                  </div>
                  {{-- Direccion --}}
                  <div class="w-1/2 ml-2">
                    <x-label-form for="direccion" value="Direccion"/>
                    <x-g-input type="text" name="direccion" class="mt-1" placeholder="Direccion"/>
                  </div>
                </div>

                {{-- Tercera Fila --}}
                <div class="flex mt-5">
                  <div class="w-3/12 mr-2">
                    <x-label-form for="telefono" value="Nro Telefono"/>
                    <x-g-input type="text" name="telefono" class="mt-1" placeholder="01-32456"/>
                  </div>
                  <div class="w-3/12 mr-2">
                    <x-label-form for="celular" value="Nro Celular"/>
                    <x-g-input type="text" name="celular" class="mt-1" placeholder="952631806"/>
                  </div>
                  <div class="w-6/12">
                    <x-label-form for="correo" value="Correo Electronico"/>
                    <x-g-input type="email" class="mt-1" placeholder="tucorreo@gmail.com" />
                  </div>
                </div>
              </div>
              <!-- End Body -->

              <!--Footer-->
              <div class="flex justify-end pt-2">
                <button class="focus:outline-none px-4 bg-purple-500 p-3 mr-3 rounded-lg text-white hover:bg-teal-400">
                  Confirm
                </button>

                <button wire:click="closeModal()" class="focus:outline-none modal-close px-4 bg-gray-600 p-3 rounded-lg text-white hover:bg-gray-300">
                  <i wire:loading wire:target="closeModal" class="text-xl fas fa-spinner fa-spin"></i>
                    Cancelar
                </button>
              </div>
            </div>
          </div>
        </div>
      @endif
      {{--End Modal--}}

      <div class="p-3">
        <div class="overflow-x-auto">
          <table class="table-auto w-full">
            <thead class="text-xs font-semibold uppercase dark:text-gray-400 bg-gray-50 dark:bg-gray-700">
            <tr>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">Razon</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">RUC</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">Direccion</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">Celular</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-center">Acciones</div>
              </th>
            </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100 dark:text-gray-400">
            @foreach($empresas as $empresa)
              <tr>
                <td class="p-2 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                      <img
                        class="rounded-full"
                        src="{{ $empresa->logo }}"
                        width="40" height="40" alt="Alex Shatov">
                    </div>
                    <div class="font-medium text-purple-600">{{ $empresa->razon_social }}</div>
                  </div>
                </td>
                <td class="p-2 whitespace-nowrap">
                  <div class="text-left">{{ $empresa->ruc }}</div>
                </td>
                <td class="p-2 whitespace-nowrap">
                  <div class="text-left">{{ \Illuminate\Support\Str::limit($empresa->direccion,15) }}</div>
                </td>
                <td class="p-2 whitespace-nowrap">
                  <div class="text-left font-medium text-purple-600">{{ $empresa->celular }}</div>
                </td>
                <td class="p-2 whitespace-nowrap">
                  <div class="text-lg text-center">
                    <i class="fa fa-edit text-purple-500 mr-2"></i>
                    <i class="fa fa-trash text-purple-500"></i>
                  </div>
                </td>
              </tr>
            @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>




