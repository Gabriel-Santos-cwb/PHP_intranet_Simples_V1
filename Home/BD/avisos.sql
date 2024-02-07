CREATE TABLE Avisos (
  ID_avisos INT AUTO_INCREMENT PRIMARY KEY,
  id_form char(20),
  ativo char(20),
  descricao text, 
  importancia char(20),
  class char(100),
  titulo char(200),
  coluna3 text
    
);

SELECT login.*, setor.nome_setor
FROM intranet.login
INNER JOIN `chamados-intranet`.setor ON login.Setor_user = `chamados-intranet`.setor.IDsetor
WHERE id_login = '1'





SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, acao_subcategoria.nome_acao, acao_subcategoria.id_sla, sla_chamados.tempo, setor.nome_setor, sla_chamados.id_calendario, calendarios.diasTrabalho, calendarios.horarioInicio, calendarios.horarioFim FROM chamados
                        INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria
                        INNER JOIN sub_categoria ON chamados.IDSubCategoria = sub_categoria.id_subcategoria
                        INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao
                        INNER JOIN setor ON chamados.IDsetor = setor.idsetor
                        INNER JOIN sla_chamados ON acao_subcategoria.id_sla = sla_chamados.id_sla
                        INNER JOIN calendarios ON sla_chamados.id_calendario = calendarios.id_calendario
                        
                        
                        WHERE chamados.IDsetor = '1'


                        SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, acao_subcategoria.nome_acao, acao_subcategoria.id_sla, sla_chamados.tempo, setor.nome_setor, sla_chamados.id_calendario, sla_chamados.id_prioridade, calendarios.diasTrabalho, calendarios.horarioInicio, calendarios.horarioFim, prioridade.nome_prioridade FROM chamados
                                INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria
                                INNER JOIN sub_categoria ON chamados.IDSubCategoria = sub_categoria.id_subcategoria
                                INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao
                                INNER JOIN setor ON chamados.IDsetor = setor.idsetor
                                INNER JOIN sla_chamados ON acao_subcategoria.id_sla = sla_chamados.id_sla
                                INNER JOIN calendarios ON sla_chamados.id_calendario = calendarios.id_calendario
                                INNER JOIN prioridade ON sla_chamados.id_prioridade = prioridade.IDprioridade
                                WHERE chamados.IDsetor = '1'