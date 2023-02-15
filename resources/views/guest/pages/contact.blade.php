{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')

{{-- Hiển thị tile tabweb --}}
{{-- @section('title')
    {{ $title->name }} | BComputer
@endsection --}}


@section('user-contents')
    {{-- @section('breadcrumb')
    <a href="#" class="bc-items">Category</a>
    <div class="bc-divider"><i class="fas fa-chevron-right"></i></div>
    <a href="#" class="bc-items active">{{ $title }}</a>
@endsection --}}
    @include('guest.pages.section.sec-thanhdieuhuong')
    <div class="han-contact">
        <div class="row han-contact-frame">
            <div class="col-md-12">
                <p class="contact">Contact with us</p>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <p class="address-company"> 590 cach mang thang tam, district 1</p>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.324072089453!2d106.66402411465285!3d10.78647246195806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ecb37e59e33%3A0xfe7c4d9f94f9e079!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCA3MDAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1675694703706!5m2!1svi!2s"
                                    width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="write-review">Write a review</div>
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Full Name</label>
                                    <input type="password" class="form-control" id="exampleInputName">
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Comments</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                        <div class="col-md-5 write-review">
                            BComputer
                            <div class="address-bcomputer">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 590 cach mang thang tam, district
                                    1
                                </p>
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 590 cach mang thang tam, district
                                    1
                                </p>
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 590 cach mang thang tam,
                                    district 1
                                </p>
                                <p> <i class="fa fa-phone" aria-hidden="true"></i> 0865 677 010 <i class="fa fa-phone"
                                        aria-hidden="true"></i> 190018009</p>
                            </div>
                            <div class="col-md-12 icon-social">
                                <i class="fa-brands fa-3x fa-facebook" aria-hidden="true"></i>
                                <i class="fa-brands fa-3x fa-youtube" aria-hidden="true"></i>
                                <i class="fa-brands fa-3x fa-instagram" aria-hidden="true"></i>
                                <i class="fa-brands fa-3x fa-twitter" aria-hidden="true"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
