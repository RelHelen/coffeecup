-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 02 2023 г., 01:00
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `coffecup`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `title`) VALUES
(1, 'Напитки'),
(2, 'Еда'),
(3, 'Сиропы');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `fio` varchar(200) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `id_u`, `fio`, `mail`, `tel`) VALUES
(1, 2, 'Светлова Настя', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `detali_o`
--

CREATE TABLE `detali_o` (
  `ID` int(11) NOT NULL,
  `ID_O` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `ID_P` int(11) NOT NULL DEFAULT 1,
  `COMMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `mappoint`
--

CREATE TABLE `mappoint` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `cx` float NOT NULL,
  `cy` float NOT NULL,
  `point` varchar(250) NOT NULL,
  `view` int(2) NOT NULL,
  `tel` varchar(35) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `hint` varchar(250) NOT NULL,
  `dop` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mappoint`
--

INSERT INTO `mappoint` (`id`, `name`, `descriptions`, `cx`, `cy`, `point`, `view`, `tel`, `foto`, `hint`, `dop`) VALUES
(51, 'МК на Северном', 'Ростов-на-Дону,  Волкова, 12', 39.715, 47.2828, '47.282783574249294,39.714994999999924', 1, '2 488 007', 'p.jpg', 'Мобильные кофейни', 'Всегда горячий кофе рядом с вами.'),
(52, 'МК на пер.Семашко', 'Ростов-на-Дону, переулок Семашко, 30', 39.7142, 47.2193, '47.219336074271844,39.71424049999998', 1, '2 488 007', 'p0.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(53, 'МК на Сельмаше', 'Ростов-на-Дону, Шолохова, 128', 39.765, 47.2424, '47.24219657425106,39.7652555', 1, '2 488 007', 'p4.jpg', 'Мобильные кофейни', 'Всегда горячий кофе рядом с вами'),
(54, 'МК на Военведе', 'Ростов-на-Дону, Таганрогское шоссе, 114', 39.6511, 47.2586, '0', 1, '2 488 007', 'p.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(92, 'МК на пер.Соборном', 'Ростов-на-Дону, переулок Соборный, 10', 39.713, 47.2154, '0', 1, '2 488 007', 'p3.jpg', 'Мобильная кофейня', 'Всегда рядом горячий кофе. '),
(93, 'МК на ул. Садовой', 'Ростов-на-Дону, Садовая,45', 39.7106, 47.2215, '0', 1, '2 488 007', 'p7.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(94, 'МК на Театральной площади', 'Ростов-на-Дону, Театральная площадь', 39.7447, 47.2272, '0', 1, '2 488 007', 'p.jpg', 'Мобильная кофейня', 'Мы рады угостить вас горячим кофе!'),
(95, 'МК на пл.К.Маркса', 'Ростов-на-Дону, площадь Карла Маркса', 39.7621, 47.2307, '0', 1, '2 488 007', 'p.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(96, 'МК на ЦГБ', 'Ростов-на-Дону, Ворошиловский проспект, 105', 39.7126, 47.2355, '0', 1, '2 488 007', 'p5.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(98, 'МК Дворец Спорта', 'Ростов-на-Дону, Халтуринский, 103', 39.697, 47.228, '0', 1, '2 488 007', 'p.jpg', 'Мобильный кофейни', 'Всегда горячий кофе рядом с вами');

-- --------------------------------------------------------

--
-- Структура таблицы `order_u`
--

CREATE TABLE `order_u` (
  `id` int(11) NOT NULL,
  `num` varchar(50) NOT NULL,
  `id_u` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `adres` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`content`)),
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `ID` int(11) NOT NULL,
  `TITILE` text NOT NULL,
  `CATEGORIA` varchar(256) NOT NULL,
  `TEXT` text NOT NULL,
  `FOTO` varchar(255) NOT NULL,
  `PAGE_S` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`ID`, `TITILE`, `CATEGORIA`, `TEXT`, `FOTO`, `PAGE_S`) VALUES
(1, 'Уходовые процедуры  со скидкой -20%', 'Акции', 'Уходовые процедуры по лицу на продуктах компании iS Clinical со скидкой -20%.Ознакомиться с услугами и прайсом вы можете на странице косметологии.', 's1.jpg', 'main'),
(2, 'Аппаратный массаж -10%', 'Акции', 'Только в нашем салоне по адресу. Эффективная и безопасная методика борьбы с целлюлитом и отечностью на аппарате R-Sculptor. Минус 5 см в объеме талии', 's2.webp', 'main'),
(3, 'Консультация косметолога бесплатно', 'Акции', 'Первая консультация косметолога бесплатно. Ознакомиться с услугами и прайсом вы можете на странице косметологии.', 's3.webp', 'main');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_c` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `size` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `id_c`, `title`, `text`, `foto`, `size`, `price`) VALUES
(1, 1, 'Эспрессо', 'двойной эспрессо', '', 250, 130),
(2, 1, 'Американо', 'эспрессо с добавлением воды', '', 450, 130),
(3, 1, 'Капуччино', 'эспрессо с молочной пеной', '', 450, 160),
(4, 1, 'Латте', 'эспрессо, молоко, молочная пенка', '', 450, 200),
(5, 1, 'Маккиато', 'двойной эспрессо  и взбитое молоко', '', 250, 150),
(6, 1, 'Моккачино', 'эспрессо, горячий шоколад, молоко и взбитые сливки', '', 450, 200),
(7, 1, 'Мокко', 'эспрессо, шоколадный сироп,  молоко,\r\nвзбитые сливки, тертый шоколад для украшения', '', 450, 200),
(8, 2, 'Пончик шоколадный', 'Пончик шоколадный', '', 1, 60),
(9, 2, 'Пончик с клубничной начинкой', 'Пончик с клубничной начинкой', '', 1, 60),
(10, 2, 'Пончик кокосовый', 'Пончик кокосовый', '', 1, 60),
(11, 2, 'Пончик карамельный', 'Пончик карамельный', '', 1, 60),
(12, 2, 'Булочка слоеная с вишневой начинкой', 'Булочка слоеная с вишневой начинкой', '', 1, 60),
(13, 2, 'Булочка слоеная с брикосовой начинкой', 'Булочка слоеная с брикосовой начинкой', '', 1, 60),
(14, 2, 'Булочка слоеная с клубничной начинкой', 'Булочка слоеная с клубничной начинкой', '', 1, 60),
(15, 2, 'Булочка слоеная с сырной начинкой', 'Булочка слоеная с сырной начинкой', '', 1, 60),
(16, 2, 'Круассан', 'Круассан', '', 1, 80),
(17, 2, 'Круассан с абрикосой начинкой', 'Круассан с абрикосой начинкой', '', 1, 80),
(18, 2, 'Круассан с шоколадными крошками', 'Круассан с шоколадными крошками', '', 1, 80),
(19, 3, 'Ваниль', 'Ваниль', '', 20, 20),
(20, 3, 'Шоколад', 'Шоколад', '', 20, 20),
(21, 3, 'Карамель', 'Карамель', '', 20, 20),
(22, 3, 'Мята', 'Мята', '', 20, 20),
(23, 3, 'Клён', 'Клён', '', 20, 20),
(24, 3, 'Имбирь', 'Имбирь', '', 20, 20),
(25, 3, 'Лимон', 'Лимон', '', 20, 20),
(26, 3, 'Апельсин', 'Апельсин', '', 20, 20),
(27, 3, 'Миндаль', 'Миндаль', '', 20, 20),
(28, 3, 'Лесной Орех', 'Лесной Орех', '', 20, 20),
(29, 3, 'Амаретто', 'Амаретто', '', 20, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `relat_uo`
--

CREATE TABLE `relat_uo` (
  `id` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_o` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `option` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `desc` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`id`, `option`, `value`, `active`, `name`, `desc`) VALUES
(1, 'sitename', 'Кафейня Чашка кофе', 1, 'Название сайта', 'Название сайта отображается в title страниц.'),
(2, 'admin-email', 'admin@admin.ru', 1, 'E-mail', 'admin@domen.ru'),
(4, 'count-catalog-product', 'Каталог', 1, 'Количество выводимых продуктов на странице каталог.', 'Количество выводимых продуктов на странице каталог. \r\n'),
(5, 'webmoney', 'webmoney', 0, 'webmoney', 'webmoney'),
(7, 'order-message', 'Сообщение об оформлении заказа', 0, 'Сообщение об оформлении заказа', 'Ваш заказ оформлен');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `content` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `content`) VALUES
(1, 'Новый'),
(2, 'Обработано'),
(4, 'Отмена'),
(5, 'Исполнено');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fio` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` varchar(11) NOT NULL DEFAULT 'user',
  `data_reg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fio`, `mail`, `phone`, `role`, `data_reg`) VALUES
(1, 'admin', '$2y$10$CFTneGhBTLZSZOVHh3psZOYvvLMH/T4P2PpG0pA9.RwvbqBuPNCGO', '', '', '', 'admin', '2023-06-02'),
(2, 'user1', '$2y$10$Gzz2oCpqKV1nQKLC00cTV.GJGgUyWhZ636vswK8JSZ80349AlMejG', 'Виолета', 'ViolDlMejG@mail.ru', '89287795858', 'user', '2023-06-02'),
(15, 'mark', '$2y$10$3aO33wefHSYccVvvZ85po.jBWVOEajMQzPW1Eq8XCwG3JPgwzZV9W', 'Марк', 'qqq@dd.ru', '1', '', '2023-06-01'),
(16, 'qqq123', '$2y$10$5keIYAzsBrXe/xH.9OG5SOD/PwzhQsdu4TJASMzGrtl9oeFnB5pvS', 'qqq123', 'qqq123@dd.ru', '1111111333', '', '2023-06-01'),
(17, 'qqq124', '$2y$10$YPUsqHGf9qlphH9Nq22TROXQ7ZgMlolyV4SfGn1647COvQPgazeja', 'qqq124', 'qqq124@dd.ru', '1111111334', '', '2023-06-01'),
(18, 'qqq22', '$2y$10$0PYcJXNYXrGT9c31q2wGPu4KxNVio8a9w4Q61gik05nVxwZ5BqmPi', 'qqq22', 'qqq22@dd.ru', '121212', '', '2023-06-02');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_U` (`id_u`);

--
-- Индексы таблицы `detali_o`
--
ALTER TABLE `detali_o`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_O` (`ID_O`),
  ADD KEY `ID_P` (`ID_P`);

--
-- Индексы таблицы `mappoint`
--
ALTER TABLE `mappoint`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_u`
--
ALTER TABLE `order_u`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `status` (`status`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `adres` (`adres`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_c` (`id_c`);

--
-- Индексы таблицы `relat_uo`
--
ALTER TABLE `relat_uo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_o` (`id_o`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `detali_o`
--
ALTER TABLE `detali_o`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `mappoint`
--
ALTER TABLE `mappoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT для таблицы `order_u`
--
ALTER TABLE `order_u`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `relat_uo`
--
ALTER TABLE `relat_uo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `detali_o`
--
ALTER TABLE `detali_o`
  ADD CONSTRAINT `detali_o_ibfk_1` FOREIGN KEY (`ID_O`) REFERENCES `order_u` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detali_o_ibfk_2` FOREIGN KEY (`ID_P`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_u`
--
ALTER TABLE `order_u`
  ADD CONSTRAINT `order_u_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_u_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_u_ibfk_3` FOREIGN KEY (`adres`) REFERENCES `mappoint` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `catalog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `relat_uo`
--
ALTER TABLE `relat_uo`
  ADD CONSTRAINT `relat_uo_ibfk_1` FOREIGN KEY (`id_o`) REFERENCES `order_u` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relat_uo_ibfk_2` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
