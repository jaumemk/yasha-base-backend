<?php

namespace Yasha\Backend\Console\Commands;

use Illuminate\Console\Command;
use \App\Models\User;

class AuthIsAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:is-admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upgrades any user to admin rights';

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
     * @param  str $email
     * @return mixed
     */
    public function handle()
    {

        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if($user){
            $user->is_admin = true;
            $user->save();
            $this->line('User ' . $user->name . ' has been upgraded to admin.');
        } else {
            $this->error('User not found!');
        }

    }

}