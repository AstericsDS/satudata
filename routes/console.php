<?php

use App\Jobs\SyncAbsensi;
use App\Jobs\SyncAnggaran;
use App\Jobs\SyncDosen;
use App\Jobs\SyncKerjasama;
use App\Jobs\SyncMahasiswa;
use App\Jobs\SyncTendik;
use App\Jobs\SyncTracerStudy;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::job(new SyncMahasiswa)->dailyAt('00:05');
Schedule::job(new SyncDosen)->dailyAt('00:10');
Schedule::job(new SyncTracerStudy)->dailyAt('00:15');
Schedule::job(new SyncKerjasama)->dailyAt('00:20');
Schedule::job(new SyncTendik)->dailyAt('00:25');
Schedule::job(new SyncAnggaran)->dailyAt('00:30');
Schedule::job(new SyncAbsensi)->hourly();