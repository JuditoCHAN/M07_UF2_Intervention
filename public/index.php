<!DOCTYPE html>
<html>
<head>
</head>
<BODY>
    <FORM method="POST" action="../src/Intervention.php" enctype="multipart/form-data">
        <br><h1>Upload image</h1><br><input type="file" name="imageFile">
        <br><h1>Start image editing</h1><br>
        <h3>Choose modification</h3>
        <select name="optionImage">
            <option value="blur" selected>Blur</option>
            <option value="bright" selected>Bright</option>
            <option value="fit">Fit</option>
            <option value="sharpem">Sharpen</option>
        </select>
        <br>
        <h3>Choose grade</h3>
        <select name="grade">
            <option value="20">20</option>
            <option value="40">40</option>
            <option value="60">60</option>
            <option value="80">80</option>
            <option value="100">100</option>
        </select>
        <br>
        <input type="submit" value="save">
    </FORM>
</BODY>
</html>
