<?php
    $to = 'zlecenia@brandnewbrand.pl';
    $osk = $_POST['osk'];
    $name = $_POST['name'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['poczta'];
    $tel = $_POST['tel'];
    $kategoria = $_POST['kat'];
    




$headers = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=utf-8";
$headers[] = "From: {$email}";
$headers[] = "Reply-To: {$name}  <{$email}>";
$headers[] = "Subject: {Carbee kontakt}";
$headers[] = "X-Mailer: PHP/".phpversion();
    
 
mail($osk, 'Nowy kursant - Prawko Plus', format_mail($name, $nazwisko, $email, $tel, $kategoria, $osk), implode("\r\n", $headers));




mail($to, 'Nowy kursant - Prawko Plus', format_mail($name, $nazwisko, $email, $tel, $kategoria, $osk), implode("\r\n", $headers));
    header('Location: done.html');

    function format_mail($name, $nazwisko, $email, $tel, $kategoria, $osk)
{
    return "
    <!DOCTYPE html>
    <html>
        <body>
            <h3>Nowy kursant ze strony Prawko Plus</h3>

            <p>$name $nazwisko chcę zapisać się w Państwa ośrodku na kurs prawa jazdy w kategori $kategoria</p>
            <p>Poniżej znajdują się dane kontaktowe kursanta:</p>
            <p>Imię: $name</p>
            <p>Nazwisko: $nazwisko</p>
            <p>Adres e-mail: $email</p>
            <p>Numer telefonu: $tel</p>
        </body>
    </html>";
}

?> 
