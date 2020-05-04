<?php

class Photos {

   private $alert;
   private $alertType;

   public function getAllPhotos() {

      global $mysqli;

      $result = $mysqli->query("SELECT * FROM photos ORDER BY RAND()");
      return $result;

   }

   public function delPhoto($id) {

      global $mysqli;

      $result = $mysqli->query("DELETE FROM photos WHERE id='$id'");

      if(file_exists('photos/' . $id . '.jpg')) {
         unlink('photos/' . $id . '.jpg');
      }

      $this->alert = 'Zdjęcie zostało usunięte';
      $this->alertType = 1;
      displayAlert(1, $this->alert);

   }

   public function addPhoto($photo) {

      global $mysqli;

      if ($this->validateForm($photo)) {

         $title = htmlspecialchars($data['title']);
         $desc = htmlspecialchars($data['desc']);
         $date = date("d.m.Y");
         $mysqli->query("INSERT INTO photos VALUES ('', '$date')");

         $result = $mysqli->query("SELECT id FROM photos ORDER BY id DESC LIMIT 0,1");
         $row = $result->fetch_array(MYSQLI_ASSOC);
         $id = $row['id'];

         $this->saveFile($photo, $id);

         $this->alert = 'Zdjęcie zostało dodane';
         $this->alertType = 1;       

      }
      
      displayAlert($this->alertType, $this->alert);

   }

   private function saveFile($file, $id) {

      $uploads_dir = 'photos/';      
      $tmp_name = $file['photo']['tmp_name'];
      $name = $id.'.jpg';
      move_uploaded_file($tmp_name, $uploads_dir . $name);
      chmod($uploads_dir . $name, 0644);

   }

   private function validateForm($photo) {      

      if(!empty($photo['photo']['name'])) {   
         
         if($photo['photo']['size'] <= 4194304) {

            if($photo['photo']['type'] == 'image/jpeg') {

               return true;

            } else {

               $this->alert = 'Plik musi być obrazkiem w formacie jpeg';
               $this->alertType = 0;
               
            }

         } else {

            $this->alert = 'Plik nie może przekraczać rozmiaru 4MB.';
            $this->alertType = 0;

         }

      }

   }
   
}

?>