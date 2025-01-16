<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('start_published', function () {
	$this->call('app:start-publisher');
})->purpose('Автоматическое опубликование постов')->everyMinute();