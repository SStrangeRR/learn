-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 14 2020 г., 20:44
-- Версия сервера: 10.4.12-MariaDB
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pagesACL`
--

CREATE TABLE `pagesACL` (
  `id` int(11) UNSIGNED NOT NULL,
  `page` varchar(250) NOT NULL,
  `acl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pagesACL`
--

INSERT INTO `pagesACL` (`id`, `page`, `acl`) VALUES
(2, 'Main/index', 'all, authorized, admin'),
(4, 'Main/about', 'all, authorized, admin'),
(5, 'Main/contacts', 'all, authorized, admin'),
(6, 'Main/post', 'all, authorized, admin'),
(7, 'Admin/login', 'all, authorized, admin'),
(8, 'Admin/posts', 'authorized, admin'),
(9, 'Admin/add', 'authorized, admin'),
(10, 'Admin/edit', 'authorized, admin'),
(11, 'Admin/delete', 'authorized, admin');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(254) NOT NULL,
  `description` varchar(254) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `text`, `image`) VALUES
(19, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'fa2829239073fe1c8d5254fcf5651cf0.jpg'),
(32, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '777793e9f6191a412f3646cdee46048e.jpg'),
(33, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'f6904189761aa0804d529b0ff4a9860c.jpg'),
(34, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '878941f0be3a010a70ba296ef4c25fb8.jpg'),
(35, 'The standard Lorem Ipsum passage, used since the 1500s', 'used since the 1500s', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '0b45c5575366c18ffc6f60b1140bebd5.jpg'),
(36, 'Что такое Lorem Ipsum?', 'Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне.', 'Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.', 'd484824bd962386c5174c2a5d500824d.jpg'),
(37, 'Почему он используется?', 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться.', 'Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', '9863bc39b8ebff5fea72f591573c04fa.jpg'),
(38, 'Откуда он появился?', 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов', 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, \"consectetur\", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги \"de Finibus Bonorum et Malorum\" (\"О пределах добра и зла\"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", происходит от одной из строк в разделе 1.10.32\r\n\r\nКлассический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 \"de Finibus Bonorum et Malorum\" Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.', '51a8e9525e4941a706f9285dfa940dc2.jpg'),
(39, 'Где его взять?', 'Есть много вариантов Lorem Ipsum', 'Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или \"невозможных\" слов.', 'fa2829239073fe1c8d5254fcf5651cf0.jpg'),
(40, 'Quisque quis erat at augue sollicitudin ultricies.', 'Quisque quis erat at augue sollicitudin ultricies.', 'Quisque quis erat at augue sollicitudin ultricies. Etiam interdum, libero vitae varius imperdiet, urna augue gravida felis, in bibendum augue massa at dui. Cras sit amet nibh eu est venenatis maximus quis et arcu. Maecenas pretium faucibus arcu, mattis luctus metus maximus non. Quisque rhoncus diam leo, non faucibus erat euismod ac. Morbi efficitur diam at lorem condimentum, accumsan hendrerit mi dictum. Duis pulvinar sit amet dui sed gravida. Phasellus ac magna eget augue gravida blandit. Nam facilisis ligula a ligula tristique, vel lacinia diam varius. Sed lorem ante, tristique et egestas ornare, porttitor eu risus. Maecenas tempus purus felis, sit amet aliquet lorem luctus id. ', 'e105a825aedb63fc6bdb99229ca78e6b.jpg'),
(41, 'Sed suscipit, nulla id vestibulum rhoncus', 'Sed suscipit, nulla id vestibulum rhoncus', 'Sed suscipit, nulla id vestibulum rhoncus, odio est aliquam purus, quis varius enim ipsum nec dolor. Sed sit amet dui dui. Integer quis commodo arcu. Donec in risus condimentum, convallis quam eu, blandit arcu. Phasellus viverra laoreet molestie. Morbi consequat lacus sed facilisis convallis. Mauris euismod posuere turpis sit amet dictum. Nulla ultrices sit amet tellus sit amet pellentesque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget mattis nibh. Nullam semper sodales lacus, at molestie massa blandit vitae. Duis interdum, neque ut tristique hendrerit, magna lectus vestibulum felis, ut lobortis dui dui non ante. ', 'fac91f147e484717a5b48159a6e746b0.jpg'),
(42, 'Phasellus lacinia blandit neque vitae tincidunt.', 'Phasellus lacinia blandit neque vitae tincidunt.', 'Phasellus lacinia blandit neque vitae tincidunt. Donec ut erat sit amet massa hendrerit sagittis. Nullam tristique placerat ornare. Mauris et dolor magna. Cras pulvinar, quam in tempor accumsan, risus massa convallis nulla, et aliquam dolor turpis ac elit. Mauris dignissim aliquet sapien ac aliquet. Vivamus at augue nibh. Mauris tincidunt erat tristique elementum luctus. Donec massa elit, ultrices id scelerisque nec, interdum posuere urna. Donec elit augue, pretium nec porttitor a, ultricies at arcu. Fusce efficitur posuere libero, nec congue augue commodo eget. Proin eget lectus ut lectus interdum dictum. Integer eget libero sodales, hendrerit nunc sit amet, sodales magna. Donec id risus mauris. ', 'f6904189761aa0804d529b0ff4a9860c.jpg'),
(43, 'Morbi rutrum massa libero, a consequat orci maximus non.', 'Morbi rutrum massa libero, a consequat orci maximus non.', 'Morbi rutrum massa libero, a consequat orci maximus non. Quisque sit amet posuere metus, ut dignissim purus. Quisque tempus quis eros eget interdum. Nulla facilisi. Nunc in cursus dolor, in suscipit libero. Fusce volutpat at nunc quis convallis. Nam venenatis mauris mattis justo sodales, in dictum nisi ultricies. Integer vulputate feugiat consequat. Praesent ut tempus dolor. Quisque nec risus at ipsum fermentum pellentesque. Morbi maximus dictum est, sit amet dictum eros suscipit nec. Vivamus porta, nibh id dapibus semper, lorem nulla tempor elit, eu sollicitudin metus est id dolor. Sed lobortis pulvinar nisl, vel suscipit sapien dignissim nec. Ut a neque euismod, varius sem ut, venenatis elit. Etiam quis erat sed neque rutrum dictum. Ut auctor nisl sed sagittis ornare. ', '878941f0be3a010a70ba296ef4c25fb8.jpg'),
(44, 'Nullam efficitur luctus metus a porttitor.', 'Nullam efficitur luctus metus a porttitor.', 'Nullam efficitur luctus metus a porttitor. Sed metus massa, auctor non pellentesque ut, elementum ut metus. Aliquam sed tortor sit amet lectus condimentum posuere. Mauris non diam tellus. Donec dapibus ipsum vel tempus sollicitudin. Mauris id sem lectus. Ut nec sollicitudin mi, et tristique mauris. Phasellus ultrices massa quis urna volutpat tristique. Nunc suscipit scelerisque pharetra. In hac habitasse platea dictumst. Sed eget ipsum ultricies, sollicitudin justo id, sodales massa. Vestibulum consequat iaculis dapibus. ', 'e9ac7dd6cfa5e1c7cb579959b51ffd1b.jpg'),
(45, 'Curabitur bibendum, ante vel dictum placerat', 'Curabitur bibendum, ante vel dictum placerat', 'Curabitur bibendum, ante vel dictum placerat, orci dolor suscipit est, eget eleifend odio nibh ac erat. Integer porta vel ligula sit amet cursus. Quisque convallis urna nec convallis euismod. Cras convallis velit in fermentum posuere. Cras efficitur semper nunc, eget consequat leo tempus vel. Praesent vitae mattis libero. Nullam vitae lorem mattis, semper augue sed, semper nisl. Nulla facilisi. Etiam sed massa posuere metus gravida tincidunt sit amet nec ex. Maecenas semper eu nulla ac sodales. Mauris aliquet nibh quis lectus lacinia, ut volutpat quam sollicitudin. Morbi eros massa, fringilla ut lectus ut, bibendum malesuada justo. Suspendisse placerat luctus lectus, quis pulvinar neque vestibulum ac. ', '0b45c5575366c18ffc6f60b1140bebd5.jpg'),
(46, 'Aenean quis massa et lectus varius placerat. ', 'Aenean quis massa et lectus varius placerat. ', 'Aenean quis massa et lectus varius placerat. Fusce pulvinar mauris lacus, id congue lectus tincidunt at. Nullam tincidunt vulputate tellus, vitae facilisis nunc sodales sed. Pellentesque turpis purus, eleifend a lorem in, varius rhoncus magna. Nulla facilisi. Quisque rhoncus tincidunt varius. Ut eu nisi sed erat interdum consequat. Morbi nulla massa, vehicula id quam suscipit, venenatis pretium purus. Mauris in pellentesque nunc. ', 'd484824bd962386c5174c2a5d500824d.jpg'),
(47, 'Fusce ac magna at elit malesuada suscipit.', 'Fusce ac magna at elit malesuada suscipit.', 'Fusce ac magna at elit malesuada suscipit. Nam mauris ipsum, viverra eget pulvinar a, luctus ut diam. Ut malesuada tincidunt nulla, venenatis pharetra lacus. Cras et est vel nulla ultrices elementum ac a turpis. Vestibulum a quam semper, sagittis lorem eu, fringilla erat. Praesent maximus eget libero et rutrum. Suspendisse aliquet, dolor id feugiat viverra, nibh justo condimentum lectus, nec sollicitudin enim nunc non odio. Nam vehicula in risus quis laoreet. In aliquet ante ac sem ullamcorper, at vulputate nunc tristique. Curabitur egestas enim enim, nec malesuada enim porta faucibus. ', '9863bc39b8ebff5fea72f591573c04fa.jpg'),
(48, 'Vestibulum placerat nulla sem, non commodo felis rhoncus ut', 'Vestibulum placerat nulla sem, non commodo felis rhoncus ut', 'Vestibulum placerat nulla sem, non commodo felis rhoncus ut. In hac habitasse platea dictumst. Pellentesque ut metus ac purus porttitor consectetur. Nunc auctor urna eu nisl elementum tincidunt. Donec posuere pellentesque auctor. Etiam ac tortor risus. Proin at malesuada lacus. Curabitur faucibus elit nec purus scelerisque feugiat. Morbi condimentum orci erat, eu bibendum nibh pellentesque sed. ', '51a8e9525e4941a706f9285dfa940dc2.jpg'),
(49, 'Praesent vitae magna sodales, placerat ex vel, imperdiet enim. ', 'Praesent vitae magna sodales, placerat ex vel, imperdiet enim. ', 'Aliquam convallis sit amet ligula ut maximus. Maecenas lobortis, augue ut gravida suscipit, diam mi sodales purus, id tincidunt justo arcu tincidunt velit. Phasellus finibus sollicitudin semper. Integer vel lobortis tortor, id rutrum nisi. Proin sit amet nisl velit. Vivamus semper arcu eros, non semper sapien volutpat eu. Etiam lacus nunc, ultricies et lorem eget, auctor pulvinar leo. Donec finibus, est eu interdum pharetra, sapien tellus egestas lorem, sed porttitor turpis ante in ligula. Phasellus aliquet, risus at interdum tincidunt, mi diam iaculis nibh, ac consectetur lorem orci id erat. Nunc molestie vitae tortor et rutrum. Duis eget dignissim purus. Integer pellentesque lectus nec lorem consectetur congue. ', '51a8e9525e4941a706f9285dfa940dc2.jpg'),
(50, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Sed elit lectus, vestibulum placerat sagittis ut, iaculis sit amet nunc. Nunc eu auctor odio. Proin viverra feugiat egestas. Phasellus sollicitudin risus eleifend, interdum lacus vitae, porta felis. Nulla cursus facilisis nisi pulvinar iaculis. Integer porta purus sollicitudin urna accumsan, vitae euismod ipsum condimentum. Nunc dapibus, tellus ac sagittis sodales, arcu ante feugiat eros, a consectetur diam diam et magna. In eget massa consequat, faucibus lacus tristique, faucibus lacus. ', 'fa2829239073fe1c8d5254fcf5651cf0.jpg'),
(51, 'Proin posuere condimentum erat. Nulla placerat lectus vitae magna varius', 'Proin posuere condimentum erat. Nulla placerat lectus vitae magna varius', 'Proin posuere condimentum erat. Nulla placerat lectus vitae magna varius, eget ornare mi rutrum. Pellentesque pulvinar nunc nec accumsan dignissim. Proin maximus, enim sit amet eleifend fringilla, lorem odio fringilla odio, at consectetur turpis diam non est. Curabitur efficitur lorem id libero egestas, ultrices accumsan augue vehicula. Nullam egestas cursus risus, id placerat sapien tempor non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. ', 'e105a825aedb63fc6bdb99229ca78e6b.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(60) NOT NULL,
  `acl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `acl`) VALUES
(1, 'Admin', 'admin@blog.net', '$2y$10$PrGazNeK.kYLYoIC6hXbM.zHLGfBdAhvmeNgGxOf7qY19XNUJ5pnq', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pagesACL`
--
ALTER TABLE `pagesACL`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pagesACL`
--
ALTER TABLE `pagesACL`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
