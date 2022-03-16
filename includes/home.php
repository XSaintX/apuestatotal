<!-- Header -->
<?php include "../header.php"?>
  <div class="container">
    <h1 class="text-center" >Billetero Virtual</h1>
      <a href="create.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Ingresar Nuevo</a>

        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th  scope="col">ID</th>
              <th  scope="col">Canal</th>
              <th  scope="col"> Cliente</th>
              <th  scope="col">Monto Depositado</th>
              <th  scope="col">Monto Ingresado</th>
              <th  scope="col" colspan="3" class="text-center"></th>
            </tr>  
          </thead>
            <tbody>
              <tr>
 
          <?php
            $query="SELECT b.idbilletero,i.monto AS monto_depositado,
            c.nombre AS Canal, cc.nombre AS Cliente,
            b.montoingresado AS monto_ingresado
            FROM `billeterovirtual` b
            INNER JOIN canales c ON b.idcanal=c.idcanal
            INNER JOIN info_cuenta i ON b.idvoucher=i.idvoucher
            INNER JOIN clientes cc ON i.playerid=cc.playerid";               
            $view_users= mysqli_query($conn,$query);    

            while($row= mysqli_fetch_assoc($view_users)){
              $idbilletero = $row['idbilletero'];                
              $monto_depositado = $row['monto_depositado'];        
              $Canal = $row['Canal'];         
              $Cliente = $row['Cliente']; 
              $monto_ingresado = $row['monto_ingresado'];   
              echo "<tr >";
              echo " <th scope='row' >{$idbilletero}</th>";
              echo " <td > {$Canal}</td>";
              echo " <td >{$Cliente} </td>";
              if ($monto_depositado == $monto_ingresado) {
                echo " <td> {$monto_depositado}</td>";
                echo " <td>{$monto_ingresado} </td>";
              }
              else {
                echo " <td style='background-color:red' > {$monto_depositado}</td>";
                echo " <td style='background-color:red' >{$monto_ingresado} </td>";
              }

              echo " <td class='text-center' > <a href='update.php?edit&id={$idbilletero}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";


              echo " </tr> ";
                  }  
                ?>
              </tr>  
            </tbody>
        </table>
  </div>

<!-- a BACK button to go to the index page -->
<div class="container text-center mt-5">
      <a href="../index.php" class="btn btn-warning mt-5"> Volver a Principal </a>
    <div>

<!-- Footer -->
<?php include "../footer.php" ?>