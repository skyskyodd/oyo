<?php
echo color($color = "blue" , "Auto Create OYO Account\n\n");
ulang:
$users = nama();
$id = "kucing11";
$js = json_decode($users, true);
$fullname = $js['name']." ".$js['surname'];
$email = $js['name'].rand(10,99999)."@gmail.com";
no:
echo "[?] Input phone number : ";
$phone_number = trim(fgets(STDIN));
$get_otp = get_otp($phone_number);
if ($get_otp->is_user_present == 0){
  echo color($color = "blue" , "[!] Sending OTP...\n");
  sleep(2);
  echo "[?] Input OTP Code : ";
  $otp = trim(fgets(STDIN));
  echo "[?] Input refferal : ";
  $reff = trim(fgets(STDIN));
  $regis = register($phone_number, $fullname, $email, $otp, $reff);
  if(preg_match('/access_token/i', $regis)){
    echo color($color = "green" , "[+] Your registration was successfully!!\n\n");
    goto ulang;
  } else {
    echo color($color = "red" , "[x] Your registration failed!!\n");
    exit();
  }
} else {
  echo color($color = "red" , "[x] Phone number has been registered\n\n");
  goto no;
}

function get_otp($phone_number){
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.oyorooms.com/v2/users/generate_otp?phone='.$phone_number.'&nod=4&intent=login&sms_auto_retrieval=false&country_code=%2B62&version=20205&partner_app_version=20205&android_id='.randstr(16).'&idfa='.gen_uuid().'&sid='.randnumber(13).'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

  $headers = array();
  $headers[] = 'Content-Type: application/json';
  $headers[] = 'Authorization: Basic QmpDZlRxZWo2UkZ5M3pSeHZ5NW46bi13NHN0ZTV5V1I1aGpCUVVHOUM=';
  $headers[] = 'Access_token: QmpDZlRxZWo2UkZ5M3pSeHZ5NW46bi13NHN0ZTV5V1I1aGpCUVVHOUM=';
  $headers[] = 'Oyo_ab_config: 1551940467632|dea:1|mwhp:1|t3c:0|epba:0|rst2:1|phbb:0|wcta:1|wtea:1|cdr2:0|popl:0|bann:1|sbma:1|rae:1|gmfh:1|prep:1|fbtn:1|htab:1|hbna:1|absb:1|se1:0|sbmi:1|se3:0|se2:0|se5:6|se4:1|rtsa:0|se6:1|cour:0|gsra:1|rtsi:1|hdab:1|rba:0|cdr:0|ipw:0|rd:1|ipw2:0|pppp:0|lzpi:1|npfi:1|uprc:1|rbl:1|rsa:0|dww2:0|deal:1|pnpd:1|rcua:1|rsi:0|gsti:1|dwep:2|otp4:1|urha:1|ppa:2|ona:0|svh:1|stc2:1|urhi:1|ppi:2|gsta:0|gstc:0|nlab:1|asa:1|cr:1|rts:0|nlp:1|mjo:1|onab:0|asi:1|wtei:1|asei:1|bsba:2|aca:1|bea:1|wtib:2|hbri:0|lyr:0|aci:0|scta:0|tspk:1|hste:1|tspi:0|tspj:0|DWWS:1|a2hs:1|pfri:0|brch:4|test:1|raab:0|sink:0|aswp:1|shli:0|hrr:0|hrt:1|riab:1|hbad:0|hbi:0|rcui:1|idl:0|sbpa:0|stcl:0|sbpi:0|sinc:1|shla:0|brea:1|idum:1|lpta:1|lpti:1|ffab:1|his2:0|hbci:1|pst:1|stfi:0|pce:1|stft:2|omue:0|brei:1|hsei:0|sold:1|hbca:1|home:1|scti:0|otab:1|cvis:0|gsa:1|dwhp:0|gsi:1|rasl:0|locr:0|obai:1|dbad:1|nrca:1|epa:2|nrci:1|hlis:0|epi:0|epn:2|fbb:1|trab:1|rmo2:1|niab:0|lbht:0|weng:0|shpa:0|hppl:0|hsfa:1|sls:1|shpi:0|loc:0|phli:0|gpwa:0|nsl:1|prpa:1|saet:1|nhba:1|gpwi:0|nrfa:0|nbwa:0|prpi:1|hbi2:1|saea:1|mrc:1|blh:1|cpab:1|hpsa:0|vct:0|octt:1|phb:1|hpsi:0|cadd:1|nsfa:1|oban:1|spc2:1|smla:0|sfni:0|auto:1|uiab:1|pvis:0|wtab:3|shel:1|ndlp:0|hmpi:1|his:0|rmo:1|bdpi:1|pbra:1|sos:2|logn:1|rms:1|uaab:1|papg:1|bdpa:1|pbri:1|nob2:1|swar:1|aowt:1|spc:1|pioi:0|rms2:0|trCl:1|nhbi:0|lbh:1|nrfi:0|nbwi:1|paom:0|lsc:1|pdhi:0|tsb:0|lsc2:0|diei:1|dmme:1|diea:1|dte:1|acsi:1|nuom:0|adum:0|pdha:0|uhps:0|mwen:0|nobs:1|efa:1|hpwa:0|fbb2:1|sra:2|reca:1|BnTc:0|paab:1|mwep:2|ngst:1|hpwi:1|ltsc:1|reci:1|jbei:0|piab:1|aimg:1|avgp:0|ffib:1|mww2:1|ioab:0|hpfd:1|srz:1|socp:0|plwc:1';
  $headers[] = 'Segment_config: default';
  $headers[] = 'Accept-Language: en';
  $headers[] = 'User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; SM-N950N Build/NMF26X)';
  $headers[] = 'Host: api.oyorooms.com';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  $js = json_decode($result);
  return $js;
}

