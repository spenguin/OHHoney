// Product Page Filter component
// called from ProductPage.jsx

// import nodes
import React, { useState, useEffect } from "react";

const ProductPageList = ({filteredProducts}) => { //console.log('products', filteredProducts );

    return (
        <div class="shop--products__list">
            {Object.keys(filteredProducts).map((p, i) => { //console.log(filteredProducts[p]);
                return (
                    <div class="shop--products__item">
                    <a href={filteredProducts[p]['url']}>
                        <div class="shop--products__item-image">
                            <img src={filteredProducts[p]['image']} />
                        </div>
                        <div class="shop--products__item-text">
                            <h3>{filteredProducts[p]['name']}</h3>
                        </div>
                    </a>
                </div>
                )
            })};
        </div>
    )
}

export default ProductPageList;