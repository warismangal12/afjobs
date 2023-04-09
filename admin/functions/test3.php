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


