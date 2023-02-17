<link rel="stylesheet" href="{{ asset('sass/guest/guest.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="han-error-page">
    <div class="col-md-12">
        <div class="row col-image-error">
            <div class="col-sm-6" style="text-align: end"><img class="error-img"
                    src="{{ asset('image/banner/errorpage.png') }}" alt="">
            </div>
            <div class="col-sm-4 error-info">
                <p class="">We are looked everywhere for this page.</p>
                <p>Are you sure the website URL is correct?</p>
                <p>Get in touch the site owner</p><br>
                <a href="{{ route('user/index') }}" class="button-error">
                    <p class="goback">Go Back</p>
                </a>
            </div>
        </div>
    </div>
    <img class="error-img1" src="{{ asset('image/banner/errorpage1.png') }}" alt="">
</div>
