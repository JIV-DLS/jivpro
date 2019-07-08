

<div class="banner-bottom">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle">A propos de nous</h3>
        </div>
        <div class="inner_sec_grids_info_w3ls">
            <div class="col-md-6 banner_bottom_left" >
                <h4>Autorité <span>Martitime Togolaise</span></h4>
                <p>Nous sommes chargé du domaine publique maritime de la batellerie de la délivrance des certificats 
                et brevets au marin de l’immatriculation des navires du bateau et des pirogues.</p>
                <p>Nous gérons aussi les contentieux qui surviennent entre l’armateur et son chargeur, dans le cadre des pollutions sous-marines, de la sécurité maritime et de la protection de l’environnement marin.</p>
                <div  style="max-height: 190px;overflow-y: scroll;scroll-behavior: all;">
                <ul class="some_agile_facts">
                    @foreach ($Categorie as $element)
                        <li><span class="fa {{$element['IconClass']}}" aria-hidden="true"></span>
                            <label>{{$element['Number']}}</label> 
                        {{$element['Lib']}}
                    </li>
                    @endforeach
                </ul>
            </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 banner_bottom_right">
                <div class="agileits_w3layouts_banner_bottom_grid">
                    <img src="{{ asset('site/images/ab.jpg') }}" alt=" " class="img-responsive">
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
