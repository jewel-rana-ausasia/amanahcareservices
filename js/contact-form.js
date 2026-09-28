/**
 * Contact form: inline validation, character counter and submit state.
 * The server re-validates everything, so this is purely a nicer experience.
 */
( function () {
	const form = document.querySelector( '[data-contact-form]' );

	// Move focus to a success/error notice after a redirect so screen readers announce it.
	const notice = document.querySelector( '[data-contact-focus]' );
	if ( notice ) {
		notice.focus( { preventScroll: true } );
	}

	if ( ! form ) {
		return;
	}

	const field = function ( name ) {
		return form.querySelector( '#amanah_' + name );
	};
	const messages = {
		name: 'Please enter your name.',
		emailEmpty: 'Please enter your email address.',
		email: 'Please enter a valid email address, e.g. name@example.com.',
		phone: 'Please enter a valid phone number, e.g. 0400 000 000.',
		messageEmpty: 'Please tell us a little about how we can help.',
		messageShort: 'Please add a little more detail (at least 10 characters).',
		consent: 'Please tick this box so we can respond to your enquiry.',
	};

	const rules = {
		name: function ( el ) {
			return el.value.trim() ? '' : messages.name;
		},
		email: function ( el ) {
			const value = el.value.trim();
			if ( ! value ) {
				return messages.emailEmpty;
			}
			return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test( value ) ? '' : messages.email;
		},
		phone: function ( el ) {
			const value = el.value.trim();
			if ( ! value ) {
				return '';
			}
			const digits = value.replace( /\D/g, '' );
			return /^[0-9+()\s.-]+$/.test( value ) && digits.length >= 8 && digits.length <= 15 ? '' : messages.phone;
		},
		message: function ( el ) {
			const value = el.value.trim();
			if ( ! value ) {
				return messages.messageEmpty;
			}
			return value.length < 10 ? messages.messageShort : '';
		},
		consent: function ( el ) {
			return el.checked ? '' : messages.consent;
		},
	};

	function setError( name, text ) {
		const el = field( name );
		const error = form.querySelector( '#amanah_' + name + '-error' );
		if ( ! el || ! error ) {
			return;
		}
		if ( text ) {
			el.setAttribute( 'aria-invalid', 'true' );
			error.querySelector( 'span' ).textContent = text;
			error.hidden = false;
		} else {
			el.removeAttribute( 'aria-invalid' );
			error.hidden = true;
		}
	}

	function validate( name ) {
		const el = field( name );
		if ( ! el ) {
			return true;
		}
		const text = rules[ name ]( el );
		setError( name, text );
		return ! text;
	}

	Object.keys( rules ).forEach( function ( name ) {
		const el = field( name );
		if ( ! el ) {
			return;
		}
		// Validate once the visitor leaves a field, then live while they fix it.
		el.addEventListener( 'blur', function () {
			if ( 'consent' !== name && el.value.trim() ) {
				validate( name );
			}
		} );
		el.addEventListener( 'change', function () {
			if ( 'consent' === name ) {
				validate( name );
			}
		} );
		el.addEventListener( 'input', function () {
			if ( el.hasAttribute( 'aria-invalid' ) ) {
				validate( name );
			}
		} );
	} );

	const submit = form.querySelector( '[data-contact-submit]' );

	form.addEventListener( 'submit', function ( event ) {
		let firstInvalid = null;
		Object.keys( rules ).forEach( function ( name ) {
			if ( ! validate( name ) && ! firstInvalid ) {
				firstInvalid = field( name );
			}
		} );

		if ( firstInvalid ) {
			event.preventDefault();
			firstInvalid.focus();
			return;
		}

		// Prevent double submissions.
		if ( submit ) {
			submit.classList.add( 'is-loading' );
			submit.setAttribute( 'aria-busy', 'true' );
		}
	} );

	// Reset the button if the page is restored from the back/forward cache.
	window.addEventListener( 'pageshow', function () {
		if ( submit ) {
			submit.classList.remove( 'is-loading' );
			submit.removeAttribute( 'aria-busy' );
		}
	} );
}() );
