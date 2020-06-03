$(document).ready(function(){
   

    $("#btnLogin").click(function(){
        var base_url = $("#base_url").val();

        $.ajax({
            type: "POST",
            url: base_url + "Login/iniciarSesion",
            data: $("#formLogin").serialize(),
            success: function(respuesta){
                var response = $.parseJSON(respuesta);
                

                if (response.code != 1) {
                        var options1 = {
                          'title': 'Error',
                          'style': 'error',
                          'message': response.mensaje,
                          'timeout': 3000,
                          'icon': 'warning',
                        }
                      var n1 = new notify(options1);
                        n1.show();
                    
                }
                
                if(response.code == 1){
                    location.reload();
                }
                
            },
            dataType: "html"
        });
    });

    $(document).keypress(function(e) {
        if(e.which == 13) {
            var base_url = $("#base_url").val();

            $.ajax({
                type: "POST",
                url: base_url + "Login/iniciarSesion",
                data: $("#formLogin").serialize(),
                success: function(data){
                    var response = $.parseJSON(data);

                    if (response.code != 1) {
                        $.growl.error({title: "Hola2", message: response.mensaje, duration: 10000 });
                    }
                    if(response.code == 1){
                        location.reload();
                    }
                },
                dataType: "html"
            });
        }
    });
    
});

