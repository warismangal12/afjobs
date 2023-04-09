<?php
require 'BaseControler.php';
require_once 'common.php';

class Functions extends BaseControler
{
    function __construct()
    {
        parent::__construct();
    }

	public function showId()
	{
		$conn = $this->db->getconn();
		$sql = 'SELECT  MAX(id)  FROM clients_reg';
		$stmt = $conn->prepare($sql);
		$stmt->bind_result($id);
		
		if($stmt->execute()){
			$showAllclientsarray = array();
			while($stmt->fetch()){
				$u = new Functions();
				$u->id = $id + 1;
				
				
				array_push($showAllclientsarray, $u);

			}
			$this->res->status = true;
			$this->res->msg = 'client fetched';
			$this->res->data['all'] = $showAllclientsarray;

		}
		$stmt->close();
		return $this->res;

	}







		public function jobpostings($post){
			
			$conn = $this->db->getconn();
			$comm = new Common();


			$jobtitle = $post['jobtitle'];
			$location = $post['location'];
			
			$created_date = date( 'Y-m-d H:i:s' );
			//$updated_date = date( 'Y-m-d H:i:s' );

			 $sql = "INSERT INTO vac_post(vname, v_desc, created_date) VALUES (?,?,?)";
		
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('sss', $jobtitle, $location,$created_date);
		//  var_dump($stmt->execute());
		//  die;

		if ( $stmt->execute() ) {
                $this->res->status = true;
                $this->res->msg = 'Job Created successfully.';
				

            } 
            else {
                $this->res->status = false;
                $this->res->msg = 'Operation failed.';
            }
        
        
        $stmt->close();
        return $this->res;
    

		}



		public function showAllClients()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT id, codeNumber, name,nickName, fathername,education, educationField, duration, phone, status FROM clients_reg WHERE status = 1';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($id, $codeNumber, $nickName, $name, $fathername, $education, $educationField, $duration, $phone, $status);
		
			if($stmt->execute()){
				$showAllclientsarray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->id = $id;
					$u->codeNumber = $codeNumber;
					$u->name = $name;
					$u->nickName = $nickName;
					$u->fathername = $fathername;
					$u->education = $education;
					$u->educationField = $educationField;
					$u->duration = $duration;
					$u->phone = $phone;
					$u->status = $status;
					
					array_push($showAllclientsarray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllclientsarray;
	
			}
			$stmt->close();
			return $this->res;

		}

		

