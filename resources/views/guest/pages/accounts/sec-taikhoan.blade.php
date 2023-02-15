<div class="col-md-12">
    <div class="row">
        <div class="col-3">
            @section('acc-info-active')
                account-sidebar-active
            @endsection
            @include('guest.pages.accounts.sec-slidebar')
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="row">
                    <div class="account-box mx-5">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="col-12 align-items-center">
                                    <div class="tk-image">
                                        <img src="{{ asset('image/user/' . $user->image) }}" alt="{{ $user->fullname }}"
                                            width="200" class="image-img">
                                        <div class="image-hover">
                                            <input type="file" class="input-change" id="change-avt-inp"
                                                name="change-avt-inp" data-modal='avt' accept="image/*">
                                            <div class="change-image" id="btn-change-avt">Change image</div>
                                        </div>
                                    </div>
                                    <div class="tk-information">
                                        <div class="dropdown">
                                            <a href="#" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                {{ $user->fullname }}
                                                <i class="fa-solid fa-user-pen"></i>
                                            </a>
                                            <div class="dropdown-menu border-0 mt-2">
                                                <div class="d-inline ">
                                                    <input type="text" class="change-name" name="tk-user"
                                                        placeholder="Enter your full name"
                                                        data-id="{{ $user->id }}" />
                                                    <div class="btn-change" id="btn-tk-name-update">Update</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="shipment-details">
                                    <h5>Thông tin giao hàng</h5>
                                    <div class="box-address">
                                        @if ($addressDefault == null)
                                            <p class="title">You don't have a shipping address yet? <a href="#"
                                                    class="add">Add address</a></p>
                                        @else
                                            <div class="address-info-active">
                                                <div class="user-info">
                                                    <div class="info-left">
                                                        <div class="name">{{ $addressDefault->fullname }}</div>
                                                        <div class="using">
                                                            <i class="fa-regular fa-circle-check"></i>
                                                            <div>Đang sử dụng</div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="edit-address" data-bs-toggle="modal" data-bs-target="#edit-address" data-id="{{$addressDefault->id}}">Chỉnh sửa</div> --}}
                                                </div>
                                                <div class="address-info mt-2">
                                                    <div class="address"><b>Address:</b> {{ $addressDefault->address }},
                                                        {{ $addressDefault->wards }}, {{ $addressDefault->district }},
                                                        {{ $addressDefault->province }}</div>
                                                </div>
                                                <div class="phone-info mt-2">
                                                    <div class="phone"><b>Phone:</b> {{ $addressDefault->phone }}</div>
                                                </div>
                                            </div>
                                        @endif



                                    </div>
                                    <div class="change-password">
                                        <i class="fa-solid fa-key"></i>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#change-pass">Thay đổi
                                            password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @include('guest.pages.modal.diachi-modal') --}}

{{-- modal thay đổi password --}}

<div class="modal fade" id="change-pass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content px-4 py-3">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Change password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password old</label>
                        <input type="password" class="form-control" name="pass_old" id="exampleFormControlInput1"
                            placeholder="Enter password old">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password new</label>
                        <input type="password" class="form-control" name="pass_new" id="exampleFormControlInput1"
                            placeholder="Password form 6-16 character">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="cpass_new" id="exampleFormControlInput1"
                            placeholder="Enter password confirm new">
                    </div>
                    <div>
                        <button class="btn btn-primary form-control">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
