<?php 
	$this->load->view("templatePublic/header.php");
	$this->load->view("templatePublic/menu");
?>

<div class="container">
        <div class="row box">
            <div class="col-xs-12 col-sm-12 col-lg-6">
                <div class="imgLogin"></div>
            </div>

            <div class="col-xs-12 col-sm-12 col-lg-6 text-center ">
                <div class="login-form">
                    <h1 class="m-5" style="font-size: 23px;">Members Log in</h1>
                    <form id="formLogin">
                        <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user-circle fa-2x" style="color:#Ff4713" aria-hidden="true"></i></span>
                            <select class="form-control inp" name="typeUser" id="typUser">
                               <option value="">Select User</option>
                               <option value="superAdmin">Administrador</option>
                               <option value="estudiante">Student</option>
                               <option value="profesor">Teachpal User</option>
                               <option value="admin">Academic Manager</option>
                               <option value="monitor">Monitor</option>
                               <option value="secretaria">Recepcionist</option>
                            </select>
                        </div>
                        <hr style="background: black; margin-top: -2px;">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user-circle-o fa-2x" style="color:#Ff4713" ></i></span>
                            <input type="email" class="form-control inp" placeholder="User" name="email" id="email">
                        </div>
                        <hr style="background: black; margin-top: -2px;">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-key fa-2x" style="color:#Ff4713;" aria-hidden="true"></i></span>
                            <input type="password" name="pass" id="pass" class="form-control inp" placeholder="Password">
                        </div>
                        <hr style="background: black; margin-top: -2px;">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-map-marker fa-2x" style="color:#Ff4713;" aria-hidden="true"></i></span>
                            <select class="form-control inp" name="sede" id="sede">
                               <option value=""> Branch</option>
                               <option value="medellin">Medellín</option>
                               <option value="rionegro">Rionegro</option>
                               <option value="todos">Admin</option>
                            </select>
                        </div>
                        <hr style="background: black;  margin-top: -1px;  ">
                        <br>
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                            Remember Me?
                        </label>
                        </div>
                        <button type="button" id="btnLogin" class="btn btn-primary btn-lg bot m-2">Log In</button>
                    </form>
                    <div class="form-check">
                        <label class="form-check-label" for="exampleRadios1">
                        Don't have an account? <a href="<?php echo base_url()?>Register" style="color:#ff4713;text-decoration:underline">REGISTER HERE</a> 
                    </label>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php 
	$this->load->view("templatePublic/footer");
?>