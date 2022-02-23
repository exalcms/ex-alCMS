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
                    <li data-filter=".filter-bolet">Anuidade</li>
                    <li data-filter=".filter-brind">Brindes</li>
                    <li data-filter=".filter-campan">Campanhas</li>
                    <li data-filter=".filter-divers">Diversos</li>
                    <li data-filter=".filter-event">Eventos</li>
                    <li><a href="{{route('nossaloja')}}">Acessar Loja</a></li>
                </ul>
            </div>
        </div>

        <div class="row nossaloja-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($products as $product)
                @switch($product->category->name)
                    @case('Eventos')
                        <div class="col-lg-4 col-md-6 nossaloja-item filter-event">
                    @break
                    @case('Anuidade')
                        <div class="col-lg-4 col-md-6 nossaloja-item filter-bolet">
                    @break
                    @case('Diversos')
                        <div class="col-lg-4 col-md-6 nossaloja-item filter-divers">
                    @break
                    @case('Campanhas')
                        <div class="col-lg-4 col-md-6 nossaloja-item filter-campan">
                    @break
                    @default
                        <div class="col-lg-4 col-md-6 nossaloja-item filter-brind">
                    @endswitch
                            <div class="nossaloja-wrap">
                                @foreach($product->photos as $photo)
                                    <img src="{{asset($photo->photo_path)}}" class="img-fluid" alt="">
                                @break
                                @endforeach
                                <div class="nossaloja-info">
                                    <h4><a href="#">Veja mais detalhes</a></h4>
                                    <div>
                                        <a href="{{ route('nossaloja') }}" title="Visite a Nossa Loja" ><i class="ion ion-eye"></i></a>
                                        <a href="{{ route('produto', ['product' => $product->id]) }}" class="link-details" title="{{$product->name}}"><i class="ion ion-android-open"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
            @endforeach
        </div>
    </div>
</section>

<!-- End nossaloja Section -->

