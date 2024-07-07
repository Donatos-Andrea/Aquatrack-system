<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="">
    <title>Sign up</title>
</head>
<body>
    <div class="form-container">
        <h1>Sign up</h1>
        <form class="form" method="post">
            <input type="text" name="firstname" placeholder="First Name" 
                   required class="first" />
            <input type="text" name="middlename" placeholder="Middle Name" 
                   class="middle" />
            <input type="text" name="lastname" placeholder="Last Name" 
                   required class="last" />
            
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
            <input type="password" name="password" placeholder="Password" 
                   required class="password" />
            <input type="password" name="confirm_password" 
                   placeholder="Confirm Password" required class="confirm" />
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
