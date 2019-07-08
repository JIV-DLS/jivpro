@if (isset($all_services,$service))
    <!-- Our Services Area -->
    <section class="our_services_tow">
        <div class="container">
            <div class="architecture_area services_pages">
                <div class="portfolio_filter portfolio_filter_2">
                    <ul>
                        @for ($i = 0; $i < count($all_services); $i++)
                            <li data-filter="{{($i==0)? '*':'.'.lowerCase($all_services[$i]['lib'])}}" class="{{($i==0)? 'active':''}}">
                            <a href=""><i class="fa {{$all_services[$i]['fa']}}" aria-hidden="true"></i>{{'.'.upperCase($all_services[$i]['lib'])}}</a></li>
                        
                        @endfor
                        
                    </ul>
                </div>
                <div class="portfolio_item portfolio_2">
                   <div class="grid-sizer-2"></div>
                    <div class="single_facilities col-sm-7 painting building painting adversting">
                        <div class="who_we_area">
                            <div class="subtittle">
                                <h2>{{$service['lib']}}</h2>
                            </div>
                            <p>{{$service['desct']}}</p>
                            <a href="#" class="button_all">Contact Now</a>
                        </div>
                    </div>
                    <div class="single_facilities col-sm-5 painting webdesign">
                        <img src="{{ asset('storage/'.$service['url']) }}" alt="{{$service['imgName'] }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Services Area -->
@endif
