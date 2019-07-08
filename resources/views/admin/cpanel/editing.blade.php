@extends('.admin/layout/cpanel/content')

@section('page')
    <div class="container-fluid">
        @if(request()->session()->get('reussie'))
            <div class="col-lg-8 col-md-6 mb-4 j-box-succes">
                <div class="card border-left-success h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg font-weight-bold text-success text-uppercase mb-1">{{ request()->session()->get('reussie') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="j-row">
                            <div class="j-column">
                                <div class="j-card">
                                    <img src="{{ asset('storage/'.request()->session()->get('img')->linkImg) }}" alt="{{ request()->session()->get('img')->linkImg }}" style="width:100%">
                                    <div class="j-container">
                                        <h2>{{ request()->session()->get('post')->title }}</h2>
                                        <hr>
                                        <a href="/master/post/affichage/{{ request()->session()->get('post')->idPst }}">D&eacute;taile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

        <div class="row ajtadd ">
            <div class="col-lg-8 ">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Modifier un post</h6>
                    </div>
                    <div class="card-body py-3">
                        <form class="user" method="post" enctype="multipart/form-data" id="postform">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $post->idPst }}" name="idPst" id="idPst">
                            <div class="form-group">
                                <p>Titre</p>
                                <input type="text" class="form-control form-control-user" name="title" value="{{ $post->title }}"  >
                                @if($errors->has('title'))
                                    <p class="j-txt-error">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <p>Description</p>
                                @if($post->desct != null)
                                    <textarea class="form-control form-control-user" name="desct" >{{ $post->desct }}</textarea>
                                @else
                                    <textarea class="form-control form-control-user" name="desct" value="{{ old('desct') }}"></textarea>
                                @endif
                                @if($errors->has('desct'))
                                    <p class="j-txt-error">{{ $errors->first('desct') }}</p>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p>Categorie</p>
                                    <select class="form-control form-control-user" name="cat">
                                        @foreach($cat as $c)
                                            @if($post->idCat == $c->idCat)
                                                <option value="{{ $c->idCat }}" selected>{{ $c->libCat }}</option>
                                            @else
                                                <option value="{{ $c->idCat }}">{{ $c->libCat }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('cat'))
                                        <p class="j-txt-error">{{ $errors->first('cat') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p></p>
                                    <input type="file" class="form-control form-control-user j-file-input" id="j-file-input-ajax" name="file[]" multiple accept=".png, .jpg, .jpeg, .gif">
                                <!--      <div class="col-sm-6">
                                        <button type="button"  id="j-file-btn" class="btn btn-info btn-circle btn-lg">
                                            <i class="fas fa-file-upload"></i>
                                        </button>
                                    </div>-->
                                    @if($errors->has('file'))
                                        <p class="j-txt-error"> {{ $errors->first('file') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div id="j-upload-rlt">
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
                                                            <img src="{{ asset('storage/'.$imgs[$i]->linkImg) }}" alt="{{ $imgs[$i]->linkImg }}" style="width:100%; height: 100px">
                                                            <p></p>
                                                            <div class="j-container">
                                                                @if($imgs[$i]->default == 1)
                                                                    <input type="radio" name="choix" class="choix" id="choix" value="{{ $imgs[$i]->idImg }}" onchange="defaulting({{ $imgs[$i]->idImg }})" required checked>
                                                                @else
                                                                    <input type="radio" name="choix" class="choix" id="choix" value="{{ $imgs[$i]->idImg }}" onchange="defaulting({{ $imgs[$i]->idImg }})" required>
                                                                @endif
                                                                <span>Image par default</span>
                                                                <p><button type="button" class="j-button" value="{{ $imgs[$i]->idImg }}" onclick="deletingDB({{ $imgs[$i]->idImg }}, '{{ $imgs[$i]->linkImg }}')" data-toggle="modal" data-target="#deleteDBModal">Supprimer</button></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($j >= 3)
                                                </div>
                                            @endif
                                            <?php
                                            if($j >= 3) $j=0;
                                            ?>
                                        @endfor
                                    </div>

                                        <div class="modal fade" id="deleteDBModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal" >Annuler</button>
                                                        <a  href type="button" class="btn btn-danger" id="cftDBdelete">Supprimer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endif

                            </div>
                            <hr>
                            <div class="form-group row">
                                <hr>
                                <button type="submit" class="btn btn-primary btn-circle btn-lg">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <hr>
                                <button type="reset" class="btn btn-danger btn-circle btn-lg">
                                    <i class="fas fa-redo"></i>
                                </button>
                                <hr>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('style')
    <link href=" {{ asset('style/paus.css') }} " rel="stylesheet">
@endsection

@section('script')
    <script src=" {{ asset('script/paus.js') }}"></script>
    <script src=" {{ asset('script/ea.js') }}"></script>
@endsection