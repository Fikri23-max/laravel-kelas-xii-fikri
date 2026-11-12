@php
    $avgRating = isset($rating) ? $rating : ($film->kritiks_avg_rating ?? null);
    $avgRating = ($avgRating !== null && is_numeric($avgRating) && (float)$avgRating > 0) ? (float)$avgRating : null;
@endphp
<div class="block-stars">
    @if ($avgRating === null)
        <span class="text-muted" style="font-size: 11px;">Belum ada rating</span>
    @else
        <ul class="w3l-ratings" title="{{ number_format($avgRating, 1) }} / 5">
            @for ($i = 1; $i <= 5; $i++)
                @if ($avgRating >= $i - 0.25)
                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                @elseif ($avgRating >= $i - 0.75)
                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                @else
                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                @endif
            @endfor
        </ul>
    @endif
</div>

