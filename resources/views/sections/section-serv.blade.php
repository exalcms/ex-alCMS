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


