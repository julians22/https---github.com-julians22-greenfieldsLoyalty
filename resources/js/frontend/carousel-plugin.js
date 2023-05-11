import Splide from '@splidejs/splide';

document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide('.splide-a', {
        pagination: false
    });
    splide.mount();
} );
