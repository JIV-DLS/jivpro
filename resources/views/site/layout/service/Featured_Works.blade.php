@if(isset($featured_work))
 <!-- Our Featured Works Area -->
    <section class="featured_works row" id="nosFoncVed" data-stellar-background-ratio="0.3">
        <div class="tittle wow fadeInUp">
            <h2>Our Featured Works</h2>
            <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
        </div>
        <div class="featured_gallery">
            @for ($i = 0; $i < $featured_work; $i++)
            <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                <img src="images/gallery/gl-1.jpg" alt="">
                <div class="gallery_hover">
                    <h4>{{$featured_work[$i]['title']}}</h4>
                    <a href="{{ asset('storage/'.$featured_work['url']) }}" data-lightbox="image-1">VIEW PROJECT</a>
                </div>
            </div>
            @endfor
        </div>
    </section>
    <!-- End Our Featured Works Area -->
@endif