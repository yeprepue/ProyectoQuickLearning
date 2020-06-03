<?php 
	$this->load->view('template/header');
	$this->load->view('template/menu');
?>

    <div class="main">
        <div class="row">
            <div class="orange col-md-12"></div>
        </div>

            <div class="col-lg-10">
                <div class="shadow p-3 mb-5  rounded">
                    
                    <h1 class="text-center">teacher registration</h1>
                    <form id="formRegisterTeacher">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="firstname">First Name</label>
                              <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="lastname">Last Name</label>
                              <input type="text" name="lastname" class="form-control" id="lastname" required>
                            </div>
                          
                            <div class="form-group col-md-6">
                                <label for="idpassport">ID</label>
                                <input type="number" name="idpassport" class="form-control" id="idpassport" required>
                            </div>
                            <div class="form-group col-md-6">
                                
                                <label for="Document">Document</label>
                                <select id="Document" name="Document" class="form-control" required>
                                    <option value="C.C">C.C </option>
                                    <option value="T.I">T.I</option>
                                    <option value="C.E">C.E</option>
                                    <option value="Passport">Passport</option>
                                </select>
                               
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pass">Password</label>
                                <input type="password" name="pass" class="form-control" id="pass" required>
                            </div>
                             
                            <div class="form-group col-md-6">
                                <label for="headquarters">Headquarters</label>
                                <select id="headquarters" name="headquarters" class="form-control" required>
                                <option value="medellin">Medellin</option>
                                <option value="rionegro">Rionegro</option>
                                </select>
                            </div> 

                            <div class="form-group col-md-6">
                                <label for="phone">phone</label>
                                <input type="number" name="phone" class="form-control" id="phone" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone_reference">phone Reference</label>
                                <input type="number" name="phone_reference" class="form-control" id="phone_reference" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="direccion">Direccion</label>
                                <textarea class="form-control" name="direccion" id="direccion" placeholder="Ingrese la direccion" required></textarea>
                            </div> 

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div> 
                   
                    </form>
        
                </div>
            </div>
        </div>
        
    </div>

    

<?php 
	$this->load->view('template/footer')
?>