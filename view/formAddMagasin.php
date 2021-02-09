 <!-- Contact Section-->
 <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ajouter un nouveau magasin</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form method="post"  action="./controllers/create.php" id="contactForm" name="sentMessage" novalidate="novalidate">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Nom </label>
                                    <input name="name" class="form-control" id="name" type="text" placeholder="Nom du magasin " required="required" data-validation-required-message=" Entrez le Nom du magasin" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Emplacement</label>
                                    <input class="form-control" name="city" id="city" type="text" placeholder="Emplacement" required="required" data-validation-required-message="Entrez une ville." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Surface (m²)</label>
                                    <input class="form-control" name="size" id="size" type="number" placeholder="taille (m2)" required="required" data-validation-required-message="Choisissez la taille" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="control-group">
                                <div>
                                    <p class="font_type"> Plusieurs magasins disponibles :</p>
                                    <input type="radio" id="multi_store" name="multi_store" value="true" checked>
                                    <label for="true">oui</label>
                                </div>

                                <div>
                                    <input type="radio" id="multi-store" name="multi_store" value="false">
                                    <label for="dewey">non</label>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Catégorie</label>
                                    <select class="form-control font_type"  name="category"  id="category">
                                        <option value="jeux-video">
                                            Jeux Video
                                        </option>
                                        <option value="alimentation"  selected>
                                            Alimentation
                                        </option>
                                        <option value="electro-menager">
                                        electro-menager
                                        </option>
                                        <option value="pret-a-porter">
                                        pret-a-porter
                                        </option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" type="submit">Send</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>