// Product Page Filter component
// called from ProductPage.jsx

// import nodes
import React, { useState, useEffect } from "react";

const ProductPageFilter = ({terms}) => {

    return (
        <div className="shop--filter">
             <div className="shop--filter__menu">
                 <div className="shop--filter__button">
                     <a href="">View Filter</a>
                 </div>
                 <div className="shop--filter__wrapper hide">
                    {terms.map((term) => {
                        return (
                            <div className="shop--filter__category">
                                <div className="shop--filter__category-image">
                                </div>
                                <div className="shop--filter__category-name">
                                    {term.name}
                                </div>
                            </div>
                        )
                    })}
                 </div>                
             </div>
         </div>

    )
}

export default ProductPageFilter;