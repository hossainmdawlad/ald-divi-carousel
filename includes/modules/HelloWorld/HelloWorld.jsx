// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';
// import '../../../node_modules/@splidejs/splide/dist/css/splide.min.css';
import Splide from '@splidejs/splide';




class HelloWorld extends Component {

  static slug = 'aldc_hello_world';
  componentDidMount(){
    new Splide( '.splide' ).mount();
  }

  render() {
    // const Content = this.props.content;
    // new Splide( '.splide' ).mount();{}
    
    
    return (
      <Fragment>
        <h1 className="simp-simple-header-heading"></h1>
        <div className='aldc_hello_world'>
          {this.props.content()}
        </div>
        <div class="splide">
          <div class="splide__track">
            <ul class="splide__list">
              <li class="splide__slide">Slide 01</li>
              <li class="splide__slide">Slide 02</li>
              <li class="splide__slide">Slide 03</li>
            </ul>
          </div>
        </div>
      </Fragment>
    );
  }
}

export default HelloWorld;
