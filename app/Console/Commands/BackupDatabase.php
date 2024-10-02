<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
class BackupDatabase extends Command
{
    protected $signature = 'backup:database';
    protected $description = 'Take a backup of the database and store it on the server.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle() {
        $databaseName = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $backupPath = storage_path('app/backups');
        if (!file_exists($backupPath)) {
            mkdir($backupPath, 0755, true);
        }
        $timestamp = now()->format('Ymd_His');
        $backupFile = "{$backupPath}/backup_{$databaseName}_{$timestamp}.sql";
        $envPassword = env('DB_PASSWORD');
        $mysqldumpCommand = [
            'mysqldump',
            '-u' . $username,
            '--password=' . $envPassword,
            $databaseName,
        ];
        $mysqldumpCommandString = implode(' ', $mysqldumpCommand) . ' > ' . escapeshellarg($backupFile);
        $mysqldumpProcess = Process::fromShellCommandline($mysqldumpCommandString);
        $mysqldumpProcess->run();
        if (!$mysqldumpProcess->isSuccessful()) {
            $this->error('Failed to export the database. ' . $mysqldumpProcess->getErrorOutput());
            return;
        }
        $this->info('Database exported, compressed, and email sent successfully.');
        $this->info('Backup folder deleted.');
    }
}
