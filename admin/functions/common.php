<?php
require_once 'BaseControler.php';
class Common extends BaseControler {
  function __construct() { 
    parent::__construct();
 }

  function imageUpload($file, $path)
{
    $type    = pathinfo($file['name']);
    $tmpName = $file['tmp_name'];
    $size    = $file['size'];
    $imgName = '';
    $result  = new stdClass();
    
    

    if (strtolower($type['extension']) == 'jpg' || strtolower($type['extension']) == 'png' || strtolower($type['extension']) == 'jpeg' || strtolower($type['extension']) == 'pdf' || strtolower($type['extension']) == 'docx'|| strtolower($type['extension']) == 'doc') {
        if ($size < 20097152) {
          if (!file_exists($path)) {
           // echo 'create';
            mkdir($path, 0755, true);
          }
            $imgName = uniqid() . '.' . $type['extension'];
            if (move_uploaded_file($tmpName, $path . $imgName)) {
                $result->msg    = 'Upload successful';
                $result->status = true;
                $result->data   = $imgName;
                $result->url   = $path.'/'.$imgName;
            }
        } else {
			      $result->msg    = 'File size is too big, it should be less than 2MB';
            $result->status = false;
        }
    } else {
        $result->status = false;
        $result->msg    = 'File Type is not valid';
    }
    
    
    return $result;
}
}
?>