<?php
    if(isset($_GET['id'])){
        $x=$_GET['id'];
        $res=new Document($x,"","","","","");
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
                                            <h3 class="text-center title-2">Document</h3>
                                        </div>
                                        <hr>
                                        <form action="DocController.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Code</label>
                                                <input id="cc-pament" name="cd" type="text" value="<?php echo $x;?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Titre du document</label>
                                                <input id="cc-pament" name="titre" type="text" value="<?php echo $res->GetTitre();?>" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Date de classement</label>
                                                <input id="cc-pament" name="dt" value="<?php echo $res->GetDt();?>" type="date" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Réf document</label>
                                                        <input id="cc-exp" name="ref" value="<?php echo $res->GetRef();?>" type="text" class="form-control cc-exp">
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <label for="x_card_code" class="control-label mb-1">Agent émeteur</label>
                                                    <input class="form-control" value="<?php echo $res->GetIdA();?>" name="code" list="datalistOptions" id="exampleDataList" placeholder="Choisir l'agent">
                                                    <datalist id="datalistOptions" class="au-input au-input--full">
                                                        <?php
                                                            $aff=new Agent("","","","","","","");
                                                            $aff->ChargerAgent();
                                                        ?>                   
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="payment-button" name="btnu" type="submit" class="btn btn-lg btn-info ">
                                                    <span id="payment-button-sending">Sauvegarder</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>