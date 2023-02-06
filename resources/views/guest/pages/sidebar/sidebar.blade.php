<div class="card_side">
    @if ($list_Catagory != null)
        @foreach ($list_Catagory as $item)
            <a href="{{ route('user/products', ['name' => $item['slug']]) }}" class="side-box"
                data-id="{{ $item->slug }}">
                <img src="{{ asset('image/icon/' . $item->imageIcon) }}" width="25" alt="{{ $item->name }}">
                <div>{{ $item->name }}</div>
                @section('product-title')
                    {{ $item->name }}
                @endsection
            </a>
        @endforeach
    @endif
</div>
