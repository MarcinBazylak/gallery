<?php

class Photos {

   private $alert;
   private $alertType;

   public function getAllPhotos() {

      global $mysqli;

      $result = $mysqli->query("SELECT * FROM photos ORDER BY id DESC");
      return $result;

   }

   public function getUploadedPhotos($q) {

      global $mysqli;

      $result = $mysqli->query("SELECT * FROM photos ORDER BY id DESC LIMIT 0,$q");
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

   public function addPhoto($photos) {

      global $mysqli;
      $j = 0;

      foreach($photos as $photo) {

         echo $photos[$value][$key];

         $name = $photo['name'];
			$size = $photo['size'];
         $tmpName = $photo['tmp_name'];
         $count = count($name);

          for($i = 0; $i < $count; $i++ ) {
            
            if ($this->validateForm($photo, $i)) {

               $date = date("d.m.Y");
               $mysqli->query("INSERT INTO photos VALUES ('', '$date')");

               $result = $mysqli->query("SELECT id FROM photos ORDER BY id DESC LIMIT 0,1");
               $row = $result->fetch_array(MYSQLI_ASSOC);

               $this->saveFile($tmpName[$i], $row['id']);

               $j++;

            }
            
         }

      }

      if($j > 0) {

         $this->alert = 'Dodano zdjęcia w ilości ' . $j . ' sztuk.';
         $this->alertType = 1;

      }    
      
      displayAlert($this->alertType, $this->alert);
      return $j;

   }

   private function saveFile($file, $id) {

      $uploads_dir = 'photos/';      
      $tmp_name = $file;
      $name = $id.'.jpg';
      move_uploaded_file($tmp_name, $uploads_dir . $name);
      chmod($uploads_dir . $name, 0644);

   }

   private function validateForm($photo, $i) {     

      if(!empty($photo['name'][$i])) {   
         
         if($photo['size'][$i] < 4194304) {

            if($photo['type'][$i] == 'image/jpeg') {

               return true;

            } else {

               $this->alert = 'Plik ' . $photo['name'][$i] . ' musi być obrazkiem w formacie jpeg';
               $this->alertType = 0;
               
            }

         } else {

            $this->alert = 'Plik ' . $photo['name'][$i] . ' nie może przekraczać rozmiaru 4MB.';
            $this->alertType = 0;

         }

      }

   }
   
}

?>