<?php 
	$this->load->view("templatePublic/header.php");
	$this->load->view("templatePublic/menu");
?>

    <div class="container" style="width: 100%; height: 650px;">
        <div class="row box">
            <div class="col-xs-12 col-sm-12 col-lg-6">
                <div class="imgRes"></div>
            </div>

            <div class="col-xs-12 col-sm-12 col-lg-6 text-center ">
                <div style="margin: 15px 0 0 15px" class="register-form">
                    <h1 class="m-2">Register</h1>
                    <form id="formRegister" >
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user-circle-o fa-2x" style="color:#Ff4713" ></i></span>
                            <input name="firstname" id="firstname" type="text" class="form-control inp" placeholder="First Name" required>
                        </div>
                        <hr style="background: black; margin-top: -2px;">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user-circle-o fa-2x" style="color:#Ff4713" aria-hidden="true"></i></span>
                            <input name="lastname" id="lastname" type="text" class="form-control inp" placeholder="Last Name" required>
                        </div>
                        <hr style="background: black; margin-top: -2px;">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-id-card fa-2x" style="color:#Ff4713" aria-hidden="true"></i></span>
                            <input name="idpassport" id="idpassport" type="number" class="form-control inp" placeholder="ID" required>
                        </div>
                        <hr style="background: black; margin-top: -3px;">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-id-card fa-2x" style="color:#Ff4713" aria-hidden="true"></i></span>
                            <select name="Document" id="Document" class="form-control inp" required>
                                    <option value="Document type"><p style="color:#6c757d;">Document type </p></option>
                                   <option value="C.C">C.C </option>
                                   <option value="T.I">T.I</option>
                                   <option value="C.E">C.E</option>
                                   <option value="Passport">Passport</option>
                            </select>
                        </div>
                        <hr style="background: black; margin-top: -2px;">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope fa-2x" style="color:#Ff4713" aria-hidden="true"></i></span>
                            <input name="email" id="email" type="email" class="form-control inp" placeholder="Email" required>
                        </div>
                        <hr style="background: black; margin-top: -3px;">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-globe fa-2x" style="color:#Ff4713" aria-hidden="true"></i></span>
                            <select name="headquarters" id="headquarters" class="form-control inp" required>
							   <option value="headquarters">Headquarters</option>
                               <option value="medellin">Medellín</option>
							   <option value="rionegro">Rionegro</option>
                            </select>
                        </div>
                        <hr style="background: black; margin-top: -2px;">

                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-key fa-2x" style="color:#Ff4713" aria-hidden="true"></i></span>
                            <input name="pass" id="pass"  type="password" class="form-control inp" placeholder="Password" required>
                        </div>
                        <hr style="background: black; margin-top: -2px;">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-key fa-2x" style="color:#Ff4713" aria-hidden="true"></i></span>
                            <input type="password" name="pass2" id="pass2" class="form-control inp" placeholder="Repeat Password" required onblur="validarPass();">
                            <span id="msgError" style="color:red;"></span>
                        </div>
                        <hr style="background: black; margin-top: -1px;">
                        
                        <br><button type="submit" class="btn btn-primary btn-lg">Register</button></br>
                </form>
            </div>
        </div>
    </div>

<?php 
	$this->load->view("templatePublic/footer");
?>
