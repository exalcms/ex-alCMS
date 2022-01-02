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
    </section>
<!-- End About Section -->
