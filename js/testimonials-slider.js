/**
 * Client testimonials slider (Swiper, fade).
 */
( function () {
	const slider = document.querySelector( '.amanah-testimonials-slider.swiper' );

	if ( ! slider || 'undefined' === typeof window.Swiper ) {
		return;
	}

	const section = slider.closest( '.amanah-testimonials' );
	const reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
	const counter = section.querySelector( '.amanah-testimonials-current' );
	const progress = section.querySelector( '.amanah-testimonials-progress > span' );
	let meta = [];

	try {
		meta = JSON.parse( slider.dataset.testimonials || '[]' );
	} catch ( e ) {
		meta = [];
	}

	const pad = ( number ) => String( number ).padStart( 2, '0' );

	// eslint-disable-next-line no-new
	new window.Swiper( slider, {
		effect: 'fade',
		fadeEffect: { crossFade: true },
		speed: reduceMotion ? 0 : 700,
		autoHeight: true,
		loop: true,
		grabCursor: true,
		autoplay: reduceMotion ? false : {
			delay: 7000,
			disableOnInteraction: false,
			pauseOnMouseEnter: true,
		},
		keyboard: { enabled: true, onlyInViewport: true },
		a11y: {
			prevSlideMessage: 'Previous testimonial',
			nextSlideMessage: 'Next testimonial',
		},
		navigation: {
			prevEl: Array.from( section.querySelectorAll( '.amanah-testimonials-prev' ) ),
			nextEl: Array.from( section.querySelectorAll( '.amanah-testimonials-next' ) ),
		},
		pagination: {
			el: section.querySelector( '.amanah-testimonials-pagination' ),
			clickable: true,
			bulletClass: 'amanah-testimonials-bullet',
			bulletActiveClass: 'is-active',
			renderBullet( index, className ) {
				const item = meta[ index ] || { initial: String( index + 1 ), name: '' };
				const label = 'Show testimonial ' + ( index + 1 ) + ( item.name ? ' from ' + item.name : '' );
				const wrap = document.createElement( 'span' );

				wrap.textContent = item.initial;

				return '<button type="button" class="' + className + '" aria-label="' + label.replace( /"/g, '&quot;' ) + '">' + wrap.innerHTML + '</button>';
			},
		},
		on: {
			slideChange( swiper ) {
				if ( counter ) {
					counter.textContent = pad( swiper.realIndex + 1 );
				}
			},
			autoplayTimeLeft( swiper, time, ratio ) {
				if ( progress ) {
					progress.style.transform = 'scaleX(' + ( 1 - ratio ) + ')';
				}
			},
		},
	} );
}() );
