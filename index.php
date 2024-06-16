 <!DOCTYPE html>
<head>
    <link rel="stylesheet" href="index.css">
    <title>Medicine Store</title>
</head>
<body>
 <div class="container">
     <div class="info">
         <h1>Welcome to Medical Store</h1>
         <p>Select your category to see the information</p>
         <ul>
             <li>Admin : an Admin can see all of information of all Employees and stock of medicine</li>
             <li>An employee can see stock of medicine.</li>
             <li>User : user are only allowed to view and order medicine. and if you are a user than you are always permitted to go inside website with Sign in or Sign up.</li>
         </ul>
     </div>
 <form method="get" id="form" action="" >
 <select id="tablename" name="tablename">
    <option value="Select"SELECTED>Select category</option>
     <option name="employees" value="employees"> Employee </option>
     <option name="Customer"  value = "Customer"> Customer </option>
     <option name="Admin" value = "Admin"> Admin </option>
    </select><br>
    <input class="input_pass" type="password" name="password" PLACEHOLDER="Input Password Here"> </input>
    <small style="color:red;"><?php echo $_GET['msg'] ?? '' ?> </small>
    <br>
    <button type="Button" onclick="check()" id="Button">Confirm</button>
    <div class="login">
       <button id="signin" onclick="Login()">Sign in</button>
       <button id="signup" onclick = "render()">Sign Up</button>
    </div>
</div>
<script src="index.js"></script>
</form>
</body>
</html>