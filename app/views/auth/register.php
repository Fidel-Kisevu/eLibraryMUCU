<!-- app/views/auth/register.php -->
<form action="/register" method="POST">
    <input type="text" name="full_name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="text" name="phone_number" placeholder="Phone Number" required>
    <button type="submit">Register</button>
    <?php if(isset($data['error'])): ?>
        <p><?php echo $data['error']; ?></p>
    <?php endif; ?>
</form>
