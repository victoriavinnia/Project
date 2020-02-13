-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 13 2020 г., 18:19
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `main_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `articul` int(11) NOT NULL,
  `name_product` varchar(70) NOT NULL,
  `count` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`articul`, `name_product`, `count`, `cost`, `id_user`) VALUES
(10001, 'Nivea очищающая маска-пленка', 1, 100, 17);

-- --------------------------------------------------------

--
-- Структура таблицы `photo_products`
--

CREATE TABLE `photo_products` (
  `photo_product` text NOT NULL,
  `product_artcle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `photo_products`
--

INSERT INTO `photo_products` (`photo_product`, `product_artcle`) VALUES
('nivea_mask.jpg', 10001),
('soap.jpg', 10002),
('organica.jpg', 10003),
('issey.jpg', 10004),
('givenchy.jpg', 10005),
('lacoste.jpg', 10006),
('eva_gel.jpg', 10007),
('loreal.jpg', 10008),
('clarins.jpg', 10009),
('patch.jpg', 10010),
('dior_powder.jpg', 10011),
('goshmascara.jpg', 10012),
('pupa_bronz.jpg', 10013),
('garnier.jpg', 10014),
('pupa_shadows.jpg', 10015),
('maybelline_mascara.jpg', 10016),
('sabo_lip.jpg', 10017),
('londa_mousse.jpg', 10018),
('garnier_mask.jpg', 10019),
('frieda.jpg', 10020),
('garnier_mask.jpg', 345),
('eva_gel.jpg', 12221),
('givenchy.jpg', 37),
('eva_gel.jpg', 352),
('frieda.jpg', 445);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `articul` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `description` varchar(250) NOT NULL,
  `full_description` mediumtext NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`articul`, `name`, `description`, `full_description`, `price`) VALUES
