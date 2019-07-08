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
                                        <a href="/master/post/affichage/{{ request()->session()->get('post')->idPst }}">D&eacute;tails</a>
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
                        <h6 class="m-0 font-weight-bold text-primary text-center">Ajouter un post</h6>
                    </div>
                    <div class="card-body py-3">
                        <form class="user" method="post" enctype="multipart/form-data" id="postform">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p>Titre</p>
                                <input type="text" class="form-control form-control-user" name="title" value="{{ old('title') }}"  >
                                @if($errors->has('title'))
                                    <p class="j-txt-error">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <p>Description</p>
                                <textarea class="form-control form-control-user" name="desct" value="{{ old('desct') }}"></textarea>
                                @if($errors->has('desct'))
                                    <p class="j-txt-error">{{ $errors->first('desct') }}</p>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p>Categorie</p>
                                    <select class="form-control form-control-user" name="cat">
                                        @foreach($cat as $c)
                                        <option value="{{ $c->idCat }}">{{ $c->libCat }}</option>
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
                                    <div class="col-sm-6">
                                        <button type="button"  id="j-file-btn" class="btn btn-info btn-circle btn-lg">
                                            <i class="fas fa-file-upload"></i>
                                        </button>
                                    </div>
                                    @if($errors->has('file'))
                                        <p class="j-txt-error"> {{ $errors->first('file') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div id="j-upload-rlt"></div>
                            <hr>
                            <div class="form-group row">
                                <hr>
                                <button type="submit" class="btn btn-success btn-circle btn-lg">
                                    <i class="fas fa-check"></i>
                                </button>
                                <hr>
                                <button type="reset" class="btn btn-danger btn-circle btn-lg" onclick="supprimerTout()">
                                    <i class="fas fa-trash"></i>
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
@endsection