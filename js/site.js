/**
 * Header behaviour: scroll state, mobile menu and submenu toggles.
 */
( function () {
	const header = document.getElementById( 'masthead' );
	const button = document.getElementById( 'mobile-menu-button' );
	const menu = document.getElementById( 'mobile-menu' );
	const openIcon = document.getElementById( 'menu-open' );
	const closeIcon = document.getElementById( 'menu-close' );

	// Expose the full header height (top bar + main bar) so the hero can fill the rest of the screen.
	const topHeader = document.getElementById( 'top-header' );
	const setHeaderHeight = function () {
		const height = ( topHeader ? topHeader.offsetHeight : 0 ) + ( header ? header.offsetHeight : 0 );
		document.documentElement.style.setProperty( '--amanah-header-h', height + 'px' );
	};
	setHeaderHeight();
	window.addEventListener( 'resize', setHeaderHeight );

	if ( header ) {
		const updateHeader = function () {
			header.classList.toggle( 'is-scrolled', window.scrollY > 40 );
		};
		updateHeader();
		window.addEventListener( 'scroll', updateHeader, { passive: true } );
	}

	function setMenu( isOpen ) {
		menu.classList.toggle( 'hidden', ! isOpen );
		openIcon.classList.toggle( 'hidden', isOpen );
		closeIcon.classList.toggle( 'hidden', ! isOpen );
		button.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
		button.setAttribute( 'aria-label', isOpen ? 'Close menu' : 'Open menu' );
	}

	if ( button && menu && openIcon && closeIcon ) {
		button.addEventListener( 'click', function () {
			setMenu( menu.classList.contains( 'hidden' ) );
		} );

		document.addEventListener( 'keydown', function ( event ) {
			if ( 'Escape' === event.key && ! menu.classList.contains( 'hidden' ) ) {
				setMenu( false );
				button.focus();
			}
		} );

		window.addEventListener( 'resize', function () {
			if ( window.innerWidth >= 1024 ) {
				setMenu( false );
			}
		} );

		// Accordion toggles for submenus in the mobile panel.
		menu.querySelectorAll( '.menu-item-has-children, .page_item_has_children' ).forEach( function ( item ) {
			const link = item.querySelector( 'a' );
			const toggle = document.createElement( 'button' );
			toggle.type = 'button';
			toggle.className = 'submenu-toggle';
			toggle.setAttribute( 'aria-expanded', 'false' );
			toggle.setAttribute( 'aria-label', 'Show submenu for ' + ( link ? link.textContent.trim() : 'item' ) );
			toggle.addEventListener( 'click', function () {
				const isOpen = item.classList.toggle( 'submenu-open' );
				toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
			} );
			if ( link ) {
				link.after( toggle );
			}
		} );
	}

	// Reveal-on-scroll for elements marked with data-reveal.
	const revealItems = document.querySelectorAll( '[data-reveal]' );
	if ( revealItems.length && 'IntersectionObserver' in window && ! window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		const observer = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-visible' );
					observer.unobserve( entry.target );
				}
			} );
		}, { rootMargin: '0px 0px -8% 0px' } );

		revealItems.forEach( function ( item ) {
			item.classList.add( 'reveal-ready' );
			observer.observe( item );
		} );
	}
}() );
