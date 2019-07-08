@if(isset($slides))
 <!-- Slider area -->
 <section class="slider_area row m0">
        <div class="slider_inner">
            @for($i = 0; $i < count($slides); $i++)
            @if ($i==0)
                {{-- expr --}}
           
            <div data-thumb="{{$slides[$i]['url']}}" data-src="{{$slides[$i]['url']}}">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to our</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">{{$slides[$i]['title']}}</h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s">{{$slides[$i]['desct']}}</p>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#">Read More</a>
                   </div>
                </div>
            </div>
             @else
            <div data-thumb="{{$slides[$i]['url']}}" data-src="{{$slides[$i]['url']}}">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to our</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">{{$slides[$i]['title']}}</h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s">{{$slides[$i]['desct']}}</p>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#">Read More</a>
                   </div>
                </div>
            </div>
            @endif
            @endfor
        </div>
    </section>
    <!-- End Slider area -->
@endif