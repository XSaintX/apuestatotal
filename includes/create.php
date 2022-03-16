<!-- Header -->
<?php  include "../header.php" ?>

<?php
  
    $sql = "SELECT idvoucher,voucher FROM `info_cuenta` WHERE ingresado<>1 ORDER BY idvoucher";
    $all_vouchers = mysqli_query($conn,$sql);
    $sql = "SELECT idpromotor,nombre FROM `promotor`";
    $all_promotores = mysqli_query($conn,$sql);
    $sql = "SELECT idcanal,nombre FROM `canales`";
    $all_canales = mysqli_query($conn,$sql);
    
?>
<?php 
  if(isset($_POST['create'])) 
    {
        $promotor = $_POST['promotor'];
        $canal = $_POST['canal'];
        $vouch = $_POST['voucher'];
        $canting = $_POST['canting'];
        if ($vouch=="1") { 
          echo "<script type='text/javascript'>alert('Elija un voucher')</script>";
        }  
        else{
            
          $query= "INSERT INTO billeterovirtual(idvoucher, idcanal, idpromotor, montoingresado) VALUES('{$vouch}','{$canal}','{$promotor}','{$canting}')";
          $add_billetero = mysqli_query($conn,$query);
      
          if (!$add_billetero) {
            echo "something went wrong ". mysqli_error($conn);
          }

          else { 
            $query= "UPDATE info_cuenta SET ingresado=1 WHERE idvoucher='{$vouch}'";
            $update_statusvoucher = mysqli_query($conn,$query);
            if (!$update_statusvoucher) {
              echo "something went wrong ". mysqli_error($conn);
            }
            else{
              echo "<script type='text/javascript'>alert('Agregado al billetero!')</script>";
              header("Location: home.php");
            }
          }   
        }      
    }
?>

<h1 class="text-center">Agregar </h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="promotor" class="form-label">Seleccione Promotor</label>
					<div class="col-sm-3">
						<select id="promotor" name="promotor" class="form-control">
               <?php 
                while ($promotores = mysqli_fetch_array(
                        $all_promotores,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $promotores["idpromotor"];
                    ?>">
                        <?php echo $promotores["nombre"];
                        ?>
                    </option>
                <?php 
                    endwhile; 
                ?>
						</select>
					</div>        
      </div>

      <div class="form-group">
        <label for="canal" class="form-label">Seleccione Canal</label>
					<div class="col-sm-3">
						<select id="canal" name="canal" class="form-control">
               <?php 
                while ($canales = mysqli_fetch_array(
                        $all_canales,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $canales["idcanal"];
                    ?>">
                        <?php echo $canales["nombre"];
                        ?>
                    </option>
                <?php 
                    endwhile; 
                ?>
						</select>
					</div>
      </div>
    
      <div class="form-group">
					<label for="voucher" class="form-label">Seleccione voucher</label>
					<div class="col-sm-3">
						<select id="voucher" name="voucher" class="form-control">
							
               <?php 
                while ($vouchers = mysqli_fetch_array(
                        $all_vouchers,MYSQLI_ASSOC)):; 
                ?>
                  
                    <option value="<?php echo $vouchers["idvoucher"];
                    ?>">
                        <?php echo $vouchers["voucher"];
                        ?>
                    </option>
                <?php 
                    endwhile; 
                ?>
						</select>
              <label for="cantabon" class="form-label"><span style="color: red">Cantidad Abonada</span></label>
              <input type="text" name="cantabon"  id="cantabon" class="inputvalues" readonly/><br>            
					</div>
			</div>
				
      <div class="form-group">
            <label for="canting" class="form-label">Cantidad Ingresada</label>
            <input name="canting"  class="form-control">
			</div>
      <div class="form-group">
        <input type="submit"  name="create" class="btn btn-primary mt-2" value="Agregar">
      </div>
    </form> 
  </div>

   <!-- a BACK button to go to the home page -->
  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
  <div>
    <script>
      $(document).ready(function(){
        $('#voucher').change(function(){
          var voucher = $(this).val();
          var data_String;
          data_String = 'idvoucher='+voucher;
          $.post('showmonto.php',data_String,function(data){
            var data = data;
            $('#cantabon').val(data);
          });
        });
      });
    </script>

<!-- Footer -->
<?php include "../footer.php" ?>