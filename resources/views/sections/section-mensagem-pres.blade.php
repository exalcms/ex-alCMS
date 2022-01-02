<!-- ======= MensagemPresi Section ======= -->
<section id="mensagempresi" class="section-bg">
    <div class="container" data-aso="zoom-in">

        <header class="section-header">
            <h3>Mensagem do Presidente</h3>
        </header>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="testimonial-item">
                    <img src="{{asset($dirPres->photo->photo_path)}}" class="testimonial-img" alt="">
                    <h3>{!! $dirPres->user->nome_guerra !!}</h3>
                    <h4>{!! $dirPres->diretoria->cargo !!}</h4>
                    <p>{!! $menspre->introd !!}</p>
                    <p style="alignment: right !important;"><a href="{{route('message-pres')}}" class="readmore">Leia mais </a></p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Fim MensagemPresi Section -->


