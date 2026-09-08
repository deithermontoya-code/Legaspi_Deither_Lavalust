<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_edit = ($mode === 'edit');
$form_action = $is_edit ? base_url('products/edit/' . $product['id']) : base_url('products/create');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? 'Edit Product' : 'Add Product'; ?> | Product Desk</title>
    <style>
        :root { --ink: #12212b; --muted: #6d7b83; --cream: #f6f1e8; --paper: #fffdf8; --teal: #0f766e; --orange: #e8793e; --line: #d9e0dc; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { min-height: 100vh; padding: 34px; background: var(--cream); color: var(--ink); font: 16px/1.5 Georgia, serif; }
        .layout { display: grid; grid-template-columns: minmax(220px, .65fr) minmax(440px, 1.35fr); gap: clamp(36px, 8vw, 120px); max-width: 1080px; margin: 0 auto; padding-top: 6vh; }
        .intro { padding-top: 12px; }
        .eyebrow { margin-bottom: 18px; color: var(--orange); font: 700 .72rem Arial, sans-serif; letter-spacing: .18em; text-transform: uppercase; }
        h1 { font-size: clamp(2.5rem, 5vw, 4.6rem); line-height: .92; font-weight: 400; }
        .intro-copy { max-width: 230px; margin-top: 24px; color: var(--muted); }
        .back { display: inline-block; margin-top: 48px; color: var(--teal); font: 700 .76rem Arial, sans-serif; letter-spacing: .05em; text-decoration: none; text-transform: uppercase; }
        .form-area { padding: 34px 38px 38px; border-top: 3px solid var(--teal); background: var(--paper); box-shadow: 0 18px 45px rgba(25, 48, 45, .08); }
        label { display: block; margin: 22px 0 7px; font: 700 .75rem Arial, sans-serif; letter-spacing: .05em; text-transform: uppercase; }
        input, textarea { width: 100%; padding: 13px 0; border: 0; border-bottom: 1px solid var(--line); background: transparent; color: var(--ink); font: 1rem Georgia, serif; }
        textarea { min-height: 120px; resize: vertical; }
        input:focus, textarea:focus { outline: none; border-color: var(--teal); }
        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 28px; }
        .actions { display: flex; align-items: center; justify-content: flex-end; gap: 18px; margin-top: 34px; }
        button, .cancel { padding: 13px 17px; border: 1px solid transparent; background: var(--orange); color: #fff; cursor: pointer; font: 700 .76rem Arial, sans-serif; letter-spacing: .06em; text-decoration: none; text-transform: uppercase; }
        button:hover { background: #cf6030; }
        .cancel { border-color: var(--line); background: transparent; color: var(--ink); }
        .msg.error, .msg.success { padding: 12px 14px; margin-bottom: 18px; border-left: 3px solid; font: .85rem Arial, sans-serif; }
        .msg.error { border-color: #b42318; background: #fff0ed; color: #8a1c13; }
        .msg.success { border-color: #198754; background: #e8f5ed; color: #14532d; }
        @media (max-width: 720px) { body { padding: 20px 15px; } .layout { display: block; padding-top: 20px; } .intro-copy { max-width: 360px; } .back { margin: 28px 0; } .form-area { padding: 25px 20px; } }
    </style>
</head>
<body>
<div class="layout"><aside class="intro"><p class="eyebrow">Product Desk / Inventory</p><h1><?= $is_edit ? 'Edit product' : 'Add product'; ?></h1><p class="intro-copy">Keep the details clear so your team can make the next decision quickly.</p><a class="back" href="<?= base_url('products'); ?>">&larr; Back to products</a></aside><main class="form-area">

    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="msg success"><?= htmlspecialchars($success); ?></div>
        <?php endif; ?>

    <form method="post" action="<?= $form_action; ?>">
        <label for="product_name">Product Name</label>
        <input type="text" id="product_name" name="product_name" maxlength="100" required
               value="<?= htmlspecialchars($product['product_name'] ?? ''); ?>" autofocus>

        <label for="description">Description</label>
        <textarea id="description" name="description"><?= htmlspecialchars($product['description'] ?? ''); ?></textarea>

        <div class="row">
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required
                       value="<?= htmlspecialchars($product['price'] ?? ''); ?>">
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" step="1" min="0" required
                       value="<?= htmlspecialchars($product['quantity'] ?? ''); ?>">
            </div>
        </div>

        <button type="submit"><?= $is_edit ? 'Save Changes' : 'Add Product'; ?></button>
    </form>
</main></div>
</body>
</html>
