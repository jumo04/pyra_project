<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Unique;


class CloseTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Con este comando se cerrara el formulario cada día a la hora determinada por el cierre.';

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
        $unique = Unique::first();
        date_default_timezone_set("GMT"); 
        if (strtotime($unique->time) <= (time()-60*60 *5)) {
            $unique->block = true;
            $unique->save();
            $this->info('Se coloco la hora de cierre en verdadero');
        }
        $this->info('paso por acá');

    }   
}
