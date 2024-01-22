<?php 
    $countrySelectHTML = '';

    try {
        $hostname = "localhost";
        $dbname = "VOTE";  
        $username = "root";
        $pw = "Kecuwa53";
        $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");





        // Consulta para obtener los países
        $stmt = $pdo->query('SELECT paisnombre FROM pais ORDER BY paisnombre ASC');

        $countries = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Genera el HTML para el <select>
        $countrySelectHTML = '<div class="datosUsuarioRegister">' .
            '<label for="country">País</label><br>' .
            '<select class="inputRegisterPHP" id="country" name="country" required>';
        foreach ($countries as $country) {
            $countrySelectHTML .= '<option value="' . htmlspecialchars($country) . '">' . htmlspecialchars($country) . '</option>';
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