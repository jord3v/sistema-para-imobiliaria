<x-app-layout>
   <x-slot name="header">
      <h2 class="page-title">
         {{ __('Cadastrar imóvel') }}
      </h2>
   </x-slot>
   <form class="needs-validation" action="{{route('properties.store')}}" method="post" novalidate>
      @csrf
      @include('dashboard.properties.form', ['page' => 'create'])
   </form>
</x-app-layout>