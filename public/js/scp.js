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
                document.getElementById("ueid").value = escola.id;
                document.getElementById("UE").value = escola.ue;
                document.getElementById("OU").value = escola.ou;
                document.getElementById("Municipio").value = escola.municipio;
                document.getElementById("CodNte").value = escola.nte_id;
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

// Busca carência para realizar o provimento
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

    var endereco = "/provimentos/pesquisaEscolaCarencia/" + ueid;

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
                console.log(carencia);

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
                                "'>";
                        } else {
                            MatProv = " - ";
                        }

                        if (carencia[i].vespertino > 0) {
                            VespProv =
                                "<input class='form-control form-control-sm text-primary' name='vesp_prov[]' value='0' type='number' min='0' max='" +
                                carencia[i].vespertino +
                                "'>";
                        } else {
                            VespProv = " - ";
                        }

                        if (carencia[i].noturno > 0) {
                            NotProv =
                                "<input class='form-control form-control-sm text-primary' name='not_prov[]'  value='0' type='number' min='0' max='" +
                                carencia[i].noturno +
                                "'>";
                        } else {
                            NotProv = " - ";
                        }

                        // Adicionando registros retornados na tabela
                        $("#tabelaCarencia").append(
                            "<tr class='linha_carencia'>" +
                                "<td>" +
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
                                "<a href='#'>" +
                                "<input type='checkbox' name='adicionar'/>" +
                                "</td>" +
                                "</a>" +
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

                        child_nodes[3].classList.toggle("d-none");
                        child_nodes[5].classList.toggle("d-none");
                        child_nodes[7].classList.toggle("d-none");

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
}

function setTipoCarenciaTemporaria() {
    var _title = $("#titleCard").html() + " - Temporária";
    $("#titleCard").html(_title);

    document.querySelector("#titleCard").className = "float-left text-warning";
    document.querySelector("#borderCard").className =
        "card-body border-left-warning";
    document.querySelector("#tipoCarencia").value = "1";
}

$("#modalTipoCarencia").modal({ backdrop: "static", keyboard: false });

// $(document).ready(function () {
//     $("#modalTipoCarencia").modal("show");
// });

// Acumula os campos dos turnos para o campo total -->
function calcular_total_carencia() {
    var n1 = parseInt(document.getElementById("Matutino").value, 10);
    var n2 = parseInt(document.getElementById("Vespertino").value, 10);
    var n3 = parseInt(document.getElementById("Noturno").value, 10);
    document.getElementById("Total").value = n1 + n2 + n3;
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

function SalvarProvimento() {}

// Código das funções Adicionar, Salvar, Editar e Excluir
// $(".btnEditar").bind("click", EditarCarencia);
// $("#btnAdicionar").bind("click", Adicionar);
