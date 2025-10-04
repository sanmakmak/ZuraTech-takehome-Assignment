import React, { useEffect, useState } from "react";
import "../styles/user-products.scss";

const UserProductsPage = () => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true); // Optional loading indicator
  const [error, setError] = useState(null);

useEffect(() => {
  const fetchProducts = async () => {
    try {
      const res = await fetch("http://localhost:8010/wp-json/my-api/v1/user/1/products");
      const json = await res.json();
      
      console.log("FROM PORT 8010 API Response:", json);

      if (Array.isArray(json.data)) {
        setProducts(json.data);
      } else {
        console.warn("WRNG 'data' is not an array:", json.data);
        setProducts([]);
      }
    } catch (error) {
      console.error("ERROR Failed to fetch products:", error);
      setError("Failed to fetch products");
    } finally {
      setLoading(false);
    }
  };

  fetchProducts();
}, []);

  return (
    <div className="user-products">
      <h1>Mark User Products</h1>

      {loading && <p>Loading...</p>}
      {error && <p className="error">{error}</p>}

      {!loading && !error && products.length === 0 && (
        <p>No products found.</p>
      )}

      {!loading && !error && products.length > 0 && (
        <div className="grid">
          {products.map((product) => (
            <div className="product-card" key={product.id}>
              {product.image && (
                <img src={product.image} alt={product.name} />
              )}
              <h2>{product.name}</h2>
              <p>{product.description}</p>
              <small>SKU: {product.sku}</small>
            </div>
          ))}
        </div>
      )}
    </div>
  );
};

export default UserProductsPage;
