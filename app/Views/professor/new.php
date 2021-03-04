<form class="shadow p-3 mb-5 bg-white rounded">
    <div class="form-row">
        <fieldset class="form-group col-sm-10">
            <div class="row">
                <legend class="col-form-label col-sm-3 pt-0">Tipo de Vaga :</legend>
                <div class="col-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="opcao1" checked>
                        <label class="form-check-label" for="gridRadios1">Nova</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="opcao2">
                        <label class="form-check-label" for="gridRadios2">Afastamento Definitivo</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="opcao3">
                        <label class="form-check-label" for="gridRadios3">Afastamento Temporário</label>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4">Unidade Escolar</label>
            <input type="email" class="form-control" id="inputEmail4" >
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">RHBahia</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="form-group col-md-8">
            <label for="inputPassword4">Nome da Escola</label>
            <input type="password" class="form-control" id="inputPassword4" >
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4">Matrícula</label>
            <input type="email" class="form-control" id="inputEmail4" >
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">RHBahia</label>
            <input type="password" class="form-control" id="inputPassword4"  disabled>
        </div>
        <div class="form-group col-md-8">
            <label for="inputPassword4">Nome do Professor</label>
            <input type="password" class="form-control" id="inputPassword4" disabled>
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Motivo do Afastamento</label>
            <select id="inputEstado" class="form-control">
                <option selected>Escolher...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputEstado">Início</label>
            <input type="date" class="form-control" id="DataInicio">
        </div>
        <div class="form-group col-md-3">
            <label for="inputCEP">Fim</label>
            <input type="date" class="form-control" id="DataFim">
        </div>
    </div>

    <div class="form-row">
        <div class="col-sm">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEstado">Matutino</label>
                    <input type="text" class="form-control" id="DataInicio">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEstado">Vespertino</label>
                    <input type="text" class="form-control" id="DataInicio">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEstado">Noturno</label>
                    <input type="text" class="form-control" id="DataInicio">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCEP">Total</label>
                    <input type="Text" class="form-control" id="DataFim" disabled>
                </div>
            </div>
        </div>


        <div class="col-sm">
            <div class="form-group">
                <label for="inputAddress2">Observação</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

        </div>

    </div>

    <button type="submit" class="btn btn-primary">Gravar</button>
</form>