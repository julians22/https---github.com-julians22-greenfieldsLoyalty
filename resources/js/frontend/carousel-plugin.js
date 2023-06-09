import Splide from '@splidejs/splide';

document.addEventListener( 'DOMContentLoaded', function() {
    if (document.getElementsByClassName('splide-a').length) {
        var splide = new Splide('.splide-a', {
            pagination: false,
            autoHeight: true,
            classes: {
                // Add classes for arrows.
                arrows: 'splide__arrows dark-green',
            },
        });
        splide.mount();
    }
} );

document.addEventListener( 'DOMContentLoaded', function() {
    if (document.getElementsByClassName('splide-b').length) {
        var splide = new Splide('.splide-b', {
            pagination: false,
            perPage: 3,
            gap: 20,
            padding: 40,
            classes: {
                // Add classes for arrows.
                arrows: 'splide__arrows dark-green',
            },
            breakpoints: {
                768: {
                    perPage: 1
                },
            }
        });
        splide.mount();
    }
} );

// document.addEventListener( 'DOMContentLoaded', function() {
//     if (document.getElementsByClassName('splide-activity').length) {
//         var splide = new Splide('.splide-activity', {
//             pagination: false,
//             type: "loop",
//             speed: 900,
//             trimSpace: false,
//             perPage: 1,
//             focus: "center",
//             drag: false,
//             classes: {
//                 // Add classes for arrows.
//                 // arrows: 'splide__arrows dark-green',
//                 // paginat
//             },
//             arrows: false
//         });
//         splide.mount();

//         var close_button_activity = document.querySelectorAll('.close-activity');

//         close_button_activity.forEach(element => {
//             element.addEventListener('click', function(e) {
//                 e.preventDefault();
//                 $('.activity-popup').removeClass('popup-show')
//             }
//         )});

//         var activity_popup_item = $('[data-toggle="activity-popup"]');
//         activity_popup_item.on('click', function(e) {
//             const target = $(this).data('target');
//             console.log(target);
//             $('.activity-popup').addClass('popup-show')
//             splide.go(target);
//         });
//     }
// } );
