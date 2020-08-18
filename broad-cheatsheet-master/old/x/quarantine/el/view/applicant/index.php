<?php
include_once '../partial/_header.php';

if ($_SESSION['acct_type']=='pos1' || $_SESSION['acct_type']=='pos2' || $_SESSION['acct_type']=='pos3') {
} else {
  header('location:/el/view/status/404.php');
  exit;
}
?>

<section id="view">
  <div class="form-group col-md-6">
    <!-- SEARCH INPUT -->
    <input class="form-control" type="text" name="q" placeholder="Search.." onkeyup="search(this.value)">
  </div>
  <!-- DATATABLES -->
  <div id="datatable">
    <?php
      require_once '../../controller/CRUDController.php';
      $object = new CRUDController;
      $object->index(null);
    ?>
  </div>
</section>

<section>
<!-- SHOW MODAL -->
  <div class="modal">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Info</h5>
          <button type="button" class="close" title="Close"
            onclick="document.querySelector('.modal').style.display='none'">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- SHOW FORM -->
        <div class="modal-body profile-info">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"
            onclick="document.querySelector('.modal').style.display='none'">Close</button>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once '../partial/_footer.php';?>