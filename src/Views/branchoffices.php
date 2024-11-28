<?= $this->include('julio101290\boilerplate\Views\load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatebranchoffice\Views\modulesBranchoffices/modalCaptureBranchoffices') ?>
<?= $this->include('julio101290\boilerplatebranchoffice\Views\modulesBranchoffices/usuariosSucursalModal') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddBranchoffices" data-toggle="modal" data-target="#modalAddBranchoffices"><i class="fa fa-plus"></i>

                    <?= lang('branchoffices.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableBranchoffices" class="table table-striped table-hover  va-middle tableBranchoffices">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('branchoffices.fields.key') ?></th>
                                <th><?= lang('branchoffices.fields.name') ?></th>
                                <th><?= lang('branchoffices.fields.cologne') ?></th>
                                <th><?= lang('branchoffices.fields.city') ?></th>
                                <th><?= lang('branchoffices.fields.postalCode') ?></th>
                                <th><?= lang('branchoffices.fields.timeDifference') ?></th>
                                <th><?= lang('branchoffices.fields.tax') ?></th>
                                <th><?= lang('branchoffices.fields.dateAp') ?></th>
                                <th><?= lang('branchoffices.fields.phone') ?></th>
                                <th><?= lang('branchoffices.fields.fax') ?></th>
                                <th><?= lang('branchoffices.fields.companie') ?></th>
                                <th><?= lang('branchoffices.fields.created_at') ?></th>
                                <th><?= lang('branchoffices.fields.deleted_at') ?></th>
                                <th><?= lang('branchoffices.fields.updated_at') ?></th>

                                <th><?= lang('branchoffices.fields.actions') ?> </th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card -->

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>
    /**
     * Cargamos la tabla
     */

    var tableBranchoffices = $('#tableBranchoffices').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        responsive: true,
        order: [
            [1, 'asc']
        ],

        ajax: {
            url: '<?= base_url('admin/branchoffices') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [15],
                searchable: false,
                targets: [15]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'key'
            },

            {
                'data': 'name'
            },

            {
                'data': 'cologne'
            },

            {
                'data': 'city'
            },

            {
                'data': 'postalCode'
            },

            {
                'data': 'timeDifference'
            },

            {
                'data': 'tax'
            },

            {
                'data': 'dateAp'
            },

            {
                'data': 'phone'
            },

            {
                'data': 'fax'
            },

            {
                'data': 'companie'
            },

            {
                'data': 'created_at'
            },

            {
                'data': 'deleted_at'
            },

            {
                'data': 'updated_at'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditBranchoffices" data-toggle="modal" idBranchoffices="${data.id}" data-target="#modalAddBranchoffices">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                             <button class="btn btn-success btn-users" data-id="${data.id}" data-toggle="modal" data-target="#modalUsuariosSucursal"><i class="fas fa-users"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveBranchoffices', function (e) {


        var idBranchoffices = $("#idBranchoffices").val();
        var key = $("#key").val();
        var name = $("#name").val();
        var cologne = $("#cologne").val();
        var city = $("#city").val();
        var postalCode = $("#postalCode").val();
        var timeDifference = $("#timeDifference").val();
        var tax = $("#tax").val();
        var dateAp = $("#dateAp").val();
        var phone = $("#phone").val();
        var fax = $("#fax").val();
        var companie = $("#companie").val();

        if ($("#arqueoCaja").is(':checked')) {

            var arqueoCaja = "on";

        } else {

            var arqueoCaja = "off";

        }


        $("#btnSaveBranchoffices").attr("disabled", true);

        var datos = new FormData();
        datos.append("idBranchoffices", idBranchoffices);
        datos.append("key", key);
        datos.append("name", name);
        datos.append("cologne", cologne);
        datos.append("city", city);
        datos.append("postalCode", postalCode);
        datos.append("timeDifference", timeDifference);
        datos.append("tax", tax);
        datos.append("dateAp", dateAp);
        datos.append("phone", phone);
        datos.append("fax", fax);
        datos.append("companie", companie);
        datos.append("arqueoCaja", arqueoCaja);


        $.ajax({

            url: "<?= base_url('admin/branchoffices/save') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta.match(/Correctamente.*/)) {

                    Toast.fire({
                        icon: 'success',
                        title: "Guardado Correctamente"
                    });

                    tableBranchoffices.ajax.reload();
                    $("#btnSaveBranchoffices").removeAttr("disabled");


                    $('#modalAddBranchoffices').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveBranchoffices").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Branchoffices
     =============================================*/
    $(".tableBranchoffices").on("click", ".btnEditBranchoffices", function () {

        var idBranchoffices = $(this).attr("idBranchoffices");

        var datos = new FormData();
        datos.append("idBranchoffices", idBranchoffices);

        $.ajax({

            url: "<?= base_url('admin/branchoffices/getBranchoffices') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {


                console.log(respuesta["dateAp"]);
                $("#idBranchoffices").val(respuesta["id"]);

                $("#key").val(respuesta["key"]);
                $("#name").val(respuesta["name"]);
                $("#cologne").val(respuesta["cologne"]);
                $("#city").val(respuesta["city"]);
                $("#postalCode").val(respuesta["postalCode"]);
                $("#timeDifference").val(respuesta["timeDifference"]);
                $("#tax").val(respuesta["tax"]);
                $("#dateAp").val(respuesta["dateAp"]);
                $("#phone").val(respuesta["phone"]);
                $("#fax").val(respuesta["fax"]);
                $("#companie").val(respuesta["companie"]);
                $("#companie").trigger("change");

                var arqueoCaja = respuesta["arqueoCaja"];

                if (arqueoCaja == "null" || arqueoCaja == "NULL") {

                    arqueoCaja = respuesta["arqueoCaja"];
                }

                $("#arqueoCaja").bootstrapToggle(arqueoCaja);


            }

        })

    })


    /*=============================================
     ELIMINAR branchoffices
     =============================================*/
    $(".tableBranchoffices").on("click", ".btn-delete", function () {

        var idBranchoffices = $(this).attr("data-id");

        Swal.fire({
            title: '<?= lang('boilerplate.global.sweet.title') ?>',
            text: "<?= lang('boilerplate.global.sweet.text') ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang('boilerplate.global.sweet.confirm_delete') ?>'
        })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: `<?= base_url('admin/branchoffices') ?>/` + idBranchoffices,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableBranchoffices.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })
</script>
<?= $this->endSection() ?>