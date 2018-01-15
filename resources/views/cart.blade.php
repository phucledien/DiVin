@extends ('layouts.frontend')

@section('content')
<div class="container-fluid">
        <div class="row bg-border-color medium-padding120">
            <div class="container">
                <div class="row">
    
                    <div class="col-lg-12">
    
                        <div class="cart">
    
                            <h1 class="cart-title">In Your Shopping Cart: <span class="c-primary"> {{ Cart::content()->count() }} items</span></h1>
    
                        </div>
    
                        <form action="#" method="post" class="cart-main">
    
                            <table class="shop_table cart">
                                <thead class="cart-product-wrap-title-main">
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
    
                                @foreach (Cart::content() as $product)
                                    <tr class="cart_item">
    
                                        <td class="product-remove">
                                            <a href="{{ route('cart.delete', ['id' => $product->rowId]) }}" class="product-del remove" title="Remove this item">
                                                <i class="seoicon-delete-bold"></i>
                                            </a>
                                        </td>
        
                                        <td class="product-thumbnail">
        
                                            <div class="cart-product__item">
                                                <a href="#">
                                                    <img src="{{ asset($product->model->image) }}" alt="product" width="80px" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                </a>
                                                <div class="cart-product-content">
                                                    <h5 class="cart-product-title">{{ $product->name }}</h5>
                                                </div>
                                            </div>
                                        </td>
        
                                        <td class="product-price">
                                            <h5 class="price amount">${{ $product->price }}</h5>
                                        </td>
        
                                        <td class="product-quantity">
        
                                            <div class="quantity">
                                                <a href="{{ route('cart.decr', ['id' => $product->rowId, 'qty' => $product->qty]) }}" class="quantity-minus">-</a>
                                                    <input title="Qty" class="email input-text qty text" type="text" value="{{ $product->qty }}" readonly>
                                                <a href="{{ route('cart.incr', ['id' => $product->rowId, 'qty' => $product->qty]) }}" class="quantity-plus">+</a>
                                            </div>
        
                                        </td>
        
                                        <td class="product-subtotal">
                                            <h5 class="total amount">${{ $product->total() }}</h5>
                                        </td>
        
                                    </tr>
                                @endforeach
    
                                
    
                                <tr>
                                    <td colspan="5" class="actions">
    
                                        <div class="coupon">
                                            <input name="coupon_code" class="email input-standard-grey" value="" placeholder="Coupon code" type="text">
                                            <div class="btn btn-medium btn--breez btn-hover-shadow">
                                                <span class="text">Apply Coupon</span>
                                                <span class="semicircle--right"></span>
                                            </div>
                                        </div>
    
                                        <div class="btn btn-medium btn--dark btn-hover-shadow">
                                            <span class="text">Apply Coupon</span>
                                            <span class="semicircle"></span>
                                        </div>
    
                                    </td>
                                </tr>
    
                                </tbody>
                            </table>
    
    
                        </form>

                        <div class="col-lg-12">
                        <div class="order">
                            <h2 class="h1 order-title align-center">Your Shipping Details</h2>
                            <form action="{{ route('orders.store') }}" class="order cart-main cart_item total" method="POST" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                            <form action="{{ route('orders.store') }}" method="post" class="cart-main"  >
                               
                                <table class="shop_table cart">
                                    {{ csrf_field() }}
                                    <thead class="cart-product-wrap-title-main">
                                    <tr>
                                        <th ></th>
                                        <th ></th>
                                        <th ></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                         <tr class="cart_item">
                                            <td >
                                                <h5 class="cart-product-title">Họ và tên</h5>
                                            </td>
                                            <td>
                                                <input type="text" class="input-standard-grey input-white" name="name">
                                            </td>
                                        </tr>

                                        <tr class="cart_item">
                                            <td >
                                                <h5 class="cart-product-title">Số điện thoại</h5>
                                            </td>
                                            <td>
                                                <input type="number" class="input-standard-grey input-white" name="number">
                                            </td>
                                        </tr>
                                         <tr class="cart_item">
                                            <td >
                                                <h5 class="cart-product-title">Địa chỉ</h5>
                                            </td>
                                            <td>
                                                <input type="text" class="input-standard-grey input-white" name="address">
                                            </td>
                                        </tr>

                                    <tr class="cart_item total">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            


                        
                        <p name="products" style="display:none">Cart::total()</p>
                        <div class="cart-total">
                            <h3 class="cart-total-title">Cart Totals</h3>
                            <h5 class="cart-total-total">Total: <span class="price">${{ Cart::total() }}</span></h5>
                            <button  class="btn btn-medium btn--light-green btn-hover-shadow">
                                <span class="text">Checkout</span>
                                <span class="semicircle"></span>
                            </button>
                        </div>
                        </form>
                        </form>
                        </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
@endsection