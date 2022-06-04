<x-app-layout>
  <x-slot name="header">
     <h2 class="page-title">
        {{ __('Cadastrar contrato') }}
     </h2>
  </x-slot>
  <div class="row row-cards">
     <div class="col-12">
        <div class="card">
           <div class="card-header">
              <h3 class="card-title">Cadastrar contrato</h3>
           </div>
           <form class="needs-validation" action="{{route('contracts.store')}}" method="post" novalidate>
              @csrf
              <div class="card-body">
                 <div class="row">
                    <div class="mb-3">
                      <div class="row">
                        <div class="col-12">
                          <label class="form-label">Título</label>
                          <input type="text" class="form-control" name="title" value="Contrato de locação {{str()->random(10)}}" required>  
                        </div>
                      </div>
                  </div>
                    <div class="mb-3">
                       <div class="row">
                          <div class="col-6">
                             <label class="form-label">Imóvel</label>
                             <select class="form-control form-select" name="property_id" required>
                                <option selected disabled value="">Select option</option>
                                @forelse ($properties as $property)
                                <option value="{{$property->id}}">{{$property->code}}</option>
                                @empty
                                <option value="">No property</option>
                                @endforelse
                             </select>
                          </div>
                          <div class="col-3">
                             <label class="form-label">Locador (proprietário)</label>
                             <select class="form-control form-select" name="customers[owner][]" required>
                              <option selected disabled value="">Select option</option>
                                @forelse ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @empty
                                <option value="">No customer</option>
                                @endforelse
                             </select>
                          </div>
                          <div class="col-3">
                            <label class="form-label">Locatário (inquilino)</label>
                              <select class="form-control form-select" name="customers[tenant][]" required>
                                <option selected disabled value="">Select option</option>
                                @forelse ($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @empty
                                <option value="">No tenant</option>
                                @endforelse
                             </select>
                          </div>
                       </div>
                    </div>
                    <div class="mb-3">
                       <div class="row">
                          <div class="col-2">
                             <label class="form-label">Início do contrato</label>
                             <input type="date" class="form-control" name="start_period" id="datepicker-icon-prepend" value="{{now()->format('Y-m-d')}}" required>
                          </div>
                          <div class="col-1">
                             <label class="form-label">Pagamento</label>
                             <select class="form-control form-select" name="payment" required>
                                <option selected disabled value="">Select option</option>
                                <option value="5">5º dia útil</option>
                             </select>
                          </div>
                          <div class="col-2">
                             <label class="form-label">Tempo de contrato</label>
                             <select class="form-control form-select" name="period" required>
                                <option selected disabled value="">Select option</option>
                                <option value="12">12 meses</option>
                                <option value="24">24 meses</option>
                                <option value="36">36 meses</option>
                             </select>
                          </div>
                          <div class="col-2">
                             <label class="form-label">Preço da locação</label>
                             <div class="input-group mb-2">
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
                                <input type="text" class="form-control" name="rental_price" required>
                             </div>
                          </div>
                          <div class="col-2">
                             <label class="form-label">Preço de condomínio</label>
                             <div class="input-group mb-2">
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
                                <input type="text" class="form-control" name="condominium_price">
                             </div>
                          </div>
                          <div class="col-2">
                             <label class="form-label">Taxa de administração</label>
                             <div class="input-group mb-2">
                                <span class="input-group-text">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-percentage" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                      <desc>Download more icon variants from https://tabler-icons.io/i/percentage</desc>
                                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                      <circle cx="17" cy="17" r="1"></circle>
                                      <circle cx="7" cy="7" r="1"></circle>
                                      <line x1="6" y1="18" x2="18" y2="6"></line>
                                   </svg>
                                </span>
                                <input type="text" class="form-control" name="administration_fee">
                             </div>
                          </div>
                          <div class="col-1">
                             <label class="form-label">Action</label>
                             <a class="btn btn-sm btn-success" href="javascript:void(0)" id="preview">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <desc>Download more icon variants from https://tabler-icons.io/i/refresh</desc>
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                   <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                </svg>
                                <small>Simular<br> parcelas</small>
                             </a>
                          </div>
                       </div>
                    </div>
                    <div class="mb-3">
                       <div class="row">
                          <div class="col-12">
                             <div class="table-responsive">
                                <label class="form-label">Simulação</label>
                                <table class="table table-bordered card-table table-vcenter text-nowrap datatable">
                                   <thead>
                                      <tr>
                                         <th class="w-1">Mensalidade</th>
                                         <th class="w-50">Recebimento do inquilino (R$)</th>
                                         <th class="w-50">Repasse ao proprietário (R$)</th>
                                         <th class="w-1 text-center">Situação</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                      <tr>
                                        <td colspan="5">
                                          <div class="hr-text">
                                            <span>
                                              Preencha as informações e clique em 
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <desc>Download more icon variants from https://tabler-icons.io/i/refresh</desc>
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                              <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                            </svg> simular parcelas
                                            </span>
                                          </div>
                                        </td>
                                      </tr>
                                   </tbody>
                                </table>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="card-footer text-end">
                 <div class="d-flex">
                    <a href="#" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Send data</button>
                 </div>
              </div>
           </form>
        </div>
     </div>
  </div>
</x-app-layout>