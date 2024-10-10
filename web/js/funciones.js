var csrfToken = $('meta[name=csrf-token]').attr('content');


function mostrarModal(id) {
  $.post('/admin/solicitud/dato', { _csrf: csrfToken, datos: { id: id } })
    .done(function (d) {
      krajeeDialogCust2.dialog(
        d,
        function (result) {
          return dialog.close();
        }
      );
    }).fail(function (f) { console.log(f.responseText); });
}

//abre modal escolares
function mostrarModalEscolar(id) {
  $.post('/admin/solicitud/modal-escolar', { _csrf: csrfToken, datos: { id: id } })
    .done(function (d) {
      krajeeDialogCust2.dialog(
        d,
        function (result) {
          return dialog.close();
        }
      );
    }).fail(function (f) { console.log(f.responseText); });
}

//cambia estatus de activo a diagnostico
function activarDiagnostico(ID) {
  $.post('/tudiagnostico/activa', { _csrf: csrfToken, datos: { ID: ID } })
    .done(function (d) {
      krajeeDialog.alert(d);
    }).fail(function (f) { console.log(f.responseText); });
}
//cambia estatus de activo a diagnostico
function bloquearDiagnostico(ID) {
  $.post('/tudiagnostico/bloqueo', { _csrf: csrfToken, datos: { ID: ID } })
    .done(function (d) {
      krajeeDialog.alert(d);
    }).fail(function (f) { console.log(f.responseText); });
}

//funciones ajax que asigna tutores
function asignacion(ID) {
  var ciclo = $('input[name=ciclo]').val();
 // var solicitud = $('input[name=fksol]').val();
  krajeeDialog.confirm("Está por asignar este docente, está seguro de continuar?", function (result) {
    if (result) { // ok button was pressed
      $.post('/tututor/asignar', { _csrf: csrfToken, datos: { docenteID: ID, cicloID: ciclo } })
        .done(function (d) {
          if (d !== '0') {
            var datos = JSON.parse(d);
            krajeeDialog.alert('Se ha asignado tutor al Ciclo ' + datos.ciclo);
            $.pjax.reload({ container: '#pjax_profesores' });
            $('#ventana').modal('hide');
            //window.location.reload();
          }
        }).fail(function (f) { console.log(f.responseText); });
    } else { // confirmation was cancelled
      krajeeDialog.alert('Operación Cancelada');
    }
  });

}

//funciones ajax que asigna tutorados
function asignacionEstudiante(matricula) {
  var periodo = $('input[name=periodo]').val();
  var tutor = $('input[name=tutor]').val();
 // var solicitud = $('input[name=fksol]').val();
  krajeeDialog.confirm("Está por asignar este estudiante, está seguro de continuar?", function (result) {
    if (result) { // ok button was pressed
      $.post('/tututor/asignar-tutorado', { _csrf: csrfToken, datos: { estudianteID: matricula, tutor: tutor, periodo: periodo } })
        .done(function (d) {
          if (d !== '0') {
            var datos = JSON.parse(d);
            krajeeDialog.alert('Se ha asignado el estudiante ' + datos.matricula);
            $.pjax.reload({ container: '#pjax_estudiantes' });
            $('#ventana').modal('hide');
            //window.location.reload();
          }
        }).fail(function (f) { console.log(f.responseText); });
    } else { // confirmation was cancelled
      krajeeDialog.alert('Operación Cancelada');
    }
  });

}

//funciones ajax borra tutorado
function borrarTutorado(ID) {
  krajeeDialog.confirm("<h6>Está usted seguro borrar al tutorado " + ID + "? </h6>", function (result) {
    if (result) { // ok button was pressed
      $.post('/tututorado/borrar-tutorado', { _csrf: csrfToken, datos: { ID: ID } })
        .done(function (d) {
          if (d !== '0') {
            var datos = JSON.parse(d);
            krajeeDialog.alert('Se elimino correctamente ' + datos.ID );
            window.location.reload();
          }
        }).fail(function (f) { console.log(f.responseText); });
    } else { // confirmation was cancelled
      krajeeDialog.alert('<h4>Operación cancelada</h4>');
    }
  });

}

//funciones ajax borra tutorado
function iniciar() {
  krajeeDialog.confirm("<h6>Está usted seguro borrar al tutor " + ID + "? </h6>", function (result) {
    if (result) { // ok button was pressed
      $.post('/tuplaneacion/iniciar-planeacion', { _csrf: csrfToken, datos: { ID: ID } })
        .done(function (d) {
          if (d !== '0') {
            var datos = JSON.parse(d);
            krajeeDialog.alert('Se elimino correctamente ' + datos.ID );
            window.location.reload();
          }
        }).fail(function (f) { krajeeDialog.alert('Error no se puede eliminar ' + f.responseText ); });
    } else { // confirmation was cancelled
      krajeeDialog.alert('<h4>Operación cancelada</h4>');
    }
  });

}

//funciones ajax borra tutorado
function borrarTutor(ID) {
  krajeeDialog.confirm("<h6>Está usted seguro borrar al tutor " + ID + "? </h6>", function (result) {
    if (result) { // ok button was pressed
      $.post('/tututor/borrar-tutor', { _csrf: csrfToken, datos: { ID: ID } })
        .done(function (d) {
          if (d !== '0') {
            var datos = JSON.parse(d);
            krajeeDialog.alert('Se elimino correctamente ' + datos.ID );
            window.location.reload();
          }
        }).fail(function (f) { krajeeDialog.alert('Error no se puede eliminar ' + f.responseText ); });
    } else { // confirmation was cancelled
      krajeeDialog.alert('<h4>Operación cancelada</h4>');
    }
  });

}

