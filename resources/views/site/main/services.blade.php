@extends('.site/layout/contenu')

@section('page')
        <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Our Services</h2>
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="#" class="active">Services</a></li>
        </ol>
    </section>
    <!-- End Banner area -->


@include('site.layout.service.Build_Construction')
@include('site.layout.service.Featured_Works')
@include('site.layout.Our_Team')




@endsection
