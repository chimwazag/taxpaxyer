<?php
// Api Connect Script in a function//

function apiscript($ttype,$field,$urllink){
    require 'apiconfig.php';
    if($ttype=="POST"){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.mra.mw/sandbox/$urllink",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $field,
        CURLOPT_HTTPHEADER => array(
                'candidateid: '.$apiconfig["candidateid"],
                'password: '.$apiconfig["password"],
                'apikey: '.$apiconfig["apikey"],
                'Content-Type: '.$apiconfig["Content-Type"],
                'Authorization: '.$apiconfig["Authorization"],
                ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $json_resp = json_decode($response, true);
        
    }elseif($ttype=="GET"){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.mra.mw/sandbox/$urllink",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'candidateid: '.$apiconfig["candidateid"],
            'apikey: '.$apiconfig["apikey"],
            'Content-Type: '.$apiconfig["Content-Type"]
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $json_resp = json_decode($response, true);
        
     }
    return $json_resp;
}
?>
