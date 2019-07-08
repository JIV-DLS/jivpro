@if (isset($archive))
	<div class="resent">
                <h3>ARCHIVES</h3>
                <ul class="architecture">
                    @for ($i = 0; $i < count($archive); $i++)
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$archive[$i]['monthYear']}}</a></li>
                    @endfor
                </ul>
    </div>
@endif
					