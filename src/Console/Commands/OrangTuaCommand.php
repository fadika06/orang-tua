<?php

namespace Bantenprov\OrangTua\Console\Commands;

use Illuminate\Console\Command;

/**
 * The OrangTuaCommand class.
 *
 * @package Bantenprov\OrangTua
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class OrangTuaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:group-egoverment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\OrangTua package';

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
        $this->info('Welcome to command for Bantenprov\OrangTua package');
    }
}
