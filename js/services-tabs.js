/**
 * Services page tabs.
 *
 * Each tab links to its panel's anchor (/services/#slug), so without JS the
 * links simply jump down a page that shows every service. With JS only one
 * panel is shown, and the URL hash still opens (and shares) a given service.
 */
( function () {
	const root = document.querySelector( '[data-service-tabs]' );
	if ( ! root ) {
		return;
	}

	const list = root.querySelector( '[role="tablist"]' );
	const tabs = Array.prototype.slice.call( root.querySelectorAll( '[role="tab"]' ) );
	const panels = Array.prototype.slice.call( root.querySelectorAll( '[role="tabpanel"]' ) );
	const reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	if ( ! tabs.length || ! panels.length ) {
		return;
	}

	function findTab( slug ) {
		return tabs.find( function ( tab ) {
			return tab.dataset.tab === slug;
		} );
	}

	// Keep the active tab visible in the horizontally scrolling mobile bar.
	function revealTab( tab ) {
		if ( list.scrollWidth <= list.clientWidth ) {
			return;
		}
		list.scrollTo( {
			left: tab.offsetLeft - ( list.clientWidth - tab.offsetWidth ) / 2,
			behavior: reduceMotion ? 'auto' : 'smooth',
		} );
	}

	function scrollToPanel( panel ) {
		const top = panel.getBoundingClientRect().top;
		const header = parseInt( getComputedStyle( document.documentElement ).getPropertyValue( '--amanah-header-h' ), 10 ) || 96;
		if ( top < header || top > window.innerHeight * 0.6 ) {
			panel.scrollIntoView( { behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' } );
		}
	}

	function activate( slug, options ) {
		const opts = options || {};
		const tab = findTab( slug );
		if ( ! tab ) {
			return false;
		}

		tabs.forEach( function ( item ) {
			const isActive = item === tab;
			item.setAttribute( 'aria-selected', isActive ? 'true' : 'false' );
			item.setAttribute( 'tabindex', isActive ? '0' : '-1' );
		} );

		panels.forEach( function ( panel ) {
			panel.hidden = panel.id !== slug;
		} );

		revealTab( tab );

		if ( opts.updateHash && window.location.hash !== '#' + slug ) {
			history.replaceState( null, '', '#' + slug );
		}

		if ( opts.focusTab ) {
			tab.focus();
		}

		if ( opts.scroll ) {
			scrollToPanel( document.getElementById( slug ) );
		}

		return true;
	}

	tabs.forEach( function ( tab, index ) {
		tab.addEventListener( 'click', function ( event ) {
			event.preventDefault();
			activate( tab.dataset.tab, { updateHash: true } );
		} );

		// Arrow keys, Home and End move between tabs (WAI-ARIA tabs pattern).
		tab.addEventListener( 'keydown', function ( event ) {
			let target = null;
			if ( 'ArrowRight' === event.key || 'ArrowDown' === event.key ) {
				target = tabs[ ( index + 1 ) % tabs.length ];
			} else if ( 'ArrowLeft' === event.key || 'ArrowUp' === event.key ) {
				target = tabs[ ( index - 1 + tabs.length ) % tabs.length ];
			} else if ( 'Home' === event.key ) {
				target = tabs[ 0 ];
			} else if ( 'End' === event.key ) {
				target = tabs[ tabs.length - 1 ];
			}

			if ( target ) {
				event.preventDefault();
				activate( target.dataset.tab, { updateHash: true, focusTab: true } );
			}
		} );
	} );

	// Previous / next links inside each panel.
	root.querySelectorAll( '[data-tab-target]' ).forEach( function ( link ) {
		link.addEventListener( 'click', function ( event ) {
			event.preventDefault();
			const slug = link.dataset.tabTarget;
			activate( slug, { updateHash: true, scroll: true } );
			document.getElementById( slug ).focus( { preventScroll: true } );
		} );
	} );

	// Links elsewhere on the page (menu, footer) that point to a service.
	window.addEventListener( 'hashchange', function () {
		activate( window.location.hash.slice( 1 ), { scroll: true } );
	} );

	const initial = window.location.hash.slice( 1 );
	const opened = initial && activate( initial );
	if ( ! opened ) {
		activate( tabs[ 0 ].dataset.tab );
	}
	root.classList.add( 'is-ready' );

	// Opened from a link like /services/#personal-care: bring that service into view.
	if ( opened ) {
		window.requestAnimationFrame( function () {
			document.getElementById( initial ).scrollIntoView( { block: 'start' } );
		} );
	}
}() );
