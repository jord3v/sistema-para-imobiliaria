<div class="row">
    <div class="col-12 col-md-2 px-4">
       <div class="list-group list-group-transparent mb-3 ml-3" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action d-flex align-items-center active" id="basic" data-toggle="list" href="#list-basic" role="tab" aria-controls="home"><i class="fa-solid fa-list px-2"></i>Básico</a>
          <a class="list-group-item list-group-item-action d-flex align-items-center" id="location" data-toggle="list" href="#list-location" role="tab" aria-controls="profile"><i class="fa-solid fa-location-dot px-2"></i>  Localização</a>
          <a class="list-group-item list-group-item-action d-flex align-items-center" id="transactions" data-toggle="list" href="#list-transactions" role="tab" aria-controls="transactions"><i class="fa-solid fa-hand-holding-dollar px-2"></i>  Transações</a>
          <a class="list-group-item list-group-item-action d-flex align-items-center {{$page == 'create' ? 'disabled' : null}}" id="details" data-toggle="list" href="#list-details" role="tab" aria-controls="details"><i class="fa-solid fa-clipboard-list px-2"></i>  Detalhes</a>
          <a class="list-group-item list-group-item-action d-flex align-items-center {{$page == 'create' ? 'disabled' : null}}" id="photos" data-toggle="list" href="#list-photos" role="tab" aria-controls="photos"><i class="fa-solid fa-images px-2"></i>  Fotos</a>
          <a class="list-group-item list-group-item-action d-flex align-items-center {{$page == 'create' ? 'disabled' : null}}" id="involveds" data-toggle="list" href="#list-involveds" role="tab" aria-controls="involveds"><i class="fa-solid fa-users px-2"></i>  Envolvidos</a>
          <a class="list-group-item list-group-item-action d-flex align-items-center {{$page == 'create' ? 'disabled' : null}}" id="publication" data-toggle="list" href="#list-publication" role="tab" aria-controls="publication"><i class="fa-solid fa-bullhorn px-2"></i>  Publicação</a>
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
                                  <div class="col-4">
                                     <label class="form-label">Referência</label>
                                     <input type="text" class="form-control" name="code" value="{{ $property->code ?? old('code') }}" required>
                                  </div>
                                  <div class="col-4">
                                     <label class="form-label">Finalidade</label>
                                     <select class="form-control form-select" name="purpose_id" required>
                                        <option selected disabled>Selecione a finalidade</option>
                                     </select>
                                  </div>
                                  <div class="col-4">
                                     <label class="form-label">Tipo</label>
                                     <select class="form-control form-select" name="type_id" required>
                                        <option selected disabled>Selecione o tipo</option>
                                     </select>
                                  </div>
                               </div>
                            </div>
                            <div class="mb-3">
                               <div class="row">
                                  <div class="col-12">
                                     <label class="form-label">Descrição</label>
                                     <textarea class="form-control" name="description" cols="30" rows="10" required>{{ $property->description ?? old('description') }}</textarea>
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
                <div class="tab-pane fade" id="list-location" role="tabpanel" aria-labelledby="location">
                   <div class="card">
                      <div class="card-header">
                         <h3 class="card-title">Localização</h3>
                      </div>
                      <div class="card-body">
                         <div class="row">
                            <div class="mb-3">
                               <div class="row">
                                  <div class="col-2">
                                     <label class="form-label">CEP</label>
                                     <div class="row g-2">
                                        <div class="col">
                                           <input type="text" class="form-control" placeholder="01001-000" name="zipcode" value="{{ $property->location->zipcode ?? old('zipcode') }}">
                                        </div>
                                        <div class="col-auto">
                                           <a href="#" class="btn btn-white btn-icon" aria-label="Button" id="searchZipcode" data-bs-toggle="tooltip" data-bs-placement="top" title="Buscar endereço">
                                              <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                 <desc>Download more icon variants from https://tabler-icons.io/i/search</desc>
                                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                 <circle cx="10" cy="10" r="7" />
                                                 <line x1="21" y1="21" x2="15" y2="15" />
                                              </svg>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="col-6">
                                     <label class="form-label">Logradouro</label>
                                     <input type="text" class="form-control" name="public_place" value="{{ $property->location->public_place ?? old('public_place') }}">
                                  </div>
                                  <div class="col-2">
                                     <label class="form-label">Número</label>
                                     <input type="text" class="form-control" name="number" value="{{ $property->location->number ?? old('number') }}">
                                  </div>
                                  <div class="col-2">
                                     <label class="form-label">Complemento</label>
                                     <input type="text" class="form-control" name="complement" value="{{ $property->location->complement ?? old('complement') }}">
                                  </div>
                               </div>
                            </div>
                            <div class="mb-3">
                               <div class="row">
                                  <div class="col-5">
                                     <label class="form-label">Bairro</label>
                                     <input type="text" class="form-control" name="neighborhood" value="{{ $property->location->neighborhood ?? old('neighborhood') }}" required>
                                  </div>
                                  <div class="col-6">
                                     <label class="form-label">Cidade</label>
                                     <input type="text" class="form-control" name="city" value="{{ $property->location->city ?? old('city') }}" required>
                                  </div>
                                  <div class="col-1">
                                     <label class="form-label">Estado</label>
                                     <input type="text" class="form-control" name="state" value="{{ $property->location->state ?? old('state') }}" required>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="card-footer text-end">
                         <div class="d-flex">
                            <a class="btn btn-primary btn-square prev"><i class="fa-solid fa-angles-left px-1"></i>Voltar</a>
                            <a class="btn btn-primary ms-auto btn-square next">Avançar<i class="fa-solid fa-angles-right px-1"></i></a>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="tab-pane fade" id="list-transactions" role="tabpanel" aria-labelledby="transactions">
                   <div class="card">
                      <div class="card-header">
                         <h3 class="card-title">Transações</h3>
                      </div>
                      <div class="card-body">
                         <div class="row">
                            <div class="mb-3">
                               <div class="row">
                                  <div class="col-3">
                                     <label class="form-label">Disponibilidade para venda</label>
                                     <div class="input-group mb-2">
                                        <span class="input-group-text">
                                        <input class="form-check-input m-0" type="checkbox" id="sell_price" name="transactions[sell][status]" {{isset($property->transactions['sell']['status']) && $property->transactions['sell']['status'] == 'on' ? 'checked': null}}>
                                        </span>
                                        <span class="input-group-text">
                                           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-real" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <desc>Download more icon variants from https://tabler-icons.io/i/currency-real</desc>
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M21 6h-4a3 3 0 0 0 0 6h1a3 3 0 0 1 0 6h-4"></path>
                                              <path d="M4 18v-12h3a3 3 0 1 1 0 6h-3c5.5 0 5 4 6 6"></path>
                                              <path d="M18 6v-2"></path>
                                              <path d="M17 20v-2"></path>
                                           </svg>
                                        </span>
                                        <input type="text" class="form-control" name="transactions[sell][price]" value="{{$property->transactions['sell']['price'] ?? old('transactions[sell][price]')}}">
                                     </div>
                                  </div>
                                  <div class="col-9 d-none sell_price">
                                     <label class="form-label">Opções de venda</label>
                                     <div class="form-selectgroup">
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[sell][financing]" class="form-selectgroup-input" {{isset($property->transactions['sell']['financing']) && $property->transactions['sell']['financing'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Aceita financiamento</span>
                                        </label>
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[sell][guarantee_fund]" class="form-selectgroup-input" {{isset($property->transactions['sell']['guarantee_fund']) && $property->transactions['sell']['guarantee_fund'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Aceita fundo de garantia</span>
                                        </label>
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[sell][exchange]" class="form-selectgroup-input" {{isset($property->transactions['sell']['exchange']) && $property->transactions['sell']['exchange'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Aceita permuta</span>
                                        </label>
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[sell][government_program]" class="form-selectgroup-input" {{isset($property->transactions['sell']['government_program']) && $property->transactions['sell']['government_program'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Casa Verde e Amarela</span>
                                        </label>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="mb-3">
                               <div class="row">
                                  <div class="col-3">
                                     <label class="form-label">Disponibilidade para locação</label>
                                     <div class="input-group mb-2">
                                        <span class="input-group-text">
                                        <input class="form-check-input m-0" type="checkbox" id="rent_price" name="transactions[rent][status]" {{isset($property->transactions['rent']['status']) && $property->transactions['rent']['status'] == 'on' ? 'checked': null}}>
                                        </span>
                                        <span class="input-group-text">
                                           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-real" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <desc>Download more icon variants from https://tabler-icons.io/i/currency-real</desc>
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M21 6h-4a3 3 0 0 0 0 6h1a3 3 0 0 1 0 6h-4"></path>
                                              <path d="M4 18v-12h3a3 3 0 1 1 0 6h-3c5.5 0 5 4 6 6"></path>
                                              <path d="M18 6v-2"></path>
                                              <path d="M17 20v-2"></path>
                                           </svg>
                                        </span>
                                        <input type="text" class="form-control" name="transactions[rent][price]" value="{{$property->transactions['rent']['price'] ?? old('transactions[rent][price]')}}">
                                     </div>
                                  </div>
                                  <div class="col-9 d-none rent_price">
                                     <label class="form-label">Opções de locação</label>
                                     <div class="form-selectgroup">
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[rent][surety_bond]" class="form-selectgroup-input" {{isset($property->transactions['rent']['surety_bond']) && $property->transactions['rent']['surety_bond'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Aceita seguro fiança</span>
                                        </label>
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[rent][guarantor]" class="form-selectgroup-input" class="form-selectgroup-input" {{isset($property->transactions['rent']['guarantor']) && $property->transactions['rent']['guarantor'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Aceita fiador</span>
                                        </label>
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[rent][deposit]" class="form-selectgroup-input" {{isset($property->transactions['rent']['deposit']) && $property->transactions['rent']['deposit'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Aceita depósito</span>
                                        </label>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="mb-3">
                               <div class="row">
                                  <div class="col-3">
                                     <label class="form-label">Imóvel para lançamento</label>
                                     <div class="input-group mb-2">
                                        <span class="input-group-text">
                                        <input class="form-check-input m-0" type="checkbox" id="in_built" name="transactions[in_built][status]" {{isset($property->transactions['in_built']['status']) && $property->transactions['in_built']['status'] == 'on' ? 'checked': null}}>
                                        </span>
                                        <span class="input-group-text">
                                           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-real" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <desc>Download more icon variants from https://tabler-icons.io/i/currency-real</desc>
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M21 6h-4a3 3 0 0 0 0 6h1a3 3 0 0 1 0 6h-4"></path>
                                              <path d="M4 18v-12h3a3 3 0 1 1 0 6h-3c5.5 0 5 4 6 6"></path>
                                              <path d="M18 6v-2"></path>
                                              <path d="M17 20v-2"></path>
                                           </svg>
                                        </span>
                                        <input type="text" class="form-control" name="transactions[in_built][price]" value="{{$property->transactions['in_built']['price'] ?? old('transactions[in_built][price]')}}">
                                     </div>
                                  </div>
                                  <div class="col-9 d-none in_built">
                                     <label class="form-label">Opções de lançamento</label>
                                     <div class="form-selectgroup">
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[in_built][financing]" class="form-selectgroup-input" {{isset($property->transactions['in_built']['financing']) && $property->transactions['in_built']['financing'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Aceita financiamento</span>
                                        </label>
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[in_built][guarantee_fund]" class="form-selectgroup-input" {{isset($property->transactions['in_built']['guarantee_fund']) && $property->transactions['in_built']['guarantee_fund'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Aceita fundo de garantia</span>
                                        </label>
                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="transactions[in_built][government_program]" class="form-selectgroup-input" {{isset($property->transactions['in_built']['government_program']) && $property->transactions['in_built']['government_program'] == 'on' ? 'checked': null}}>
                                        <span class="form-selectgroup-label">Casa Verde e Amarela</span>
                                        </label>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="mb-3">
                               <div class="row">
                                  <div class="col-3">
                                     <label class="form-label">Disponibilidade para temporada</label>
                                     <div class="input-group mb-2">
                                        <span class="input-group-text">
                                        <input class="form-check-input m-0" type="checkbox" id="season_price" name="transactions[season][status]" {{isset($property->transactions['season']['status']) && $property->transactions['season']['status'] == 'on' ? 'checked': null}}>
                                        </span>
                                        <span class="input-group-text">
                                           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-real" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <desc>Download more icon variants from https://tabler-icons.io/i/currency-real</desc>
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M21 6h-4a3 3 0 0 0 0 6h1a3 3 0 0 1 0 6h-4"></path>
                                              <path d="M4 18v-12h3a3 3 0 1 1 0 6h-3c5.5 0 5 4 6 6"></path>
                                              <path d="M18 6v-2"></path>
                                              <path d="M17 20v-2"></path>
                                           </svg>
                                        </span>
                                        <input type="text" class="form-control" name="transactions[season][price]" value="{{$property->transactions['season']['price'] ?? old('transactions[season][price]')}}">
                                     </div>
                                  </div>
                                  <div class="col-3 d-none season_price">
                                     <label class="form-label">Ciclo</label>
                                     <select name="transactions[season][cycle]" class="form-control form-select">
                                        <option value="daily">Diária</option>
                                        <option value="weekly">Semanal</option>
                                        <option value="monthly">Mensal</option>
                                        <option value="quarterly">Trimestral</option>
                                     </select>
                                  </div>
                                  <div class="col-3 d-none season_price">
                                     <label class="form-label">Inicio</label>
                                     <input type="date" class="form-control" name="transactions[season][cycle][start]" value="{{$property->transactions['season']['cycle']['start'] ?? old('transactions[season][cycle][start]')}}">
                                  </div>
                                  <div class="col-3 d-none season_price">
                                     <label class="form-label">Fim</label>
                                     <input type="date" class="form-control" name="transactions[season][cycle][end]" value="{{$property->transactions['season']['cycle']['end'] ?? old('transactions[season][cycle][end]')}}">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="card-footer text-end">
                         <div class="d-flex">
                            <a class="btn btn-primary btn-square prev"><i class="fa-solid fa-angles-left px-1"></i>Voltar</a>
                            @if ($page == 'create')
                              <button type="submit" class="btn btn-primary ms-auto btn-square next">Finalizar pré cadastro <i class="fa-solid fa-angles-right px-1"></i></button>    
                            @else
                              <a class="btn btn-primary ms-auto btn-square next">Avançar<i class="fa-solid fa-angles-right px-1"></i></a>
                            @endif
                         </div>
                      </div>
                   </div>
                </div>
               @if ($page == 'edit')
               <div class="tab-pane fade" id="list-details" role="tabpanel" aria-labelledby="details">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Detalhes</h3>
                     </div>
                     <div class="card-body">
                        
                     </div>
                     <div class="card-footer text-end">
                        <div class="d-flex">
                           <a class="btn btn-primary btn-square prev"><i class="fa-solid fa-angles-left px-1"></i>Voltar</a>
                           <a class="btn btn-primary ms-auto btn-square next">Avançar<i class="fa-solid fa-angles-right px-1"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="list-photos" role="tabpanel" aria-labelledby="photos">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Fotos</h3>
                     </div>
                     <div class="card-body">
                        
                     </div>
                     <div class="card-footer text-end">
                        <div class="d-flex">
                           <a class="btn btn-primary btn-square prev"><i class="fa-solid fa-angles-left px-1"></i>Voltar</a>
                           <a class="btn btn-primary ms-auto btn-square next">Avançar<i class="fa-solid fa-angles-right px-1"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="list-involveds" role="tabpanel" aria-labelledby="involveds">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Envolvidos</h3>
                     </div>
                     <div class="card-body">
                        
                     </div>
                     <div class="card-footer text-end">
                        <div class="d-flex">
                           <a class="btn btn-primary btn-square prev"><i class="fa-solid fa-angles-left px-1"></i>Voltar</a>
                           <a class="btn btn-primary ms-auto btn-square next">Avançar<i class="fa-solid fa-angles-right px-1"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="list-publication" role="tabpanel" aria-labelledby="publication">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Publicação</h3>
                     </div>
                     <div class="card-body">
                        
                     </div>
                     <div class="card-footer text-end">
                        <div class="d-flex">
                           <a class="btn btn-primary btn-square prev"><i class="fa-solid fa-angles-left px-1"></i>Voltar</a>
                           <button type="submit" class="btn btn-primary ms-auto btn-square next">Salvar <i class="fa-solid fa-save px-1"></i></button>    
                        </div>
                     </div>
                  </div>
               </div>
               @endif
             </div>
          </div>
       </div>
    </div>
 </div>