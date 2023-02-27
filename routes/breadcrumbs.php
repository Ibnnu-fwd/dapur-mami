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

// Invoice
Breadcrumbs::for('invoice', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tagihan', route('admin.invoice.index'));
});

// Setting
Breadcrumbs::for('setting', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengaturan', route('admin.setting.index'));
});

// Catalog Management
Breadcrumbs::for('catalog-management', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Manajemen Katalog', route('admin.catalog-management.index'));
});

// Catalog Management > Tambah Menu
Breadcrumbs::for('catalog-management.create', function(BreadcrumbTrail $trail) {
    $trail->parent('catalog-management');
    $trail->push('Tambah Menu', route('admin.catalog-management.create'));
});


