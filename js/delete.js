function deleteById(id){

    console.log(' On efface le bouton pour le numéro ' + id)
      $.ajax({
          url : './controllers/delete.php',
          type : 'post',
          data : { id: id },
          success : function (res) {
            console.log(res)
              try {
                console.log(' Magasin supprimé')
                  res = $.parseJSON(res);
                  if (res.success == true) {
                    let elem = document.querySelector('#modal'+ id);
                    elem.parentNode.removeChild(elem);
                    let miniature = document.querySelector('#miniature'+ id);
                    miniature.parentNode.removeChild(miniature);
                  }
              } catch (e) {
                  console.error("parseJSON" + e);
                  return e;
              }
          }
      });
    
  }