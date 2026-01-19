<?php
session_start();

if (!isset($_SESSION['task'])) {
    $_SESSION['task'] = [];
}

if (isset($_POST['add'])) {
    $task = trim($_POST['task']);
    if (!empty($task)) {
        $_SESSION['task'][] = $task;
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['delete'])) {
    unset($_SESSION['task'][$_POST['delete']]);
    $_SESSION['task'] = array_values($_SESSION['task']); // rapikan index
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project To-Do-List</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<div class="todo-container">

    <h1>To-Do List 📒</h1>

    <!-- FORM -->
    <form class="todo-form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="text" name="task" placeholder="Tambahkan tugas" required>
        <button name="add" type="submit">Tambah</button>
    </form>

    <!-- DAFTAR -->
    <div class="todo-daftar">
        <h3>Daftar To-Do 📒</h3>

        <ul class="todo-list">
            <?php foreach ($_SESSION['task'] as $index => $task): ?>
                <li>
                    <?= htmlspecialchars($task) ?>
                    <form method="post">
                        <input type="hidden" name="delete" value="<?= $index ?>">
                        <button type="submit" class="delete-btn">Hapus</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

</body>
</html>
