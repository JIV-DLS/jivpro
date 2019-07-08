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
                                            <img src="{{ asset('storage/'.$imgs[$i]) }}" alt="{{ $imgs[$i]}}" style="width:100%; height:200px">
                                            <div class="j-container">
                                                <h5>{{ $posts[$i]->title }}</h5>
                                            </div>
                                            <hr class="j-no-buttom-margin">
                                            <div class="form-group row j-margin">
                                                <div class="col-sm j-txt-center">
                                                    <div class="form-check">
                                                        @if($posts[$i]->slide == 1)
                                                            <input class="form-check-input" checked type="checkbox"  name="slide" onchange="sliding({{ $posts[$i]->idPst }})">
                                                        @else
                                                            <input class="form-check-input"  type="checkbox"  name="slide" onchange="sliding({{ $posts[$i]->idPst }})">
                                                        @endif
                                                        <label class="form-check-label">*Slide*</label>
                                                    </div>

                                                    <div class="form-check">
                                                        @if($posts[$i]->active == 1)
                                                            <input class="form-check-input" checked type="checkbox"  name="active" onchange="activing({{ $posts[$i]->idPst }})">
                                                        @else
                                                            <input class="form-check-input"  type="checkbox" name="active" onchange="activing({{ $posts[$i]->idPst }})">
                                                        @endif
                                                        <label class="form-check-label">Activer</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm j-txt-center">
                                                    <a href="/master/post/edit/{{ $posts[$i]->idPst }}">
                                                    <button type="submit" class="btn btn-primary btn-circle">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    </a>
                                                </div>

                                                <div class="col-sm j-txt-center">
                                                    <button type="reset" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" onclick="deleting({{ $posts[$i]->idPst }}, '{{ $posts[$i]->title }}', '{{ $imgs[$i] }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <hr>
                                    </div>
                                </div>

                                @if($j >= 3 or $i == $total - 1)
                            </div>
                        @endif
                        <?php
                        if($j >= 3) $j=0;
                        ?>
                    @endfor
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <input type="hidden" id="delete" value="">
                                    <div class="modal-body">Voulez-vous supprimer</div>

                                    <div class="j-padding-1">
                                        <div class="j-card">
                                            <img src="" alt="" style="width:100%; height:200px" id="delImg">
                                            <div class="j-container">
                                                <h5 id="delTitle"></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal" >Annuler</button>
                                        <a href class="btn btn-danger" id="cftdelete">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('style')
    <link href=" {{ asset('style/paus.css') }} " rel="stylesheet">
    <link href=" {{ asset('style/style.css') }} " rel="stylesheet">
@endsection

@section('script')
    <script src=" {{ asset('script/ea.js') }}"></script>
@endsection


