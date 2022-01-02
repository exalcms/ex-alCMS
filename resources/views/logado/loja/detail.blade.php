@extends('layouts.excms')

@section('conteudo')

    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section class="portfolio-details">
            <div class="container">

                <div class="portfolio-details-container">

                    <div class="owl-carousel portfolio-details-carousel">
                        <img src="{{asset('site/img/portfolio/portfolio-details-1.jpg')}}" class="img-fluid" alt="">
                        <img src="{{asset('site/img/portfolio/portfolio-details-2.jpg')}}" class="img-fluid" alt="">
                        <img src="{{asset('site/img/portfolio/portfolio-details-3.jpg')}}" class="img-fluid" alt="">
                    </div>

                    <div class="portfolio-info">
                        <h3>Página dentro do Logado</h3>
                        <ul>
                            <li><strong>Category</strong>: Web design</li>
                            <li><strong>Client</strong>: ASU Company</li>
                            <li><strong>Project date</strong>: 01 March, 2020</li>
                            <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                        </ul>
                    </div>

                </div>

                <div class="portfolio-description">
                    <h2>This is an example of portfolio detail</h2>
                    <p>
                        Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                    </p>
                </div>
            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

@endsection
