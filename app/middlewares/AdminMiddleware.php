<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param Closure $next
     * @return mixed
     */
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $role = $_SESSION['role'] ?? null;

        if ($role !== 'admin') {
            $_SESSION['flash_error'] = 'Only administrators can manage products.';
            redirect('products');
            return;
        }

        return $next();
    }
}
