@if(isset($lastProject)) 
 <!-- Our Latest Blog Area -->
    <section class="latest_blog_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Latest Blog</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="row latest_blog">
                @for ($i = 0; $i < count($lastProject); $i++)
                    <div class="col-md-4 col-sm-6 blog_content">
                    <img src="{{ asset($lastProject[$i]['url']) }}" alt="">
                    <a href="#" class="blog_heading">{{$lastProject[$i]['title']}}</a>
                    <h4><small>by  </small><a href="#">{{$lastProject[$i]['author']}}</a><span>/</span><small>ON </small>{{$lastProject[$i]['created_at']}}</h4>
                    <p>{{$lastProject[$i]['desct']}}<a href="#">Read More</a></p>
                </div>
                @endfor
            </div>
        </div>
    </section>
    <!-- End Our Latest Blog Area -->
    @endif