@if (isset($post['Comment']))
            @for ($i = 0; $i < count($post['Comment']); $i++)
                         <div class="comment_area">
                        <h3>{{ $post['CommentNumber'] }} Comment</h3>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="{{ $post['Comment'][$i]['user']['pp'] }}" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="media-heading" href="#">{{ $post['Comment'][$i]['user']['name'] }}/a>
                                <h5>{{ $post['Comment'][$i]['created_at'] }}</h5>
                                <p>{{ $post['Comment'][$i]['desct']}}</p>
                                <a class="reply" href="#">Reply</a>
                            </div>
                        </div>

                    </div>
                    @for ($j = 0; $j < count($post['Comment'][$i]); $j++)
                        <div class="comment_area reply_comment">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="{{$post['Comment'][$i]['reply'][$j]['user']['pp']}}" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="media-heading" href="#">{{$post['Comment'][$i]['reply'][$j]['user']['name']}}</a>
                                <h5>{{$post['Comment'][$i]['reply'][$j]['created_at']}}</h5>
                                <p>{{$post['Comment'][$i]['reply'][$j]['desct']}}</p>
                                <a class="reply" href="#">Reply</a>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endfor
@endif
            