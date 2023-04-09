<?php
require_once "baseController.php";
require_once 'common.php';
class Banner extends BaseController {
  function __construct() { 
      parent::__construct();
    }

    public function saveBanner($PD) {
        $conn       = $this->db->getConnInstance();
        $comm      = new Common();
    
        $name = json_encode(array('en' => $PD['name'], 'dr' => $PD['name_dr'], 'ps' => $PD['name_ps'], 'uz' => $PD['name_uz']));
        $title = json_encode(array('en' => $PD['title'], 'dr' => $PD['title_dr'], 'ps' => $PD['title_ps'], 'uz' => $PD['title_uz']));
        $desc = json_encode(array('en' => $PD['desc'], 'dr' => $PD['desc_dr'], 'ps' => $PD['desc_ps'], 'uz' => $PD['desc_uz']));
        
        $link = $PD['link'];
        $order = $PD['order'];
        $site = $PD['site'];
        $status = 1;
        $createdDate = date('Y-m-d H:i:s');
        $createdBy = $_SESSION[MIS_NAME.'_user_id'];
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
          $path     = ADMIN_PATH . '/media/imgs/bnrs/';
          $uploaded = $comm->imageUpload($_FILES['image'], $path);
          if ($uploaded->status) {
            $imageName = $uploaded->data;
          } else {
            echo $uploaded->msg;
            return $uploaded;
          }
        }
        $query = "INSERT INTO banners (`name`, `title`, `description`, `link`, `featured_image`, `status`, `order`, `site`, `created_date`, `created_by`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssiissi", $name, $title, $desc, $link, $imageName, $status, $order, $site, $createdDate, $createdBy);
        $stmt->execute();
        $stmt->store_result();
          if(!$stmt->error) {
            $this->res->status = true;
            $this->res->msg = 'Banner successfully added';
          }
        return $this->res;
      }


public function viewBanners($lang) {
  $conn = $this->db->getConnInstance();
  $sql= "SELECT `banner_id`, `name`, `title`, `description`, `link`, `featured_image`, `status`, `order`, `site`, `created_date`, `created_by` FROM `banners` ";
  $stmt = $conn->prepare($sql);
  $stmt->bind_result($banner_id, $name, $title, $description, $link, $featured_image, $status, $order, $site, $created_date, $created_by);
  if ($stmt->execute()) {
    $incomeArr = array();
    while ($stmt->fetch()) {
      $x = new Banner();
      $x->banner_id = $banner_id;
      $x->name = json_decode($name)->{$lang};
      $x->title = json_decode($title)->{$lang};
      $x->description = json_decode($description)->{$lang};
      $x->link = $link;
      $x->featured_image = $featured_image;
      $x->status = $status;
      $x->order = $order;
      $x->site = $site;
      $x->created_date = $created_date;
      $x->created_by = $created_by;
      array_push($incomeArr, $x);
    }
    $this->res->status = true;
    $this->res->data['bnrs'] = $incomeArr;
  }
  $stmt->close();
  return $this->res;
}

public function getBannerById($id) {
  $conn = $this->db->getConnInstance();
  $sql= "SELECT `banner_id`, `name`, `title`, `description`, `link`, `featured_image`, `status`, `order`, `created_date`, `created_by` FROM `banners`
  WHERE `banner_id` = ? ";
  $stmt = $conn->prepare($sql);
  $id = base64_decode($id);
  $stmt->bind_param('i', $id);
  $stmt->bind_result($banner_id, $name, $title, $description, $link, $featured_image, $status, $order, $created_date, $created_by);
  if ($stmt->execute()) {
    while ($stmt->fetch()) {
      $x = new Banner();
      $x->banner_id = $banner_id;
      $x->name = $name;
      $x->title = $title;
      $x->description = $description;
      $x->link = $link;
      $x->featured_image = $featured_image;
      $x->status = $status;
      $x->order = $order;
      $x->created_date = $created_date;
      $x->created_by = $created_by;
    }
    $this->res->status = true;
    $this->res->obj = $x;
  }
  $stmt->close();
  return $this->res;
}

public function updateBanner($PD){
  $conn      = $this->db->getConnInstance();
  $comm      = new Common();
  $bid = base64_decode($_GET['bid']);
  $name = json_encode(array('en' => $PD['name'], 'dr' => $PD['name_dr'], 'ps' => $PD['name_ps'], 'uz' => $PD['name_uz']));
  $title = json_encode(array('en' => $PD['title'], 'dr' => $PD['title_dr'], 'ps' => $PD['title_ps'], 'uz' => $PD['title_uz']));
  $desc = json_encode(array('en' => $PD['desc'], 'dr' => $PD['desc_dr'], 'ps' => $PD['desc_ps'], 'uz' => $PD['desc_uz']));
        
        $link = $PD['link'];
        $order = $PD['order'];
        $old_image = $PD['old_image'];
        $status = 1;
        $createdDate = date('Y-m-d H:i:s');
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
          $path     = ADMIN_PATH . '/media/imgs/bnrs/';
          $uploaded = $comm->imageUpload($_FILES['image'], $path);
          if ($uploaded->status) {
            $imageName = $uploaded->data;
          } else {
            echo $uploaded->msg;
            return $uploaded;
          }
        }else{
          $imageName = $old_image;
        }
  $sql = "UPDATE `banners` SET `name`=?, `title`=?, `description`=?, `link`=?, `featured_image`=?, `status`=?, `order`=?, `modified_by`=? WHERE `banner_id`= ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sssssiisi', $name, $title, $desc, $link, $imageName, $status, $order, $created_date, $bid);

  if ($stmt->execute()) {
        unlink($path . $old_image);
        $this->res->status = true;
        $this->res->msg = "معامله حسابی موفقانه ثبت گردید";
        $this->res->type = "success";
    } else {
        $this->res->status = false;
        $this->res->msg = "اتصال با دیتابیس  موقتاً مسدود گردید";
        $this->res->type = "warning";
   }
  
   $stmt->close();
   return $this->res;
 }

public function getSiteAllBanners($site) {
  $conn = $this->db->getConnInstance();
  $sql= "SELECT `banner_id`, `name`, `title`, `description`, `link`, `featured_image`, `status`, `order`, `created_date`, `created_by` FROM `banners` WHERE `site` = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $site);
  $stmt->bind_result($banner_id, $name, $title, $description, $link, $featured_image, $status, $order, $created_date, $created_by);
  if ($stmt->execute()) {
    $incomeArr = array();
    while ($stmt->fetch()) {
      $x = new Banner();
      $x->banner_id = $banner_id;
      $x->name = $name;
      $x->title = $title;
      $x->description = $description;
      $x->link = $link;
      $x->featured_image = $featured_image;
      $x->status = $status;
      $x->order = $order;
      $x->created_date = $created_date;
      $x->created_by = $created_by;
      array_push($incomeArr, $x);
    }
    $this->res->status = true;
    $this->res->data['bnrs'] = $incomeArr;
  }
  $stmt->close();
  return $this->res;
}

public function deleteBanner($id, $p) {
  $conn = $this->db->getConnInstance();
  $sql= "DELETE FROM `banners` WHERE `banner_id` = ? ";
  $stmt = $conn->prepare($sql);
  $id = base64_decode($id);
  $stmt->bind_param('i', $id);
  if ($stmt->execute()) {
    $path     = ADMIN_PATH . '/media/imgs/bnrs/';
    unlink($path . $p);
      $this->res->status = true;
      $this->res->msg = 'Banner Deleted';
  }else{
      $this->res->status = failed;
      $this->res->msg = 'Delete Failed';
  }
  $stmt->close();
  return $this->res;
}

}
?>