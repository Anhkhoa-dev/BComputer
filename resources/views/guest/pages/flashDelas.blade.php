<div id="flash-delas" class="owl-carousel owl-theme">
    @foreach ($bigDiscount as $item)
        <div class="item">
            <div class="home-card">
                <div class="card_image">
                    <a href="{{ route('user/detail', ['name' => $item['slug']]) }}">
                        <img src="{{ asset('image/product/' . $item->image[0]->image) }}" class="img-fluid"
                            alt="{{ $item->name }}">
                    </a>
                    <div class="sale_off">
                        <p>{{ $item->discount }}% Off</p>
                    </div>
                    <div class="p_like">
                        <a href="#" class="p_like_sosanh" title="product comparison">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                        {{-- <a href="#" class="p_like_heart">
                            <i class="fa-regular fa-heart"></i>
                        </a> --}}
                    </div>
                </div>
                <div class="card_info">
                    <a href="{{ route('user/detail', ['name' => $item['slug']]) }}" class="product_name"
                        title="{{ $item->name }}">{{ $item->name }}</a>
                    <div class="card_info-price-rate">
                        <div class="product_rate">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <div class="product_price">
                            <div class="price-old">
                                $ {{ $item->price }}
                            </div>
                            <div class="price-discount">
                                $ {{ number_format($item->price * ((100 - $item->discount) / 100), 2) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Kết thúc vòng lập  --}}
</div>
