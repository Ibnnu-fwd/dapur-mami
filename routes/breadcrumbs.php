<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function(BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Menu
Breadcrumbs::for('menu', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Makanan & Minuman', route('admin.menu.index'));
});

