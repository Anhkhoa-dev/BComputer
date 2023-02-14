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
                            <th style="width: 5%;">Code Order</th>
                            <th style="width: 10%;">Date</th>
                            <th style="width: 10%;">Product</th>
                            <th style="width: 10%;">Total</th>
                            <th style="width: 10%;">Order Status</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        <tr>
                            <td>1</td>
                            <td>15-02-2023</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="{{ asset('image/product/Asus_VivoBook_14_M413IA_EK481T_01.PNG') }}"
                                        alt="" class="img-account-order" width="100">
                                    <div>
                                        <div>Product name</div>
                                        <div>Quanity: 1 ... and 3 product orther</div>
                                        <a href="#">Xem chi tiết</a>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <i class="fa-solid fa-dollar-sign"></i> <span>50000</span>
                            </td>
                            <td>Đã tiếp nhận</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
