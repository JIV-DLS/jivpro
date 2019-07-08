@extends('.site/layout/contenu')

@section('page')


    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Our Blog</h2>
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="#" class="active">Blog</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- blog area -->
    <section class="blog_all">
        <div class="container">
            <div class="row m0 blog_row">
                <div class="col-sm-8 main_blog">
                    
                   @include('site.layout.single.main')
                   @include('site.layout.single.Comments')
                   @include('site.layout.single.postAComment')
                    
                </div>

                <div class="col-sm-4 widget_area">
                    @include('site.layout.single.recentPost')
                    @include('site.layout.single.categories')
                    @include('site.layout.single.archives')
                    @include('site.layout.single.search')
                    @include('site.layout.single.tag')
                </div>
            </div>
        </div>
    </section>
    <!-- End blog area -->
@endsection
