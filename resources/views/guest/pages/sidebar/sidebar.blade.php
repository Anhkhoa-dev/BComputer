<div class="card_side">
    @if ($fillCatagoryAll != null)
        @foreach ($fillCatagoryAll as $item)
            <a href="{{ route('/products', $item->slug) }}" class="side-box" data-id="{{ $item->slug }}">
                <img src="{{ asset('image/icon/' . $item->imageIcon) }}" width="25" alt="{{ $item->name }}">
                <div>{{ $item->name }}</div>
                @section('product-title')
                    {{ $item->name }}
                @endsection
            </a>
        @endforeach
    @endif


    {{-- <a href="" class="side-box">
        <img src="{{ asset('image/icon/004-computer.png') }}" width="25" alt="">
        <div>PC Intel</div>
    </a>
    <a href="" class="side-box">
        <img src="{{ asset('image/icon/004-computer.png') }}" width="25" alt="">
        <div>PC AMD</div>
    </a>
    <a href="" class="side-box">
        <img src="{{ asset('image/icon/008-graphic-card.png') }}" width="25" alt="">
        <div>Accessories PC</div>
    </a>
    <a href="" class="side-box">
        <img src="{{ asset('image/icon/001-monitor.png') }}" width="25" alt="">
        <div>Monitor</div>
    </a>
    <a href="" class="side-box">
        <img src="{{ asset('image/icon/010-gaming-chair.png') }}" width="25" alt="">
        <div>Table & Chair</div>
    </a>
    <a href="" class="side-box">
        <img src="{{ asset('image/icon/005-keyboard-and-mouse.png') }}" width="25" alt="">
        <div>Mouse & Keyboard</div>
    </a>
    <a href="" class="side-box">
        <img src="{{ asset('image/icon/009-headphones.png') }}" width="25" alt="">
        <div>Headphones, Speakers</div>
    </a>
    <a href="" class="side-box">
        <img src="{{ asset('image/icon/007-hard-disc.png') }}" width="25" alt="">
        <div>Other accessories</div>
    </a> --}}



</div>
