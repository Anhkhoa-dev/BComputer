<div class="col-md-12">
    <div class="row">
        <div class="col-3">
            @section('acc-order-active')
                account-sidebar-active
            @endsection
            @include('guest.pages.accounts.sec-slidebar')
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <table class="account-order-table">
                    <thead style="text-align: center">
                        <tr>
                            <th style="width: 8%;">Id Order</th>
                            <th style="width: 10%;">Date</th>
                            <th style="width: 50%;">Product</th>
                            <th style="width: 20%;">Total</th>
                            <th style="width: 12%;">Order Status</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @if ($orderList!= null)
                        @foreach ($orderList as $item)
                            @php
                                $OrderDetail = $item['OrderDetail'];
                                // echo $OrderDetail
                            @endphp
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->date_order}}</td>
                                <td style="padding-left: 20px">
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <img src="{{ asset('image/product/'.$OrderDetail[0]->image) }}"
                                            alt="" class="img-account-order" width="100">
                                        <div>
                                            <div>{{$OrderDetail[0]->name}}</div>
                                            <div>Quanity: 1 ... and {{count($OrderDetail) - 1}} product orther</div>
                                            <a type="button" class="btn btn-info btn-mg" id="show-chitietdonhang-btn" data-id="{{$item->id}}"
                                                href="{{ route('user/order-detail', ['id'=>$item->id]) }}">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="fa-solid fa-dollar-sign"></i> <span>{{$item->TotalSum}}</span>
                                </td>
                                <td>{{$item->statusOrder}}</td>
                            </tr>
                        @endforeach
                        @else
                            <p>Bạn chưa có đơn hàng nào</p>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- @include('guest.pages.accounts.modal-chitietdonhang') --}}
