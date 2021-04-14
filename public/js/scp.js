$("#modalTipoCarencia").modal({ backdrop: "static", keyboard: false });

// Modal para escolher o tipo de carência
$(document).ready(function () {
    $("input").keypress(function (e) {
        var code = null;
        code = e.keyCode ? e.keyCode : e.which;
        return code == 13 ? false : true;
    });
});

function confirmaGravacaoCarencia() {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Carência gravada com sucesso!",
        showConfirmButton: false,
        timer: 3000,
    });
}

// Procura a escola informada na base de dados
function pesquisa_escola_carencia() {
    var codigo = document.getElementById("ueid").value;

    if (codigo == null || codigo == "") {
        Swal.fire({
            title: "Atenção!",
            text: "Còdigo da escola não foi informado. Tente novamente.",
            icon: "warning",
            confirmButtonText: "Voltar",
        });

        document.getElementById("ueid").focus();

        return;
    }

    var endereco = "/LancamentoCarencias/pesquisaEscola/" + codigo;
    $.ajax({
        url: endereco,
        method: "post",
        data: $(this).serialize(),
        dataType: "json",
        success: function (resposta) {
            var [{ success }] = resposta;
            var [{ escola }] = resposta;
            var [{ message }] = resposta;

            if (!!success && escola) {
                document.getElementById("ueid").value = escola.id;
                document.getElementById("UE").value = escola.ue;
                document.getElementById("OU").value = escola.ou;
                document.getElementById("Municipio").value = escola.municipio;
                document.getElementById("CodNte").value = escola.nte_id;
                document.getElementById("busca_escola").disabled = true;
                $(".matricula").prop("readonly", false);
                $(".btn-matricula").prop("disabled", false);
                $(".linha-01").removeClass("d-none");
                $(".linha-02").removeClass("d-none");
                $(".linha-03").removeClass("d-none");
                $(".linha-04").removeClass("d-none");
                $(".linha-05").removeClass("d-none");
                $(".footer").removeClass("d-none");
            } else {
                Swal.fire({
                    title: "Atenção!",
                    text:
                        "Não existe escola com o código (" +
                        document.getElementById("ueid").value +
                        ") informado. Tente novamente!",
                    icon: "error",
                    confirmButtonText: "Voltar",
                });
                document.getElementById("ueid").value = "";
                document.getElementById("UE").value = "";
                document.getElementById("OU").value = "";
                document.getElementById("Municipio").value = "";
                document.getElementById("CodNte").value = "";
            }
        },
    });
}

//Persiste carencia no  banco
// Procura a escola informada na base de dados
function lancamento_carencia_store() {
    var codigo = document.getElementById("ueid").value;
    var total_carencia = document.getElementById("total").value;

    //Verifica se foi informado alguma escola
    if (codigo == null || codigo == "") {
        Swal.fire({
            title: "Atenção!",
            text: "Còdigo da escola não foi informado. Tente novamente.",
            icon: "warning",
            confirmButtonText: "Voltar",
        });
        document.getElementById("ueid").focus();
        return;
    }

    //Verifica se foi inserido algum valor de carência
    if (total_carencia <= 0) {
        Swal.fire({
            title: "Atenção!",
            text: "Você não informou nenhuma carência. Tente novamente.",
            icon: "warning",
            confirmButtonText: "Voltar",
        });
        // alert("Valor total zerado!");
        document.getElementById("Matutino").focus();
        return;
    }

    var endereco = "/LancamentoCarencias/store/";
    $.ajax({
        url: endereco,
        method: "post",
        data: $(this).serialize(),
        dataType: "json",
        success: function (resposta) {
            var [{ success }] = resposta;
            var [{ message }] = resposta;

            alert("Retorno do controller " + resposta);
            console.log(message);

            if (!success) {
                Swal.fire({
                    title: "Atenção!",
                    text: message,
                    icon: "error",
                    confirmButtonText: "Voltar",
                });
            } else {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: message,
                    showConfirmButton: false,
                    timer: 3000,
                });
            }
        },
    });
}
//fim persiste carência no banco

