<?php
require_once '../vendor/autoload.php';
use Intervention\Image\ImageManager;

error_reporting(E_ALL);
print_r($_FILES["imageFile"]);
@ini_set('display errors', 1); //funcion que permite cambiar la config de directivas de php.ini, en este caso de 'display errors'

// create object ImageManager
$managerImage = new ImageManager();

// instance object to manipulate
$imageObject = $managerImage->make($_FILES["imageFile"]["tmp_name"]);
$imageObject->save("../resources/inputImg/" . $_FILES["imageFile"]["name"]);

// if the file name exists
if (is_file("../resources/inputImg/" . $_FILES["imageFile"]["name"])) {
?>
    <HTML>
    <BODY>
        <table style="border: 1px;">
            <tr>
                <th>Original Image</th>
                <th>Modified Image after <?php echo $_POST["optionImage"] . " with grade " . $_POST["grade"]?></th>
            </tr>
            <tr>
                <td>
                    <img src="<?php echo "../resources/inputImg/" . $_FILES["imageFile"]["name"] ?>">
                </td>
            <?php
        }

        try{
            switch ($_POST["optionImage"]) {
                case "blur":
                    $image0bject->blur($_POST["grade"]);
                    break;
                case "bright":
                    $imageObject->brightness($_POST["grade"]);
                    $imageObject->contrast($_POST["grade"]);
                    break;
                case "fit":
                    $imageObject->fit($_POST["grade"]);
                    break;
                case "contrast":
                    $imageObject->contrast($_POST["grade"]);
                    break;
                case "pixelate":
                    $imageObject->pixelate($_POST["grade"]);
                    break;
                case "sharpen":
                    $imageObject->sharpen($_POST["grade"]);
                    break;                
            }
            
        } catch(Throwable $e){
            echo "error in bright option";
        }
        // save image modified in output folder
        $imageObject->save("../resources/outputImg/" . $_FILES["imageFile"]["name"],90);
        if (is_file("../resources/inputImg/" . $_FILES["imageFile"]["name"])) {
            ?>
                <td>
                    <img src="<?php echo "../resources/outputImg/" . $_FILES["imageFile"]["name"] ?>">
                </td>
            </tr>
        </table>

        <!-- Form metido dentro del body del HTML, antes estaba fuera -->
        <FORM method="POST" action="../public/index.php">
            <input type="submit" value="back to home">
        </FORM>
    </BODY>
    

    </HTML>
<?php

}
?>