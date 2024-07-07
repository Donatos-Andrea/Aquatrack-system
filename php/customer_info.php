<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./stylesheets/customer_information.css" />
    <title>Customer's Information</title>
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
    </header>
    <nav>
      <ul>
        <li><a href="login.php"></a></li>
        <li><a href="customers_information.php">View Record</a></li>
        <li><a href="products.php">Products</a></li>
      </ul>
    </nav>
    <div class="form-container">
      <h1>Customer's Information</h1>
      <form class="form" id="form">
        <label>Firstname</label>
        <input
          type="text"
          id="firstName"
          placeholder="First Name"
          required
          class="first"/>
        <label>Middlename</label>
        <input
          type="text"
          id="middleName"
          placeholder="Middle Name"
          class="middle"
          required/>
        <label>Lastname</label>
        <input
          type="text"
          id="lastName"
          placeholder="Last Name"
          required
          class="last"/>

        <label for="municipality">Municipality:</label>
        <select name="customers" id="customers" required>
          <option value="">Select the Municipality</option>
          <option value="municipality">Taguig City</option>
        </select>

        <label for="barangay">Barangay:</label>
        <select name="customers" id="customers" required>
          <option value="">Select the Barangay</option>
          <option value="">Lower Bicutan</option>
          <option value="">New Lower Bicutan</option>
          <option value="">Hagonoy</option>
          <option value="">Central Signal Village</option>
        </select>

        <label for="zipCode">Zipcode:</label>
        <select name="customers" id="customers" required>
          <option value="">Select the Zipcode</option>
          <option value="zipCode">1630</option>
          <option value="zipCode">1632</option>
          <option value="zipCode">1633</option>
        </select>

        <input
          type="text"
          id="street"
          placeholder="Street"
          required
          class="street"/>

        <input
          type="text"
          id="number"
          placeholder="Contact No."
          required
          class="number"/>

        <input
          type="email"
          id="email"
          placeholder="Email"
          required
          class="email"/>

        <button type="submit" id="submit_button">Submit</button>
      </form>
    </div>
  </section>
  <section class="footer">
      <p class="copyright">© 2024 by PPG. All rights reserved. </p>
  </section> 
  </body>
</html>
