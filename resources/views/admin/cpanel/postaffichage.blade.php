@extends('.admin/layout/cpanel/content')

@section('page')
    <div class="container-fluid">
        <div class="container">
            <h2>Listes des posts</h2>
            <hr>
            <?php
            $j = 0;
            ?>

            @if(isset($total))
                <div>
                    @for($i = 0; $i < $total; $i++)
                        <?php
                        $j++;
                        ?>
                        @if($j <= 1)
                            <div class="j-row">
                        @endif

                                <div class="j-column">
                                    <div class="j-card">
                                        <a href="/master/post/affichage/{{ $posts[$i]->idPst }}">
                                            <img src="{{ asset('storage/'.$imgs[$i]) }}" alt="{{ $imgs[$i]}}" style="width:100%; height:200px">
                                            <div class="j-container">
                                                <h5>{{ $posts[$i]->title }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                        @if($j >= 3 or $i == $total - 1)
                            </div>
                        @endif
                        <?php
                        if($j >= 3) $j=0;
                        ?>
                    @endfor
                </div>
            @endif
        </div>
    </div>
@endsection

@section('style')
    <link href=" {{ asset('style/paus.css') }} " rel="stylesheet">
@endsection
