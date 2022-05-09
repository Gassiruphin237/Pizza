<form action="" method="post">
        <div  class="modal fade bd-example-modal-lg" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" id="modal" style="">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Update your account !!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <label for="nom" class="text-dark">Nom</label>
                                    </p>
                                    <p>
                                        <input type="text" class="form-control"
                                            value="<?php echo $_SESSION['Nom'];  ?>" name="nom" id="nom">
                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <label for="prenom" class="text-dark">Prenom</label>
                                    </p>
                                    <p> <input type="text" class="form-control"
                                            value="<?php echo $_SESSION['Prenom'];?>" name="prenom"
                                            id="prenom">
                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <label for="tel" class="text-dark">Téléphone</label>
                                    </p>
                                    <p><input type="text" class="form-control"
                                            value="<?php echo $_SESSION['Tel'];?>" name="tel" id="tel">
                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <label for="username" class="text-dark">username</label>
                                    </p>
                                    <p><input type="text" class="form-control"
                                            value="<?php echo $_SESSION['Username']; ?>" name="username"
                                            id="username">
                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <p>

                                        <label for="pass" class="text-dark">password</label>
                                    </p>
                                    <p>
                                        <input type="password" class="form-control"
                                        value="<?php echo $_SESSION['Pass']; ?>" name="pass" id="pass">
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>