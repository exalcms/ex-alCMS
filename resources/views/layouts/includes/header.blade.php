<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ExAlCMS') }}</title>

    <!-- Favicons -->
    <link href="{{asset('site/img/favicon.png')}}" rel="icon">
    <link href="{{asset('site/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html{line-height:1.15;-webkit-text-size-adjust:100%}
        body{margin:0}
        a{background-color:transparent}
        [hidden]{display:none}
        html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
    </style>


    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    <!-- Vendor CSS Files -->
    <link href="{{asset('site/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('site/css/style.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d48e8b6147.js" crossorigin="anonymous"></script>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container">

        <div class="logo float-left">
            <!-- Uncomment below if you prefer to use an text logo -->
            <!-- <h1><a href="index.html">NewBiz</a></h1> -->
            <a href="{{route('/')}}"><img src="{{asset('site/img/logo.png')}}" alt="" class="img-fluid"></a>
        </div>

        @if(Auth::guest())
        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{route('/')}}">Home</a></li>
                <li class="drop-down"><a href="#">Conteúdo</a>
                    <ul>
                        <li><a href="{{route('/')}}#notice">Notícias</a></li>
                        <li><a href="{{route('/')}}#portfolio">Galeria</a></li>
                        <li><a href="{{route('/')}}#services">Serviços</a></li>
                        <li><a href="{{route('/')}}#clients">Parceiros</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#">Associação</a>
                    <ul>
                        <li><a href="{{route('/')}}#about">Quem Somos</a></li>
                        <li><a href="{{route('/')}}#history">Histórico</a></li>
                        <li><a href="{{route('/')}}#mensagempresi">Mensagem do Presidente</a></li>
                        <li><a href="{{route('/')}}#team">Diretoria</a></li>
                        <li><a href="{{route('/')}}#testimonials">Ex-presidentes</a></li>
                    </ul>
                </li>
                <li><a href="http://www.esfcex.eb.mil.br/" target="_blank" >CMS</a></li>
                <li><a href="{{route('mensagems.create')}}">Contato</a></li>
                <li><a href="{{ route('register') }}">Cadastro</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </nav><!-- .main-nav -->
        @elseif(Auth::user()->cad_atualizado == 'n')
            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li class="drop-down"><a href="#">{{ Auth::user()->name }}</a>
                        <ul>
                            <li><a href="{{route('profile.show-cms')}}">Perfil</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
        @else
                <nav class="main-nav float-right d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="{{route('dashboard')}}">Loja</a></li>
                        @if(Auth::user()->role == 1)
                            <li class="drop-down"><a href="{{ route('admin.dashboard-admin') }}">Admin-Cont.</a>
                                <ul>
                                    <li><a href="{{route('admin.users.index')}}">Usuários</a></li>
                                    <li><a href="{{route('admin.assoc.index')}}">Associação</a></li>
                                    <li><a href="{{route('admin.elems.index')}}">Site Conteúdo</a></li>
                                    <li><a href="{{route('admin.photos.index')}}">Upload Fotos</a></li>
                                    <li><a href="{{route('admin.diret.index')}}">Diretoria</a></li>
                                    <li><a href="{{route('admin.compos.index')}}">Composição Dir.</a></li>
                                    <li><a href="{{route('admin.expresids.index')}}">Ex-Presidentes</a></li>
                                    <?php $dirPres = App\Models\DiretoriaUser::with('user','diretoria')->where('diretoria_id', '=', 1)->first();  ?>
                                    @if(Auth::user()->id == $dirPres->user->id || Auth::user()->id == 1)
                                    <li><a href="{{route('admin.menspres.index')}}">Mensagens Presi.</a> </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="drop-down"><a href="#">Admin-Func.</a>
                                <ul>
                                    <li><a href="{{route('admin.mensagems.index')}}">Mensagens</a></li>
                                    <li><a href="#">Galerias</a></li>
                                    <li><a href="#">Avisos/Notícias</a></li>
                                    <li><a href="#">Nossa loja</a></li>
                                    <li><a href="#">Turmas CMS</a></li>
                                    <li><a href="#">Networks</a></li>
                                </ul>
                            </li>
                        @endif
                        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                            <li class="drop-down"><a href="#">Serviços</a>
                                <ul>
                                    <li><a href="#">Upload de fotos</a></li>
                                    <li><a href="#">Envio de mensagens</a></li>
                                    <li><a href="#">Networks</a></li>
                                    <li><a href="{{route('mensagems.create')}}">Contato</a></li>
                                </ul>
                            </li>
                        @endif
                        <li><a href="#">Check-out</a></li>
                        <li class="drop-down"><a href="#">{{ Auth::user()->name }}</a>
                            <ul>
                                <li><a href="{{route('profile.show')}}">Perfil</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
        @endif

        @if(Session::has('msg'))
            <div class="container" style="width: 600px">
                {!! Alert::success(Session::get('msg'))->close() !!}
            </div>
        @endif
    </div>
</header>
<!-- #header Final -->
