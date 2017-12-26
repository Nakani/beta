<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App;
use App\Corrida;
use App\Pagamento;
use DB;
use Carbon\Carbon;

class SendEmailRecibo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:recibo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia o recibo da corrida para o motorista e passageiro';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

	private static $testEmails = ['taffarel@gmail.com','bebeto@gmail.com','rivaldo@gmail.com','romario@gmail.com','ronaldo@gmail.com','rivaldosilveira@gmail.com','cafu@gmail.com','messi@gmail.com'];
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $corridas = Corrida::getFinalizadasParaEnviarRecibo();
		foreach($corridas as $corrida)
		{
			$corrida->date_inicio 	= (new Carbon($corrida->dt_inicio))->format("d/m/Y");
			$corrida->hora_inicio 	= (new Carbon($corrida->dt_inicio))->format("H:i");

			$corrida->meio_pagamento	= App\Pagamento::getLabel($corrida->tipo_pagamento);
			$corrida->comissao			= number_format($corrida->comissao_motorista, 2, ',', '.');
			$corrida->valor_total		= number_format($corrida->valor_realizado, 2, ',', '.');
			
			$corrida->maps_img_link = $this->getLinkTrajeto($corrida);
			unset($corrida->dt_inicio);
			unset($corrida->tipo_pagamento);
			unset($corrida->valor_realizado);
			unset($corrida->trajeto);
			unset($corrida->lat_partida);
			unset($corrida->lng_partida);
			unset($corrida->lat_final);
			unset($corrida->lng_final);

			$sent = 0;
			
			if(!in_array($corrida->email_motorista, self::$testEmails))
			{
				try {
					$mail = App\GarupaMail::send('recibo-motorista', $corrida, $corrida->email_motorista);
				} catch(\Exception $e) {
					$this->error($e);
				}
				if($mail['total_accepted_recipients'] > 0)
				{
					$this->info('motorista:sent');
					$sent++;
				} else
					$this->error('motorista:not sent > '. $corrida->email_motorista .'>' . $mail['error']);
			}
			
			$mail = null;
			
			if(!in_array($corrida->email_passageiro, self::$testEmails))
			{
				try {
					$mail = App\GarupaMail::send('recibo-passageiro', $corrida, $corrida->email_passageiro);
				} catch(\Exception $e) {
					$this->error($e);
				}
				if($mail['total_accepted_recipients'] > 0)
				{
					$this->info('passageiro:sent');
					$sent++;
				} else
					$this->error('passageiro:not sent > '. $corrida->email_passageiro .' > '. $mail['error']);
			}
			
			if($sent > 0)
				Corrida::where('uid', $corrida->uid)->update(['recibo_enviado' => 1]);

		}
		$this->info('done');
    }
	
	private function getLinkTrajeto($corrida)
	{
		return 'http://www.garupa.me/trajeto-corrida/' . $corrida->uid;
	}
}
