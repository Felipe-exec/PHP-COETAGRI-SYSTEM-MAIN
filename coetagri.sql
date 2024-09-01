CREATE DATABASE IF NOT EXISTS `coetagri`;
USE `coetagri`;


CREATE TABLE IF NOT EXISTS `produto` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(1000),
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `produto` (`nome`, `descricao`, `valor`) VALUES
('Óleo de Coco', 'Óleo de coco 100% natural, ideal para culinária e cuidados com a pele. Rico em ácidos graxos saudáveis.', 29.90),
('Mel Orgânico', 'Mel orgânico puro, produzido por abelhas alimentadas com néctar de flores silvestres. Sem aditivos.', 39.90),
('Chá Verde', 'Chá verde premium, conhecido por suas propriedades antioxidantes e sabor refrescante. 20 saquinhos.', 18.50),
('Sementes de Chia', 'Sementes de chia ricas em fibras e ômega-3. Perfeitas para adicionar em smoothies e saladas.', 24.90),
('Farinha de Amêndoas', 'Farinha de amêndoas sem glúten, ideal para receitas de panificação e dieta paleo.', 34.90),
('Suco de Laranja Natural', 'Suco de laranja natural, sem conservantes e 100% puro. Embalagem de 1 litro.', 11.90),
('Açúcar Mascavo', 'Açúcar mascavo natural, não refinado, com um sabor rico e caramelo. Ideal para adoçar receitas.', 22.90),
('Extrato de Baunilha', 'Extrato de baunilha natural, sem aditivos artificiais. Perfeito para bolos e sobremesas.', 27.50),
('Óleo Essencial de Lavanda', 'Óleo essencial de lavanda 100% puro, excelente para aromaterapia e relaxamento.', 32.00),
('Amêndoas Inteiras', 'Amêndoas inteiras torradas, crocantes e saborosas. Ótimas para lanches e receitas.', 26.90),
('Grãos de Café Orgânico', 'Grãos de café orgânico recém-torrados, com um sabor encorpado e aroma intenso.', 45.00),
('Creme de Abacate', 'Creme de abacate 100% natural, ideal para substituir manteigas e óleos em receitas.', 28.00),
('Cacau em Pó', 'Cacau em pó 100% puro, sem açúcar. Ideal para receitas de chocolate e bebidas quentes.', 23.40),
('Mel de Jataí', 'Mel de jataí, proveniente das abelhas sem ferrão. Sabor delicado e propriedades medicinais.', 42.00),
('Barras de Proteína Vegana', 'Barras de proteína vegana, ricas em nutrientes e saborosas. Perfeitas para um lanche rápido.', 19.90),
('Algas Marinhas Secas', 'Algas marinhas secas, ricas em minerais e vitaminas. Ótimas para adicionar em sopas e saladas.', 21.50),
('Manteiga de Amendoim', 'Manteiga de amendoim 100% natural, sem adição de açúcares ou conservantes. Deliciosa e nutritiva.', 25.90),
('Tempero de Ervas Secas', 'Tempero de ervas secas, mistura aromática para realçar o sabor de carnes e vegetais.', 17.30),
('Farinha de Linhaça', 'Farinha de linhaça rica em ácidos graxos essenciais e fibras. Ideal para adicionar em smoothies e bolos.', 29.00),
('Suco de Maçã Integral', 'Suco de maçã integral, sem adição de açúcares ou conservantes. Sabor natural e refrescante.', 14.90),
('Syrup de Agave', 'Syrup de agave 100% puro, uma alternativa natural ao açúcar refinado. Ideal para adoçar bebidas e receitas.', 31.00),
('Pasta de Amêndoas', 'Pasta de amêndoas cremosa e rica em proteínas. Perfeita para usar em pães e receitas saudáveis.', 29.90);

CREATE TABLE IF NOT EXISTS `funcionario` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `status` int NOT NULL,
  `perfil` int NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `funcionario` (`cod`, `nome`, `email`, `telefone`, `senha`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `status`, `perfil`, `data`) VALUES
(7, 'Dalyla Alvarenga', 'dalylalvarenga@gmail.com', '(35) 99984-9594', 'e10adc3949ba59abbe56e057f20f883e', '37950000', 'Avenida Dolores Silva', '335', 'Centro', 'Aguanil', 'MG', 1, 2, '2022-07-15'),
(8, 'Maria Aparecida', 'maria@gmail.com', '(35) 99984-9594', 'e10adc3949ba59abbe56e057f20f883e', '37950000', 'Avenida Dolores Silva', '335', 'Centro', 'Aguanil', 'MG', 1, 2, '2022-07-14');

CREATE TABLE IF NOT EXISTS `admin` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `perfil` int NOT NULL,
  `status` int NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin` (`cod`, `nome`, `senha`, `email`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `perfil`, `status`, `data`) VALUES
(25, 'Keniara Vilas Boas', 'e10adc3949ba59abbe56e057f20f883e', 'keniara.vilasboas@ifsuldeminas.edu.br', '37750000', 'Avenida Dolores Silva', '335', 'Centro', 'Machado', 'MG', 1, 1, '2022-07-15');
