<div class="modal fade" id="add-address" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <label for="" class="fw-bold mb-3" >Full name</label>
                        <input type="text" name="address-fullname-inp" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                      <label for="" class="fw-bold mb-3" >Delivery phone</label>
                      <input type="text" name="address-phone-inp" class="form-control">
                  </div>
              </div>
              <div class="col-md-12">
                <label class="fw-bold mb-3">Address</label>
              </div>
              <div class="col-md-6">
                    <div class="mb-3">
                        <select id="address-city" name="address-city" class="form-select">
                            <option value="" id="" selected>Chọn Tỉnh / Thành Phố</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <select name="address-ward" id="address-ward" class="form-select">
                        <option value="" id="" selected>Chọn Phường / Xã</option>
                      </select>
                    </div>
              </div>
              <div class="col-md-6">
                    <div class="mb-3">
                      <select name="address-district" id="address-district" class="form-select">
                         <option value="" id="" selected>Chọn Quận / Huyện</option>
                      </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="address-phone-inp" class="form-control" placeholder="Enter house number, street name">
                    </div>
              </div>
              <div class="col-md-12 mb-3">
                 <input type="checkbox" name="check-address-default" id="checkaddress">
                 <label for="checkaddress">Set as default address</label>
              </div>
              <div class="col-md-12">
                 <input type="button" class="btn btn-primary" value="Thêm địa chỉ">
              </div>
             </div>
            </form>
        </div>      
      </div>
    </div>
  </div>