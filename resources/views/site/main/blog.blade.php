 @extends('.site/layout/contenu')

@section('page')

 <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Our Blog</h2>
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="#" class="active">Blog</a></li>
        </ol>
    </section>
    <!-- End Banner area -->
@if (isset($post))
    <!-- blog-2 area -->
    <section class="blog_tow_area">
        <div class="container">
           <div class="row blog_tow_row">
                
                @for ($i = 0; $i < $post->count(); $i++)
                    
                <div class="col-md-4 col-sm-6">
                    <div class="renovation">
                        <img src="images/blog/renovation/r-1.jpg" alt="">
                        <div class="renovation_content">
                            <a class="clipboard" href="#"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                            <a class="tittle" href="#">{{$post[$i]['title']}}</a>
                            <div class="date_comment">
                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{$post[$i]['created_at']}}</a>
                                <a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i>{{$post[$i]['Comments']['Number']}}</a>
                            </div>
                            <p>{{$post[$i]['resume']}}</p>
                        </div>
                    </div>
                </div>
                @endfor
               
           </div>
        </div>
    </section>
    <!-- End blog-2 area -->
@endif

@endsection