		public function showFilterClients($post)
		{
			$conn = $this->db->getconn();
			$education = $post['education'];
			$educationField = $post['educationField'];
			$expermentDuration = $post['expermentDuration'];
			$sql = "SELECT id, codeNumber, name,nickName, fathername,education, educationField, duration, phone, status FROM clients_reg WHERE education =? AND educationField =? AND duration =?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('sss', $education,$educationField,$expermentDuration);
			$stmt->bind_result($id, $codeNumber, $name, $nickName, $fathername, $education, $educationField, $duration, $phone, $status);
			if($stmt->execute()){
				$showAllclientsarray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->id = $id;
					$u->codeNumber = $codeNumber;
					$u->name = $name;
					$u->nickName = $nickName;
					$u->fathername = $fathername;
					$u->education = $education;
					$u->educationField = $educationField;
					$u->duration = $duration;
					$u->phone = $phone;
					$u->status = $status;
					
					array_push($showAllclientsarray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllclientsarray;
	
			}
			$stmt->close();
			return $this->res;

		}



		public function showVacantClients()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT id, codeNumber, name, nickName, fathername,education, educationField, duration, phone, status FROM clients_reg WHERE status = 0';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($id, $codeNumber, $name, $nickName, $fathername, $education, $educationField, $duration, $phone, $status);
			
			if($stmt->execute()){
				$showAllclientsarray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->id = $id;
					$u->codeNumber = $codeNumber;
					$u->name = $name;
					$u->nickName = $nickName;
					$u->fathername = $fathername;
					$u->education = $education;
					$u->educationField = $educationField;
					$u->duration = $duration;
					$u->phone = $phone;
					$u->status = $status;
					
					array_push($showAllclientsarray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllclientsarray;
	
			}
			$stmt->close();
			return $this->res;

		}
		
		public function showEstekhdamClients()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT id, codeNumber, name, nickName, fathername,education, educationField, duration, phone, status FROM clients_reg WHERE status = 2';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($id, $codeNumber, $name, $nickName, $fathername, $education, $educationField, $duration, $phone, $status);
			
			if($stmt->execute()){
				$showAllclientsarray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->id = $id;
					$u->codeNumber = $codeNumber;
					$u->name = $name;
					$u->nickName = $nickName;
					$u->fathername = $fathername;
					$u->education = $education;
					$u->educationField = $educationField;
					$u->duration = $duration;
					$u->phone = $phone;
					$u->status = $status;
					
					array_push($showAllclientsarray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllclientsarray;
	
			}
			$stmt->close();
			return $this->res;

		}
		




		public function getSingleClientById($id)
    {

        $conn = $this->db->getconn();
        $sql = 'SELECT id, codeNumber, name, nickName, fathername, gender, id_number, sabt_number, juld_number, page_number, primary_address, pr_dist,
		 pr_village, present_address, pre_dist, pre_village, education, educationField, phone, email, company2, position2, duration2, start_date2, end_date2,
		 leave_reason2, company, position, duration, start_date, end_date,
		 leave_reason, full_name, fname, idcard, present_add, present_dist, vilage, number, reference, cvpath,imgpath, created_date FROM clients_reg  WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->bind_result($id, $codeNumber, $clientName, $nickName, $clFatherName, $clGender, $clNid, $sabtNumber, $juldNumber, $pageNumber, $clPrimaryAddress,
		 $clPrimaryDistrict, $clPrimaryVillage, $clPresentAddress, $clPresentDistrict, $clPresentVillage, $clEducation, $educationField, $clPhone, $clEmail,
		 $orgName2, $position2, $duration2, $startDate2, $endDate2, $rForLeave2, $clExCompany, $clExposition, $clExJobDuration, $startDate, $endDate, $exJobLeaveReason, $relativeName, $relativeFathername, $relNid,
	$relPresentAddress, $relPresentDistrict, $relVillage, $relativePhone, $relationWithClient,$cv_path, $imageName, $created_date);
        if ($stmt->execute()) {
            $showByClientId = array();
            while ($stmt->fetch()) {
                $u = new Functions();
                $u->id = $id;
				$u->codeNumber = $codeNumber;
                $u->clientName = $clientName;
                $u->nickName = $nickName;
                $u->clFatherName = $clFatherName;
                $u->clGender = $clGender;
                $u->clNid = $clNid;
                $u->sabtNumber = $sabtNumber;
                $u->juldNumber = $juldNumber;
                $u->pageNumber = $pageNumber;
                $u->clPrimaryAddress = $clPrimaryAddress;
                $u->clPrimaryDistrict = $clPrimaryDistrict;
				$u->clPrimaryVillage = $clPrimaryVillage;
                $u->clPresentAddress = $clPresentAddress;
                $u->clPresentDistrict = $clPresentDistrict;
				$u->clPresentVillage = $clPresentVillage;
                $u->clEducation = $clEducation;
                $u->educationField = $educationField;
                $u->clPhone = $clPhone;
				$u->clEmail = $clEmail;
                $u->clExCompany = $clExCompany;
                $u->clExposition = $clExposition;
				$u->clExJobDuration = $clExJobDuration;
                $u->startDate = $startDate;
                $u->endDate = $endDate;
				$u->exJobLeaveReason = $exJobLeaveReason;
				$u->orgName2 = $orgName2;
                $u->position2 = $position2;
                $u->startDate2 = $startDate2;
                $u->endDate2 = $endDate2;
				$u->duration2 = $duration2;
				$u->rForLeave2 = $rForLeave2;
                $u->relativeName = $relativeName;
                $u->relativeFathername = $relativeFathername;
				$u->relNid = $relNid;
                $u->relPresentAddress = $relPresentAddress;
                $u->relPresentDistrict = $relPresentDistrict;
				$u->relVillage = $relVillage;
                $u->relativePhone = $relativePhone;
                $u->relationWithClient = $relationWithClient;
                $u->cv_path = $cv_path;
                $u->imageName = $imageName;
				$u->created_date = $created_date;
                array_push($showByClientId, $u);
            }
            $this->res->status = true;
            $this->res->msg = 'Client ID fetched';
            $this->res->data['all'] = $showByClientId;

        }
        $stmt->close();
        return $this->res;


    }


	public function editClient($post) {

		$conn = $this->db->getconn();
		$codeNumber = $post['codeNumber'];
		$clientName = $post['clientName'];
		$nickName = $post['nickName'];
		$clFathername = $post['clFathername'];
		$gender = $post['gender'];
		$nidNo = $post['nidNo'];
		$nidRegNo = $post['nidRegNo'];
		$nidJoldNo = $post['nidJoldNo'];
		$nidPageNo = $post['nidPageNo'];
		$primaryAddress = $post['primaryAddress'];
		$primaryDistrict = $post['primaryDistrict'];
		$primVillage = $post['primVillage'];
		$presentAddress = $post['presentAddress'];
		$presentDistrict = $post['presentDistrict'];
		$preVillage = $post['preVillage'];
		$education = $post['education'];
		$educationField = $post['educationField'];
		$phone = $post['phone'];
		$email = $post['email'];
		$orgName = $post['orgName'];
		$position = $post['position'];
		$duration= $post['duration'];
		$startDate = $post['startDate'];
		$endDate = $post['endDate'];
		$rForLeave = $post['rForLeave'];
		$orgName2 = $post['orgName2'];
		$position2 = $post['position2'];
		$startDate2 = $post['startDate2'];
		$endDate2 = $post['endDate2'];
		$duration2= $post['duration2'];
		$rForLeave2 = $post['rForLeave2'];
		$relativeFullname = $post['relativeFullname'];
		$relFathername = $post['relFathername'];
		$relNidNo = $post['relNidNo'];
		$relPresentAddress = $post['relPresentAddress'];
		$relPresentDistrict = $post['relPresentDistrict'];
		$relVillage = $post['relVillage'];
		$relPhone = $post['relPhone'];
		$relation = $post['relation'];
		$old_file_cv = $post['old_file_cv'];
		$old_image_file = $post['old_image_file'];
		//$created_date = date( 'Y-m-d H:i:s' );
		$updated_date = date( 'Y-m-d H:i:s' );
	   $id = $_GET['id'];
	   $comm      = new Common();
	   $newFile = $_FILES['file_cv']['name'];
	   if($newFile != ""){
	   if (isset($_FILES['file_cv']['name']) && $_FILES['file_cv']['name'] != '') {
		   $path     = 'upload/';
		   $uploaded = $comm->imageUpload($_FILES['file_cv'], $path);
		   if ($uploaded->status) {
			   unlink("upload/".$old_file_cv);
		   $fileName = $uploaded->data;
		   }
			else {
			 $uploaded->msg;
			 return $uploaded;
		   }
	   }
   }
   else{
	$fileName = $old_file_cv;
   }

   $newFile2 = $_FILES['image_file']['name'];
   if($newFile2 != ""){
   if (isset($_FILES['image_file']['name']) && $_FILES['image_file']['name'] != '') {
	   $path     = 'upload/';
	   $uploaded2 = $comm->imageUpload($_FILES['image_file'], $path);
	   if ($uploaded2->status) {
		   unlink("upload/".$old_image_file);
	   $fileName2 = $uploaded2->data;
	   }
		else {
		 $uploaded2->msg;
		 return $uploaded2;
	   }
   }
}
else{
$fileName2 = $old_image_file;
}
	
	$sql1 = 'UPDATE clients_reg SET name = ?, nickName =?, fathername = ?, gender = ?, id_number = ?, sabt_number = ?, juld_number = ?, page_number = ?,
	 primary_address = ?, pr_dist = ?, pr_village = ?, present_address = ?, pre_dist = ?, pre_village = ?, education = ?, educationField =?, phone = ?, email = ?,
	 company2 =?, position2 =?, duration2=?, start_date2=?, end_date2=?, leave_reason2 =?, company = ?, position = ?, duration = ?, start_date = ?, end_date = ?, leave_reason = ?, full_name = ?, fname = ?, idcard = ?, present_add = ?,
			 present_dist = ?, vilage = ?, number = ?, reference = ?,cvpath =?, imgpath =?, updated_date = ? WHERE id = ?';
		   $stmt = $conn->prepare( $sql1 );
		   $stmt->bind_param( 'ssssiiiissssssssisssisssssisssssisssissssi', $clientName,$nickName, $clFathername, $gender, $nidNo, $nidRegNo,
		   $nidJoldNo, $nidPageNo, $primaryAddress, $primaryDistrict, $primVillage, $presentAddress, $presentDistrict, $preVillage, 
			$education, $educationField, $phone, $email,$orgName2,$position2,$duration2,$startDate2,$endDate2,$rForLeave2, $orgName, $position, $duration, $startDate, $endDate, $rForLeave, $relativeFullname,
	   $relFathername, $relNidNo, $relPresentAddress, $relPresentDistrict, $relVillage, $relPhone, $relation, $fileName, $fileName2, $updated_date,$id);
		 //  var_dump($stmt->execute() );
		  // die;
		   if ( $stmt->execute() ) {

			   $this->res->status = true;
			   $this->res->msg = 'User Updated successfully.';

		   } else {
			   $this->res->status = false;
			   $this->res->msg = 'Operation failed.';
		   }

	   $stmt->close();
	   return $this->res;
   }

   

   public function interducedClients ($post ) {

	$conn = $this->db->getconn();
	//$is_active = 1;
	$id = $post['active'];



	if (isset($_POST['active'])) {
		$sql1 = 'UPDATE clients_reg SET status = 1 WHERE id = ?';
		$stmt = $conn->prepare($sql1);
	   $stmt->bind_param('i', $id);
	 //  echo var_dump($stmt);
		if ($stmt->execute()) {


			$this->res->status = true;
			$this->res->msg = 'User approved successfully.';

		}
	}
	else {
		$this->res->status = false;
		$this->res->msg = 'Opera failed.';
	}

	$stmt->close();
	return $this->res;
}



public function addTolistAgain ($post ) {

	$conn = $this->db->getconn();
	//$is_active = 1;
	$id = $post['active'];



	if (isset($_POST['active'])) {
		$sql1 = 'UPDATE clients_reg SET status = 1 WHERE id = ?';
		$stmt = $conn->prepare($sql1);
	   $stmt->bind_param('i', $id);
	 //  echo var_dump($stmt);
		if ($stmt->execute()) {


			$this->res->status = true;
			$this->res->msg = 'User approved successfully.';

		}
	}
	else {
		$this->res->status = false;
		$this->res->msg = 'Opera failed.';
	}

	$stmt->close();
	return $this->res;
}





public function PendingClients ($post ) {

	$conn = $this->db->getconn();
	$is_active = 0;
	$id = $post['deactive'];



	if (isset($_POST['deactive'])) {
		$sql1 = 'UPDATE clients_reg SET status = 0 WHERE id = ?';
		$stmt = $conn->prepare($sql1);
	   $stmt->bind_param('i', $id);
	 //  echo var_dump($stmt);
		if ($stmt->execute()) {


			$this->res->status = true;
			$this->res->msg = 'User approved successfully.';

		}
	}
	else {
		$this->res->status = false;
		$this->res->msg = 'Opera failed.';
	}

	$stmt->close();
	return $this->res;
}


public function filterClients($post)
{
	$conn = $this->db->getconn();
	$education = $post['education'];
	$educationField = $post['educationField'];
	$to_dexperienceDateate = $post['experienceDate'];

	$sql = 'SELECT id, codeNumber, name, fathername,education, educationField, duration, phone, status FROM clients_reg  WHERE date BETWEEN ? AND ?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ssi', $education,$educationField,$dexperienceDateate);
	$stmt->bind_result($income_id,$category_id, $catName, $amount, $description, $IncomeDate,$created_date);
	//var_dump($stmt->execute());

	if($stmt->execute()){
		$showAllCompanyArray = array();
		while($stmt->fetch()){
			$u = new Functions();
			$u->income_id = $income_id;
			$u->category_id = $category_id;
			$u->catName = $catName;
			$u->amount = $amount;
			$u->description = $description;
			$u->IncomeDate = $IncomeDate;
			$u->created_date = $created_date;
			array_push($showAllCompanyArray, $u);

		}
		$this->res->status = true;
		$this->res->msg = 'client fetched';
		$this->res->data['all'] = $showAllCompanyArray;

	}
	$stmt->close();
	return $this->res;

}






	

		public function registerOrganization($post){
			
			$conn = $this->db->getconn();
			$orgName = $post['orgName'];
			$orgAddress = $post['orgAddress'];
			$date = $post['date'];
			$orgContractorName = $post['orgContractorName'];
			$emailAddress = $post['email'];
			$phoneNumber = $post['orgContractorPhone'];

			
            $created_date = date( 'Y-m-d H:i:s' );
            $updated_date = date( 'Y-m-d H:i:s' );
			

			$sql = 'INSERT INTO orgregister(orgName, orgAdress, register_date, contractorName, email, phone, created_date,updated_date) VALUES (?,?,?,?,?,?,?,?)';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('sssssiss', $orgName, $orgAddress, $date, $orgContractorName, $emailAddress, $phoneNumber, $created_date,$updated_date);
			if ( $stmt->execute() ) {
                $this->res->status = true;
                $this->res->msg = 'clients Created successfully.';

            } 
            else {
                $this->res->status = false;
                $this->res->msg = 'Operation failed.';
            }
        
        
        $stmt->close();
        return $this->res;
    

		}





