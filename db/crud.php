<?php
    class crud{ 
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }
        public function insertInvitees($fname, $lname,$email, $contact, $gender,$address, $city, $parish, $country, $avatar_path){
            try{  
                $sql = "INSERT INTO bridal_registry (firstname,lastname,emailaddress,contactnumber,gender_id, 'address' ,city, parish, country, avatar_path)
                VALUES (:fname,:lname,:email,:contact,:gender,:'address',:city,:parish,:country,:avatar_path)";
                
                $stmt = $this->db->prepare($sql);
  
                $stmt->bindparam(':fname',$fname );
                $stmt->bindparam(':lname',$lname );
                $stmt->bindparam(':email',$email );
                $stmt->bindparam(':contact',$contact );
                $stmt->bindparam(':gender',$gender );
                $stmt->bindparam(':address',$address );
                $stmt->bindparam(':city',$city );
                $stmt->bindparam(':parish',$parish );
                $stmt->bindparam(':country',$country );
                $stmt->bindparam(':destination',$avatar_path );

                $stmt->execute();
                return true;
                

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                
            }

        
        }

        public function editInvitee($id, $fname, $lname, $email, $contact, $gender, $address, $city, $parish, $country){
            try{
                $sql = "UPDATE `invitee` SET `firstname`=:fname,`lastname`=:lname, `emailaddress`=:email,`contactnumber`=:contact,
            `gender_id`=:gender, `address`=:'address',`city`=:city, `parish`=:parish,`country`=:country 
            WHERE  invitee_id =:id ";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id );
            $stmt->bindparam(':fname',$fname );
            $stmt->bindparam(':lname',$lname );
            $stmt->bindparam(':email',$email );
            $stmt->bindparam(':contact',$contact );
            $stmt->bindparam(':gender',$gender );
            $stmt->bindparam(':address',$address );
            $stmt->bindparam(':city',$city );
            $stmt->bindparam(':parish',$parish );
            $stmt->bindparam(':country',$country );
            $stmt->execute();
            return true;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getInvitees(){
            try{
                $sql = "SELECT * FROM `invitee` i inner join genders g on i.gender_id = g.gender_id";
            $result = $this->db->query($sql);
            return $result;

         }catch(PDOException $e) {
            echo $e->getMessage();
            return false;

         }     
            
        }

        public function getInviteeDetails($id){
            try{
                $sql = "select * from  invitee i inner join genders g on i.gender_id = g.gender_id
             where invitee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(); 
            return $result;

        }catch(PDOException $e) {
            echo $e->getMessage();
            return false;
            }
        }

        public function deleteInvitee($id){
            try{
                $sql = "delete from invitee where invitee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;

    }
    }

        public function getGenders(){
            try{
                $sql = "SELECT * FROM `genders`";
                $result = $this->db->query($sql);
                return $result;
            
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            
   } 
                
    }
          
}
    


?>