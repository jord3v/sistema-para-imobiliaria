<div class="row">
   <div class="col-12 col-md-2 px-4">
      <div class="list-group list-group-transparent mb-3 ml-3" id="list-tab" role="tablist">
         <a class="list-group-item list-group-item-action d-flex align-items-center active" id="basic" data-toggle="list" href="#list-basic" role="tab" aria-controls="home"><i class="fa-solid fa-list px-2"></i>Básico</a>
         <a class="list-group-item list-group-item-action d-flex align-items-center" id="roles" data-toggle="list" href="#list-roles" role="tab" aria-controls="roles"><i class="fa-solid fa-user-gear px-2"></i>  Funções</a>
      </div>
   </div>
   <div class="col-12 col-md-10">
      <div class="row">
         <div class="col-12">
            <div class="tab-content" id="nav-tabContent">
               <div class="tab-pane fade show active" id="list-basic" role="tabpanel" aria-labelledby="basic">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Básico</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="mb-3">
                              <div class="row">
                                 <div class="col-12">
                                    <label class="form-label">Nome completo</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}" required>
                                 </div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <div class="row">
                                 <div class="col-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email ?? old('email') }}" required>
                                 </div>
                                 <div class="col-3">
                                    <label class="form-label">Senha</label>
                                    <input type="password" class="form-control" name="password" value="" {{$page == 'create' ? 'required' : ''}}>
                                 </div>
                                 <div class="col-3">
                                    <label class="form-label">Confirme a senha</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="" {{$page == 'create' ? 'required' : ''}}>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-footer text-end">
                        <div class="d-flex">
                           <a class="btn btn-primary ms-auto btn-square next">Avançar<i class="fa-solid fa-angles-right px-1"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="list-roles" role="tabpanel" aria-labelledby="roles">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Localização</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="mb-3">
                              <div class="row">
                                 <div class="col-md-12 mb-3">
                                    <label class="form-label">Funções</label>
                                    <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                       @forelse ($roles as $value)
                                       <label class="form-selectgroup-item flex-fill">
                                          <input type="checkbox" name="role[]" value="{{$value->id}}" class="form-selectgroup-input" {{empty($user) ? 'checked' : ($user->roles->contains($value->id) ? 'checked' : '')}}>
                                          <div class="form-selectgroup-label d-flex align-items-center p-3">
                                             <div class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                             </div>
                                             <div class="form-selectgroup-label-content d-flex align-items-center">
                                                <div>
                                                   <div class="font-weight-medium">{{$value->name}}</div>
                                                </div>
                                             </div>
                                          </div>
                                       </label>
                                       @empty
                                           
                                       @endforelse
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-footer text-end">
                        <div class="d-flex">
                           <a class="btn btn-primary btn-square prev"><i class="fa-solid fa-angles-left px-1"></i>Voltar</a>
                           <button type="submit" class="btn btn-primary ms-auto btn-square next">Salvar <i class="fa-solid fa-save px-1"></i></button>    
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>