<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App;
use DB;
use Carbon\Carbon;

class DerrubarMotoristasInativos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'derrubarMotoristasInativos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Derruba os motoristas inativos nos últimos 10 minutos';

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
        $rs = App\Motorista::select('uid')
				->where('status', App\Motorista::ONLINE_DISPONIVEL)
				->where('updated_at', '<', DB::raw("'" . Carbon::now()->subMinutes(10) . "'"))
				->get();
		
		$updates = [];
		foreach($rs as $motorista)
			$updates['motoGeo/' . $motorista->uid] = null;


		if(count($updates) > 0)
			App\FirebaseClient::firebase()->getDatabase()->getReference()->update($updates);
		
		$this->info(count($updates) . ' derrubados');
				
		$this->info('done');
    }
}
