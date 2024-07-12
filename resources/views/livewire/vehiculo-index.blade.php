<div>
    <form wire:submit.prevent="store">
        <legend>Carros</legend> <!-- .form-group -->
             <div class="form-group">
             <label for="tf1">descripcion</label> 
             <input wire:model="descripcion" type="text" class="form-control"  aria-describedby="tf1Help" > 
             </div><!-- /.form-group -->
             <div class="form-group">
             <label for="tf1">Estado</label> 
             <input wire:model="estado" type="text" class="form-control"  aria-describedby="tf1Help" > 
             </div><!-- /.form-group -->
            <div  class="form-group">
              <select wire:model="marca_id">
                <option value="">Selecciona una marca</option>
                @foreach($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
                @endforeach
                </select>
            </div>
            <div  class="form-group">
              <select wire:model="modelo_id">
              <option value="">Selecciona un modelo</option>
              @foreach($modelos as $modelo)
              <option value="{{ $modelo->id }}">{{ $modelo->modelo }}</option>
              @endforeach
              </select>
            </div>
            <div  class="form-group">
              <select wire:model="color_id">
              <option value="">Selecciona un color</option>
              @foreach($colors as $color)
              <option value="{{ $color->id }}">{{ $color->color }}</option>
              @endforeach
              </select>
            </div>
            <div>
               <input type="submit" value="guardar">
            </div>
    </form>

    <div class="table-responsive">
                        <!-- .table -->
                        <table class="table table-striped">
                          <!-- thead -->
                          <thead class="thead-">
                            <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>Acciones</th>
                            </tr>
                          </thead><!-- /thead -->
                          <!-- tbody -->
                          <tbody>
                            <!-- tr -->
                            @foreach($vehiculos as $vehiculo)
                             <tr>
                             <td>{{ $vehiculo->id }}</td>
                              <td>{{ $vehiculo->descripcion }}</td>
                              <td>{{ $vehiculo->estado }}</td>
                              <td>{{ $vehiculo->marca->marca }}</td>
                              <td>{{ $vehiculo->modelo->modelo }}</td>
                              <td>{{ $vehiculo->color->color }}</td>
            
                              <td class="align-middle text-center">
                              <a wire:click="edit({{ $vehiculo->id }})" class="btn btn-sm btn-icon btn-secondary">
                                <i class="fa fa-pencil-alt"></i>
                                 <span class="sr-only">Edit</span>
                                </a>
                              <form wire:click="delete({{ $vehiculo->id }})" method="post" >
                              @method('delete')
                              @csrf
                             <button type='submit' class="btn btn-sm btn-icon btn-secondary">
                              <i class="far fa-trash-alt"></i>
                               <span class="sr-only">Remove</span>
                              </button>
                             </form>
                              </td>
                            </tr><!-- /tr -->
                            
                             @endforeach
                            
                          </tbody><!-- /tbody -->
                        </table><!-- /.table -->
                      </div><!-- /.table-responsive -->
</div>



