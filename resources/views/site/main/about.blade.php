@extends('.site/layout/contenu')

@section('page')
<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>About Us</h2>
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="#" class="active">About Us</a></li>
        </ol>
    </section>
    <!-- End Banner area -->
    
    @include('site.layout.about.propos')
    @include('site.layout.about.call_min')
    @include('site.layout.about.features')
    @include('site.layout.about.booking')
    @include('site.layout.Our_Team')
@endsection
