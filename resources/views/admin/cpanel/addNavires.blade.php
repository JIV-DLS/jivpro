@extends('.admin/layout/cpanel/content')

@section('page')
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Nouveau navire</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                               
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <form method="post" id="acount-infor" action="#" class="acount-infor" novalidate="novalidate">
                                                            @csrf
                                                            <div class="devit-card-custom">
                                                                <div class="form-group">
                                                                    <input value="{{ old('code') }}" required="" type="text" class="form-control" id="inCodNav" name="code" placeholder="Code du navire">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input value="{{ old('lib') }}" id="inLibNav" required="" type="text" class="form-control" name="lib" placeholder="Libellé">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input value="{{ old('ct') }}" id="inCtNav" required="" name="ct" type="number" class="form-control" placeholder="Contenance Totale">
                                                                </div>
                                                                <a onclick="
//alert($('#inCtNav').paren('form').tagName());
if($('#inCodNav').val()!=''&&$('#inLibNav').val()!=''&&$('#inCtNav').val()!='')
{
     $('#modNavAdd').css('display','inline-block');
    $('#modNavTxt').text('Veuillez cliquer sur >Ajouter< pour ajouter définitivement ce navire ou sur >Annuler< pour annuler l\'ajout.');
    $('#exampleModalLabel').text(
'navire '+$('#inCodNav').val()
    );

}else 
    {
            $('#exampleModalLabel').text('Informations manquantes');
            $('#modNavAdd').css('display','none');
            $('#modNavTxt').text('Desolé Veuillez renseigner tous les champs!');
    }
                                                                " href="" data-toggle="modal" data-target="#add_nav" class="btn btn-primary waves-effect waves-light">Ajouter navire</a>
                                                               
                                                                <input id="navFormAdd" type="submit" style="display: none;" name="ajouter">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- Logout Modal-->
  <div class="modal fade" id="add_nav" tabhome="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Valider l'ajout</h5>
          <button class="close" id="closeNavModal" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="modNavTxt"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button onclick="$('#navFormAdd').click();" id="modNavAdd" class="btn btn-primary waves-effect waves-light" href="#">Ajouter</button>
        </div>
      </div>
    </div>
  </div>
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
  {{--  <a href="#" style="display: none;" id="successD" class="btn btn-primary waves-effect waves-light" 
                                                                onclick=" 
                                                                $('#alertSuccess').css('display','none');
$('#alertSuccess').css('display','inline-block');
                                                                "> ___</a>
  <div class="alert alert-success alert-success-style1" id="alertSuccess" style="display:none;">
                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                        <span class="icon-sc-cl" aria-hidden="true">×</span>
                                    </button>
                                <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                <p><strong>Success!</strong> Indicates a successful action.</p>
                            </div> --}}
@endsection
@section('script')
@endsection 
