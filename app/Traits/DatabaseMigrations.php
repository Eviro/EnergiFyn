<?php

namespace App\Traits;

trait DatabaseMigrations
{
    /**
     * Run the dabase migrations for the application.
     *
     * @return void
     */
    public function runDatabaseMigrations()
    {
        $this->artisan('migrate:refresh --seed');

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:refresh --seed');
        });
    }
}
