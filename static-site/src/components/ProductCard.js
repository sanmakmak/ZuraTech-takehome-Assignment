import React from "react"

const ProductCard = ({ product }) => {
  const { name, sku, image, description } = product

  return (
    <div className="product-card">
      {image && <img src={image} alt={name} />}
      <h3>{name}</h3>
      <p className="sku">SKU: {sku}</p>
      <p className="description">{description}</p>
    </div>
  )
}

export default ProductCard
