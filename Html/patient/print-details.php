<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Check if 'id' parameter is set and numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM app_booking WHERE id='$id'");
    $user = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./view_pf.php');
    $html = ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('hospital.pdf', array('Attachment'=>false));
} else {
    echo "Invalid or missing ID parameter";
}

$con->close();
?>
