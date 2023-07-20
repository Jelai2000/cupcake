$(document).ready(function(){

    // $('.btn_deleteProduct').click(function(e) {
      $(document).on('click', '.btn_deleteProduct', function (e){
        e.preventDefault();

        var id = $(this).val();
        // alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                type: "POST",
                url: "category_code.php",
                data: {
                    'product_id':id,
                    'btn_deleteProduct' : true
                },
                success: function (response){ 
                  console.log(response);
                    if(response == 200)
                    { 
                        swal("Success!", "Product Deleted Successfully", "success");
                        $("#products_table").load(location.href + " #products_table");
                    }
                    else if(response == 500)
                    {
                        swal("Error!", "Something went wrong", "error");
                    }

                }

              })
            } 
          });

    });

    $(document).on('click', '.btn_deleteCategory', function (e) {
         

      e.preventDefault();

      var id = $(this).val();
      // alert(id);

      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type: "POST",
              url: "category_code.php",
              data: {
                  'category_id':id,
                  'btn_deleteCategory' : true
              },
              success: function (response){ 
                console.log(response);
                  if(response == 200)
                  { 
                      swal("Success!", "Category Deleted Successfully", "success");
                      $("#category_table").load(location.href + " #category_table");
                  }
                  else if(response == 500)
                  {
                      swal("Error!", "Something went wrong", "error");
                  }

              }

            })
          } 
        });

  });

});