@extends('.admin/layout/login/master')

@section('page')
    <div class="bg-layer">
        <h1>
        </h1>
        <div class="header-main">
            @if(request()->session()->get('error'))
                <div class="session alert-danger">
                    <p>{{ request()->session()->get('error') }}</p>
                </div>
            @endif
            <div class="header-left-bottom">
                <form method="post">
                    {{ csrf_field() }}
                    <div class="icon1">
                        <span class="fa fa-user"></span>
                        <input type="text" placeholder="Utilisateur" name="user" required value="{{ old('user') }}"/>
                    </div>
                    <div class="icon1">
                        <span class="fa fa-lock"></span>
                        <input type="password" placeholder="Mots de passe" name="pass" required=""/>
                    </div>
                    <div class="bottom">
                        <button class="btn" type="submit">Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