function pesquisa_professor_carencia() {
    var matricula = document.getElementById("Matricula").value;

    if (matricula == null || matricula == "") {
        Swal.fire({
            title: "Atenção!",
            text: "Matrícula não informada. Tente novamente.",
            icon: "warning",
            confirmButtonText: "Voltar",
        });
        return;
    }

    var endereco = "/LancamentoCarencias/pesquisaProfessor/" + matricula;
    $.ajax({
        url: endereco,
        method: "post",
        data: $(this).serialize(),
        dataType: "json",
        success: function (resposta) {
            var [{ success }] = resposta;
            var [{ professor }] = resposta;
            var [{ message }] = resposta;
            // console.log(success);
            console.log(professor);
            // console.log(message);
            if (professor != "") {
                document.getElementById("Matricula").value =
                    professor.matricula;
                document.getElementById("matricula_sap").value =
                    professor.matricula_sap;
                document.getElementById("NomeProfessor").value = professor.nome;
                document.getElementById("Vinculo").value = professor.vinculo;
                // document.getElementById("CPF").value = professor.Cpf;
                // document.getElementById("Licenciatura").value = professor.LicPlena;
                $(".linha-02").removeClass("d-none");
                $(".linha-03").removeClass("d-none");
                $(".linha-04").removeClass("d-none");
                $(".linha-05").removeClass("d-none");
                $(".footer").removeClass("d-none");
            } else {
                Swal.fire({
                    title: "Atenção!",
                    text:
                        "Não existe professor com a matrícula (" +
                        document.getElementById("Matricula").value +
                        ") informada. Tente novamente!",
                    icon: "error",
                    confirmButtonText: "Voltar",
                });
                document.getElementById("Matricula").value = "";
                document.getElementById("MatriculaSap").value = "";
                document.getElementById("NomeProfessor").value = "";
                document.getElementById("Vinculo").value = "";
            }
        },
    });
}

function pesquisa_escola_provimento() {
    var codigo = document.getElementById("ueid").value;

    if (codigo == null || codigo == "") {
        Swal.fire({
            title: "Atenção!",
            text: "Còdigo da escola não foi informado. Tente novamente.",
            icon: "warning",
            confirmButtonText: "Voltar",
        });

        document.getElementById("ueid").focus();

        return;
    }

    var endereco = "/LancamentoCarencias/pesquisaEscola/" + codigo;

    $.ajax({
        url: endereco,
        method: "post",
        data: $(this).serialize(),
        dataType: "json",
        success: function (resposta) {
            var [{ success }] = resposta;
            var [{ escola }] = resposta;
            var [{ message }] = resposta;

            if (!!success && escola) {
                document.getElementById("ueid").value = escola.UeID;
                document.getElementById("UE").value = escola.Ue;
                document.getElementById("OU").value = escola.OU;
                document.getElementById("Municipio").value = escola.Municipio;
                document.getElementById("CodNte").value = escola.CodNte;
                document.getElementById("busca_escola").disabled = true;
                $(".matricula").prop("readonly", false);
                $(".btn-matricula").prop("disabled", false);
                $(".linha-01").removeClass("d-none");
            } else {
                Swal.fire({
                    title: "Atenção!",
                    text:
                        "Não existe escola com o código (" +
                        document.getElementById("ueid").value +
                        ") informado. Tente novamente!",
                    icon: "error",
                    confirmButtonText: "Voltar",
                });
                document.getElementById("ueid").value = "";
                document.getElementById("UE").value = "";
                document.getElementById("OU").value = "";
                document.getElementById("Municipio").value = "";
                document.getElementById("CodNte").value = "";
            }
        },
    });
}

