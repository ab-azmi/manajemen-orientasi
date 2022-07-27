<?php

use App\Models\User;
use App\Models\Tugas;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('penugasan.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Penugasan', route('penugasan.index'));
});

Breadcrumbs::for('penugasan.show', function (BreadcrumbTrail $trail, Tugas $penugasan): void {
    $trail->parent('penugasan.index');
    $trail->push($penugasan->name, route('penugasan.show', $penugasan));
});
