<section>
    <div class="banner">
        <h1> Vous êtes à la recherche de nouvelles opportunité?</h1>
        <p>Chez insign, vous trouverez le job qui vous convient</p>
    </div>
    @php
    $offres = App\Models\Offre::orderBy('id', 'ASC')->get();
    // $catProd = App\Models\Product::where('category_iid',$category_id)->orderBy('id', 'DESC')->get();
    // $products = App\Models\Product::where('product_status',1)->orderBy('id', 'ASC')->limit(10)->get();
    @endphp
    <div class="section-title style-2 wow animate__animated animate__fadeIn">
        <h3> Les offres </h3>
        <ul class="nav nav-tabs links" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Tout</button>
            </li>
            @foreach ($offres as $item)
                <li class="nav-item" role="presentation">
                    <a  class="nav-link" id="nav-tab-two" data-bs-toggle="tab" href="#category{{ $item->id }}" type="button" role="tab" aria-controls="tab-two" aria-selected="false">{{ $item->titre }}</a >
                </li>
            @endforeach
            
        </ul>
    </div>
</section>