function pesquisa_professor_provimento() {
    var matricula = document.getElementById("Matricula").value;

    if (matricula == null || matricula == "") {
        Swal.fire({
            title: "Atenção!",
            text: "Matrícula não informada. Tente novamente.",
            icon: "warning",
            confirmButtonText: "Voltar",
        });
        return;
    }

    var endereco = "/LancamentoCarencias/pesquisaProfessor/" + matricula;
    $.ajax({
        url: endereco,
        method: "post",
        data: $(this).serialize(),
        dataType: "json",
        success: function (resposta) {
            var [{ success }] = resposta;
            var [{ professor }] = resposta;
            var [{ message }] = resposta;
            // console.log(success);
            console.log(professor);
            // console.log(message);
            if (professor != "") {
                document.getElementById("Matricula").value =
                    professor.matricula;
                document.getElementById("MatriculaSap").value =
                    professor.matricula_sap;
                document.getElementById("NomeProfessor").value = professor.nome;
                document.getElementById("Vinculo").value = professor.vinculo;
                document.getElementById("CPF").value = professor.cpf;
                document.getElementById("Licenciatura").value =
                    professor.licenca_plena;
                $(".linha-02").removeClass("d-none");
                $(".linha-03").removeClass("d-none");
                $(".linha-04").removeClass("d-none");
                $(".linha-05").removeClass("d-none");
                $(".footer").removeClass("d-none");
                document.getElementById("submit").disabled = false;

                // console.log($(".datatable"))
            } else {
                Swal.fire({
                    title: "Atenção!",
                    text:
                        "Não existe professor com a matrícula (" +
                        document.getElementById("Matricula").value +
                        ") informada. Tente novamente!",
                    icon: "error",
                    confirmButtonText: "Voltar",
                });
                document.getElementById("Matricula").value = "";
                document.getElementById("MatriculaSap").value = "";
                document.getElementById("NomeProfessor").value = "";
                document.getElementById("Vinculo").value = "";
            }
        },
    });
}

