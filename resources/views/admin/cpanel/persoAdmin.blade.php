@extends('.admin/layout/cpanel/content')

@section('page')
    <div class="container-fluid">
        <div class="row ajtadd ">
            <div class="col-lg-8 ">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">administrateur</h6>
                    </div>
                    <div class="card-body py-3">
                        <div>
                            <div class="j-profile-img-box">
                                <img class="img-profile rounded-circle j-img-par" id="j-profile-img" @if(Session::get('user')->avatar) src="{{ asset('storage/'.Session::get('user')->avatar) }}" @else src="{{ asset('admin/img/user.png') }}"  @endif >
                                <img class="img-profile rounded-circle j-img-par" id="j-img-loading" src="{{ asset('admin/img/preloader.gif') }}" >
                                <p id="j-log"></p>
                                @if($errors->has('file'))
                                    <p class="j-txt-error"> {{ $errors->first('file') }} </p>
                                @endif
                                <form class="user" id="form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                   <input type="file" class="form-control form-control-user j-file-input" id="j-file-input-ajax" name="file">
                                   <!-- <input type="file" class="form-control form-control-user " id="j-file-input-ajax-txt" name="files[]" multiple accept=".png,.jpg"> -->
                                </form>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src=" {{ asset('script/upload.js') }}"></script>
@endsection