		public function showAllCompanyIndex()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT org_id, orgName, orgAdress, register_date, contractorName, email, phone, created_date,updated_date FROM orgregister ORDER BY updated_date limit 7';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($orgId, $orgName, $orgAddress, $registerDate, $contractorName, $email, $phone, $created_date,$updated_date);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->orgId = $orgId;
					$u->orgName = $orgName;
					$u->orgAddress = $orgAddress;
					$u->registerDate = $registerDate;
					$u->contractorName = $contractorName;
					$u->email = $email;
					$u->phone = $phone;
					
					$u->created_date = $created_date;
					$u->updated_date = $updated_date;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}

		public function showAllActiveCompany()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT org_id, orgName, orgAdress, register_date, contractorName, email, phone, status, created_date FROM orgregister WHERE status = 1';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($orgId, $orgName, $orgAddress, $registerDate, $contractorName, $email, $phone, $status, $created_date);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->orgId = $orgId;
					$u->orgName = $orgName;
					$u->orgAddress = $orgAddress;
					$u->registerDate = $registerDate;
					$u->contractorName = $contractorName;
					$u->email = $email;
					$u->phone = $phone;
					$u->status = $status;

					$u->created_date = $created_date;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}


		public function showAllActiveAndDeactiveCompany()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT org_id, orgName, orgAdress, register_date, contractorName, email, phone, status, created_date, updated_date FROM orgregister WHERE status = 1 or status =0 ORDER BY updated_date ASC ';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($orgId, $orgName, $orgAddress, $registerDate, $contractorName, $email, $phone, $status, $created_date,$updated_date);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->orgId = $orgId;
					$u->orgName = $orgName;
					$u->orgAddress = $orgAddress;
					$u->registerDate = $registerDate;
					$u->contractorName = $contractorName;
					$u->email = $email;
					$u->phone = $phone;
					$u->status = $status;

					$u->created_date = $created_date;
					$u->updated_date = $updated_date;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}


		

		public function showAllCompany2()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT org_id, orgName, orgAdress, register_date, contractorName, email, phone, status, created_date FROM orgregister WHERE status = 1 AND org_id IN(SELECT org_id FROM `vacancie_reg` WHERE `status`=1)';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($orgId, $orgName, $orgAddress, $registerDate, $contractorName, $email, $phone, $satus, $created_date);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->orgId = $orgId;
					$u->orgName = $orgName;
					$u->orgAddress = $orgAddress;
					$u->registerDate = $registerDate;
					$u->contractorName = $contractorName;
					$u->email = $email;
					$u->phone = $phone;
					
					$u->created_date = $created_date;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}






		
		public function getSingleCompanyById($orgId)
    {

        $conn = $this->db->getconn();
        $sql = 'SELECT org_id, orgName, orgAdress, register_date, contractorName, email, phone, created_date FROM orgregister  WHERE org_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $orgId);
        $stmt->bind_result($orgId, $orgName, $orgAddress, $orgRegisterDate, $contractorName, $email, $phone, $created_date);
        if ($stmt->execute()) {
            $showByCompanyId = array();
            while ($stmt->fetch()) {
                $u = new Functions();
                $u->orgId = $orgId;
                $u->orgName = $orgName;
                $u->orgAddress = $orgAddress;
                $u->orgRegisterDate = $orgRegisterDate;
                $u->contractorName = $contractorName;
                $u->email = $email;
                $u->phone = $phone;	
				$u->created_date = $created_date;
                array_push($showByCompanyId, $u);
            }
            $this->res->status = true;
            $this->res->msg = 'Client ID fetched';
            $this->res->data['all'] = $showByCompanyId;

        }
        $stmt->close();
        return $this->res;


    }


	public function editCompany($post) {

		$conn = $this->db->getconn();
		$orgName = $post['orgName'];
		$orgAddress = $post['orgAddress'];
		$registerDate = $post['date'];
		$orgContractorName = $post['orgContractorName'];
		$email = $post['email'];
		$orgContractorPhone = $post['orgContractorPhone'];

	   //if the username is not in db then insert to the table

	   $orgId = $_GET['orgId'];

		   //$is_active = 1;
		   //$created_date = date( 'Y-m-d H:i:s' );
		   //$updated_by = $_SESSION['id'];
		   $updated_date = date('Y-m-d H:i:s');
		   $sql1 = 'UPDATE orgregister SET orgName =?, orgAdress =?, register_date =?, contractorName =?, email = ?, phone = ?, updated_date =? WHERE org_id = ?';
		   $stmt = $conn->prepare( $sql1 );
		   $stmt->bind_param( 'sssssisi', $orgName, $orgAddress, $registerDate, $orgContractorName, $email, $orgContractorPhone, $updated_date, $orgId);
		 //  var_dump($stmt->execute() );
		  // die;
		   if ( $stmt->execute() ) {

			   $this->res->status = true;
			   $this->res->msg = 'User Updated successfully.';

		   } else {
			   $this->res->status = false;
			   $this->res->msg = 'Operation failed.';
		   }

	   $stmt->close();
	   return $this->res;
   }

// CODE FOR ACTIVE AND DEACTIVE THE ORGANIZATION
//1. active company
//2. dective comapany


public function activateCompany ($post ) {

	$conn = $this->db->getconn();
	//$is_active = 1;
	$id = $post['active'];
	if (isset($_POST['active'])) {
		$sql1 = 'UPDATE orgregister SET status = 1 WHERE org_id = ?';
		$stmt = $conn->prepare($sql1);
	   $stmt->bind_param('i', $id);
	 //  echo var_dump($stmt);
		if ($stmt->execute()) {
			$this->res->status = true;
			$this->res->msg = 'User approved successfully.';

		}
	}
	else {
		$this->res->status = false;
		$this->res->msg = 'Opera failed.';
	}

	$stmt->close();
	return $this->res;
}

//function for DEACTIVE COMPAY

