<x-app-layout>
   <x-slot name="header">
      <h2 class="page-title">
         {{ __('Cadastrar usuário') }}
      </h2>
   </x-slot>
   <form class="needs-validation" action="{{route('users.store')}}" method="post" novalidate>
      @csrf
      @include('dashboard.users.form', ['page' => 'create'])
   </form>
</x-app-layout>