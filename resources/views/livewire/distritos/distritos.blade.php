<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

        @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
        @endif
        <button wire:click="buscar()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-3" >Buscar</button>  
        <button wire:click="crear()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-3" >Nuevo Distrito</button>
        @if($modal)
            @include('livewire.distritos.crear')
        @endif

            <table class="table-fixed w-full">
                 <thead>
                         <tr class="bg-indigo-600 text-white">
                             <th class="px-4 py-2">ID</th>
                             <th class="px-4 py-2">DEPARTAMENTO</th>
                             <th class="px-4 py-2">PROVINCIA</th>
                             <th class="px-4 py-2">DISTRITO</th>
                             <th class="px-4 py-2">ACCIONES</th>
                         </tr>
                </thead>
                 <tbody>
                     @foreach($distritos as $distrito)
                         <tr>  
                              <td class="border px-4 py-2">{{sprintf('%06d',$distrito->id)}}</td>
                              <td class="border px-4 py-2">{{$distrito->nombreDepartamento}}</td>
                              <td class="border px-4 py-2">{{$distrito->nombreProvincia}}</td>
                              <td class="border px-4 py-2">{{$distrito->descripcion}}</td>
                              <td class="border px-4 py-2 text-center">
                                  <button wire:click="editar({{$distrito->id, $distrito->nombreProvincia}})" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Editar</button>
                                  <button wire:click="borrar({{$distrito->id}})" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Borrar</button>
                              </td>
                         </tr>

                     @endforeach
                  </tbody>
             </table>           
        </div>
    </div>
</div>
