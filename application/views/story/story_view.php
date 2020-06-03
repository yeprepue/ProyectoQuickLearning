<?php
$this->load->view('template/header');
$this->load->view('template/menu');
?>

<div class="main">
    <div class="row">
        <div class="orange col-md-12"></div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="shadow p-3 mb-5  rounded">

                <h1 class="text-center">Story registration</h1>
                <form id="formRegisterStory" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title story</label>
                        <input type="text" class="form-control" id="storytitle" name="storytitle" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Image</label>
                        <input type="file" class="form-control" id="storyimage" name="storyimage" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Story</label>
                        <textarea type="text" class="form-control" id="story" name="story" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Sede</label>
                        <select name="storybranch" id="storybranch" class="form-control">
                            <option value="">Select branch</option>
                            <option value="">Todos</option>
                            <option value="">Rionegro</option>
                            <option value="">Medellín</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button id="btnRegisterStory" type="button" class="btn btn-primary">Register</button>
                    </div>
            </div>
            </form>
        </div>
        <div class="col-lg-8">
            <div class="shadow p-3 mb-5  rounded">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Activos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Inactivos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                    <!-- Tabla activos -->
                                    <div class="table-responsive">
                                        <table id="tblNoticiasActivas" style="width: 100%" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Story</th>
                                                    <th scope="col">Branch</th>
                                                    <th scope="col">State</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <!-- Fin tabla activos -->
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                    <table id="tblNoticiasInactivas" style="width: 100%" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Story</th>
                                                <th scope="col">Branch</th>
                                                <th scope="col">State</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <input type="hidden" name="idstory" id="idstory">
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>



<?php
$this->load->view('template/footer')
?>