<!-- Modal Branchoffices -->
<div class="modal fade" id="modalAddBranchoffices" tabindex="-1" role="dialog" aria-labelledby="modalAddBranchoffices" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('branchoffices.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-branchoffices" class="form-horizontal">
                    <input type="hidden" id="idBranchoffices" name="idBranchoffices" value="0">


                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.companie') ?></label>
                        <div class="col-sm-8">
                            <select class="form-control select" name="companie" id="companie" style="width: 100%;">

                                <option value="0"><?= lang('branchoffices.fields.companie') ?></option>
                                <?php
                                foreach ($empresas as $key => $value) {

                                    echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="key" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.key') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="key" id="key" class="form-control <?= session('error.key') ? 'is-invalid' : '' ?>" value="<?= old('key') ?>" placeholder="<?= lang('branchoffices.fields.key') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.name') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('branchoffices.fields.name') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cologne" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.cologne') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="cologne" id="cologne" class="form-control <?= session('error.cologne') ? 'is-invalid' : '' ?>" value="<?= old('cologne') ?>" placeholder="<?= lang('branchoffices.fields.cologne') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.city') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="city" id="city" class="form-control <?= session('error.city') ? 'is-invalid' : '' ?>" value="<?= old('city') ?>" placeholder="<?= lang('branchoffices.fields.city') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postalCode" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.postalCode') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="postalCode" id="postalCode" class="form-control <?= session('error.postalCode') ? 'is-invalid' : '' ?>" value="<?= old('postalCode') ?>" placeholder="<?= lang('branchoffices.fields.postalCode') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="timeDifference" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.timeDifference') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="timeDifference" id="timeDifference" class="form-control <?= session('error.timeDifference') ? 'is-invalid' : '' ?>" value="<?= old('timeDifference') ?>" placeholder="<?= lang('branchoffices.fields.timeDifference') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tax" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.tax') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="tax" id="tax" class="form-control <?= session('error.tax') ? 'is-invalid' : '' ?>" value="<?= old('tax') ?>" placeholder="<?= lang('branchoffices.fields.tax') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dateAp" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.dateAp') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="dateAp" id="dateAp" class="form-control <?= session('error.dateAp') ? 'is-invalid' : '' ?>" value="<?= old('dateAp') ?>" placeholder="<?= lang('branchoffices.fields.dateAp') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.phone') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="phone" id="phone" class="form-control <?= session('error.phone') ? 'is-invalid' : '' ?>" value="<?= old('phone') ?>" placeholder="<?= lang('branchoffices.fields.phone') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fax" class="col-sm-2 col-form-label"><?= lang('branchoffices.fields.fax') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="fax" id="fax" class="form-control <?= session('error.fax') ? 'is-invalid' : '' ?>" value="<?= old('fax') ?>" placeholder="<?= lang('branchoffices.fields.fax') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label">
                           Arqueo de caja
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">

                                </div>
                                <input type="checkbox" id="arqueoCaja" name="arqueoCaja" class="arqueoCaja" data-width="250" data-height="40" checked data-toggle="toggle" data-on="Activado" data-off="Desactivado" data-onstyle="success" data-offstyle="danger">
                            </div>
                        </div>
                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveBranchoffices"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    $(document).on('click', '.btnAddBranchoffices', function(e) {


        $(".form-control").val("");

        $("#idBranchoffices").val("0");

        $("#btnSaveBranchoffices").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditBranchoffices', function(e) {


        var idBranchoffices = $(this).attr("idBranchoffices");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idBranchoffices").val(idBranchoffices);
        $("#btnGuardarBranchoffices").removeAttr("disabled");

    });


    $("#companie").select2();
</script>


<?= $this->endSection() ?>