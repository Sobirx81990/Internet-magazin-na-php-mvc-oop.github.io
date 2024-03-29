-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 06 2019 г., 01:19
-- Версия сервера: 5.5.61
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `super_mag`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Рубашки', 1, 1),
(2, 'Платья', 5, 1),
(5, 'Футболки', 3, 1),
(6, 'Майки', 4, 1),
(9, 'Сумки', 2, 1),
(10, 'Чемоданы', 6, 1),
(11, 'Брюки', 7, 1),
(12, 'Пиджаки', 8, 1),
(13, 'Галстуки', 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availabillity` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL,
  `is_recommended` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availabillity`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(13, 'Cумка-планшет EMPORIO ARMANI', 9, 798893, 15350, 1, 'EMPORIO ARMANI', 'plan6et-EMPORIO ARMANI.jpg', 'Сумка-планшет из фактурной крупнозернистой кожи вошла в новую коллекцию EMPORIO ARMANI SS2019. Яркий плечевой ремень добавит свежих ноток привычному повседневному образу.', 0, 0, 1),
(14, 'футболка No21', 5, 343434, 4590, 1, 'D&G', '337900.jpg', 'Фирменная футболка представлена в новой коллекции нашумевшего бренда No21. Модель является визитной карточкой каждой коллекции. Объёмный фирменный принт подтверждает подлинность изделия. 100% хлопок в составе футболки подарит приятнейшие тактильные ощущения при носке. Базовый цвет поспособствует различным возможностям модных модификаций с другими элементами гардероба.', 1, 0, 1),
(15, 'Пиджак ROBERTO CAVALLI', 12, 234342, 8599, 1, 'ROBERTO CAVALLI', '49481332vr_14_f.jpg', 'Пиджак прюнелевого цвета с винтажными аккордами представлен в новой коллекции итальянской марки ROBERTO CAVALLI. Вертикальные полоски контрастного цвета напоминают стильные мотивы 2000-ых годов. Застёжка на позолоченную пуговицу, как практичный акцент изделия. Приталенный крой раскрывает женственность силуэта. Однотонные листочки карманов и лацканы подчёркивают классическое настроение модели. Пиджак эффектно дополнит ваш образ в вечернем, повседневном или официальном стиле.', 0, 0, 1),
(16, 'Черный полуприталенный жакет PESERICO', 12, 233442, 25900, 1, 'PESERICO', 'jaket_hserniy2.jpg', 'Элегантный пиджак цвета чёрного сапфира представлен в новой коллекции итальянской марки PESERICO. Полуприталенный силуэт раскрывает женственность вашей фигуры. Элегантные лацканы наполняют модель утончённым настроением. Застёжка на пуговицы и карманы являются элементами практичности. Шлица на задней части заостряет внимание окружающих на акценты изделия. Идеальное дополнение вашего офисного look.', 1, 0, 1),
(17, 'Черные легинсы PATRIZIA PEPE', 11, 234443, 9990, 1, 'PATRIZIA PEPE', 'cadb2fd985cbfadb833d81ab7c5f0b45_0.jpg', 'Легинсы прюнелевого цвета с кожаным покрытием представлены в новой коллекции итальянской марки PATRIZIA PEPE. Облегающий крой-скинни подчеркнёт достоинства фигуры. Особенности формы и универсальный цвет обеспечат различные возможности модных модификаций. Декоративная строчка подчеркнёт изысканный вкус изделия. Стильный вариант для вашего базового гардероба.', 0, 0, 1),
(18, 'Черные брюки с высокой посадкой ROBERTO CAVALLI', 11, 545344, 7890, 1, 'ROBERTO CAVALLI', '2x.jpg', 'Лаконичная модель цвета чёрного сапфира представлена в новой коллекции итальянской марки ROBERTO CAVALLI. Завышенная талия подчеркнёт женственность вашей фигуры. Широкий пояс, как изысканный акцент изделия, который скорректирует недостатки силуэта. Карманы и застёжка на молнию, как элементы практичности. Специфика кроя подарит различные возможности модных модификаций. Шерсть в составе модели обеспечит комфорт при носке и сохранит её достойный первоначальный внешний вид на долгое время. Классический вариант для бизнес-леди.', 1, 0, 1),
(19, 'Галстук классический, контрастный, в крупный горошек', 13, 34543, 2890, 1, 'D&G', 'TS-1728-GREY-8-1.jpg', 'Классический галстук HENDERSON в крупный темно-синий горошек выдержан в универсальном голубом цвете и сочетается с различными однотонными пиджаками и рубашками. Длина изделия составляет 150 сантиметров, ширина — 8 сантиметров. Это дает возможность завязывать различные узлы, будь то «Принц Альберт», «Кент», Four-in-hand, «Виндзор» или «Полувиндзор». Модель выполнена из жаккардового шелка. Эта ткань мало мнется, хорошо держит форму и отличается высокой износостойкостью. К тому же галстук характеризуется грязе- и водоотталкивающие свойствами, поэтому долгое время сохраняет презентабельный внешний вид. Шелковый галстук — незаменимый аксессуар в гардеробе каждого современного мужчины, ценящего элегантный деловой стиль.', 1, 0, 1),
(20, 'Галстук классический, с точками', 13, 234324, 2390, 1, 'tokko', 'TS-1674-GREEN-6-1.jpg', 'Если вы — сторонник делового стиля, то без широкого ассортимента галстуков в гардеробе вам просто не обойтись. Ведь именно галстук демонстрирует вкус мужчины и именно этот аксессуар зачастую обращает на себя внимание. Поэтому к выбору такого аксессуара нужно подходить со всей ответственностью и обязательно помнить, что галстук должен быть качественным и стильным. Галстук Неnderson представлен в универсальном голубом цвете и декорирован контрастными точками. Аксессуар выполнен из шелка. Он хорошо держит форму и отличается износостойкостью. Шелк для галстуков Неnderson проходит специальную обработку, благодаря которой изделие приобретает грязеотталкивающие свойства. А значит, аксессуар долгое время сохранит презентабельный вид. Помимо этого Шелк дарит красивый блеск, поэтому галстук смотрится элегантно и солидно. Длина модели — 160 см, ширина — 8,5 см. Для такого галстука идеальными станут не слишком громоздкие узлы: Простой (Ориентал), Двойной, Четвертной или Кельвин.', 1, 0, 1),
(21, 'Чемодан маленький ABS TT (верт полоски)  ', 10, 545433, 2390, 1, 'abs tt', '5cb07dc81403c.jpg', 'Чемодан изготовлен из АБС пластика (ABS). Он стойко переносит падения и удары. Надежная алюминиевая ручка выдвигается и фиксируется в 3х положениях для удобства. Четыре сдвоенных колесика из полиуретана вращаются свободно на 360 градусов на металлических шарикоподшипниках, благодаря этому чемодан едет практически бесшумно. Есть удобные ручки для переноски: верхняя и боковая, кодовый замок. Внутри чемодана: 2 отделения, в них - ремни для фиксации вещей и перегородка на молнии.', 1, 0, 1),
(22, 'Юбка серого цвета «Стиль и лоск»', 2, 798293, 22090, 0, 'D&G', 'kostum_seriy.jpg', 'Юбка серого цвета смотрится стильно и женственно. Силуэт прилегающий. Длина чуть ниже колена – классическая. Такая длина обычно очень выгодно подчеркивает привлекательные стороны ноги любой формы. Выполнена юбка на подкладке, которая предохранит ткань от растягивания и деформации.\r\n\r\nПереднее полотнище имеет рельефные швы. Заднее тоже. Потайная застежка-молния практична в применении. Средний шов заканчивается шлицей. Модный красивый фасон классической юбки всегда актуален и выгодно очерчивает силуэт женской фигуры.\r\n\r\nМодельер Елена Шипилова предлагает к юбке жакет, в комплекте с которым получится прекрасный деловой костюм.', 1, 0, 1),
(23, 'Изящное платье Luciana - эксклюзив от Elitdress', 2, 343434, 25056, 0, 'Elitdress', 'IMG_5276.jpg', 'Созданное исключительно для Elitdress эксклюзивное платье Luciana исполнено в потрясающем итальянском трикотаже, который отличается деликатной мягкостью и изяществом. Luciana на итальянском языке означает «легкость», и эта модель отражает свое название в полной мере.\r\n\r\nЯркие идеи в крое и необыкновенный нежный цвет придают этой модели особый колорит и создают изысканный стиль, который присущ посетительницам нашего интернет-магазина. \r\nСвободный крой, который превращается в элегантный приталенный силуэт, благодаря эффектному пояску, оригинальный и стильный фасон «летучая мышь», укороченный рукав с деликатным кантом оттенка \"кофе с молоком\", делающий акцент на изящности запястья… это платье может выразить настроение любого события и выразит настроение каждого Вашего выхода. В нем удивительно сочетается утонченная деловитость офисного платья, изящность романтического образа и торжественность наряда для праздничного события. \r\nМодель Luciana выполнена из высококачественного итальянского джерси.\r\n\r\nдлина платья 100 см\r\n\r\nСостав: 80% вискоза, 20% п/э', 1, 0, 1),
(24, 'Изящное бирюзовое платье для эффектного выхода', 2, 798293, 25090, 1, 'POLO', '312111.jpg', 'Сложность и неординарность кроя, яркие дизайнерские идеи, эффектные детали и изящный силуэт, а еще – изящный итальянский джерси… это платье, выполненное Marlen специально для Elitdress, буквально создано, чтобы подчеркнуть элегантность и тонкость чувства стиля своей обладательницы. Dolce на итальянском языке означает «нежность», что эта модель выражает свое название в полной мере. Модель отличается множеством особенных деталей, придающих платью эксклюзивность: фигурная отрезная баска подчеркивает линию талии, делая акцент и на линии бедер, что придает силуэту особую грацию, декор у плечевого шва небольшими «погончиками» придает оригинальность модели, а рукава в три четверти не только показывают изящество женской руки, но и позволят подобрать к модели украшения и элегантные перчатки. Несомненный колорит придает платью изящный бирюзовый цвет итальянского джерси, из которого выполнена данная модель.\r\n\r\nСостав: 70 % вискоза, 30% п/э', 1, 1, 1),
(25, 'Платье из джерси', 2, 234342, 5350, 1, 'POLO', 'DSP-216-29t -1.jpg', 'Эффектное платье с расклешенной юбкой из плотного трикотажа «джерси». Силуэт платья достигнут благодаря рельефам на полочке и спинке, а также благодаря клешеным клиньям на юбке платья, которые придают объем. Рукав втачной длинный. На полочке глубокое декольте V-образный формы.', 1, 1, 1),
(26, 'Модное платье с баской', 2, 234325, 8599, 1, 'YOKKO', 'htmlimage 1.jpg', 'Элегантное облегающее платье с длинным рукавом и баской из джерси с застежкой молнией на спине.\r\n\r\nСостав вискоза 80%, нейлон 20%', 1, 1, 1),
(27, 'Трикотажное платье  ', 2, 234342, 9990, 1, 'rokko', 'DSP-215-77t.jpg', 'Элегантное платье прилегающего силуэта из плотного трикотажа «джерси». Платье отрезное по линии талии. Идеальную посадку лифа обеспечивают рельефы на спинке и полочке. На спинке – глубокий круглый вырез, на полочке – элегантная «лодочка». Особую изящность модели придают широкие втачные рукава с манжетой. В среднем шве спинки шлица.', 0, 1, 1),
(28, 'Платье \"Геометрия\"', 2, 233442, 12500, 0, 'LOPOES', 'l11.jpg', 'Стильное черно-желтое платье сложного кроя не только подчеркнет Вашу фигуру, но и представит Вас элегантной женщиной, которая имеет шикарный вкус.  В таком платье Вы будете неповторимы как на деловых переговорах, так и на торжественном мероприятии. Платье выполнено из эластичного материала и отлично сидит по фигуре.\r\n\r\nСостав \r\nВискоза 95%, эластан 5%\r\n\r\nStyle de vie - это авторская одежда, выполненная из дорогих, высококачественных, натуральных тканей. Она сочетает в себе стиль, элегантность, сексуальность, удобство и практичность. В ней Вы всегда будете чувствовать себя комфортно и привлекательно. Романтичные девушки, бизнес-леди, светские львицы, скромные красавицы и элегантные дамы обязательно подберут что-то для себя в коллекциях от Style de vie. Style de vie - для тех, кто хочет иметь свой стиль. Автор проекта Марьяна Неустроева.', 1, 1, 1),
(29, 'Коктейльное платье ', 2, 798293, 5590, 1, 'D&S ', 'DSP-224-4t.jpg', 'Длина – 100-102 см (зависит от размера).\r\n\r\nОсиная талия, женственные бедра и хрупкие плечи – классические образы стиля New Look, ставшего невероятно популярным с легкой и талантливой руки Кристиана Диора в конце 40-х годов, вновь покоряют модные подиумы. В коллекциях одежды известные дизайнеры представляют целый ряд моделей в стиле современного New Look, возводя его в ранг горячего тренда. Присутствие кружева в данной модели подчеркивает нежный, загадочный и женственный образ.', 1, 1, 1),
(30, 'Платье из джерси', 2, 798893, 3453, 1, 'fokko', 'DSP-208-26t.jpg', 'Длина – 81-83 см (зависит от размера).\r\n\r\nЧеткие геометрические линии, контрастные цвета, ромбы, треугольники взорвали модные подиумы на показах последних коллекций. Соблазнительные, и в тоже время, совершенно простые линии, подчиненные творческой интерпретации основных геометрических форм и конструкций, стали поводом для экспериментов.', 0, 1, 1),
(31, 'Длинное трикотажное платье', 2, 798293, 4599, 1, 'rokko', 'DSP-139-77t.jpg', 'В фаворе величественные длинные платья. К ним можно отнести как ультрамодные в этом сезоне греческие пеплосы с завышенной талией, так и приталенные платья в пол. Этот сезон явно благоволит к женственным, летящим силуэтам.\r\n\r\nВишневый цвет, винный, бордо – тренд сезона. Известные модники считают, что такой цвет будет в этом сезоне одним из фаворитов, и будет использоваться не только в одежде, но и обуви и аксессуарах. Дизайнеры поговаривают, что этот цвет создан для соблазнения и покорения мужчин, не зря его называют не только вишневым, но и винным.', 1, 1, 1),
(32, 'Платье-футляр', 2, 798893, 8599, 1, 'Tokko', 'DSP-131-79t.jpg', 'Длина – 101-103 см (зависит от размера).\r\n\r\nИдеальный контраст черного или темно-синего цвета с белым, да еще и выразительные геометрические формы, способны создать даже более яркий образ, чем яркие цвета вроде красного и желтого.', 0, 1, 1),
(33, 'Коктейльное платье', 2, 343434, 4580, 1, 'D&G', 'DSP-110-92t.jpg', 'Коктейльное платье из джерси. Прилегающий силуэт, достигнут благодаря среднему шву и талиевым вытачкам на спинке, а так же боковым швам. Контрастного цвета выполнены декоративные фигурные боковые детали, такая особенность данной модели, визуально будет стройнить, и фигура будет выглядеть идеально, а модель платья ультрамодной. На спинке в среднем шве застежка на потайную молнию. Вырез горловины круглый не глубокий. Рукав втачной, длина чуть выше локтя. Актуальность этого платья заключается в эффектном комбинировании двух тканей контрастных цветов.', 1, 0, 1),
(34, 'Платье-тюльпан', 2, 234443, 8890, 1, 'fokko', 'DSP-99-10t.jpg', 'Платье тюльпан из плотного трикотажа «диор». Платье с отрезной линией талии, на лифе платья рельефы из плечевых швов, такая конструктивная особенность помогает посадить платье идеально по фигуре и в то же время придает изысканность. Силуэт юбки – тюльпан, достигнут благодаря складкам на переднем полотнище юбки. В среднем шве спинки – потайная молния и шлица. Вырез горловины круглый не глубокий, рукав широкий втачной, длиной до локтя.\r\n\r\nДлина – 100-102 см (зависит от размера)', 0, 1, 1),
(35, 'Элегантное платье', 2, 233442, 4690, 0, 'Lokko', 'DSP-29-11t.jpg', 'Элегантное платье длины миди из плотного трикотажа «джерси». Платье отрезное по линии талии. Лиф платья плотно облегает фигуру благодаря косым вытачкам, которые так же подчеркивают талию. Рукав узкий ¾. Юбка клеш с встречной складкой по центру полочке. В среднем шве спинки застежка на потайную молнию. Вырез горловины круглый не глубокий.\r\n\r\nДлина – 103-106 см (зависит от размера).', 1, 1, 1),
(36, 'Платье из джерси', 2, 798293, 5460, 1, 'Folo', 'DSP-10-35t.jpg', 'Платье прилегающего силуэта из джерси. Силуэт модели, достигнут благодаря талиевым выточкам на спинке и необычным фигурным боковым швам. Вырез горловины круглый не глубокий. На полочке вертикальный и горизонтальный декоративные швы. Юбка заужена к низу, форма – «карандаш». Платье выполнено из двух контрастных цветов ткани. Модель платья визуально стройнит фигуру, подчеркивая линию талии, а линия бокового шва выглядит эффектно и модно.\r\n\r\nДлина – 90-92 см (зависит от размера).', 1, 1, 1),
(37, 'Элегантное платье', 2, 798893, 5990, 1, 'D&S', 'DSP-01-29t.jpg', 'Элегантное платье с объемным верхом из практичного трикотажа «лакоста». Платье отрезное по линии талии, с драпировками на полочке и спинке. В шов на линии талии вшита резинка, благодаря которой платье хорошо фиксируется. Лиф платья образует небольшой навал, что позволяет посадить платье на любую фигуру. Юбка формы «карандаш». Рукав до линии локтя слегка расширен к низу. В среднем шве спинки застежка на потайную молнию и шлица. Вырез горловины – «лодочка».\r\n\r\nДлина – 100-103 см (зависит от размера).', 0, 1, 1),
(38, 'Платье с кружевами', 2, 343434, 9900, 1, 'GOJO', '_MG_656.jpg', 'Платье с кружевами и двойной юбкой. Идеально для офисного дресскода! Ткань-костюмная вискоза\r\n\r\nМодель подойдёт на размер 42-44', 1, 0, 1),
(39, 'Летнее яркое платье', 2, 234342, 8599, 1, 'fokko', '_MG_5511.jpg', 'Платье с баской, моделирующее силуэт, визуально -1 размер! Модный в этом сезоне принт в цветочек.', 0, 1, 1),
(40, 'Стильное платье', 2, 233442, 4900, 1, 'FOKkO', 'DSC_0618.jpg', 'Очаровательное длинное платье модного фасона. Модель декорирована красивой вставками. Потрясающая и стильная, эта вещь украсит гардероб современной леди, и станет прекрасной составляющей Вашего гардероба.\r\n\r\nСостав Вискоза 90% Эластан 10%', 1, 0, 1),
(42, 'Платье PATRIZIA PEPE', 2, 3333333, 13900, 1, 'PATRIZIA PEPE', '', 'Описание товара\r\nПлатье прилегающего силуэта из джерси. Силуэт модели, достигнут благодаря талиевым выточкам на спинке и необычным фигурным боковым швам. Вырез горловины круглый не глубокий. На полочке вертикальный и горизонтальный декоративные швы. Юбка заужена к низу, форма – «карандаш». Платье выполнено из двух контрастных цветов ткани. Модель платья визуально стройнит фигуру, подчеркивая линию талии, а линия бокового шва выглядит эффектно и модно. Длина – 90-92 см (зависит от размера).', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(1, 'Саша', '7777777777777777777', 'meizu', 0, '2019-08-21 10:37:23', '{\"4\":13,\"10\":21,\"11\":7,\"23\":1,\"24\":4,\"8\":1,\"22\":2,\"21\":8,\"16\":2,\"20\":1,\"19\":1,\"7\":1,\"40\":6,\"39\":7,\"38\":3,\"37\":2}', 1),
(2, 'Саша', '7777777777777777777', 'meizu', 0, '2019-08-21 10:38:08', '{\"4\":13,\"10\":21,\"11\":7,\"23\":1,\"24\":4,\"8\":1,\"22\":2,\"21\":8,\"16\":2,\"20\":1,\"19\":1,\"7\":1,\"40\":6,\"39\":7,\"38\":3,\"37\":2}', 1),
(3, 'Саша', '7777777777777777777', 'meizu', 0, '2019-08-21 10:39:35', '{\"4\":13,\"10\":21,\"11\":7,\"23\":1,\"24\":4,\"8\":1,\"22\":2,\"21\":8,\"16\":2,\"20\":1,\"19\":1,\"7\":1,\"40\":6,\"39\":7,\"38\":3,\"37\":2}', 1),
(4, 'Саша', '7777777777777777777', 'meizu', 0, '2019-08-21 10:45:19', '{\"40\":1,\"39\":2,\"38\":2,\"37\":1}', 1),
(5, 'Саша', '7777777777777777777', 'meizu', 0, '2019-08-21 10:47:02', '{\"40\":1,\"39\":2,\"38\":2,\"37\":1}', 1),
(6, 'Саша', '7777777777777777777', 'meizu', 0, '2019-08-21 10:47:20', '{\"40\":1,\"39\":2,\"38\":2,\"37\":1}', 1),
(7, 'Саша', '7777777777777777777', 'meizu', 0, '2019-08-21 10:49:00', '{\"40\":1,\"39\":1}', 1),
(8, 'Саша', '7777777777777777777', 'meizu', 0, '2019-08-21 10:50:38', '{\"40\":1}', 1),
(10, 'Собир  чон чик', '766536', 'meizu ч6', 2, '2018-08-21 15:01:27', '{\"38\":1}', 3),
(13, 'Саша', '77777777777777777779', 'meizu ч6', 0, '2019-08-24 16:17:14', '{\"39\":1,\"38\":1,\"40\":1}', 1),
(14, 'Собир  ', '7777777777777777777', '', 2, '2019-08-24 17:46:12', '{\"39\":1,\"38\":1,\"40\":1}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(16, 'Собир Тохиров', 'sagemx8@mail.ru', '$2y$10$of0a5nUFAz2yzpbw2zoguOfrVCr4CJ0b4XwdINZMD.FRZaE4kcvAW', 'admin'),
(17, 'Тося ', 'sagemx8@mail.ru121212', '$2y$10$tkBwn9lRptyKb/I0fzw7F.oEOSS3Wru6FpSVBNgfFbMa/aAkWREpK', ''),
(19, 'Собир Тохиров', 'sagemx8@mail.ru56666666666', '$2y$10$W14cMkxadBoEpe.txwmt6OWgPKbOWt/Qt3TihgCSytjFivcsSxhAm', ''),
(20, 'Собир Тохиров', 'sagemx8@mail.ru566666666664rt4', '$2y$10$03oy21CpRhNLB5mVmi4J7OfmNhlBD0TuraqW2XE3DnscZQMrX9ma2', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
