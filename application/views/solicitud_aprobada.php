<table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
    <thead class="thead-dark">
        <tr>
          <th>Request</th>
          <th>Description</th>
          <th>Allow</th>
          <th>Certificado</th>
        </tr>
    </thead>
    <tbody>
          <?php foreach ($solicitudes as  $value) { 

          ?>
                              
          <tr>
  
              <td>
                <?php 
                    if ($value['solicitud'] == 1) {
                        echo "Study certificate";
                    }elseif($value['solicitud'] == 3){
                      echo "Layoff letter";                        
                    }elseif($value['solicitud'] == 4){
                      echo "Enrollment certificate";
                    }elseif($value['solicitud'] == 5)
                    {
                      echo "Update payment certificate";
                    }else{
                      echo "Frozen process letter";
                    }
                ?>
              </td>
              <td>
                <?php echo $value['descripcion']?>

                    <?php if($value['solicitud'] == 2){ ?>

                            <hr>Suspension deadline
                            <?php echo $value['fechaInactividad']?>

                      <?php } ?>
                                    
              </td>
              <td>
              <?php 
                    if ($value['status'] == 1) {
                        echo "Approved";
                    }else{
                        echo "Pending";
                    }
                ?>
              </td>  
              <td>

                <?php 
                    if ($value['status'] == 1 && $value['solicitud'] == 1) { ?>
                      <a class="btn btn-success" href="<?php echo base_url().'Panel/generatePdf/'.$value['id_solicitudes']; ?>" target="blank" role="button">Pdf</a>
                       
                  <?php  }elseif($value['status'] == 1 && $value['solicitud'] == 3){ ?>
                        
                     <a class="btn btn-success" href="<?php echo base_url().'Panel/generatePdf/'.$value['id_solicitudes']; ?>" target="blank" role="button">Pdf</a>

                  <?php  }elseif($value['status'] == 1 && $value['solicitud'] == 4){ ?>
                     <a class="btn btn-success" href="<?php echo base_url().'Panel/generatePdf/'.$value['id_solicitudes']; ?>" target="blank" role="button">Pdf</a>

                  <?php }elseif($value['status'] == 1 && $value['solicitud'] == 5){ ?>

                      <a class="btn btn-success" href="<?php echo base_url().'Panel/generatePdf/'.$value['id_solicitudes']; ?>" target="blank" role="button">Pdf</a>

                  <?php }else{?> 
                    <button type="button" class="btn btn-success" disabled>Pdf</button>
                  <?php } ?> 
   
              </td>

          </tr>
                          
        <?php } ?>
    </tbody>
</table>