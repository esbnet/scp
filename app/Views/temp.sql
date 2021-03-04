select
  *
from
  (
    SELECT
      od.DIREC NTE,
      od.municipio,
      od.codsecul,
      od.orgao,
      s.cadastro,
      s.cadastrosap,
      s.nome,
      /*(trunc (sysdate) - s.dataadmissao )/365.25 tempo_servico, */
      S.DATAADMISSAO,
      reg.regime,
      sit.situacao,
      SIT.FOLHA,
      ts.tiposervidor,
      spc.cargo,
      SPC.FUNCAO,
      S.CPF
    FROM
      diario.servidores s,
      diario.m_view_orgao_direc od,
      diario.regimes reg,
      diario.tiposservidor ts,
      diario.situacoes sit,
      diario.view_servidor_planocargos spc,
      diario.dadospessoais dp
    WHERE
      s.codorgao = od.codorgao
      AND s.codregime = reg.codregime
      AND s.codtiposervidor = ts.codtiposervidor
      AND s.codsituacao = sit.codsituacao
      AND s.cadastro = spc.cadastro
      AND s.coddadospessoais = dp.coddadospessoais (+)
      AND od.anoreferencia = (
        SELECT
          MAX(od1.anoreferencia)
        FROM
          diario.m_view_orgao_direc od1
        WHERE
          od1.codorgao = od.codorgao
      )
      AND s.provisorio = 'N'
      AND s.excluidasirh = 0
      AND s.codtiposervidor in (1, 3, 5)
      AND s.codsituacao in (
        0,
        1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        10,
        11,
        12,
        13,
        14,
        15,
        16,
        17,
        18,
        19,
        20,
        22,
        23,
        24,
        25,
        26,
        27,
        28,
        29,
        30,
        31,
        32,
        33,
        36,
        37,
        38,
        39,
        40,
        41,
        42,
        43,
        44,
        45,
        46,
        48,
        49,
        58,
        60,
        61,
        62,
        63,
        64,
        65,
        66,
        67,
        68,
        69,
        70,
        71,
        88
      )
  ) S,
  (
    select
      q1.CADASTRO,
      --,SUM(CURSOS.CURSO) QTD,
      --MIN(DECODE(q1.codgrau, 9, UPPER(q1.curso) , NULL)) ensinomedio,
      --MIN(DECODE(q1.codgrau, 8, UPPER(q1.curso) , NULL)) ensinomedioESPECIFICO,
      -- MIN(DECODE(q1.codgrau, 2, UPPER(q1.curso) , NULL)) licenciatura_curta,
      --MIN(DECODE(q1.codgrau, 3, UPPER(q1.curso) , NULL)) bacharelado,
      --MIN(DECODE(q1.codgrau, 13, UPPER(q1.curso) , NULL)) TECNOLOGO,
      --MAX(DECODE(q1.codgrau, 1, UPPER(q1.curso) , NULL)) licenciatura_plena2,
      MIN(DECODE(q1.codgrau, 1, UPPER(q1.curso), NULL)) licenciatura_plena -- MIN(DECODE(q1.codgrau, 10, UPPER(q1.curso) , NULL)) LICENCIATURA_POS,
      --MIN(DECODE(q1.codgrau, 11, UPPER(q1.curso) , NULL)) BACHARELADO_POS,
      --MIN(DECODE(q1.codgrau, 4, UPPER(q1.curso) , NULL)) especializacao_pos
      --MIN(DECODE(q1.codgrau, 5, UPPER(q1.curso) , NULL)) especializacao_mestrado
      -- MIN(DECODE(q1.codgrau, 6, UPPER(q1.curso) , NULL)) especializacao_doutorado
    from
      (
        SELECT
          cs.CADASTRO,
          cursos.codgrau,
          gr.grau,
          cursos.curso
        FROM
          DIARIO.CURSOSSERVIDORES CS,
          DIARIO.CURSOS CURSOS,
          diario.graus gr
        WHERE
          CS.CODCURSO = CURSOS.CODCURSO
          and CURSOS.CODGRAU = gr.codgrau --and (UPPER (cursos.curso) like '%EDUCAÇÃO%' OR upper (cursos.curso) like '%FISICA%')
          --and (UPPER (cursos.curso) like '%BIOLOGIA%') --OR upper (cursos.curso) like '%FISICA%')
      ) q1
    group by
      q1.CADASTRO
  ) form
where
  S.CADASTRO = form.CADASTRO(+) --AND S.CADASTRO=ATIV.CADASTRO(+)
  --AS.CODSECUL=1102550
  AND FORM.CADASTRO IS NULL --ORDER BY FORM.CADASTRO"""