//funciones ajax inicia planeacion
function plan() {
  //ciclo = 4;
  //tutor = 5;
  krajeeDialog.confirm("<h6>Listo para iniciar la planeación </h6>", function (result) {
    if (result) { // ok button was pressed
      $.post('/tuplaneacion/iniciar-planeacion', { _csrf: csrfToken, datos: { cicloID: ciclo, tutorID: tutor } })
        .done(function (d) {
          if (d !== '0') {
            var datos = JSON.parse(d);
            krajeeDialog.alert('Iniciando la planeación ');
            window.location.reload();
          }
        }).fail(function (f) { krajeeDialog.alert('Error al Iniciar ' + f.responseText ); });
    } else { // confirmation was cancelled
      krajeeDialog.alert('<h4>Operación cancelada</h4>');
    }
  });

}


//guarda observaciones
function mostrarComentario(id, accion) {
  switch (accion) {
    case 1:
      $.post('/admin/solicitud/comentario', { _csrf: csrfToken, accion: 1, id: id })
        .done(function (d) {
          if (d !== undefined) {
            if (d !== null) {
              var com = JSON.parse(d);
              contenido = com.sol_observa;
              bootbox.dialog({
                message: contenido,
                size: 'medium',
                title: "Observaciones",
                buttons: {
                  success: {
                    label: "Entendido",
                    className: "btn-success",
                  },
                }
              });

            }
          }
        });

      break;
    case 2:
      $.post('/admin/solicitud/comentario', { _csrf: csrfToken, accion: 1, id: id })
        .done(function (d) {
          if (d !== undefined) {
            if (d !== null) {
              var com = JSON.parse(d);
              contenido = com.sol_observa;
              bootbox.prompt({
                title: 'Subir observación',
                value: contenido,
                inputType: 'textarea',
                size: 'large',
                buttons: {
                  'cancel': {
                    label: 'Cancelar',
                    className: 'btn-danger pull-left'
                  },
                  'confirm': {
                    label: 'Modificar',
                    className: 'btn-success pull-right'
                  }
                },
                callback: function (comentario) {
                  if (comentario === null) {
                    krajeeDialog.alert('<h4>Operación Cancelada.</h4>');
                  } else {
                    $.post('/admin/solicitud/comentario', { _csrf: csrfToken, accion: 2, id: id, comentario: comentario })
                      .done(function (d) {
                        if (parseInt(d) == 1) {
                          krajeeDialog.alert('<h4>Guardado correctamente</font></h4>');
                          //window.location.reload();
                        } else {
                          krajeeDialog.alert('<h4>Ha ocurrido un problema al realizar esta operación.</h4>');
                        }
                      })
                      .fail(function (f) {
                        krajeeDialog.alert('<h4>Ha ocurrido un problema al realizar esta operación.</h4>');
                        console.log(f.responseText);
                      });
                  }
                }
              });
            }
          }
        }).fail(function (f) {
          krajeeDialog.alert('<h4>Ha ocurrido un problema al realizar esta operación.</h4>');
          console.log(f.responseText);
        });
      break;
  }
}

//Función para grabar el numero de oficio de la solicitud del tecnologico
function asignarCeneval(id, accion) {
  switch (accion) {
    case 1:
      $.post('/admin/solicitud/asigna-ceneval', { _csrf: csrfToken, accion: 1, id: id })
        .done(function (d) {
          if (d !== undefined) {
            if (d !== null) {
              var com = JSON.parse(d);
              bootbox.prompt({
                title: 'Escriba el número de Ceneval',
                value: com.sol_ceneval,
                inputType: 'text',
                buttons: {
                  'cancel': {
                    label: 'Cancelar',
                    className: 'btn-danger pull-left'
                  },
                  'confirm': {
                    label: 'Modificar',
                    className: 'btn-success pull-right'
                  }
                },
                callback: function (comentario) {
                  if (comentario === null) {
                    krajeeDialog.alert('<h4>Operación Cancelada</font></h4>');
                  } else {
                    $.post('/admin/solicitud/asigna-ceneval', { _csrf: csrfToken, accion: 2, id: id, comentario: comentario })
                      .done(function (d) {
                        if (parseInt(d) == 1) {
                          krajeeDialog.alert('<h4>Guardado correctamente</font></h4>');
                          window.location.reload();
                        } else {
                          krajeeDialog.alert('<h4>Ha ocurrido un problema al realizar esta operación.</h4>');
                        }
                      })
                      .fail(function (f) {
                        krajeeDialog.alert('<h4>Ha ocurrido un problema al realizar esta operación.</h4>');
                        console.log(f.responseText);
                      });
                  }
                }
              });
            }
          }
        }).fail(function (f) {
          krajeeDialog.alert('<h4>Ha ocurrido un problema al realizar esta operación.</h4>');
          console.log(f.responseText);
        });
      break;
  }
}

//Muestra plantilla de correo electronico
function modalCorreo(id) {
  $.post('/admin/solicitud/modal-correo', { _csrf: csrfToken, datos: { id: id } })
    .done(function (d) {
      DialogCorreo.dialog(
        d,
        function (result) {
          return dialog.close();
        }
      );
    }).fail(function (f) { console.log(f.responseText); });

}

//confirma curso
function confirmarCurso(id) {
  $.post('/admin/cursosolicitud/confirma', { _csrf: csrfToken, datos: { id: id } })
    .done(function (d) {
      krajeeDialog.alert(d);
    }).fail(function (f) { console.log(f.responseText); });
}

//confirma curso
function confirmarCursoExterno(id) {
  $.post('/admin/cursosolicitudexterno/confirma', { _csrf: csrfToken, datos: { id: id } })
    .done(function (d) {
      krajeeDialog.alert(d);
    }).fail(function (f) { console.log(f.responseText); });
}
