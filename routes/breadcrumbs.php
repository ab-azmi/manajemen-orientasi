<?php

use App\Models\User;
use App\Models\Group;
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

Breadcrumbs::for('groups.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Groups', route('groups.index'));
});

Breadcrumbs::for('groups.show', function (BreadcrumbTrail $trail, Group $group): void {
    $trail->parent('groups.index');
    $trail->push($group->name, route('groups.show', $group));
});