// Product Page Filter component
// called from ProductPage.jsx

// import nodes
import React, { useState, useEffect } from "react";

const ProductPageFilter = ({terms, setSelectedCategory}) => {

    // set State vars
    const [showFilter, setShowFilter]   = useState(false); 


    // set change functions
    const changeSelectedCategory = (slug) => {
        setSelectedCategory(slug);
        changeShowFilter();
    }

    const changeShowFilter = () => {
        setShowFilter(~showFilter);
    }

    return (
        <div className="shop--filter">
            <div className="shop--filter__menu">
                <div className="shop--filter__button" onClick={() => changeShowFilter()}>
                    View Filter
                </div>
                {showFilter ?
                    <div className="shop--filter__wrapper max-wrapper__narrow">
                        {terms.map((term) => {
                            return (
                                <div className="shop--filter__category" onClick={() => changeSelectedCategory(term.slug)}>
                                    <div className="shop--filter__category-image">
                                    </div>
                                    <div className="shop--filter__category-name">
                                        {term.name}
                                    </div>
                                </div>
                            )
                        })}
                    </div> 
                    : ''
                }               
            </div>
         </div>

    )
}

export default ProductPageFilter;