<!-- <ul>
    @foreach ($products as $item)
<li>
            <img src="{{ asset($item->product_thumbnail) }}" style="width: 30px; height: 30px;">
            {{ $item->name_en }}</li>
@endforeach
</ul> -->

<style>
    .card {
        background-color: #0a8cb9;
        padding: 15px;
        border: none;
        z-index: 1;
    }

    .input-box {
        position: relative
    }

    .input-box i {
        position: absolute;
        right: 13px;
        top: 15px;
        color: #ced4da
    }

    .form-control {
        height: 50px;
        background-color: #eeeeee69
    }

    .form-control:focus {
        background-color: #eeeeee69;
        box-shadow: none;
        border-color: #eee
    }

    .list {
        padding-top: 20px;
        padding-bottom: 10px;
        display: flex;
        align-items: center color:#fff;
    }

    .border-bottom {
        border-bottom: 2px solid #eee;
    }

    .list i {
        font-size: 19px;
        color: red
    }

    .list small {
        color: #dedddd
    }

    .price {
        font-size: 18px;
        font-weight: bold;
        color: #fff;
    }

    .old-price {
        font-size: 14px;
        color: #fff;
        margin: 0 0 0 7px;
        text-decoration: line-through;
    }
</style>

<style>
    @media(max-width: 767px) {
        .backgroundbg {
            margin-left: none;
            text-align: center;
        }

        .backgroundbg1 {
            margin-left: none;
            text-align: center;
        }
    }

    @media(min-width: 768px) {
        .backgroundbg {
            margin-left: 110px;
        }

        .backgroundbg1 {
            text-align: center;
        }
    }
</style>

@if ($products->isEmpty())
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6 backgroundbg">
                <div class="card">
                    <h5 class="text-white p-2 backgroundbg1">Product Not Found </h5>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6 backgroundbg">
                <div class="card">
                    @foreach ($products as $product)
                        <a href="{{ route('product.details', $item->slug) }}">
                            @if ($loop->index == count($products) - 1)
                                <div class="list">
                                    <img src="{{ asset($item->product_thumbnail) }}" style="width: 30px; height: 30px;">
                                    <div class="d-flex flex-column ml-3" style="margin-left: 10px;"> <span
                                            style="color: #fff;">{{ $product->name_en }} </span>
                                    </div>
                                </div>
                            @else
                                <div class="list border-bottom">
                                    <img src="{{ asset($product->product_thumbnail) }}"
                                        style="width: 30px; height: 30px;">
                                    <div class="d-flex flex-column ml-3" style="margin-left: 10px;"> <span
                                            style="color: #fff;">{{ $product->name_en }} </span>
                                        <!-- start product discount section -->
                                        @php
                                            if ($product->discount_type == 1) {
                                                $price_after_discount = $product->discount_price;
                                            } elseif ($product->discount_type == 2) {
                                                $discount_amount = ($product->discount_price / 100) * $product->regular_price;
                                                $price_after_discount = $product->regular_price - $discount_amount;
                                            }
                                        @endphp

                                        @if ($product->discount_price > 0)
                                            <div class="product-price">
                                                <span class="price"> ৳{{ $price_after_discount }} </span>
                                                <span class="old-price">৳ {{ $product->regular_price }}</span>
                                            </div>
                                        @else
                                            <div class="product-price">
                                                <span class="price"> ৳{{ $product->regular_price }} </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
