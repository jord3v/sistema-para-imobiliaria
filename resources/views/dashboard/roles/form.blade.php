<div class="row mb-3">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title text-cyan">Informações da função</h3>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12 col-xl-12">
                  <div class="row">
                     <div class="col-md-12 mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" value="{{ $role->name ?? old('name') }}" required>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row mb-3">
   <div class="col-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title text-cyan">Permissões</h3>
         </div>
         <div class="card-body">
            <div class="row">
               @foreach($permissions->chunk(4) as $permission)
                  <div class="col-md-2 mb-3">
                     <div class="form-label">{{$permission->first()['name']}}</div>
                     @foreach ($permission as $value)
                        <label class="form-check form-switch">
                           <input class="form-check-input" type="checkbox" name="permission[]" value="{{$value->id}}" {{empty($role) ? 'checked' : ($role->permissions->contains($value->id) ? 'checked' : '')}}>  
                           <span class="form-check-label">{{$value->name}}</span>
                        </label>
                     @endforeach
                  </div>
               @endforeach
            </div>
         </div>
         <div class="card-footer text-end">
            <div class="d-flex">
               <button type="submit" class="btn btn-primary ms-auto">{{$page == 'create' ? 'Cadastrar' : 'Atualizar'}} função</button>
            </div>
         </div>
      </div>
   </div>
</div>