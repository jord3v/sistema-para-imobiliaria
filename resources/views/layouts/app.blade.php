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
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
   </head>
   <body>
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
                           Overview
                        </div>
                        <h2 class="page-title">
                           {{ $header }}
                        </h2>
                     </div>
                     <!-- Page title actions -->
                     <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                           <span class="d-none d-sm-inline">
                           <a href="#" class="btn btn-white">
                           New view
                           </a>
                           </span>
                           <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <line x1="12" y1="5" x2="12" y2="19" />
                                 <line x1="5" y1="12" x2="19" y2="12" />
                              </svg>
                              Create new report
                           </a>
                           <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <line x1="12" y1="5" x2="12" y2="19" />
                                 <line x1="5" y1="12" x2="19" y2="12" />
                              </svg>
                           </a>
                        </div>
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
</html>