// Busca toda a carência da UE informada
function pesquisa_carencia() {
    setTipoCarenciaDefinitiva;
    var ueid = document.getElementById("ueid").value;

    if (ueid == null || ueid == "") {
        Swal.fire({
            title: "Atenção!",
            text: "Código da escola não informado. Tente novamente.",
            icon: "warning",
            confirmButtonText: "Voltar",
        });
        return;
    }

    var endereco = "/Provimentos/pesquisaEscolaCarencia/" + ueid;

    // console.log(endereco);

    $.ajax({
        url: endereco,
        method: "post",
        data: $(this).serialize(),
        dataType: "json",
        success: function (resposta) {
            var [{ success }] = resposta;
            var [{ escola }] = resposta;
            var [{ message }] = resposta;

            var [{ carencia_success }] = resposta;
            var [{ carencia }] = resposta;
            var [{ carencia_message }] = resposta;

            // console.log(escola)
            if (!!success && escola) {
                document.getElementById("ueid").value = escola.id;
                document.getElementById("UE").value = escola.ue;
                document.getElementById("OU").value = escola.ou;
                document.getElementById("Municipio").value = escola.municipio;
                document.getElementById("CodNte").value = escola.nte_id;
                $(".matricula").prop("readonly", false);
                $(".btn-matricula").prop("disabled", false);
                $(".linha-01").removeClass("d-none");
                $(".linha-02").removeClass("d-none");

                // Se a escola existir, procurar por carência nesta escola
                //console.log(carencia);

                if (carencia) {
                    for (var i = 0; carencia.length > i; i++) {
                        // console.log(carencias[i].temporaria);

                        //Insere input caso carência >0
                        if (carencia[i].temporaria == 1) {
                            var temp =
                                "<i class='fas fa-hourglass-end fas-sm text-warning'></i>";
                        } else {
                            var temp =
                                "<i class='fas fa-hourglass fas-sm text-primary'></i>";
                        }

                        if (carencia[i].matutino > 0) {
                            MatProv =
                                "<input class='form-control form-control-sm text-primary' name='mat_prov[]' value='0' type='number' maxlength='2' min='0' max='" +
                                carencia[i].matutino +
                                "' required>";
                        } else {
                            MatProv =
                                "<input class='form-control form-control-sm text-primary' name='mat_prov[]' value='0' type='number' maxlength='2' min='0' max='0' readonly required>";
                        }

                        if (carencia[i].vespertino > 0) {
                            VespProv =
                                "<input class='form-control form-control-sm text-primary' name='vesp_prov[]' value='0' type='number' min='0' max='" +
                                carencia[i].vespertino +
                                "' required>";
                        } else {
                            VespProv =
                                "<input class='form-control form-control-sm text-primary' name='vesp_prov[]' value='0' type='number' maxlength='2' min='0' max='0' readonly required>";
                        }

                        if (carencia[i].noturno > 0) {
                            NotProv =
                                "<input class='form-control form-control-sm text-primary' name='not_prov[]'  value='0' type='number' min='0' max='" +
                                carencia[i].noturno +
                                "' required>";
                        } else {
                            NotProv =
                                "<input class='form-control form-control-sm text-primary' name='not_prov[]' value='0' type='number' maxlength='2' min='0' max='0' readonly required>";
                        }

                        // Adicionando registros retornados na tabela
                        $("#tabelaCarencia").append(
                            "<tr class='linha_carencia'>" +
                                "<td class='d-none' ><input name='disciplina_id[]' value='" +
                                carencia[i].disciplina_id +
                                "' type='number'></td>" +
                                "<td class='d-none' ><input name='temporaria[]' value='" +
                                carencia[i].temporaria +
                                "' type='number'></td>" +
                                "<td class='text-center'>" +
                                carencia[i].nome +
                                "</td>" +
                                "<td class='text-center'>" +
                                temp +
                                "</td>" +
                                "<td class='text-center'>" +
                                carencia[i].matutino +
                                "</td>" +
                                "<td class='campo text-center d-none'>" +
                                MatProv +
                                "</td>" +
                                "<td class='text-center'>" +
                                carencia[i].vespertino +
                                "</td>" +
                                "<td class='campo text-center d-none'>" +
                                VespProv +
                                "</td>" +
                                "<td class='text-center'>" +
                                carencia[i].noturno +
                                "</td>" +
                                "<td class='campo text-center d-none'>" +
                                NotProv +
                                "</td>" +
                                "<td class='text-center'>" +
                                carencia[i].total +
                                "</td>" +
                                "<td class='text-center'>" +
                                "<a href='#'><input type='checkbox' name='adicionar'/></a></td>" +
                                "</tr>"
                        );
                    }

                    //consultando todos os input to type checkbox na pagina
                    //caso a sua pagina possua mais inputs deste tipo, você deve tornar o filtro abaixo mais especifico.
                    var adicionar = document.querySelectorAll(
                        "input[type='checkbox']"
                    );

                    //consultando as tabelas que irão armazenar as disciplinas disponiveis e as que o aluno está matriculado.
                    var tabelaCarencia = document.querySelector(
                        "#tabelaCarencia tbody"
                    );
                    var tabelaProvimento = document.querySelector(
                        "#tabelaProvimento tbody"
                    );

                    //definindo o evento que irá mover a linha, é importante instanciar apenas um evento para todos os checkbox.
                    var adicionarOnClick = function () {
                        //caso o checkbox esteja marcado, mova a linha para a tabela de matriculados, caso contrario para a tabela de disciplinas disponiveis.
                        var escopo = this.checked
                            ? tabelaProvimento
                            : tabelaCarencia;

                        //tira e coloca d-none a depender do escopo
                        var linha = this.parentNode.parentNode.parentNode;
                        // linha.replace("d-none", "dnone")

                        var child_nodes = linha.childNodes;

                        child_nodes[5].classList.toggle("d-none");
                        child_nodes[7].classList.toggle("d-none");
                        child_nodes[9].classList.toggle("d-none");

                        //this é o checkbox que foi clickado, o parentNode dele é a celula atual, e o parentNode da celula é a linha (arvore).
                        escopo.appendChild(linha); //removeClass("d-none")
                    };

                    //registrando o evento criado acima para todos os checkbox.
                    for (var indice in adicionar) {
                        adicionar[indice].onclick = adicionarOnClick;
                    }

                    $(".quadroTabelaCarencia").removeClass("d-none");
                    document.getElementById("busca_escola").disabled = true;
                } else {
                    Swal.fire({
                        title: "Atenção!",
                        text:
                            "Não exite carência para o código (" +
                            ueid +
                            ") informado. Tente novamente!",
                        icon: "error",
                        confirmButtonText: "Voltar",
                    });
                    $(".quadroTabelaCarencia").addClass("d-none");
                    return;
                }
            } else {
                Swal.fire({
                    title: "Atenção!",
                    text:
                        "Não existe escola com o código (" +
                        document.getElementById("ueid").value +
                        ") informado. Tente novamente!",
                    icon: "error",
                    confirmButtonText: "Voltar",
                });
                document.getElementById("ueid").value = "";
                document.getElementById("UE").value = "";
                document.getElementById("OU").value = "";
                document.getElementById("Municipio").value = "";
                document.getElementById("CodNte").value = "";
                return;
            }
        },
    });
}
// Fim pesquisas ajax no banco

