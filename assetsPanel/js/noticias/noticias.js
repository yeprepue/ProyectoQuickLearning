_noticias = (function () {
  var url =
    location.protocol + "//" + location.host + "/ProyectoQuickLearning/";
  var tblNoticiasActivas = "";
  var tblNoticiasInactivas = "";

  var registrarNoticia = function () {
    var formData = new FormData($("#formRegisterStory")[0]);

    debugger;
    $.ajax({
      url: url + "story/registrarNoticia",
      type: "POST",
      data: formData,
      cache: false,
      contentType:false,
      processData: false,
    })
      .done(function (data) {
        debugger;
        var response = $.parseJSON(data);

        if (response.code == 1) {
          $.growl.notice({
            title: "hello",
            message: response.mensaje,
            duration: 3000,
          });
          $("#formRegisterTeacher")[0].reset();
        }
        if (response.code != 1) {
          $.growl.error({
            title: response.titulo,
            message: response.mensaje,
            duration: 3000,
          });
          $("#formRegisterStory")[0].reset();
        }
      })
      .fail(function () {
        alert("error");
      })
      .always(function () {});

    $("#formRegisterStory").validate({
      rules: {
        storytitle: {
          required: true,
        },
        story: {
          required: true,
        },
        storybranch: {
          required: true,
        },
      },
      messages: {
        storytitle: {
          required: "Obligatory field",
        },
        story: {
          required: "Obligatory field",
        },
        storybranch: {
          required: "Obligatory field",
        },
      },
      submitHandler: function (form) {},
    });
  };

  function fxNoticiasActivas(noticiasActivas, reload) {
    if (reload) {
      tblNoticiasActivas.fnDestroy();
    }
    tblNoticiasActivas = $("#tblNoticiasActivas").dataTable({
      pageLength: 5,
      //   language: lenguajeDT,
      data: noticiasActivas,
      columns: [
        { data: "id_noticias" },
        { data: "title" },
        { data: "image" },
        { data: "story" },
        { data: "sede" },
        { data: "state", visible: false },
        {
          data: "id_noticias",
          render: function (data) {
            return `<button type="button" class="btn btn-info btn-edt-far">Editar</button>
                        <button type="button" class="btn btn-danger btn-desac-far">Desactivar</button>`;
          },
        },
      ],
    });
  }

  function fxNoticiasInactivas(noticiasInactivas, reload) {
    if (reload) {
      tblNoticiasInactivas.fnDestroy();
    }
    tblNoticiasInactivas = $("#tblNoticiasInactivas").dataTable({
      pageLength: 5,
      //   language: lenguajeDT,
      data: noticiasInactivas,
      columns: [
        { data: "id_noticias" },
        { data: "title" },
        { data: "image" },
        { data: "story" },
        { data: "sede" },
        { data: "state", visible: false },
        {
          data: "id_noticias",
          render: function (data) {
            return `<button type="button" class="btn btn-success btn-desac-far">Activar</button>`;
          },
        },
      ],
    });
  }

  var consultarNoticias = function (reload) {
    $.ajax({
      url: url + "story/consultarNoticias",
      type: "post",
      cache: false,
      success: function (request, textStatus, jQxhr) {
        var data = JSON.parse(request);
        if (data.status == 200) {
          var noticiasActivas = Array();
          var noticiasInactivas = Array();
          var conAct = 0;
          var conInac = 0;
          data.data.forEach(function (element, index) {
            if (element.state == 0) {
              noticiasInactivas[index - conAct] = element;
              conInac = conInac + 1;
            } else {
              noticiasActivas[index - conInac] = element;
              conAct = conAct + 1;
            }
          });
          fxNoticiasActivas(noticiasActivas, reload);
          fxNoticiasInactivas(noticiasInactivas, reload);
        }
      },
      error: function (jqXhr, textStatus, errorThrown) {
        console.log(errorThrown);
      },
    });
  };

  var cambiarEstadoFarmacia = function (id) {
    let url = location.protocol + "//" + location.host + "/pharmadmin/";
    var parametros = {
      id: id,
    };
    $.ajax({
      url: url + "cfarmacia/cambiarEstadoFarmacia",
      type: "post",
      data: parametros,
      cache: false,
      success: function (request, textStatus, jQxhr) {
        var data = JSON.parse(request);
        if (data.status == 200) {
          $.notify(data.msj, {
            className: "success",
            globalPosition: "top center",
            autoHideDelay: 3000,
          });
          consultarNoticias(true);
        }
      },
      error: function (jqXhr, textStatus, errorThrown) {
        console.log(errorThrown);
      },
    });
  };
  return {
    registrarNoticia: registrarNoticia,
    consultarNoticias: consultarNoticias,
    cambiarEstadoFarmacia: cambiarEstadoFarmacia,
  };
})();

$("#btnRegisterStory")
  .off("click")
  .on("click", function () {
    // if ($("#idstory").val() == "") {
    //   $("#divmsj-farmacia").show();
    //   setTimeout(() => {
    //     $("#divmsj-farmacia").hide();
    //   }, 3000);
    // } else {
    _noticias.registrarNoticia();
    // }
  });

$(document).ready(function () {
  _noticias.consultarNoticias(false);
});

$(document)
  .off("click", ".btn-edt-far")
  .on("click", ".btn-edt-far", function () {
    var info = Array();
    $(this)
      .parents("tr")
      .find("td")
      .each(function (index) {
        info[index] = $(this).html();
      });
    $("#registrarFarmacia").hide();
    $("#actualizarFarmacia").show();
    $("#btnGuardarFarmacia").hide();
    $("#btnActualizarFarmacia").show();
    $("#farmacia").val(info[1]);
    $("#idfarmacia").val(info[0]);
    $("#farmacia").focus();
  });

$(document)
  .off("click", ".btn-desac-far")
  .on("click", ".btn-desac-far", function () {
    var info = Array();
    $(this)
      .parents("tr")
      .find("td")
      .each(function (index) {
        info[index] = $(this).html();
      });
    _farmacia.cambiarEstadoFarmacia(info[0]);
  });
