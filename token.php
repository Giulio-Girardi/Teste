<?php

function Token($nome,$email){
    $key = "senha";
    $header = [
        'alg' => 'HS256',
        'typ' => 'JWT'    
    ];
    $header = json_encode($header);
    $header = base64_encode($header);
    
    $payload = [
        'iss' => 'localhost/Teste/',
        'user' => $nome,
        'sub' => $email
    ]; 
    $payload = json_encode($payload);
    $payload = base64_encode($payload);
    
    $signature = hash_hmac('sha256',"$header.$payload",$key,true);
    $signature = base64_encode($signature);
    
    $token = [
        0 => $header,
        1 => $payload,
        2 => $signature
    ];
    //echo $header,".",$payload,".",$signature;
    

    return $token[1];   
}
$name = $_POST["nome"];
$emai = $_POST["email"];

//var_dump('<pre>',$_POST);die();
//$varTeste = "eyJpc3MiOiJsb2NhbGhvc3RcL1Rlc3RlXC8iLCJ1c2VyIjoiR2l1bGlvIiwic3ViIjoiZGlsbGVAZ21haWwifQ==";

$signatureTeste = Token($name,$emai);
echo "<br>";
echo "Bem vindo, ", $name;
echo "<br>";

/*if($varTeste == $signatureTeste){
    echo "<br>";
    echo "Funcionou!";
    echo "<br>";
    echo $signatureTeste;
}else{
    echo "Não funcionou!";
}
*/

?>