-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 04 2021 г., 15:59
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ci-3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`ID`, `name`, `description`, `slug`) VALUES
(1, 'Devita', 'Digitale Technologie zur Wiederherstellung und Erhaltung der Gesundheit', 'devita'),
(2, 'Delixir', 'Die intelligente Zellnahrung ohne Konservierungsmittel und Zucker zur Erhaltung der Gesundheit, Schönheit und Jugend.', 'delixir'),
(3, 'Express test', 'Das Gerät dient der schnellen und zuverlässigen Bewertung des menschlichen Körperzustandes', 'express-test');

-- --------------------------------------------------------

--
-- Структура таблицы `discounts`
--

CREATE TABLE `discounts` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `procent` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `discounts`
--

INSERT INTO `discounts` (`ID`, `name`, `description`, `procent`) VALUES
(1, 'Zero', 'No discount', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `front_users`
--

CREATE TABLE `front_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `descript` text,
  `email` varchar(150) NOT NULL,
  `pwd` varchar(77) NOT NULL DEFAULT '',
  `restore_key` varchar(150) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `meta_tags`
--

CREATE TABLE `meta_tags` (
  `ID` int(11) NOT NULL,
  `position` varchar(250) NOT NULL,
  `head_title` varchar(250) NOT NULL,
  `meta_words` varchar(250) NOT NULL,
  `meta_descript` varchar(250) NOT NULL,
  `og_image` varchar(250) NOT NULL,
  `og_title` varchar(250) NOT NULL,
  `og_url` varchar(250) NOT NULL,
  `meta_robots` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `meta_tags`
--

INSERT INTO `meta_tags` (`ID`, `position`, `head_title`, `meta_words`, `meta_descript`, `og_image`, `og_title`, `og_url`, `meta_robots`) VALUES
(1, 'basic', 'Deta Elis Holding Offizielle Webseite', 'Innovative DeVita-Geräte, Innovative DeVita-Geräte (DeVita AP und Devita RITM),DeLixir Funktionsgetränke', 'Deta Elis Holding Offizielle Webseite. Innovative DeVita-Geräte (DeVita AP und Devita RITM)', 'ogi_img.jpg', 'Deta Elis Holding Offizielle Webseite', 'https://deholdingstore.de/', 'index, follow');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `sort` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`ID`, `post_date`, `title`, `slug`, `description`, `post`, `image`, `sort`) VALUES
(1, '2020-03-25', 'Das neue Programm \"Regeneration der Schleimhaut\" auf dem DeVita AP Mini (ALLGEMEINE PROGRAMMLISTE 3/Nr. 2)', 'das-neue-programm-gesunde-nerven-auf-dem-devita-ap-mini-allgemeine-programmliste-3-nr-7', '', 'Das Auftreten von Geschwüren (Aphten) in der Mundschleimhaut weist auf einen Entzündungsprozess hin, der durch virale oder bakterielle Erreger, einem Trauma oder Mangel an Spurenelementen verursacht werden kann. Das neue Programm „Regeneration der Schleimhaut“ auf dem DeVita AP Mini lindert Entzündungsprozesse, hilft bei der Wiederherstellung der Mundschleimhaut und stärkt die lokale Immunität.\r\n\r\nAnwendung: Täglich für 2 Wochen. Es wird empfohlen, es in Verbindung mit dem Programm „Gesunder Mund“ zu verwenden.\r\n\r\nWeitere Informationen zum DeVita AP Mini finden Sie unter https://deholding.info/de-DE/products/devita/devita-ap-mini/', 'izobrazhenie_viber_2020_03_24_19_08_24.jpg', 100),
(2, '2020-03-24', 'Die folgenden neuen Programme des Programmsets „Stopp Coronavirus“ für die DeVita AP Base-Geräte können vom DeInfo-Programmier heruntergeladen werden', 'die-folgenden-neuen-programme-des-programmsets-stopp-coronavirus-f-r-die-devita-ap-base-ger-te-k-nne', '', '                        - Stopp Coronavirus - NEU<br>\r\n- Ohne Pneumonie<br>\r\n- Ohne Husten<br>\r\n- Anti Pneumobaktieren<br>\r\n- Gesundes Atmen – Autoprogramm<br>\r\n<br>\r\nUm Ihr Gerät zu aktualisieren und auf Ihrem DeVita AP Base* neue Programme hinzuzufügen, müssen folgende Schritte befolgt werden:<br>\r\n<br>\r\n1. Schließen Sie das Gerät über ein Mini-USB-Kabel an den Computer an (der Computer muss über einen Internetzugang verfügen) und verbinden Sie den DeInfo-Programmierer mit dem Computer.<br>\r\n2. Klicken Sie auf „StartDeInfo“.<br>\r\n3. Klicken Sie oben links im Menü des Fensters auf „Updates“ und laden Sie alle verfügbaren Updates herunter.<br>\r\n4. Starten Sie das Programm neu (um das Gerät ordnungsgemäß anzuschließen, müssen Sie den Netzschalter drücken, um den Bildschirm zu aktivieren).<br>\r\n5. Laden Sie die neuen Programme auf Ihr Gerät herunter.<br>\r\nDas Update ist abgeschlossen!<br>\r\n<br>\r\nErfahren Sie mehr über die DeVita-Serie unter - <a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produkte/devita/\">https://deholdingstore.de/produkte/devita/</a><br>\r\n<br>\r\n* Dieses Gerät ist kein medizinisches Gerät. ', 'izobrazhenie_viber_2020_03_23_01_57_40.jpg', 100),
(3, '2020-04-01', 'Das neue Programm \"ZNS ohne Probleme\" auf dem DeVita AP Mini (ALLGEMEINE PROGRAMMLISTE 3/Nr. 6)', 'das-neue-programm-zns-ohne-probleme-auf-dem-devita-ap-mini-allgemeine-programmliste-3-nr-6', '', ' Selbst der zuverlässigste Mechanismus wird durch Überlastungen zerstört: Ein so dünnes, komplexes und zerbrechliches Apparat wie das menschlichen Nervensystem ist dabei keine Ausnahme. Leider sind Nervenstörungen heutzutage nicht selten, was bei genauerer Betrachtung nicht verwunderlich ist. <br>\r\n<br>\r\nDas moderne Leben stellt viele Anforderungen und wir versuchen damit umzugehen, was oft dazu führt, dass wir uns zu viel vornehmen, uns überlasten und unter dem enormen Druck leiden. Die Linie zwischen ständigem Stress und einem Nervenzusammenbruch ist sehr dünn.<br>\r\n<br>\r\nDas neue Programm „ZNS ohne Probleme“auf dem DeVita AP Mini hilft dabei, die Funktion des Zentralnervensystems nach dem Einfluss verschiedener Faktoren (infektiös, traumatisch usw.) zu verbessern. Es fördert die Wiederherstellung der Nervenverbindungen zwischen dem Zentralnervensystem und den peripheren Nerven und lindert Schwellungen sowie Schmerzen.<br>\r\n<br>\r\nAnwendung: Für 1-6 Monate täglich (je nach Bedarf). Es wird in Kombination mit dem Programm „Gesunde Nerven“ empfohlen (siehe das Programmset „Gegen Lyme-Borreliose“).<br>\r\n<br>\r\nWeitere Informationen zum DeVita AP Mini finden Sie unter <a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produkte/devita/devita-ap-mini/\">https://deholdingstore.de/produkte/devita/devita-ap-mini/</a>  ', 'izobrazhenie_viber_2020_03_27_15_16_46.jpg', 50),
(4, '2020-04-06', 'Aktivieren Sie alle Ressourcen des Körpers!', 'aktivieren-sie-alle-ressourcen-des-k-rpers', '', 'Im Frühjahr erweckt unser Körper, wie auch die Natur, zum Leben. Dabei ist es jedoch sehr wichtig, uns selbst nicht zu vergessen und genau auf unsere Gesundheit zu achten sowie das Immunsystem zu unterstützen.<br>\r\n<br>\r\nNegative Faktoren wirken sich ständig auf unseren Körper aus und können in Übergangszeiten seine Schutzfunktionen stark schwächen.<br>\r\n<br>\r\nSelbst wenn wir mit dem Stress und den Temperaturänderungen gut umgehen können, sind wir vor der elektromagnetische Strahlung immer noch nicht geschützt.<br>\r\n<br>\r\nIm Frühjahr braucht der Körper neben Vitamine und immunstärkenden Produkte noch mehr Unterstützung. Aus diesem Grund empfehlen wir, jeden Morgen die Anwendung des DeVita Ritm-Programms „Gesundheit – automatisch“.<br>\r\n<br>\r\nDieses automatische Programm normalisiert schnell die Arbeit des Nerven- und Hormonsystems, das für die wichtigsten Funktionen des Körpers verantwortlich ist: Stoffwechsel, Verdauung und Blutdruck. Das Programm „Gesundheit – automatisch“ wirkt sich auf alle wichtigen Körperressourcen aus, verbessert die Funktionsfähigkeit sowie die Leistung und schützt den ganzen Tag über vor negativer Strahlung.<br>\r\n<br>\r\nGute Laune und Gesundheit über den ganzen Frühling!       ', 'izobrazhenie_viber_2020_04_01_15_52_07.jpg', 150),
(5, '2020-04-07', 'Das neue Programm \"Ohne Fisteln\" auf dem DeVita AP Mini (ALLGEMEINE PROGRAMMLISTE 3)', 'das-neue-programm-ohne-fisteln-auf-dem-devita-ap-mini-allgemeine-programmliste-3-nr-4', '', 'Das neue Programm „Ohne Fisteln“ auf dem DeVita AP Mini (ALLGEMEINE PROGRAMMLISTE 3/Nr. 4)<br>\r\nEiter im Zahnfleisch wird sehr oft von der Bildung einer Fistel begleitet. Dies kann schwerwiegende Folgen haben, angefangen von der Entzündung des Gewebes bis hin zum Zahnverlust. Die Fistel am Zahnfleisch ist ein unnatürlicher Röhrengang&nbsp;&nbsp;im Weichteilgewebe, der in Folge eines langen, langsamen und eitrigen Entzündungsprozesses im Wurzelbereich der Zähne entsteht.<br>\r\n<br>\r\nDieses Problem tritt in der Regel häufig aufgrund der Nichteinhaltung vorbeugender Maßnahmen sowie wegen vernachlässigter infektiöser Zahnkrankheiten auf.<br>\r\nDie Bildung von Fisteln am Zahnfleisch kann nicht ignoriert werden, da sie von ständigen Beschwerden, Schmerzen und anderen unangenehmen Symptomen begleitet wird. Eine frühzeitige und genau Diagnose, die Beseitigung der Krankheitsursachen sowie eine hochwirksame Behandlung können das betroffene Gewebe und die Mundgesundheit wiederherstellen.<br>\r\n<br>\r\nDas neue Programm „Ohne Fisteln“ auf dem DeVita AP Mini hilft dabei, den Entzündungsprozess zu verhindern und zu reduzieren.<br>\r\n<br>\r\nAnwendung: Täglich für 2-4 Wochen. Empfohlen ist die Verwendung nach zahnärztlicher Behandlung oder Zahnextraktion.<br>\r\n<br>\r\nWeitere Informationen zum DeVita AP Mini finden Sie <a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produkte/devita/devita-ap-mini/\">https://deholdingstore.de/produkte/devita/devita-ap-mini/</a> ', 'izobrazhenie_viber_2020_04_01_15_57_01.jpg', 150),
(6, '2020-04-07', 'Das neue Programm \"Ohne Leptospira\" auf dem DeVita AP Mini (ALLGEMEINE PROGRAMMLISTE 2/Nr. 18)', 'das-neue-programm-ohne-leptospira-auf-dem-devita-ap-mini-allgemeine-programmliste-2-nr-18', '', 'Leptospira ist eine Bakteriengattung, die Kapillaren, Leber, Nieren und Muskeln schädigt. Sie ist in allen Regionen der Welt verbreitet. Die Infektion erfolgt durch Haustiere und wilde Tiere, durch eine geschädigte Schleimhaut und Haut sowie durch verunreinigte natürliche Wasserquellen.<br>\r\n<br>\r\nDas neue Programm „Ohne Leptospira“ auf dem DeVita AP Mini wurde speziell dazu entwickelt, diese Mikroorganismen zu zerstören, ohne die Organe und Systeme des menschlichen Körpers zu schädigen.<br>\r\n<br>\r\nAnwendung: Täglich für 2 Wochen.<br>\r\n<br>\r\nErfahren Sie mehr über das DeVita AP Mini -<a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produckte/devita/devita-ap-mini/\">https://deholdingstore.de/produckte/devita/devita-ap-mini/</a>', 'izobrazhenie_viber_2020_04_01_15_57_34.jpg', 150),
(7, '2020-04-08', 'Wissen ist ein wirksamer Beschützer! Roman Novikov – Vorsitzender der Deta Elis Holding', 'wissen-ist-ein-wirksamer-besch-tzer-roman-novikov-vorsitzender-der-deta-elis-holding', '', ' Im Allgemeinen habe ich keine Angst vor dem Wort Chaos, das nun durch das Coronavirus verursacht wird. Ich möchte mit Ihnen über einfache Wege sprechen, sich zu schützen und die Ihnen helfen werden, dieser wachsenden Stress- und Angststimmung nicht zu erliegen. <br>\r\n<br>\r\n1. Im Leben eines jeden Menschen sollte eine gewisse körperliche Aktivität eingebunden sein, insbesondere jetzt, wo das Immunsystem noch mehr Schutz braucht. Das Training und die allgemeine Bewegung aktivieren unser Kreislaufsystem, stärken unseren Körper und bauen Stress ab. Daher ist die Regel Nummer 1 mehr Bewegung!<br>\r\n<br>\r\n2. Wichtig sind eine ausgewogene Ernährung, mehr Vitamine und dass man sich auf Lebensmittel fokussiert, die gut für den Körper sind. Ich persönlich bevorzuge Gemüsesalate und Müsli, Weizen oder Buchweizen zum Frühstück. Ich rate Ihnen, Hülsenfrüchte, Weizen, Roggen, Gerste und grünen Buchweizen in Ihre Ernährung aufzunehmen. Das sind stärkende Nahrungsmittel für den Körper und starke Antioxidantien.<br>\r\n<br>\r\n3. Jeden Tag beginne ich meinen Tag mit 15 ml des Nahrungsergänzungsmittel #DeLixir Multy-Energy für eine intelligente Zellernährung, die von meiner Firma in Schweden hergestellt wird. Dieses Ergänzungsmittel aktiviert mich für den ganzen Tag und stärkt mein Immunsystem.<br>\r\n<br>\r\nDie einzelnen Inhaltsstoffe vom DeLixir Multy-Energy findet Ihr unter – <a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produkte/delixir/delixir-multi-energy/\">https://deholdingstore.de/produkte/delixir/delixir-multi-energy/</a><br>\r\n<br>\r\n4. Wasser – daraus besteht der menschliche Körper. Lohnt es sich, über seine Vorteile zu sprechen? Ich kann nur sagen, wenn Sie nicht auf die Wassermenge geachtet haben, die Sie pro Tag zu sich nehmen, ist es jetzt an der Zeit, loszulegen. Sie können im Internet mithilfe einer einfachen Formel die genaue Wassermenge berechnen, die Ihr Körper pro Tag benötigt und der Rest liegt dann bei Ihnen. Jeden Morgen trinke ich 2 Tassen warmes Wasser mit Zitrone und Honig, was meinen Körper sofort aktiviert und mich auf intensive Aktivitäten vorbereitet.<br>\r\n<br>\r\n5. Meditation hilft Ihnen dabei, der momentan herrschenden Panik nicht zu erliegen. Die richtige Einstellung und die richtigen Gedanken beruhigen Ihr Nervensystem, was das Immunsystem stärkt und dabei hilft, das umfassendere Problem anzugehen und unnötigen Stress zu vermeiden.<br>\r\n<br>\r\n6. Um die Funktion meiner Organe und Systeme zu aktivieren und zu verbessern, stehe ich morgens auf dem „Sadhu board“, das heißt auf einem Brett mit Nägeln. Diese Übung hat eine heilende und stärkende Wirkung auf den gesamten Körper, da wir ungefähr 70.000 Nervenenden in unseren Füßen haben. Wenn Sie auf den Nägeln stehen, erreichen das gesamte Nervensystem, das Gehirn und andere Organe einen hypertonischen Zustand und es kommt zu einem starken Energiefluss, der die Ressourcen des Körpers steigert.<br>\r\n<br>\r\n7. Diejenigen, die mich schon lange kennen, wissen, dass ich ohne meine schützenden # DeVita-Geräte nirgendwo hingehen werde. Die momentane Situation ist natürlich keine Ausnahme. Das DeVita AP* stärkt das Immunsystem und hilft ihm, dem Virus standzuhalten. Das neue Stopp Coronavirusset steht bereits für alle DeVita AP-Geräte zum Download zur Verfügung:<br>\r\n- Stopp Coronavirus - NEU<br>\r\n- Ohne Pneumonie<br>\r\n- Ohne Husten<br>\r\n- Anti Pneumobakterien<br>\r\n- Gesundes Atmen<br>\r\n<br>\r\nEine detaillierte Beschreibung der Programmsets findet Ihr unter – <a class=\"txttohtmllink\" href=\"https://deholdingstore.de/news/wir-haben-erst-k-rzlich-eine-debatte-zu-einem-aktuellen-thema-dem-schutz-vor-der-coronavirus-epidemi/\">https://deholdingstore.de/news/wir-haben-erst-k-rzlich-eine-debatte-zu-einem-aktuellen-thema-dem-schutz-vor-der-coronavirus-epidemi/</a><br>\r\n<br>\r\nDiese Tipps fördern die Aktivierung aller wichtigen Körperprozesse und helfen dabei diese schwierige Phase zu überstehen. Halten Sie Ihre Gesundheit und Ihre Gedanken unter Kontrolle und lassen Sie nichts an sich heran!<br>\r\n<br>\r\nJede Krise ist immer ein Anstoß für Sie und dabei haben Sie die Wahl: In Panik geraten oder das Problem lösen.                    ', 'izobrazhenie_viber_2020_04_06_16_45_52.jpg', 150),
(8, '2020-03-16', 'Wir haben erst kürzlich eine Debatte zu einem aktuellen Thema, dem Schutz vor der Coronavirus-Epidemie, eröffnet', 'wir-haben-erst-k-rzlich-eine-debatte-zu-einem-aktuellen-thema-dem-schutz-vor-der-coronavirus-epidemi', '', 'Sie sollten verstehen, was das Coronavirus ist und wie Sie sich schützen können – <a class=\"txttohtmllink\" href=\"https://deholdingstore.de/news/coronavirus-was-ist-das-wie-k-nnen-sie-sich-sch-tzen/\">https://deholdingstore.de/news/coronavirus-was-ist-das-wie-k-nnen-sie-sich-sch-tzen/</a><br>\r\n<br>\r\nZum Schutz der gesamten Familie hat das Unternehmen DEHolding beschlossen, alle erforderlichen Programme im Programmset „Stop Coronavirus“ auf dem DeVita Mini zu vereinen.<br>\r\n<br>\r\nDieses Programmset schadet dem Körper nicht. Es trägt zur Verbesserung der Energiereserven und zur Stärkung des Immunsystems bei, damit der Körper dem Virus besser standhalten kann. Infolge der Abnahme der Immunität durch den Virus schützt das Programm „Stop Coronavirus“ den Körper vor weiteren Komplikationen.<br>\r\n<br>\r\nDas Programmset „Stop Coronavirus“ zielt auch darauf ab, den Körper nach der Krankheit wiederherzustellen und die Organe und Organsysteme des Menschen zu unterstützen.<br>\r\n<br>\r\nFür diejenigen, die sich Sorgen um sich selbst und ihre Angehörigen machen, ist das Programmset „Stop Coronavirus“ zum Schutz vor Infektionen dieser Art geeignet, da es das Immunsystem stark hält.<br>\r\n<br>\r\nAchtet auf eure Gesundheit<br>\r\nund die Gesundheit eurer Lieben!<br>\r\n<br>\r\nAuf dem DeVita AP Mini stehen bereits neue Programmsets zum Download zur Verfügung:<br>\r\n- Stop Coronavirus Neu<br>\r\n- Ohne Pneumonie<br>\r\n- Ohne Husten<br>\r\n- Anti-Pneumobakterien<br>\r\n- Automatisches Programm „Gesundes Atmen“<br>\r\n<br>\r\nUm Ihr Gerät zu aktualisieren und zu dem MINI-Gerät neue Programme und Programmsets hinzuzufügen, müssen Sie:<br>\r\n1. zunächst das Gerät über ein USB-Kabel an den Computer anschließen (der Computer muss über einen Internetzugang verfügen)<br>\r\n2. Klicken Sie auf das Symbol „StartDeInfoMini“.<br>\r\n3. Klicken Sie in der oberen linken Ecke auf „Updates“ und installieren Sie alle verfügbaren Updates.<br>\r\n4. Starten Sie das Programm neu (um das Gerät ordnungsgemäß anzuschließen, müssen Sie den Netzschalter drücken, um den Bildschirm zu aktivieren).<br>\r\n5. Laden Sie die neuen Programme auf Ihr Gerät herunter.<br>\r\n<br>\r\nDas Update ist abgeschlossen!<br>\r\n<br>\r\nErfahren Sie mehr über die DeVita-Serie unter <a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produkte/devita/\">https://deholdingstore.de/produkte/devita/</a><br>\r\n<br>\r\nWir werden Sie bald über den Updatevorgang auf der Base-Geräteserie informieren. ', 'izobrazhenie_viber_2020_03_16_12_48_06.jpg', 150),
(9, '2020-03-06', 'Coronavirus:Was ist das? Wie können Sie sich schützen?', 'coronavirus-was-ist-das-wie-k-nnen-sie-sich-sch-tzen', '', 'Überall auf der Welt haben Menschen von diesem Virus gehört, dessen Reise in der Stadt Wuhan in China begann.<br>\r\n<br>\r\nWas wissen wir über diesen Virus?<br>\r\n<br>\r\nEs handelt sich um ein RNA-Virus aus der Gruppe der Coronaviren tierischen Ursprungs. Es gibt eine Theorie, die besagt, dass das Virus höchstwahrscheinlich von Fledermäusen auf Menschen übertragen wurde. <br>\r\n<br>\r\nDie Coronaviren-Familie umfasst 37 Virenarten (Stand von Juni 2019), die Menschen, Katzen, Vögel, Hunde, Rinder und Schweine befallen. Seinen Namen erhielt das Virus aufgrund seiner stachelförmigen Hülle, die einer Krone gleicht. <br>\r\n<br>\r\nWann kommt es zur Corona-Infektion?<br>\r\n<br>\r\nEs kann das ganze Jahr über zu einer Infektion kommen. Die Infektionswahrscheinlichkeit liegt jedoch im Winter und während den Frühlingsanfängen höher. Man kann sich durch engen und längeren Kontakt mit einer kranken Person infizieren. Menschen mit einem geschwächten Immunsystem, einer chronischen Lungenerkrankung, Diabetes und Nierenversagen sind einem höheren Infektionsrisiko ausgesetzt. Die Infektion wird durch Tröpfchen in der Luft und durch Kontakt übertragen.<br>\r\n<br>\r\nWas sind die Anzeichen einer Infektion?<br>\r\n<br>\r\nDie Symptome einer Coronavirus-Infektion ähneln denen einer einfachen Grippe: Fieber, Husten, Atemnot, allgemeine Beschwerden und Durchfall. In schweren Fällen kann es zu Atemstillstand kommen. Bei einer Coronavirus-Infektion der oberen Atemwege beträgt die Inkubationszeit 2-3 Tage. Die Krankheit macht sich schnell sehr bemerkbar und beginnt in den meisten Fällen mit einer mäßigen Vergiftung und Symptomen allgemeiner Schädingung der oberen Atemwege.<br>\r\n<br>\r\nOft ist das Hauptsymptom eine Rhinitis mit einer übermäßigen Absonderung von Sekreten. Manchmal wird die Krankheit von Kraftlosigkeit, Halsschmerzen und trockenem Husten begleitet. Während der Untersuchung entwickeln die Patienten eine Hyperämie und eine geschwollene Nasenschleimhaut sowie eine Hyperämie der Rachenschleimhaut.<br>\r\n<br>\r\nIn einigen Fällen ist eine Coronavirus-Infektion mit einer Schädigung der unteren Atemwege verbunden und durch die Entwicklung einer Lungenentzündung gekennzeichnet, die bei kleinen Kindern meist schwerwiegender ist, als bei Erwachsenen. Das Coronavirus kann auch eine akute Gastroenteritis verursachen. <br>\r\n<br>\r\nLassen Sie uns einige Gerüchte über Bananen und Versandpakete auflösen.<br>\r\n<br>\r\nUnter günstigen Bedingungen kann das Virus theoretisch bis zu 2 Tagen außerhalb des Körpers überleben. Um krank zu werden, benötigen Sie eine ausreichende Anzahl von „gesunden und resistenten“ Viren. Bei den Versandpaketen und Bananen ist dies praktisch nicht realistisch.<br>\r\n<br>\r\nWas ist zum heutigen Standpunkt bekannt?<br>\r\n<br>\r\nWie Sie wissen, ist der Höhepunkt der Epidemie in China vorbei. Seit dem 26. Februar wurden täglich weniger Fälle registriert als außerhalb Chinas. Das Hauptaugenmerk liegt jetzt auf Italien, Korea und dem Iran.<br>\r\n<br>\r\nWir bitten Sie dringend darum, sehr vorsichtig zu sein. Sich über die Risiken im Klaren zu sein, bedeutet bewaffnet zu sein! <br>\r\n<br>\r\nDas Wichtigste in diesem Fall ist es, das Krankheitsrisiko zu minimieren:<br>\r\n<br>\r\n- Bleiben Sie bei ersten Anzeichen einer Grippe zu Hause, um die Ansteckung weiterer Menschen zu vermeiden.<br>\r\n- Wenn Sie mit jemandem zusammenleben dann tragen Sie zu Hause eine Schutzmaske und lüften Sie den Raum.<br>\r\n- Der Hauptinfektionsweg ist die Aufnahme von Viruspartikeln durch die Augenschleimhaut bei Kontakt mit einer kranken Person. Daher können nur Masken mit speziellen Gläsern gesunde Menschen schützen; diese sind jedoch nicht verfügbar. Daher ist die Verwendung einer Maske für gesunde Menschen nicht erforderlich, sondern nur für bereits Infizierte, um eine Ansteckung weiterer Personen zu vermeiden. Gleichzeitig sollte die Maske gut auf das Gesicht passen.<br>\r\n- Vermeiden Sie nach Möglichkeit große Menschenmengen, insbesondere wenn Sie sich um ältere Verwandte kümmern.<br>\r\n- Waschen Sie Ihre Hände und verwenden Sie Desinfektionsmittel für die Hände.<br>\r\n- Überwachen Sie regelmäßig die Raumfeuchtigkeit (normal 40-80%). Denn eine feuchte Schleimhaut beudetet eine geschützte Schleimhaut.<br>\r\n- Trinken Sie mehr – Dehydratation führt auch zu trockenen Schleimhäuten.<br>\r\n- Reisen Sie nicht in Hochrisikoländer.<br>\r\n- Bei schwerwiegenden Erkrankungen und Atembeschwerden: Dringend einen Arzt rufen!<br>\r\n<br>\r\nWie schützen Sie sich mit der DeVita-Technologie?<br>\r\n<br>\r\nHier sind die Empfehlungen zur Verwendung von DeVita-Geräten zum Schutz vor „COVID-19“ (Coronavirus-Infektion 2019) von Frau Tatiana Konopliova.<br>\r\n<br>\r\nÜber den Tag:<br>\r\nProgramm im DeVita Ritm Mini oder DeVita Ritm Base:<br>\r\n„Schutz des Immunsystems“ – 02:00:00<br>\r\n- 2-3 Mal täglich anwenden<br>\r\nAutomatisches Programm:<br>\r\n„Gesundheit - automatisch\" – 08:08:00<br>\r\n- Einmal täglich anwenden<br>\r\n<br>\r\nIn der Nacht:<br>\r\nProgramme im DeVita AP Mini oder DeVita AP Base:<br>\r\n1. Anti-Virus<br>\r\n2. Anti-Erkältung<br>\r\n3. Stop Coronavirus<br>\r\n4. Frei von Toxinen<br>\r\n<br>\r\nWenn Erkältungssymptome erscheinen, fügen Sie die folgenden Programme hinzu:<br>\r\n1. Anti-Streptokokken<br>\r\n2. Antivirus – Magendarmtrakt (Coxsackie)<br>\r\n<br>\r\nZusätzliche Empfehlungen: Trinken Sie morgens 15 ml DeLixir Multi Energy und abends 15 ml DeLixir Detox.<br>\r\n<br>\r\nErfahren Sie mehr über die DeVita Technologien unter - <a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produkte/devita/\">https://deholdingstore.de/produkte/devita/</a>', 'izobrazhenie_viber_2020_03_04_13_51_41.jpg', 150),
(10, '2020-04-09', 'Das neue Programm \"Gegen Lyme-Borreliose 1\" auf dem Gerät DeVita AP Mini (ALLGEMEINE PROGRAMMLISTE 1/Nr. 20)', 'das-neue-programm-gegen-lyme-borreliose-1-auf-dem-ger-t-devita-ap-mini-allgemeine-programmliste-1-nr', '', ' Borrelia (Lyme-Borreliose) stellt das häufigste parasitäre Problem dar und tritt auf, wenn eine Person von einer infizierten Zecke gebissen wird. Betroffen sind dabei das Zentralnervensystem, das Herz und die Gelenke.<br>\r\n<br>\r\nDas neue Programm „Gegen Lyme-Borreliose 1“ auf dem Gerät DeVita AP Mini zielt speziell darauf ab, diese Mikroorganismen abzutöten, ohne die Organe und Systeme des Körpers zu schädigen.<br>\r\n<br>\r\nAnwendung: Dieses Programm wird zusammen mit dem Programm \"Gegen Lyme-Borreliose 2\" nach einem Zeckenbiss 2 Wochen lang täglich angewendet.<br>\r\n<br>\r\nFür die Probleme, die in Folge eines Zeckenbisses auftreten, schauen Sie sich das Programmset \"Gegen Lyme-Borreliose\" an.<br>\r\n<br>\r\nWeitere Informationen zum DeVita AP * Mini finden Sie unter dem Link -<br>\r\n<a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produkte/devita/devita-ap-mini/\">https://deholdingstore.de/produkte/devita/devita-ap-mini/</a><br>\r\n<br>\r\n* Dieses Gerät ist kein medizinisches Gerät. ', 'izobrazhenie_viber_2020_04_06_16_46_37.jpg', 150),
(11, '2020-04-10', 'Das neue Programm \"Gegen Lyme-Borreliose 2\" auf dem Gerät  DeVita AP Mini (ALLGEMEINE PROGRAMMLISTE 1/Nr. 21)', 'das-neue-programm-gegen-lyme-borreliose-2-auf-dem-ger-t-devita-ap-mini-allgemeine-programmliste-1-nr', '', 'Der Sommer naht! Wir müssen uns und unsere Lieben schützen!<br>\r\nDas Virus, das Gehirnentzündungen verursacht, wird durch Bisse von virusinfizierten Zecken übertragen und seltener durch die Einnahme oder Verwendung von Rohmilch von Kühen und Ziegen, die infiziert sind. Verbreitung: Sibirien, Ferner Osten und Wales. Das wichtigste betroffene Organ ist das Zentralnervensystem.<br>\r\nDas neue Programm \"Gegen Lyme-Borreliose 2\" auf dem Gerät&nbsp;DeVita AP Mini zielt speziell darauf ab, diesen Virus auszulöschen, ohne die Organe und Systeme des menschlichen Körpers zu schädigen.<br>\r\n<br>\r\nAnwendung: Dieses Programm wird zusammen mit dem Programm \"Gegen Lyme-Borreliose 1\" täglich für 2 Wochen nach einem Zeckenbiss angewendet.<br>\r\n<br>\r\nFür die Probleme, die in Folge eines Zeckenbisses auftreten, schauen Sie sich das Programmset \"Gegen Lyme-Borreliose\" an.<br>\r\n<br>\r\nWeitere Informationen zum DeVita AP * Mini finden Sie unter dem Link -<br>\r\n<a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produkte/devita/devita-ap-mini/\">https://deholdingstore.de/produkte/devita/devita-ap-mini/</a><br>\r\n<br>\r\n*Dieses Gerät ist kein medizinisches Gerät.', 'izobrazhenie_viber_2020_04_06_16_46_58.jpg', 150),
(12, '2020-04-11', 'Вы уже знаете, что конференция лидеров 2020 года пройдет с 20 по 25 сентября?', 'wie-sie-vielleicht-bereits-wissen-findet-vom-20-bis-zum-25-september-die-konferenz-der-f-hrungskr-ft', '', 'Die Veranstaltung wird in einem der besten Business-Hotels in der Nähe von Moskau an einem malerischen und komfortablen Ort ausgetragen!<br>\r\n<br>\r\nEine neue und einzigartige Form der Ausbildung erwartet Sie in den Bereichen Business, persönliche Entwicklung und Technologien zur Wiederherstellung der Gesundheit. Und all dies können Sie mit Entspannung, einem gemütlichen Wellnessbereich und zahlreichen Freizeitaktivitäten vor Ort sowie Ausflügen zu historischen Stätten in Moskau kombinieren.<br>\r\n<br>\r\nWie komme ich zu dieser vom Unternehmen organisierten Veranstaltung?<br>\r\nEs ist sehr einfach!<br>\r\n<br>\r\nSie müssen vom 1. Januar bis zum 31. Juli 50 Schritte ausführen (gültig für alle Platin-Titel).<br>\r\n<br>\r\nSie können an dieser Veranstaltung und an allen geplanten Aktivitäten von DEHolding teilnehmen!', 'izobrazhenie_viber_2020_04_10_12_16_40.jpg', 150),
(14, '2020-04-12', 'Что такое - живые знания?', 'what_is_live_knowlidge', '', '<p>Одним из преимуществ Академии \"Rasource\" являются ЖИВЫЕ ЗНАНИЯ, которым мы обучаем наших студентов. </p>\r\n<p> Почему это так важно?</p>\r\n<p> Сейчас мир переполнен знаниями. В наше время найти любую информацию в интернете не является большой сложностью.</p>\r\n<p> Но проблема этих излишков информации в том, что большинство знаний здесь – мертвы. Их очень сложно, а иногда даже невозможно применить.</p>\r\n<p> Мир меняется каждый день. Методики, подходы, средства - все эволюционирует. И чаще всего знания, которые человек изучает и транслирует сегодня, будут не столь актуальными завтра.</p><p> С другой стороны, сейчас период, когда людям важно применять реальные знания здесь и сейчас.</p>\r\n<p> Проходите опрос по ссылке - <a href=\"https://rasource.academy/?fbclid=IwAR1-g5W_lUtTYoVUivP7C9F34YJsvtsbGOBZSGn-Y7HxQlH4YH0spomkHdA\" target=\"_blank\" >https://rasource.academy</a> и станьте частью нашего образовательного движения, получая именно живые и необходимые знания!</p>', 'izobrazhenie_viber_2020_04_10_12_17_08.jpg', 150),
(15, '2020-04-13', 'Статистика результатов квиза', 'quiz_results', '', 'Penicillium ist ein Schimmelpilz, der die Organe der Harn- und Atemwege, die Lymphknoten und die Haut befällt. Es verursacht schwere Vergiftungen und ist allergen.<br>\r\n<br>\r\nDas neue Programm „Stopp Penicillium“ auf dem Gerät DeVita AP Mini zielt speziell darauf ab, diesen Pilz auszulöschen, ohne die Organe und Systeme des menschlichen Körpers zu schädigen.<br>\r\n<br>\r\nAnwendung: Täglich für 2 Wochen.<br>\r\n<br>\r\nWeitere Informationen zum DeVita AP Mini finden Sie unter dem Link -<br>\r\n<a class=\"txttohtmllink\" href=\"https://deholdingstore.de/produkte/devita/devita-ap-mini/\">https://deholdingstore.de/produkte/devita/devita-ap-mini/</a><br>\r\n<br>\r\n*Dieses Gerät ist kein medizinisches Gerät.', 'izobrazhenie_viber_2020_04_10_12_17_34.jpg', 150),
(16, '2020-04-14', 'Запуск обновленного сайта академии', 'start_new_website', '', '<p>Марафон стройности, который мы запускали на старте Академии, получил большое количество положительных отзывов! Участники до сих пор делятся своими результатами, советуются и общаются в чате марафона.</p>\r\n<p> Онлайн-марафоны — это своеобразная школа для получения какого-то навыка за ограниченное время (21-40 и более дней).</p>\r\n<p> Ведущий марафона дает полезный контент и задания, которые необходимо выполнить участникам, и в итоге, участники учатся чему-то новому и достигают своих целей, общаясь и делясь результатами с единомышленниками.</p>', 'izobrazhenie_viber_2020_04_14_12_16_45.jpg', 150),
(17, '2020-05-19', 'Добавлена функция создания новости', 'function_add_post', 'Код уязвим для ошибок. И вы, скорее всего, будете делать ошибки в коде… ', 'Код уязвим для ошибок. И вы, скорее всего, будете делать ошибки в коде… Впрочем, давайте будем откровенны: вы точно будете совершать ошибки в коде. В конце концов, вы человек, а не робот.\n\nНо по умолчанию в браузере ошибки не видны. То есть, если что-то пойдёт не так, мы не увидим, что именно сломалось, и не сможем это починить.\n\nДля решения задач такого рода в браузер встроены так называемые «Инструменты разработки» (Developer tools или сокращённо — devtools).\n\nChrome и Firefox снискали любовь подавляющего большинства программистов во многом благодаря своим отменным инструментам разработчика. Остальные браузеры, хотя и оснащены подобными инструментами, но все же зачастую находятся в роли догоняющих и по качеству, и по количеству свойств и особенностей. В общем, почти у всех программистов есть свой «любимый» браузер. Другие используются только для отлова и исправления специфичных «браузерозависимых» ошибок.', '1589887716_57ca938aaaa6e93a138d.jpg', 100);

-- --------------------------------------------------------

--
-- Структура таблицы `post_types`
--

CREATE TABLE `post_types` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `short_description` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(250) NOT NULL,
  `img_thumb` varchar(250) NOT NULL,
  `images` varchar(250) NOT NULL,
  `video_url` varchar(250) NOT NULL,
  `presentation_image` varchar(250) NOT NULL,
  `presentation` varchar(250) NOT NULL,
  `complex_list` text NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `discounts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `category_id`, `type_id`, `name`, `short_description`, `description`, `slug`, `img_thumb`, `images`, `video_url`, `presentation_image`, `presentation`, `complex_list`, `price`, `discounts_id`) VALUES
