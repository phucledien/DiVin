@extends ('layouts.frontend')

@section('content')

<div class="pt100 align-center">
    <h2>Search results: {{ $query }}</h2>
</div>

<div class="container">
        <div class="row pt100">
            
            @if ($products->count() == 0)
                <h3 class="align-center">Sorry! No product found.</h3>
            @endif
            <div class="books-grid">

            <div class="row mb30">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="books-item">
                            <div class="books-item-thumb">
                                <img src="{{ asset($product->image) }}" alt="book">
                                <div class="new">New</div>
                                <div class="sale">Sale</div>
                                <div class="overlay overlay-books"></div>
                            </div>
    
                            <div class="books-item-info">
                                <a href="{{ route('product.single', ['id' => $product->id]) }}">
                                    <h5 class="books-title">{{ $product->name }}</h5>
                                </a>
    
                                <div class="books-price">${{ $product->price }}</div>
                            </div>
    
                            <a href="{{ route('cart.rapid.add', ['id' => $product->id]) }}" class="btn btn-small btn--dark add">
                                <span class="text">Add to Cart</span>
                                <i class="seoicon-commerce"></i>
                            </a>
    
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row pb120">
                
                <div class="col-lg-12">{{ $products->links() }}</div>

            </div>
        </div>
        </div>
    </div>
@endsection