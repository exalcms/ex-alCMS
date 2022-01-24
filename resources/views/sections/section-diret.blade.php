<!-- ======= Team Section ======= -->
<section id="team">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h3>Diretoria</h3>
            <p>Nossa diretoria é composta por ex-alunos que, sem remuneração, dedicam parte do seu tempo às atividades de integração dos ex-alunos através de eventos da Associação.</p>
        </div>

        <div class="row">

            <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                <div class="member">
                    <img src="{{asset($dirPres->photo->photo_path)}}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{!! $dirPres->user->name !!}</h4>
                            <span>{!! $dirPres->diretoria->cargo !!}</span>
                            <div class="social">
                                <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="200">
                <div class="member">
                    <img src="{{asset($dirVic->photo->photo_path)}}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{!! $dirVic->user->name !!}</h4>
                            <span>{!! $dirVic->diretoria->cargo !!}</span>
                            <div class="social">
                                <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="300">
                <div class="member">
                    <img src="{{asset($dirSec->photo->photo_path)}}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{!! $dirSec->user->name !!}</h4>
                            <span>{!! $dirSec->diretoria->cargo !!}</span>
                            <div class="social">
                                <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="400">
                <div class="member">
                    <img src="{{asset($dirFin->photo->photo_path)}}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{!! $dirFin->user->name !!}</h4>
                            <span>{!! $dirFin->diretoria->cargo !!}</span>
                            <div class="social">
                                <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Segunda linha do team -->

        <div class="row">

            <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                <div class="member">
                    <img src="{{asset($dirCom->photo->photo_path)}}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{!! $dirCom->user->name !!}</h4>
                            <span>{!! $dirCom->diretoria->cargo !!}</span>
                            <div class="social">
                                <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="200">
                <div class="member">
                    <img src="{{asset($dirCul->photo->photo_path)}}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{!! $dirCul->user->name !!}</h4>
                            <span>{!! $dirCul->diretoria->cargo !!}</span>
                            <div class="social">
                                <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--
            <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="300">
                <div class="member">
                    <img src="{{asset($dirEsp->photo->photo_path)}}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{!! $dirEsp->user->name !!}</h4>
                            <span>{!! $dirEsp->diretoria->cargo !!}</span>
                            <div class="social">
                                <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->
            <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
                <div class="member">
                    <img src="{{asset($dirJur->photo->photo_path)}}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{!! $dirJur->user->name !!}</h4>
                            <span>{!! $dirJur->diretoria->cargo !!}</span>
                            <div class="social">
                                <a href="{{route('/')}}#contact"><i class="fa fa-envelope"></i></a>
                                <a href="https://www.facebook.com/EX.ALUNOS.CMS" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/exalunoscms/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Fim da linha 2 -->

    </div>
</section><!-- End Team Section -->