function register($phone_number, $fullname, $email, $otp, $reff){
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.oyorooms.com/v2/users/new_sign_up?additional_fields=ab_service_data&handset=samsung%2C%20SM-N950N&version=20205&partner_app_version=20205&android_id='.randstr(16).'&idfa='.gen_uuid().'&sid='.randnumber().'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '{"truecaller": false,"code": "'.$otp.'","country_code": "+62","device_id": "'.randstr(16).'","device_type": "android","email": "'.$email.'","id": 0,"idfa": "","name": "'.$fullname.'","phone": "'.$phone_number.'","push_type": "gcm","referral_code": "'.$reff.'","token": "c-PeIXwYYwg:APA91bHHQLHnS0FvSIOYJpN-hBJXYHxc1xQh8FrMZaQawBVPVyXxk77vTz7LWC4rtApBrZb3p4pOwJRD2JBMq0u3sChUgpasQFGcN_HNAGCscrcREwL-trFIBX3votCcFY1bn7eBmuCd","updated_at": 0}');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

  $headers = array();
  $headers[] = 'Access_token: QmpDZlRxZWo2UkZ5M3pSeHZ5NW46bi13NHN0ZTV5V1I1aGpCUVVHOUM=';
  $headers[] = 'Authorization: Basic QmpDZlRxZWo2UkZ5M3pSeHZ5NW46bi13NHN0ZTV5V1I1aGpCUVVHOUM=';
  $headers[] = 'Oyo_ab_config: 1551940467632|dea:1|mwhp:1|t3c:0|epba:0|rst2:1|phbb:0|wcta:1|wtea:1|cdr2:0|popl:0|bann:1|sbma:1|rae:1|gmfh:1|prep:1|fbtn:1|htab:1|hbna:1|absb:1|se1:0|sbmi:1|se3:0|se2:0|se5:6|se4:1|rtsa:0|se6:1|cour:0|gsra:1|rtsi:1|hdab:1|rba:0|cdr:0|ipw:0|rd:1|ipw2:0|pppp:0|lzpi:1|npfi:1|uprc:1|rbl:1|rsa:0|dww2:0|deal:1|pnpd:1|rcua:1|rsi:0|gsti:1|dwep:2|otp4:1|urha:1|ppa:2|ona:0|svh:1|stc2:1|urhi:1|ppi:2|gsta:0|gstc:0|nlab:1|asa:1|cr:1|rts:0|nlp:1|mjo:1|onab:0|asi:1|wtei:1|asei:1|bsba:2|aca:1|bea:1|wtib:2|hbri:0|lyr:0|aci:0|scta:0|tspk:1|hste:1|tspi:0|tspj:0|DWWS:1|a2hs:1|pfri:0|brch:4|test:1|raab:0|sink:0|aswp:1|shli:0|hrr:0|hrt:1|riab:1|hbad:0|hbi:0|rcui:1|idl:0|sbpa:0|stcl:0|sbpi:0|sinc:1|shla:0|brea:1|idum:1|lpta:1|lpti:1|ffab:1|his2:0|hbci:1|pst:1|stfi:0|pce:1|stft:2|omue:0|brei:1|hsei:0|sold:1|hbca:1|home:1|scti:0|otab:1|cvis:0|gsa:1|dwhp:0|gsi:1|rasl:0|locr:0|obai:1|dbad:1|nrca:1|epa:2|nrci:1|hlis:0|epi:0|epn:2|fbb:1|trab:1|rmo2:1|niab:0|lbht:0|weng:0|shpa:0|hppl:0|hsfa:1|sls:1|shpi:0|loc:0|phli:0|gpwa:0|nsl:1|prpa:1|saet:1|nhba:1|gpwi:0|nrfa:0|nbwa:0|prpi:1|hbi2:1|saea:1|mrc:1|blh:1|cpab:1|hpsa:0|vct:0|octt:1|phb:1|hpsi:0|cadd:1|nsfa:1|oban:1|spc2:1|smla:0|sfni:0|auto:1|uiab:1|pvis:0|wtab:3|shel:1|ndlp:0|hmpi:1|his:0|rmo:1|bdpi:1|pbra:1|sos:2|logn:1|rms:1|uaab:1|papg:1|bdpa:1|pbri:1|nob2:1|swar:1|aowt:1|spc:1|pioi:0|rms2:0|trCl:1|nhbi:0|lbh:1|nrfi:0|nbwi:1|paom:0|lsc:1|pdhi:0|tsb:0|lsc2:0|diei:1|dmme:1|diea:1|dte:1|acsi:1|nuom:0|adum:0|pdha:0|uhps:0|mwen:0|nobs:1|efa:1|hpwa:0|fbb2:1|sra:2|reca:1|BnTc:0|paab:1|mwep:2|ngst:1|hpwi:1|ltsc:1|reci:1|jbei:0|piab:1|aimg:1|avgp:0|ffib:1|mww2:1|ioab:0|hpfd:1|srz:1|socp:0|plwc:1';
  $headers[] = 'Accept-Language: en';
  $headers[] = 'Content-Type: application/json; charset=utf-8';
  $headers[] = 'User-Agent: Dalvik/2.1.0 (Linux; U; Android 8.1.0; SM-N950N Build/NMF26X)';
  $headers[] = 'Host: api.oyorooms.com';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  return $result;
}

function nama(){
  $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://uinames.com/api/?ext&region=indonesia");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $result = curl_exec($ch);
  return $result;
}

function color($color = "default" , $text) {
  $arrayColor = array(
    'grey' 		=> '1;30',
    'red' 		=> '1;31',
    'green' 	=> '1;32',
    'yellow' 	=> '1;33',
    'blue' 		=> '1;34',
    'purple' 	=> '1;35',
    'nevy' 		=> '1;36',
    'white' 	=> '1;0',
  );
  return "\033[".$arrayColor[$color]."m".$text."\033[0m";
}

function randstr($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function randnumber($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomNumber = '';
    for ($i = 0; $i < $length; $i++) {
        $randomNumber .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomNumber;
}

function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
?>
