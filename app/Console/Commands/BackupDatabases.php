<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/**
 * Class BackupDatabases
 * Command to take backup of all 4 databases
 * @package App\Console\Commands
 */
class BackupDatabases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup 4 configured databases in the system';

    /**
     * @var array
     */
    private $dbDumps;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $timestamp = (Carbon::now())->format('Y_m_d_h_i_s');

        for($i=0;$i<4;$i++)
        {
            $key = ($i<1) ? 'database.connections.mysql' : 'database.connections.mysql'.$i;

            $this->dbDumps[] = new Process(sprintf(
                'mysqldump -u%s -p%s %s > %s',
                config($key.'.username'),
                config($key.'.password'),
                config($key.'.database'),
                storage_path('backups/' . config($key.'.database') . '_' . $timestamp .  '.sql')
            ));
        }

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            /** @var Process $dump */
            foreach ($this->dbDumps as $dump) {
                $dump->mustRun();
            }

            $this->info('The backup has been proceed successfully.');
        } catch (ProcessFailedException $exception) {
            dd($exception->getMessage());
            $this->error('The backup process has been failed.');
        }
    }
}
