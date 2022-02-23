@extends('layouts.excms')

@section('conteudo')

    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section class="portfolio-details">
            <div class="container">

                <div class="portfolio-details-container">
                    @if(!$convenio->photo)

                    <div class="owl-carousel portfolio-details-carousel">
                        <img src="{{asset('site/img/portfolio/portfolio-details-1.jpg')}}" class="img-fluid" alt="">
                        <img src="{{asset('site/img/portfolio/portfolio-details-2.jpg')}}" class="img-fluid" alt="">
                        <img src="{{asset('site/img/portfolio/portfolio-details-3.jpg')}}" class="img-fluid" alt="">
                    </div>
                    @else
                        <div class="owl-carousel portfolio-details-carousel">
                            @foreach($convenio->photos as $photo)
                                <img src="{{asset($photo->photo_path)}}" class="img-fluid" alt="">
                            @endforeach
                        </div>
                    @endif

                    <div class="portfolio-info">
                        <h3>Informações do Convênio</h3>
                        <ul>
                            <li><strong>Empresa</strong>: {{$convenio->empresa}}</li>
                            <li><strong>Válido até</strong>: {{\Carbon\Carbon::parse($convenio->data_valid)->format('d/m/Y')}}</li>
                            <li><strong>E-mail</strong>: {{$convenio->email}}</li>
                            <li>{!! Button::primary('Verificar habilitação')->asLinkTo(route('consult', ['convenio' => $convenio->id])) !!}</li>
                        </ul>
                    </div>

                </div>

                <div class="portfolio-description">
                    <h2>{{$convenio->objeto}}</h2>
                    {!! $convenio->beneficios !!}
                    <p>Condições para se habilitar: {{$convenio->condicions}}</p>
                    <h6>Observações</h6>
                    {!! $convenio->obs !!}
                </div>
            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

@endsection
