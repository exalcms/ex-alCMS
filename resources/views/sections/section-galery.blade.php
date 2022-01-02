<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="clearfix">
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h3 class="section-title">Galerias</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Todas</li>
                    <li data-filter=".filter-even">Eventos</li>
                    <li data-filter=".filter-fots">Fotos</li>
                    <li data-filter=".filter-turms">Turmas</li>
                    <li><a href="{{route('galeries')}}">Ver Todas</a></li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            @foreach($galeries as $galery)
                @switch($galery->tipo)
                    @case('Eventos')
                        <div class="col-lg-4 col-md-6 portfolio-item filter-even">
                        @break
                    @case('Turmas')
                        <div class="col-lg-4 col-md-6 portfolio-item filter-turms">
                        @break
                    @default
                        <div class="col-lg-4 col-md-6 portfolio-item filter-fots">
                @endswitch
                            <div class="portfolio-wrap">
                                @foreach($galery->photos as $photo)
                                    <img src="{{asset($photo->photo_path)}}" class="img-fluid" alt="">
                                @break
                                @endforeach
                    <div class="portfolio-info">
                        <h4><a href="{{route('galery', ['galery' => $galery->id])}}">{{$galery->tipo}}</a></h4>
                        <p>{{$galery->titulo.' - '.Carbon\Carbon::parse($galery->data)->format('d/m/Y')}}</p>
                        <div>
                            <a href="{{route('galery', ['galery' => $galery->id])}}" title="{{$galery->titulo}}" ><i class="ion ion-eye"></i></a>
                            <a href="{{route('galery', ['galery' => $galery->id])}}" class="link-details" title="{{$galery->titulo}}"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- End Portfolio Section -->


