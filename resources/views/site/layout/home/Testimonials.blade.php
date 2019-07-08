@if(isset($testimolnials))
 <!-- Our Testimonial Area -->
    <section class="testimonial_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our TESTIMONIALS</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="testimonial_carosel">
                
                @for ($i = 0; $i < count($testimonials); $i++)
                <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{asset($testimonials[$i]['url'])}}" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{$testimonials[$i]['author']}}</h4>
                            <h6>{{$testimonials[$i]['title']}}</h6>
                        </div>
                    </div>
                    <p><i class="fa fa-quote-right" aria-hidden="true"></i>{{$testimonials[$i]['desct']}}<i class="fa fa-quote-left" aria-hidden="true"></i></p>
                </div>
                @endfor
                
            </div>
        </div>
    </section>
    <!-- End Our testimonial Area -->
    @endif