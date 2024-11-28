<!-- Modal Usuarios por tipo nomina -->
<div class="modal fade" id="modalUsuariosSucursal" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioSucursal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Usuarios Por Sucursal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tabla-usuariosSucursal" class="table table-striped table-hover va-middle tabla-usuariosSucursal">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>

            </div>
        </div>
    </div>
</div>



<?= $this->section('js') ?>


<script>
    var tablaUsuarios = $('#tabla-usuariosSucursal').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [
            [0, 'asc']
        ],

        ajax: {
            url: `<?= base_url('admin/sucursales/usuariosPorSucursal') ?>/` + "0",
            method: 'GET',
            dataType: "json"

        },
        columnDefs: [{
                orderable: false,
                targets: [1],
                searchable: false,
                targets: [1]

            }],
        columns: [{
                'data': 'username'
            },

            {
                "data": function (data) {

                    if (data.status == "on") {

                        return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-success btnActivate" status="on"  idEmpresa="${data.idEmpresa}" idSucursal="${data.idSucursal}"  idUser="${data.id}" idSucursalUsuario="${data.idSucursalUsuario}">ON</button>
                             
                         </div>
                         </td>`;


                    } else {

                        return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-danger btnActivate" status="off" idEmpresa="${data.idEmpresa}"  idSucursal="${data.idSucursal}"  idUser="${data.id}" idSucursalUsuario="${data.idSucursalUsuario}">OFF</button>
                             
                         </div>
                         </td>`;


                    }

                }
            }
        ]
    });



    /**
     * Carga datos actualizar
     */
    $(".tableBranchoffices").on("click", ".btn-users", function () {

        var sucursal = $(this).attr("data-id");

        console.log("sucursal:", sucursal);

        tablaUsuarios.ajax.url(`<?= base_url('admin/sucursales/usuariosPorSucursal') ?>/` + sucursal).load();


    });


    /**
     * Guarda derecho
     */

    $(".tabla-usuariosSucursal").on("click", ".btnActivate", function () {


        var statusActual = $(this).attr("status");
        var idSucursalUsuario = $(this).attr("idSucursalUsuario");
        var idUsuario = $(this).attr("iduser");
        var idEmpresa = $(this).attr("idEmpresa");
        var idSucursal = $(this).attr("idSucursal");


        if (statusActual == "on") {

            var status = "off";
        } else {

            var status = "on";

        }



        var datos = new FormData();
        datos.append("idUsuario", idUsuario);
        datos.append("id", idSucursalUsuario);
        datos.append("idEmpresa", idEmpresa);
        datos.append("idSucursal", idSucursal);
        datos.append("status", status);


        $.ajax({

            url: "<?= base_url('admin/sucursales/activarDesactivar') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                if (respuesta == "ok") {

                    tablaUsuarios.ajax.url(`<?= base_url('admin/sucursales/usuariosPorSucursal') ?>/` + idSucursal).load();


                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta,
                    });


                }



            }
        });
    })
</script>


<?= $this->endSection() ?>