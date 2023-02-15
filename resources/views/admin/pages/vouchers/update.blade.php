@extends('admin.elements.master')

@section('title')
Update Voucher | Admin BComputer
@endsection

@section('admin-main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Voucher manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Update Voucher</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="card">
            <!-- Default box -->
            <br>

            <div class="card w-75" style="margin:auto">
                <div class="modal-header bg-info text-white">
                    <div class="phuc-text-ban">&nbsp;Update Voucher</div>
                    <div style="text-align: right">
                        <a class="btn-close btn-lg" href="{{ route('admin/voucher') }}">
                            <i class="fas fa-times fa-lg"></i>
                        </a>
                    </div>
                </div>

                <form action="{{ route('admin/voucher/update', $voucher->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('put') --}}
                    <div class="modal-body d-flex justify-content-between">
                        {{-- // cột bên trai --}}
                        <div style="width: 48%">
                            {{-- // Code --}}
                            <div class="mb-3 form-select" multiple aria-label="description">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control bg-light text-dark" id="code" name="vou_code" placeholder="Code"
                                    value="{{ $voucher->code }}" disabled>
                                @error('vou_code')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- // Discount --}}
                            <div class="mb-3 form-select" multiple aria-label="description">
                                <label for="discount" class="form-label">Discount (%)</label>
                                <input type="number" step="0.1" class="form-control" id="discount" name="vou_discount"
                                    placeholder="Please input the number percent" value="{{$voucher->discount }}">
                                @error('vou_discount')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                            <p class="errorMsg" id="discount"></p>
                            <div class="d-flex justify-content-between">
                                {{-- // Date Start --}}
                                <div class="mb-3 form-select" style="width: 48%" multiple aria-label="description">
                                    <label for="dateStart" class="form-label">Date Start</label>
                                    <input type="date" class="form-control" id="dateStart" name="vou_dateStart"
                                        value="{{ $voucher->dateStart }}">
                                    @error('vou_dateStart')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p class="errorMsg" id="discount"></p>
                                {{-- // Date End --}}
                                <div class="mb-3 form-select" style="width: 48%" multiple aria-label="description">
                                    <label for="endStart" class="form-label">Date End</label>
                                    <input type="date" class="form-control" id="endStart" name="vou_endStart"
                                        value="{{ $voucher->endStart }}">
                                    @error('vou_endStart')
                                        <span class="errorMsg">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- // cột bên phai --}}
                        <div style="width: 48%">
                            {{-- // Quanity --}}
                            <div class="mb-3 form-select" multiple aria-label="description">
                                <label for="quanity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quanity" name="vou_quanity"
                                    placeholder="Please input the number" value="{{ $voucher->quanity }}">
                                @error('vou_quanity')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- // Condition --}}
                            <div class="mb-3 form-select" multiple aria-label="description">
                                <label for="condition" class="form-label">Condition</label>
                                <input type="number" class="form-control" id="condition" name="vou_condition"
                                    placeholder="Please input the number" value="{{ $voucher->condition }}">
                                @error('vou_condition')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- // Content --}}
                            <div class="mb-3 form-select" multiple aria-label="description">
                                <label for="content" class="form-label">Content</label>
                                <textarea type="text" class="form-control bg-light text-dark" style="margin-bottom: 5px" rows="1"
                                    id="content" name="vou_content"> {{ $voucher->content }} </textarea>
                                @error('vou_content')
                                    <span class="errorMsg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <br>
        </div>
    </section>
@endsection

@section('myjs-admin')
    <script></script>
@endsection
