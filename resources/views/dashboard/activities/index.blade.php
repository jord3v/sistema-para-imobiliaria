<x-app-layout>
    <x-slot name="header">
       <h2 class="page-title">
          {{ __('Atividades') }}
       </h2>
    </x-slot>
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Atividades</h3>
          </div>
          <div class="card-body">
            <div class="divide-y">
              @foreach ($activities as $activity)
                <div>
                  <div class="row">
                    <div class="col-auto">
                      <span class="avatar">JL</span>
                    </div>
                    <div class="col">
                      <div class="text-truncate">
                        {!!$activity->description!!}
                      </div>
                      <div class="text-muted">{{$activity->created_at->diffForHumans()}}</div>
                    </div>
                    <div class="col-auto align-self-center">
                      <div class="badge bg-primary"></div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="card-footer d-flex align-items-center">
            {{$activities->links()}}
          </div>
        </div>
      </div>
    </div>
 </x-app-layout>