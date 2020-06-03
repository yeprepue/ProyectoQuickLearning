<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
    $session = $this->session->all_userdata();
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

        <div class="row">
            
 

            <div class="col-lg-10 pt-3">
                <h1 class="text-center">Enter title and description</h1>
                <form id="formCargarTiulos" class="shadow p-3 mb-5  rounded">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="curso">Cursos</label>
                            <select name="curso" id="curso" class="form-control" required>
                                <option value="1">Boot 1</option>
                                <option value="2">Boot 2</option>
                                <option value="3">Boot 3</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                          <label for="numero_examen">Exam number</label>
                          <input type="number" class="form-control" id="numero_examen" name="numero_examen" required placeholder="enter answer">
                        </div>

                        <div class="col-md-12">
                            <label for="titulo">Exam title</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label for="video">Video ( url )</label>
                            <input type="text" name="video" id="video" class="form-control" >
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="descriptcion">Description</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                    
                </form>
                <h1 class="text-center">Enter exams</h1>
                <div class="col-md-12 text-center pt-3">
                    <button type="submit" id="buscarDataTitle" class="btn btn-success ">Search Title</button>
                </div>   
                <form id="formExamns" class="shadow p-3 mb-5  rounded">
                    <!--<input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $session['id_usuario']; ?>">-->
                    <div class="form-row">
                        <div class="col-md-12" id="titulos_registrados">
                            
                        </div>
                        <div class="col-md-12">
                            <label for="pregunta">Question</label>
                            <input type="text" name="pregunta" id="pregunta" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="respuesta">Reply</label>
                            <input type="text" name="respuesta" id="respuesta" class="form-control" required>
                        </div>
                        
                        <div class="col-md-12 text-center pt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div> 
               
                </form>

                
            </div>

        </div>
        
    </div>

    <div class="container">
        
    </div>

<?php 
	$this->load->view('template/footer')
?>