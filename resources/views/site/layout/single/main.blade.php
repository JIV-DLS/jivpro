@if (isset($post))
<img src="{{ asset('storage/'.$post['url']) }}" alt="{{ $post['url'] }}">
                    <div class="col-xs-1 p0">
                       <div class="blog_date">
                           <a href="#">{{$post['day']}}</a>
                            <a href="#">{{$post['month']}}</a>
                       </div>
                    </div>
                    <div class="col-xs-11 blog_content">
                        <a class="blog_heading" href="#">{{$post['title']}}</a>
                        <a class="blog_admin" href="#"><i class="fa fa-user" aria-hidden="true"></i>{{$post['user']}}</a>
                        <ul class="like_share">
                            <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>{{ $post['commentNumber'] }}</a></li>
                            <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>{{ $post['likeNumber'] }}</a></li>
                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>{{ $post['shareNumber'] }}</a></li>
                        </ul>
                        <p>{{ $post['desct'] }}</p>
                        <div class="tag">
                            <h4>TAG</h4>
                            <a href="#">PAINTING</a>
                            <a href="#">CONSTRUCTION</a>
                            <a href="#">PAINTING</a>
                        </div>
                    </div>
                    <div class="client_text">
                        <img class="img-circle" src="{{asset($post['user']['pp'])}}" alt="">
                        <a class="client_name" href="#">{{ $post['user']['name'] }}</a>
                        <p>{{ $post['resume'] }}</p>
                        <a class="control button_all" href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Construction Data Company</a>
                        <a class="control button_all" href="#">Best Construction Management <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
    
@endif
