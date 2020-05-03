<?php

?>

<h1>Dodaj zdjęcie do galerii</h1>

<?php

if($_POST['add'] == 1) {

   $photo->addPhoto($_FILES, $_POST);
   
   }

?>

<a href="index.php"><button class="add">Strona główna</button></a>

<form enctype="multipart/form-data" action="index.php?page=add" method="POST">
<fieldset>
<legend>Dodawanie zdjęcia</legend>
<input type="hidden" name="add" value="1">
<input type="text" class="add" name="title" placeholder="Tytuł zdjęcia"><br>
<textarea name="desc" id="desc" cols="30" rows="8" class="add" placeholder="Dodaj krótki opis jeśli chcesz"></textarea><br>
<input type="file" class="add" name="photo" accept="image/jpeg" required  onchange="form.submit()"><br>
<span style="font-size: 12px">Plik z rozszerzeniem .jpg. Max rozmiar 4MB</span><br>
<button type="submit" name="addButton" class="add">Zapisz</button>
</fieldset>


</form>