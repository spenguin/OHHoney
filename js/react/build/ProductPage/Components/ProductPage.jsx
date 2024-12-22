// Product Page component
// called from index.js

// import nodes
import React, { useState, useEffect } from "react";

// import components
import ProductPageFilter from './_ProductPageFilter.jsx';
import ProductPageList from './_ProductPageList.jsx';

// import css

const ProductPage = ({terms, products}) => {

    // Set State vars
    const [selectedCategory, setSelectedCategory]   = useState('');
    const [filteredProducts, setFilteredProducts]   = useState(products);

    // set change functions
    useEffect(()=>{ 
        if( selectedCategory.length )
        {
            setFilteredProducts(
                products.filter(p => p.category.includes(selectedCategory ))
            );
        }
    },[selectedCategory])


    return (
        <>
            <ProductPageFilter
                terms = {terms}
                setSelectedCategory = {setSelectedCategory}
            />
            <ProductPageList
                filteredProducts = {filteredProducts}
                selectedCategory = {selectedCategory}
            />
        </>
    );
}

export default ProductPage;