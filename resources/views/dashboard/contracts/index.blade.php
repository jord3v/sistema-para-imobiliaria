<x-app-layout>
    <x-slot name="header">
       <h2 class="page-title">
          {{ __('Contracts') }}
       </h2>
    </x-slot>
    <div class="row row-cards">
       <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contracts</h3>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <div class="text-muted">
                  Show
                  <div class="mx-2 d-inline-block">
                    <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                  </div>
                  entries
                </div>
                <div class="ms-auto text-muted">
                  Search:
                  <div class="ms-2 d-inline-block">
                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                  <tr>
                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                    <th class="w-1">
                        No.
                    </th>
                    <th>Code</th>
                    <th>User</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($contracts as $contract)
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">{{$contract->id}}</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">{{$contract->code}}</a></td>
                        <td>
                          <span class="flag flag-country-us"></span>
                          {{$contract->user->name}}
                        </td>
                        <td class="text-end">
                          <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">
                                Action
                              </a>
                              <a class="dropdown-item" href="#">
                                Another action
                              </a>
                            </div>
                          </span>
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
              {{$contracts->links()}}
            </div>
          </div>
       </div>
    </div>
 </x-app-layout>