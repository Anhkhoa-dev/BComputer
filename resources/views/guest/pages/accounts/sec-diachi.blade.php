<div class="col-md-12">
    <div class="row">
        <div class="col-3">
            @section('acc-address-active')
                account-sidebar-active
            @endsection
            @include('guest.pages.accounts.sec-slidebar')
        </div>
        <div class="col-md-9" id="khoa-acount-address">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="add-new-address" data-bs-toggle="modal" data-bs-target="#add-address" type="button" ><i class="fa-solid fa-plus"></i> Thêm địa chỉ mới</div>
                    </div>

                    <div class="col-md-12 mb-4">
                        @if ($addressDefault != null)
                            <div class="address-info-01 address-info-first mb-4 ">
                                <div class="user-info">
                                    <div class="info-left">
                                        <div class="name">{{$addressDefault->fullname}}</div>
                                            <div class="using">
                                                <i class="fa-regular fa-circle-check"></i>
                                                <div>Đang sử dụng</div>
                                            </div>                                        
                                    </div>
                                    <div class="info-right">
                                        <div type="button" class="edit-address" data-bs-toggle="modal" data-bs-target="#edit-address">Chỉnh sửa</div>  
                                    </div>
                                </div>
                                <div class="address-info mt-3">
                                    <div class="address"><b>Address:</b> {{$addressDefault->address .',  '. $addressDefault->wards .',  '.$addressDefault->district.',  '. $addressDefault->province}}</div>
                                </div>
                                <div class="phone-info d-flex justify-content-between mt-3">
                                    <div class="phone"><b>Phone:</b> {{$addressDefault->phone}} </div>                                   
                                </div>
                            </div>                               
                        @endif
                        @if($addressAll != null)
                            @foreach ($addressAll as $item)
                                <div class="address-info-01 address-info-second mb-4 ">
                                    <div class="user-info">
                                        <div class="info-left">
                                            <div class="name">{{$item->fullname}}</div>
                                        </div>
                                        <div class="info-right">
                                            <div type="button" class="edit-address" data-bs-toggle="modal" data-bs-target="#edit-address">Chỉnh sửa</div>  
                                                <a href="#" class="delete-address">
                                                    <i class="fa-solid fa-trash"></i> Xóa
                                                </a>                  
                                        </div>
                                    </div>
                                    <div class="address-info mt-3">
                                        <div class="address"><b>Address:</b> {{$item->address .',  '. $item->wards .',  '.$item->district.',  '. $item->province}}</div>
                                    </div>
                                    <div class="phone-info d-flex justify-content-between mt-3">
                                        <div class="phone"><b>Phone:</b> {{$item->phone}} </div>
                                        <a href="{{ route('setDefaultAddress')}}" data-id="{{$item->id}}" class="set-default">Set address default</a>
                                                        
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('guest.pages.modal.add-diachi-modal')
@include('guest.pages.modal.edit-diachi-modal')