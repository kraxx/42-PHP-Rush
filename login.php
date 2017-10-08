<?PHP
	session_start();
?>

<!DOCTYPE HTML>

<html>

<head>
	<title>Best dirt in town</title>
	<link rel="stylesheet" type="text/css" href="./styles/base.css">
</head>

<body>

	<nav>
		<a href="./index.php">Dirt... just dirt.</a>
		<?php
			if ($_SESSION['logged_on'])
			{
				echo '<p class="userlog">';
				echo $_SESSION['logged_on'];
				echo '</p>';
			}
		?>
		<ul><a href="./index.php">Dirt<img src="./src/logo.png" /></a>
			<div class="dropdown-content">
			<?php
				if (!$_SESSION['logged_on'])
					echo'<a href="./login.php"><li>Login</li></a>';
				else
					echo'<a href="./logout.php"><li>Logout</li></a>';
			?>
				<a href="./settings.php"><li>Settings</li></a>
				<a href="./basket.php"><li>Basket</li></a>
				<a href="./checkout.php"><li>Checkout</li></a>
			</div>
		</ul>
	</nav>


	<form class="main-container" action="access.php" method="POST">

<?
	if ($_SESSION['logged_on'] && !$_SESSION['access'])
	{
		echo "You're already logged in. Log out?";
		echo '<table>

			<tr>
				<td><a href="./quit.php">Log Out</a></td>
				<td><a href="./index.php">Return to Front Page</a></td>
			</tr>';
	}
	else
	{
		if ($_SESSION['creation'])
		{
			echo "<div class='title'>Account has been created successfully.</div>";
			echo '<tr>
				<td><a href="./login.php">Login Page</a></td>
				<td><a href="./index.php">Return to Front Page</a></td>
			</tr>';
		}
		else if ($_SESSION['access'] == 1)
		{
			echo "You are now logged in.\n";
			echo '<table>

			<tr>
				<td><a href="./index.php">Return to Front Page</a></td>
			</tr>';
		}
		else if ($_SESSION['access'] == 2)
		{
			echo "Information is not correct.\n";
			echo '		<table>

			<tr>
				<td class="pre-input">Username: </td>
				<td><input type="text" name="login" value="" /></td>
			</tr>

			<tr>
				<td class="pre-input">Password: </td>
				<td><input type="password" name="password" value="" ></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="Log In"/></td>
				<td><a href="./newaccount.php">New Account</a></td>
			</tr>';
		}
		else
		{
			echo '<div class="title">Enter login information:</div>';
			echo '		<table>

			<tr>
				<td class="pre-input">Username: </td>
				<td><input type="text" name="login" value="" /></td>
			</tr>

			<tr>
				<td class="pre-input">Password: </td>
				<td><input type="password" name="password" value="" ></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="Log In"/></td>
				<td><a href="./newaccount.php">New Account</a></td>
			</tr>';
		}
	}
	$_SESSION['creation'] = "";
	$_SESSION['access'] = "";
?>

		</table>		
	</form>

</body>

</html>