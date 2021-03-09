SELECT `scp_provimento`.`id`,
  `scp_provimento`.`ue_id`,
  `scp_provimento`.`matricula`,
  `scp_provimento`.`forma_suprimento_id`,
  `scp_provimento`.`assuncao`,
  `scp_provimento`.`data_assuncao`,
  `scp_ue`.`id`,
  `scp_professor`.`matricula`,
  `scp_professor`.`nome`,
  `scp_forma_suprimento`.`id`,
  `scp_forma_suprimento`.`nome`
FROM `scp_provimento`
  LEFT JOIN `scp_ue` ON `scp_ue`.`id` = `scp_provimento`.`ue_id`
  LEFT JOIN `scp_professor` ON `scp_professor`.`matricula` = `scp_provimento`.`matricula`
  LEFT JOIN `scp_forma_suprimento` ON `scp_forma_suprimento`.`id` = `scp_provimento`.`forma_suprimento_id`