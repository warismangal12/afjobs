<?php

require_once 'BaseControler.php';

class UserData extends BaseControler {


    function __construct(){
        parent::__construct();

    }

    public function regUser( $post ) {

        $conn = $this->db->getconn();
        $name = $post['name'];
        $username = $post['username'];
        $password = sha1($post['password']);
        $company = $post['company'];
        $mobile = $post['mobile'];
        $email = $post['email'];


        $counter = 0;
        $sql = 'SELECT * FROM clientusers WHERE username=? ';
        $stmt = $conn->prepare( $sql );
        $stmt->bind_param( 's', $username );
        if ( $stmt->execute() ) {
            while ( $stmt->fetch() ) {
                $counter ++;
            }
        }
        
        //if the username is not in db then insert to the table
      

            $is_active = 0;
            $created_date = date( 'Y-m-d H:i:s' );
            $sql1 = 'INSERT INTO clientusers( name, username, password, company, mobile, email, is_active, created_date) VALUES (?,?,?,?,?,?,?,?)';
            $stmt = $conn->prepare( $sql1 );
            $stmt->bind_param( 'ssssisis', $name, $username, $password, $company, $mobile, $email, $is_active, $created_date );
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


    public function editUser( $post ) {

        $conn = $this->db->getconn();
        $name = $post['name'];
        $username = $post['username'];
       // $password = sha1($post['password']);
        $company = $post['company'];
        $mobile = $post['mobile'];
        $email = $post['email'];


        //if the username is not in db then insert to the table

        $id = $_GET['id'];

            $is_active = 1;
            $created_date = date( 'Y-m-d H:i:s' );
            $sql1 = 'UPDATE clientusers SET name =?, username =?, company =?, mobile =?, email =?, created_date = ? WHERE id = ?';
            $stmt = $conn->prepare( $sql1 );
            $stmt->bind_param( 'sssisii', $name, $username, $company, $mobile, $email, $created_date, $id );
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


    public function checklogin($post){


        $username = $post['username'];
        $password = sha1( $post['password'] );



        $conn = $this->db->getconn();
        $last_login = date( 'Y-m-d H:i:s' );
        $sql = 'SELECT id, username, role from clientusers WHERE username=? AND password=? AND is_active = 1';
        $stmt = $conn->prepare( $sql );
        $stmt->bind_param( 'ss', $username, $password );
        $stmt->bind_result( $id, $username, $role );
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        $stmt->fetch();

        echo $rows;
        if ( $rows ==1 ) {
            

            $_SESSION['id'] = $id;
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $role;

            $_SESSION['LAST_ACTIVITY'] = time();
            $update = 'UPDATE clientusers SET last_login= ? WHERE id = ?';
            $stmt2 = $conn->prepare( $update );
            $stmt2->bind_param( 'si', $last_login, $_SESSION['id'] );
            if ( $stmt2->execute() ) {
                $this->res->status = true;
                $this->res->msg = 'Last-login updated Successfull.';
            } else {
                $this->res->status = false;
                $this->res->msg = 'Failed to update Last-login.';
            }

            $this->res->status = true;
            $this->res->msg = 'login Successfull.';
        } else {

            $this->res->status = false;
            $this->res->msg = 'Failed to update Last-login.';
        }
        $stmt->close();
        return $this->res;


    }


    public function getAllUsers()
    {

        $conn = $this->db->getconn();
        $sql = 'SELECT id, name, username, company, mobile, email, role, is_active, last_login, created_date  from clientusers WHERE is_active = 1';
        $stmt = $conn->prepare($sql);
        $stmt->bind_result($id, $name, $username, $company, $mobile, $email, $role, $is_active, $last_login, $created_date);
        if ($stmt->execute()) {
            $clientusers = array();
            while ($stmt->fetch()) {
                $u = new userData();
                $u->id = $id;
                $u->name = $name;
                $u->username = $username;
                $u->moblie = $mobile;
                $u->company = $company;
                $u->email = $email;
                $u->role = $role;
                $u->is_active = $is_active;
                $u->last_login = $last_login;
                $u->created_date = $created_date;
                array_push($clientusers, $u);
            }
            $this->res->status = true;
            $this->res->msg = 'users fetched';
            $this->res->data['all'] = $clientusers;

        }
        $stmt->close();
        return $this->res;


    }


    public function getAllPendingUser()
    {

        $conn = $this->db->getconn();
        $sql = 'SELECT id, name, username, mobile, email, role, is_active, created_date  from clientusers WHERE is_active = 0';
        $stmt = $conn->prepare($sql);
        $stmt->bind_result($id, $name, $username, $mobile, $email, $role, $is_active, $created_date);
        if ($stmt->execute()) {
            $clientusers = array();
            while ($stmt->fetch()) {
                $u = new userData();
                $u->id = $id;
                $u->name = $name;
                $u->username = $username;
                $u->moblie = $mobile;
                $u->email = $email;
                $u->role = $role;
                $u->is_active = $is_active;
                $u->created_date = $created_date;
                array_push($clientusers, $u);
            }
            $this->res->status = true;
            $this->res->msg = 'users fetched';
            $this->res->data['all'] = $clientusers;

        }
        $stmt->close();
        return $this->res;


    }
    public function usersApproval1 ($post ) {

        $conn = $this->db->getconn();
        $is_active = 1;
        $id = $post['accept'];



        if (isset($_POST['accept'])) {
            $sql1 = 'UPDATE clientusers SET is_active = ? WHERE id = ?';
            $stmt = $conn->prepare($sql1);
           $stmt->bind_param('is', $is_active, $id);
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







    public function usersApproval0 ($post ) {

        $conn = $this->db->getconn();
        $is_active = 1;
        $id = $post['reject'];



        if (isset($_POST['reject'])) {
            $sql1 = ' DELETE FROM clientusers WHERE id = ?';
            $stmt = $conn->prepare($sql1);
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {


                $this->res->status = true;
                $this->res->msg = 'User Deleted successfully.';

            }
        }
        else {
            $this->res->status = false;
            $this->res->msg = 'Opera failed.';
        }

        $stmt->close();
        return $this->res;
    }





    public function getUserById($id){

        $conn = $this->db->getconn();
        $sql = 'SELECT id, name, username, company, mobile, email, role, created_date from clientusers WHERE id = ?';
        $stmt = $conn->prepare( $sql );
        $stmt->bind_param("i", $id);
        $stmt->bind_result($id, $name, $username, $company, $mobile, $email, $role, $created_date);
        if ( $stmt->execute() ) {
            $clientusers = array();
            while ( $stmt->fetch() ) {
                $u = new userData();
                $u->id = $id;
                $u->name = $name;
                $u->username = $username;
                $u->company = $company;
                $u->mobile = $mobile;
                $u->email = $email;

                $u->role = $role;

                $u->created_date = $created_date;
                array_push( $clientusers, $u );
            }
            $this->res->status = true;
            $this->res->msg = 'users fetched';
            $this->res->data['all'] = $clientusers;

        }
        $stmt->close();
        return $this->res;
    }



    public function changePassword( $post ) {
        $conn = $this->db->getconn();
        if($post['newpassword'] == $post['cnpassword']){
        $select = 'select * from clientusers WHERE id = ? AND password = ?';
        $stmt1 =  $conn->prepare($select);
        $old=sha1($post['oldpassword']);
    $stmt1->bind_param('is', $_SESSION['id'], $old );

        if ($stmt1->execute()){
            $stmt1->store_result();
            $row = $stmt1->num_rows;
            $stmt1->fetch();

            $up = 'UPDATE clientusers SET password = ? WHERE id = ?';
            $stmt = $conn->prepare($up);
        $new=sha1($post['newpassword']);

                $stmt->bind_param('si', $new, $_SESSION['id']);
                $stmt->execute();
                
                if ($stmt->execute()) {
                    $this->res->status = true;
                    $this->res->msg = 'user updated successfully.';
                }else{
                    $this->res->status = false;
            $this->res->msg = 'user update failed.';
                }
            $this->res->status = true;
            $this->res->msg = 'your password changed successfully.';
        } else {
            $this->res->status = false;
            $this->res->msg = 'user password wrong.';
            $error = $stmt->error;
            $stmt->close();
            throw new \Exception( $error );
        }
    }else{
 $this->res->status = false;
            $this->res->msg = 'New password does not match.';
    }
        return $this->res;
    }

    



}






?>
