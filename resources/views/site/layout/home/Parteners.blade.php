    <!-- Our Partners Area -->
    <section class="our_partners_area">
        @if (isset($parteners))
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Partners</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="partners">
                @for ($i = 0; $i < count($parteners); $i++)
                    <div class="item"><img src="{{asset('storage/'.$partners[$i]['url'])}}" alt=""></div>
                @endfor
                
            </div>
        </div>
        @endif
        
        @include('site.layout.about.booking')
    </section>
    <!-- End Our Partners Area -->