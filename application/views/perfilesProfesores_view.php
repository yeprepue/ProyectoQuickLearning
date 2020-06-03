<?php 
  $this->load->view('template/header');
  $this->load->view('template/menu');
  $session = $this->session->all_userdata();

?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12">
          
          
            </div>
        </div>
       

          
              <h1 class="text-center ">Teacher profiles</h1>
              <div class="table-responsive shadow p-3 mb-5 bg-white rounded">

                      <table class="table table-striped table-bordered" style="width:100%" id="tableTeacher">
                        <thead class="thead-dark">
                          <tr>
                            <th>Foto</th>
                            <th>Teachpal</th>
                            
                            <th>Description</th>
                            <?php if ($session['rol'] == "admin" || $session['rol'] == "superAdmin" || $session['rol'] == "monitor") { ?>
                              
                              <th>experiment</th>
                              <th>Cv</th>

                           <?php } ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($profesores as  $value) { 

                          ?>
                              
                              <tr>
                                  <td>
                                    <img src="<?php echo base_url()?>/assetsPanel/imagenes/<?php echo $value['photoProfile'] ?>"  style="width: 100px; height: 100px;" class="rounded">
                                  </td>
                                  <td><?php echo $value['firstname'] . " " . $value['lastname']; ?></td>
                                  
                                  <td><?php echo $value['description']?></td>

                                  <?php if ($session['rol'] == "admin" || $session['rol'] == "superAdmin" || $session['rol'] == "monitor") { ?>
                              
                                    <th>
                                      <?php echo $value['experiment']?>
                                    </th>

                                    <td>
                                      
                                      <a class="btn btn-success" href="<?php echo base_url().'assetsPanel/documentos/'.$value['cv'];?>" role="button">CV</a>
                                    </td>

                                 <?php } ?>
                                 <!-- <td>
                                    <a href="<?php echo base_url().'assetsPanel/documentos/'.$value['cv'];?>">aqui</a>
                                  </td>-->
                              </tr>
                          
                          <?php } ?>
                        </tbody>
                      </table>
                    
            
         
         
<?php 
  $this->load->view('template/footer');
?>