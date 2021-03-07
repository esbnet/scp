
    <div class="modal fade " id="carenciaModal" tabindex="-1" role="dialog" aria-labelledby="carenciaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="carenciaModalLabel">Informar Carga Horária da Matrícula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <!-- <form class="shadow p-3 mb-5 bg-white rounded"> -->
                            <form action="<?= '/lancamento_carencias/store' ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="form-group row">
                                    <label for="imput_id" class="col-sm-4 col-form-label">Id</label>
                                    <div class="col-sm-3">
                                        <input type="email" class="form-control" id="imput_id" value="0000" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="imput_disciplina" class="col-sm-4 col-form-label">Disciplina</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="imput_disciplina">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">Temporária</div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input_matutino" class="col-sm-4 col-form-label">Matutino</label>
                                    <div class="col-sm-2">
                                        <input type="email" class="form-control " id="input_matutino" value="10"
                                            disabled>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" min="0" max="10" class="form-control" id="input_matutino2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input_vespertino" class="col-sm-4 col-form-label">Vespertino</label>
                                    <div class="col-sm-2">
                                        <input type="email" class="form-control " id="input_vespertino" value="10"
                                            disabled>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" min="0" max="10" class="form-control"
                                            id="input_vespertino2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="imput_noturno" class="col-sm-4 col-form-label">Noturno</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control " id="imput_noturno" value="10" disabled>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" min="0" max="10" class="form-control" id="imput_noturno2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input_total" class="col-sm-4 col-form-label">Total</label>
                                    <div class="col-sm-2">
                                        <input type="email" class="form-control " id="input_total" value="10" disabled>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="email" min="0" max="10" class="form-control" id="input_total2"
                                            disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="pesquisa_escola()">Enviar</button>
                </div>
            </div>
        </div>
    </div>
