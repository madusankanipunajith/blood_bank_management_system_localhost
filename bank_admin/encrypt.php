<?php
	//include 'session.php';

    function Encrypt($basic_value)
	{
		$simple_string= $basic_value;

            // Store the cipher method 
            $ciphering = "AES-128-CTR"; 
  
            // Use OpenSSl Encryption method 
            $iv_length = openssl_cipher_iv_length($ciphering); 
            $options = 0; 
  
            // Non-NULL Initialization Vector for encryption 
            $encryption_iv = '1234567891011121'; 
  
            // Store the encryption key 
            $encryption_key = "Yuthukamabloodbanksystem"; 
  
            // Use openssl_encrypt() function to encrypt the data 
            $encryption_purpose = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv); 

            return $encryption_purpose;
	}

	function Decrypt($encrypt_value)
	{
		$encryption = $encrypt_value;
        //decrypt mechanism
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $decryption_iv = '1234567891011121'; 
        $decryption_key = "Yuthukamabloodbanksystem";

        $purpose=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
        return $purpose;
	}
?>