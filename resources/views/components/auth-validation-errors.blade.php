@props(['errors'])

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="d-flex">
          <div>
            <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/alert-circle</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
          </div>
          <div>
            <h4 class="alert-title">{{ __('Whoops! Something went wrong.') }}</h4>
            <div class="text-muted">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
          </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
@endif
