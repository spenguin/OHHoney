// Product Page component
// called from index.js

// import nodes
import React, { useState, useEffect } from "react";

// import components
import ProductPageFilter from './_ProductPageFilter.jsx';
import ProductPageList from './_ProductPageList.jsx';

// import css

const ProductPage = ({terms, products}) => {//console.log('terms', terms);

    // Set State vars
    const [selectedCategory, setSelectedCategory]   = useState('');
    const [filteredProducts, setFilteredProducts]   = useState(products);
    const [selectedTerm, setSelectedTerm]           = useState('');

    // set change functions
    useEffect(()=>{ 
        if( selectedCategory.length )
        {
            setFilteredProducts(
                products.filter(p => p.category.includes(selectedCategory ))
            );
            let tmp = terms.filter( t => t.slug == selectedCategory ); console.log('tmp', tmp);
            setSelectedTerm( tmp[0].name )
        }
    },[selectedCategory])


    return (
        <>
            <ProductPageFilter
                terms = {terms}
                setSelectedCategory = {setSelectedCategory}
            />
            <div className="show--category__selected max-wrapper__narrow">
                {selectedTerm.length > 0 && 
                    <span>Selected: {selectedTerm}</span>
                }
            </div>
            <ProductPageList
                filteredProducts = {filteredProducts}
                selectedCategory = {selectedCategory}
            />
        </>
    );
}

export default ProductPage;