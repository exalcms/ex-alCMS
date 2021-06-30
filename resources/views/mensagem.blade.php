@extends('layouts.excms')

@section('conteudo')

    <main id="main" style="margin-top: 80px;">
        <!-- ======= Contact Section ======= -->
        <section id="contact">
            <div class="container-fluid" data-aos="fade-up">

                <div class="section-header">
                    <h3>Fale Conosco</h3>
                </div>

                <div class="row">

                    <div class="col-lg-5">
                        <div class="map mb-4 mb-lg-0">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2655.8016948656236!2d-38.458088792920556!3d-12.996093875683803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1scolegio%20militar%20de%20salvador!5e0!3m2!1spt-BR!2sbr!4v1603056454167!5m2!1spt-BR!2sbr" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-5 info">
                                <i class="ion-ios-location-outline"></i>
                                <p>{!! $exCMS->end.' - '.$exCMS->bairro.', '.$exCMS->cidade.'/'.$exCMS->uf.'<br/> CEP: '.$exCMS->cep !!}</p>
                            </div>
                            <div class="col-md-4 info">
                                <i class="ion-ios-email-outline"></i>
                                <p>{!! $exCMS->email !!}</p>
                            </div>
                            <div class="col-md-3 info">
                                <i class="ion-ios-telephone-outline"></i>
                                <p>{!! $exCMS->tel !!}</p>
                            </div>
                        </div>

                        <div class="form">
                            <x-jet-validation-errors class="mb-4" />
                            @if(Auth::guest())
                            <form action="{{route('mensagems.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="">
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu Nome" value="{{old('nome')}}" required/>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="tele" class="form-control" id="tele" placeholder="Seu Telefone" value="{{old('tele')}}" required />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Seu Email" value="{{old('email')}}" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" value="{{old('subject')}}" required />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="mensagem" rows="5" placeholder="Mensagem" required>{{old('mensagem')}}</textarea>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <x-jet-button class="ml-4" style="width:40%; display: flex; justify-content: center;">
                                        {{ __('Enviar Mensagem') }}
                                    </x-jet-button>
                                </div>
                            </form>
                            @else
                                <form action="{{route('mensagems.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu Nome" value="{{Auth::user()->name}}" required/>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="tele" class="form-control" id="tele" placeholder="Seu Telefone" value="{{Auth::user()->celular}}" required />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Seu Email" value="{{Auth::user()->email}}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" value="{{old('subject')}}" required />
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="mensagem" rows="5" placeholder="Mensagem" required>{{old('mensagem')}}</textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <x-jet-button class="ml-4" style="width:40%; display: flex; justify-content: center;">
                                            {{ __('Enviar Mensagem') }}
                                        </x-jet-button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->


    <!-- Principal fim -->
@endsection

