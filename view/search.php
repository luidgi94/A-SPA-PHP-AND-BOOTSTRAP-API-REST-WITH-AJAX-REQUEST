   <!-- About Section-->
   <section class="page-section bg-primary text-white mb-0" id="about">

            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white"><i class="fas fa-search mr-2"></i> Recherche </h2>

                <!-- Icon Divider-->
                <div class="divider-custom divider-light">

                    <div class="divider-custom-line"> </div>
                    <div class="divider-custom-icon"> <i class="fas fa-star"> </i> </div>
                    <div class="divider-custom-line"> </div>

                </div>

                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ml-auto"><p class="lead">Lancez une recherche de magasins</p></div>
                    <div class="col-lg-4 mr-auto"><p class="lead">Vous pouvez customiser votre recherche en remplissant les champs ci-dessous</p></div>
                </div>

                <div class="container">

                
                   
                    <div class="row control-group">
                    
                        <div class="mx-auto" style="margin-top: -7px;">
                            <p class="font_type"> Rechercher par :</p>
                        </div>

                        <div class="mx-auto">
                            <input type="radio" id="name_search" name="input_search" onclick="showSearchForm('name_search')" value="name_shop">
                            <label for="name_shop">Nom</label>
                        </div>

                        <div class="mx-auto">
                            <input type="radio" id="city_search" name="input_search" onclick="showSearchForm('city_search')" value="city_shop">
                            <label for="city_shop">Ville</label>
                        </div>

                        <div class="mx-auto">
                            <input type="radio" id="size_search" name="input_search" onclick="showSearchForm('size_search')" value="size_shop">
                            <label for="size_shop">Taille</label>
                        </div>

                        <div class="mx-auto">
                            <input type="radio" id="category_search" name="input_search" onclick="showSearchForm('category_search')" value="category_shop">
                            <label for="category_shop">Catégorie </label>
                        </div>

                        <div class="mx-auto">
                            <input type="radio" id="name_city_search" name="input_search"  onclick="showSearchForm('name_city_search')" value="name_city_shop" checked>
                            <label for="name_city_shop">Nom et emplacement </label>
                        </div>
                        
                        <div class="mx-auto">
                            <input type="radio" id="all_search" name="input_search" onclick="showSearchForm('all_search')" value="all_search">
                            <label for="all_search">Tous les champs </label>
                        </div>

                    </div>
                    
                
                
            
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto" >
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form method="post" id="searchForm" name="sentMessage" novalidate="novalidate">
                            <div class="control-group" id="divName">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Nom </label>
                                    <input name="name" class="form-control" id="nameSearch" type="text" placeholder="Nom du magasin " required="required" data-validation-required-message=" Entrez le Nom du magasin" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group" id="divCity">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Emplacement</label>
                                    <input class="form-control" name="citySearch" id="citySearch" type="text" placeholder="Emplacement" required="required" data-validation-required-message="Entrez une ville." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group" id="divSize">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Surface minimale (m²)</label>
                                    <input class="form-control" name="size" id="sizeSearch" type="number" placeholder="Surface minimale (m²)" required="required" data-validation-required-message="Choisissez la taille" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="control-group" id="divMulti_store" style="display:none">
                                <div>
                                    <p class="font_type"> Plusieurs magasins disponibles :</p>
                                    <input type="radio" id="multi_store_tSearch" name="multi_store" value="true" >
                                    <label for="true">oui</label>
                                </div>

                                <div>
                                    <input type="radio" id="multi_store_fSearch"  name="multi_store" value="false">
                                    <label for="false">non</label>
                                </div>
                                <div>
                                    <input type="radio" id="multi_store_tfSearch"  name="multi_store" value="true && false"  checked>
                                    <label for="true && false">peu importe</label>
                                </div>
                            </div>


                            <div class="control-group" id="divCategory" style="display:none" >
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Catégorie</label>
                                    <select class="form-control font_type"  name="category"  id="categorySearch">
                                        <option value="jeux-video">
                                        Jeux Video  
                                        </option>
                                        <option value="alimentation"  >
                                        Alimentation
                                        </option>
                                        <option value="electro-menager">
                                        electro-menager
                                        </option>
                                        <option value="pret-a-porter">
                                        pret-a-porter
                                        </option>
                                        <option value="toutes" selected>
                                        toutes
                                        </option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="successSearch"></div>
                            <div class="form-groupSearch"></div>

                            <!-- About Section Button-->
                            <div class="text-center mt-4">

                             <a class="js-scroll-trigger" href="#portfolio"><button class="btn btn-primary btn-xl btn-outline-light" onclick="search()" type="button"><i class="fas fa-download mr-2"></i>  Lancer la recherche</button></a>
                                <!-- <span class="btn btn-xl "></span> -->
                                    
                            </div>

                        </form>
                    </div>
                </div>
            </div>



              
            </div>
    </section>