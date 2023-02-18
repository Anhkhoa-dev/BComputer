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
              <div class="container">
                <div class="row">
                  <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center" style="padding: 10px 50px; background: #eee">
                        <div>Chi tiết đơn hàng: # <span id="order_id">{{$orderList->id}}</span></div>
                        <div class="btn btn-success">{{$orderList->statusOrder}}</div>
                    </div>
                  </div>
                  <div class="col-12 mb-3 d-flex justify-content-end align-items-center">
                    <div>Date Order: <span class="date-order"></span></div>
                  </div>
                  <div class="col-12 mb-3 d-flex justify-content-center align-items-center">
                    <a href="#" class="btn btn-danger">Cancel Order</a>
                  </div>
                  <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                              <div class="col-12 mb-1">
                                <b style="font-size: 20px">Địa chỉ người nhận</b>
                              </div>
                              <div class="col-12" style="padding: 20px 30px;">
                                <div>Name: <span id="name">Nguyễn Anh Khoa</span></div>
                                <div>Address: <span id="address">Hẻm 64, đường 79, Tân quy, Quận 7. Tp.HCM</span></div>
                                <div>Phone: <span id="phone">0865677010</span></div>
                              </div>
                            </div>
                        
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                              <div class="col-12 mb-1">
                                <b style="font-size: 20px">Phương thức thanh toán</b>
                              </div>
                              <div class="col-12" style="padding: 20px 30px;">
                                <div class="payment">{{$orderList->payment == 1 ? 'Thanh toán chuyển khoản': 'Thanh toán tiền mặt'}}</div>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <table>
                      <thead>
                        <tr style="text-align: center">
                            <th style="width: 50%;">Product</th>
                            <th style="width: 15%;">Price ($)</th>
                            <th style="width: 15%;">Quanity</th>
                            <th style="width: 12%;">Discount (%)</th>
                            <th style="width: 8%; text-align: center">Total</th> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orderList->Detail as $item)
                          <tr>
                            <td class="py-3">
                              <div class="d-flex justify-content-start align-items-center gap-2">
                                  <img src="{{ asset('image/product/'.$item->image) }}" alt="" width="40">
                                  <div>{{$item->namePro}}</div>
                              </div>
                            </td>
                            <td style="text-align: right">{{number_format($item->price*((100-$item->discount)/100), 2)}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->discount}}</td>
                            <td style="text-align: right">{{number_format($item->qty*$item->price*((100-$item->discount)/100),2)}}</td>
                          </tr>
                        @endforeach
                        
                        
                        <tr>
                          <td colspan="5">Tạm tính: $<span id="subtotal">2000.00</span></td>
                        </tr>
                        <tr>
                          <td colspan="5">Giảm giá: -$<span id="discount">300</span></td>
                        </tr>
                        <tr>
                          <td colspan="5">Tổng tiền: $<span id="Total">1700.00</span></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
               </div>
              </div>
            </div>
        </div>
    </div>
</div>