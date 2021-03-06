<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
                <form>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

<!---------------------------------------------------------------------------------- DEPARTAMENTO ---------------------------------------------->

                        
<!-----------------------------------------------------------------------COMBO DEPARTAMENTO ---------------------------------------------->

                        
                        <div class="mb-4">
                            <label for="selecciona_departamento class" class="block text-gray-700 text-sm font-bold mb-2">Selecciona un Departamento:</label>
                            <select wire:model="selectedDepartamento" wire:change="listarDepartamentos($event.target.value)">
                                    <option value="">Departamento</option>
                                    @foreach($departamentos as $departamento)
                                    <option {{$codigoDepartamento == $departamento->id ? "selected" : ""}} value="{{$departamento->id}}">{{$departamento->descripcion}}</option>
                                    @endforeach
                            </select>
                        </div> 

                        <p>{{sprintf('%02d',$codigoDepartamento)}}</p>

                        

<!-------------------------------------------------------------------------COMBO PROVINCIA ---------------------------------------------->

                        @if(!is_null($provincias))

                        <div class="mb-4">
                            <label for="selecciona_departamento class" class="block text-gray-700 text-sm font-bold mb-2">Provincia:</label>
                            <select wire:model="selectedProvincia" wire:change="listarProvincias($event.target.value)">
                                    <option value="">Provincia</option>
                                    @foreach($provincias as $provincia)
                                    <option {{$codigoProvincia == $provincia->id ? "selected" : ""}} value="{{$provincia->id}}">{{$provincia->descripcion}}</option>
                                    @endforeach
                            </select>
                        </div> 
                        @endif
                        <p>{{sprintf('%04d',$codigoProvincia)}}</p>




                        <div class="mb-4">
                            <label for="idDistrito" class="block text-gray-700 text-sm font-bold mb-2">Ingresa el c??digo del Distrito:</label>  
                            <input type="text" pattern="[0,9]{2}" minlength="2" maxlength="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="idDistrito" wire:model="idDistrito">
                        </div>
                        

                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripcion:</label>  
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descripcion" wire:model="descripcion">
                        </div>

                        

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="guardar()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-gray-700 shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                            </span>

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="cerrarModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                            </span>
                        </div>

                    </div>
                </form>    
            </div>


    </div>
</div>
