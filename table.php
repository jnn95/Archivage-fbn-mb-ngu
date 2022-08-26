
           <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Numéro</th>
                                                <th class="text-right">Noms d'utilisateurs</th>
                                                <th class="text-right">Rôle</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $aff0=new Webmaster("","","","");
                                                $aff0->Liste();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>Utilisateurs (Agent)</h3>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <?php
                                                    $sifa=new Service("","");
                                                    $sifa->ChargerService();
                                                ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>Noms</td>
                                                    <td>Téléphone</td>
                                                    <td>Adresse mail</td>
                                                    <td>Service</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $aff=new Agent("","","","","","","");
                                                    $aff->AfficherAgent();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Liste des archive</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <?php
                                                    $sifa=new Service("","");
                                                    $sifa->ChargerService();
                                                ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filtrer</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Date d'enregistrement</th>
                                                <th>Référence</th>
                                                <th>Agent émeteur</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $doc=new Document("","","","","","");
                                                $doc->AffDoc();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-8">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Service</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $obj=new Service("","");
                                                $obj->AffServ();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                <p>Copyright © <?php echo date("Y");?> Mbanza-Ngungu. Archivage-Document by <a href="https://jnn.com">Jnn-Soft</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
