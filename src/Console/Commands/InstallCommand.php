<?php

namespace DavidBase\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'davidbase:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install davidbase';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Maatwebsite/Laravel-Excel
        $this->call('vendor:publish', [
            '--provider' => 'Maatwebsite\Excel\ExcelServiceProvider'
        ]);

        $this->call('vendor:publish', [
            '--provider' => 'DavidBase\ServiceProvider'
        ]);

        // Migrate Database
        $this->comment('Migrating database...');
        $this->call('migrate');
        $this->comment('Database Migrated');

        // Install Permissions
        $this->installPermissions();

        // Create Admin User
        if ($this->confirm('Do you want to create admin user?')) {
            $user['name'] = $this->ask('What is your name?');
            $user['email'] = $this->ask('What is your email?');
            $user['password'] = $this->secret('What is your password?');
            $user = User::create($user);
            $user->givePermissionTo(Permission::pluck('name')->toArray());
        }

        // Install successful
        $this->comment('Install successful');
    }

    /**
     * Install Permissions
     */
    protected function installPermissions()
    {
        Permission::firstOrCreate(['name'=>'manage-system']);
        Permission::firstOrCreate(['name'=>'manage-roles']);
        Permission::firstOrCreate(['name'=>'browse-users']);
        Permission::firstOrCreate(['name'=>'create-users']);
        Permission::firstOrCreate(['name'=>'update-users']);
        Permission::firstOrCreate(['name'=>'delete-users']);
    }
}
