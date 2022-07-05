<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }} - {{ strip_tags($header) }}</title>
      <!-- Fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
      <!-- Styles -->
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="https://kit.fontawesome.com/f06f76d671.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
   </head>
   <body>
      @include('sweetalert::alert')
      <div class="page">
         @include('layouts.aside')
         @include('layouts.header')
         <main class="page-wrapper">
            <div class="container-xl">
               <!-- Page title -->
               <div class="page-header d-print-none">
                  <div class="row g-2 align-items-center">
                     <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                        </div>
                        <h2 class="page-title">
                           {{ $header }}
                        </h2>
                     </div>
                     <!-- Page title actions -->
                     @foreach (request()->segments() as $segment)
                     <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                           @if ($loop->first)
                           @elseif(count(request()->segments()) == 2)
                           <span class="d-none d-sm-inline">
                           <a href="./" class="btn btn-white"> Voltar</a>
                           </span>
                           <a href="{{route($segment.'.create')}}" class="btn btn-primary d-none d-sm-inline-block">
                              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <line x1="12" y1="5" x2="12" y2="19" />
                                 <line x1="5" y1="12" x2="19" y2="12" />
                              </svg>
                              Novo
                           </a>
                           <a href="{{route($segment.'.create')}}" class="btn btn-primary d-sm-none btn-icon" aria-label="Novo">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <line x1="12" y1="5" x2="12" y2="19" />
                                 <line x1="5" y1="12" x2="19" y2="12" />
                              </svg>
                           </a>
                           @elseif($segment == 'create')
                           <span class="d-none d-sm-inline">
                           <a href="./" class="btn btn-white"> Voltar</a>
                           </span>
                           @else
                           @endif
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <div class="row mt-3">
                     <div class="col-auto me-auto"></div>
                     <div class="col-auto">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                           @php $segments = ''; @endphp
                           @foreach(request()->segments() as $segment)
                           <?php $segments .= '/'.$segment; ?>
                           @if(!is_numeric($segment))
                           <li class="breadcrumb-item {{$loop->last ? 'active':''}}">
                              <a href="{{ $segments }}">{{$loop->last ? strip_tags($header) : trans('system.'.$segment)}}</a>
                           </li>
                           @endif
                           @endforeach
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <div class="page-body">
               <div class="container-xl">
                  {{ $slot }}
               </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
               <div class="container-xl">
                  <div class="row text-center align-items-center flex-row-reverse">
                     <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                           <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">Documentation</a></li>
                           <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                           <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                           <li class="list-inline-item">
                              <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                                 <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                 </svg>
                                 Sponsor
                              </a>
                           </li>
                        </ul>
                     </div>
                     <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                           <li class="list-inline-item">
                              Copyright &copy; 2022
                              <a href="." class="link-secondary">Tabler</a>.
                              All rights reserved.
                           </li>
                           <li class="list-inline-item">
                              <a href="./changelog.html" class="link-secondary" rel="noopener">
                              v1.0.0-beta10
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </footer>
         </main>
      </div>
   </body>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js" integrity="sha256-RhRrbx+dLJ7yhikmlbEyQjEaFMSutv6AzLv3m6mQ6PQ=" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="{{ asset('js/functions.js') }}" defer></script>
   @stack('scripts')
</html>