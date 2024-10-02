<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    protected $signature = 'backup:database';
    protected $description = 'Take a backup of the database and store it on the server.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $dbHost = env('DB_HOST');
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPassword = env('DB_PASSWORD');
        $backupPath = storage_path('backups/' . $dbName . '_' . date('Y-m-d_H-i-s') . '.sql');
        $command = "mysqldump --user={$dbUser} --password={$dbPassword} --host={$dbHost} {$dbName} > {$backupPath}";
        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);

        if ($resultCode === 0) {
            $this->info('Backup created successfully at: ' . $backupPath);
        } else {
            $this->error('Error occurred while creating backup.');
        }
    }
}
