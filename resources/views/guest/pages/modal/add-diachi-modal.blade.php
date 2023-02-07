<div class="modal fade" id="add-address" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user/add-address') }}" method="POST" class="khoa-add-address">
                    {{-- <input type="text" name="address-user-id" value=""> --}}
                    @csrf
                    {{-- @method('put') --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="fw-bold mb-3">Full name</label>
                                <input type="text" name="address_fullname_inp" class="form-control"
                                    value="{{ old('address_fullname_inp') }}">
                                @error('address_fullname_inp')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="fw-bold mb-3">Delivery phone</label>
                                <input type="text" name="address_phone_inp" class="form-control"
                                    value="{{ old('address_phone_inp') }}" />
                                @error('address_phone_inp')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="fw-bold mb-3">Address</label>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <select id="address-city" name="address_city" class="form-select">
                                    <option value="" id="" selected>Select Province / City</option>
                                </select>
                                @error('address_city')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select name="address_ward" id="address-ward" class="form-select">
                                    <option value="" id="" selected>Select Ward / Commune</option>
                                </select>
                                @error('address_ward')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <select name="address_district" id="address-district" class="form-select">
                                    <option value="" id="" selected>Select District</option>
                                </select>
                                @error('address_district')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="address_number_inp" class="form-control"
                                    placeholder="Enter house number, street name">
                                @error('address_number_inp')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="checkbox" name="check_address_default" id="checkaddress">
                            <label for="checkaddress">Set as default address</label>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Add address">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
