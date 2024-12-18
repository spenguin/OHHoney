// Product Page component
// called from index.js

// import nodes
import React, { useState, useEffect } from "react";

// import components
import ProductPageFilter from './_ProductPageFilter.jsx';

// import css

const ProductPage = ({terms, products}) => {

    return (
        <ProductPageFilter
            terms = {terms}
        />
    );
}

export default ProductPage;