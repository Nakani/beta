<?php
namespace App;

use Auth;
use LRedis;

class SocketIo
{
	public static function solicitar($to, $data)
	{
		return self::publish('solicitacaoCorrida', $data, $to);
	}

	public static function cancelarSolicitacao($to, $status = 0)
	{
		return self::publish('solicitacaoCorrida', ['status' => $status], $to);
	}

	public static function setCorrida($to, $data)
	{
		return self::publish('setCorrida', $data, $to);
	}

	public static function updateCorrida($to, $data)
	{
		return self::publish('updateCorrida', $data, $to);
	}

	public static function setCorridaMotorista($to, $data)
	{
		return self::publish('setCorridaMotorista', $data, $to);
	}

	public static function updateCorridaMotorista($to, $data)
	{
		return self::publish('updateCorridaMotorista', $data, $to);
	}

	public static function derrubarMotorista($uid)
	{
		return self::publish('authenticated', ['status' => 0], $uid);
	}

	protected static function publish($event, $payload, $to)
	{
		if(is_array($payload))
			$payload['to'] = $to;
		else
			$payload->to = $to;

		try {
			LRedis::connection()
					->publish($event, json_encode($payload));
		} catch(\Exception $e) {
			error_log($e->getMessage());
		}
		return true;
	}
}