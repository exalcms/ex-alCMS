@extends('layouts.excms')

@section('conteudo')

    <!-- ======= Intro Section ======= -->
    <section id="intro" class="clearfix">
        <div class="container" data-aos="fade-up">

            <div class="intro-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{asset('site/img/intro-img.png')}}" alt="" class="img-fluid">
            </div>

            <div class="intro-info" data-aos="zoom-in" data-aos-delay="100">
                <h2>Colegas ontem,<br><span>amigos</span><br>para sempre!</h2>
                <div>
                    <a href="{{ route('register') }}" class="btn-get-started scrollto">Cadastre-se</a>
                    <a href="#services" class="btn-services scrollto">Nossas Parcerias</a>
                </div>
            </div>

        </div>
    </section><!-- End Intro Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Quem Somos</h3>
                    <p>{!! $assoc->quem_somos !!}</p>
                </header>

                <div class="row about-container">

                    <div class="col-lg-6 content order-lg-1 order-2">
                        @if($assoc instanceof \App\Models\ElementSite)
                            <p>{!! $assoc->text_abert !!}</p>
                        @else<p> </p>
                        @endif
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <h4 class="title"><a href="">Missão</a></h4>
                            <p class="description">{!! $assoc->missao !!}</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="fa fa-photo"></i></div>
                            <h4 class="title"><a href="">Visão</a></h4>
                            <p class="description">{!! $assoc->visao !!}</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="fa fa-bar-chart"></i></div>
                            <h4 class="title"><a href="">Valores</a></h4>
                            <p class="description">{!! $assoc->valores !!}</p>
                        </div>

                    </div>

                    <div class="col-lg-6 background order-lg-2" data-aos="zoom-in">
                        <img src="{{asset('site/img/imgs_cms/cms_pitangueiras.jpg')}}" class="img-fluid" alt="">
                        <div class="mt-3"><h6 style="font-style: italic">A história começa na sede da Pitangueiras</h6></div>
                        <div class="mt-5"><img src="{{asset('site/img/imgs_cms/cms_pituba.jpg')}}" class="img-fluid" alt=""></div>
                        <div class="mt-3"><h6 style="font-style: italic">Em seguida mudamos para a Pituba</h6></div>
                        <div class="mt-5"><img src="{{asset('site/img/imgs_cms/cms_atual1.jpg')}}" class="img-fluid" alt=""></div>
                        <div class="mt-3"><h6 style="font-style: italic">Hoje, ainda na Pituba, mas em uma sede própria do CMS</h6></div>
                    </div>
                </div>

                <div class="row about-extra">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="{{asset('site/img/about-extra-1.svg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-5 pt-lg-0" data-aos="fade-left">
                        <h4>{!! $assoc->oferec_title !!}</h4>
                            {!! $assoc->oferec_text !!}
                    </div>
                </div>

                <div class="row about-extra">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
                        <img src="{{asset('site/img/about-extra-2.svg')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-right">
                        <h4>{!! $assoc->se_associa_title !!}</h4>
                        {!! $assoc->se_associa_text !!}
                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Histórico Section ======= -->
        <section id="history">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h3>Histórico</h3>
                    <p>{!! $assoc->histo_subtitulo !!}</p>
                </header>

                <div class="row row-eq-height justify-content-center">

                    <div class="col-lg-12 mb-12">
                        <div class="card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="col-12">
                                <img src="{{asset('site/img/apple-touch-icon.png')}}" alt="" width="50">
                                <div class="card-body">
                                    <h5 class="card-title">{!! $assoc->histo_title !!}</h5>
                                    <p class="card-text">
                                        {!! $assoc->histo_resum !!}
                                    </p>
                                    <a href="{{route('history')}}" class="readmore">Leia mais </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- Fim Historico Section -->

        <!-- ======= MensagemPresi Section ======= -->
        <section id="mensagempresi" class="section-bg">
            <div class="container" data-aso="zoom-in">

                <header class="section-header">
                    <h3>Mensagem do Presidente</h3>
                </header>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                            <div class="testimonial-item">
                                <img src="{{asset($dirPres->photo->photo_path)}}" class="testimonial-img" alt="">
                                <h3>{!! $dirPres->user->nome_guerra !!}</h3>
                                <h4>{!! $dirPres->diretoria->cargo !!}</h4>
                                <p>{!! $menspre->introd !!}</p>
                                <p style="alignment: right !important;"><a href="{{route('message-pres')}}" class="readmore">Leia mais </a></p>
                            </div>
                    </div>
                </div>

            </div>
        </section><!-- Fim MensagemPresi Section -->

        <!-- ======= Team Section ======= -->
        <section id="team">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h3>Diretoria</h3>
                    <p>Nossa diretoria é composta por ex-alunos que, sem remuneração, dedicam parte do seu tempo às atividades de integração dos ex-alunos através de eventos da Associação.</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                        <div class="member">
                            <img src="{{asset($dirPres->photo->photo_path)}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{!! $dirPres->user->name !!}</h4>
                                    <span>{!! $dirPres->diretoria->cargo !!}</span>
                                    <div class="social">
                                        <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                        <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="200">
                        <div class="member">
                            <img src="{{asset($dirVic->photo->photo_path)}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{!! $dirVic->user->name !!}</h4>
                                    <span>{!! $dirVic->diretoria->cargo !!}</span>
                                    <div class="social">
                                        <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                        <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="300">
                        <div class="member">
                            <img src="{{asset($dirSec->photo->photo_path)}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{!! $dirSec->user->name !!}</h4>
                                    <span>{!! $dirSec->diretoria->cargo !!}</span>
                                    <div class="social">
                                        <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                        <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="400">
                        <div class="member">
                            <img src="{{asset($dirFin->photo->photo_path)}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{!! $dirFin->user->name !!}</h4>
                                    <span>{!! $dirFin->diretoria->cargo !!}</span>
                                    <div class="social">
                                        <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                        <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Segunda linha do team -->

                <div class="row">

                    <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                        <div class="member">
                            <img src="{{asset($dirCom->photo->photo_path)}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{!! $dirCom->user->name !!}</h4>
                                    <span>{!! $dirCom->diretoria->cargo !!}</span>
                                    <div class="social">
                                        <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                        <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="200">
                        <div class="member">
                            <img src="{{asset($dirCul->photo->photo_path)}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{!! $dirCul->user->name !!}</h4>
                                    <span>{!! $dirCul->diretoria->cargo !!}</span>
                                    <div class="social">
                                        <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                        <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="300">
                        <div class="member">
                            <img src="{{asset($dirEsp->photo->photo_path)}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{!! $dirEsp->user->name !!}</h4>
                                    <span>{!! $dirEsp->diretoria->cargo !!}</span>
                                    <div class="social">
                                        <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                        <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                        <div class="member">
                            <img src="{{asset($dirJur->photo->photo_path)}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{!! $dirJur->user->name !!}</h4>
                                    <span>{!! $dirJur->diretoria->cargo !!}</span>
                                    <div class="social">
                                        <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                        <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- Fim da linha 2 -->

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="section-bg">
            <div class="container" data-aso="zoom-in">

                <header class="section-header">
                    <h3>Galeria Ex-Presidentes</h3>
                </header>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="owl-carousel testimonials-carousel">
                            @foreach($expresids as $expresid)
                                <div class="testimonial-item">
                                    <img src="{{asset($expresid->photo->photo_path)}}" class="testimonial-img"/>
                                    <h3>{!! $expresid->user->name !!}</h3>
                                    <h4>{!! 'De '.$expresid->inicio.' - '.$expresid->final !!}</h4>

                                        {!! $expresid->msg !!}

                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= nossaloja Section ======= -->
        <section id="nossaloja" class="clearfix">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3 class="section-title">Nossa Loja</h3>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12">
                        <ul id="nossaloja-filters">
                            <li data-filter="*" class="filter-active">Todos</li>
                            <li data-filter=".filter-card">Canecas</li>
                            <li data-filter=".filter-web">Bonés</li>
                            <li data-filter=".filter-card">Camisas</li>
                            <li data-filter=".filter-app">Eventos</li>
                            <li data-filter=".filter-web">Anuidade</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/app1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Evento 1 </a></h4>
                                <p>App</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/app1.jpg')}}" data-gall="portfolioGallery" title="Evento 1" class="venobox link-preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/web3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Turma 3</a></h4>
                                <p>Turma 83</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/web3.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Turma 3"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/app2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">App 2</a></h4>
                                <p>App</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/app2.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="App 2"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/card2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Card 2</a></h4>
                                <p>Card</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/card2.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Card 2"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/web2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Web 2</a></h4>
                                <p>Web</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/web2.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Web 2"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/app3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">App 3</a></h4>
                                <p>App</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/app3.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="App 3"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/card1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Card 1</a></h4>
                                <p>Card</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/card1.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Card 1"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/card3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Card 3</a></h4>
                                <p>Card</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/card3.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Card 3"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/web1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Web 1</a></h4>
                                <p>Web</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/web1.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Web 1"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End nossaloja Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Serviços</h3>
                    <p>Aqui vamos mostrar os serviços e convênios que os associados podem desfrutar, caso sejam cadastrados e estejam em dia com as suas anuidades.</p>
                </header>

                <div class="row justify-content-center">
                    @foreach($convenios as $convenio)
                    <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            @if($convenio->icon == null)
                            <div class="icon"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
                            @else
                                <div class="icon"><i class="{{$convenio->icon}}" style="{{$convenio->color}}"></i></div>
                            @endif
                            <h4 class="title"><a href="{{route('detail-conv', ['convenio' => $convenio->id])}}">{{$convenio->empresa}}</a></h4>
                            <p class="description">{{$convenio->objeto}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Noticias Section ======= -->
        <section id="notice">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h3>Noticias e Informes</h3>
                    <p>Fique por dentro de tudo que acontece na Associação, eventos e fatos que merecem a sua atenção.</p>
                </header>

                <div class="row row-eq-height justify-content-center">
                    <div class="col-lg-4 mb-4">
                        <div class="card" data-aos="zoom-in" data-aos-delay="100">
                            <i class="fa fa-diamond"></i>
                            <div class="card-body">
                                <h5 class="card-title">Corporis dolorem</h5>
                                <p class="card-text">Deleniti optio et nisi dolorem debitis. Aliquam nobis est temporibus sunt ab inventore officiis aut voluptatibus.</p>
                                <a href="#" class="readmore">Read more </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="card" data-aos="zoom-in" data-aos-delay="200">
                            <i class="fa fa-language"></i>
                            <div class="card-body">
                                <h5 class="card-title">Voluptates dolores</h5>
                                <p class="card-text">Voluptates nihil et quis omnis et eaque omnis sint aut. Ducimus dolorum aspernatur.</p>
                                <a href="#" class="readmore">Read more </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="card" data-aos="zoom-in" data-aos-delay="300">
                            <i class="fa fa-object-group"></i>
                            <div class="card-body">
                                <h5 class="card-title">Eum ut aspernatur</h5>
                                <p class="card-text">Autem quod nesciunt eos ea aut amet laboriosam ab. Eos quis porro in non nemo ex. </p>
                                <a href="#" class="readmore">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-cols-12 ml-3">
                    <div class="footercad-noticia">
                        <a href="#" class="maisnoti">Mais notícias e informes</a>
                    </div>
                </div>
            </div>
        </section><!-- Fim Noticias Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="clearfix">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3 class="section-title">Galerias</h3>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12">
                        <ul id="portfolio-filters">
                            <li data-filter="*" class="filter-active">Todas</li>
                            <li data-filter=".filter-app">Eventos</li>
                            <li data-filter=".filter-card">Fotos</li>
                            <li data-filter=".filter-web">Turmas</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/app1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Evento 1 </a></h4>
                                <p>App</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/app1.jpg')}}" data-gall="portfolioGallery" title="Evento 1" class="venobox link-preview"><i class="ion ion-eye"></i></a>
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/web3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Turma 3</a></h4>
                                <p>Turma 83</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/web3.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Turma 3"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/app2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">App 2</a></h4>
                                <p>App</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/app2.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="App 2"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/card2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Card 2</a></h4>
                                <p>Card</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/card2.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Card 2"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/web2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Web 2</a></h4>
                                <p>Web</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/web2.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Web 2"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/app3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">App 3</a></h4>
                                <p>App</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/app3.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="App 3"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/card1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Card 1</a></h4>
                                <p>Card</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/card1.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Card 1"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/card3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Card 3</a></h4>
                                <p>Card</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/card3.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Card 3"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{asset('site/img/portfolio/web1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="{{route('detail')}}">Web 1</a></h4>
                                <p>Web</p>
                                <div>
                                    <a href="{{asset('site/img/portfolio/web1.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Web 1"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="section-bg">

            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h3>Nossos Parceiros</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque dere santome nida.</p>
                </div>

                <div class="row no-gutters clients-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo">
                            <img src="{{asset('site/img/clients/client-1.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo">
                            <img src="{{asset('site/img/clients/client-2.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo">
                            <img src="{{asset('site/img/clients/client-3.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo">
                            <img src="{{asset('site/img/clients/client-4.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo">
                            <img src="{{asset('site/img/clients/client-5.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo">
                            <img src="{{asset('site/img/clients/client-6.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo">
                            <img src="{{asset('site/img/clients/client-7.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo">
                            <img src="{{asset('site/img/clients/client-8.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Clients Section -->

    </main><!-- End #main -->


    <!-- Principal fim -->
@endsection

