<?php
require_once __DIR__ . '/../src/bootstrap.php';
$stmtMembers = $pdo->query("SELECT * FROM members");
$members = $stmtMembers->fetchAll();
$stmtTasks = $pdo->query("SELECT tasks.*, members.name as member_name FROM tasks LEFT JOIN members ON tasks.member_id = members.id");
$tasks = $stmtTasks->fetchAll();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHP team project - Quan ly cong viec</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div style="padding: 20px; font-family: Arial, sans-serif;">
        <h1>Quan ly cong viec nhom</h1>

        <h2>Danh sach thanh vien</h2>
        <ul>
            <?php foreach ($members as $m): ?>
                <li><?= htmlspecialchars($m['name']) ?> (<?= htmlspecialchars($m['email']) ?>)</li>
            <?php endforeach; ?>
        </ul>
        <h2>Danh sach cong viec</h2>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Tieu De</th>
                <th>Trang thai</th>
                <th>Nguoi thuc hien</th>
            </tr>
            <?php foreach ($tasks as $t): ?>
                <tr>
                    <td><?= $t['id'] ?></td>
                    <td><?= htmlspecialchars($t['title']) ?></td>
                    <td><?= htmlspecialchars($t['status']) ?></td>
                    <td><?= htmlspecialchars($t['member_name'] ?? 'chua phan cong') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
