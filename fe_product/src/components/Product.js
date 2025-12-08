function Product(props) {
  return (
    <div className="product">
      <h2>{props.name}</h2>
      <p>Price: ${props.price}</p>
      <p>{props.description}</p>
      <button>Add to Cart</button>
    </div>
  );
}
export default Product;
