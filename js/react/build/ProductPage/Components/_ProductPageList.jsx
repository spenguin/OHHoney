// Product Page Filter component
// called from ProductPage.jsx

// import nodes
import React, { useState, useEffect } from "react";

const ProductPageList = ({filteredProducts, selectedCategory}) => { //console.log('products', filteredProducts );

    return (
        <div class="shop--products__list" key={selectedCategory}>
            {/* {Object.keys(filteredProducts).map((p, i) => { //console.log(filteredProducts[p]); */}
            {filteredProducts.map(p => { console.log( 'p', p );
                return (
                    <div class="shop--products__item">
                    {/* <a href={filteredProducts[p]['url']}> */}
                        <a href={p.url}>
                        <div class="shop--products__item-image">
                            {/* <img src={filteredProducts[p]['image']} /> */}
                            <img src={p.image} />
                        </div>
                        <div class="shop--products__item-text">
                            {/* <h3>{filteredProducts[p]['name']}</h3> */}
                            <h3>{p.title}</h3>
                        </div>
                    </a>
                </div>
                )
            })}
        </div>
    )
}

export default ProductPageList;