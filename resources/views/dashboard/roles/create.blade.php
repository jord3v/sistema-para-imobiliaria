<x-app-layout>
   <div class="row">
      <div class="col-md-12">
         <div class="d-flex">
            <ol class="breadcrumb breadcrumb-arrows my-2 ms-auto" aria-label="breadcrumbs">
               <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Página inicial</a></li>
               <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Funções e permissões</a></li>
               <li class="breadcrumb-item active" aria-current="page"><a href="#">Cadastrar função</a></li>
            </ol>
         </div>
      </div>
   </div>
   <x-slot name="subtitle"></x-slot>
   <x-slot name="title">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Cadastrar função
      </h2>
   </x-slot>
   <x-slot name="btns">
      <div class="btn-list">
         <span class="d-none d-sm-inline">
         <a href="{{route('roles.index')}}" class="btn btn-white">
         Voltar
         </a>
         </span>
      </div>
   </x-slot>
   <form action="{{route('roles.store')}}" method="post" class="needs-validation" >
      @csrf
      @include('dashboard.roles.form', ['page' => 'create'])
   </form>
   @push('scripts')
   @endpush
</x-app-layout>