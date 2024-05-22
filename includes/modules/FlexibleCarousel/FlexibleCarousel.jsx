// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
// import './style.css';
// import '../../../node_modules/@splidejs/splide/dist/css/splide.min.css';
import Splide from '@splidejs/splide';

class FlexibleCarousel extends Component {

	static slug = 'aldc_flexible_carousel';
	componentDidMount(){
		var elms = document.getElementsByClassName( 'splide' );
		for ( var i = 0; i < elms.length; i++ ) {
			var splideOptions = JSON.parse(elms[ i ].getAttribute('data-splide'));
			console.log(splideOptions);
			const splide = new Splide( elms[ i ],splideOptions );
			splide.on( 'pagination:mounted', function( data ) {
				// data.items contains all dot items
				data.items.forEach( function( item ) {
				  item.button.textContent = String( item.page + 1 );
				} );
			  } );
			splide.mount();
		}
		// Splide = new Splide( '.splide' ).mount();
		// Splide.defaults = {
		// 	type   : 'loop',
		//   }
	}

	render() {
		const content = this.props.content;
		var dataSplide = {
			"type"   : 'loop',
			"perPage" : this.props.per_page,
			"padding": this.props.side_padding,
			"gap": this.props.gap,
			// "focus"  : 'center',
			"lazyLoad": 'nearby',
			"breakpoints": {
				768: {
					"perPage": this.props.breakpoints_768,
				},
				480: {
					"perPage": this.props.breakpoints_480,
				},
			},
			"classes": {
				pagination: "splide__pagination custom-pagination",
				arrows: "splide__arrows custom-arrows",
				prev: "splide__arrow--prev custom-prev",
				next: "splide__arrow--next custom-next"
			  },
			"pagination": false,
		};
		const dataSplideJson = JSON.stringify(dataSplide);
		// console.log(dataSplideJson);
		// console.log(this.props.content);
		return (
			<Fragment>
				<div className="splide" data-splide={dataSplideJson}>
					<div className="splide__track">
						<div className="splide__list">
							{
								content.map((slide,i) => 
									<div className="splide__slide" key={i} dangerouslySetInnerHTML={ { __html: slide.props.content} }></div>
								)
							}
						</div>
					</div>
				</div>
			</Fragment>
		);
	}
}

export default FlexibleCarousel;
