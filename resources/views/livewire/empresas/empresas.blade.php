<!-- Titulo -->
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Empresas</h2>

<!-- Table Empresa -->
<div class="mr-4 px-4">
  <div class="w-full bg-white dark:bg-gray-800 dark:border-gray-700 shadow-lg rounded-md border border-gray-200 px-4">
    <header class="px-5 pt-5 pb-4 border-b border-gray-100 dark:border-gray-700">
      <a
        wire:click="create()"
        href=""
        class="px-3 py-2 bg-purple-500 text-gray-200 rounded-md text-xs font-medium">
        <i wire:loading class="fas fa-circle-notch fa-spin"></i> <i class="fa fa-plus"></i> Nuevo
      </a>
    </header>
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
                      src="https://raw.githubusercontent.com/cruip/vuejs-admin-dashboard-template/main/src/images/user-36-05.jpg"
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





