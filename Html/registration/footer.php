<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !='' ){
?>
<script>
    swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
});
<script/>
}