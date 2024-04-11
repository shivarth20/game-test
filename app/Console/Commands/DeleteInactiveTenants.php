<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DeleteInactiveTenants extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-inactive-tenants';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Calculate the date one year ago
        $oneYearAgo = Carbon::now()->subYear();

        // Get inactive tenants with no new data in the past year
        $inactiveTenants = Tenant::whereDoesntHave('user', function ($query) use ($oneYearAgo) {
            $query->where('created_at', '>', $oneYearAgo);
        })->get();

        // Delete inactive tenants
        foreach ($inactiveTenants as $tenant) {
            $tenant->delete();
        }

        $this->info('Inactive tenants deleted successfully.');
    }
}
