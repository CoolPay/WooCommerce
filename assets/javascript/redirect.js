( function( $ ) {
	"use strict";

	// DOM ready
	$(function() {
		var qpform = $('#coolpay-payment-form');
		if (qpform.length) {
			setTimeout(function () {
				qpform.submit();
			}, 5000);
		}
	});

})(jQuery);