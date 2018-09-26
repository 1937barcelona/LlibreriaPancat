<?php 
if(isset($_POST['submit']))
{
$Etiqueta = $_POST['Etiqueta'];
$Etiqueta2 = $_POST['Etiqueta2'];
$arxiu = fopen("PETIQ.txt", "a") or die("Dispensa, ha estat impossible obrir aquest arxiu.");
$eticpr = ": $Etiqueta: $Etiqueta2\n"; // Escriu les etiquetes al arxiu on es desen //
fputs($arxiu,$eticpr) or die("Dispensa pero no es possible escriure en aquest arxiu");
fclose($arxiu);
}  // Mostra un formulari amb dues caselles una per a un mot i l'altra per a la definicio o contingut. //
?>
<!doctype html>
<html>
<head language="ca_ES.utf8" content="text/html";charsert="ca_ES.UTF-8">
  <title>Introdueix etiquetes</title>
 </head>
<body>
<h2>Crear etiquetes</h2>
<p>Siusplau introduïu una etiqueta o concepte:</p>
<form action="#" method="POST">
<input type="text" name="Etiqueta" />
<p>Siusplau introduïu una petita explicació de l'etiqueta </p><textarea rows="3" cols="60" name="Etiqueta2"></textarea> <br> <input type="submit" name="submit" value="Guardar etiqueta"/>
</form>
<?php
// Obtenir el text o dades en array, una per línia, de les etiquetes. //
//Ignora les línies buides que pugui haver-hi al document. //
$línies = file('PETIQ.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// Mostra la llista de les entrades del document amb la numeració per línia. //
foreach ($línies as $num_línia => $línia) {
    echo "<b>{$num_línia}→</b>" . htmlspecialchars($línia) . "<br />\n";
}
?>
<?php
    <label for="Etiquetes">Etiquetes</label>
    <select id="Etiquetes" name="Etiquetes">
      foreach ($línies as $num_etiqueta => $meta_etiquetes) {
        echo "<option value = htmlspecialchars($meta_etiquetes)> . $meta_etiquetes</option>";
      } 
  ?>
    </select>
</body>
</html>
