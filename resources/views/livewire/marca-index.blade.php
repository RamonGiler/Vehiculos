<div>
    <form wire:submit.prevent="store">
        <legend>Marca</legend> <!-- .form-group -->
             <div class="form-group">
             <label for="tf1">Marca</label> 
             <input wire:model="marca" type="text" class="form-control"  aria-describedby="tf1Help" > 
             </div><!-- /.form-group -->
             <div class="form-group">
             <label for="tf1">Estado</label> 
             <input wire:model="estado" type="text" class="form-control"  aria-describedby="tf1Help" > 
             </div><!-- /.form-group -->
           
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
                            <th>Marca</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                            </tr>
                          </thead><!-- /thead -->
                          <!-- tbody -->
                          <tbody>
                            <!-- tr -->
                            @foreach($marcas as $marca)
                             <tr>
                             <td>{{ $marca->id }}</td>
                             <td>{{ $marca->marca }}</td>
                             <td>{{ $marca->estado }}</td>
            
                             <td class="align-middle text-center">
                              <a wire:click="edit({{ $marca->id }})" class="btn btn-sm btn-icon btn-secondary">
                                <i class="fa fa-pencil-alt"></i>
                                 <span class="sr-only">Edit</span>
                                </a>
                              <form wire:click="delete({{ $marca->id }})" method="post" >
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




