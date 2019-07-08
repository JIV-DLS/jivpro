    <!-- Building Construction Area -->
    <section class="building_construction_area">
        <div class="container">
            <div class="row building_construction_row">
                <div class="col-sm-8 constructing_laft">
                    <h2>Constructing</h2>
                    <img src="{{asset('storage/images/construction.jpg')}}" alt="">
                    <a href="#">Building Construction</a>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                    <div class="col-md-6 ipsum">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo-do consequat.</p>
                        <ul class="excavator">
                            <li><i class="fa fa-chevron-circle-right"></i>Hydraulic Excavator</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Piling Equipment</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Port Machinery</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Concrete Pump</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Excavators &amp; more</li>
                        </ul>
                    </div>
                    <div class="col-md-6 ipsum_img"><img src="images/construction-2.jpg" alt=""></div>
                    <div class="col-md-12 p0">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>
                <div class="col-sm-4 constructing_right">
                    <h2>Quick Links</h2>
                    <ul class="painting">
                        @if(isset($all_service))
                            @foreach ($all_service as $element)
                            <li><a href="#"><i class="fa {{$element['fa']}}" aria-hidden="true"></i>{{--upperCase('.'$element->lib)--}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="contact_us">
                        <h4>Contact Us</h4>
                        <a href="#" class="contac_namber">+88 0168 3661882</a>
                        <a href="#" class="contac_namber">+88 0181 2013370</a>
                        <p>Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. If you use this site regularly and would like to help keep</p>
                        <a href="#" class="button_all">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Building Construction Area -->