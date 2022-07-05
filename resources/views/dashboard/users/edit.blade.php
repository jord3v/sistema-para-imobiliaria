<x-app-layout>
   <x-slot name="header">
      <h2 class="page-title">
         {{ __('Editar usuário') }}
      </h2>
   </x-slot>
    <form class="needs-validation" action="{{route('users.update', $user->id)}}" method="post" novalidate>
        @csrf
        @method('PUT')
        @include('dashboard.users.form', ['page' => 'edit'])
    </form>
    @push('scripts')
    @endpush
 </x-app-layout>