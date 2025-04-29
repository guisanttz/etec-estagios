-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/04/2025 às 02:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `etecestagios`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administradores`
--

INSERT INTO `administradores` (`id`, `nome`, `email`, `usuario`, `senha`) VALUES
(1, 'Cauã Mimura', 'caua@email.com', 'cauaadmin', '$2y$10$6ijkMVkwdrb6H7vlVF0wsODdD038UiOYO8G3tSY1P3ed/S/vyR2JG'),
(2, 'Guilherme Santos', 'guiadmin@email.com', 'guiadmin', '$2y$10$qFeHYy42eiGIwFgxQJq5f.99D/x40Hsc5L5MOvYd3N6/63J6hhbx2'),
(3, 'Samuel Dionizio', 'samueladmin@email.com', 'samueladmin', '$2y$10$9S0sy55k7hJ8uohU1NSKAurX2Imz58B9sKn0yjEZQVIP1F43vW1Au'),
(4, 'Admin Teste', 'adminteste@email.com', 'adminteste', '$2y$10$b1Y5ktY9S3TAbizOvol26uE5CP0hsuvFdW93CvPdYIfQZ9BCpCHV.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contratos`
--

CREATE TABLE `contratos` (
  `id` int(11) NOT NULL,
  `numero_contrato` varchar(50) NOT NULL,
  `id_aluno` int(15) NOT NULL,
  `id_vaga` int(11) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_termino` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contratos`
--

INSERT INTO `contratos` (`id`, `numero_contrato`, `id_aluno`, `id_vaga`, `data_inicio`, `data_termino`) VALUES
(10, '547534564', 1, 1, '2024-11-04', '2025-11-20'),
(11, '642452532', 3, 2, '2024-11-10', '2024-11-29'),
(12, '5448565768', 4, 3, '2024-11-10', '2024-11-30'),
(15, '5234532532', 13, 13, '2024-12-19', '2024-12-31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(10) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `nome_fantasia` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(500) NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `inscricao_estadual` varchar(20) DEFAULT NULL,
  `contato_whatsapp` varchar(20) DEFAULT NULL,
  `contato_telefone` varchar(20) DEFAULT NULL,
  `perfil_instagram` varchar(255) DEFAULT NULL,
  `perfil_facebook` varchar(255) DEFAULT NULL,
  `perfil_linkedin` varchar(255) DEFAULT NULL,
  `ramo_atividade` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `data_fundacao` date DEFAULT NULL,
  `nome_representante` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `razao_social`, `nome_fantasia`, `email`, `senha`, `cnpj`, `inscricao_estadual`, `contato_whatsapp`, `contato_telefone`, `perfil_instagram`, `perfil_facebook`, `perfil_linkedin`, `ramo_atividade`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `data_fundacao`, `nome_representante`) VALUES
(1, 'Universidade do Oeste Paulista', 'Unoeste', 'unoeste@email.com', '$2y$10$aCIzq4C9uHmw0gXjXXDAhesf7WE/OmtAUDnWvU4LqFSb2EPWN7Jo.', '12.123.123/0001-12', '123.123.123.123', '(18) 98783-2312', '3909-6472', '@unoeste', '@unoeste', '@unoeste', 'Faculdade', 'Rodovia Raposo Tavares', '894', 'Limoeiro', 'Presidente Prudente', 'SP', '19827-837', '1975-07-10', 'Samuel'),
(2, 'Banco Santander S.A.', 'Santander', 'santander@email.com', '$2y$10$7wBYJXg830nm9sLjRK7BTeVsRu10JYlBuY/3PCvXtCzvXhj.UxV/O', '33.123.456/0001-78', '987.654.321.123', '(11) 91234-5678', '3909-8273', '@santanderbrasil', '@santanderbrasil', '@santanderbrasil', 'Banco', 'Av. Juscelino Kubitschek', '2041', 'Itaim Bibi', 'Presidente Prudente', 'SP', '04543-011', '1982-05-14', 'Ana Paula Rodrigues'),
(3, 'Universidade Estadual Paulista', 'Unesp', 'unesp@email.com', '$2y$10$DZcxSJ4c2oB0385aFVRiWeebc.ZsOWUQRB0G8HsTLEUdB2y0Q8Ory', '45.789.123/0001-99', '456.789.123.456', '(14) 98765-4321', '3909-3590', '@unespoficial', '@unespoficial', '@unesp', 'Universidade', 'Rua Siqueira Campos', '461', 'São Mateus', 'Presidente Prudente', 'SP', '17033-360', '1976-01-30', 'Carlos Alberto'),
(4, 'Etec Arruda Mello', 'Etec Arruda Mello', 'etec@email.com', 'f99a8ca7c8f7aeff7f88694781c4d8efb54f2a66ee74a0d88b120fffd6088cf6', '87.987.654/0001-12', '789.654.321.789', '(11) 97654-3210', '3909-7890', '@etecarrudamello', '@etecarrudamello', '@etecarrudamello', 'Escola', 'Rua Ribeiro de Barros', '500', 'Centro', 'Presidente Prudente', 'SP', '04567-890', '1998-03-10', 'João Silva'),
(8, 'Banco do Brasil SA', 'Banco do Brasil', 'bancodobrasil@email.com', 'ecfdf852a1ec7e5e08ae0c22dc344b67e1bfb41dbe66d428351d818d5f8ab37a', '00.000.000/0438-12', '515.156.421.142', '(18) 98321-3713', '(18) 4002-0432', '@bancodobrasil', '@bancodobrasil', '@bancodobrasil', 'Banco', 'Rua Tenente Nicolau Maffei', '304', 'Centro', 'Presidente Prudente', 'SP', '19893-279', '1970-07-10', 'Marcelo'),
(9, 'NU FINANCEIRA S.A. - SOCIEDADE DE CREDITO, FINANCIAMENTO E INVESTIMENTO', 'Nubank', 'nubank@email.com', '$2y$10$nO/MYKtuSWjNtlu3WkpFPeELfJUN.LjksoGShy/4PbjjZ5lHM0oQ2', '30.680.829/0001-23', '662.465.263.632', '(18) 98231-9813', '1111-1111', '@nubank', '@nubank', '@nubank', 'Sociedades de crédito, financiamento e investimento - financeiras', 'Rua Capote Valente', '120', 'Pinheiros', 'Presidente Prudente', 'SP', '05409-000', '2013-06-04', 'Maurício'),
(10, 'Empresa Teste', 'Empresa Teste', 'empresateste@email.com', '$2y$10$mvHsaKOwqwMinscnezMuCOUh62gLB3TSzDxKtNoQ/6if7Gp0cL9Sy', '99.999.999/9999-99', '999.999.999.999', '(99) 99999-9999', '9999-9999', '@teste', '@teste', 'teste', 'Teste', 'Rua Teste', '99', 'Teste', 'Teste', 'BA', '99999-999', '2025-04-10', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `tipo` enum('logo','arte') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`id`, `id_vaga`, `nome`, `path`, `tipo`) VALUES
(13, 13, '673e06d4cfc31.png', 'img/logos-artes/673e06d4cfc31.png', 'logo'),
(14, 13, '673e06d4d1122.png', 'img/logos-artes/673e06d4d1122.png', 'arte'),
(19, 1, '673e0d5f3168a.jpg', 'img/logos-artes/673e0d5f3168a.jpg', 'logo'),
(20, 1, '673e0d5f32b8a.png', 'img/logos-artes/673e0d5f32b8a.png', 'arte'),
(21, 5, '673e24c2b52e2.jpg', 'img/logos-artes/673e24c2b52e2.jpg', 'logo'),
(22, 5, '673e24c2b6e76.png', 'img/logos-artes/673e24c2b6e76.png', 'arte');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recuperacao_senha`
--

CREATE TABLE `recuperacao_senha` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  `utilizado` varchar(5) NOT NULL,
  `data_utilizado` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `recuperacao_senha`
--

INSERT INTO `recuperacao_senha` (`id`, `tipo_usuario`, `id_usuario`, `codigo`, `email`, `nome`, `data`, `utilizado`, `data_utilizado`, `token`) VALUES
(1, 'aluno', 11, 849919, 'guilhermerafaell10@gmail.com', 'Guilherme Rafael', '2024-11-09 15:09:08', 's', '2024-11-09 15:12:19', 'b9cc093442ac29f52797fdfa0863bba1'),
(2, 'aluno', 11, 209165, 'guilhermerafaell10@gmail.com', 'Guilherme Rafael', '2024-11-09 16:06:07', 's', '2024-11-09 16:06:36', '8a803db9678b50111c35245e6a11fbd8'),
(3, 'aluno', 11, 122031, 'guilhermerafaell10@gmail.com', 'Guilherme Rafael', '2024-11-10 21:20:14', 's', '2024-11-10 21:23:41', 'fdfd04eedfc2d15947e8854b463800f7'),
(4, 'aluno', 11, 148819, 'guilhermerafaell10@gmail.com', 'Guilherme Rafael', '2024-11-10 21:38:09', 's', '2024-11-10 21:40:24', '335ae6284e60bf70ce1c0c74a896d0a8'),
(5, 'aluno', 13, 743124, 'robertoaparecidoferrari@gmail.com', 'Gabriel', '2024-11-20 17:15:31', 's', '2024-11-20 17:16:08', '8f8a4ccd5e2c1198d381309686095382');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(15) NOT NULL,
  `rm` varchar(5) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `ano_inicio_termino` varchar(50) NOT NULL,
  `id_contrato` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `rm`, `nome`, `telefone`, `email`, `senha`, `sexo`, `serie`, `curso`, `ano_inicio_termino`, `id_contrato`) VALUES
(1, '05353', 'Gabriel Henrique', '(18) 99999-9999', 'biel@email.com', '$2y$10$hzmjFN3UJVW7SkFdQW2tMejGZk7b.Ki2EbU1QKHIvNr6.gSo8SIme', 'Masculino', '1º Ano', 'Administração', '2024 - 2026', 10),
(3, '04080', 'Samuel Dionizio', '(18) 98932-1983', 'samuel@email.com', '$2y$10$AfseHSh.LVdxrlp9Em/e3uLEcckySUVQBYCLelTWo7AGG2Dqg8k5u', 'Masculino', '3º Ano', 'Informática para Internet', '2022 - 2024', 11),
(4, '03834', 'Cauã Mimura', '(18) 99678-9282', 'caua@email.com', '$2y$10$HfYvoy9nJ2NsjoIep2kxb.Hv2tLzRpYnYuDuu/VcaXWvSAjqqYgCe', 'Masculino', '3º Ano', 'Informática para Internet', '2022 - 2024', 12),
(5, '03874', 'Lucas Santos', '(18) 99732-6327', 'lucas@email.com', '$2y$10$X/0qlHFz8yZNoZiczvAHx.EgJkfK0NPINnpEagu1/yeQyfFSovLxO', 'Masculino', '3º Ano', 'Marketing', '2022 - 2024', 0),
(8, '03850', 'Rafael Yuri', '(18) 99860-6838', 'rafael@email.com', '$2y$10$wmIeIvtXjkCmyUGEtJ6Hk.pBeza4w8p75Bj/FRbIV.ivxHragyh4W', 'Masculino', '3º Ano', 'Informática para Internet', '2022 - 2024', 0),
(11, '03853', 'Guilherme Rafael', '(18) 98127-1383', 'guilhermerafaell10@gmail.com', '$2y$10$rY9y3QzcjnAMSbKQ0WLXO.CCwwwByiLy9I1WRDSQQfWSHUlGzeQPe', 'Masculino', '3º Ano', 'Informática para Internet', '2022 - 2024', 0),
(13, '77777', 'Gabriel', '(18) 99637-6253', 'robertoaparecidoferrari@gmail.com', '$2y$10$2tzaqU3pWlT.m612IiaKq.xG5NRHprf7QujJhxf8vFmtSnisQ4WHq', 'Masculino', '1º Ano', 'Informática para Internet', '2024 - 2026', 15),
(14, '64656', 'teste', '', 'emailteste@email.com', '$2y$10$Aa6UyLV/7/Ze.lIW9SWyG.4s5TQ.5zMCMmaFOHS7v2kQDTLjp02nu', '', '', 'Administração', '', 0),
(15, '11111', 'User Teste', '(99) 99999-9999', 'userteste@email.com', '$2y$10$UBf4xwZvmdiS/g7pK5a5XOtm85CjjzCVXjyrYuT8/1qF6WZpuKfdO', 'Masculino', '3º Ano', 'Informática para Internet', '2025 - 2028', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vagas`
--

CREATE TABLE `vagas` (
  `id_vaga` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `remunerado` varchar(5) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_saida` time NOT NULL,
  `descricao_empresa` text NOT NULL,
  `descricao_vaga` text NOT NULL,
  `status_vaga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vagas`
--

INSERT INTO `vagas` (`id_vaga`, `id_empresa`, `email`, `area`, `cargo`, `remunerado`, `valor`, `cidade`, `endereco`, `periodo`, `hora_entrada`, `hora_saida`, `descricao_empresa`, `descricao_vaga`, `status_vaga`) VALUES
(1, 1, 'unoeste@email.com', 'Informática', 'Estágio em Informática', 'Sim', 685.30, 'Presidente Prudente', 'Rua das Flores, 329', 'Manhã', '08:00:00', '12:00:00', 'teste2', 'teste', 'Ocupada'),
(2, 2, 'santander@email.com', 'Financeiro', 'Estágio em Contabilidade', 'Sim', 904.32, 'Presidente Prudente', 'Rua Tenente Nicolau Maffei, 258', 'Integral', '08:00:00', '18:00:00', 'O Santander consiste em um banco renomado no país que atua no ramo financeiro.', 'O estagiário desempenhará em um escritório, realizando atividades contábeis.', 'Ocupada'),
(3, 3, 'unesp@email.com', 'Educação', 'Estágio em Pesquisa', 'Sim', 432.32, 'Presidente Prudente', 'Rua Roberto Símonsen, 305', 'Integral', '08:30:00', '17:30:00', 'Colabore com a equipe de pesquisa em projetos acadêmicos.', 'O estagiário ajudará na coleta e análise de dados.', 'Disponível'),
(5, 1, 'unoeste@email.com', 'Marketing', 'Estágio em Marketing', 'Sim', 780.00, 'Presidente Prudente', 'Rodovia Raposo Tavares, 305', 'Manhã', '08:00:00', '12:00:00', 'A Universidade do Oeste Paulista é uma das universidades privadas mais renomadas da região do interior de São Paulo.', 'O estagiário desempenhará a função de realizar postagens nas redes sociais da universidade.', 'Disponível'),
(6, 4, 'etec@email.com', 'Informática', 'Estágio em Desenvolvimento WEB', 'Sim', 780.00, 'Presidente Prudente', 'Rua Ribeiro de Barros, 1360, Centro', 'Manhã', '13:00:00', '18:20:00', 'A Etec Adolpho Arruda Mello é uma instituição de ensino que oferece cursos técnicos com foco na formação de profissionais qualificados para o mercado de trabalho. Com infraestrutura moderna e professores experientes, a Etec promove uma educação de qualidade, unindo teoria e prática. Os alunos têm acesso a estágios e parcerias com empresas, preparando-se para desafios reais e contribuindo para o desenvolvimento social e econômico da comunidade.', 'Buscamos um estagiário em Desenvolvimento Web para atuar em nossa equipe. O candidato ideal deve estar cursando Ciências da Computação ou áreas correlatas e ter conhecimentos em HTML, CSS e JavaScript. As atividades incluem:\r\n\r\nAuxiliar no desenvolvimento de páginas web responsivas.\r\nParticipar de reuniões de equipe e contribuir com ideias para novos projetos.\r\nTestar e corrigir bugs em aplicações web.\r\nAprender e se desenvolver dentro de um ambiente profissional.', 'Disponível'),
(7, 4, 'etec@email.com', 'Administração', 'Auxiliar Administrativo', 'Sim', 740.00, 'Presidente Prudente', 'Rua Ribeiro de Barros, 1360, Centro', 'Tarde', '13:00:00', '18:20:00', 'A Escola Técnica Estadual (Etec) é uma instituição de ensino que oferece cursos técnicos e de graduação, com foco na formação de profissionais qualificados para o mercado de trabalho. Com infraestrutura moderna e professores experientes, a Etec promove uma educação de qualidade, unindo teoria e prática. Os alunos têm acesso a estágios e parcerias com empresas, preparando-se para desafios reais e contribuindo para o desenvolvimento social e econômico da comunidade.', 'Estamos buscando um Auxiliar Administrativo para apoiar nas rotinas do departamento. O candidato deve possuir boa organização e habilidades em informática.\r\n\r\nAtividades:\r\n\r\nAuxiliar no controle de documentos e planilhas;\r\nApoiar no atendimento a clientes e fornecedores;\r\nOrganizar e arquivar documentos;\r\nRealizar atividades administrativas diversas, conforme necessidade.', 'Disponível'),
(13, 9, 'nubank@email.com', 'Contabilidade', 'Auxiliar de Contabilidade', 'Sim', 850.00, 'Presidente Prudente', 'Rua Capote Valente, Pinheiros', 'Tarde', '12:00:00', '18:00:00', 'O Nubank é uma fintech brasileira fundada em 2013, especializada em serviços bancários digitais e soluções financeiras sem tarifas ou burocracia. Com o objetivo de democratizar o acesso a produtos financeiros, o Nubank oferece uma plataforma completamente digital, onde os clientes podem gerenciar suas contas, cartões de crédito, empréstimos e investimentos de maneira simples e transparente, sem necessidade de agências físicas. A empresa se destaca pela experiência do usuário, pelo atendimento ao cliente de alta qualidade e pela inovação em seus serviços. Atualmente, o Nubank é uma das maiores fintechs da América Latina, com milhões de clientes e uma presença crescente no México e na Argentina.', 'O Nubank está em busca de um Auxiliar de Contabilidade para integrar nossa equipe financeira. O profissional será responsável por apoiar nas rotinas contábeis, garantindo a conformidade e organização das informações financeiras da empresa. A posição exige atenção aos detalhes, proatividade e capacidade de trabalhar em um ambiente dinâmico.', 'Disponível');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_aluno` (`id_aluno`),
  ADD KEY `fk_id_vaga` (`id_vaga`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vaga` (`id_vaga`);

--
-- Índices de tabela `recuperacao_senha`
--
ALTER TABLE `recuperacao_senha`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_rm` (`rm`),
  ADD KEY `fk_id_contrato` (`id_contrato`);

--
-- Índices de tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id_vaga`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `recuperacao_senha`
--
ALTER TABLE `recuperacao_senha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id_vaga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
