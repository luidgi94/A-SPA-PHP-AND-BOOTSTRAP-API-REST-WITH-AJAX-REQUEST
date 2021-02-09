function shuffelWord (word){
    var shuffledWord = '';
    word = word.split('');
    while (word.length > 0) {
      shuffledWord +=  word.splice(word.length * Math.random() << 0, 1);
    }
    return shuffledWord;
}

$(function () {
    $(
        "#contactForm input,#contactForm textarea,#contactForm button"
    ).jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function ($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#name").val();
            var city = $("input#city").val();
            var size = $("input#size").val();
            var multi_store = $("input#multi_store").val();
            var category = $("select#category").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(" ") >= 0) {
                firstName = name.split(" ").slice(0, -1).join(" ");
            }
            $this = $("#sendMessageButton");
            $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
            $.ajax({
                url: "./controllers/create.php",
                type: "POST",
                data: {
                    name: name,
                    size: size,
                    city: city,
                    category: category,
                    multi_store: multi_store,
                },
                cache: false,
                success: function (res) {
                    let modalListe = document.getElementById('modalList');
                    res = $.parseJSON(res);
                    console.log(res)
                    let id = res.id
                    console.log(id)
                    let element= {
                        id: id,
                        name: name,
                        size: size,
                        city: city,
                        category: category,
                        multi_store: multi_store,
                    }
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
                 
                    // Success message
                    $("#success").html("<div class='alert alert-success'>");
                    $("#success > .alert-success")
                        .html(
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                        )
                        .append("</button>");
                    $("#success > .alert-success").append(
                        "<strong> Votre magasin a bien été crée </strong>"
                    );
                    $("#success > .alert-success").append("</div>");
                    //clear all fields
                    $("#contactForm").trigger("reset");

                    let modal = '<div class="portfolio-modal modal fade" id="modal'+ element.id +'" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true"><div class="modal-dialog modal-xl" role="document"><div class="modal-content"><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span></button><div class="modal-body text-center"><div class="container"><div class="row justify-content-center"><div class="col-lg-8"><h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label"><i class="fas fa-store-alt mr-2"></i>'+ element.name+'</h2><div class="divider-custom"><div class="divider-custom-line"></div><div class="divider-custom-icon"><i class="fas fa-star"></i></div<div class="divider-custom-line"></div></div><img class="img-fluid rounded mb-5" src="'+ image +'" alt="" /><p class="mb-5"> <strong>Nom du magasin</strong>  : '+ element.name +'</p> <p class="mb-5"> <strong>Type de magasin</strong> : ' + element.category + '</p> <p class="mb-5"> <strong>Taille du magasin</strong> : ' + element.size + '</p> <p class="mb-5"> <strong>Emplacement du magasin</strong>   : ' + element.city + ' </p> <p class="mb-5"><strong>Disponibilité</strong> : ' + availability + '</p> <div><button data-id="' + element.id +'" class="btn btn-success edit mr-2"><i class="fas fa-edit mr-2"></i> Éditer Magasin</button> <button data-id="'+ element.id +'"  onclick="deleteById('+ element.id +')"  type="button" class="btn btn-danger delete mr-2" data-dismiss="modal"><i class="fas fa-trash mr-2"></i>Supprimer Magasin</button> <button class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times fa-fw mr-2"></i>Fermer la fenêtre</button></div></div></div></div></div></div></div></div>'
                    modalListe.innerHTML += modal
            
                    let div = document.getElementById('item_test');
                    div.innerHTML += '<div class="col-md-6 col-lg-4 mb-5" id="miniature'+ element.id +'"> <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#modal'+ element.id +'">  <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100"> <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>  </div> <img class="img-fluid" src="'+ image +'" alt="" />  </div>  </div>';
                },
                error: function () {
                    // Fail message
                    $("#success").html("<div class='alert alert-danger'>");
                    $("#success > .alert-danger")
                        .html(
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                        )
                        .append("</button>");
                    $("#success > .alert-danger").append(
                        $("<strong>").text(
                            "Désolé le magasin " +
                                firstName +
                                ", N'a pas pu etre enregistré. erreur serveur!"
                        )
                    );
                    $("#success > .alert-danger").append("</div>");
                    //clear all fields
                    $("#contactForm").trigger("reset");
                },
                complete: function () {
                    setTimeout(function () {
                        $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
                    }, 1000);

                },
            });
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    $('a[data-toggle="tab"]').click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

/*When clicking on Full hide fail/success boxes */
$("#name").focus(function () {
    $("#success").html("");
});
