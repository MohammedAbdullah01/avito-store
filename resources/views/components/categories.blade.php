@forelse ($categories as $categorie)
    <li><a href="{{ route('show.products.in.category', $categorie->slug) }}">{{ $categorie->name }}</a></li>



@empty
@endforelse
