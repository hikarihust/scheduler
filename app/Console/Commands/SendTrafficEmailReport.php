<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendReport;

class SendTrafficEmailReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendreport:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $usersCount = \DB::table('users')
            ->whereRaw('Date(created_at) = CURDATE()')
            ->count();

        Mail::to('vudinhquang@gmail.com')->send(new SendReport($usersCount));
    }
}
