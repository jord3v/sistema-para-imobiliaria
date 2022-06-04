<x-app-layout>
    <x-slot name="header">
       <h2 class="page-title">
          {{ __('Edit property') }}
       </h2>
    </x-slot>
    <form class="needs-validation" action="{{route('properties.update', $property->id)}}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        @include('dashboard.properties.form', ['page' => 'edit'])
    </form>
</x-app-layout>