<header class="header" id="site-header">

        <div class="container">
    
            <div class="header-content-wrapper">
    
                <ul class="nav-add">
                    <li class="cart">
    
                        <a href="#" class="js-cart-animate">
                            <i class="seoicon-basket"></i>
                            <span class="cart-count">{{ Cart::content()->count() }}</span>
                        </a>
                        
                        @if (Cart::content()->count() == 0)
                            <div class="cart-popup-wrap">
                                <div class="popup-cart">
                                    <h4 class="title-cart">No products in the cart!</h4>
                                    <p class="subtitle">Please make your choice.</p>
                                    <a href="{{ route('index') }}">
                                        <div class="btn btn-small btn--dark">
                                            <span class="text">View all products</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="cart-popup-wrap">
                                <div class="popup-cart">
                                    <h4 class="title-cart align-center">$ {{ Cart::total() }}</h4>
                                    <br>
                                    <a href="{{ route('cart') }}">
                                        <div class="btn btn-small btn--dark">
                                            <span class="text">View cart</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
    
                    </li>
                </ul>
            </div>
    
        </div>
    
    </header>