public function deactiveCompany($post) {

	$conn = $this->db->getconn();
	//$is_active = 1;
	$id = $post['deactive'];
	if (isset($_POST['deactive'])) {
		$sql1 = 'UPDATE orgregister SET status = 0 WHERE org_id = ?';
		$stmt = $conn->prepare($sql1);
	   $stmt->bind_param('i', $id);
	 //  echo var_dump($stmt);
		if ($stmt->execute()) {


			$this->res->status = true;
			$this->res->msg = 'User approved successfully.';

		}
	}
	else {
		$this->res->status = false;
		$this->res->msg = 'Opera failed.';
	}

	$stmt->close();
	return $this->res;
}





	public function registerVocancies($post){

        $conn = $this->db->getconn();
        $orgId = $post['orgName'];
        $jobTitle = $post['jobTitle'];
        $jobNumber = $post['jobNumber'];
        $gender = $post['gender'];
        $jobAddress = $post['jobAddress'];
		$shift = $post['shift'];
        $salary = $post['salary'];
        $education = $post['education'];
		$workExperience = $post['workExperience'];
		$workType = $post['workType'];
		$description = $post['description'];
        $created_date = date('Y-m-d');
        $end_date = $post['enddate'];
        //$updated_date = date('Y-m-d H:i:s');
        $sql = 'INSERT INTO vacancie_reg(org_id, jobTitle, jobsNumbers, gender, jobLocation, shift, salary, education,
		 experience,workType, description,created_date,enddate ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isissssssssss', $orgId, $jobTitle, $jobNumber, $gender, $jobAddress, $shift, $salary, $education,
		$workExperience, $workType, $description, $created_date, $end_date);
		//var_dump($stmt->execute());
	
        if ($stmt->execute()) {
            $this->res->status = true;
            $this->res->status = "Product Added Successfully";

        }
        else{
             $this->res->status = false;
             $this->res->msg = 'Operation failed.';

        }
    return $this->res;
    }





	public function showAllvancanies()
	{
		$conn = $this->db->getconn();
		$sql = 'SELECT v.vac_id, v.org_id, v.jobTitle, v.jobsNumbers, v.gender, v.jobLocation, v.shift, v.salary, v.education, v.experience, v.workType, v.description,	
		 v.created_date, v.enddate, o.orgName, v.status FROM vacancie_reg v 
		 INNER JOIN orgregister o ON o.org_id = v.org_id WHERE v.status = 1 or v.status=0 ';
		$stmt = $conn->prepare($sql);
		$stmt->bind_result($vacancieId, $orgId, $jobTitle, $jobsNumbers, $gender, $jobLocation, $shift, $salary, 
		$education, $workExperience, $workType, $description, $created_date ,$enddate, $orgName, $status);
		
		if($stmt->execute()){
			$showAllvacancieArray = array();
			while($stmt->fetch()){
				$u = new Functions();
				$u->vacancieId = $vacancieId;
				$u->orgId = $orgId;
				$u->jobTitle = $jobTitle;
				$u->jobsNumbers = $jobsNumbers;
				$u->gender = $gender;
				$u->jobLocation = $jobLocation;
				$u->shift = $shift;
				$u->salary = $salary;
				$u->education = $education;
				$u->workExperience = $workExperience;
				$u->workType = $workType;
				$u->description = $description;
				$u->created_date = $created_date;
				$u->enddate = $enddate;
				$u->orgName = $orgName;
				$u->status = $status;
				array_push($showAllvacancieArray, $u);

			}
			$this->res->status = true;
			$this->res->msg = 'client fetched';
			$this->res->data['all'] = $showAllvacancieArray;

		}
		$stmt->close();
		return $this->res;

	}


	public function showAllvancaniesIndexPage()
	{
		$conn = $this->db->getconn();
		$sql = 'SELECT v.vac_id, v.org_id, v.jobTitle, v.jobsNumbers, v.gender, v.jobLocation, v.shift, v.salary, v.education, v.experience, v.workType, v.description,	
		 v.created_date, o.orgName, v.status FROM vacancie_reg v 
		 INNER JOIN orgregister o ON o.org_id = v.org_id WHERE v.status = 1 or v.status=0 ORDER BY v.vac_id DESC limit 10';
		$stmt = $conn->prepare($sql);
		$stmt->bind_result($vacancieId, $orgId, $jobTitle, $jobsNumbers, $gender, $jobLocation, $shift, $salary, 
		$education, $workExperience, $workType, $description, $created_date , $orgName, $status);
		
		if($stmt->execute()){
			$showAllvacancieArray = array();
			while($stmt->fetch()){
				$u = new Functions();
				$u->vacancieId = $vacancieId;
				$u->orgId = $orgId;
				$u->jobTitle = $jobTitle;
				$u->jobsNumbers = $jobsNumbers;
				$u->gender = $gender;
				$u->jobLocation = $jobLocation;
				$u->shift = $shift;
				$u->salary = $salary;
				$u->education = $education;
				$u->workExperience = $workExperience;
				$u->workType = $workType;
				$u->description = $description;
				$u->created_date = $created_date;
				$u->orgName = $orgName;
				$u->status = $status;
				array_push($showAllvacancieArray, $u);

			}
			$this->res->status = true;
			$this->res->msg = 'client fetched';
			$this->res->data['all'] = $showAllvacancieArray;

		}
		$stmt->close();
		return $this->res;

	}





	public function showSingleVacancieById($vacancieId)
	{
		$conn = $this->db->getconn();
		$sql = 'SELECT v.vac_id, v.org_id, v.jobTitle, v.jobsNumbers, v.gender, v.jobLocation, v.shift, v.salary, v.education, v.experience,
		 v.workType, v.description, v.created_date, o.orgName FROM vacancie_reg v  
		 INNER JOIN orgregister o ON o.org_id = v.org_id WHERE v.vac_id = ?';
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('i', $vacancieId);
		$stmt->bind_result($vacancieId, $orgId, $jobTitle, $jobsNumbers, $gender, $jobLocation, $shift, $salary, 
		$education, $workExperience,$workType, $description, $created_date, $orgName);
		
		if($stmt->execute()){
			$showAllvacancieArray = array();
			while($stmt->fetch()){
				$u = new Functions();
				$u->vacancieId = $vacancieId;
				$u->orgId = $orgId;
				$u->jobTitle = $jobTitle;
				$u->jobsNumbers = $jobsNumbers;
				$u->gender = $gender;
				$u->jobLocation = $jobLocation;
				$u->shift = $shift;
				$u->salary = $salary;
				$u->education = $education;
				$u->workExperience = $workExperience;
				$u->workType = $workType;
				$u->description = $description;
				$u->created_date = $created_date;
				$u->orgName = $orgName;
				array_push($showAllvacancieArray, $u);

			}
			$this->res->status = true;
			$this->res->msg = 'client fetched';
			$this->res->data['all'] = $showAllvacancieArray;

		}
		$stmt->close();
		return $this->res;

	}


	public function editVacancie($post) {
		$conn = $this->db->getconn();
		$orgId = $post['orgName'];
        $jobTitle = $post['jobTitle'];
        $jobNumber = $post['jobNumber'];
        $gender = $post['gender'];
        $jobAddress = $post['jobAddress'];
		$shift = $post['shift'];
        $salary = $post['salary'];
        $education = $post['education'];
		$workExperience = $post['workExperience'];
		$workType = $post['workType'];
		$description = $post['description'];
	   //if the username is not in db then insert to the table

	   $vacancieId = $_GET['vacancieId'];

		   //$is_active = 1;
		   //$created_date = date( 'Y-m-d H:i:s' );
		   //$updated_by = $_SESSION['id'];
		   $updated_date = date('Y-m-d H:i:s');
		   $sql1 = 'UPDATE vacancie_reg SET org_id =?, jobTitle =?, jobsNumbers =?, gender =?, jobLocation =?, shift = ?,
		    salary = ?, education =?, experience =?, workType =?, description =?, updated_date=?  WHERE vac_id = ?';
		   $stmt = $conn->prepare( $sql1 );
		   $stmt->bind_param( 'isisssisssssi', $orgId, $jobTitle, $jobNumber, $gender, $jobAddress, $shift, $salary, $education, $workExperience, $workType, $description, $updated_date, $vacancieId);
		 //  var_dump($stmt->execute() );
		  // die;
		   if ( $stmt->execute() ) {

			   $this->res->status = true;
			   $this->res->msg = 'User Updated successfully.';

		   } else {
			   $this->res->status = false;
			   $this->res->msg = 'Operation failed.';
		   }

	   $stmt->close();
	   return $this->res;
   }



   public function vacantVacancie ($post ) {

	$conn = $this->db->getconn();
	//$is_active = 1;
	$id = $post['active'];



	if (isset($_POST['active'])) {
		$sql1 = 'UPDATE vacancie_reg SET status = 1 WHERE vac_id = ?';
		$stmt = $conn->prepare($sql1);
	   $stmt->bind_param('i', $id);
	 //  echo var_dump($stmt);
		if ($stmt->execute()) {


			$this->res->status = true;
			$this->res->msg = 'User approved successfully.';

		}
	}
	else {
		$this->res->status = false;
		$this->res->msg = 'Opera failed.';
	}

	$stmt->close();
	return $this->res;
}