(37, 'zhjx', 'zjysutk', 'thzxkcf', 565),
(345, 'w45t6y', 'wertdy', 'srdtfyguhi', 3456),
(352, ';ipl', 'e5a6ursi', 'eutxuyfugh', 13),
(445, 'trajyr', 'vhngjk', 'jxlfu;o', 32),
(10001, 'Nivea очищающая маска-пленка', 'Маска для лица', 'Очищает кожу от загрязнений, бережно удаляя омертвевшие клетки, обладает охлаждающим эффектом, дарит коже ощущение свежести', 100),
(10002, 'Mades Cosmetics Кокос и монои', 'Мыло', 'Содержит 98% ингредиентов натурального происхождения. Благодаря натуральной растительной основе мягко очищает кожу, не пересушивая её.', 49),
(10003, 'Planeta Organica Био-гель для душа', 'Гель для душа', 'Сок ямамомо освежает кожу, заряжает энергией и естественным сиянием. Ямамомо хранит в себе клад природных антиоксидантов и витаминов А,В,С,Е.', 251),
(10004, 'Туалетная вода Issey Miyake, 50 мл', 'Туалетная вода для женщин', 'Свежесть бергамота и искрящиеся акценты лимона контрастируют с более сдержанными нотами завораживающего жасмина и цветов плюмерии, которые обладают миндальным оттенком.', 1999),
(10005, 'Пудра Givenchy Solar Powder', 'Пудра для лица', 'Для натурального сияющего эффекта и создания эффекта солнечного поцелуя на коже. Пудра представлена в двух оттенках, для более светлой кожи и для уже загорелой или смуглой.', 2999),
(10006, 'Парфюм Lacoste L\'Homme, 50 мл', 'Туалетная вода для мужчин', 'Древесно-мускусная композиция, наполненная красотой и изяществом цветочного букета классического аромата Lacoste Pour Femme, дополнилась свежими искрящимися цитрусовыми нотами.', 5207),
(10007, 'Eva Esthetic Гель для умывания', 'Очищающее средство', 'Гель для бережного очищения комбинированной и жирной кожи. Мягкая моющая основа деликатно удаляет загрязнения с поверхности кожи, не разрушая ее водно -липидную мантию.', 129),
(10008, 'Помада L\'Oreal Rouge Signature', 'Стойкая помада', 'Помада Rouge Signature – это первый матовый тинт для губ с ультранасыщенным цветом, который абсолютно не ощущается на губах.', 379),
(10009, 'Гель для умывания Clarins Pure', 'Очищающее средство', 'Улучшающий цвет лица гель освежает, разглаживает, матирует, увлажняет.', 2144),
(10010, 'Патчи T-Zone Patch Duo', 'Лифтинг-патчи', 'Мощная комбинация углеводного угля, очищающей глины и экстракта гамамелиса способствует очищению пор в Т-зоне.', 149),
(10011, 'JOUES CONTRASTE', 'Компактные румяна', 'Нежная текстура шелковистой пудры. Практичная коробочка с возможностью смены блока облегчает коррекцию макияжа в течение дня.', 2314),
(10012, 'Gosh Catchy Eyes Mascara', 'Тушь для ресниц', 'Catchy Eyes Waterproof Mascara обеспечивает изогнутый и эффект «кошачий глаз» для ресниц. Фантастическая щетка делает нанесение гладким и легким, а также деликатно разделяет ресницы.', 650),
(10013, 'Pupa Bronzing Powder Palette', 'Набор для скульптурирования лица', 'Тонированная пудра с мерцающим эффектом. Идеальна для подчеркивания тона кожи, создания контуров и усиления оттенка загара.', 699),
(10014, 'Garnier Набор Уход за волосами', 'Набор', 'Состав набора: Маска Fructis Superfood Папайя, 390 мл; Шампунь Fructis SOS Восстановление, 250 мл', 389),
(10015, 'Pupa Vamp! Matt Eyeshadow', 'Запеченные матовые тени для век', 'Матовый финиш и яркие насыщенные цвета. Легко наносятся. Благодаоря мягкой текстуре хорошо растушовываются.', 636),
(10016, 'Maybelline Total Temptation Mascara', 'Тушь для ресниц', 'Формула туши для ресниц, обогащенная маслом какао, ухаживает за ресницами и обладает приятным запахом.', 517),
(10017, 'Vivienne Sabo Rouge a levres', 'Губная помада', 'Глубокий, насыщенный цвет с 1 нанесения. Комфортная на губах. Соблазнительный ягодный аромат.', 264),
(10018, 'Londa Professional Micro Mousse', 'Мусс для волос', 'Позволяет создавать небрежную текстуру. Идеально подходит для придания волосам объема и подвижной фиксации. Поддерживает упругость локонов.', 627),
(10019, 'Garnier Botanic Therapy', 'Маска-молочко для волос', 'Крем-масло для волос Botanic Therapy с касторовым маслом и миндалем укрепляет волосы, защищает от выпадения.', 275),
(10020, 'John Frieda Full Repair Set', 'Набор для поврежденных волос', 'Формула содержит микро-масло Инка Инчи, насыщенное Омега-3 кислотами. Эта ключевая технология действует на сокращение пористости и улучшение гладкости кутикулы волос.', 1009),
(12221, 'dffhg', 'hsjj', 'sjkdld', 123);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name_users` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name_users`, `email`, `login`, `pwd`) VALUES
(1, 'sss', 'sss', 'sss', 'sss'),
(2, 'fhdxhxf', 'eyyau@gmail.com', 'gdxthxt', 'txfjcj'),
(4, 'оппп', 'eyyau@gmail.com', 'gggggg', 'gggggg'),
(5, 'eae', 'eyyau@gmail.com', 'hyhh', 'hhhhhhh'),
(6, 'hcch', 'eyyau@gmail.com', 'qqqqqqq', 'qqqqqqq'),
(7, 'рвновн', 'eyyau@gmail.com', 'верркн', 'рнннннн'),
(8, 'ыкрно', 'eyyau@gmail.com', 'врчаногое', 'врчаногое'),
(9, 'xfjc', 'eyyau@gmail.com', 'qqqqqqqqq', 'qqqqqqqqq'),
(10, 'dgzh', 'qwerty@gmail.com', 'aaaaaaaa', 'aaaaaaaa'),
(11, 'fdfg', 'qwerty@gmail.com', '123456', '123456'),
(12, 'оппп', 'qwerty@gmail.com', '122344', '122344'),
(13, 'епферф', 'eyyau@gmail.com', '1234567', '1234567'),
(14, 'Lemon', 'qw@gmail.com', 'lemonm', 'lemonm'),
(15, 'poiuyt', 'zx@gmail.com', 'poiuyt', 'poiuyt'),
(16, 'ffff', 'eyyau@gmail.com', 'qazwsx', 'qazwsx'),
(17, 'aesyeay', 'qwerty@gmail.com', 'qwerty', 'qwerty'),
(18, 'vf', 'eyyau@gmail.com', 'nn', 'vc'),
(19, 'па', 'впып', 'впр', 'пр');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `photo_products`
--
ALTER TABLE `photo_products`
  ADD KEY `product_artcle` (`product_artcle`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`articul`),
  ADD UNIQUE KEY `articul` (`articul`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `photo_products`
--
ALTER TABLE `photo_products`
  ADD CONSTRAINT `photo_products_ibfk_1` FOREIGN KEY (`product_artcle`) REFERENCES `products` (`articul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
