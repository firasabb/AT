<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/required.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div>
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 672.29 101.74" style="width: 7rem">
                            <path d="M276.29,550.54H262.2a6.14,6.14,0,0,1-3.89-1.19,6.7,6.7,0,0,1-2.2-2.94l-7.32-20H208.22l-7.32,20a6.45,6.45,0,0,1-2.13,2.84,6,6,0,0,1-3.9,1.29H180.71l38.48-97.95h18.63Zm-63.4-37h31.23L232.19,481c-.54-1.44-1.14-3.15-1.79-5.11s-1.3-4.1-1.93-6.4q-.94,3.45-1.86,6.43t-1.8,5.22Z" transform="translate(-180.71 -449.88)" style="fill:#4d4d4d"/>
                            <path d="M326.69,494.59a4.48,4.48,0,0,1-1.42,1.52,3.74,3.74,0,0,1-1.9.44,6,6,0,0,1-2.61-.68c-.93-.45-2-1-3.22-1.52a29.66,29.66,0,0,0-4.16-1.53,20,20,0,0,0-5.52-.67q-5,0-7.79,2.1a6.51,6.51,0,0,0-2.85,5.48,5.23,5.23,0,0,0,1.46,3.76,13.1,13.1,0,0,0,3.86,2.68,37.47,37.47,0,0,0,5.45,2.07c2,.6,4.11,1.27,6.23,2s4.2,1.55,6.24,2.48a21.6,21.6,0,0,1,5.45,3.52,16.43,16.43,0,0,1,3.86,5.11,16.24,16.24,0,0,1,1.46,7.18,23.07,23.07,0,0,1-1.83,9.25,20.39,20.39,0,0,1-5.35,7.31,25,25,0,0,1-8.71,4.81,37.31,37.31,0,0,1-11.89,1.73,37.77,37.77,0,0,1-7-.64,41.26,41.26,0,0,1-6.57-1.8,36.23,36.23,0,0,1-5.82-2.71,27.86,27.86,0,0,1-4.71-3.38l3.86-6.37A5.37,5.37,0,0,1,285,535a4.93,4.93,0,0,1,2.58-.61,5.37,5.37,0,0,1,2.94.88c.93.59,2,1.22,3.22,1.9A28.75,28.75,0,0,0,298,539a18.88,18.88,0,0,0,6.27.88,16.08,16.08,0,0,0,5.11-.71,10.65,10.65,0,0,0,3.52-1.86,7,7,0,0,0,2-2.68,8.14,8.14,0,0,0,.64-3.15,5.62,5.62,0,0,0-1.46-4,12.79,12.79,0,0,0-3.86-2.71,36.75,36.75,0,0,0-5.49-2.07q-3.07-.91-6.29-2a57.17,57.17,0,0,1-6.3-2.54,21.32,21.32,0,0,1-5.49-3.69,16.72,16.72,0,0,1-3.86-5.49,19.1,19.1,0,0,1-1.46-7.85,20,20,0,0,1,1.7-8.13,18.89,18.89,0,0,1,5-6.74,24.65,24.65,0,0,1,8.2-4.61A34.19,34.19,0,0,1,307.59,480a34.76,34.76,0,0,1,13.07,2.38,29.41,29.41,0,0,1,9.82,6.23Z" transform="translate(-180.71 -449.88)" style="fill:#4d4d4d"/>
                            <path d="M385.89,494.59a4.48,4.48,0,0,1-1.42,1.52,3.74,3.74,0,0,1-1.9.44,6,6,0,0,1-2.61-.68c-.92-.45-2-1-3.21-1.52a29.82,29.82,0,0,0-4.17-1.53,20,20,0,0,0-5.52-.67,12.86,12.86,0,0,0-7.79,2.1,6.51,6.51,0,0,0-2.85,5.48,5.23,5.23,0,0,0,1.46,3.76,13.1,13.1,0,0,0,3.86,2.68,37.17,37.17,0,0,0,5.46,2.07c2,.6,4.1,1.27,6.23,2s4.2,1.55,6.23,2.48a21.6,21.6,0,0,1,5.45,3.52,16.43,16.43,0,0,1,3.86,5.11,16.24,16.24,0,0,1,1.46,7.18,23.07,23.07,0,0,1-1.83,9.25,20.27,20.27,0,0,1-5.35,7.31,25,25,0,0,1-8.71,4.81,37.24,37.24,0,0,1-11.88,1.73,37.69,37.69,0,0,1-7-.64,41.09,41.09,0,0,1-6.58-1.8,36.63,36.63,0,0,1-5.82-2.71,28.27,28.27,0,0,1-4.71-3.38l3.86-6.37a5.47,5.47,0,0,1,1.76-1.76,4.93,4.93,0,0,1,2.58-.61,5.35,5.35,0,0,1,2.94.88c.93.59,2,1.22,3.22,1.9a28.75,28.75,0,0,0,4.3,1.89,18.88,18.88,0,0,0,6.27.88,16,16,0,0,0,5.11-.71,10.71,10.71,0,0,0,3.53-1.86,7.06,7.06,0,0,0,2-2.68,8,8,0,0,0,.64-3.15,5.61,5.61,0,0,0-1.45-4,12.84,12.84,0,0,0-3.87-2.71,37,37,0,0,0-5.48-2.07q-3.09-.91-6.3-2a57.17,57.17,0,0,1-6.3-2.54,21.32,21.32,0,0,1-5.49-3.69A16.72,16.72,0,0,1,342,509a19.1,19.1,0,0,1-1.46-7.85,20,20,0,0,1,1.7-8.13,19,19,0,0,1,5-6.74,24.7,24.7,0,0,1,8.19-4.61A34.23,34.23,0,0,1,366.79,480a34.76,34.76,0,0,1,13.07,2.38,29.41,29.41,0,0,1,9.82,6.23Z" transform="translate(-180.71 -449.88)" style="fill:#4d4d4d"/>
                            <path d="M432.56,480a34,34,0,0,1,12.09,2.1,26.63,26.63,0,0,1,9.52,6.13,28.14,28.14,0,0,1,6.23,9.89,37.38,37.38,0,0,1,2.24,13.38,24.6,24.6,0,0,1-.17,3.15,5.26,5.26,0,0,1-.61,2,2.48,2.48,0,0,1-1.19,1,4.91,4.91,0,0,1-1.89.31H415.83q.75,10.7,5.76,15.71t13.27,5a23.15,23.15,0,0,0,7-1,32.21,32.21,0,0,0,5.14-2.1c1.47-.77,2.76-1.47,3.86-2.1a6.52,6.52,0,0,1,3.22-1,3.5,3.5,0,0,1,1.76.41,3.81,3.81,0,0,1,1.29,1.15l4.88,6.09a28.17,28.17,0,0,1-6.23,5.46,35.43,35.43,0,0,1-7.22,3.52,39.34,39.34,0,0,1-7.65,1.86,55.12,55.12,0,0,1-7.56.54,37.22,37.22,0,0,1-13.48-2.4A30.11,30.11,0,0,1,409.06,542a33.31,33.31,0,0,1-7.25-11.65,45.16,45.16,0,0,1-2.64-16.09,38.39,38.39,0,0,1,2.3-13.38,32.25,32.25,0,0,1,6.6-10.91,31.24,31.24,0,0,1,10.5-7.35A34.74,34.74,0,0,1,432.56,480Zm.34,12q-7.32,0-11.45,4.14t-5.28,11.71H447.6a21.13,21.13,0,0,0-.88-6.13,14.18,14.18,0,0,0-2.71-5,12.74,12.74,0,0,0-4.61-3.42A15.61,15.61,0,0,0,432.9,491.94Z" transform="translate(-180.71 -449.88)" style="fill:#4d4d4d"/>
                            <path d="M499.08,551.62q-9,0-13.89-5.11t-4.88-14.13V493.57h-7a3.2,3.2,0,0,1-3.32-3.52v-6.64l11.18-1.83,3.52-19a3.38,3.38,0,0,1,1.25-2.1,4,4,0,0,1,2.48-.74h8.67v21.88h18.29v11.92H497.05v37.66a7.4,7.4,0,0,0,1.62,5.08,5.51,5.51,0,0,0,4.34,1.83,7.93,7.93,0,0,0,2.61-.37,15.28,15.28,0,0,0,1.82-.78c.52-.27,1-.53,1.39-.78a2.31,2.31,0,0,1,1.22-.37,1.89,1.89,0,0,1,1.22.37,5.78,5.78,0,0,1,1,1.12l5,8.13a25.4,25.4,0,0,1-8.4,4.6A31.24,31.24,0,0,1,499.08,551.62Z" transform="translate(-180.71 -449.88)" style="fill:#4d4d4d"/>
                            <path d="M598.65,452.59v15H569.19v83H551v-83h-29.6v-15Z" transform="translate(-180.71 -449.88)" style="fill:#ff731f"/>
                            <path d="M625.13,480a38.11,38.11,0,0,1,14.13,2.51,30.45,30.45,0,0,1,10.8,7.11A31.39,31.39,0,0,1,657,500.82a46.5,46.5,0,0,1,0,29.73,32.14,32.14,0,0,1-6.91,11.32,30.08,30.08,0,0,1-10.8,7.18,41.24,41.24,0,0,1-28.28,0,30.27,30.27,0,0,1-10.87-7.18,32.28,32.28,0,0,1-7-11.32,46,46,0,0,1,0-29.73,31.53,31.53,0,0,1,7-11.25A30.64,30.64,0,0,1,611,482.46,38.33,38.33,0,0,1,625.13,480Zm0,58.73q8.68,0,12.84-5.82t4.17-17.07q0-11.25-4.17-17.14t-12.84-5.89q-8.8,0-13,5.92t-4.2,17.11q0,11.18,4.2,17T625.13,538.68Z" transform="translate(-180.71 -449.88)" style="fill:#ff731f"/>
                            <path d="M672.48,550.54V481h9.83a5.29,5.29,0,0,1,3.59.95,5.5,5.5,0,0,1,1.35,3.25l1,8.4A32.82,32.82,0,0,1,697,483.48a18.32,18.32,0,0,1,11.24-3.73,14.51,14.51,0,0,1,8.53,2.37l-2.16,12.53a2.61,2.61,0,0,1-.88,1.73,3,3,0,0,1-1.83.51,11.25,11.25,0,0,1-2.78-.48,18.91,18.91,0,0,0-4.67-.47,14.22,14.22,0,0,0-9,2.88,22.26,22.26,0,0,0-6.3,8.43v43.29Z" transform="translate(-180.71 -449.88)" style="fill:#ff731f"/>
                            <path d="M776.66,495.74a8.27,8.27,0,0,1-1.45,1.49,3.4,3.4,0,0,1-2.07.54,4.56,4.56,0,0,1-2.5-.78c-.82-.52-1.79-1.11-2.92-1.76a22.11,22.11,0,0,0-4-1.76,18.46,18.46,0,0,0-5.79-.78,17.68,17.68,0,0,0-7.72,1.59,14.72,14.72,0,0,0-5.52,4.57,20.78,20.78,0,0,0-3.29,7.22,38.86,38.86,0,0,0-1.08,9.58,37.57,37.57,0,0,0,1.18,9.89,21.11,21.11,0,0,0,3.43,7.28,14.59,14.59,0,0,0,5.41,4.47,16.4,16.4,0,0,0,7.18,1.53,17.86,17.86,0,0,0,6.47-1,20.71,20.71,0,0,0,4.17-2.17c1.13-.79,2.11-1.51,3-2.17a4.45,4.45,0,0,1,2.81-1,3.38,3.38,0,0,1,3,1.56l4.82,6.09a30.74,30.74,0,0,1-6,5.46,33.13,33.13,0,0,1-6.74,3.52,34.35,34.35,0,0,1-7.22,1.86,51.32,51.32,0,0,1-7.38.54,30.92,30.92,0,0,1-12.13-2.4,28.27,28.27,0,0,1-9.92-7,33.84,33.84,0,0,1-6.71-11.28,43.79,43.79,0,0,1-2.47-15.21,44.43,44.43,0,0,1,2.2-14.19,32.2,32.2,0,0,1,6.47-11.31,29.82,29.82,0,0,1,10.57-7.49,36.52,36.52,0,0,1,14.5-2.71,34.44,34.44,0,0,1,13.64,2.51,33.3,33.3,0,0,1,10.54,7.18Z" transform="translate(-180.71 -449.88)" style="fill:#ff731f"/>
                            <path d="M792.44,550.54V449.88h16.73v38.68a35.14,35.14,0,0,1,9-6.23A25.88,25.88,0,0,1,829.56,480a24.89,24.89,0,0,1,10.1,1.94A20,20,0,0,1,847,487.3a24,24,0,0,1,4.47,8.34A35.52,35.52,0,0,1,853,506.3v44.24H836.27V506.3q0-6.36-2.95-9.85T824.48,493a17.42,17.42,0,0,0-8.13,2,29.15,29.15,0,0,0-7.18,5.36v50.26Z" transform="translate(-180.71 -449.88)" style="fill:#ff731f"/>
                        </svg>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Panel</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Users <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{  route('admin.index.users')  }}">Users</a>
                                <a class="dropdown-item" href="{{  route('admin.index.userads')  }}">User Ads</a>
                                <a class="dropdown-item" href="{{  route('admin.index.roles')  }}">Roles</a>
                                <a class="dropdown-item" href="{{ route('admin.index.permissions') }}">Permissions</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Approve <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{  route('admin.index.approve.assets')  }}">Assets</a>
                                <a class="dropdown-item" href="{{  route('admin.index.approve.userads')  }}">User Ads</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Assets <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.index.assets') }}">Assets</a>
                                <a class="dropdown-item" href="{{ route('admin.index.comments') }}">Comments</a>
                                <a class="dropdown-item" href="{{ route('admin.index.tags') }}">Tags</a>
                                <a class="dropdown-item" href="{{ route('admin.index.categories') }}">Categories</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index.pages') }}">Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index.externalads') }}">Ads</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index.contactmessages') }}">Contact Messages</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Email <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.index.emailcampaigns') }}">Campaigns</a>
                                <a class="dropdown-item" href="{{ route('admin.send.emailForm') }}">Send Email</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Other <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.index.reports') }}">Reports</a>
                                <a class="dropdown-item" href="{{ route('admin.index.licenses') }}">Licenses</a>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                      
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile.dashboard.show') }}">
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