function setTipoCarenciaDefinitiva() {
    var _title = $("#titleCard").html() + " - Real";
    $("#titleCard").html(_title);

    document.querySelector("#titleCard").className = "float-left text-primary";
    document.querySelector("#borderCard").className =
        "card-body border-left-primary";
    document.querySelector("#tipoCarencia").value = "0";

    var endereco = "/LancamentoCarencias/motivoCarenciaTipo/0";
    $.ajax({
        url: endereco,
        method: "post",
        data: $(this).serialize(),
        dataType: "json",
        success: function (resposta) {
            var [{ motivos }] = resposta;

            if (motivos != "") {
                var select = document.getElementById("motivo_tipo_carencia");

                for (var i = 0; i < motivos.length; i++) {
                    if (motivos[i].temp == 0) {
                        var value = motivos[i].id;
                        var text = motivos[i].motivo;
                        var el = document.createElement("option");
                        el.textContent = text;
                        el.value = value;
                        select.appendChild(el);
                    }
                }
                $(".data-fim").hide();
                $(".termino_afastamento").prop("required", false);
                // $(".data-fim").prop("d-none", true)
            } else {
                Swal.fire({
                    title: "Atenção!",
                    text:
                        "Não existe motivos para carência real. Cadastre e tente novamente!",
                    icon: "error",
                    confirmButtonText: "Voltar",
                });
            }
        },
    });
}

function setTipoCarenciaTemporaria() {
    var _title = $("#titleCard").html() + " - Temporária";
    $("#titleCard").html(_title);

    document.querySelector("#titleCard").className = "float-left text-warning";
    document.querySelector("#borderCard").className =
        "card-body border-left-warning";
    document.querySelector("#tipoCarencia").value = "1";

    var endereco = "/LancamentoCarencias/motivoCarenciaTipo/1";
    $.ajax({
        url: endereco,
        method: "post",
        data: $(this).serialize(),
        dataType: "json",
        success: function (resposta) {
            var [{ motivos }] = resposta;

            if (motivos != "") {
                var select = document.getElementById("motivo_tipo_carencia");

                for (var i = 0; i < motivos.length; i++) {
                    if (motivos[i].temp == 1) {
                        var value = motivos[i].id;
                        var text = motivos[i].motivo;
                        var el = document.createElement("option");
                        el.textContent = text;
                        el.value = value;
                        select.appendChild(el);
                    }
                }
                $(".data-fim").show();
                $(".termino_afastamento").prop("required", true);
                // $(".data-fim").prop("d-none", true)
            } else {
                Swal.fire({
                    title: "Atenção!",
                    text:
                        "Não existe motivos para carência real. Cadastre e tente novamente!",
                    icon: "error",
                    confirmButtonText: "Voltar",
                });
            }
        },
    });
}

