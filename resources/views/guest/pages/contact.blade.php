{{-- /kế thừa gia diện master trong elements --}}
@extends('guest.elements.master')

@section('title')
    Contact | BComputer
@endsection

@section('breadcrumb')
    <a href="#" class="bc-items">Contact</a>
@endsection


@section('user-contents')
    @include('guest.pages.section.sec-thanhdieuhuong')
    <div class="han-contact">
        <div class="row han-contact-frame">
            <div class="col-md-12">
                <p class="contact">Contact with us</p>
                <div class="row">
                    <div class="col-lg-6">
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
                                            width="100%" height="500" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-10 frame-col-review">
                                <div class="write-review">Write a review</div>
                                <form>
                                    <div class="mb-3">
                                        <label for="InputEmail" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputName" class="form-label">Full Name</label>
                                        <input type="password" class="form-control" id="exampleInputName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingTextarea">Comments</label>
                                        <textarea class="form-control-comments" id="floatingTextarea"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
