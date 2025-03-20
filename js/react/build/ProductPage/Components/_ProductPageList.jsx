// Product Page Filter component
// called from ProductPage.jsx

// import nodes
import React, { useState, useEffect } from "react";

const ProductPageList = ({filteredProducts, selectedCategory}) => { //console.log('products', filteredProducts );

    return (
        <div className="shop--products__list max-wrapper__narrow" key={selectedCategory}>
            {filteredProducts.map(p => { //console.log( 'p', p );
                // const backgroundUrl = p.image; 
                return (
                    <a href={p.url} style={{backgroundImage:`url(${p.image})`}} className="shop--products__item">
                        <div className="shop--products__item-name">
                            <h3>{p.title}</h3>
                        </div>
                    </a>
                )
            })}
        </div>
    )
}

export default ProductPageList;