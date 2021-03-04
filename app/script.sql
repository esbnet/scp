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
      dp.pai,
      dp.mae,
      dp.rg,
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
      AND s.codtiposervidor in (1, 3)
  ) S,
  (
    select
      q1.CADASTRO,
      --q1.grau----,SUM(CURSOS.CURSO) QTD,
      --MIN(DECODE(q1.codgrau, 9, UPPER(q1.curso) , NULL)) ensinomedio,
      --MIN(DECODE(q1.codgrau, 8, UPPER(q1.curso) , NULL)) ensinomedioESPECIFICO,
      -- MIN(DECODE(q1.codgrau, 2, UPPER(q1.curso) , NULL)) licenciatura_curta,
      MIN(DECODE(q1.codgrau, 3, UPPER(q1.curso), NULL)) bacharelado,
      --MIN(DECODE(q1.codgrau, 13, UPPER(q1.curso) , NULL)) TECNOLOGO,
      MAX(DECODE(q1.codgrau, 1, UPPER(q1.curso), NULL)) licenciatura_plena2,
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
          and CURSOS.CODGRAU = gr.codgrau --and (UPPER (cursos.curso) like '%EDUCAÇÃO%' OR  upper (cursos.curso) like '%FISICA%')
          --and (UPPER (cursos.curso) like '%BIOLOGIA%') --OR  upper (cursos.curso) like '%FISICA%')
      ) q1
    group by
      q1.CADASTRO --,q1.grau
  ) form
where
  S.CADASTRO = form.CADASTRO(+) --AND S.CADASTRO=ATIV.CADASTRO(+)
  --AS.CODSECUL=1102550
  AND (
    S.CADASTRO IN (
      111546434,
      111704650,
      112550020,
      116511939,
      116335464,
      92005166,
      112387118,
      116276733,
      116276880,
      116276979,
      116285538,
      112404067,
      92034217,
      112006398,
      111544822,
      111665979,
      112386879,
      112592713,
      111975926,
      112450987,
      111034314,
      111112861,
      110925902,
      111590881,
      111966757,
      112432426,
      92034040,
      92012868,
      92034019,
      116519068,
      116561950,
      92017971,
      112449871,
      112563950,
      111971045,
      112469588,
      111630487,
      111992635,
      111305422,
      111584602,
      111977279,
      112454460,
      112481378,
      111650851,
      112453757,
      92012902,
      92015232,
      92012872,
      112397503,
      92018100,
      112399246,
      111142476,
      111969056,
      111940230,
      112522302,
      112810200,
      116511214,
      111933071,
      92010483,
      92032331,
      110723708,
      112389005,
      112730727,
      112472939,
      111012231,
      111446595,
      111979695,
      92024385,
      92026160,
      112388821,
      112574684,
      111770180,
      112408338,
      112546314,
      110708504,
      112754195,
      111928953,
      116280936,
      92035230,
      92018523,
      112412905,
      112431535,
      92034049,
      111058839,
      111938851,
      112392359,
      112589396,
      92034122,
      115773106,
      115859839,
      116567980,
      111558499,
      111565153,
      110080207,
      111563020,
      111996362,
      110969312,
      116516743,
      92033567,
      112491145,
      111622214,
      92016094,
      92027983,
      112571571,
      92003475,
      112424457,
      92021546,
      92027514,
      111608799,
      92015221,
      112393834,
      113507232,
      111515441,
      92017935,
      92035263,
      111960874,
      110840398,
      111925947,
      110008221,
      111658312,
      92027236,
      92034015,
      111676564,
      92018286,
      111263361,
      112395268,
      112557373,
      111554518,
      111599194,
      112438587,
      112432507,
      112460047,
      112300718,
      110979147,
      92014992,
      111515734,
      92018507,
      92017830,
      116504398,
      92034127,
      116425439,
      92015789,
      112584702,
      112845124,
      112366439,
      92021136,
      116516824,
      116279375,
      112753806,
      112440152,
      92015182,
      111294590,
      111535378,
      111904226,
      111679889,
      116417800,
      112035826,
      112569891,
      92032657,
      92033992,
      116279163,
      116279294,
      111438144,
      111965769,
      92032710,
      92032713,
      111925785,
      92019108,
      92026881,
      112426310,
      112376882,
      112428956,
      92020661,
      92013001
    )
  ) --AND FORM.CADASTRO IS NULL
  --ORDER BY FORM.CADASTRO