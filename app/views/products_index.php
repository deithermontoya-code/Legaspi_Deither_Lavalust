<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_admin = (($_SESSION['role'] ?? null) === 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Product Desk</title>
    <style>
        :root { --ink: #12212b; --muted: #6d7b83; --cream: #f6f1e8; --paper: #fffdf8; --teal: #0f766e; --orange: #e8793e; --line: #d9e0dc; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { min-height: 100vh; padding: 34px; background: var(--cream); color: var(--ink); font: 16px/1.5 Georgia, serif; }
        .wrap { max-width: 1280px; margin: 0 auto; }
        .topbar { display: flex; align-items: flex-end; justify-content: space-between; gap: 24px; padding-bottom: 32px; border-bottom: 1px solid var(--line); }
        .eyebrow { margin-bottom: 8px; color: var(--orange); font: 700 .72rem Arial, sans-serif; letter-spacing: .18em; text-transform: uppercase; }
        h1 { font-size: clamp(2.8rem, 6vw, 5.6rem); line-height: .88; font-weight: 400; }
        .actions { display: flex; align-items: center; gap: 18px; flex-wrap: wrap; justify-content: flex-end; }
        .btn { display: inline-block; padding: 13px 17px; border: 1px solid transparent; color: var(--ink); font: 700 .76rem Arial, sans-serif; letter-spacing: .06em; text-decoration: none; text-transform: uppercase; cursor: pointer; }
        .btn-primary { background: var(--orange); color: #fff; }
        .btn-primary:hover { background: #cf6030; }
        .btn-muted { border-color: var(--line); background: var(--paper); }
        .btn-danger { padding: 0; border: 0; background: transparent; color: #b42318; }
        .btn-sm { padding: 7px 10px; font-size: .7rem; }
        .user { color: var(--muted); font: .8rem Arial, sans-serif; }
        .user strong { color: var(--ink); }
        .msg { padding: 13px 16px; margin: 24px 0; border-left: 3px solid; font: .85rem Arial, sans-serif; }
        .msg.success { border-color: #198754; background: #e8f5ed; color: #14532d; }
        .msg.error { border-color: #b42318; background: #fff0ed; color: #8a1c13; }
        .panel { margin-top: 26px; overflow-x: auto; border-top: 3px solid var(--teal); background: var(--paper); box-shadow: 0 18px 45px rgba(25, 48, 45, .08); }
        table { width: 100%; border-collapse: collapse; min-width: 780px; }
        th, td { padding: 18px 20px; text-align: left; font-size: .88rem; }
        th { color: var(--muted); border-bottom: 1px solid var(--line); font: 700 .7rem Arial, sans-serif; letter-spacing: .1em; text-transform: uppercase; }
        td { border-bottom: 1px solid #e8ede9; }
        tbody tr:hover { background: #f4f8f4; }
        td.desc { max-width: 280px; color: var(--muted); }
        td.numeric { text-align: right; white-space: nowrap; }
        .row-actions { display: flex; gap: 12px; align-items: center; }
        .empty { padding: 58px 20px; text-align: center; color: var(--muted); }
        form.inline { display: inline; }
        @media (max-width: 760px) { body { padding: 20px 15px; } .topbar { align-items: flex-start; flex-direction: column; } .actions { justify-content: flex-start; } h1 { font-size: 3.4rem; } }
    </style>
</head>
<body>
<div class="wrap">
    <div class="topbar">
        <div><p class="eyebrow">Product Desk / Inventory</p><h1>Products</h1></div>
        <div class="actions">
            <span style="font-size:.85rem;color:#6b7280;">
                Signed in as <strong><?= htmlspecialchars($_SESSION['username'] ?? ''); ?></strong>
                <?php if (!$is_admin): ?>
                    <span style="background:#e5e7eb;color:#4b5563;padding:.15rem .5rem;border-radius:6px;font-size:.75rem;margin-left:.4rem;">view only</span>
                <?php endif; ?>
            </span>
            <?php if ($is_admin): ?>
                <a class="btn btn-primary" href="<?= base_url('products/create'); ?>">+ Add Product</a>
            <?php endif; ?>
            <a class="btn btn-muted" href="<?= base_url('logout'); ?>">Logout</a>
        </div>
    </div>

    <?php if (!empty($success)): ?>
        <div class="msg success"><?= htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <div class="panel">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created</th>
                    <?php if ($is_admin): ?><th>Actions</th><?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>#<?= htmlspecialchars($product['id']); ?></td>
                            <td><?= htmlspecialchars($product['product_name']); ?></td>
                            <td class="desc"><?= htmlspecialchars($product['description']); ?></td>
                            <td class="numeric">₱<?= number_format((float) $product['price'], 2); ?></td>
                            <td class="numeric"><?= htmlspecialchars($product['quantity']); ?></td>
                            <td><?= htmlspecialchars($product['created_at'] ?? ''); ?></td>
                            <?php if ($is_admin): ?>
                            <td>
                                <div class="row-actions">
                                    <a class="btn btn-muted btn-sm" href="<?= base_url('products/edit/' . $product['id']); ?>">Edit</a>
                                    <form class="inline" method="post" action="<?= base_url('products/delete/' . $product['id']); ?>" onsubmit="return confirm('Delete this product?');">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="<?= $is_admin ? 7 : 6; ?>" class="empty">
                        <?= $is_admin ? 'No products yet. Click "Add Product" to create one.' : 'No products yet.'; ?>
                    </td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
