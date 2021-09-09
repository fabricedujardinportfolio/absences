<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) :
?>
<?php
  header("refresh:0; views/login.php");
else :
?>
<div class="container">
    <form enctype="multipart/form-data" action="views/import_csv.php" method="post">
        <div class="input-group d-flex align-items-center d-flex" style="height:50px;border: 7px double red;border-color:#2e4f9b;width: fit-content;">
            <input  type="file" name="file" id="file" accept=".csv" class="h-auto">
            <button class="btn-submit btn rounded h-100"  style="background-color: #2e4f9b; !important;color: white;!important;padding:2px; !important" type="submit" id="submit" name="import">Import</button>
            <br />
        </div>
    </form>
</div>
<?php endif;