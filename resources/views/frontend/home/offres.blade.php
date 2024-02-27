<section class="mt-3">
    <div class="les-offres">
        @php
        $offres = App\Models\Offre::orderBy('id', 'ASC')->get();
        // $catProd = App\Models\Product::where('category_iid',$category_id)->orderBy('id', 'DESC')->get();
        // $products = App\Models\Product::where('product_status',1)->orderBy('id', 'ASC')->limit(10)->get();
        @endphp
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> Nos offres <span class="badge text-primary text-xs">{{ count($offres) }}</span> </h3>
            @foreach ($offres as $item)
                <div class="une-offre my-2">
                    <span>{{ $item->titre }}</span>
                    <a class="btn btn-primary" href="{{ route('candidature.create', $item->id)}}">Candidater</a>
                </div>
            @endforeach
        </div>
    </div>
</section>