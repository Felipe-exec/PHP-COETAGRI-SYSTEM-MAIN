-- Cria o banco de dados e seleciona
CREATE DATABASE IF NOT EXISTS `coetagri`;
USE `coetagri`;

-- Cria a tabela categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`cod`)
);

-- Cria a tabela produto e usa a chave estrangeira categoria_id
CREATE TABLE IF NOT EXISTS `produto` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `categoria_id` int,
  `descricao` varchar(500),
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cod`),
  CONSTRAINT `fk_categoria`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `categoria`(`cod`)
    ON DELETE SET NULL
);

-- Cria a tabela funcionario
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
);

-- Cria a tabela admin
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
);

-- Insere as categorias (essa parte garante que as categorias existam antes dos produtos)
INSERT INTO `categoria` (`nome`) VALUES('Carnes'),('Laticínios'),('Cafés');

-- Insere os produtos com IDs de categoria válidos
INSERT INTO `produto` (`nome`, `categoria_id`, `descricao`, `valor`)
VALUES
('Óleo de Coco', 2, 'Óleo de coco 100% natural, ideal para culinária e cuidados com a pele. Rico em ácidos graxos saudáveis.', 29.90),
('Mel Orgânico', 2, 'Mel orgânico puro, produzido por abelhas alimentadas com néctar de flores silvestres. Sem aditivos.', 39.90),
('Chá Verde', 3, 'Chá verde premium, conhecido por suas propriedades antioxidantes e sabor refrescante. 20 saquinhos.', 18.50),
('Sementes de Chia', 2, 'Sementes de chia ricas em fibras e ômega-3. Perfeitas para adicionar em smoothies e saladas.', 24.90),
('Farinha de Amêndoas', 2, 'Farinha de amêndoas sem glúten, ideal para receitas de panificação e dieta paleo.', 34.90);

-- Insere os administradores
INSERT INTO `admin` (`cod`, `nome`, `senha`, `email`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `perfil`, `status`, `data`)
VALUES
(25, 'Keniara Vilas Boas', 'e10adc3949ba59abbe56e057f20f883e', 'keniara.vilasboas@ifsuldeminas.edu.br', '37750000', 'Avenida Dolores Silva', '335', 'Centro', 'Machado', 'MG', 1, 1, '2022-07-15');

-- Insere os funcionarios
INSERT INTO `funcionario` (`cod`, `nome`, `email`, `telefone`, `senha`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `status`, `perfil`, `data`)
VALUES
(7, 'Dalyla Alvarenga', 'dalylalvarenga@gmail.com', '(35) 99984-9594', 'e10adc3949ba59abbe56e057f20f883e', '37950000', 'Avenida Dolores Silva', '335', 'Centro', 'Aguanil', 'MG', 1, 2, '2022-07-15'),
(8, 'Maria Aparecida', 'maria@gmail.com', '(35) 99984-9594', 'e10adc3949ba59abbe56e057f20f883e', '37950000', 'Avenida Dolores Silva', '335', 'Centro', 'Aguanil', 'MG', 1, 2, '2022-07-14');
