<?php
$targetDir = "files/";
$maxFileSize = 5 * 1024 * 1024; // 5 Mo
$allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
$errors = [];

if (!is_dir($targetDir)) mkdir($targetDir, 0777, true); // Créer le dossier si inexistant

foreach ($_FILES['files']['name'] as $key => $name) {
    if ($_FILES['files']['error'][$key] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['files']['tmp_name'][$key];
        $fileSize = $_FILES['files']['size'][$key];
        $fileType = mime_content_type($tmpName);
        $fileExtension = pathinfo($name, PATHINFO_EXTENSION);
        $fileHashName = md5(uniqid()) . '.' . $fileExtension;

        if ($fileSize > $maxFileSize) {
            $errors[] = "$name dépasse 5 Mo.";
        } elseif (!in_array($fileType, $allowedTypes)) {
            $errors[] = "$name a un type non autorisé.";
        } else {
            if (move_uploaded_file($tmpName, $targetDir . $fileHashName)) {
                echo "$name uploadé avec succès.<br>";
            } else {
                $errors[] = "Erreur d'upload pour $name.";
            }
        }
    } else {
        $errors[] = "$name n'a pas pu être uploadé.";
    }
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}

header("Location: index.php");
exit;
?>