public function ocupiedVacancie ($post ) {

	$conn = $this->db->getconn();
	$is_active = 0;
	$id = $post['deactive'];



	if (isset($_POST['deactive'])) {
		$sql1 = 'UPDATE vacancie_reg SET status = 0 WHERE vac_id = ?';
		$stmt = $conn->prepare($sql1);
	   $stmt->bind_param('i', $id);
	 //  echo var_dump($stmt);
		if ($stmt->execute()) {


			$this->res->status = true;
			$this->res->msg = 'User approved successfully.';

		}
	}
	else {
		$this->res->status = false;
		$this->res->msg = 'Opera failed.';
	}

	$stmt->close();
	return $this->res;
}











   public function showInterductionVacById($ids)
   {

	   $conn = $this->db->getconn();
	   $sql = 'SELECT id, codeNumber, name,nickName, fathername, created_date FROM clients_reg  WHERE id = ?';
	   $stmt = $conn->prepare($sql);
	   $stmt->bind_param("i", $ids);
	   $stmt->bind_result($ids, $codeNumber, $clientName,$nickName, $fathername, $created_date);
	   if ($stmt->execute()) {
		   $showByCompanyId = array();
		   while ($stmt->fetch()) {
			   $u = new Functions();
			   $u->ids = $ids;
			   $u->codeNumber = $codeNumber;
			   $u->clientName = $clientName;
			   $u->nickName = $nickName;
			   $u->fathername = $fathername;
			   $u->created_date = $created_date;
			   array_push($showByCompanyId, $u);
		   }
		   $this->res->status = true;
		   $this->res->msg = 'Client ID fetched';
		   $this->res->data['all'] = $showByCompanyId;

	   }
	   $stmt->close();
	   return $this->res;


   }

   public function interductionOrg($orgName)
   {

	   $conn = $this->db->getconn();
	   $sql = 'SELECT org_id, orgName FROM orgregister  WHERE org_id = ?';
	   $stmt = $conn->prepare($sql);
	   $stmt->bind_param("i", $id);
	   $stmt->bind_result($id, $orgName);
	   if ($stmt->execute()) {
		   $showByCompanyId = array();
		   while ($stmt->fetch()) {
			   $u = new Functions();
			   $u->id = $id;
			   $u->orgName = $orgName;
		
			   array_push($showByCompanyId, $u);
		   }
		   $this->res->status = true;
		   $this->res->msg = 'Client ID fetched';
		   $this->res->data['all'] = $showByCompanyId;

	   }
	   $stmt->close();
	   return $this->res;


   }

   public function getOrganizationName($orgName)
   {

	   $conn = $this->db->getconn();
	   $sql = 'SELECT orgName FROM orgregister  WHERE org_id = ?';
	   $stmt = $conn->prepare($sql);
	   $stmt->bind_param("i", $orgName);
	   $stmt->bind_result($name);
	   $stmt->execute();
	   $stmt->fetch();
	$stmt->store_result();
		  
	   $stmt->close();
	   return $name;


   }   
   public function getvacancieName($vacancy)
   {

	   $conn = $this->db->getconn();
	   $sql = 'SELECT jobTitle FROM vacancie_reg  WHERE vac_id  = ?';
	   $stmt = $conn->prepare($sql);
	   $stmt->bind_param("i", $vacancy);
	   $stmt->bind_result($vname);
	   $stmt->execute();
	   $stmt->fetch();
	$stmt->store_result();
		  
	   $stmt->close();
	   return $vname;


   }  


   public function showAllVacancie()
   {
	   $conn = $this->db->getconn();
	   $sql = 'SELECT vac_id, jobTitle FROM vacancie_reg';
	   $stmt = $conn->prepare($sql);
	   $stmt->bind_result($vac_id, $jobTitle);
	   
	   if($stmt->execute()){
		   $showAllvacancieArray = array();
		   while($stmt->fetch()){
			   $u = new Functions();
			   $u->vac_id = $vac_id;
			   $u->jobTitle = $jobTitle;
			
					   array_push($showAllvacancieArray, $u);

		   }
		   $this->res->status = true;
		   $this->res->msg = 'client fetched';
		   $this->res->data['all'] = $showAllvacancieArray;

	   }
	   $stmt->close();
	   return $this->res;

   }










   
		public function registrationReceipt($pid)
		{
	
			$conn = $this->db->getconn();
			$sql = 'SELECT pay_id, id, name, nickName, codeNumber, fee, created_date FROM payment WHERE pay_id = ? ORDER BY created_date';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("i", $pid);
			$stmt->bind_result($pid, $id, $clientName,$nickName, $codeNumber, $fee, $created_date);
			if ($stmt->execute()) {
				$showByClientId = array();
				while ($stmt->fetch()) {
					$u = new Functions();
					$u->pid = $pid;
					$u->id = $id;
					$u->clientName = $clientName;
					$u->nickName = $nickName;
					$u->codeNumber = $codeNumber;
					$u->created_date = $created_date;

					$u->fee = $fee;

					array_push($showByClientId, $u);
				}
				$this->res->status = true;
				$this->res->msg = 'Client ID fetched';
				$this->res->data['all'] = $showByClientId;
	
			}
			$stmt->close();
			return $this->res;
	
	
		}
	
	
	
	
	public function addPayment($post){

		$conn = $this->db->getconn();
		$clientId = $_GET['id'];
        $name = $post['name'];
        $nickName = $post['nickName'];
        $fathername = $post['fathername'];
        $codeNumber = $post['codeNumber'];
       
        $fee = $post['fee'];
        $discription = $post['discription'];
        $created_date = date('Y-m-d H:i:s');

		$sql = 'INSERT INTO payment(id, name, nickName, fathername, codeNumber, fee, discription, created_date) VALUES (?,?,?,?,?,?,?,?)';
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('issssiss', $clientId, $name, $nickName, $fathername, $codeNumber, $fee, $discription, $created_date); 
		
        if ($stmt->execute()) {
			//echo '<br> done 1';
			 $id = $conn->insert_id;
			 $type = 'payment';
			 $received = $fee;
			
$sql2 = 'INSERT INTO  daily(id, type, received, paid, description, created_date)
	   VALUES (?,?,?,?,?,?)';
		
	 $stmt2 = $conn->prepare($sql2);
	 $stmt2->bind_param('isiiss', $id, $type, $received, $paid, $discription, $created_date);

	// var_dump($stmt2->execute());

if ($stmt2->execute()) {


			//echo '<br>done 2';

			$check = true;
			 $this->res->status = true;
			 $this->res->msg = "daily Added Successfully";
			 $this->res->id = $id;

		 }
		 else{
		 
			 $check = false;
			 $this->res->status = false;
			 $this->res->status = "daily failed";
		 }
	 
 } 


if($check){
	 $conn->commit();

 }else{
	 $conn->rollback();
 }
 $stmt->close();
return $this->res;

}


	

public function salaryPercent($post){

	$conn = $this->db->getconn();
	$clientId = $_GET['id'];
	$name = $post['name'];
	$codeNumber = $post['codeNumber'];
	$salary = $post['salary'];
	$amount = $post['salaryPercent'];
	$discription = $post['description'];
	$recruitment_date = $post['recruiment_date'];
	$salaryDate = $post['salaryDate'];
	$created_dates = date('Y-m-d');

	$sql = 'INSERT INTO salpercpayments(id, name, codeNumber, salary, percentamount, description, created_date,recruitment_date,salaryDate) VALUES (?,?,?,?,?,?,?,?,?)';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('issiissss', $clientId, $name, $codeNumber, $salary, $amount, $discription, $created_dates,$recruitment_date,$salaryDate); 
	//var_dump($stmt->execute());
	//var_dump($stmt->execute());
	if ($stmt->execute()) {
		//echo '<br> done 1';
		
		$sql1 = 'UPDATE clients_reg SET status = 2 WHERE id = ?';
		$stmt2 = $conn->prepare($sql1);
	   $stmt2->bind_param('i', $clientId);




		 

 //var_dump($stmt2->execute());

if ($stmt2->execute()) {


		//echo '<br>done 2';

		$check = true;
		 $this->res->status = true;
		 $this->res->msg = "daily Added Successfully";
		 $this->res->id = $id;

	 }
	 else{
	 
		 $check = false;
		 $this->res->status = false;
		 $this->res->status = "daily failed";
	 }
 
} 


if($check){
 $conn->commit();

}else{
 $conn->rollback();
}
$stmt->close();
return $this->res;

}







public function showSalarypercent()
{
	$conn = $this->db->getconn();
	$sql = 'SELECT p_id, id, name, codeNumber, salary, percentamount, description, created_date FROM salpercpayments ';
	$stmt = $conn->prepare($sql);
	$stmt->bind_result($p_id, $clientId, $name, $codeNumber, $salary, $percentamount, $description, $created_date);
	
	if($stmt->execute()){
		$showAllPaymentArray = array();
		while($stmt->fetch()){
			$u = new Functions();
			$u->p_id = $p_id;
			$u->clientId = $clientId;
			$u->name = $name;
			$u->codeNumber = $codeNumber;
			
			$u->salary = $salary;
			$u->percentamount = $percentamount;
			$u->description = $description;
			$u->created_date = $created_date;
			array_push($showAllPaymentArray, $u);

		}
		$this->res->status = true;
		$this->res->msg = 'client fetched';
		$this->res->data['all'] = $showAllPaymentArray;

	}
	$stmt->close();
	return $this->res;

}




