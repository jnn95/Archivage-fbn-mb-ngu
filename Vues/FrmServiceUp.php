<?php
    if(isset($_GET['id'])){
        $x=$_GET['id'];
        $res=new Service($x,"");
    }
?>
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">Modification</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Service de la banque</h3>
                                        </div>
                                        <hr>
                                        <form action="ServiceController.php" method="post">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Code</label>
                                                <input id="cc-pament" name="is" type="text" value="<?php echo $x;?>" class="form-control" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Libellé du service</label>
                                                <input id="cc-pament" name="libs" type="text" value="<?php echo $res->GetLib(); ?>" class="form-control" required="required">
                                            </div>
                                            <div>
                                                <input type="submit" name="btnu" value="Modifier" class="btn btn-lg btn-info">
                                            </div>
                                        </form>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>