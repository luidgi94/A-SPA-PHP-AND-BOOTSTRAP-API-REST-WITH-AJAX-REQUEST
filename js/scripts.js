




//READ  ALL STORES/////////////////////

$(document).ready(function(){
    $.get("./controllers/read.php", function(data){
      res = $.parseJSON(data);
      let liste = document.getElementById('item_test');
      let modalListe = document.getElementById('modalList');
      res.forEach(element => {
        let image= ''
        let availability = ''
        switch (element.category){
            case 'jeux-video':
              image = 'assets/img/portfolio/game.png';
              break

            case 'pret-a-porter':
              image = 'assets/img/portfolio/circus.png';
              break

            case 'alimentation':
              image = 'assets/img/portfolio/cake.png';
              break
            case 'electro-menager':
              image = 'assets/img/portfolio/cabin.png';
              break
                
        }

        switch (element.multi_store){
            case 'true':
              availability = '( Plusieurs magasins disponibles dans differents emplacements)';
              break

            case 'false':
              availability = '(Un seul magasin disponible)';
              break

                
        }


////// FORM UPDATE : 
                
        var formupdate = '<div class="row">'+
        '                    <div class="col-lg-8 mx-auto">'+
        '                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->'+
        '                        <form method="post"  action="" id="updateFormPost'+ element.id +'" name="sentMessage" novalidate="novalidate">'+
        '                            <div class="control-group">'+
        '                                <div class="form-group floating-label-form-group controls mb-0 pb-2">'+
        '                                    <label>Nom </label>'+
        '                                    <input name="name" class="form-control" id="name'+ element.id +'" type="text" value="'+ element.name +'" placeholder="Nom du magasin" required="required" data-validation-required-message=" Entrez le Nom du magasin" />'+
        '                                    <p class="help-block text-danger"></p>'+
        '                                </div>'+
        '                            </div>'+
        '                            <div class="control-group">'+
        '                                <div class="form-group floating-label-form-group controls mb-0 pb-2">'+
        '                                    <label>Emplacement</label>'+
        '                                    <input class="form-control" name="city" id="city'+ element.id +'" type="text" value="'+ element.city +'" placeholder="Emplacement" required="required" data-validation-required-message="Entrez une ville." />'+
        '                                    <p class="help-block text-danger"></p>'+
        '                                </div>'+
        '                            </div>'+
        '                            <div class="control-group">'+
        '                                <div class="form-group floating-label-form-group controls mb-0 pb-2">'+
        '                                    <label>Surface (m²)</label>'+
        '                                    <input class="form-control" name="size" id="size'+ element.id +'" type="number" value="'+ element.size +'" placeholder="taille (m2)" required="required" data-validation-required-message="Choisissez la taille" />'+
        '                                    <p class="help-block text-danger"></p>'+
        '                                </div>'+
        '                            </div>'+
        ''+
        '                            <div class="control-group">'+
        '                                <div>'+
        '                                    <p class="font_type"> Plusieurs magasins disponibles :</p>'+
        '                                    <input type="radio" id="multi_store_t'+ element.id +'" name="multi_store" value="true" '+ (element.multi_store == "true" ? "checked" : "")  +'>'+
        '                                    <label for="true">oui</label>'+
        '                                </div>'+
        ''+
        '                                <div>'+
        '                                    <input type="radio" id="multi_store_f'+ element.id +'" name="multi_store" value="false"'+ (element.multi_store == "false" ? "checked" : "") +'>'+
        '                                    <label for="dewey">non</label>'+
        '                                </div>'+
        '                            </div>'+
        ''+
        ''+
        '                            <div class="control-group">'+
        '                                <div class="form-group floating-label-form-group controls mb-0 pb-2">'+
        '                                    <label>Catégorie</label>'+
        '                                    <select class="form-control font_type"  name="category"  id="category'+ element.id +'">'+
        '                                        <option value="jeux-video" '+ (element.category == "jeux-video" ? "selected" : "") +'>'+
        '                                            Jeux Video'+
        '                                        </option>'+
        '                                        <option value="alimentation" '+ (element.category == "alimentation" ? "selected" : "") +'>'+
        '                                            Alimentation'+
        '                                        </option>'+
        '                                        <option value="electro-menager" '+ (element.category == "electro-menager" ? "selected" : "") +'>'+
        '                                        electro-menager'+
        '                                        </option>'+
        '                                        <option value="pret-a-porter" '+ (element.category == "pret-a-porter" ? "selected" : "") +'>'+
        '                                        pret-a-porter'+
        '                                        </option>'+
        '                                    </select>'+
        '                                    <p class="help-block text-danger"></p>'+
        '                                </div>'+
        '                            </div>'+
        '                            <br />'+
        '                            <div id="success'+ element.id +'"></div>'+
        '                            <div class="form-group'+ element.id +'"><button class="btn btn-primary btn-xl" onclick="updateById('+ element.id +')" type="button">Send</button></div>'+
        '                        </form>'+
        '                    </div>'+
        '                </div>';
          



     
        let modal = '<div class="portfolio-modal modal fade" id="modal'+ element.id +'" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true"><div class="modal-dialog modal-xl" role="document"><div class="modal-content"><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button><div class="modal-body text-center"><div class="container"><div class="row justify-content-center"><div class="col-lg-8"><h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label"><i class="fas fa-store-alt mr-2"></i>'+ element.name+'</h2><div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div<div class="divider-custom-line"></div></div><img class="img-fluid rounded mb-5" src="'+ image +'" alt="" /> <div id="description'+ element.id +'"> <p class="mb-5"> <strong>Nom du magasin</strong>  : '+ element.name +'</p> <p class="mb-5"> <strong>Type de magasin</strong> : ' + element.category + '</p> <p class="mb-5"> <strong>Taille du magasin</strong> : ' + element.size + ' m² </p> <p class="mb-5"> <strong>Emplacement du magasin</strong>   : ' + element.city + ' </p> <p class="mb-5"><strong>Disponibilité</strong> : ' + availability + '</p> </div> <div> <div style="display:none" id="updateForm'+ element.id + '">'+ formupdate +'</div> <button data-id="' + element.id +'"  onclick="showUpdateForm(' + element.id +')" class="btn btn-success edit mr-2"><i class="fas fa-edit mr-2"></i> Éditer Magasin</button> <button data-id="'+ element.id +'"  onclick="deleteById('+ element.id +')"  type="button" class="btn btn-danger delete mr-2" data-dismiss="modal"><i class="fas fa-trash mr-2"></i>Supprimer Magasin</button> <button class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times fa-fw mr-2"></i>Fermer la fenêtre</button></div></div></div></div></div></div></div></div>'
      
        liste.innerHTML += '<div class="col-md-6 col-lg-4 mb-5" id="miniature'+ element.id +'"> <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#modal'+ element.id +'">  <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100"> <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>  </div> <img class="img-fluid" src="'+ image +'" alt="" />  </div>  </div>';
    
        modalListe.innerHTML += modal


      });
    });
  });


  

  function showUpdateForm(id) {
    var x = document.getElementById("updateForm" + id);
    var y = document.getElementById("description" + id);
    if (x.style.display === "none") {
      x.style.display = "block";
      y.style.display = "none";
    } else {
      x.style.display = "none";
      y.style.display = "block";
    }
  }







/*!
    * Start Bootstrap - Freelancer v6.0.5 (https://startbootstrap.com/theme/freelancer)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
    */
   (function($) {
    "use strict"; // Start of use strict
  
    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: (target.offset().top - 71)
          }, 1000, "easeInOutExpo");
          return false;
        }
      }
    });
  
    // Scroll to top button appear
    $(document).scroll(function() {
      var scrollDistance = $(this).scrollTop();
      if (scrollDistance > 100) {
        $('.scroll-to-top').fadeIn();
      } else {
        $('.scroll-to-top').fadeOut();
      }
    });
  
    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
      $('.navbar-collapse').collapse('hide');
    });
  
    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
      target: '#mainNav',
      offset: 80
    });
  
    // Collapse Navbar
    var navbarCollapse = function() {
      if ($("#mainNav").offset().top > 100) {
        $("#mainNav").addClass("navbar-shrink");
      } else {
        $("#mainNav").removeClass("navbar-shrink");
      }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);
  
    // Floating label headings for the contact form
    $(function() {
      $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
      }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
      }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
      });
    });
  
  })(jQuery); // End of use strict
  