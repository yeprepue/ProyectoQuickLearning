<?php 
  $this->load->view('template/header');
  $this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

       

            <div class="col-lg-10">
              <h1 class="text-center mt-3">Teachpal classifieds</h1>
              <div class="table-responsive shadow p-3 mb-5  rounded">

                      <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                        <thead class="thead-dark">
                          <tr>
                            <th>Rated By</th>
                            <th>Sede</th>
                            <th>Teachpal</th>
                            <th>Punctuality</th>
                            <th>Uniform</th>
                            <th>Neatness</th>
                            <th>Methodology</th>
                            <th>Instructions</th>
                            <th>Enthusiam</th>
                            <th>observations</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($historial as  $value) { 

                          ?>
                              
                              <tr>
                                  <td>
                                    <?php echo $value['calificadoPor']?>
                                  </td>
                                  <td><?php echo $value['sede']?></td>
                                  <td><?php echo $value['profesor']?></td>
                                  
                                  <td><?php echo $value['punctuality']?></td>
                                  <td><?php echo $value['uniform']?></td>
                                  <td><?php echo $value['neatness']?></td>
                                  <td><?php echo $value['methodology']?></td>
                                  <td><?php echo $value['instructions']?></td>
                                  <td><?php echo $value['enthusiam']?></td></td> 
                                  <td><?php echo $value['observaciones']?></td>
                                  <td>
                                    <?php echo $value['fechaCalificacion']?>
                                  </td>   
                              </tr>
                          
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
            
            </div>
         
<?php 
  $this->load->view('template/footer');
?>