public function show40perlist()
{
	$conn = $this->db->getconn();
	$sql = 'SELECT p_id, id, name, codeNumber, salary, percentamount, description, salaryDate
	 FROM salpercpayments WHERE DATEDIFF(`salaryDate`, CURDATE()) <=7';
	$stmt = $conn->prepare($sql);
	//var_dump($stmt->execute());
	
	$stmt->bind_result($p_id, $clientId, $name, $codeNumber, $salary, $percentamount, $description, $created_date);
	
	if($stmt->execute()){
		$showAllPaymentArray = array();
		while($stmt->fetch()){
			$u = new Functions();
			$u->p_id = $p_id;
			$u->clientId = $clientId;
			$u->name = $name;
			$u->codeNumber = $codeNumber;
			
			$u->salary = $salary;
			$u->percentamount = $percentamount;
			$u->description = $description;
			$u->created_date = $created_date;
			array_push($showAllPaymentArray, $u);

		}
		$this->res->status = true;
		$this->res->msg = 'client fetched';
		$this->res->data['all'] = $showAllPaymentArray;

	}
	$stmt->close();
	return $this->res;

}






	
	public function showAllPayments()
	{
		$conn = $this->db->getconn();
		$sql = 'SELECT pay_id, id, name, fathername, codeNumber, fee, discription, created_date FROM payment ORDER BY created_date';
		$stmt = $conn->prepare($sql);
		$stmt->bind_result($pid, $clientId, $name, $fathername, $codeNumber, $fee, $discription, $created_date);
		
		if($stmt->execute()){
			$showAllPaymentArray = array();
			while($stmt->fetch()){
				$u = new Functions();
				$u->pid = $pid;
				$u->clientId = $clientId;
				$u->name = $name;
				$u->fathername = $fathername;
				$u->codeNumber = $codeNumber;
			
				$u->fee = $fee;
				$u->discription = $discription;
				$u->created_date = $created_date;
				array_push($showAllPaymentArray, $u);

			}
			$this->res->status = true;
			$this->res->msg = 'client fetched';
			$this->res->data['all'] = $showAllPaymentArray;

		}
		$stmt->close();
		return $this->res;

	}






	// area for user creation 
	
    public function createUser( $post ) {

        $conn = $this->db->getconn();
        $name = $post['name'];
        $username = $post['username'];
        $password = sha1($post['password']);
        $email = $post['email'];
        $phone = $post['phone'];
		


        $counter = 0;
        $sql = 'SELECT * FROM user WHERE username=? ';
        $stmt = $conn->prepare( $sql );
        $stmt->bind_param( 's', $username );
        if ( $stmt->execute() ) {
            while ( $stmt->fetch() ) {
                $counter ++;
            }
        }
        
        //if the username is not in db then insert to the table
      

            //$is_active = 0;
            $created_date = date( 'Y-m-d H:i:s' );
            $sql1 = 'INSERT INTO user( name, username, password, email, phone, created_date) VALUES (?,?,?,?,?,?)';
            $stmt = $conn->prepare( $sql1 );
            $stmt->bind_param( 'ssssss', $name, $username, $password, $email, $phone, $created_date);
            if ( $stmt->execute() ) {
                $this->res->status = true;
                $this->res->msg = 'User Created successfully.';

            } 
            else {
                $this->res->status = false;
                $this->res->msg = 'Operation failed.';
            }
        
        
        $stmt->close();
        return $this->res;
    }


	public function showSingleUserById($user_id)
    {

        $conn = $this->db->getconn();
        $sql = 'SELECT user_id, name, username, email, phone FROM user  WHERE user_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->bind_result($user_id, $name, $username, $email, $phone);
        if ($stmt->execute()) {
            $showByCompanyId = array();
            while ($stmt->fetch()) {
                $u = new Functions();
                $u->user_id = $user_id;
                $u->name = $name;
                $u->username = $username;
                $u->email = $email;
                $u->phone = $phone;
                array_push($showByCompanyId, $u);
            }
            $this->res->status = true;
            $this->res->msg = 'Client ID fetched';
            $this->res->data['all'] = $showByCompanyId;

        }
        $stmt->close();
        return $this->res;


    }


	public function editUser($post) {

		$conn = $this->db->getconn();
		$name = $post['name'];
		$username = $post['username'];
		$phone = $post['phone'];
		$email = $post['email'];

	   $user_id = $_GET['user_id'];

		   //$is_active = 1;
		   //$created_date = date( 'Y-m-d H:i:s' );
		   //$updated_by = $_SESSION['id'];
		   //$updated_date = date('Y-m-d H:i:s');
		   $sql1 = 'UPDATE user SET name =?, username =?, phone =?, email =? WHERE user_id = ?';
		   $stmt = $conn->prepare( $sql1 );
		   $stmt->bind_param( 'ssisi', $name, $username, $phone, $email, $user_id);
		 //  var_dump($stmt->execute() );
		  // die;
		   if ( $stmt->execute() ) {

			   $this->res->status = true;
			   $this->res->msg = 'User Updated successfully.';

		   } else {
			   $this->res->status = false;
			   $this->res->msg = 'Operation failed.';
		   }

	   $stmt->close();
	   return $this->res;
   }



   	
   public function activeUser ($post ) {

	$conn = $this->db->getconn();
	//$is_active = 1;
	$id = $post['active'];



	if (isset($_POST['active'])) {
		$sql1 = 'UPDATE user SET status = 1 WHERE user_id = ?';
		$stmt = $conn->prepare($sql1);
	   $stmt->bind_param('i', $id);
	 //  echo var_dump($stmt);
		if ($stmt->execute()) {


			$this->res->status = true;
			$this->res->msg = 'User approved successfully.';

		}
	}
	else {
		$this->res->status = false;
		$this->res->msg = 'Opera failed.';
	}

	$stmt->close();
	return $this->res;
}





