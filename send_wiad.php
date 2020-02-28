<?php
    $to = 'biuro@brandnewbrand.pl';
    $name = $_POST['name'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $wiad = $_POST['wiad'];





$headers = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=utf-8";
$headers[] = "From: {$email}";
$headers[] = "Reply-To: {$name}  <{$email}>";
$headers[] = "Subject: {Carbee kontakt}";
$headers[] = "X-Mailer: PHP/".phpversion();
    
 
mail($to, 'Formularz kontaktowy - Prawko Plus', format_mail($name, $nazwisko, $email, $wiad), implode("\r\n", $headers));

    header('Location: done.html');

    function format_mail($name, $nazwisko, $email, $wiad)
{
    return "
    <!DOCTYPE html>
    <html>
        <body style='width: 100%;'>
            <div style='width: 600px; margin: auto; background-color: rgb(252,248,227); padding: 20px; border-radius: 20px;'>
                <h3 style='text-align:center;'>Wiadomość ze strony Prawko Plus</h3>

                <p><b>Imię:</b> $name</p>
                <p><b>Nazwisko:</b> $nazwisko</p>
                <p><b>Adres e-mail:</b> $email</p>
                <p><b>Wiadomość:</b></p>
                <p>$wiad</p>
            </div>
        </body>
    </html>";
}

?> 
