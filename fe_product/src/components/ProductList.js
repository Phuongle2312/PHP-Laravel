import { useEffect } from "react";
import axios from "axios";
function ProductList() {
  useEffect(() => {
    axios
      .get("http://127.0.0.1:8000/api/products")
      .then((response) => {
        console.log(response.data);
      })
      .catch((error) => {
        console.error("There was an error fetching the products!", error);
      });
  });
  return (
    <div>
      <h1>Product List</h1>
      {/* Product components will be rendered here */}
    </div>
  );
}
export default ProductList;
