<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./stylesheets/product.css" />
    <title>Products</title>
  </head>
  <body>
    <header>
      <div class="logo-container">
          <img src="./images/logo.png" class="logo">
        <div class="logo-text">
          <h1>Aquatrack</h1>
          <p>Drink Pure, Live Pure</p>
      </div>
    </div>
    <nav>
      <ul>
        <li><a href="home.php">HOME</a></li>
        <li><a href="customers_information.php">View Record</a></li>
      </ul>
    </nav>
      </div>
    </header>

    <form>
     <h1>Product</h1>
      <label>Product ID</label>
      <input id="product_id" type="text" placeholder="" disabled />

      <label for="">Product Name</label>
      <select name="customers" id="customers" required>
        <option> </option>
        <option value="product-name">HAHAHAHAHA</option>
      </select>

      <label for="category">Category</label>
      <select name="category" id="category" required>
        <option> </option>
        <option value="category">HAHAHAHAHA</option>
      </select>

      <label for="sub-category">Sub-category</label>
      <select name="sub-category" id="sub-category" required>
        <option> </option>
        <option value="sub-category">HAHAHAHAHA</option>
      </select>

      <label for="size">Size</label>
      <input id="size" type="text" placeholder="size" />

      <label for="price">Price</label>
      <input id="price" type="text" placeholder="price" />

      <button type="button" onclick="insertKpop()">Insert</button>
      <button type="button" onclick="updateKpop()">Update</button>
    </form>
    <table>
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Category</th>
          <th>Sub-Category</th>
          <th>Size</th>
          <th>Price</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody id="container"></tbody>
    </table>
    <script src="../crud"></script>
  </body>
</html>