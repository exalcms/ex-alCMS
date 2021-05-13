@extends('layouts.excms')

@section('conteudo')

    <main id="main">

        <!-- ======= Secção da História  ======= -->
        <section class="history">
            <div class="container">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-6 text-gray-500" style="display: flex; justify-content: center;">
                        <div class="logocms">
                            <img src="{{asset('site/img/apple-touch-icon.png')}}" width="100" alt="" class="img-fluid">

                        </div>
                    </div>
                    <div id="form-register">
                        <div class="row about-extra">
                            <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-left">
                                <img src="{{asset('site/img/imgs_cms/cms_pitangueiras.jpg')}}" width="450" alt="" class="img-fluid"/>
                                <div><h6 class="mt-3">A primeira sede foi no bairro de Pitangueiras</h6></div>
                            </div>

                            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-right">
                                <h4>Mensagem do Presidente</h4>
                                {!! $menspre->introd !!}
                            </div>
                        </div>
                        <div class="row about-extra">
                            <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-right">
                                {!! $menspre->texto !!}
                            </div>
                        </div>
                        <div style="text-align: end;">
                                <h6 class="mb-0">{!! $menspre->user->name_full !!}</h6>
                                <p class="mt-1">Presidente da Associação</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- fim da secção de história -->

    </main><!-- End #main -->

@endsection
