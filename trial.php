<!DOCTYPE html>
<html>
<head>
	<title>To-Do List App</title>
</head>
<body>
	<h1>To-Do List</h1>
	<form action="todo.php" method="post">
		<input type="text" name="task">
		<input type="submit" name="submit" value="Add Task">
	</form>
	<br>
	<table>
		<tr>
			<th>Task</th>
			<th>Action</th>
		</tr>
		<?php 
			$tasks = array();
			if (isset($_POST['submit'])) {
				$task = $_POST['task'];
				array_push($tasks, $task);
			}
			foreach ($tasks as $task) {
				echo "<tr><td>$task</td><td><a href='todo.php?remove=$task'>Remove</a></td></tr>";
			}
			if (isset($_GET['remove'])) {
				$remove = $_GET['remove'];
				unset($tasks[array_search($remove, $tasks)]);
				header("Location: todo.php");
			}
		?>
	</table>
</body>
</html>