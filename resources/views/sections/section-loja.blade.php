<!-- ======= nossaloja Section ======= -->
<section id="nossaloja" class="clearfix">
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h3 class="section-title">Nossa Loja</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12">
                <ul id="nossaloja-flters">
                    <li data-filter="*" class="filter-active">Todos</li>
                    <li data-filter=".filter-card">Canecas</li>
                    <li data-filter=".filter-web">Bonés</li>
                    <li data-filter=".filter-cami">Camisas</li>
                    <li data-filter=".filter-app">Eventos</li>
                    <li data-filter=".filter-bolet">Anuidade</li>
                </ul>
            </div>
        </div>

        <div class="row nossaloja-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 nossaloja-item filter-app">
                <div class="nossaloja-wrap">
                    <img src="{{asset('site/img/portfolio/app1.jpg')}}" class="img-fluid" alt="">
                    <div class="nossaloja-info">
                        <h4><a href="{{route('detail')}}">Evento 1 </a></h4>
                        <p>App</p>
                        <div>
                            <a href="{{asset('site/img/portfolio/app1.jpg')}}" data-gall="portfolioGallery" title="Evento 1" class="venobox link-preview"><i class="ion ion-eye"></i></a>
                            <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 nossaloja-item filter-web">
                <div class="nossaloja-wrap">
                    <img src="{{asset('site/img/portfolio/web3.jpg')}}" class="img-fluid" alt="">
                    <div class="nossaloja-info">
                        <h4><a href="{{route('detail')}}">Turma 3</a></h4>
                        <p>Turma 83</p>
                        <div>
                            <a href="{{asset('site/img/portfolio/web3.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Turma 3"><i class="ion ion-eye"></i></a>
                            <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 nossaloja-item filter-app">
                <div class="nossaloja-wrap">
                    <img src="{{asset('site/img/portfolio/app2.jpg')}}" class="img-fluid" alt="">
                    <div class="nossaloja-info">
                        <h4><a href="{{route('detail')}}">App 2</a></h4>
                        <p>App</p>
                        <div>
                            <a href="{{asset('site/img/portfolio/app2.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="App 2"><i class="ion ion-eye"></i></a>
                            <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 nossaloja-item filter-card">
                <div class="nossaloja-wrap">
                    <img src="{{asset('site/img/portfolio/card2.jpg')}}" class="img-fluid" alt="">
                    <div class="nossaloja-info">
                        <h4><a href="{{route('detail')}}">Card 2</a></h4>
                        <p>Card</p>
                        <div>
                            <a href="{{asset('site/img/portfolio/card2.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Card 2"><i class="ion ion-eye"></i></a>
                            <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 nossaloja-item filter-web">
                <div class="nossaloja-wrap">
                    <img src="{{asset('site/img/portfolio/web2.jpg')}}" class="img-fluid" alt="">
                    <div class="nossaloja-info">
                        <h4><a href="{{route('detail')}}">Web 2</a></h4>
                        <p>Web</p>
                        <div>
                            <a href="{{asset('site/img/portfolio/web2.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Web 2"><i class="ion ion-eye"></i></a>
                            <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 nossaloja-item filter-app">
                <div class="nossaloja-wrap">
                    <img src="{{asset('site/img/portfolio/app3.jpg')}}" class="img-fluid" alt="">
                    <div class="nossaloja-info">
                        <h4><a href="{{route('detail')}}">App 3</a></h4>
                        <p>App</p>
                        <div>
                            <a href="{{asset('site/img/portfolio/app3.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="App 3"><i class="ion ion-eye"></i></a>
                            <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 nossaloja-item filter-card">
                <div class="nossaloja-wrap">
                    <img src="{{asset('site/img/portfolio/card1.jpg')}}" class="img-fluid" alt="">
                    <div class="nossaloja-info">
                        <h4><a href="{{route('detail')}}">Card 1</a></h4>
                        <p>Card</p>
                        <div>
                            <a href="{{asset('site/img/portfolio/card1.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Card 1"><i class="ion ion-eye"></i></a>
                            <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 nossaloja-item filter-card">
                <div class="nossaloja-wrap">
                    <img src="{{asset('site/img/portfolio/card3.jpg')}}" class="img-fluid" alt="">
                    <div class="nossaloja-info">
                        <h4><a href="{{route('detail')}}">Card 3</a></h4>
                        <p>Card</p>
                        <div>
                            <a href="{{asset('site/img/portfolio/card3.jpg')}}" class="venobox link-preview" data-gall="portfolioGallery" title="Card 3"><i class="ion ion-eye"></i></a>
                            <a href="{{route('detail')}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 nossaloja-item filter-web">
                <div class="nossaloja-wrap">
                    <img src="{{asset('site/img/portfolio/web1.jpg')}}" class="img-fluid" alt="">
                    <div class="nossaloja-info">
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
</section>

<!-- End nossaloja Section -->

