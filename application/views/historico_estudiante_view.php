<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

         

            <div class="col-lg-10">

                <div class="table-responsive shadow p-3 mb-5  rounded">

                  <h1 class="text-center">Mis Notas</h1>

                <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                  <thead class="thead-dark">
                    <tr>
                      <th>Techpal</th>
                      <th >Class</th>
                      <th>Calificacion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($historico as  $value) { 

                    ?>
                        
                        <tr>
                            <td><?php echo $value['profesor']?></td>
                            <td><?php echo $value['clase']?></td>
                           
                            <td><?php echo $value['calificacion']?></td>
              
                        </tr>
                    
                    <?php } ?>
                  </tbody>
                </table>
                </div>
              
            </div>
        </div>
        
    </div>


<?php 
	$this->load->view('template/footer')
?>