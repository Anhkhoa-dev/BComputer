    <div id="banner" class="owl-carousel owl-theme">
        {{-- Dòng lập banner --}}
        @foreach ($banner as $item)
            <div class="item">
                <div class="row">
                    <div class="col-md-8">
                        <div class="banner-box">
                            <h1 class="banner-title">
                                {{ $item->title }}
                            </h1>
                            <p class="banner-desc">
                                {{ $item->description }}
                            </p>
                            <a href="{{ route('user/products', ['name' => $item->link]) }}" class="btnBox">Visit
                                Collection</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('image/banner/' . $item->image) }}" alt="">
                    </div>
                </div>
            </div>
        @endforeach



        {{-- <div class="item">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner-box">
                        <h1 class="banner-title">
                            50% Off for you firt shopping
                        </h1>
                        <p class="banner-desc mb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis tempore nisi dolores ad
                            sit pariatur sed libero enim iusto quo accusamus magnam itaque non animi, natus debitis
                            assumenda earum officia.
                        </p>
                        <a href="#" class="btnBox mt-3">Visit Collection</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('image/Slide/slide-2.png') }}" alt="">
                </div>
            </div>
        </div>

        <div class="item">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner-box">
                        <h1 class="banner-title">
                            50% Off for you firt shopping
                        </h1>
                        <p class="banner-desc mb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis tempore nisi dolores ad
                            sit pariatur sed libero enim iusto quo accusamus magnam itaque non animi, natus debitis
                            assumenda earum officia.
                        </p>
                        <a href="#" class="btnBox mt-3">Visit Collection</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('image/Slide/slide-3.png') }}" alt="">
                </div>
            </div>
        </div>

        <div class="item">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner-box">
                        <h1 class="banner-title">
                            50% Off for you firt shopping
                        </h1>
                        <p class="banner-desc mb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis tempore nisi dolores ad
                            sit pariatur sed libero enim iusto quo accusamus magnam itaque non animi, natus debitis
                            assumenda earum officia.
                        </p>
                        <a href="#" class="btnBox mt-3">Visit Collection</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('image/Slide/slide-4.png') }}" alt="">
                </div>
            </div>
        </div> --}}
    </div>
