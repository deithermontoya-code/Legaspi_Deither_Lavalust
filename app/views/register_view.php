<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Product Desk</title>
    <style>
        :root { --ink: #12212b; --muted: #6d7b83; --cream: #f6f1e8; --paper: #fffdf8; --teal: #0f766e; --orange: #e8793e; --line: #d9e0dc; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { min-height: 100vh; padding: 28px; background: var(--cream); color: var(--ink); font: 16px/1.5 Georgia, serif; }
        .auth-shell { display: grid; grid-template-columns: minmax(280px, .9fr) minmax(360px, 1.1fr); max-width: 1120px; min-height: calc(100vh - 56px); margin: auto; overflow: hidden; background: var(--paper); box-shadow: 0 24px 70px rgba(25, 48, 45, .12); }
        .brand-panel { display: flex; flex-direction: column; justify-content: space-between; padding: clamp(30px, 6vw, 76px); background: var(--teal); color: #f7fbf6; }
        .mark { width: 48px; height: 48px; display: grid; place-items: center; margin-bottom: 52px; border: 1px solid rgba(255,255,255,.45); font: 700 1.1rem Arial, sans-serif; }
        .eyebrow { color: #f8bb82; font: 700 .72rem Arial, sans-serif; letter-spacing: .18em; text-transform: uppercase; }
        .brand-panel h1 { max-width: 360px; margin-top: 18px; font-size: clamp(2.5rem, 5vw, 4.7rem); line-height: .98; font-weight: 400; }
        .brand-copy { max-width: 300px; margin-top: 24px; color: #c9e1d9; }
        .brand-foot { color: #a9cec2; font: .78rem Arial, sans-serif; }
        .form-panel { display: flex; align-items: center; padding: clamp(30px, 7vw, 92px); }
        .card { width: min(100%, 410px); }
        .kicker { margin-bottom: 10px; color: var(--orange); font: 700 .75rem Arial, sans-serif; letter-spacing: .12em; text-transform: uppercase; }
        h2 { margin-bottom: 8px; font-size: clamp(2rem, 4vw, 3rem); line-height: 1; font-weight: 400; }
        p.subtitle { margin-bottom: 30px; color: var(--muted); }
        label { display: block; margin: 18px 0 7px; font: 700 .78rem Arial, sans-serif; letter-spacing: .04em; text-transform: uppercase; }
        input { width: 100%; padding: 14px 0; border: 0; border-bottom: 1px solid var(--line); background: transparent; color: var(--ink); font: 1rem Georgia, serif; }
        input:focus { outline: none; border-color: var(--teal); }
        button { width: 100%; margin-top: 28px; padding: 15px 18px; border: 0; background: var(--orange); color: #fff; cursor: pointer; font: 700 .82rem Arial, sans-serif; letter-spacing: .08em; text-transform: uppercase; }
        button:hover { background: #cf6030; }
        .msg.error { padding: 12px 14px; margin-bottom: 18px; border-left: 3px solid #b42318; background: #fff0ed; color: #8a1c13; font: .85rem Arial, sans-serif; }
        .footer-link { margin-top: 28px; color: var(--muted); font: .85rem Arial, sans-serif; }
        .footer-link a { color: var(--teal); font-weight: 700; text-decoration: none; }
        @media (max-width: 720px) { body { padding: 0; } .auth-shell { display: block; min-height: 100vh; } .brand-panel { min-height: 280px; } .mark { margin-bottom: 28px; } .brand-foot { margin-top: 44px; } .form-panel { min-height: 560px; } }
    </style>
</head>
<body>
<div class="auth-shell">
<section class="brand-panel">
    <div><div class="mark">PD</div><p class="eyebrow">Product Desk</p><h1>Build a calmer inventory.</h1><p class="brand-copy">Create your workspace and keep every product within reach.</p></div>
    <p class="brand-foot">Organize. Track. Move forward.</p>
</section>
<main class="form-panel"><div class="card">
    <p class="kicker">New workspace</p>
    <h2>Create an account</h2>
    <p class="subtitle">Register to manage products.</p>

    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('register'); ?>">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autocomplete="username" required autofocus>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" autocomplete="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" autocomplete="new-password" minlength="6" required>

        <button type="submit">Register</button>
    </form>

    <div class="footer-link">
        Already have an account? <a href="<?= base_url('login'); ?>">Log in</a>
    </div>
</div></main>
</div>
</body>
</html>
