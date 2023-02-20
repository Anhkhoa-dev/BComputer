@if (count($data) > 0)
    <div class="products">
        @foreach ($data as $item)
            <div class="card-product">
                <div class="card-body">
                    <div class="card-image">
                        <img src="{{ asset('image/product/' . $item->image) }}" alt="{{ $item->name }}"
                            class="img-fluid">
                        <div class="hover-icons">
                            <a href="#" class="text-decoration-none text-dark">
                                <div class="hover-sosanh" title="Product comparison"><i class="fa-solid fa-plus"></i>
                                </div>
                            </a>
                            <a href="#" class="text-decoration-none text-dark">
                                <div class="hover-xemnhanh" title="Quick view"><i class="fa-brands fa-searchengin"></i>
                                </div>
                            </a>
                            <a href="{{ route('user/detail', ['name' => $item['slug']]) }}"
                                class="text-decoration-none text-dark">
                                <div class="hover-viewdetail" title="Product detail"><i class="fa-solid fa-eye"></i>
                                </div>
                            </a>
                            <form>
                                @csrf
                                <input type="hidden" value="{{ $item->id }}"
                                    class="card_product_id_{{ $item->id }}">
                                <input type="hidden" value="1" class="card_product_qty_{{ $item->id }}">

                                <button type="button" class="add-cart btn-add-cart" data-id="{{ $item->id }}">
                                    <div class="hover-addtocart" title="Add to cart">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                    </div>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <div class="card-title">
                        <a href="{{ route('user/detail', ['name' => $item['slug']]) }}"
                            title="{{ $item->name }}">{{ $item->name }}</a>
                    </div>
                    <div class="card-price">
                        <div class="old-price">$ {{ $item->price }}</div>
                        <div class="new-price">$
                            {{ number_format($item->price * ((100 - $item->discount) / 100), 2) }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Không tìm tấy kết quả phù hợp. Vui lòng tìm kiếm với từ khóa khác.</p>
@endif