(1, 1, 1, 'DEVITA AP MINI', '', 'INNOVATIVE NEUHEIT! (KOMPAKT, EINGEBAUTER PROGRAMMIERER, VERBESSERTE BATTERIE) Es bereinigt den Körper von allen bekannten pathogenen Gruppen - Viren, Bakterien, Pilze, Helminthen (Würmer), Giftstoffe und entfernt Abfall- bzw. Abbauprodukte wie Toxine', 'devita-ap-mini', 'ap_mini.png', '', '', 'DeVita_AP_mini_de_DE.jpg\r\n', 'DeVita_AP_mini_de.pptx', '', '696.00', 1),
(2, 1, 1, 'DEVITA RITM MINI', '', 'INNOVATIVE NEUHEIT! (KOMPAKT, EINGEBAUTER PROGRAMMIERER, VERBESSERTE BATTERIE) Es reguliert die Funktion der inneren Organe und Systeme des Körpers, passt diese an gesunde Frequenzen an und erzielt damit eine umfassende heilende Wirkung', 'devita-ritm-mini', 'ritm_mini.png', '', '', 'DeVita_ritm_mini_de_DE.jpg', 'DeVita_Ritm_mini_de.pptx', '', '696.00', 1),
(3, 1, 1, 'DEVITA ENERGY MINI', '', 'Es senkt den Stress, aktiviert die Vitalquellen des Menschen und sorgt für das energetische Gleichgewicht des Körpers', 'devita-energy', 'devita_energy_icon.png', '', '', 'DeVita_Energy_de_DE.jpg', 'DeVita_Energy_mini_de.pptx', '', '345.00', 1),
(4, 1, 1, 'DEVITA COSMO', '', 'Es fördert die Schönheit und Jugend - verjüngt die Haut und verbessert den Zustand von Haaren und Nägeln', 'devita-cosmo', 'cosmo_i.png', '', '', 'DeVita_cosmo_de_DE.jpg', 'DeVita_Cosmo_de.pptx', '', '594.00', 1),
(5, 1, 1, 'DEVITA RITM BASE', '', 'Das Gerät DeVita Ritm Base reguliert die Leistungsfunktion der Organe und Systeme des Körpers - es passt ihn an gesunde Oszillationsfrequenzen an und sorgt für eine starke heilende Wirkung', 'devita-ritm-base', 'ritm_base.png', '', '', 'DeVita_RITM_BASE_de_DE.jpg', 'DeVita_Ritm_base_de.pptx', '', '648.00', 1),
(6, 2, 1, 'DELIXIR ULTRA SLIM+', '', 'Das Elixir mit dem erfrischenden Cranberry-Geschmack beschleunigt den Stoffwechsel, senkt den Appetit, steigert die Aktivität der fettverbrennenden Enzyme und verringert folglich das Körpervolumen (Gewichtsverlust)', 'delixir-ultra-slim', 'delixir_ultra_slim.png', '', '', 'Delixir_ULTRA_SLIM_de_DE.jpg', 'DeLixir_Ultra Slim_de.pptx', '', '54.00', 1),
(7, 2, 1, 'Delixir Detox', '', 'Das reinigende Elixir mit dem exotischen Kiwi-Geschmack bereinigt den Körper effektiv und sanft von Toxinen, beseitigt überschüssige Flüssigkeiten und normalisiert die Darmfunktion', 'delixir-detox', 'delixir_detox.png', '', 'https://www.youtube.com/embed/s05JorBlkmU&autoplay=0', 'Delixir_detox_de_DE.jpg', 'DeLixir_Detox_de.pptx', '', '54.00', 1),
(8, 2, 1, 'DELIXIR PH-BALANCE', '', 'Das alkalisierende Elixir mit dem delikaten Zitronengeschmack hilft das Säure-Base-Gleichgewicht im Körper zu wahren und verbessert das endokrine, Nerven-, Herz-Kreislauf- sowie das Verdaaungssystem', 'delixir-ph-balance', 'delixir_balance.png', '', 'https://www.youtube.com/embed/2g4mfmhM4iI&autoplay=0', 'Delixir_BALANCE_de_DE.jpg', 'DeLixir_PH-Balance_de.pptx', '', '54.00', 1),
(9, 2, 1, 'Delixir Multi-energy', '', 'Das Multivitamin-Elixir mit Orangengeschmack verleiht Ihnen gute Laune und hilft Müdigkeit und die Stressauswirkungen zu bekämpfen sowie das Immunsystem zu stärken', 'delixir-multi-energy', 'delixir_multi_energy.png', '', 'https://www.youtube.com/embed/Gg6450uQqhI&autoplay=0', 'Delixir_MULTY_ENERGY_de_DE.jpg', 'Delixir_Multi_energy_de.pptx', '', '54.00', 1),
(10, 2, 1, 'DELIXIR COLLAGEN+', '', 'Das Anti-Aging-Elixir mit dem Geschmack von Schwarzer Johannisbeere weist einen hohen  Kollagen- und Hyaluronsäureanteil auf; Es ist gut für die Gelenke, Blutgefäße, Augen sowie für die Haut, Haare und Nägel', 'delixir-collagen', 'delixir_collagen.png', '', 'https://www.youtube.com/embed/5UKF88dWFrE&autoplay=0', 'Delixir_COLLAGEN_de_DE.jpg', 'DeLixir_Collagen_de.pptx', '', '54.00', 1),
(11, 3, 1, 'DEPULS+', '', 'Das Gerät eignet sich zur Bewertung des Funktionszustands des menschlichen Körpers unter Nutzung bestimmter Gesundheits-parameter - Stressindex, psychoemotionaler Zustand, Zustand des Immunsystems, Energieressourcen des Körpers, Funktionszustand der Organe und Systeme', 'depuls', 'depuls_test.png', '', '', 'DEPULSE_de_DE.jpg', 'DEPULS_de.pptx', '', '1176.00', 1),
(12, 1, 1, 'DEVITA AP BASE', '', 'Das Gerät DeVita AP Base sorgt für die Verbesserung des Körperzustandes und bereinigt ihn von allen bekannten pathogenen Gruppen - Viren, Bakterien, Protozoen, Pilze, Helminthen sowie von den Abfall- bzw. Abbauprodukten wie Toxine', 'devita-ap-base', 'ap_base.png', '', '', 'DeVita_AP_base_de_DE.jpg', 'DeVita_AP_base_de.pptx', '', '648.00', 1),
(13, 1, 1, 'Devita BRT', '', 'Die weltweit einzige tragbare endogene bioresonanzkorrektur', 'devita-brt', 'devita_BRT_icon.png', '', '', '', '', '', '2340.00', 1),
(14, 1, 1, 'DEINFO', '', 'Der Universal-Programmierer der Base-Geräteserie ermöglicht dem Patient das Herunterladen zusätzlicher Programme auf dem Gerätespeicher sowie die Erstellung von automatisch ablaufenden Programmen', 'deinfo', 'deinfo_i.png', '', '', '', '', '', '300.00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products_type`
--

CREATE TABLE `products_type` (
  `ID` int(11) NOT NULL,
  `type_product` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_type`
--

INSERT INTO `products_type` (`ID`, `type_product`, `description`) VALUES
(1, 'simple', 'Simple product, no complex product'),
(2, 'complex', 'Complex product, which included some products inside');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `restore_key` varchar(250) NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `login`, `pwd`, `name`, `lastname`, `restore_key`, `user_level`) VALUES
(1, 'chessman@yandex.ru', '$2y$10$gNF1oIrtn5jNIAHv5TE9J.DXuZIJHlSOlRp8uZSGHJcdiLGPl6oXm', 'Александр', 'Соловей', '', 1),
(4, 'a.solovey@deholding.org', '$2y$10$oSO5cj0lxeHNJzIdUxv54eLybQUS.GcNC1RXZoKJ8Tk/d3VFZob3K', 'Alex', 'Naghtigall', '', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_levels`
--

CREATE TABLE `user_levels` (
  `ID` int(11) NOT NULL,
  `level_name` varchar(250) NOT NULL,
  `user_level` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_levels`
--

INSERT INTO `user_levels` (`ID`, `level_name`, `user_level`) VALUES
(1, 'Root admin', 'root'),
(2, 'Administrtors', 'admin'),
(3, 'Editors', 'editor'),
(4, 'Clients', 'client'),
(5, 'Managers', 'manager'),
(6, 'Androids', 'android');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `front_users`
--
ALTER TABLE `front_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Индексы таблицы `post_types`
--
ALTER TABLE `post_types`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `FK_products_category` (`category_id`),
  ADD KEY `FK_products_discounts` (`discounts_id`),
  ADD KEY `FK_products_type` (`type_id`);

--
-- Индексы таблицы `products_type`
--
ALTER TABLE `products_type`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `user_level` (`user_level`);

--
-- Индексы таблицы `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `discounts`
--
ALTER TABLE `discounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `front_users`
--
ALTER TABLE `front_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `post_types`
--
ALTER TABLE `post_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `products_type`
--
ALTER TABLE `products_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`ID`),
  ADD CONSTRAINT `FK_products_discounts` FOREIGN KEY (`discounts_id`) REFERENCES `discounts` (`ID`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `products_type` (`ID`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_level` FOREIGN KEY (`user_level`) REFERENCES `user_levels` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
