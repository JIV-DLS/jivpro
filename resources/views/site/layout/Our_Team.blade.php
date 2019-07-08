@if (isset($employee))
<!-- Our Team Area -->
    <section class="our_team_area" id="notreEquipe">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Our Team</h2>
                <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
            </div>
            <div class="row team_row">
                @for ($i = 0;$i < count($employee); $i++)
                <div class="col-md-3 col-sm-6 wow fadeInUp">
                   <div class="team_membar">
                        <img src="images/team/tm-1.jpg" alt="">
                        <div class="team_content">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="#" class="name">{{$employee[$i]['name']}}</a>
                            <h6>{{$employee[$i]['title']}}</h6>
                        </div>
                   </div>
                </div>
                @endfor

            </div>
        </div>
    </section>
    <!-- End Our Team Area -->
    @endif