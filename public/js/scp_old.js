
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

//Tootips
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

//Procura a escola informada na base de dados
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

    var endereco = "/lancamentocarencias/pesquisaEscola/" + codigo;
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

    var endereco = "/lancamentocarencias/pesquisaProfessor/" + matricula;
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
            // console.log(professor);
            // console.log(message);
            if (professor != "") {
                document.getElementById("Matricula").value =
                    professor.Matricula;
                document.getElementById("MatriculaSap").value =
                    professor.MatriculaSap;
                document.getElementById("NomeProfessor").value = professor.Nome;
                document.getElementById("Vinculo").value = professor.Vinculo;
                // document.getElementById("CPF").value = professor.Cpf;
                // document.getElementById("Licenciatura").value = professor.LicPlena;
                $(".linha-02").removeClass("d-none");
                $(".linha-03").removeClass("d-none");
                $(".linha-04").removeClass("d-none");
                $(".linha-05").removeClass("d-none");
                $(".footer").removeClass("d-none");
                document.getElementById("submit").disabled = false;
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

    var endereco = "/lancamentocarencias/pesquisaEscola/" + codigo;
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

                $(".ueid").prop("readonly", true);
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

    var endereco = "/lancamentocarencias/pesquisaProfessor/" + matricula;
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
            // console.log(professor);
            // console.log(message);
            if (professor != "") {
                document.getElementById("Matricula").value =
                    professor.Matricula;
                document.getElementById("Matricula").disabled = true;
                document.getElementById("MatriculaSap").value =
                    professor.MatriculaSap;
                document.getElementById("NomeProfessor").value = professor.Nome;
                document.getElementById("Vinculo").value = professor.Vinculo;
                document.getElementById("CPF").value = professor.Cpf;
                document.getElementById("Licenciatura").value =
                    professor.LicPlena;
                document.getElementById("busca_professor").disabled = true;
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

//Busca carência para realizar o provimento
function pesquisa_carencia() {
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

    var endereco = "/lancamentocarencias/pesquisaEscola/" + ueid;
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
                document.getElementById("ueid").disabled = true;
                $(".matricula").prop("readonly", false);
                $(".btn-matricula").prop("disabled", false);
                $(".linha-01").removeClass("d-none");
                $(".linha-02").removeClass("d-none");

                //Se a escola existir, procurar por carência nesta escola
                var ueid = document.getElementById("ueid").value;
                var endereco = "/carencias/pesquisaCarenciasByUeid/" + ueid;
                $.ajax({
                    url: endereco,
                    method: "post",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (resposta) {
                        var [{ success }] = resposta;
                        var [{ carencias }] = resposta;
                        var [{ message }] = resposta;
                        // console.log(success);
                        // console.log(carencias);
                        // console.log(message);

                        if (carencias != "") {
                            for (var i = 0; carencias.length > i; i++) {
                                //console.log(carencias[i].temporaria);

                                if (carencias[i].temporaria == 1) {
                                    var temp =
                                        "<i class='fas fa-check fas-sm'></i>";
                                } else {
                                    var temp = "";
                                }

                                //Adicionando registros retornados na tabela
                                $("#tabelaCarencia").append(
                                    "<tr>" +
                                        "<td>" +
                                        carencias[i].nome + carencias[i].disciplina_id +
                                        "<td class='text-center'>" +
                                        temp +
                                        "</td><td class='text-center'>" +
                                        carencias[i].matutino +
                                        "</td><td class='text-center'>" +
                                        carencias[i].vespertino +
                                        "</td><td class='text-center'>" +
                                        carencias[i].noturno +
                                        "</td><td class='text-center'>" +
                                        carencias[i].total +
                                        "</td><td class='text-center'>" +
                                        "<a class='btn btn-sm btn-circle btn-outline-primary' data-toggle='modal' data-target='#carenciaModal' ><i class='fas fa-user-clock'></i></a>" +
                                        "</td><td style='display:none;'>" + 
                                        "</td>" +
                                        "</tr>"
                                );
                            }

                            // $('#tabelaCarencia2').DataTable({
                            //     data: carencias
                            // });

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
                        }
                        var table = $("#tabelaCarencia").tableToJSON();
                        document.getElementById("variavel_tabela").value = table.tableToJSON();
                        console.log(table).tableToJSON();
                    },
                });
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
} //Fim pesquisas ajax no banco

function setTipoCarenciaDefinitiva() {
    var _title = $("#titleCard").html() + " - Real";
    $("#titleCard").html(_title);

    var _element = document.querySelector("#titleCard");
    _element.className = "float-left text-primary";
    var _element = document.querySelector("#borderCard");
    _element.className = "card-body border-left-primary";
    var _element = document.querySelector("#tipoCarencia");
    _element.value = "0";
}

function setTipoCarenciaTemporaria() {
    var _title = $("#titleCard").html() + " - Temporária";
    $("#titleCard").html(_title);

    var _element = document.querySelector("#titleCard");
    _element.className = "float-left text-warning";

    var _element = document.querySelector("#borderCard");
    _element.className = "card-body border-left-warning";

    var _element = document.querySelector("#tipoCarencia");
    _element.value = "1";
}

$("#modalTipoCarencia").modal({
    backdrop: "static",
    keyboard: false,
});

$(document).ready(function () {
    $("#modalTipoCarencia").modal("show");
});

// Acumula os campos dos turnos para o campo total -->
function calcular_total_carencia() {
    var n1 = parseInt(document.getElementById("Matutino").value, 10);
    var n2 = parseInt(document.getElementById("Vespertino").value, 10);
    var n3 = parseInt(document.getElementById("Noturno").value, 10);
    document.getElementById("Total").value = n1 + n2 + n3;
}

//Validar campos do form de provimento
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
        document.getElementById("cb_anuencia").value = ""; //Evita que o usuário defina um texto e desabilite o campo após realiza-lo
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
        document.getElementById("cb_assuncao").value = ""; //Evita que o usuário defina um texto e desabilite o campo após realiza-lo
        document
            .getElementById("DataAssuncao")
            .setAttribute("disabled", "disabled");
    }
}
