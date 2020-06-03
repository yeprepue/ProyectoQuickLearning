<?php 
  $this->load->view('template/header');
  $this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

       

            <div class="col-lg-10">
              <h1 class="text-center mt-3">Generate Reports</h1>
              <div class="table-responsive shadow p-3 mb-5  rounded">
                  <table class="table table-striped table-bordered" style="width:100%" id="">
                    <thead class="thead-dark">
                        <tr>
                          <th>Description</th>
                          <th>Button</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Cuantos estudiantes hay en la plataforma. (general students)</td>
                        <td>
                          <a target="blank" class="btn btn-success" href="<?php echo base_url()?>Panel/generateReports/1" role="button">PDF</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Cuantos estudiantes hay activo. (active students)</td>
                        <td>
                          <a target="blank" class="btn btn-success" href="<?php echo base_url()?>Panel/generateReports/2" role="button">PDF</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Cuantos estudiantes hay inactivos (No han programado o asistido a clases durante 2 meses mínimo) y no ha solicitado congelamiento. (inactive students)</td>
                        <td>
                          <a class="btn btn-success" href="#" role="button">PDF</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Cuantos estudiantes han solicitado congelamiento. (frozen students)</td>
                        <td>
                          <a target="blank" class="btn btn-success" href="<?php echo base_url()?>Panel/generateReports/4" role="button">PDF</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Estudiantes que lleven más de 19 meses en la plataforma y asistiendo a clases. (Active control record)</td>
                        <td>
                          <a class="btn btn-success" href="#" role="button">PDF</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Estudiantes que lleven más de 19 meses en la plataforma, pero luego dejan de asistir. (inactive control record)</td>
                        <td>
                          <a class="btn btn-success" href="#" role="button">PDF</a>
                        </td>
                      </tr>
                      <tr>
                        <td>Todos los estudiantes que solo vienen al start off</td>
                        <td>
                          <a class="btn btn-success" href="#" role="button">PDF</a>
                        </td>
                      </tr>

                      <tr>
                        <td>Los estudiantes que solo vienen al start off y no regresan (haven´t programmed) </td>
                        <td>
                          <a class="btn btn-success" href="#" role="button">PDF</a>
                        </td>
                      </tr>

                         
                    </tbody>
                </table>
                      
              </div>
            
            </div>
         
<?php 
  $this->load->view('template/footer');
?>
