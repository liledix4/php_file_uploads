<?php
final class FileUploads {
    final static function checkFile(string $targetDir, string $postProperty) {
        if($_FILES && $_FILES[$postProperty]) {
            $targetFile = $targetDir . basename($_FILES[$postProperty]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            echo $imageFileType;
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES[$postProperty]['tmp_name']);
            if ($check !== false) {
                echo "File is an image - " . $check['mime'] . ".";
                return true;
            } else {
                // echo "File is not an image.";
                return false;
            }
        }
    }
}