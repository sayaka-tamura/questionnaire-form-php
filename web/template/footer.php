<!--===============================================================================================-->
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendors/bootstrap/js/popper.js"></script>
  <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendors/select2/select2.min.js"></script>
  <script>
    $(".selection-2").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

<script>
function checkOff(){

    //チェックボックスの現在のステータスを取得
    chk_status = $("#dm-check").prop("checked");
    
    //取得したステータスが true なら false を、 false なら true をセットする
    if(chk_status){
        //チェックボックスをOFFにする（チェックを外す）。
        $("#dm-check").prop("checked", false);
    }

};
</script> 