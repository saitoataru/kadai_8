-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql643.db.sakura.ne.jp
-- 生成日時: 2023 年 1 月 06 日 10:34
-- サーバのバージョン： 5.7.40-log
-- PHP のバージョン: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `ataru_sample`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_db`
--

CREATE TABLE `gs_db` (
  `id` int(11) NOT NULL,
  `item` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `gs_db`
--

INSERT INTO `gs_db` (`id`, `item`, `value`, `description`, `fname`, `indate`) VALUES
(5, '三田本店', 'マシ', '食べた感想を入力', '6FDA6782-99C9-4EA2-BAD2-2530D48C185B.jpeg', '2022-12-25 03:00:30'),
(6, '三田本店', 'マシマシマシ', '食べた感想を入力', '2.jpg', '2022-12-25 03:09:37'),
(9, '三田本店', 'マシ', 'これは家系', 'A75EEBD0-F9C5-4EFC-BCF7-E4EED555AE76.jpeg', '2022-12-25 11:25:13'),
(12, '京都店', 'マシマシマシ', 'ラーメンの妖精', 'IMG_3265.PNG', '2022-12-29 14:49:36'),
(14, '三田本店', 'マシ', '食べた感想を入力', '3.jpg', '2023-01-03 17:50:29');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_db`
--
ALTER TABLE `gs_db`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_db`
--
ALTER TABLE `gs_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
