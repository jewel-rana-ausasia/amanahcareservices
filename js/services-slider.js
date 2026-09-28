/**
 * Homepage services slider (Swiper).
 */
( function () {
	const slider = document.querySelector( '.amanah-services-slider' );

	if ( ! slider || 'undefined' === typeof window.Swiper ) {
		return;
	}

	const section = slider.closest( '.amanah-services' );
	const reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	// eslint-disable-next-line no-new
	new window.Swiper( slider, {
		slidesPerView: 1.12,
		spaceBetween: 16,
		speed: 700,
		grabCursor: true,
		watchSlidesProgress: true,
		loop: true,
		autoplay: reduceMotion ? false : {
			delay: 4500,
			disableOnInteraction: false,
			pauseOnMouseEnter: true,
		},
		keyboard: { enabled: true, onlyInViewport: true },
		a11y: {
			prevSlideMessage: 'Previous service',
			nextSlideMessage: 'Next service',
		},
		navigation: {
			prevEl: section.querySelector( '.amanah-services-prev' ),
			nextEl: section.querySelector( '.amanah-services-next' ),
		},
		pagination: {
			el: section.querySelector( '.amanah-services-pagination' ),
			clickable: true,
		},
		breakpoints: {
			640: { slidesPerView: 2, spaceBetween: 18 },
			1024: { slidesPerView: 3, spaceBetween: 20 },
			1280: { slidesPerView: 4, spaceBetween: 20 },
		},
	} );
}() );
