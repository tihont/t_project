<?php
/**
 * Php-шаблон средней (контентной) секции страницы авторизации с формой ввода логина и пароля администратора.
 */
?>
<main class="container mt-4 mb-4">

    <section class="p-5">
        <h1>Login</h1>
        <form action="auth.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
        </form>
    </section>

</main>
