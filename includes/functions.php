<?php

function displayAlert ($type, $alert) {

   if($type == 1) {
      echo '<div class="green">' . $alert . '</div>';
   } else {
      echo '<div class="red">' . $alert . '</div>';
   }

}

?>