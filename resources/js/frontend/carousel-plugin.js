import Splide from '@splidejs/splide';

document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide('.splide-a', {
        pagination: false
    });
    splide.mount();
} );

document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide('.splide-b', {
        pagination: false,
        perPage: 3,
        gap: 20,
        padding: 40
    });
    splide.mount();
} );
