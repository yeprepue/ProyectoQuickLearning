<!-- nav -->
    <style>
    .active {
    background-color: #Ff4713;
	
}
li:hover {
  background-color: #Ff4713;

}

    </style>
	<nav class="navbar-expand-md navbar-dark fixed-top bg-light">
        <!--<a class="navbar-brand" href="#">
            <img src="img/quick.png" width="30" height="30" class="d-inline-block align-top" alt=""> Quick Learning
        </a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>Login">Log in <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>Register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>Contact">Contact us</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- fin nav -->
