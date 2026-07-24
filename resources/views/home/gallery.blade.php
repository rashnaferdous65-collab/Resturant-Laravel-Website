@php
    $galleryImages = [
        'gallary-1.jpg',
        'gallary-2.jpg',
        'gallary-3.jpg',
        'gallary-4.jpg',
        'gallary-5.jpg',
        'gallary-6.jpg',
        'gallary-7.jpg',
        'gallary-8.jpg',
        'gallary-9.jpg',
        'gallary-10.jpg',
        'gallary-11.jpg',
        'gallary-12.jpg',
    ];
@endphp

<div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
    <h2 class="section-title">OUR MENU</h2>
</div>

<div class="gallary row">
    @foreach($galleryImages as $image)
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="{{ asset('assets/imgs/' . $image) }}"
                 alt="Restaurant Menu Image"
                 class="gallary-img">

            <a href="{{ asset('assets/imgs/' . $image) }}" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
    @endforeach
</div>