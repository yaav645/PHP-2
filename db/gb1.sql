-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 31 2022 г., 17:27
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `goods_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `session_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `goods_id`, `quantity`, `session_id`) VALUES
(78, 1, 2, 'f0bgktjkvpq3rbeet3ihp9uk6tsrfobs'),
(84, 1, 1, '1lqh1vum0tboqm1mlkat0ko1553cjugt'),
(85, 5, 3, '1lqh1vum0tboqm1mlkat0ko1553cjugt'),
(86, 3, 1, '1lqh1vum0tboqm1mlkat0ko1553cjugt'),
(87, 3, 1, '41q054qqsbcuhnmgcf5avi22oqad3d7v'),
(96, 1, 5, 't8panefsnt8kluv2eeo79mhbvll25p4m'),
(99, 5, 3, 't8panefsnt8kluv2eeo79mhbvll25p4m'),
(104, 1, 2, 'hsktrd1qh55kthp0f7kgqofjiedpdvjk'),
(105, 2, 1, 'hsktrd1qh55kthp0f7kgqofjiedpdvjk'),
(107, 2, 1, 'p0l38cv4ugjbtjcdk7osl6mh1aqjlekc'),
(108, 3, 1, 'p0l38cv4ugjbtjcdk7osl6mh1aqjlekc'),
(109, 1, 1, 'p0l38cv4ugjbtjcdk7osl6mh1aqjlekc'),
(114, 1, 1, 'ok203rlvbnfdnql2ibg8osafjv8j9qht'),
(115, 2, 1, 'ok203rlvbnfdnql2ibg8osafjv8j9qht'),
(116, 3, 1, 'ok203rlvbnfdnql2ibg8osafjv8j9qht'),
(117, 1, 4, '77424isqbuum2577k803hkukm8840s9c'),
(118, 5, 2, '77424isqbuum2577k803hkukm8840s9c'),
(121, 4, 49, 'ce4aj60eeo6cn2ebdd5e587a9oi5fi5b'),
(123, 1, 30, 'ce4aj60eeo6cn2ebdd5e587a9oi5fi5b'),
(124, 3, 8, 'ce4aj60eeo6cn2ebdd5e587a9oi5fi5b'),
(134, 2, 5, 'ce4aj60eeo6cn2ebdd5e587a9oi5fi5b'),
(140, 1, 11, 'k7j2v3dg2gj4b35l2ka9bpc8amr80dem'),
(141, 3, 3, 'k7j2v3dg2gj4b35l2ka9bpc8amr80dem'),
(142, 4, 2, 'k7j2v3dg2gj4b35l2ka9bpc8amr80dem'),
(143, 8, 1, 'k7j2v3dg2gj4b35l2ka9bpc8amr80dem'),
(144, 1, 5, 'b205bnk45a43kpeuhef40nuuviusas9o'),
(145, 3, 3, 'b205bnk45a43kpeuhef40nuuviusas9o'),
(146, 1, 8, 'ms2p6e84lbenv6k3f5dcmvd0j7tckdht'),
(147, 2, 5, 'ms2p6e84lbenv6k3f5dcmvd0j7tckdht'),
(148, 42, 3, 'ms2p6e84lbenv6k3f5dcmvd0j7tckdht'),
(149, 9, 3, 'ms2p6e84lbenv6k3f5dcmvd0j7tckdht'),
(181, 1, 10, 'obkkfbnjdlb48ep5qhhj2b8fjdahg8fc'),
(182, 2, 3, 'obkkfbnjdlb48ep5qhhj2b8fjdahg8fc'),
(183, 3, 1, 'obkkfbnjdlb48ep5qhhj2b8fjdahg8fc'),
(184, 4, 1, 'obkkfbnjdlb48ep5qhhj2b8fjdahg8fc'),
(185, 5, 4, 'obkkfbnjdlb48ep5qhhj2b8fjdahg8fc'),
(186, 8, 6, 'obkkfbnjdlb48ep5qhhj2b8fjdahg8fc'),
(187, 1, 5, '0a04isefmp45neflhftiqc4sbb390a2h');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `id_foto` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `id_foto`) VALUES
(24, 'Vasya', 'Privet', 0),
(34, 'Mixa', 'HEEELLLOOOO', 0),
(37, 'Igor', 'Привет', 0),
(63, 'Valya', 'Shoping', 0),
(64, 'CMR', 'Vedi', 0),
(69, 'Валя', 'Хорошо!', 0),
(148, 'Михаил', 'Хороший отзыв!', 1),
(150, 'Lula', 'Success', 1),
(151, 'Yohooo', 'Working', 1),
(152, 'Pavel', 'Its work', 1),
(154, 'Vasya', 'Vsem privet!', 7),
(155, 'Fotograf', 'Good foto', 2),
(157, 'Никита ', 'Земля в элюминаторе', 2),
(158, 'Федя', 'Отличный вид', 2),
(159, 'Vaselki', 'Vse horosho', 6),
(161, 'Миша', 'Красивый мост', 8),
(162, 'Катя', 'Очень красивый мост', 8),
(164, 'Вася ', 'Просто космос', 2),
(165, 'Джон', 'Поплыли кататься', 9),
(166, 'Ilya', 'New Foto', 21),
(170, 'New picture', 'Excelent very much!', 5),
(172, 'Михаbk', 'Крутое Фото. Звезды! Ууааааауу', 11),
(177, 'CMR', 'Description', 4),
(189, 'New Feedback', 'Very good weather!', 0),
(191, 'вцу', 'вцувц', 0),
(192, 'вцв', 'вуцву', 0),
(193, 'вцв', 'вуцву', 0),
(194, 'ваапвп', 'вапап', 0),
(198, '45а5', 'акак', 0),
(199, '454654', '5646456', 0),
(201, '454654hhhhhh', '5646456', 0),
(202, '454654ффффффф', '5646456', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `fileName`, `likes`) VALUES
(1, '01.jpg', 37),
(2, '02.jpg', 55),
(3, '03.jpg', 0),
(4, '04.jpg', 16),
(5, '05.jpg', 6),
(6, '06.jpg', 4),
(7, '07.jpg', 50),
(8, '08.jpg', 4),
(9, '09.jpg', 6),
(10, '10.jpg', 1),
(11, '11.jpg', 70),
(12, '12.jpg', 2),
(13, '13.jpg', 6),
(14, '14.jpg', 1),
(16, '16.jpg', 5),
(17, '17.jpg', 5),
(18, '18.jpg', 3),
(21, '19.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `name` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `price`, `likes`) VALUES
(1, 'Карандаш', 'Простой карандаш, подходит для написания текста и рисования', 30, 109),
(2, 'Ручка', 'Яркая синяя ручка', 100, 41),
(3, 'Ластик', 'Отличный ластик для всех типов карандашей', 65, 7),
(4, 'Альбом', 'Цветной альбом для рисования', 150, 4),
(5, 'Бумага Снежинка', 'Белая качественная бумага формата А4 дорогая', 1000, 8),
(8, 'Привет', 'отличный товар', 222, 0),
(9, 'Пицца', 'Описание', 125, 0),
(42, 'Чебурек', 'Вкусный', 3, 0),
(45, 'Привет', 'отличный товар', 222, 0),
(46, 'Автомобиль', 'Гоночный', 22000, 0),
(47, 'Сервер', 'Сервер промышленный', 3000, 0),
(48, 'Конфеты', 'Сладкие с фантиком', 25, 0),
(53, 'Стул', 'Деревяный на четырех ножках', 40, 0),
(54, 'Привет', 'отличный товар', 222, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`) VALUES
(1, 'В МИД объяснили публикацию переписки Лаврова с коллегами', 'Берлин и Париж искажают позицию Москвы по урегулированию на Украине, этим и объясняется решение МИД РФ опубликовать переписку российского министра иностранных дел Сергея Лаврова с коллегами из Франции и Германии, заявили замглавы МИД РФ Сергей Рябков и официальный представитель МИД РФ Мария Захарова.'),
(2, 'Правительство выделит деньги на социальные доплаты пенсионерам', 'Правительство России предоставит регионам более 1,1 миллиарда рублей на социальные доплаты к пенсиям, сообщила пресс-служба кабмина.\r\nДеньги получат 15 субъектов, где увеличилось число получателей надбавок. В частности, речь идет о Бурятии, Карелии, Якутии, Еврейской автономной области, Забайкальском крае, Амурской, Ленинградской, Магаданской, Мурманской и Новосибирской областях.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(55) NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hash` varchar(55) NOT NULL,
  `hash1` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `hash1`) VALUES
(1, 'admin', '$2y$10$BSvCagUsk.ITm3OsBKccjuJAO9fSV3Pzggd3YOwmV1.VLdiD9v5oW', '1127977919624205a5108fd9.11476602', '103871777361f957fe5111d0.88146729'),
(2, 'user', '$2y$10$BSvCagUsk.ITm3OsBKccjuJAO9fSV3Pzggd3YOwmV1.VLdiD9v5oW', '550138456240559a6b70f3.40346658', ''),
(3, 'alex', '$2y$10$3chGewmI1QjS51aXNAUt4uYrDrlwxOA89QdknSLFnlqq5HUFFXs2e', '1111', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
