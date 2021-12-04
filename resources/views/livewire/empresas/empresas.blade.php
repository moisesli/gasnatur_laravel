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
              <div class="flex justify-between items-center pb-4 border-b">
                <p class="text-xl text-gray-500 font-medium"><i class="fa fa-plus"></i> Nueva Empresa</p>
                <div wire:click="closex()" class="modal-close text-gray-400 cursor-pointer z-50">
                  <i wire:loading wire:target="closex" class="text-xl fas fa-spinner fa-spin"></i>
                  <i wire:loading.remove wire:target="closex" class="text-xl fas fa-times"></i>
                </div>
              </div>

              <!-- Body -->
              <div class="my-5 pb-4">
                <form>

                {{-- Primera Fila --}}
                <div class="flex">
                  <div class="w-2/5 mr-0">
                    <x-g-label for="ruc" value="Ruc"/>
                    <x-g-input wire:model="empresa.ruc" type="text" name="ruc" class="mt-1" placeholder="10425162530"/>
                  </div>
                  <div class="w-3/5 ml-3">
                    <x-g-label for="razon_social" value="Razon Social"/>
                    <x-g-input wire:model="empresa.razon_social" type="text" name="razon_social" class="mt-1" placeholder="Empresa Asociados S.R.L."/>
                  </div>
                </div>

                {{-- Segunda Fila--}}
                <div class="flex mt-5">
                  {{-- Nombre Comercial --}}
                  <div class="w-1/2 mr-0">
                    <x-g-label for="nombre_comercial" value="Nombre Comercial"/>
                    <x-g-input wire:model="empresa.nombre_comercial" type="text" name="nombre_comercial" class="mt-1" placeholder="Nombre Comercial"/>
                  </div>
                  {{-- Direccion --}}
                  <div class="w-1/2 ml-3">
                    <x-g-label for="direccion" value="Direccion"/>
                    <x-g-input wire:model="empresa.direccion" type="text" name="direccion" class="mt-1" placeholder="Direccion"/>
                  </div>
                </div>

                {{-- Tercera Fila --}}
                <div class="flex mt-5">
                  <div class="w-6/12 flex">
                    <div class="w-1/2 mr-2">
                      <x-g-label for="telefono" value="Nro Telefono"/>
                      <x-g-input wire:model="empresa.telefono" type="text" name="telefono" class="mt-1" placeholder="01-32456"/>
                    </div>
                    <div class="w-1/2 mr-0">
                      <x-g-label for="celular" value="Nro Celular"/>
                      <x-g-input wire:model="empresa.celular" type="text" name="celular" class="mt-1" placeholder="952631806"/>
                    </div>
                  </div>
                  <div class="w-6/12 ml-3">
                    <x-g-label for="correo" value="Correo Electronico"/>
                    <x-g-input wire:model="empresa.correo" type="email" class="mt-1" placeholder="tucorreo@gmail.com" />
                  </div>
                </div>

                {{-- Cuarta fila: web --}}
                <div class="flex mt-4">
                  <div class="w-6/12 flex">
                    <div class="w-1/2 mr-2">
                      <x-g-label for="logo" value="Logoo Empresa"/>
                      <x-g-input wire:model="empresa.logo" type="text" class="mt-1" placeholder="Logo" />
                    </div>
                    <div class="w-1/2">
                      <x-g-label for="estado" value="Estado"/>
                      <x-g-input wire:model="empresa.estado" type="text" class="mt-1" placeholder="Activo" />
                    </div>
                  </div>
                  <div class="w-6/12 ml-3">
                    <x-g-label for="web" value="Pagina Web" />
                    <x-g-input wire:model="empresa.web" type="text" class="mt-1" placeholder="www.tupaginaweb.com" />
                  </div>
                </div>
                </form>
              </div>
              <!-- End Body -->

              <!--Footer-->
              <div class="flex items-center justify-end pt-2">
                <button
                  wire:click="closeModal()"
                  class="mr-3 focus:outline-none modal-close px-4 bg-gray-500 py-2 rounded-lg text-white hover:bg-gray-600">
                  <i wire:loading wire:target="closeModal" class="fas fa-spinner fa-spin"></i>
                  <i wire:loading.remove wire:target="closeModal" class="far fa-times-circle mr-2"></i>Cancelar
                </button>

                <button wire:click="guardar()" class="focus:outline-none px-4 bg-purple-500 px-4 py-2  rounded-lg text-white hover:bg-purple-600">
                  <i wire:loading wire:target="guardar" class="fas fa-spinner fa-spin"></i>
                  <i wire:loading.remove wire:target="guardar" class="far fa-save mr-2"></i>Guardar
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
            @foreach($empresas as $index => $empresa)
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
                <td class="p-2">
                  <div class="text-lg text-center">

                    {{-- Button Edit --}}
                    <x-g-botton wire:click="editar({{ $empresa->id }})" color="gray" class="mr-2">
                      <i wire:loading wire:target="editar({{ $empresa->id }})" class="fas fa-spinner fa-spin"></i>
                      <i wire:loading.remove wire:target="editar({{ $empresa->id }})"  class="fa fa-edit"></i>
                      Editar
                    </x-g-botton>

                    <button class="bg-red-400">
                      boton rojo
                    </button>

                    {{-- Button Delete --}}
                    <x-g-botton color="red" >
                      <i class="fa fa-trash"></i> Borrar
                    </x-g-botton>

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




