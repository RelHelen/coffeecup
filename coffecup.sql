-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 09 2023 г., 10:31
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
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `alias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `title`, `alias`) VALUES
(1, 0, 'Напитки', ''),
(2, 0, 'Еда', ''),
(3, 0, 'Сиропы', '');

-- --------------------------------------------------------

--
-- Структура таблицы `mappoint`
--

CREATE TABLE `mappoint` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
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

INSERT INTO `mappoint` (`id`, `parent_id`, `name`, `descriptions`, `cx`, `cy`, `point`, `view`, `tel`, `foto`, `hint`, `dop`) VALUES
(51, 0, 'МК на Северном', 'Ростов-на-Дону,  Волкова, 12', 39.715, 47.2828, '47.282783574249294,39.714994999999924', 1, '2 488 007', 'p.jpg', 'Мобильные кофейни', 'Всегда горячий кофе рядом с вами.'),
(52, 0, 'МК на пер.Семашко', 'Ростов-на-Дону, переулок Семашко, 30', 39.7142, 47.2193, '47.219336074271844,39.71424049999998', 1, '2 488 007', 'p0.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(53, 0, 'МК на Сельмаше', 'Ростов-на-Дону, Шолохова, 128', 39.765, 47.2424, '47.24219657425106,39.7652555', 1, '2 488 007', 'p4.jpg', 'Мобильные кофейни', 'Всегда горячий кофе рядом с вами'),
(54, 0, 'МК на Военведе', 'Ростов-на-Дону, Таганрогское шоссе, 114', 39.6511, 47.2586, '0', 1, '2 488 007', 'p1.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(92, 0, 'МК на пер.Соборном', 'Ростов-на-Дону, переулок Соборный, 10', 39.713, 47.2154, '0', 1, '2 488 007', 'p3.jpg', 'Мобильная кофейня', 'Всегда рядом горячий кофе. '),
(93, 0, 'МК на ул. Садовой', 'Ростов-на-Дону, Садовая,45', 39.7106, 47.2215, '0', 1, '2 488 007', 'p7.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(94, 0, 'МК на Театральной площади', 'Ростов-на-Дону, Театральная площадь', 39.7447, 47.2272, '0', 1, '2 488 007', 'p.jpg', 'Мобильная кофейня', 'Мы рады угостить вас горячим кофе!'),
(95, 0, 'МК на пл.К.Маркса', 'Ростов-на-Дону, площадь Карла Маркса', 39.7621, 47.2307, '0', 1, '2 488 007', 'p6.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(96, 0, 'МК на ЦГБ', 'Ростов-на-Дону, Ворошиловский проспект, 105', 39.7126, 47.2355, '0', 1, '2 488 007', 'p5.jpg', 'Мобильная кофейня', 'Всегда горячий кофе рядом с вами'),
(98, 0, 'МК Дворец Спорта', 'Ростов-на-Дону, Халтуринский, 103', 39.697, 47.228, '0', 1, '2 488 007', 'p.jpg', 'Мобильный кофейни', 'Всегда горячий кофе рядом с вами');

-- --------------------------------------------------------

--
-- Структура таблицы `menedger`
--

CREATE TABLE `menedger` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_map` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menedger`
--

INSERT INTO `menedger` (`id`, `id_user`, `id_map`) VALUES
(1, 19, 94);

-- --------------------------------------------------------

--
-- Структура таблицы `modification`
--

CREATE TABLE `modification` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `cyr` varchar(20) NOT NULL DEFAULT '''мл'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modification`
--

INSERT INTO `modification` (`id`, `id_product`, `title`, `price`, `cyr`) VALUES
(1, 1, '250', 180, 'мл'),
(2, 1, '350', 200, 'мл'),
(3, 1, '450', 250, 'мл'),
(5, 7, '250', 160, 'мл'),
(6, 7, '350', 220, 'мл'),
(7, 7, '450', 260, 'мл');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `date_read` datetime DEFAULT NULL,
  `id_adres` int(11) NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `pay` int(11) NOT NULL DEFAULT 0,
  `sum` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `id_user`, `date`, `date_read`, `id_adres`, `date_update`, `comment`, `status`, `pay`, `sum`) VALUES
(13, 2, '2023-06-06 12:53:53', '2023-06-06 13:13:00', 94, '2023-06-05 16:24:00', '', 4, 1, 0),
(14, 15, '2023-06-06 12:53:53', '2023-06-06 13:13:00', 94, '2023-06-06 03:56:00', '', 4, 1, 0),
(18, 15, '2023-06-05 11:00:43', '2023-06-05 11:20:43', 98, '2023-06-06 03:56:00', '', 2, 0, 0),
(21, 22, '2023-06-06 16:30:11', '2023-06-06 17:20:24', 94, '2023-06-06 04:01:00', '', 2, 0, 0),
(25, 15, '2023-06-05 12:00:43', '2023-06-05 12:40:43', 98, NULL, '', 1, 0, 0),
(26, 18, '2023-06-05 14:00:43', '2023-06-05 14:20:43', 54, '2023-06-06 03:57:00', '', 2, 0, 0),
(27, 16, '2023-06-05 15:00:43', '2023-06-05 15:50:43', 51, NULL, '', 1, 0, 0),
(28, 17, '2023-06-05 15:20:43', '2023-06-05 16:00:43', 53, NULL, '', 1, 0, 0),
(29, 18, '2023-06-06 13:42:07', '2023-06-06 14:00:07', 96, NULL, '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `price` float NOT NULL,
  `id_product` int(11) NOT NULL DEFAULT 1,
  `qty` int(11) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `id_order`, `price`, `id_product`, `qty`, `title`) VALUES
