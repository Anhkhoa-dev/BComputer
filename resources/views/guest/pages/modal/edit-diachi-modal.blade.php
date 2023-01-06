<div class="modal fade" id="edit-address" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit address</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" class="khoa-add-address">
             {{-- <input type="text" name="address-user-id" value="{{$addressDefault->id_tk}}"> --}}
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
                <h5>Address</h5>
              </div>
              
              <div class="col-md-6">
                    <div class="mb-3">
                        <select id="address-city" class="form-select">
                            <option value="" selected>Chọn Tỉnh / Thành Phố</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <select name="" id="address-ward" class="form-select">
                        <option value="" selected>Chọn Phường / Xã</option>
                      </select>
                    </div>
              </div>
              <div class="col-md-6">
                    <div class="mb-3">
                      <select name="" id="address-district" class="form-select">
                         <option value="" selected>Chọn Quận / Huyện</option>
                      </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="address-phone-inp" class="form-control" placeholder="Enter house number, street name">
                    </div>
              </div>
              <div class="col-md-12">
                 <input type="checkbox" name="check-address-default" id="checkaddress">
                 <label for="checkaddress">Set as default address</label>
              </div>
             </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>