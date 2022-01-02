@extends('layouts.excms')

@section('conteudo')

    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section class="portfolio-details">
            <div class="container">

                <div class="tz-gallery">
                    <div class="row">
                        @foreach($convenios as $convenio)
                            @foreach($convenio->photos as $photo)
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="{{asset('uploads/'.$photo->name)}}">
                                <img src="{{asset('uploads/'.$photo->name)}}" alt="Park">
                            </a>
                        </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        {{$convenios->render()}}
                    </div>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
            <script>
                baguetteBox.run('.tz-gallery');
            </script>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

@endsection
