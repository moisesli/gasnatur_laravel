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
           
        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 font-bold py-2 px-4 my-3" >Nueva Provincia</button>
        
        @if($modal)
            @include('livewire.provincias.crear')
        @endif

            <table class="table-fixed w-full">
                 <thead>
                         <tr class="bg-indigo-600 text-white">
                             <th class="px-4 py-2">ID</th>
                             <th class="px-4 py-2">DESCRIPCION</th>
                             <th class="px-4 py-2">DEPARTAMENTO</th>
                             <th class="px-4 py-2">ACCIONES</th>
                         </tr>
                </thead>
                 <tbody>
                     @foreach($provincias as $provincia)
                         <tr>  
                              <td class="border px-4 py-2">{{$provincia->id}}</td>
                              <td class="border px-4 py-2">{{$provincia->descripcion}}</td>
                              <td class="border px-4 py-2 text-center">
                                  <button wire:click="editar({{$provincia->id}})" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Editar</button>
                                  <button wire:click="borrar({{$provincia->id}})" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Borrar</button>
                              </td>
                         </tr>

                     @endforeach
                  </tbody>
             </table>           
        </div>
    </div>
</div>

