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
        // let tmp = 
        console.table('filteredProducts', filteredProducts);
    },[selectedCategory])


    return (
        <>
            <ProductPageFilter
                terms = {terms}
                setSelectedCategory = {setSelectedCategory}
            />
            <ProductPageList
                filteredProducts = {filteredProducts}
            />
        </>
    );
}

export default ProductPage;