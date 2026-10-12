<?php
/**
 * PLANO DE ESTUDOS — fonte: Organização Modular oficial do agrupamento
 * https://aecidadela.pt/wp-content/uploads/2024/04/Distribuicao-Modular-Inf-Gestao.pdf
 * 'horas' = [1.º ano, 2.º ano, 3.º ano]. 'modulos' = [ano => [[nome, horas], ...]]
 * Para editar: muda os números ou os nomes. Os totais calculam-se sozinhos.
 */
return ['disciplinas' => [

 ['nome'=>'Português','comp'=>'Sociocultural','horas'=>[100,100,120]],
 ['nome'=>'Inglês','comp'=>'Sociocultural','horas'=>[75,73,72]],
 ['nome'=>'Área de Integração','comp'=>'Sociocultural','horas'=>[109,111,0]],
 ['nome'=>'Educação Física','comp'=>'Sociocultural','horas'=>[55,55,30]],
 ['nome'=>'Tecnologias da Informação e Comunicação','comp'=>'Sociocultural','horas'=>[50,50,0],'modulos'=>[
   1=>[['Pesquisar, filtrar e estruturar informação e conteúdos em ambientes digitais',20],['Organização e tratamento de dados',30]],
   2=>[['Gestão de base de dados',25],['Criação de páginas WEB',25]]]],

 ['nome'=>'Matemática','comp'=>'Científica','horas'=>[135,84,81],'modulos'=>[
   1=>[['A1 Geometria',36],['A2 Funções Polinomiais',36],['A3 Estatística',27],['A4 Funções Periódicas',36]],
   2=>[['A5 Funções Racionais',36],['A6 Taxa de Variação',27],['A7 Probabilidade',21]],
   3=>[['A8 Modelos Discretos',27],['A9 Funções de Crescimento',27],['A10 Otimização',27]]]],
 ['nome'=>'Economia','comp'=>'Científica','horas'=>[75,72,53],'modulos'=>[
   1=>[['A economia e o problema económico',18],['Agentes económicos e atividades económicas',33],['Mercados de bens e serviços e de fatores produtivos',24]],
   2=>[['Moeda e financiamento da atividade económica',24],['O Estado e a atividade económica',24],['A interdependência das economias atuais',24]],
   3=>[['Crescimento, desenvolvimento e flutuações da atividade económica',27],['A economia portuguesa na atualidade',26]]]],

 ['nome'=>'Linguagens de Programação','comp'=>'Técnica','horas'=>[216,138,74],'modulos'=>[
   1=>[['Algoritmia',24],['Introdução à Linguagem de Programação',18],['Estruturas de Controlo',36],['Subprogramas (Procedimentos e Funções)',30],['Tipo Estruturado – Tabelas',21],['Tipo Estruturado – Registos',21],['Estruturas Dinâmicas (Apontadores)',21],['Ficheiros',15],['Projeto',30]],
   2=>[['Introdução à Programação Orientada a Objetos',18],['Introdução à Linguagem de Programação Orientada a Objetos',24],['Fundamentos Avançados de Programação Orientada por Objetos',33],['Gestão de Componentes',30],['Acesso a Bases de Dados',33]],
   3=>[['Especificação e Documentação',24],['Instalação e Apoio ao Utilizador',15],['Desenvolvimento de uma Aplicação de Gestão',35]]]],
 ['nome'=>'Organização de Empresas e Aplicações de Gestão','comp'=>'Técnica','horas'=>[153,114,0],'modulos'=>[
   1=>[['A Empresa',12],['Legislação Comercial',24],['Documentação Comercial',24],['Gestão de Aprovisionamento e Vendas',24],['Aplicações Informáticas de Gestão – Área Comercial',24],['Cálculo Financeiro e Atuarial',24],['Contabilidade e Informação Financeira',21]],
   2=>[['Introdução ao Sistema de Normalização Contabilística',24],['Classificação e Aplicações Informáticas de Documentos Contabilísticos',24],['Elementos de Análise Económica e Financeira',24],['Gestão de Recursos Humanos',24],['Aplicações Informáticas de Gestão de Pessoal',18]]]],
 ['nome'=>'Sistemas de Informação','comp'=>'Técnica','horas'=>[0,171,63],'modulos'=>[
   2=>[['Análise de Sistemas',21],['Tecnologias de Bases de Dados',30],['Programação SQL',30],['Servidor de Dados',27],['Gestão de Conteúdos Partilhados',27],['Aplicações Baseadas em Browsers',36]],
   3=>[['Acesso Remoto a Bases de Dados',36],['Projeto',27]]]],
 ['nome'=>'Aplicações Informáticas e Sistemas de Exploração','comp'=>'Técnica','horas'=>[96,75,0],'modulos'=>[
   1=>[['Componentes Informáticos',27],['Processador de Texto Avançado',15],['Folha de Cálculo Avançada',18],['Tecnologias de Rede',36]],
   2=>[['Utilização de um SO Cliente/Servidor',24],['Instalação, Configuração e Administração de um SO',33],['Políticas de Segurança',18]]]],
 ['nome'=>'Formação em Contexto de Trabalho','comp'=>'FCT','horas'=>[0,0,600]],
]];