// Acumula os campos dos turnos para o campo total -->
function calcular_total_carencia() {
    var n1 = parseInt(document.getElementById("Matutino").value, 10);
    var n2 = parseInt(document.getElementById("Vespertino").value, 10);
    var n3 = parseInt(document.getElementById("Noturno").value, 10);
    total = n1 + n2 + n3;
    document.getElementById("total").value = total;
    if (total > 0) {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
}

// Validar campos do form de provimento
function validaFormProvimento() {
    var ueid = document.getElementById("ueid");
    var matricula = document.getElementById("Matricula");
    var motivo = document.getElementById("inputMotivo");
    var motivo_data_inicio = date(document.getElementById("DataInicio"));
    var motivo_data_fim = date(document.getElementById("DataFim"));
    var data_assuncao = date(document.getElementById("DataAssuncao"));

    if (ueid == "" || (ueid = null)) {
        erro = "Código empresa está vazio";
    }

    if (ueid.length > 8) {
        erro = "Código da escola não pode ter mais que 8 dígitos";
    }

    if (motivo <= 0) {
        document.getElementById("erroMotivo").value =
            "Por favor, escolha um motivo de provimento.";
    }

    if (motivo_data_fim <= motivo_data_inicio) {
        erro = "Data final não pode ser menor ou igual a data início.";
    }
}

function habilitaDataAnuencia() {
    if (document.getElementById("cb_anuencia").checked) {
        document.getElementById("DataAnuencia").removeAttribute("disabled");
    } else {
        document.getElementById("cb_anuencia").value = ""; // Evita que o usuário defina um texto e desabilite o campo após realiza-lo
        document
            .getElementById("DataAnuencia")
            .setAttribute("disabled", "disabled");
    }
}

function habilitaDataAssuncao() {
    console.log("Chogou na função...");
    if (document.getElementById("cb_assuncao").checked) {
        document.getElementById("DataAssuncao").removeAttribute("disabled");
    } else {
        document.getElementById("cb_assuncao").value = ""; // Evita que o usuário defina um texto e desabilite o campo após realiza-lo
        document
            .getElementById("DataAssuncao")
            .setAttribute("disabled", "disabled");
    }
}

// Varre tabela a procura de horas para prover
function Percorrer_Tabela(table) {
    console.log(table);
}

// Chama modal com dados da linha para informar carência
function inserirCarencia() {
    $("#carenciaModal").modal({ show: true });

    celulaClicada = $("#tbListaCarencia tr").on("click", function () {
        return $(this).children().last();
    });

    console.log(celulaClicada);
    //    alert(celulaClicada.children().last());
}

function deleta_carencia() {
    var url =
        "/LancamentoCarencias/delete/" + document.getElementById("id").value;

    Swal.fire({
        title: "Tem certeza?",
        text: "Esta carência será excluída permanentemente.",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Excluir",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Exclusão!", "Carência excluída com sucesso.", "success");
            window.location.href = url;
        }
    });
}

function deleta_provimento() {
    var url =
        "/provimentos/delete/" + document.getElementById("provimento_id").value;

    Swal.fire({
        title: "Tem certeza?",
        text: "Este provimento será excluído permanentemente.",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Excluir",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                "Exclusão!",
                "Provimento excluída com sucesso.",
                "success"
            );
            window.location.href = url;
        }
    });
}

