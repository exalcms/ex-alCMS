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
    </section>
<!-- Fim Historico Section -->
