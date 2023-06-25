<!DOCTYPE html>
<html>

<head>
    <title>Halaman Register</title>
    <!-- Tambahkan file CSS atau inline CSS sesuai kebutuhan -->
</head>

<body>
    <h1>Halaman Register</h1>

    <form method="POST" action="<?php echo site_url('auth/register'); ?>">
        <label for="name">Nama:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <label for="confirm_password">Konfirmasi Password:</label>
        <input type="password" name="confirm_password" required>
        <br>
        <button type="submit">Register</button>
    </form>
</body>

</html>