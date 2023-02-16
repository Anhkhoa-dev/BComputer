<div style="width: 600px; text-align: center; margin: 0 auto;">
    <h3 style="font-weight: 600; text-align: left;">Hi! {{ $user->fullname }} </h3>
    <p style="text-align: left; text-align: justify;">BComputer has received your order and is processing it. You will
        receive a follow-up notification when your order is ready to be shipped.</p>
    <a href="{{ route('user/order') }}"
        style="padding: 10px 30px; text-align: center; background: #E94560; color: #fff; text-decoration: none; margin: 70px 0;">Order
        status</a>
    <div style="text-align-last: left; font-weight: 600; margin-top: 30px;">
        Orders are delivered to:
    </div>
    <div
        style="width: 100%;  display: flex; justify-content: space-between; align-items: center; margin-top: 20px; border: 1px solid #111; padding: 20px;">
        <div style="width: 120px; text-align: left;">
            <div style="font-weight: 600;">Fullname:</div>
            <div style="font-weight: 600;">Address:</div>
            <div style="font-weight: 600;">Phone:</div>
            <div style="font-weight: 600;">Email:</div>
        </div>
        <div style="text-align: left; width: 95%">
            <div>{{ $user->fullname }}</div>
            <div>{{ $Orderlist->address }}</div>
            <div>{{ $userAdd->phone }}</div>
            <div>{{ $user->email }}</div>
        </div>
    </div>
    <div style="text-align: left; font-weight: 800; margin: 10px 20px;">
        Package information:
    </div>
    <table style="width: 640px; border: 1px solid #111; text-align: left; padding: 20px;">
        <thead style="width: 100%; text-align: center;">
            <th style="width: 10%; border: 1px solid #111;">ID</th>
            <th style="width: 50%; border: 1px solid #111;">Product name</th>
            <th style="width: 15%; border: 1px solid #111;">Price ($)</th>
            <th style="width: 10%; border: 1px solid #111;">Quanity</th>
            <th style="width: 15%; border: 1px solid #111;">Total ($)</th>
        </thead>
        <tbody>
            @foreach ($OrderProductList as $prod)
                <tr>
                    <td style="text-align: center; border: 1px solid #111;">{{ $prod->id_pro }}</td>
                    <td style="text-align: left; border: 1px solid #111; padding-left: 5px;">{{ $prod->name }}</td>
                    <td style="text-align: right; border: 1px solid #111; padding-right: 5px;">
                        {{ number_format($prod->price * ((100 - $prod->discount) / 100), 2) }}</td>
                    <td style="text-align: center; border: 1px solid #111;">{{ $prod->qty }}</td>
                    <td style="text-align: right; border: 1px solid #111; padding-right: 5px;">
                        {{ number_format($prod->qty * $prod->price * ((100 - $prod->discount) / 100), 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align: right;">Total:</td>
                <td colspan="2" style="text-align: right">{{ $OrderProductList->sum('totalItem') }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">Ship fee:</td>
                <td colspan="2" style="text-align: right">0</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">Discount:</td>
                <td colspan="2" style="text-align: right">
                    - {{ ($discount / 100) * $OrderProductList->sum('totalItem') }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">Total amount:</td>
                <td colspan="2" style="text-align: right">
                    {{ $OrderProductList->sum('totalItem') - ($discount / 100) * $OrderProductList->sum('totalItem') }}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;">Payments order</td>
                <td colspan="3" style="text-align: right">
                    {{ $Orderlist['payment'] == 1 ? 'Payment by bank transfer' : 'Payment on delivery' }}
                </td>
            </tr>
        </tbody>
    </table>
    <p style="font-size: 20px; text-align: left; margin-top: 20px">Thank you for ordering at BCompter</p>
</div>