(8, 13, 180, 1, 1, 'Эспрессо, 250мл'),
(9, 13, 60, 10, 1, 'Пончик кокосовый'),
(10, 14, 200, 6, 1, 'Моккачино, 450'),
(11, 18, 200, 4, 1, 'Лате, 350'),
(12, 21, 160, 7, 2, 'МОККО, 250МЛ'),
(14, 21, 180, 3, 1, 'Капучино, 450мл; сахар 2 шт; Сироп Ваниль; '),
(15, 21, 35, 16, 1, 'Круасан'),
(16, 21, 35, 17, 1, ' Круассан с абрикосовой начинкой'),
(17, 21, 35, 18, 1, 'Круассан с шоколадными крошками'),
(18, 21, 35, 30, 1, 'Круасан с шоколадной начинкой'),
(19, 25, 100, 1, 1, ''),
(20, 26, 180, 4, 1, ''),
(21, 27, 160, 5, 1, ''),
(22, 29, 160, 3, 1, ''),
(23, 29, 160, 5, 1, ''),
(24, 28, 220, 5, 1, '');

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
  `id_catalog` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(250) NOT NULL,
  `size` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `sale` enum('0','1') NOT NULL DEFAULT '0',
  `alias` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `id_catalog`, `title`, `content`, `img`, `size`, `price`, `status`, `sale`, `alias`) VALUES
(1, 1, 'Эспрессо', 'двойной эспрессо', '', 250, 180, '1', '0', ''),
(2, 1, 'Американо', 'эспрессо с добавлением воды', '', 250, 120, '1', '0', ''),
(3, 1, 'Капуччино', 'эспрессо с молочной пеной', '', 250, 160, '1', '0', ''),
(4, 1, 'Латте', 'эспрессо, молоко, молочная пенка', '', 250, 160, '1', '0', ''),
(5, 1, 'Маккиато', 'двойной эспрессо  и взбитое молоко', '', 250, 180, '1', '0', ''),
(6, 1, 'Моккачино', 'эспрессо, горячий шоколад, молоко и взбитые сливки', '', 250, 160, '1', '0', ''),
(7, 1, 'Мокко', 'эспрессо, шоколадный сироп,  молоко,\r\nвзбитые сливки, тертый шоколад для украшения', '', 250, 160, '1', '0', ''),
(8, 2, 'Пончик шоколадный', 'Пончик шоколадный', '', 1, 60, '1', '0', ''),
(9, 2, 'Пончик с клубничной начинкой', 'Пончик с клубничной начинкой', '', 1, 60, '1', '0', ''),
(10, 2, 'Пончик кокосовый', 'Пончик кокосовый', '', 1, 60, '1', '0', ''),
(11, 2, 'Пончик карамельный', 'Пончик карамельный', '', 1, 60, '1', '0', ''),
(12, 2, 'Булочка слоеная с вишневой начинкой', 'Булочка слоеная с вишневой начинкой', '', 1, 60, '1', '0', ''),
(13, 2, 'Булочка слоеная с брикосовой начинкой', 'Булочка слоеная с брикосовой начинкой', 'cake9.png', 1, 60, '1', '0', ''),
(14, 2, 'Булочка слоеная с клубничной начинкой', 'Булочка слоеная с клубничной начинкой', '', 1, 60, '1', '0', ''),
(15, 2, 'Булочка слоеная с сырной начинкой', 'Булочка слоеная с сырной начинкой', '', 1, 60, '1', '0', ''),
(16, 2, 'Круассан', 'Круассан', '', 1, 80, '1', '0', ''),
(17, 2, 'Круассан с абрикосой начинкой', 'Круассан с абрикосой начинкой', '', 1, 80, '1', '0', ''),
(18, 2, 'Круассан с шоколадными крошками', 'Круассан с шоколадными крошками', '', 1, 80, '1', '0', ''),
(19, 3, 'Ваниль', 'Ваниль', '', 20, 20, '1', '0', ''),
(20, 3, 'Шоколад', 'Шоколад', '', 20, 20, '1', '0', ''),
(21, 3, 'Карамель', 'Карамель', '', 20, 20, '1', '0', ''),
(22, 3, 'Мята', 'Мята', '', 20, 20, '1', '0', ''),
(23, 3, 'Клён', 'Клён', '', 20, 20, '1', '0', ''),
(24, 3, 'Имбирь', 'Имбирь', '', 20, 20, '1', '0', ''),
(25, 3, 'Лимон', 'Лимон', '', 20, 20, '1', '0', ''),
(26, 3, 'Апельсин', 'Апельсин', '', 20, 20, '1', '0', ''),
(27, 3, 'Миндаль', 'Миндаль', '', 20, 20, '1', '0', ''),
(28, 3, 'Лесной Орех', 'Лесной Орех', '', 20, 20, '1', '0', ''),
(29, 3, 'Амаретто', 'Амаретто', '', 20, 20, '1', '0', ''),
(30, 2, 'Круасан с шоколадной начинкой', 'Круасан с шоколадной начинкой', '', 0, 35, '1', '0', '');

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
(2, 'Готовиться'),
(3, 'Отмена'),
(4, 'Выполнено'),
(5, 'Оплачен');

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
  `role` varchar(11) NOT NULL DEFAULT '''user''',
  `data_reg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fio`, `mail`, `phone`, `role`, `data_reg`) VALUES
