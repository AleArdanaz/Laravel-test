<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UserSubscription;

class Subscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:list {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listado de subscripciones';

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
        $date = $this->argument('date');
        $headers = ['Subscripciones activas en el dia' , 'Subscripciones canceladas en el dia' ,'Subscripciones activas'];

        $activasdia = UserSubscription::where('fecha', $date)->where('status', 'active')->count();
        $canceladasdia = UserSubscription::where('fecha', $date)->where('status', 'cancel')->count();
        $activas = UserSubscription::where('status', 'active')->count();

        $sub = [$activasdia, $canceladasdia, $activas];
        $this->table($headers, [$sub]);
    }
}