public function deactiveUser($post ) {

	$conn = $this->db->getconn();
	$is_active = 0;
	$id = $post['deactive'];



	if (isset($_POST['deactive'])) {
		$sql1 = 'UPDATE user SET status = 0 WHERE user_id = ?';
		$stmt = $conn->prepare($sql1);
	   $stmt->bind_param('i', $id);
	 //  echo var_dump($stmt);
		if ($stmt->execute()) {


			$this->res->status = true;
			$this->res->msg = 'User approved successfully.';

		}
	}
	else {
		$this->res->status = false;
		$this->res->msg = 'Opera failed.';
	}

	$stmt->close();
	return $this->res;
}




    public function checklogin($post){
        $username = $post['username'];
        $password = sha1( $post['password'] );

    	//$code = 'J2021-'.$post['code'];

        $conn = $this->db->getconn();
        $last_login = date( 'Y-m-d H:i:s' );
        $sql = 'SELECT user_id, username from user WHERE username=? AND password=?';
        $stmt = $conn->prepare( $sql );
        $stmt->bind_param( 'ss', $username, $password );
        $stmt->bind_result( $id, $username);
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        $stmt->fetch();

        //echo $rows;
        if ( $rows ==1 ) {
            

            $_SESSION['id'] = $id;
            $_SESSION['loggedin'] = true;
           // $_SESSION['role'] = $role;

            $_SESSION['LAST_ACTIVITY'] = time();
            $update = 'UPDATE user SET last_login= ? WHERE user_id = ?';
            $stmt2 = $conn->prepare( $update );
            $stmt2->bind_param( 'si', $last_login, $_SESSION['id'] );
            if ( $stmt2->execute() ) {
                $this->res->status = true;
                $this->res->msg = 'Last-login updated Successfull.';
            } else {
                $this->res->status = false;
                $this->res->msg = 'نام کاربری یا رمز عبور علط است';
            }

            $this->res->status = true;
            $this->res->msg = 'login Successfull.';
        } else {

            $this->res->status = false;
            $this->res->msg = ' نام کاربری یا رمز عبور علط است ';
        }
        $stmt->close();
        return $this->res;


    }


	public function CountClients()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT COUNT(*) FROM  clients_reg';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($count);
			
			$stmt->execute();
			$stmt->store_result();
			
			
			$stmt->fetch();
			$stmt->close();
			return $count;

		}


		public function CountCompany()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT COUNT(*) FROM  orgregister';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($count);
			
			$stmt->execute();
			$stmt->store_result();
			
			
			$stmt->fetch();
			$stmt->close();
			return $count;

		}


		public function CountVacanies()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT COUNT(*) FROM  vacancie_reg';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($count);
			
			$stmt->execute();
			$stmt->store_result();
			
			$stmt->fetch();
			$stmt->close();
			return $count;

		}



		public function feeSum()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT SUM(fee) FROM  payment';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($count);
			
			$stmt->execute();
			$stmt->store_result();
			
			
			$stmt->fetch();
			$stmt->close();
			return $count;

		}



		public function vacanReport($post)
		{	
			$vacant = $post['vacantStatus'];
			$conn = $this->db->getconn();
			$sql = 'SELECT v.vac_id, v.org_id, v.jobTitle, v.jobsNumbers, v.gender, v.jobLocation, v.shift, v.salary, v.education, v.experience,
			v.created_date,v.enddate, o.orgName, v.status FROM vacancie_reg v 
			INNER JOIN orgregister o ON o.org_id = v.org_id WHERE v.status = ?';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('i', $vacant);
			$stmt->bind_result($vac_id, $orgId, $jobTitle, $jobsNumbers, $gender, $jobLocation, $shift, $salary, 
			$education, $workExperience, $created_date,$enddate, $orgName, $status);
			
			if($stmt->execute()){
				$showAllPaymentArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->vac_id = $vac_id;
					$u->orgName = $orgName;

					$u->jobTitle = $jobTitle;
					$u->jobsNumbers = $jobsNumbers;
					$u->gender = $gender;

					$u->jobLocation = $jobLocation;
					$u->shift = $shift;
					$u->salary = $salary;
					$u->education = $education;
					$u->workExperience = $workExperience;
					$u->status = $status;
					$u->enddate = $enddate;
					$u->created_date = $created_date;
					//$u->vacant = $vacant;

					array_push($showAllPaymentArray, $u);
	
				}
			
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllPaymentArray;
	
			}
			$stmt->close();
			return $this->res;
	
		}
	




		
		public function feeReports($post)
		{	
			$from_date = $post['from_date'];
			$to_date = $post['to_date'];

			$conn = $this->db->getconn();
		$sql = 'SELECT pay_id, name, fathername, codeNumber, orgName, vacancieName, discription, created_date, fee
		 FROM payment WHERE created_date BETWEEN ?  AND ? order by pay_id DESC';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("ss", $from_date, $to_date);
			$stmt->bind_result($pay_id, $name, $fathername, $codeNumber, $orgName, $vacancieName, $discription, $created_date, $fee);
			
			if($stmt->execute()){
				$showAllPaymentArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->pay_id = $pay_id;

					$u->name = $name;
					$u->fathername = $fathername;
					$u->codeNumber = $codeNumber;
					$u->orgName = $orgName;
					$u->vacancieName = $vacancieName;
					$u->fee = $fee;
					$u->discription = $discription;
					$u->created_date = $created_date;
					//$u->vacant = $vacant;

					array_push($showAllPaymentArray, $u);
	
				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllPaymentArray;
	
			}
			$stmt->close();
			return $this->res;
	
		}
	
		
		public function vacancieOnDateReport($post)
	{
		$from_date = $post['from_date'];
		$to_date = $post['to_date'];

		$conn = $this->db->getconn();
		$sql = 'SELECT v.vac_id, v.org_id, v.jobTitle, v.jobsNumbers, v.gender, v.jobLocation, v.shift, v.salary, v.education, v.experience, v.workType, v.description,	
		 v.created_date, v.enddate, o.orgName, v.status FROM vacancie_reg v 
		 INNER JOIN orgregister o ON o.org_id = v.org_id WHERE v.created_date BETWEEN ? AND ? ORDER BY v.created_date DESC';
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $from_date, $to_date);
		$stmt->bind_result($vacancieId, $orgId, $jobTitle, $jobsNumbers, $gender, $jobLocation, $shift, $salary, 
		$education, $workExperience, $workType, $description, $created_date ,$enddate, $orgName, $status);
		
		if($stmt->execute()){
			$showAllvacancieArray = array();
			while($stmt->fetch()){
				$u = new Functions();
				$u->vacancieId = $vacancieId;
				$u->orgId = $orgId;
				$u->jobTitle = $jobTitle;
				$u->jobsNumbers = $jobsNumbers;
				$u->gender = $gender;
				$u->jobLocation = $jobLocation;
				$u->shift = $shift;
				$u->salary = $salary;
				$u->education = $education;
				$u->workExperience = $workExperience;
				$u->workType = $workType;
				$u->description = $description;
				$u->created_date = $created_date;
				$u->enddate = $enddate;
				$u->orgName = $orgName;
				$u->status = $status;
				array_push($showAllvacancieArray, $u);

			}
			$this->res->status = true;
			$this->res->msg = 'client fetched';
			$this->res->data['all'] = $showAllvacancieArray;

		}
		$stmt->close();
		return $this->res;

	}

	


		public function feeSumReports($post)
		{	
			$from_date = $post['from_date'];
			$to_date = $post['to_date'];

			$conn = $this->db->getconn();
		$sql = 'SELECT SUM(fee) FROM payment WHERE created_date BETWEEN ?  AND ?';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("ss", $from_date, $to_date);
			$stmt->bind_result($fee);
			
			if($stmt->execute()){
				$showAllPaymentArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->pay_id = $pay_id;

					// $u->name = $name;
					// $u->fathername = $fathername;
					// $u->codeNumber = $codeNumber;
					// $u->orgName = $orgName;
					// $u->vacancieName = $vacancieName;
					// $u->fee = $fee;
					// $u->discription = $discription;
					// $u->created_date = $created_date;
					// //$u->vacant = $vacant;

					array_push($showAllPaymentArray, $u);
	
				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllPaymentArray;
	
			}
			$stmt->close();
			return $this->res;
	
		}
	





		
		public function orgReports($post)
		{
			$from_date = $post['from_date'];
			$to_date = $post['to_date'];
			$conn = $this->db->getconn();
			$sql = 'SELECT o.org_id, o.`orgName`, o.orgAdress, o.register_date, o.contractorName, o.email, o.phone, o.status, o.created_date, SUM(v.jobsNumbers) FROM `orgregister` o
			 LEFT JOIN vacancie_reg v ON o.org_id = v.org_id WHERE o.created_date BETWEEN ? AND ? GROUP BY o.org_id';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("ss", $from_date, $to_date);
			$stmt->bind_result($orgId, $orgName, $orgAddress, $registerDate, $contractorName, $email, $phone, $status, $created_date, $vacancies);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->orgId = $orgId;
					$u->orgName = $orgName;
					$u->orgAddress = $orgAddress;
					$u->registerDate = $registerDate;
					$u->contractorName = $contractorName;
					$u->email = $email;
					$u->phone = $phone;
					$u->status = $status;
					$u->vacancies = $vacancies;
					$u->created_date = $created_date;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}



		

		public function showAllUsers()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT user_id, name, username, email, phone, last_login, created_date, status FROM user WHERE status = 1 OR status = 0';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($user_id, $name, $username, $email, $phone, $last_login, $created_date, $status);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->user_id = $user_id;
					$u->name = $name;
					$u->username = $username;
					$u->email = $email;
					$u->phone = $phone;
					$u->last_login = $last_login;					
					$u->created_date = $created_date;
					$u->status = $status;

					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}



		

		// public function test($post){
			
		// 	$conn = $this->db->getconn();
		// 	$name = $post['name'];
		// 	$fathername = $post['fname'];
		// 	$number = $post['number'];

		// 	$sql = 'INSERT INTO test(name, fathername, numbers) VALUES (?,?,?)';
		// 	$stmt = $conn->prepare($sql);
		// 	$stmt->bind_param('ssi', $name, $fathername, $number);
		// 	if ( $stmt->execute() ) {
        //         $this->res->status = true;
        //         $this->res->msg = 'clients Created successfully.';

        //     } 
        //     else {
        //         $this->res->status = false;
        //         $this->res->msg = 'Operation failed.';
        //     }
        
        
        // $stmt->close();
        // return $this->res;
    

		// }





		public function expenseCategory($post){

			$conn = $this->db->getconn();
			$category_name = $post['categoryname'];
			
		
			
			//$created_by = $_SESSION['id'];
			$created_date = date('Y-m-d H:i:s');
			$sql = 'INSERT INTO expcategory(name, created_date) VALUES (?,?)';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('ss', $category_name, $created_date);
			if ($stmt->execute()) {
				$this->res->status = true;
				$this->res->status = "Product Added Successfully";
		
			}
			else{
				 $this->res->status = false;
				 $this->res->msg = 'Operation failed.';
		
			}
		$stmt->close();
		return $this->res;
		}
		
		
		




		public function showExpenseCategory()
		{
	
			$conn = $this->db->getconn();
			$sql = 'SELECT category_id, name, status, created_date FROM expcategory WHERE status = 1';
			/*$sql = 'SELECT p.category_id, p.category_name, p.is_active, p.created_by, p.created_date, u.username from product_category p
			LEFT JOIN clientusers u ON p.created_by = u.id WHERE p.is_active = 1 or p.is_active = 0 ORDER BY p.is_active desc';*/
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($category_id, $expenseName,$status, $created_date);
			if ($stmt->execute()) {
				$exp_category = array();
				while ($stmt->fetch()) {
					$u = new Functions();
					 $u->category_id = $category_id;
					$u->expenseName = $expenseName;
					$u->status = $status;
					$u->created_date = $created_date;
					array_push($exp_category, $u);
	
				}
				$this->res->status = true;
				$this->res->msg = 'users fetched';
				$this->res->data['all'] = $exp_category;
	
			}
			$stmt->close();
			return $this->res;
	
	
		}
	
	

		public function AddExpenses($post) {

			$conn = $this->db->getconn();
			$expenseNameById = $post['expenseName'];
			$expAmounts = $post['amount'];
			$expenseDate = $post['expenseDate'];
			$expDescriptions = $post['description'];
			
			//$created_by = $_SESSION['id'];
			$created_date = date('Y-m-d H:i:s');
			$sql = 'INSERT INTO expense(category_id , description, amount, expensedate, created_date) VALUES (?,?,?,?,?)';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('isiss', $expenseNameById, $expDescriptions,$expAmounts, $expenseDate, $created_date);
			 // var_dump($stmt2->execute());
			   if ($stmt->execute()){
						   //echo '<br> done 1';
	
							$id = $conn->insert_id;
							$type = 'expenses';
							$paid = $expAmounts;
						   
		$sql2 = 'INSERT INTO  daily(id, type, received, paid, description, created_date)
					  VALUES (?,?,?,?,?,?)';
					   
					$stmt2 = $conn->prepare($sql2);
					$stmt2->bind_param('isiiss', $id, $type, $received, $paid, $expDescriptions, $created_date);
				  // var_dump($stmt2->execute());
	if ($stmt2->execute()) {
	
	
						   //echo '<br>done 2';
	
						   $check = true;
							$this->res->status = true;
							$this->res->status = "daily Added Successfully";
	
						}
						else{
						
							$check = false;
							$this->res->status = false;
							$this->res->status = "daily failed";
						}
					
				} 
	
			
			 if($check){
					$conn->commit();
	
				}else{
					$conn->rollback();
				}
				$stmt->close();
		return $this->res;
		}
	
	
	

		
		public function daily()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT daily_id ,id, type, received, paid, description, created_date FROM daily';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($daily_id, $id, $type, $received, $paid, $description, $created_date);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->daily_id = $daily_id;
					$u->id = $id;
					$u->type = $type;
					$u->received = $received;
					$u->paid = $paid;
					$u->description = $description;					
					$u->created_date = $created_date;

					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}




			
		public function showAllExpenses()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT e.expense_id, c.name, e.amount, e.description, e.expensedate FROM expense e INNER JOIN expcategory c ON c.category_id = e.category_id';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($expense_id, $catname, $amount, $description, $expensedate);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->expense_id = $expense_id;
					$u->catname = $catname;
					$u->amount = $amount;
					$u->description = $description;
					$u->expensedate = $expensedate;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}


			
		public function getSingleExpenseById($expense_id)
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT e.expense_id, c.name, e.amount, e.description, e.expensedate FROM expense e INNER JOIN expcategory c ON c.category_id = e.category_id WHERE e.expense_id = ?';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('i', $expense_id);
			$stmt->bind_result($expense_id, $catname, $amount, $description, $expensedate);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->expense_id = $expense_id;
					$u->catname = $catname;
					$u->amount = $amount;
					$u->description = $description;
					$u->expensedate = $expensedate;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}

		

	public function editExpense($post) {
		$conn = $this->db->getconn();
		$expenseNameById = $post['expenseName'];
		$expAmounts = $post['amount'];
		$expenseDate = $post['expenseDate'];
		$expDescriptions = $post['description'];
	   //if the username is not in db then insert to the table

	   $expense_id = $_GET['expense_id'];

		   //$is_active = 1;
		   //$created_date = date( 'Y-m-d H:i:s' );
		   //$updated_by = $_SESSION['id'];
		   //$updated_date = date('Y-m-d H:i:s');
		   $sql = 'UPDATE expense SET category_id =? , description =?, amount =?, expensedate =? WHERE expense_id =?';
		   $stmt = $conn->prepare($sql);
		   $stmt->bind_param('isisi', $expenseNameById, $expDescriptions,$expAmounts, $expenseDate,$expense_id );
			// var_dump($stmt2->execute());
		 //  var_dump($stmt->execute() );
		  // die;
		   if ( $stmt->execute() ) {

			   $this->res->status = true;
			   $this->res->msg = 'User Updated successfully.';

		   } else {
			   $this->res->status = false;
			   $this->res->msg = 'Operation failed.';
		   }

	   $stmt->close();
	   return $this->res;
   }


		public function incomeCategory($post){

			$conn = $this->db->getconn();
			$Incomecategory_name = $post['categoryname'];
			
		
			
			//$created_by = $_SESSION['id'];
			$created_date = date('Y-m-d');
			$sql = 'INSERT INTO incomecategory(name, created_date) VALUES (?,?)';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('ss', $Incomecategory_name, $created_date);
			if ($stmt->execute()) {
				$this->res->status = true;
				$this->res->status = "Product Added Successfully";
		
			}
			else{
				 $this->res->status = false;
				 $this->res->msg = 'Operation failed.';
		
			}
		$stmt->close();
		return $this->res;
		}
		

		public function showIncomeCategory()
		{
	
			$conn = $this->db->getconn();
			$sql = 'SELECT  category_id, name, status, created_date FROM  incomecategory WHERE status = 1';
			/*$sql = 'SELECT p.category_id, p.category_name, p.is_active, p.created_by, p.created_date, u.username from product_category p
			LEFT JOIN clientusers u ON p.created_by = u.id WHERE p.is_active = 1 or p.is_active = 0 ORDER BY p.is_active desc';*/
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($category_id, $incomeName,$status, $created_date);
			if ($stmt->execute()) {
				$exp_category = array();
				while ($stmt->fetch()) {
					$u = new Functions();
					 $u->category_id = $category_id;
					$u->incomeName = $incomeName;
					$u->status = $status;
					$u->created_date = $created_date;
					array_push($exp_category, $u);
	
				}
				$this->res->status = true;
				$this->res->msg = 'users fetched';
				$this->res->data['all'] = $exp_category;
	
			}
			$stmt->close();
			return $this->res;
	
	
		}
	



		public function addincome($post) {

		 		$conn = $this->db->getconn();
		$incomeNameById = $post['incomeName'];
		$incAmounts = $post['incamount'];
		$incDescription = $post['description'];
		$incomeDate = $post['incomeDate'];
			
			//$created_by = $_SESSION['id'];
			$created_date = date('Y-m-d H:i:s');
			$sql = 'INSERT INTO extra_income (category_id, amount, description, date, created_date) VALUES (?,?,?,?,?)';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('iisss', $incomeNameById, $incAmounts, $incDescription, $incomeDate, $created_date);
			  //var_dump($stmt->execute());
			  
			   if ($stmt->execute()){
						   //echo '<br> done 1';
	
							$id = $conn->insert_id;
							$type = 'income';
							$received = $incAmounts;
						   
		$sql2 = 'INSERT INTO  daily(id, type, received, paid, description, created_date)
					  VALUES (?,?,?,?,?,?)';
					   
					$stmt2 = $conn->prepare($sql2);
					$stmt2->bind_param('isiiss', $id, $type, $received, $paid, $incDescription, $created_date);
				  // var_dump($stmt2->execute());
	if ($stmt2->execute()) {
	
	
						   //echo '<br>done 2';
	
						   $check = true;
							$this->res->status = true;
							$this->res->status = "daily Added Successfully";
	
						}
						else{
						
							$check = false;
							$this->res->status = false;
							$this->res->status = "daily failed";
						}
					
				} 
	
			
			 if($check){
					$conn->commit();
	
				}else{
					$conn->rollback();
				}
				$stmt->close();
		return $this->res;
		}
	
	



		public function showOfficeIncomes()
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT i.income_id, c.name, i.amount, i.description, i.date FROM extra_income i INNER JOIN incomecategory
			c ON c.category_id = i.category_id';
			$stmt = $conn->prepare($sql);
			$stmt->bind_result($incomeId, $incomeName, $incomeAmount, $description, $incomeDate);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->incomeId = $incomeId;
					$u->incomeName = $incomeName;
					$u->incomeAmount = $incomeAmount;
					$u->description = $description;
					$u->incomeDate = $incomeDate;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}

		
		public function getSingleIncomeById($incomeId)
		{
			$conn = $this->db->getconn();
			$sql = 'SELECT i.income_id, c.name, i.amount, i.description, i.date FROM extra_income i INNER JOIN incomecategory c ON c.category_id  = i.category_id WHERE i.income_id = ?';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('i', $incomeId);
			$stmt->bind_result($incomeId, $catname, $amount, $description, $incomeDate);
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->incomeId = $incomeId;
					$u->catname = $catname;
					$u->amount = $amount;
					$u->description = $description;
					$u->incomeDate = $incomeDate;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}

		


		
	public function editIncome($post) {
		$conn = $this->db->getconn();
		$incomeName = $post['incomeName'];
		$incamount = $post['incamount'];
		$description = $post['description'];
		$incomeDate = $post['incomeDate'];
	   //if the username is not in db then insert to the table

	   $incomeId = $_GET['incomeId'];

		   //$is_active = 1;
		   //$created_date = date( 'Y-m-d H:i:s' );
		   //$updated_by = $_SESSION['id'];
		   //$updated_date = date('Y-m-d H:i:s');
		   $sql = 'UPDATE extra_income SET category_id =? , amount =?, description =?, date =? WHERE income_id =?';
		   $stmt = $conn->prepare($sql);
		   $stmt->bind_param('iissi', $incomeName,$incamount, $description, $incomeDate,$incomeId );
			// var_dump($stmt2->execute());
		 //  var_dump($stmt->execute() );
		  // die;
		   if ( $stmt->execute() ) {

			   $this->res->status = true;
			   $this->res->msg = 'User Updated successfully.';

		   } else {
			   $this->res->status = false;
			   $this->res->msg = 'Operation failed.';
		   }

	   $stmt->close();
	   return $this->res;
   }


	
		public function expenseCategoryReprot($post)
		{
			$conn = $this->db->getconn();
			$expName = $post['expenseName'];
			$from_date = $post['from_date'];
			$to_date = $post['to_date'];

			$sql = 'SELECT e.expense_id, c.category_id, c.name, e.amount, e.description, e.expensedate, e.created_date FROM expense e INNER JOIN expcategory c ON c.category_id = e.category_id WHERE c.category_id = ? OR e.expensedate BETWEEN ? AND ?';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('iss', $expName,$from_date,$to_date);
			$stmt->bind_result($expense_id,$category_id, $catname, $amount, $description, $expensedate,$created_date);
			//var_dump($stmt->execute());
			
			
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->expense_id = $expense_id;
					$u->category_id = $category_id;
					$u->catname = $catname;
					$u->amount = $amount;
					$u->description = $description;
					$u->expensedate = $expensedate;
					$u->created_date = $created_date;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}





		public function incomeReports($post)
		{
			$conn = $this->db->getconn();
			$income = $post['incomeName'];
			$from_date = $post['from_date'];
			$to_date = $post['to_date'];

			$sql = 'SELECT i.income_id, c.category_id, c.name, i.amount, i.description, i.date, i.created_date FROM extra_income i INNER JOIN incomecategory c ON c.category_id = i.category_id WHERE c.category_id = ? or i.date BETWEEN ? AND ?';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('iss', $income,$from_date,$to_date);
			$stmt->bind_result($income_id,$category_id, $catName, $amount, $description, $IncomeDate,$created_date);
			//var_dump($stmt->execute());
		
			if($stmt->execute()){
				$showAllCompanyArray = array();
				while($stmt->fetch()){
					$u = new Functions();
					$u->income_id = $income_id;
					$u->category_id = $category_id;
					$u->catName = $catName;
					$u->amount = $amount;
					$u->description = $description;
					$u->IncomeDate = $IncomeDate;
					$u->created_date = $created_date;
					array_push($showAllCompanyArray, $u);

				}
				$this->res->status = true;
				$this->res->msg = 'client fetched';
				$this->res->data['all'] = $showAllCompanyArray;
	
			}
			$stmt->close();
			return $this->res;

		}



	}

?>


