<x-app-layout>
  <div class="row">
     <div class="col-md-12">
        <div class="d-flex">
           <ol class="breadcrumb breadcrumb-arrows my-2 ms-auto" aria-label="breadcrumbs">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Página inicial</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="#">Funções e permissões</a></li>
           </ol>
        </div>
     </div>
  </div>
  <x-slot name="subtitle"></x-slot>
  <x-slot name="title">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Funções e permissões
     </h2>
  </x-slot>
  <x-slot name="btns">
     <div class="btn-list">
        <span class="d-none d-sm-inline">
        <a href="{{route('dashboard')}}" class="btn btn-white">
        Voltar
        </a>
        </span>
        <a href="{{route('roles.create')}}" class="btn btn-primary d-none d-sm-inline-block">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/plus</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
          Nova função
        </a>
        <a href="{{route('roles.create')}}" class="btn btn-primary d-sm-none btn-icon">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/plus</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </a>
     </div>
  </x-slot>
  <div class="row mb-3">
     <div class="col-md-12">
        <div class="card">
           <div class="card-header">
              <h4 class="card-title">Funções e permissões</h4>
           </div>
           <div class="table-responsive">
              <table class="table table-vcenter card-table">
                 <thead>
                    <tr>
                       <th>Função</th>
                       <th>Permissões</th>
                       <th class="w-1"></th>
                    </tr>
                 </thead>
                 <tbody>
                   @forelse ($roles as $role)
                   <tr>
                    <td>
                        {{$role->name}}
                    </td>
                    <td>
                       {{$role->permissions->count()}}
                    </td>
                    <td>
                     <div class="btn-list flex-nowrap">
                       <div class="dropdown">
                         <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                           Ações
                         </button>
                         <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="#">
                             Detalhes
                           </a>
                           <a class="dropdown-item" href="{{route('roles.edit', $role->id)}}">
                             Editar
                           </a>
                           <div class="dropdown-divider"></div>
                           <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-small" data-bs-info="Excluir cliente {{$role->name}}" data-bs-id="{{$role->id}}">
                              Excluir
                           </a>
                         </div>
                       </div>
                     </div>
                   </td>
                 </tr>   
                   @empty
                    <tr>
                      <td colspan="4">
                        <div class="empty">
                           <div class="empty-img"><img src="./static/illustrations/undraw_quitting_time_dm8t.svg" height="128" alt="">
                           </div>
                           <p class="empty-title">Nenhum resultado encontrado</p>
                           <p class="empty-subtitle text-muted">
                              Tente ajustar sua pesquisa ou filtro para encontrar o que está procurando.
                           </p>
                           <div class="empty-action">
                             <a href="./." class="btn btn-primary">
                               <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/search</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>
                               Procure denovo
                             </a>
                           </div>
                         </div>
                      </td>
                    </tr> 
                   @endforelse
                    
                 </tbody>
              </table>
           </div>
        </div>
     </div>
  </div>
  <div class="modal modal-blur fade" id="modal-small" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-body">
         <div class="modal-title">Tem certeza?</div>
         <div>Se continuar, não poderá reverter.</div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancelar</button>
         <form method="POST" id="delete" action="">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
               Sim, desejo excluir
            </button>
         </form>
       </div>
     </div>
   </div>
 </div>
  @push('scripts')
  <script>
   var exampleModal = document.getElementById('modal-small')
    exampleModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget
      var id = button.getAttribute('data-bs-id')
      var modalTitle = exampleModal.querySelector('#delete').setAttribute("action", "{{url()->current()}}/"+id)
    })
 </script>
  @endpush
</x-app-layout>