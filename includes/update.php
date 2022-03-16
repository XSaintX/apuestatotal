<!-- Footer -->
<?php include "../header.php"?>

<?php

   if(isset($_GET['id']))
    {
      $billeteroid = $_GET['id']; 
    }
      $query="SELECT b.idbilletero,b.idvoucher,b.idcanal,b.idpromotor,b.montoingresado,i.monto
      FROM billeterovirtual b 
      INNER JOIN info_cuenta i ON b.idvoucher=i.idvoucher
      WHERE b.idbilletero = '{$billeteroid}'";
      $view_billetero= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_billetero))
      {
        $idbilletero = $row['idbilletero'];
        $idvoucher = $row['idvoucher'];
        $idcanal = $row['idcanal'];
        $idpromotor = $row['idpromotor'];
        $montodepositado = $row['monto'];
        $montoingresado = $row['montoingresado'];
      }
      $sql = "SELECT idvoucher,voucher FROM `info_cuenta` WHERE idvoucher= '{$idvoucher}'";
      $all_vouchers = mysqli_query($conn,$sql);
      $sql = "SELECT idpromotor,nombre FROM `promotor`";
      $all_promotores = mysqli_query($conn,$sql);
      $sql = "SELECT idcanal,nombre FROM `canales`";
      $all_canales = mysqli_query($conn,$sql);
 
    if(isset($_POST['update'])) 
    {
      $idcanal = $_POST['canal'];
      $idpromotor = $_POST['promotor'];
      $montoingresado = $_POST['canting'];
      $query = "UPDATE billeterovirtual SET idcanal = '{$idcanal}' , idpromotor = '{$idpromotor}', montoingresado = '{$montoingresado}' WHERE idbilletero = '{$billeteroid}'";
      $update_user = mysqli_query($conn, $query);

      if (!$update_user) {
        echo "something went wrong ". mysqli_error($conn);
      }
      else{
        echo "<script type='text/javascript'>alert('Billetero actualizado!')</script>";
        header("Location: home.php");
      }      
      
    }             
?>

<h1 class="text-center">Modificar Billetero Virtual</h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="promotor" class="form-label">Seleccione Promotor</label>
					<div class="col-sm-3">
						<select id="promotor" name="promotor" class="form-control">
               <?php 
                while ($promotores = mysqli_fetch_array(
                        $all_promotores,MYSQLI_ASSOC)):; 
                    echo '<option value="' . $promotores['idpromotor'].'"';
                    if( $idpromotor == $promotores['idpromotor'] ) { 
                      echo ' selected="selected"';
                    }
                    echo '>' . $promotores['nombre'] . '</option>';
                ?>
                
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
                    echo '<option value="' . $canales['idcanal'].'"';
                    if( $idcanal == $canales['idcanal'] ) { 
                        echo ' selected="selected"';
                    }
                    echo '>' . $canales['nombre'] . '</option>';
                ?>
                <?php 
                    endwhile; 
                ?>
						</select>
					</div>
      </div>

      <div class="form-group">
					<label for="voucher" class="form-label">voucher</label>
					<div class="col-sm-3">
						<select id="voucher" name="voucher" class="form-control" disabled="true">
							
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
              <input type="text" name="cantabon"  id="cantabon" class="inputvalues" value="<?php echo $montodepositado  ?>" readonly/><br>            
					</div>
			</div>

      <div class="form-group">
            <label for="canting" class="form-label">Cantidad Ingresada</label>
            <input name="canting"  class="form-control" value="<?php echo $montoingresado  ?>">
			</div>
      <small id="emailHelp" class="form-text text-muted">Esta informacion no se compartira con nadie mas.</small>
     

      <div class="form-group">
         <input type="submit"  name="update" class="btn btn-primary mt-2" value="Actualizar">
      </div>
    </form>    
  </div>

    <!-- a BACK button to go to the home page -->
    <div class="container text-center mt-5">
      <a href="home.php" class="btn btn-warning mt-5"> Regresar </a>
    <div>

<!-- Footer -->
<?php include "../footer.php" ?>