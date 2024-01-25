<?php
$countrySelectHTML = '';

try {
    $hostname = "localhost";
    $dbname = "VOTE";
    $username = "aws21";
    $password = "P@ssw0rd";

    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    // Consulta para obtener los países y sus prefijos
    $stmt = $pdo->prepare('SELECT paisnombre, paisprefijo FROM pais ORDER BY paisnombre ASC');
    $stmt->execute();

    $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Genera el HTML para el <select>
    $countrySelectHTML = '<div class="datosUsuarioRegister">' .
        '<label for="country">País</label><br>' .
        '<select class="inputRegisterPHP" id="country" name="country" required>';
    foreach ($countries as $country) {
        $countrySelectHTML .= '<option value="' . htmlspecialchars($country['paisnombre']) . '" data-prefix="' . htmlspecialchars($country['paisprefijo']) . '">' . htmlspecialchars($country['paisnombre']) . '</option>';
    }
    $countrySelectHTML .= '</select></div>';
} catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
}
?>

<script>
    var countrySelectHTML = '<?= $countrySelectHTML ?>';
</script>