<h2>Library Management System</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
        <h1>Create Account</h1>
		<form action="index.php" method="post">
				<input type="text" Name="Name" placeholder="Name" required>
				<input type="text" Name="Email" placeholder="Email" required>
				<input type="password" Name="Password" placeholder="Password" required>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required>
				<input type="text" Name="RollNo" placeholder="ID Number" required="">
				<select class="select"  name="Category" id="Category">
					<option value="Student">Student</option>
					<option value="Faculty">Faculty</option>
					<option value="Staff">Staff</option>
					
				</select> 
				<select class="select" name="Department" id="Category">
					<option value="BSBA">BSBA</option>
					<option value="BSIT">BSIT</option>
					<option value="BSED">BSED</option>
					 <option value="BEED">BEED</option>			
				</select>
			<button name="signup">Sign Up</button>
		</form>
	</div>



	<div class="form-container sign-in-container">
		<form action="index.php" method="post">
			<h1>Sign in</h1>
				<input type="text" Name="RollNo" placeholder="ID number" required="">
				<input type="password" Name="Password" placeholder="Password" required="">	
			<button name="signin">Sign In</button>

		</form>
	</div>	




	<div class="overlay-container">
	
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	
</div>

<!-- <footer>
	<p>
		Created by LCC BSIT College Students

	</p>
</footer> -->
		





<!-- <script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>