<?php
function Img_Exists  ($target_file):bool {
    if (file_exists($target_file)) {
        return true;
    }else{return false;}
};
function Check_ImgSize():bool{
    if ($_FILES["Image"]["size"] > 500000) {
        return true;
    }else{
        return false;
    }
};
function Check_Filetype($imageFileType):bool{
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        return false;
    }else{
        return true;
    }
};
function ValidImg():bool{
    $File = getimagesize($_FILES["Image"]["tmp_name"]);
    if($File !== false) {
        return true;
    } else {
        return false;
    }
}
function Cinput(string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function CheckImg($imageFileType,$target_file):bool
{
    $uploadDir = dirname($target_file); // Get the directory part of the path
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Create directory with appropriate permissions
    }
    if (ValidImg() || Check_Filetype($imageFileType) || Check_ImgSize() || !Img_Exists($target_file)) {
        move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);
        return true;
    } else {
        return false;
    }
}
function MainHead(): void
{
    header("location: ../index.html");
}
