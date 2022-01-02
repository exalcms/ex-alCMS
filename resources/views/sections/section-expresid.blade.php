<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="section-bg">
    <div class="container" data-aso="zoom-in">

        <header class="section-header">
            <h3>Galeria Ex-Presidentes</h3>
        </header>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="owl-carousel testimonials-carousel">
                    @foreach($expresids as $expresid)
                        <div class="testimonial-item">
                            <img src="{{asset($expresid->photo->photo_path)}}" class="testimonial-img"/>
                            <h3>{!! $expresid->user->name !!}</h3>
                            <h4>{!! 'De '.$expresid->inicio.' - '.$expresid->final !!}</h4>

                            {!! $expresid->msg !!}

                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</section>

<!-- End Testimonials Section -->

