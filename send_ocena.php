<?php
    $to = 'biuro@brandnewbrand.pl';
    $zaang_inst = $_POST['zaang_inst'];
    $efekt_szkolenia = $_POST['efekt_szkolenia'];
    $zaang_osk = $_POST['zaang_osk'];
    $prof_inst = $_POST['prof_inst'];
    $samochody = $_POST['samochody'];
    $email = "szymon.koziol@brandnewbrand.pl";
    $name = "Tomek";



$headers = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=utf-8";
$headers[] = "From: {$email}";
$headers[] = "Reply-To: {$name}  <{$email}>";
$headers[] = "Subject: {Carbee kontakt}";
$headers[] = "X-Mailer: PHP/".phpversion();
    
 
mail($to, 'Ocena Prawko Plus', format_mail($name, $zaang_inst, $efekt_szkolenia, $zaang_osk, $prof_inst, $samochody), implode("\r\n", $headers));
    header('Location: done.html');


    function format_mail($name, $zaang_inst, $efekt_szkolenia, $zaang_osk, $prof_inst, $samochody)
{
    return "
    <!DOCTYPE html>
    <html>
        <body>
            <h3>{$name} ocenił ośrodek Laydes</h3>

            <p>Zaangażowanie instruktora: $zaang_inst</p>
            <p>Efekt szkolenia: $efekt_szkolenia</p>
            <p>Zaangażowanie ośrodka: $zaang_osk</p>
            <p>Profesjonalizm instruktora: $prof_inst</p>
            <p>Stan samochodów szkoleniowych: $samochody</p>
        </body>
    </html>";
}

?> 
