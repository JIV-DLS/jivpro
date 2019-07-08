@extends('.admin/layout/cpanel/content')

@section('page')
    <div class="container-fluid">

        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">{{ $page }} non trouver</p>
            <a href="/master/acceuil">&larr; Retourn&eacute;e &agrave; l&apos;acceuil</a>
        </div>

    </div>
@endsection
