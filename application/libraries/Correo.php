<?php

class Correo {

	public function enviarEmailSuspension($email){
		$url = 'https://api.elasticemail.com/v2/email/send';

		try{
		        $post = array('from' => 'ricardojavier8058@gmail.com',
				'fromName' => 'Suspension',
				'apikey' => '5E383BB627A68B3B3E716E7721F07C17910B9DB3F0FB939215BC250F240A5E44936246B788C90A241D0AB96545D41E8A',
				'subject' => 'Suspension account',
				'to' => $email,
				'template' => 'suspension',
				'isTransactional' => false);
				
				$ch = curl_init();
				curl_setopt_array($ch, array(
		            CURLOPT_URL => $url,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $post,
		            CURLOPT_RETURNTRANSFER => true,
		            CURLOPT_HEADER => false,
					CURLOPT_SSL_VERIFYPEER => false
		        ));
				
		        $result=curl_exec($ch);
		        curl_close($ch);
				
		        return 1;
		}
		catch(Exception $ex){
			//echo $ex->getMessage();
			return 0;
		}
	}
}