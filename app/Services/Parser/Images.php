<?php
    
    namespace App\Services\Parser;
    
    class Images {
    
        public static function Download($URL, $SaveTo) {
            $Handle = curl_init($URL);
            curl_setopt($Handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($Handle, CURLOPT_HEADER, false);
            curl_setopt($Handle, CURLOPT_USERAGENT, 'WoWLegions (Manager Class Download Function)');
            curl_setopt($Handle, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($Handle, CURLOPT_SSL_VERIFYHOST, false);
            $Response = curl_exec($Handle);
            $HTTPCode = curl_getinfo($Handle, CURLINFO_HTTP_CODE);
            if($HTTPCode != 404) {
                $SaveFile = fopen($SaveTo, 'w');
                fwrite($SaveFile, $Response);
                fclose($SaveFile);
                curl_close($Handle);
                return true;
            }
            else
            {
                curl_close($Handle);
                return false;
            }
        }
        
        public static function Exists($File) {
            if (file_exists($File))
                return true;
            else
            {
                if(!file_exists(substr($File, 0, strrpos($File, '/'))))
                    mkdir(substr($File, 0, strrpos($File, '/')), 0777, true);
                return false;
            }
        }
        
    }