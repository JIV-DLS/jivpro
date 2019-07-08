
<?php
    $j = 0;
?>

@if(isset($total))
<div>
    @for($i = 0; $i < $total; $i++)
        <?php
            $j++;
        ?>
        @if($j <= 1)
    <div class="j-row">
        @endif
        <div class="j-column">
            <div class="j-card">
                <img src="{{ asset('storage/'.Session::get('files')[$i]) }}" alt="{{ Session::get('files')[$i] }}" style="width:100%; height: 100px">
                <p></p>
                <div class="j-container">
                    @if($i == 0)
                        <input type="radio" name="choix" value="{{ $i }}" required checked>
                    @else
                        <input type="radio" name="choix" class="choix" id="choix" value="{{ $i }}" required>
                    @endif
                        <span>Image par default</span>
                    <p><button type="button" class="j-button" value="{{ $i }}" onclick="supprimer({{ $i }})">Supprimer</button></p>
                </div>
            </div>
        </div>
        @if($j >= 3)
    </div>
        @endif
            <?php
                if($j >= 3) $j=0;
            ?>
    @endfor
</div>
@endif
