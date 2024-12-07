<!-- app/views/auth/login.php -->
<form action="/login" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <?php if(isset($data['error'])): ?>
        <p><?php echo $data['error']; ?></p>
    <?php endif; ?>
</form>
