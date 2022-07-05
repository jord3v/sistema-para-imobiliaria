@php
  $_GET['purpose'] = isset($_GET['purpose']) ? $_GET['purpose'] : '';
  $_GET['neighborhood'] = isset($_GET['neighborhood']) ? $_GET['neighborhood'] : '';
  $_GET['city'] = isset($_GET['city']) ? $_GET['city'] : '';
@endphp
<x-app-layout>
   <x-slot name="header">
      <h2 class="page-title">
         {{ __('Imóveis') }}
      </h2>
   </x-slot>
   <div class="row row-cards">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Busca avançada</h3>
            </div>
            <form>
               <div class="card-body">
                  <div class="mb-3">
                     <div class="row g-2">
                        <div class="col-2">
                           <label class="form-label">Código</label>
                           <div class="input-group mb-2">
                            <input type="text" class="form-control" name="code">
                            <button type="submit" class="btn"><i class="fa-solid fa-search"></i></button>
                           </div>
                        </div>
                        <div class="col-2">
                           <label class="form-label">Tipo</label>
                           <select name="purpose" class="form-select" onchange="this.form.submit()">
                           <option value=""> Selecione</option>
                            @foreach ($purposes as $purpose)
                            <option value="{{$purpose->slug}}" @if($purpose->slug == $_GET['purpose'])
                            selected="selected"
                            @endif>{{$purpose->name}}</option>  
                            @endforeach
                           </select>
                        </div>
                        <div class="col-2">
                           <label class="form-label">Finalidade</label>
                           <select name="transaction" class="form-select" onchange="this.form.submit()">
                              <option value=""> Selecione</option>
                              <option value="sell">Venda</option>
                              <option value="rent">Locação</option>
                              <option value="in_built">Lançamento</option>
                              <option value="season">Temporada</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="mb-3">
                    <div class="row g-2">
                        <div class="col-3">
                          <label class="form-label">Cidade</label>
                          <select name="city" class="form-select" onchange="this.form.submit()">
                            <option value=""> Selecione</option>
                            @foreach ($cities as $location)
                            <option value="{{$location->city_slug}}" @if($location->city_slug == $_GET['city'])
                            selected="selected"
                            @endif>{{$location->city}}</option>  
                            @endforeach
                          </select>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Bairro</label>
                          <select name="neighborhood" class="form-select" onchange="this.form.submit()">
                            <option value=""> Selecione</option>
                            @foreach ($neighborhoods as $location)
                            <option value="{{$location->neighborhood_slug}}" @if($location->neighborhood_slug == $_GET['neighborhood'])
                            selected="selected"
                            @endif>{{$location->neighborhood}}</option>  
                            @endforeach
                          </select>
                        </div>
                    </div>
                 </div>
               </div>
            </form>
         </div>
      </div>
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Imóveis</h3>
            </div>
            <div class="card-body">
               <div class="d-flex">
                  <div class="text-muted">
                     Show
                     <div class="mx-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" value="8" size="3">
                     </div>
                     entries
                  </div>
               </div>
            </div>
            <div class="table-responsive">
               <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                     <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"></th>
                        <th>Imóvel</th>
                        <th>Localização</th>
                        <th>Transações</th>
                        <th class="w-1"></th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse ($properties as $property)
                     <tr>
                        <td>
                           <input class="form-check-input m-0 align-middle" type="checkbox">
                        </td>
                        <td>
                           <div class="d-flex py-1 align-items-center">
                              <span class="avatar me-2" style="background-image: url({{ $property->getMedia('media')->first() ? $property->getFirstMediaUrl('media') : global_asset('img/user-circle.svg') }})"></span>
                              <div class="flex-fill">
                                 <div class="font-weight-medium">{{$property->code}}</div>
                                 <span class="text-muted"><a href="#" class="text-reset">{{$property->purpose->name}} {{$property->type->name}}</a></span>
                              </div>
                           </div>
                        </td>
                        <td>{{$property->location->neighborhood}}, {{$property->location->city}} - {{$property->location->state}}</td>
                        <td>
                           @foreach ($property->transactions as $key => $transaction)
                           @if(isset($transaction['status']) && $transaction['status'] == 'on')
                           {{ trans('system.transactions.'.$key.'') }}
                           {{$transaction['price']}}<br>
                           @endif
                           @endforeach
                        </td>
                        <td class="text-end">
                           <div class="btn-list flex-nowrap">
                              <div class="dropdown">
                                 <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                 Ações
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">
                                    Detalhes
                                    </a>
                                    <a class="dropdown-item" href="{{route('properties.edit', $property->id)}}">
                                    Editar
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-small" data-bs-info="Excluir cliente {{$property->name}}" data-bs-id="{{$property->id}}">
                                    Excluir
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </td>
                     </tr>
                     @empty
                     <tr>
                        <td colspan="5">
                           <p class="text-center">Nada encontrado</p>
                        </td>
                     </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
            <div class="card-footer d-flex align-items-center">
               {{$properties->links()}}
            </div>
         </div>
      </div>
   </div>
   <x-modal-delete />
</x-app-layout>