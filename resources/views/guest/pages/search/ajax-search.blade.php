@if (count($data) >= 1 )
    @foreach ($data as $item)
    <div class="search-item">
        <img src="{{ asset('image/product/'.$item->image) }}" alt="" width="30" >
        <div class="search-info-group">
            <a href="{{ route('user/detail', ['name'=>$item->slug]) }}" class="search-name">{{$item->name}}</a>
            <div class="search-price">
                <div class="price">
                    <i class="fa-solid fa-dollar-sign"></i> {{$item->price*((100-$item->discount)/100)}}
                </div>
                <div class="quanity">Qty: <span>{{ $item->status == 1 ? ($item->quantity > 0 ? $item->quantity : "Out of stock") : "Out of business"}}</span></div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div style="text-align: center; padding: 30px 10px;">No matching results were found</div>
@endif