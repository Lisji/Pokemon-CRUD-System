-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-05 13:33:04
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `pokemon`
--

-- --------------------------------------------------------

--
-- 資料表結構 `battle`
--

CREATE TABLE `battle` (
  `battleID` int(11) NOT NULL,
  `battleDatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `winnerID` varchar(20) NOT NULL,
  `loserID` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `battle`
--

INSERT INTO `battle` (`battleID`, `battleDatetime`, `winnerID`, `loserID`, `description`) VALUES
(1, '2020-11-30 13:15:17', 'A0000000', 'A0000001', 'A0000000 win A0000001!!'),
(2, '2020-11-30 18:36:01', 'A0000001', 'A0000002', 'A0000001 win A0000002!!'),
(3, '2020-11-30 18:36:01', 'A0000002', 'A0000001', 'A0000002 win A0000001!!'),
(4, '2020-11-30 18:36:01', 'A0000000', 'A0000002', 'A0000000 win A0000002!!'),
(5, '2020-11-30 18:36:01', 'A0000001', 'A0000002', 'A0000001 win A0000002!!'),
(6, '2020-11-30 18:36:01', 'A0000002', 'A0000001', 'A0000002 win A0000001!!'),
(7, '2020-11-30 18:36:01', 'A0000001', 'A0000002', 'A0000001 win A0000002!!'),
(8, '2020-11-30 18:36:01', 'A0000001', 'A0000002', 'A0000001 win A0000002!!'),
(9, '2020-11-30 18:36:01', 'A0000002', 'A0000001', 'A0000002 win A0000001!!'),
(10, '2020-11-30 18:36:01', 'A0000002', 'A0000001', 'A0000002 win A0000001!!');

-- --------------------------------------------------------

--
-- 資料表結構 `pokemon`
--

CREATE TABLE `pokemon` (
  `pokemonID` int(11) NOT NULL,
  `pokemonName` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `pokemon`
--

INSERT INTO `pokemon` (`pokemonID`, `pokemonName`, `description`) VALUES
(1, '皮卡丘', '棲息在森林中的寶可夢。\r\n由於它臉頰上的袋子中儲存了電能，觸摸了之後會覺得麻麻的。\r\n'),
(2, '正電拍拍', '會製造火花拉拉球來給夥伴加油。能從電線桿上吸取電力。'),
(3, '負電拍拍', '有給夥伴加油的習性。\r\n如果夥伴快要輸掉的話，體內迸發出的火花數量就會不斷增多。\r\n'),
(5, '帕奇利兹', '兩頰帶有電氣袋的友好的寶可夢。從尾巴放出儲存的電力。'),
(6, '電飛鼠', '一邊到處放電一邊飛翔，因此鳥寶可夢們都不會靠近。'),
(7, '咚咚鼠', '由於發電的能力弱，會從插座或其他的電氣寶可夢那裡偷電。'),
(8, '托戈德瑪爾', '製造電的力量不太強，因此會沐浴著雷進行充電。'),
(9, '莫魯貝可', '總是餓著肚子。會吃掉裝在像口袋一樣的袋子裡的種子來發電。'),
(13, '達克萊伊', '為了保護自己，會讓周圍的人或寶可夢做噩夢。'),
(14, '急凍鳥', '射出的光束會讓對方的身體像結凍似地失去自由。'),
(15, '閃電鳥', '擁有能夠一腳踢毀砂石車的強勁腳力。'),
(16, '火焰鳥', '釋放著像火焰般燃起的邪惡氣場。');

-- --------------------------------------------------------

--
-- 資料表結構 `pokemontype`
--

CREATE TABLE `pokemontype` (
  `pokemonID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `pokemontype`
--

INSERT INTO `pokemontype` (`pokemonID`, `typeID`) VALUES
(1, 15),
(2, 15),
(3, 15),
(5, 15),
(6, 3),
(6, 15),
(7, 15),
(7, 16),
(8, 9),
(8, 15),
(9, 15),
(13, 6),
(14, 3),
(14, 7),
(15, 3),
(15, 5),
(16, 3),
(16, 6);

-- --------------------------------------------------------

--
-- 資料表結構 `relationship`
--

CREATE TABLE `relationship` (
  `trainerID` varchar(20) NOT NULL,
  `pokemonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `relationship`
--

INSERT INTO `relationship` (`trainerID`, `pokemonID`) VALUES
('A0000000', 1),
('A0000001', 2),
('A0000000', 3),
('A0000001', 5),
('A0000002', 5),
('A0000001', 6),
('A0000002', 6),
('A0000002', 7),
('A0000001', 8),
('A0000000', 9),
('A0000000', 13),
('A0000001', 14),
('A0000002', 14),
('A0000001', 15),
('A0000000', 16);

-- --------------------------------------------------------

--
-- 資料表結構 `trainer`
--

CREATE TABLE `trainer` (
  `trainerID` varchar(20) NOT NULL CHECK (`trainerID` regexp '[0-9]' and `trainerID` regexp '[a-zA-Z]' and char_length(`trainerID`) > 7 and char_length(`trainerID`) < 21),
  `trainerName` varchar(20) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `trainer`
--

INSERT INTO `trainer` (`trainerID`, `trainerName`, `mail`, `tel`) VALUES
('A0000000', '精英訓練家', 'acetrainer@gmail.com', '0928000000'),
('A0000001', '短褲小子', '	youngster@gmail.com', '0928000001'),
('A0000002', '捕蟲少年', 'bugcatcher@gmail.com', '0928000002');

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `type`
--

INSERT INTO `type` (`typeID`, `typeName`) VALUES
(3, '飛行'),
(5, '格鬥'),
(6, '惡'),
(7, '超能力'),
(9, '鋼'),
(15, '電'),
(16, '妖精');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `battle`
--
ALTER TABLE `battle`
  ADD PRIMARY KEY (`battleID`),
  ADD KEY `winnerID` (`winnerID`),
  ADD KEY `loserID` (`loserID`);

--
-- 資料表索引 `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`pokemonID`);

--
-- 資料表索引 `pokemontype`
--
ALTER TABLE `pokemontype`
  ADD PRIMARY KEY (`pokemonID`,`typeID`) USING BTREE,
  ADD KEY `typeID` (`typeID`);

--
-- 資料表索引 `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`pokemonID`,`trainerID`) USING BTREE,
  ADD KEY `trainerID` (`trainerID`);

--
-- 資料表索引 `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainerID`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `battle`
--
ALTER TABLE `battle`
  MODIFY `battleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `pokemonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `battle`
--
ALTER TABLE `battle`
  ADD CONSTRAINT `battle_ibfk_1` FOREIGN KEY (`winnerID`) REFERENCES `trainer` (`trainerID`),
  ADD CONSTRAINT `battle_ibfk_2` FOREIGN KEY (`loserID`) REFERENCES `trainer` (`trainerID`);

--
-- 資料表的限制式 `pokemontype`
--
ALTER TABLE `pokemontype`
  ADD CONSTRAINT `pokemontype_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `type` (`typeID`),
  ADD CONSTRAINT `pokemontype_ibfk_2` FOREIGN KEY (`pokemonID`) REFERENCES `pokemon` (`pokemonID`);

--
-- 資料表的限制式 `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `relationship_ibfk_1` FOREIGN KEY (`pokemonID`) REFERENCES `pokemon` (`pokemonID`),
  ADD CONSTRAINT `relationship_ibfk_2` FOREIGN KEY (`trainerID`) REFERENCES `trainer` (`trainerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
