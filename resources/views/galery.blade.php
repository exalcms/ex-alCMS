@extends('layouts.excms')

@section('conteudo')

    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section class="portfolio-details">
            <div class="container container-galery">
                <div class="row" >
                    <div class="col">
                        <div id="carrouselControls" class="carousel slide" data-ride="carousel" data-interval="4000" data-pause="hover">
                            <div class="carousel-inner">
                                <?php $i = 0; ?>
                                @foreach($galeria->photos as $photo)
                                    @if($i == 0)
                                       <div class="carousel-item active">
                                           <img src="{{asset($photo->photo_path)}}" alt="">
                                           <div class="carousel-caption d-none d-md-block">
                                               <h6>{{$galeria->titulo}}</h6>
                                               <p>{{$photo->legenda}}</p>
                                           </div>
                                       </div>
                                    @else
                                       <div class="carousel-item">
                                           <img src="{{asset($photo->photo_path)}}" alt="">
                                           <div class="carousel-caption d-none d-md-block">
                                               <h6>{{$galeria->titulo}}</h6>
                                               <p>{{$photo->legenda}}</p>
                                           </div>
                                       </div>
                                    @endif
                                    <?php $i++; ?>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carrouselControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon icon-cores" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carrouselControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Próximo</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Portfolio Details Section -->


    </main><!-- End #main -->

@endsection
