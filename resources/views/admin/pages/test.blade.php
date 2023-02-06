        <!-- Modal create -->

        <div class="modal fade" id="voucher_create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <div class="phuc-text-ban">&nbsp;Create Voucher</div>
                        <button type="button" class="btn-close btn-lg" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        {{-- action="{{ route('admin/voucher/store') }}" method="POST" enctype="multipart/form-data" --}}
                        {{-- @csrf --}}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="card-body d-flex justify-content-between">
                                {{-- // cột bên trai --}}
                                <div style="width: 48%">
                                    {{-- // Code --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="code" class="form-label">Code</label>
                                        <input type="text" class="form-control" id="code" name="vou_code"
                                            placeholder="Code" value="{{ old('vou_code') }}">
                                        @error('vou_code')
                                            <span class="errorMsg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- // Discount --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="discount" class="form-label">Discount (%)</label>
                                        <input type="number" step="0.1" class="form-control" id="Discount"
                                            name="vou_discount" value="{{ old('vou_discount') }}"
                                            placeholder="Please input the number percent">
                                        @error('vou_discount')
                                            <span class="errorMsg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        {{-- // Date Start --}}
                                        <div class="mb-3 form-select" style="width: 48%" multiple
                                            aria-label="description">
                                            <label for="dateStart" class="form-label">Date Start</label>
                                            <input type="date" class="form-control" id="dateStart"
                                                name="vou_dateStart" value="{{ old('vou_dateStart') }}">
                                            @error('vou_dateStart')
                                                <span class="errorMsg">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- // Date End --}}
                                        <div class="mb-3 form-select" style="width: 48%" multiple
                                            aria-label="description">
                                            <label for="endStart" class="form-label">Date End</label>
                                            <input type="date" class="form-control" id="endStart"
                                                name="vou_endStart" value="{{ old('vou_endStart') }}">
                                            @error('vou_endStart')
                                                <span class="errorMsg">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- // cột bên phai --}}
                                <div style="width: 48%">
                                    {{-- // Condition --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="condition" class="form-label">Condition</label>
                                        <input type="number" class="form-control" id="fullname" name="vou_condition"
                                            placeholder="Please input the number" value="{{ old('vou_condition') }}">
                                        @error('vou_condition')
                                            <span class="errorMsg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- // Content --}}
                                    <div class="mb-3 form-select" multiple aria-label="description">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="5"
                                            id="content" name="vou_content">{{ old('vou_content') }}</textarea>
                                        @error('vou_content')
                                            <span class="errorMsg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary btn-submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            $(document).ready(function() {
                $(".btn-submit").click(function(e){
                    e.preventDefault();

                    var _token = $("input[name='_token']").val();
                    var code = $("input[name='vou_code']").val();
                    var content = $("textarea[name='vou_content']").val();
                    var discount = $("input[name='vou_discount']").val();
                    var condition = $("input[name='vou_condition']").val();
                    var dateStart = $("input[name='vou_dateStart']").val();
                    var endStart = $("input[name='vou_vou_endStart']").val();

                    $.ajax({
                        url: "{{ route('admin/voucher/store') }}",
                        type:'POST',
                        data: {_token:_token, code:vou_code, content:vou_content, discout:vou_discount, condition:vou_condition, dateStart:vou_dateStart, endStart:vou_endStart},
                        success: function(data) {
                            if($.isEmptyObject(data.errors)){
                                $(".error_msg").html('');
                                alert(data.success);
                            }else{
                                let resp = data.errors;
                                for (index in resp) {
                                    $("#" + index).html(resp[index]);
                                }
                            }
                        }
                    });

                });
            });


        </script>
