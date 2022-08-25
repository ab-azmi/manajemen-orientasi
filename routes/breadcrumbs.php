<?php

use App\Models\User;
use App\Models\Group;
use App\Models\Tugas;
use App\Models\EventDay;
use App\Models\SesiAbsensi;
use Illuminate\Support\Str;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('penugasan.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Penugasan', route('penugasan.index'));
});

Breadcrumbs::for('penugasan.show', function (BreadcrumbTrail $trail, Tugas $penugasan): void {
    $trail->parent('penugasan.index');
    $trail->push(Str::limit($penugasan->name, 20), route('penugasan.show', $penugasan));
});

Breadcrumbs::for('penugasan.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('penugasan.index');
    $trail->push('Create', route('penugasan.create'));
});

Breadcrumbs::for('penugasan.responses', function (BreadcrumbTrail $trail, Tugas $penugasan): void {
    $trail->parent('penugasan.show', $penugasan);
    $trail->push('Respones', route('penugasan.responses', $penugasan));
});

Breadcrumbs::for('groups.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Groups', route('groups.index'));
});

Breadcrumbs::for('groups.show', function (BreadcrumbTrail $trail, Group $group): void {
    $trail->parent('groups.index');
    $trail->push($group->name, route('groups.show', $group));
});

Breadcrumbs::for('groups.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('groups.index');
    $trail->push('Create', route('groups.create',));
});

Breadcrumbs::for('event_days.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Event Days', route('event_days.index'));
});

Breadcrumbs::for('event_days.show', function (BreadcrumbTrail $trail, EventDay $event_day): void {
    $trail->parent('event_days.index');
    $trail->push($event_day->name, route('event_days.show', $event_day));
});

Breadcrumbs::for('event_days.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('event_days.index');
    $trail->push('Create', route('event_days.create'));
});

Breadcrumbs::for('absens.index', function(BreadcrumbTrail $trail): void{
    $trail->push('Absensi', route('absens.index'));
});

Breadcrumbs::for('absens.show', function(BreadcrumbTrail $trail, SesiAbsensi $absen):void{
    $trail->parent('absens.index');
    $trail->push($absen->name, route('absens.show', $absen));
});