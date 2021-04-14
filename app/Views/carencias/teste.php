<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">

<body>

    <table id="example" class="display" width="100%"></table>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
    // var dataSet = [
    //     ["NUCLEO 05 - ITABUNA", "ITABUNA", "1111738", "COLEGIO ESTADUAL FELIX MENDONCA", "CIENCIAS", "5", "2", "0", "7", "1", "Licenca Medica", "2021-04-11", "2021-04-30", "5"],
    //     ["N\u00daCLEO 26 - SALVADOR", "MADRE DE DEUS", "1103468", "ESCOLA ROBERTO CORREIA", "INGL\u00caS", "0", "10", "0", "10", "1", "Comorbidade", "2021-04-09", "2021-04-30", "26"],
    //     ["N\u00daCLEO 26 - SALVADOR", "SALVADOR", "1100485", "COLEGIO ESTADUAL ANA BERNARDES", "BIOLOGIA", "5", "0", "0", "5", "1", "+ 60 Anos", "2021-04-08", "0000-00-00", "26"],
    //     ["N\u00daCLEO 26 - SALVADOR", "SALVADOR", "1100485", "COLEGIO ESTADUAL ANA BERNARDES", "F\u00cdSICA", "5", "0", "0", "5", "1", "Comorbidade", "2021-04-16", "2021-04-30", "26"],
    //     ["N\u00daCLEO 26 - SALVADOR", "SALVADOR", "1100485", "COLEGIO ESTADUAL ANA BERNARDES", "INGL\u00caS", "0", "16", "0", "16", "1", "Licenca Medica", "2021-04-09", "2021-05-01", "26"]
    // ];

    var endereco = "/LancamentoCarencias/consutla_carencia";
    var dados = new FormData();

    dados.append( "nte", "26");
    
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
        console.log(typeof(dataSet));

    $(document).ready(function() {
        $('#example').DataTable({
            data: dataSet,
            columns: [{
                    title: "NTE"
                },
                {
                    title: "Mun"
                },
                {
                    title: "COd"
                },
                {
                    title: "UE"
                },
                {
                    title: "Disc."
                },
                {
                    title: "Mat"
                },
                {
                    title: "Vesp"
                },
                {
                    title: "Not"
                },
                {
                    title: "Total"
                },
                {
                    title: "Temp"
                },
                {
                    title: "Mot"
                },
                {
                    title: "Inicio"
                },
                {
                    title: "Fim"
                },
                {
                    title: "..."
                },
            ]
        });
    });
});
    
</script>

</html>