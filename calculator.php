<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
</head>
<body>
	<h1>Calculator</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="num1">Enter first number:</label>
		<input type="number" id="num1" name="num1" required>
		<br>
		<label for="num2">Enter second number:</label>
		<input type="number" id="num2" name="num2" required>
		<br>
		<label for="operation">Select operation:</label>
		<select id="operation" name="operation">
			<option value="add">Addition</option>
			<option value="subtract">Subtraction</option>
			<option value="multiply">Multiplication</option>
			<option value="divide">Division</option>
		</select>
		<br>
		<input type="submit" value="Calculate">
	</form>

	<?php
		// check if form is submitted
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$num1 = $_POST['num1'];
			$num2 = $_POST['num2'];
			$operation = $_POST['operation'];

			// check if input is numeric
			if (!is_numeric($num1) || !is_numeric($num2)) {
				echo "<p>Error: Please enter valid numbers.</p>";
			}
			// perform calculation based on selected operation
			else {
				switch ($operation) {
					case 'add':
						$result = $num1 + $num2;
						break;
					case 'subtract':
						$result = $num1 - $num2;
						break;
					case 'multiply':
						$result = $num1 * $num2;
						break;
					case 'divide':
						if ($num2 == 0) {
							echo "<p style='color:red;'>Error: Cannot divide by zero.</p>";
						} else {
							$result = $num1 / $num2;
						}
						break;
					default:
						echo "<p style='color:red;'>Error: Please select an operation.</p>";
						break;
				}

				// display result
				if (isset($result)) {
					echo "<p>Result: $num1 $operation $num2 = $result</p>";
				}
			}
		}
	?>
</body>
</html>