function consulta_carencia_detalhada() {
    // alert('chegou na função')

    var endereco = "/LancamentoCarencias/consutla_carencia";

    var tipo_consulta = "real";

    var dados = new FormData();

    dados.append( "nte", $('#nte').val());
    dados.append( "municipio", $('#municipio').val() );
    dados.append( "ue_id", $('#ue_id').val());
    dados.append( "ue", $('#ue').val());
    // dados.append( "tipo_carencia", "0");
    dados.append( "tipo_carencia", $('#tipo_carencia').val());
    dados.append( "disciplina", $('#disciplina').val());
    dados.append( "tipo_consulta", tipo_consulta);

    $.ajax({
        url: endereco,
        method: "POST",
        data: dados,
        // data: $(this).serialize(),
        // dataType: "json",
        processData: false,
        contentType: false,
    }).done(function (resposta) {

        var dataSet = JSON.parse(resposta);

        console.log(dataSet);

        if (dataSet != "") {
            // var table = 
            $("#consulta_carencia").DataTable({
                destroy: true,
                // scrollX: true,
                bAutoWidth: true,
                autoWidth: true,
                scrollX: true,
                scrollCollapse: false,
                scroller: true,
                data: dataSet,
                // ajax: "consutla_carencia",
                // "ajax": "/consutla_carencia",
                dom: "Bfrtip",
                buttons: [
                    {
                        extend: "excelHtml5",
                        text: '<i class="far fa-file-excel"></i>',
                        titleAttr: "Exporta para excel",
                        className: "",
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="far fa-file-pdf"></i>',
                        titleAttr: "Exporta para PDF",
                        // className: 'btn btn-success'
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fas fa-file-csv"></i>',
                        titleAttr: "Exporta para cvs",
                        className: "",
                    },
                    {
                        extend: "copyHtml5",
                        text: '<i class="fas fa-copy"></i>',
                        titleAttr: "Copia para área de transferência",
                        className: "",
                    },
                ],
            });

            // table.columns.adjust().draw();
            return;
        } else {
            alert("Carencia vazia");

            Swal.fire({
                title: "Atenção!",
                text:
                    "Não existe motivos para carência real. Cadastre e tente novamente!",
                icon: "error",
                confirmButtonText: "Voltar",
            });
            return;
        }
    });

}

function consulta_carencia_real() {
    // alert('chegou na função')

    var endereco = "/LancamentoCarencias/consutla_carencia";

    var tipo_consulta = "detalhada";

    var dados = new FormData();

    dados.append( "nte", $('#nte').val());
    dados.append( "municipio", $('#municipio').val() );
    dados.append( "ue_id", $('#ue_id').val());
    dados.append( "ue", $('#ue').val());
    // dados.append( "tipo_carencia", "0");
    dados.append( "tipo_carencia", $('#tipo_carencia').val());
    dados.append( "disciplina", $('#disciplina').val());
    dados.append( "tipo_consulta", tipo_consulta);

    $.ajax({
        url: endereco,
        method: "POST",
        data: dados,
        // data: $(this).serialize(),
        // dataType: "json",
        processData: false,
        contentType: false,
    }).done(function (resposta) {

        var dataSet = JSON.parse(resposta);

        console.log(dataSet);

        if (dataSet != "") {
            // var table = 
            $("#consulta_carencia").DataTable({
                destroy: true,
                // scrollX: true,
                bAutoWidth: true,
                autoWidth: true,
                scrollX: true,
                scrollCollapse: false,
                scroller: true,
                data: dataSet,
                // ajax: "consutla_carencia",
                // "ajax": "/consutla_carencia",
                dom: "Bfrtip",
                buttons: [
                    {
                        extend: "excelHtml5",
                        text: '<i class="far fa-file-excel"></i>',
                        titleAttr: "Exporta para excel",
                        className: "",
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="far fa-file-pdf"></i>',
                        titleAttr: "Exporta para PDF",
                        // className: 'btn btn-success'
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fas fa-file-csv"></i>',
                        titleAttr: "Exporta para cvs",
                        className: "",
                    },
                    {
                        extend: "copyHtml5",
                        text: '<i class="fas fa-copy"></i>',
                        titleAttr: "Copia para área de transferência",
                        className: "",
                    },
                ],
            });

            // table.columns.adjust().draw();
            return;
        } else {
            alert("Carencia vazia");

            Swal.fire({
                title: "Atenção!",
                text:
                    "Não existe motivos para carência real. Cadastre e tente novamente!",
                icon: "error",
                confirmButtonText: "Voltar",
            });
            return;
        }
    });

}