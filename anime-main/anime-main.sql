-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11-Out-2022 às 04:08
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `anime-main`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anime`
--

CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `idAnime` int(11) NOT NULL,
  `FK_idCategoria` int(11) NOT NULL,
  `visualizacao` int(11) NOT NULL,
  `comentarios` int(11) NOT NULL,
  `datac` varchar(30) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anime`
--

INSERT INTO `anime` (`id`, `idAnime`, `FK_idCategoria`, `visualizacao`, `comentarios`, `datac`, `nome`, `descricao`, `img`) VALUES
(1, 481521894, 261998932, 5, 0, '11/10/2022', 'Dr. Stone', 'A primeira temporada em anime foi anunciada na 51.ª edição da Weekly Shonen Jump em 19 de novembro de 2018. Sendo animada pela TMS Entertainment, com Shinya Iino na direção, Yuichiro Kido no roteiro, e Yuko Iwasa como designer de personagens. Tatsuya Kato, Hiroaki Tsutsumi e Yuki Kanesaka compõem a música da série.Sua estreia foi exibida no dia 5 de julho no Tokyo MX e em outros canais, japoneses, e finalizada no dia 13 de dezembro de 2019, com 24 episódios.', '1665452429dr-stone-vol-1.jpg'),
(2, 627035658, 261998932, 0, 0, '11/10/2022', 'Black Clover', 'A história se centra em um jovem chamado Asta, nascido sem poder mágico no reino de Clover (algo inédito), mas com sua ambição, habilidades recém-descobertas e amigos, pretende tornar-se o próximo Rei Mago. Capa do primeiro volume do mangá.', '1665452906501db6b69ced79e79a556b20cbdb9c5d1609784936_main.jpg'),
(3, 588571295, 261998932, 0, 0, '11/10/2022', 'One Piece', 'One Piece segue a história de um grupo de piratas liderado por Monkey D. Luffy. O garoto, que possui um corpo elástico, pretende se tornar o Rei dos Piratas e para isso deve encontrar o One pPiece, tesouro misterioso capaz de torná-lo imbatível, segundo as lendas.14', '1665453225onepiece.jpg'),
(4, 1567142470, 353737260, 0, 0, '11/10/2022', 'Evagelion', 'Em um mundo pós-apocalíptico, uma organização paramilitar chamada NERV é criada para combater monstros chamados Anjos, utilizando seres gigantes chamados Unidades Evangelion (ou EVAs). Estes seres são controlados por adolescentes, recrutados pelo ano em que nasceram, quando ocorreu o Segundo Impacto.', '1665453326neon-genesis-evangelion.jpg'),
(5, 827757017, 353737260, 0, 0, '11/10/2022', 'Paranoia Agent', 'Paranoia Agent Sinopse: Um agressor começa a bater com um taco de baseball dourado nas pessoas da cidade de Musashino, dois agentes são acionados para resolver o caso, mas o medo, rumores e a paranóia de ser a próxima vitima já estão por toda a parte.', '1665453501paranoia20agent.jpg'),
(6, 586348539, 353737260, 0, 0, '11/10/2022', 'Zankyou no Terror', 'Tóquio é atingida por um ataque terrorista devastador, e a única pista dos culpados é um vídeo enigmático na Internet que causa paranoia em todo o Japão.', '1665453742ZankyounoTerror.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `datac` varchar(30) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `idCategoria`, `datac`, `nome`, `img`) VALUES
(1, 261998932, '11/10/2022', 'Aventura', '1665452342501db6b69ced79e79a556b20cbdb9c5d1609784936_main.jpg'),
(2, 353737260, '11/10/2022', 'psicologia', '1665453303neon-genesis-evangelion.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `idComentario` int(11) NOT NULL,
  `FK_idAnime` int(11) NOT NULL,
  `FK_idUser` int(11) NOT NULL,
  `datac` varchar(30) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `episodio`
--

CREATE TABLE `episodio` (
  `id` int(11) NOT NULL,
  `idEpisodio` int(11) NOT NULL,
  `FK_idAnime` int(11) NOT NULL,
  `FK_idTemporada` int(11) NOT NULL,
  `datac` varchar(30) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `video` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `episodio`
--

INSERT INTO `episodio` (`id`, `idEpisodio`, `FK_idAnime`, `FK_idTemporada`, `datac`, `nome`, `video`) VALUES
(1, 659126698, 481521894, 967345027, '11/10/2022', 'Trailer - DrStone', '1665452711SaveTube.App-Dr. Stone (3ª Temporada) Trailer Oficial Legendado.mp4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temporada`
--

CREATE TABLE `temporada` (
  `id` int(11) NOT NULL,
  `idTemporada` int(11) NOT NULL,
  `FK_idAnime` int(11) NOT NULL,
  `datac` varchar(30) NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `temporada`
--

INSERT INTO `temporada` (`id`, `idTemporada`, `FK_idAnime`, `datac`, `nome`) VALUES
(1, 967345027, 481521894, '11/10/2022', '1 Temporada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `isAdmin` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `datac` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `biografia` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `bgimg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `idUser`, `isAdmin`, `status`, `datac`, `username`, `biografia`, `email`, `password`, `img`, `bgimg`) VALUES
(1, 1067626354, 'admin', 'free', '11/10/2022', 'LuizGustavogg', 'Estou adorando assistir anime neste site 🍃', 'dmwkakskamkass@gmail.com', '97f17a7dbfb2e355dcdd1ded107b95ce', '1665452057EuzLEeoXEAEyvx_.png', '1665452070uZNyvXX.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `episodio`
--
ALTER TABLE `episodio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `episodio`
--
ALTER TABLE `episodio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `temporada`
--
ALTER TABLE `temporada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