(1, 'admin', '$2y$10$CFTneGhBTLZSZOVHh3psZOYvvLMH/T4P2PpG0pA9.RwvbqBuPNCGO', 'Дмитрий', 'admincofe@gmail.com', '89287795757', 'admin', '2023-05-01'),
(2, 'user1', '$2y$10$Gzz2oCpqKV1nQKLC00cTV.GJGgUyWhZ636vswK8JSZ80349AlMejG', 'Виолета', 'ViolDlMejG@mail.ru', '89287795858', 'user', '2023-06-02'),
(15, 'niki', '$2y$10$3aO33wefHSYccVvvZ85po.jBWVOEajMQzPW1Eq8XCwG3JPgwzZV9W', 'Николай', 'DrevDsE11@mail.ru', '8(938)1277451', 'menedger', '2023-06-01'),
(16, 'qqq123', '$2y$10$5keIYAzsBrXe/xH.9OG5SOD/PwzhQsdu4TJASMzGrtl9oeFnB5pvS', 'Сергей Михайлович', 'serMich@mail.ru', '8(938)1234578', 'user', '2023-06-01'),
(17, 'qqq124', '$2y$10$YPUsqHGf9qlphH9Nq22TROXQ7ZgMlolyV4SfGn1647COvQPgazeja', 'Ирина', 'ВукВ12Ц@yndex.ru', '8(938)1234852', 'user', '2023-06-01'),
(18, 'menCos', '$2y$10$0PYcJXNYXrGT9c31q2wGPu4KxNVio8a9w4Q61gik05nVxwZ5BqmPi', 'Светлана', 'svetnEt2@gmail.com', '8(938)1277852', 'menedger', '2023-06-02'),
(19, 'menros', '$2y$10$Gzz2oCpqKV1nQKLC00cTV.GJGgUyWhZ636vswK8JSZ80349AlMejG', 'Дмитрий', 'menros@gmail.com', '8 (960)467-32-45', 'menedger', '2023-06-04'),
(20, 'menteatr', '$2y$10$fS09fF3iAFQIux1LfmB7Y.HKswHn34U.qqCB/oj7SdVi4NNo/49lK', 'Владимир', 'menteatr@gmel.com', '8 (960) 467-78-98', 'menedger', '2023-06-04'),
(21, 'menSem', '$2y$10$Y31WlQBQUml0Jp8o1/L9YeK0F3Hj6m.RpQT3nOFRrrCbKll7AW14.', 'Никита', 'qqq@dd123.ru', '8 (960) 467-1212', 'menedger', '2023-06-06'),
(22, 'anHelcoft', '$2y$10$yMiiij9r7rVG00m7HpfmVOL1qoHYQIdQ6L1ozfvMbhGXsJdEOao72', 'Алина', 'anHelcoft@mail.ru', '8 (960) 467-11-11', 'user', '2023-06-06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mappoint`
--
ALTER TABLE `mappoint`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menedger`
--
ALTER TABLE `menedger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_u` (`id_user`),
  ADD KEY `id_map` (`id_map`);

--
-- Индексы таблицы `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `status` (`status`),
  ADD KEY `id_adres` (`id_adres`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_O` (`id_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

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
  ADD KEY `id_c` (`id_catalog`);

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
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `mappoint`
--
ALTER TABLE `mappoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT для таблицы `menedger`
--
ALTER TABLE `menedger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `modification`
--
ALTER TABLE `modification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `menedger`
--
ALTER TABLE `menedger`
  ADD CONSTRAINT `menedger_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menedger_ibfk_2` FOREIGN KEY (`id_map`) REFERENCES `mappoint` (`id`);

--
-- Ограничения внешнего ключа таблицы `modification`
--
ALTER TABLE `modification`
  ADD CONSTRAINT `modification_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id_adres`) REFERENCES `mappoint` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_catalog`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
