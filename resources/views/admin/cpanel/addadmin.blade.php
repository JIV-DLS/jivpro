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
        @endif

        <div class="row ajtadd ">
            <div class="col-lg-8 ">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Ajouter un administrateur</h6>
                    </div>
                    <div class="card-body py-3">
                        <form class="user" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p>Nom</p>
                                    <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}"  required>
                                    @if($errors->has('name'))
                                        <p class="j-txt-error"> {{ $errors->first('name') }} </p>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <p>Prenom</p>
                                    <input type="text" class="form-control form-control-user" name="prename" value="{{ old('prename') }}" id="exampleLastName" required>
                                    @if($errors->has('prename'))
                                        <p class="j-txt-error">{{ $errors->first('prename') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Email</p>
                                <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" id="exampleInputEmail" required>
                                @if($errors->has('email'))
                                    <p class="j-txt-error">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <p>Utilisateur</p>
                                <input type="text" class="form-control form-control-user"  name="user" value="{{ old('user') }}" id="exampleInputEmail" required>
                                @if($errors->has('user'))
                                    <p class="j-txt-error">{{ $errors->first('user') }}</p>
                                @elseif(request()->session()->get('var'))
                                    <p class="j-txt-error">{{ request()->session()->get('var') }}</p>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p>Mot de passe</p>
                                    <input type="password" class="form-control form-control-user"  name="pass" id="exampleInputPassword" required>
                                    @if($errors->has('pass'))
                                        <p class="j-txt-error">{{ $errors->first('pass') }}</p>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <p>Confirmer le mot de passe</p>
                                    <input type="password" class="form-control form-control-user" name="cftpass" id="exampleRepeatPassword" required>
                                    @if($errors->has('cftpass'))
                                        <p class="j-txt-error">{{ $errors->first('pass') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p></p>
                                    <input type="file" class="form-control form-control-user j-file-input" id="j-file-input" name="file">
                                    <input type="text" class="form-control form-control-user" id="j-file-txt" value="{{ old('file') }}" readonly>
                                    @if($errors->has('file'))
                                        <p class="j-txt-error"> {{ $errors->first('file') }} </p>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <button type="button"  id="j-file-btn" class="btn btn-info btn-circle btn-lg">
                                        ...
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <hr>
                                <button type="submit" class="btn btn-success btn-circle btn-lg">
                                    <i class="fas fa-check"></i>
                                </button>
                                <hr>
                                <button type="reset" class="btn btn-danger btn-circle btn-lg">
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

@section('script')
    <script src=" {{ asset('script/script.js') }}"></script>
@endsection