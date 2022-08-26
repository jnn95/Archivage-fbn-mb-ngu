<?php
    if(isset($_GET['ig'])){
        $x1=$_GET['ig'];
        $res=new Agent($x1,"","","","","","");
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
                                            <h3 class="text-center title-2">Personnel de la banque</h3>
                                        </div>
                                        <hr>
                                        <form action="AgentController.php" method="post">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Numéro de l'agent</label>
                                                        <input id="cc-pament" name="Id" type="text" value="<?php echo $x1; ?>" class="form-control" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nom de l'agent</label>
                                                <input id="cc-pament" name="Nom" type="text" value="<?php echo $res->GetNom(); ?>" class="form-control" required="required">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Postnom</label>
                                                <input id="cc-name" name="Psnom" type="text" value="<?php echo $res->GetPoNom(); ?>" required="required" class="form-control cc-name valid">
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Prénom</label>
                                                        <input id="cc-exp" name="Pnom" type="text" value="<?php echo $res->GetPreNom(); ?>" class="form-control cc-exp" autocomplete="cc-exp">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Téléphone</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="phone" required="required" type="tel" value="<?php echo $res->GetTel(); ?>" class="form-control cc-cvc">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Mail</label>
                                                <input id="cc-number" name="mel" type="text" value="<?php echo $res->GetMail(); ?>" class="form-control cc-number identified visa">
                                            </div>
                                            <div class="form-group">
                                                <label>Service</label>
                                                <input class="form-control" required value="<?php echo $res->GetServ(); ?>" name="Ids" list="datalistOptions" id="exampleDataList" placeholder="Choisir le service d'appartenance">
                                                <datalist id="datalistOptions" class="au-input au-input--full">
                                                    <?php 
                                                        $res=new Service("","");
                                                        $res->ChargerService();
                                                    ?>                   
                                                </datalist>
                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-lg btn-info " value="Sauvegarder" name="btnm">
                                            </div>
                                        </form>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>