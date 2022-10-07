@for ($i = 1; $i <= 5; $i++)
    <button name="rating_number" type="submit" value="{{ $i }}"><i
            class="{{ $ratingnumber >= $i ? 'bi bi-star-fill text-warning' : 'bi bi-star text-warning' }} fs-20 "></i></button>
@endfor
