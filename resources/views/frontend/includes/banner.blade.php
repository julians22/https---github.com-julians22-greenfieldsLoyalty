<section class="banner-container">
    <div id="image-carousel" class="splide splide-a" aria-label="Banner Images">
        <div class="splide__track">
              <ul class="splide__list">
                @foreach ($banners as $banner)
                    <li class="splide__slide">
                        <img src="{{ asset($banner->image['desktopBanner']) }}" alt="" class="w-100 d-none d-md-block banner-image">
                        <img src="{{ asset($banner->image['mobileBanner']) }}" alt="" class="w-100 d-block d-md-none banner-image">
                    </li>
                @endforeach
              </ul>
        </div>
    </div>

    <img src="{{ asset('img/decorations/half_round.png') }}" alt="" class="banner-shape">
</section>
