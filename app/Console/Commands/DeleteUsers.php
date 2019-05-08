<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class DeleteUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All tutors with status 1 will go to 0(desactivated) in certain date';

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
        //$user = new User();
        User::where('status',1)->status=0;
        //$user->save();
    }
}
