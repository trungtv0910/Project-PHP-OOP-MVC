<?php

//namespace App\Traits;
trait TraitUpload
{
    public function storageTraitUpload($request = '', $fieldName = '', $foderName = '')
    {
        $random= rand(1, 20);
        $random_imageName= $random.'_'.basename($_FILES[$fieldName]["name"]);
        $dirRoot = str_replace('\\','/',_DIR_ROOT);
        $target_dir = $dirRoot."/public/assets/uploads/".$foderName."/";
        $target_file = $target_dir .$random_imageName ;
//        Customer tên file và tên path đường dẫn ảnh
        $path_image = "/public/assets/uploads/".$foderName."/". $random_imageName;
        $name_image = basename($_FILES[$fieldName]["name"]);

        $uploadOk = 1;

// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$fieldName]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check file size
        if ($_FILES[$fieldName]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            return  null;
        } else {
             if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $target_file)) {
                 $dataUploadTrait =[
                     'file_name'=>$name_image,
                     'file_path'=> $path_image
                 ];
                 return $dataUploadTrait;
            }
              return null;
        }
        return null;
    }

    public function storageTraitUploadMutiple($file, $foderName)
    {

    }

}