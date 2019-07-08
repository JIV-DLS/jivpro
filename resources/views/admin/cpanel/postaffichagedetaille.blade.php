@extends('.admin/layout/cpanel/content')

@section('page')
    <div class="container-fluid">
        <div class="j-container">
            @for($i = 0; $i < $total; $i++)
            <div class="mySlides">
                <div class="numbertext">{{ $i+1 }} / {{ $total }}</div>
                <img src="{{ asset('storage/'.$imgs[$i]->linkImg) }}" style="width:100%; height:420px">
            </div>
            @endfor

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <!-- Image text -->
            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <!-- Thumbnail images -->

            <div class="j-row">
                @for($i = 0; $i < $total; $i++)
                <div class="j-column">
                    <img class="demo cursor" src="{{ asset('storage/'.$imgs[$i]->linkImg) }}" style="width:100%; height:100px" onclick="currentSlide({{ $i+1 }})" alt="{{ $post->title }}">
                </div>
                @endfor
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link href=" {{ asset('style/pad.css') }} " rel="stylesheet">
@endsection

@section('script')
    <script src=" {{ asset('script/pad.js') }}"></script>
@endsection

