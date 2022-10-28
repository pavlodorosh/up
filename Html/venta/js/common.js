$(function () {
	$('.slider-product').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-product-nav',
		prevArrow: '<button id="prev" type="button" class="btn-juliet"><span><svg width="21" height="38" viewBox="0 0 21 38" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.4889 37.1909C19.9354 37.1917 20.298 36.8303 20.2988 36.3838C20.2992 36.1686 20.2137 35.962 20.0613 35.81L2.84559 18.5959L20.0613 1.38189C20.3774 1.06575 20.3774 0.553229 20.0613 0.237089C19.7451 -0.0790501 19.2326 -0.0790501 18.9165 0.237089L1.12998 18.0236C0.814367 18.3393 0.814367 18.851 1.12998 19.1668L18.9165 36.9532C19.0681 37.1053 19.2741 37.1909 19.4889 37.1909Z" fill="#727272"/></svg></span></button>',
		nextArrow: '<button id="next" type="button" class="btn-juliet"><span><svg width="21" height="38" viewBox="0 0 21 38" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.71131 37.1909C1.2648 37.1917 0.902202 36.8303 0.901368 36.3838C0.900989 36.1686 0.986486 35.962 1.13891 35.81L18.3546 18.5959L1.13891 1.38189C0.82277 1.06575 0.82277 0.553229 1.13891 0.237089C1.45505 -0.0790501 1.96757 -0.0790501 2.28371 0.237089L20.0702 18.0236C20.3858 18.3393 20.3858 18.851 20.0702 19.1668L2.28371 36.9532C2.13212 37.1053 1.92611 37.1909 1.71131 37.1909Z" fill="#727272"/></svg></span></button>',
		responsive: [{
			breakpoint: 576,
			settings: {

			}
		}]
	});
	$('.slider-product-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.slider-product',
		dots: false,
		focusOnSelect: true,
		arrows: true,
		prevArrow: '<button id="prev" type="button" class="btn-juliet"><svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19 10.3848L10 1.38476" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round"/><path d="M10 1.38477L1 10.3848" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round"/></svg></button>',
		nextArrow: '<button id="next" type="button" class="btn-juliet"><svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1.38477L10 10.3848" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round"/><path d="M10 10.3848L19 1.38477" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round"/></svg></button>',
		responsive: [{
			breakpoint: 576,
			settings: {
				slidesToScroll: 1,
				slidesToShow: 3,
				arrows: true,
				vertical: false,
				verticalSwiping: false,
			},

		}]

	});
});