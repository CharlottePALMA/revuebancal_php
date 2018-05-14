-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 20 Juin 2017 à 07:51
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bancal2`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `accroche` text NOT NULL,
  `image_avant` varchar(255) NOT NULL,
  `mots_cles` varchar(50) DEFAULT NULL,
  `etat` varchar(1) NOT NULL,
  `editeur_article` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `a_la_une` tinyint(1) DEFAULT NULL,
  `slider` tinyint(1) DEFAULT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `publication` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `created`, `updated`, `titre`, `contenu`, `accroche`, `image_avant`, `mots_cles`, `etat`, `editeur_article`, `category_id`, `a_la_une`, `slider`, `image_slider`, `publication`) VALUES
(17, '2017-06-19 10:35:46', '2017-06-19 10:35:46', 'De ce qui, seul, nous attend', 'Quand je suis entrée dans le livre à ce jour inédit de Wagner Schwartz, je ne l’avais pas encore vu danser. Il m’est rapidement apparu que le fait de le connaître aussi en tant que danseur enrichirait non seulement ma lecture d’un pont entre les deux arts mais également ma compréhension, chez cet artiste, du corps comme évident point de convergence des discours. C’est donc très paradoxalement que son livre s’ouvre avec la phrase suivante : « le récit se fait sans le poids du corps ». Est-ce néanmoins si inattendu et étrange que cela ?  Me suis-je demandé…\r\n\r\nCar la danse n’est pas étrangère à la démarche réflexive que Wagner propose dans son écriture. Lors de la création du spectacle Piranha, en 2009, un artiste l’aurait interrogé sur l’expérience à venir du public : « Est-ce qu’ils pourront réfléchir ensemble ? » Piranha… Le nom de ce poisson s’est bientôt accroché aux pages du livre, comme une dent mystérieuse plantée dans les lambeaux de la chair du personnage, Adeline – comment ne pas penser ici au premier prénom de Virginia Woolf ? – cette anthropophage engloutissant qui chercherait à la réduire à une pure pensée.\r\n\r\nÀ la question de savoir si le public pourrait penser « ensemble » Wagner a répondu : « Jamais ensemble mais en même temps. » La formule est aujourd’hui le titre de son livre. Mais Nunca juntos mas ao mesmo tempo est aussi l’image-apparition qui a guidé les recherches gestuelles et littéraires de Piranha (présenté en France au Théâtre de Vanves et, en Belgique, à la Raffinerie/Charleroi Danses, 2014), où le mot précède le corps, convulsé et immergé dans des faisceaux lumineux. Piranha se lit comme une investigation existentielle convertie en poétique : « ce qui n’a pas d’importance pour les autres m’appartient. »\r\n\r\nJamais ensemble mais en même temps. Escrito em português. Écrit en français.\r\n\r\nPréciser que « Wagner est un brésilien qui vit à Paris depuis des années » ne suffit pas à expliquer la démarche, pas plus que la mention « édition bilingue » ne dit quoi que ce soit de la nécessité de ce qui se rejoue dans cette prose poétique. La catégorie « bilingue » ne rend pas compte de ce qui est ici manifestement distinct, de cette exigence de dire dans la langue de l’autre ce « soi-même » transformé en « il » ou « elle ». « Ce qui n’a pas d’importance pour les autres m’appartient. » Página pour página, page à page, l’appropriation – non pas simple traduction mais métabolisation d’un « corps inventé » (durant cinq ans, avec Béatrice Houplain) – se révèle être une condition de survie pour qui se déplace entre les langues. Ce récit écrit « sans le poids du corps » évoque ainsi le flottement, dans le flux des traces devenues mots, d’un corps plongé dans de nouvelles conditions climatiques et qui aurait fait de cette distance à soi-même la matière primordiale de la vie.\r\n\r\nJ’ai vu Piranha – prix A.P.C.A. (l’Association des Critiques d’Art de São Paulo) de Meilleur Projet Artistique de 2012 au Brésil – en 2016, dans le cadre du Festival Contemporain de Danse, à Sao Paulo (www.fcdsp.com.br). Wagner Schwartz nous réunit, nous le public, dans la même salle, à la même heure, sur des sièges très semblables, et nous rappelle le vide qui s’étend entre chacun d’entre nous – un prélude pour s’échapper du troupeau. Rassemblés devant la scène d’un festival de danse, prêts à suivre un corps dans ses mouvements, nous sommes avant tout invités à lire ensemble et, en même temps, dans une solitude que le silence et l’obscurité favorisent.\r\n\r\nLa pièce débute par la projection, sur grand écran, de Piranha : dramaturgie de la migration, texte de Wagner. Le rythme est cadencé, les mots défilent. Quand bien même je n’aurais pas lu Wagner avant de le voir danser, je l’aurais lu néanmoins, au moins ce soir-là, avant de le voir danser, lui qui, en tant qu’artiste traversé par le verbe, nous a déjà donné rendez-vous avec la lecture dans cet argument qui cite l’auteure Maria Gabriela Llansol : « Vivre quasiment seul attire, peu à peu, les totalement seuls »[1]. « Le mot n’est pas intelligible. / Je le comprends dans sa relation aux objets. », écrit Wagner, et nous le lisons, lui qui, à travers sa danse, « prend ses propres limites pour objets » : un corps qui s’invente sous nos yeux, les mots qu’il recrée en nous, ce qui nous sépare des autres.\r\n\r\nIl y a, dans Jamais ensemble mais en même temps comme dans Piranha, l’exigence d’une rencontre, à ceci près qu’elle aura lieu entre des êtres déjà séparés ou, selon Wagner, sous forme de « métaphore d’un corps emprisonné ». Ce n’est ni en tant que troupeau, ni comme singularités diluées dans un ensemble homogène que nous sommes invités à participer à cette rencontre. On ne s’étonnera donc pas de trouver dans le spectacle la note de Llansol, extraite de Finita – qui s’ouvre sur une page d’enfance[2] avant d’entrer dans le présent de l’écriture[3] : « J’ai terminé aujourd’hui Le livre des communautés ». Car Wagner s’inscrit dans la filiation de penseurs qui, comme Llansol, croyaient en des communautés fondées sur le respect de la distance, d’un espace entre les êtres, d’une séparation qui ne soit pas isolement les uns des autres, bien au contraire. On pense ici à Bataille, Blanchot et ou encore Nancy.\r\n\r\nEt si, comme nous le rappelle Wagner, « le mot n’est pas intelligible », Lucia Castello Branco souligne dans Absolument seuls[4], que « c’est à partir même de ce point où la lettre est illisible que la “scriptibilité” du désir et de la textualité devient possible ».\r\n\r\nLa sagesse et le contrôle du corps que nous attribuons au danseur deviennent dans Piranha un art de la connaissance de soi et du lâcher prise. Par sa technique pointue, Wagner envoie jusqu’à nous son onde de choc. Ses pieds, comme les nôtres immobiles sous nos sièges, restent fixes sur la scène mais nous vibrons avec lui des muscles invisibles que nous sentons sous notre peau. Et précisément c’est de vagues électriques qu’ondulent ses vêtements – celles de la musique électronique ? De ce quasi choc que nous sentons ? Nous pouvons bien imaginer qu’ils sont mus par des touches de contrôle et des crochets, mais tout n’est bel et bien que mouvements du danseur. Ces ondulations sont aussi celles des eaux douces d’Amérique du Sud, où vivent les piranhas, ou encore celles des flots turbulents par lesquels vinrent un jour les « découvreurs » de ces terres. La technique de Wagner prend également en compte la durée que notre conscience peut tolérer à être ce corps-là qui, dans son devenir extrême et unique, (permettons-nous d’employer ici la première personne du pluriel) nous inclut.\r\n\r\n« Et qui sait ce qu’est un corps », écrit Augusto Joaquim, compagnon de Llansol[5]. Le corps du lecteur, de celui qui assiste au spectacle est un « corps d’affects ». C’est ainsi que Llansol qualifie le corps de ceux qu’elle nomme les « legentes », ceux qui « partagent l’expérience du texte », explique Lucia Castello Branco. Et, selon le poète Erick Gontijo Costa, « legente est un néologisme par lequel Llansol désigne le lecteur qui, apte à soutenir de son corps propre l’expérience du texte, peut entrer de plain-pied à l’intérieur de l’œuvre ».\r\n\r\nAinsi Paul Zumthor se place-t-il, dans Performance, réception, lecture[6], du point de vue du lecteur pour rendre compte de sa présence corporelle active comme une exigence poétique qui nous extrait du troupeau, tel un corps ermite : « Se renoue alors une continuité inscrite dans nos aptitudes corporelles, dans le réseau des sensualités complexes qui font de nous, dans l’univers, des êtres différents des autres. Dans cette différence réside quelque chose dont émane la poésie ». C’est aussi ce que suggère Llansol, à l’instar des autres penseurs cités par Wagner.\r\n\r\nEn soulignant que la position du corps lors de la lecture est déterminée « par la recherche d’une capacité maximale de perception » Zumthor remarque, à propos des vibrations physiologiques qui actualisent les non-dits du texte lu : « Vous ne pouvez lire n’importe quoi dans n’importe quelle position, les rythmes sanguins en sont affectés. Ainsi on concevrait mal que, lisant dans votre chambre, vous vous mettiez à danser et pourtant, la danse est l’aboutissement normal de l’audition poétique ! »\r\n\r\nCette place du spectateur, du lecteur ou « legente » (nommé tel quel chez Llansol mais que j’entrevois aussi chez Wagner) se révèle donc indissociable de la tessiture propre au poétique, percée d’« espaces blancs », « d’« interstices à remplir », de « passages d’indécision », « exigeant l’intervention d’une volonté externe. Le texte [ou le corps de Piranha] vibre, le lecteur le stabilise en l’intégrant à ce qu’il est, lui. C’est lui maintenant qui vibre, de tout son corps, et son esprit. Il n’y a, dans ce qui crée le langage, jamais ni structure ni système complètement clos ; et les lacunes, les trous qui nécessairement y subsistent y constituent un espace de liberté : illusoire en ce qu’il ne peut être occupé qu’un instant, par moi, par toi, lecteurs par vocation nomade. Aussi bien, l’illusion est le propre de l’art », dit Zumthor. Et Llansol : « Comment garantir le retour du même, / comment aimer et songer. Nous sommes toujours les mêmes, qui  ______________. »\r\n\r\nFinita a également inspiré un autre spectacle (homonyme) de Wagner Schwartz, créé à l’invitation de Lucia Castello Branco, João Barrento, Maria Etelvina Santos et de Llansol elle-même. Il n’existe pas de captation de cette pièce, à laquelle seule une trentaine de personnes ont assisté au Couvent D’Arrabida, au Portugal, en 2003. Le groupe de « legentes » est resté sur place pendant cinq jours pour le colloque Maria Gabriela Llansol et l’écriture contemporaine. À propos de cette représentation de Finita, Wagner écrit : « la scène ici se concrétise et je peux presque la toucher, jusqu’à Llansol elle-même, très vivante entre nous ». « Entre nous », cette distance nécessaire et paradoxale qu’il nous faut maintenir :\r\n\r\n« J’ai préparé la chapelle, nettoyé le sol entre les tombes. La représentation avait lieu le soir, impossible de fuir. En même temps j’écoutais L’art de la fugue de Bach. C’était la musique sur laquelle j’allais danser. Puis la chapelle s’est remplie. Nous nous connaissions tous et ce lieu m’était familier. Pendant que je dansais ma lecture de Finita, je gardais les yeux sur Llansol, dont le regard se dérobait. À un moment elle m’a regardé, poursuivant mon geste comme sa trace. Elle voulait dire, je crois, que l’écriture glisse à la surface, parce que ‘l’amour, seul, nous attend’.»\r\n\r\nLuciana Araujo Marques\r\n\r\n     Le texte original en portugais (Brésil) a d’abord été publié dans la revue Pessoa, la  traduction en français a été faite par Valérie GEANDROT,\r\n\r\n    Luciana Araujo Marques est journaliste et éditrice. Elle est titulaire d’un Master en Théorie littéraire (USP) et poursuit actuellement un doctorat en Théorie et histoire littéraire (Unicamp). Elle a été sélectionnée pour le programme « Rumos Literatura », mis en place par l’Institut Itaú Cultural dans le but de promouvoir les nouveaux noms de la critique littéraire, en particulier sur la production contemporaine brésilienne. Ce programme a donné lieu à une publication collective, Protocoles critiques, en 2009.\r\n\r\n    Les travaux chorégraphiques de Wagner Schwartz sont fortement influencés par la littérature. Ils interrogent et problématisent les expériences de l’étranger, entre langues, cultures, villes et institutions, au travers d’un procédé qu’il définit comme « dramaturgie de la migration». Schwartz travaille avec la danse contemporaine, et fait également usage de compositions de textes, d’images et de sons pour rendre visible l’objet physique de ses expériences.', 'Du geste au texte ou comment danse et littérature dialoguent poétiquement  et philosophiquement dans le travail du chorégraphe et écrivain  Wagner  Schwartz. Une très belle analyse de  Luciana Araujo Marques.', 'de-ce-qui-seul.png', 'danse;littérature', '2', 'Reda', 3, 2, 2, 'de-ce-qui-seul.png', NULL),
(18, '2017-06-19 10:44:42', '2017-06-19 10:44:42', 'Messages aux badauds', 'Toutes les photos ont été prises à Paris dans le 17e et le 18e, entre le mois de mars et le mois de mai 2017. J’ai parfois eu l’impression que quelqu’un ou quelque chose m’envoyait des messages, tout particulièrement lorsque j’ai lu mon prénom sur l’une des fresques… à 200 m de l’appartement que je venais de visiter et dans lequel j’emménagerai dans quelques mois (sans parler du sourire sur la devanture d’un local de Les Républicains en pleine élection présidentielle). Je me suis demandé si la chronologie des messages avait une signification : Amour toujours/Confiance/La vie est belle/Confiance/Sourire/La vie est miracle (n’est-ce pas Céline ?)/Je vous aime tous/La beauté sauvera le monde. J’ai cherché à savoir si chaque message lu le matin devait être relié à un événement précis de ma journée. Si ces messages devaient être perçus comme autant de coïncidences heureuses et de synchronicités nécessaires. Je me suis obligée à observer comment chaque message lu le matin avait subtilement influencé ma journée, mon humeur et l’avait peut-être imperceptiblement bouleversée. Peu importe, la magie et la puissance de ces petites phrases, leur optimisme naïf et touchant, leur pouvoir inspirant et vivifiant, suffisent à justifier notre impatience à en découvrir de nouvelles.', 'Les frères Toqué, duo familial d’artistes urbains, se définissent comme des embellisseurs de villes et de vies. C’est eux qui recouvrent les rues de Paris et de sa banlieue de leurs messages d’amour, de confiance et de pensée positive. C’est eux qui donnent le sourire aux badauds et instillent cette idée lumineuse dans nos esprits : et si la beauté pouvait sauver le monde ?', 'messages-aux-badauds.png', 'street-art;paris', '2', 'Reda', 4, 2, 2, 'messages-aux-badauds.png', NULL),
(19, '2017-06-19 10:54:55', '2017-06-19 10:54:55', 'Mister Universo', 'L’histoire de Mister Universo tient en deux lignes. Tairo est un dompteur superstitieux dans un cirque de la banlieue romaine. Le jour où l’on lui vole son fer porte-bonheur, il décide de retrouver Mister Universo pour qu’il lui redonne un autre fer. Les réalisateurs, dès la première séquence, cernent leur personnage principal avant de lui lâcher la bride. Quand Tairo se prépare à entrer en scène, il a besoin de regarder la fameuse scène du bal de mariage du film Le parrain et d’embrasser son fer pour se sentir d’attaque. Quand sa copine Wendy apparaît par la suite, on devine qu’il la demandera en mariage mais la perte de son fer porte-bonheur retardera sa déclaration.\r\n\r\nCe docu-fiction, où les acteurs jouent leur propre rôle, est plus un road-movie qu’un film ethnographique. Tizza Covi et Rainer Frimel suivent Tairo dans ses différentes escales entre Rome et le nord de l’Italie. L’occasion pour nous de de faire connaissance avec sa famille et les personnages pittoresques qui la composent.\r\n\r\nMister Universo est un personnage très attachant. Ce vieillard de 88 ans fut le premier homme noir à être couronné en 1957 pour son corps et sa force.\r\n\r\nTizza Covi et Rainer Frimel ont tourné leur film dans l’ordre chronologique et cela se voit dans le jeu de leurs personnages. En aucun moment on ne sent que la fiction prend le pas sur le documentaire et cela est dû notamment aux plans larges où la caméra se fait oublier.\r\n\r\nLes cinéastes ont réussi leur film, car on a hâte de savoir ce que vont devenir Tairo et ses fauves veillissants et fatigués.\r\n\r\nSalih B.\r\n\r\nPS : Avec Je danserai si je veux de la cinéaste Maysaloun Hamoud, le risque était grand de se retrouver face à un film formaté pour les festivals internationaux. Qu’on en juge : un premier film d’une jeune réalisatrice palestinienne racontant l’histoire de trois colocataires très caractérisées. L’une est avocate à moitié alcoolique, une autre est une lesbienne que les parents veulent marier à tout prix et la troisième est une étudiante voilée et soumise pressée par son futur époux d’être femme au foyer avec enfants. Fort heureusement, le film est beaucoup plus subtil et les personnages finissent par prendre de l’épaisseur grâce aux actrices qui leur donnent une vraie présence. Un film qui mérite d’être soutenu malgré deux ou trois scènes clipesques.', 'En retrouvant le monde du cirque, les réalisateurs italiens Tizza Covi et Rainer Frimel continuent leur rencontre avec les gens de voyage, ce qu’ils avaient déjà commencé avec leur film La pivellina au cours duquel ils rencontrèrent Tairo, alors âgé de 14 ans.', 'mister-universo.png', 'docu-fiction;Tizza Covi et Rainer Frimel', '2', 'Reda', 2, 2, 2, 'mister-universo.png', NULL),
(20, '2017-06-19 11:03:43', '2017-06-19 11:03:43', 'Easter Sounds Festival', 'Pour cette première édition, les organisateurs ont collaboré avec plusieurs adresses incontournables de la capitale dans un triangle entre Châtelet, Pigalle et le Bassin de la Villette : la Rotonde Stalingrad, À La Folie, La Place, L’Entrée des Artistes, le Macumba ou encore le New Morning.\r\nLe coup d’envoi du festival, lancé fin mars, avec la soirée d’ouverture qui s’est déroulée à La Place (Forum des Halles, passage de la  Canopée Paris 1er), proposait une conférence sur la Black Music et les danses intimement liées à ce mouvement, M. Belkacem, spécialiste de la Black Music, a animé avec joie et enthousiasme cette conférence, permettant de (re)-découvrir tout un pan de la musique et de la danse jazz américaines, s’étalant des années 30-40 jusqu’aux années 80.\r\n\r\nRappelant que le jazz est né de la rencontre de deux cultures – la culture afro américaine et la culture européenne -, M. Belkacem a présenté, vidéos à l’appui, différents styles de danse tels que le Cake walk, le Charleston, le Lindy hop pour arriver au Rock, au Funk, au Break dancing jusqu’au Rap et Hip Hop actuels. Nous replongeant dans l’univers des années 70-80, il est revenut sur l’alliance entre jazz et dance avec l’emblématique show, Soul Train, émission américaine de variétés créée par l’animateur et producteur Don Cornelius en 1970 avec Jeffrey Daniel (en autres, chanteur du groupe Shalamar et chorégraphe de Michael Jackson) ou encore l’incontournable James Brown qui a eu une influence marquante sur ceux qui le suivirent tant au niveau musical que dans la danse, et bien sûr l’immense artiste qu’était Michael Jackson, qui a réussi, en développant son propre style à marier le mime, le théâtre et différents styles de danses Jazz et urbaines.\r\n\r\nPour mettre à l’honneur cette culture jazz dance, le festival propose non seulement des soirées en club disco et funk mais aussi divers événements visant à  faire découvrir  cet univers. Samedi 15 avril à partir de 15h, à La Place, centre culturel hip-hop, vous pourrez suivre des cours de danse tous niveaux dans les styles Soul Train, UK Jazz dance et Jazzrock. Dimanche 16 avril après-midi, le New Morning proposera de danser sur du jazz dans une configuration club ainsi qu’une plongée  dans l’univers des danseurs grâce à la jam BBoy organisée par le Youpi Cru et qui compte réunir des participants de toute l’Europe.\r\n\r\nClélia', 'Né de l’association de deux promoteurs parisiens, Digger’s Delight et Jazz Attitudes, le nouveau rendez-vous parisien dédié au jazz dance ainsi qu’aux musiques disco et au funk, le Easter Sounds Festival se tient à Paris jusqu’à ce week-end.', 'easter-sounds-festival.jpg', 'festival;summer', '1', 'Reda', 6, 2, 2, 'easter-sounds-festival.jpg', NULL),
(21, '2017-06-19 11:22:20', '2017-06-19 11:22:20', 'Tapei story', 'L’histoire de Lon (Hous Hsiao Hsien) et de Chin (Tsai Chin) commence sur une séparation immédiatement suivie par une scène de retrouvailles. Lon part aux Etats-Unis puis revient à Tapei pour retrouver Chin, son amour de jeunesse. Bien plus qu’une simple histoire d’amour, le film nous donne à voir le lent processus de délitement du couple.\r\n\r\nEdward Yang commence par des scènes banales entre les deux héros, laissant les plans s’étirer au maximum. Mais dès que Chin perd son travail, sa relation avec Lon devient de plus en plus compliquée et le film plus intense. Chin a du mal à comprendre Lon qui ne fait rien pour se faire aimer davantage. Une séquence symptomatique annonce les incompréhensions futures. Lorsque Chin rentre très tard d’une soirée, elle aimerait que Lon lui demande des explications au lieu de quoi il reste silencieux. Le mal-être des personnages nappe le film d’une tristesse qui déteint sur tous les personnages.\r\n\r\nLe réalisateur ne choisit pas la facilité avec une mise en scène tout en langueur pour nous entraîner vers un spleen entêtant. Il est grandement aidé par son personnage féminin très complexe, campé avec subtilité par Tsai Chin. Quant au personnage de Lon, Hou Hsiao Hsien (scénariste du film avec Yang) le rend aussi beau qu’émouvant.\r\n\r\nTapei Story est un film qui demande un peu de patience au spectateur mais finit par l’embarquer vers un plaisir indéniable.\r\n\r\nSalih B.\r\n\r\nPS : Il n’est pas trop tard pour aller voir Loving de Jeff Nichols, sorti depuis le 15 février. Le film avant d’être une histoire vraie sur le racisme est d’abord un grand film d’amour. Cette relation entre un blanc et une noire est servie par une mise en scène digne du cinéma américain des années 70. Les deux rôles principaux sont portés par de superbes comédiens que sont Joel Edgerton et Ruth Negga. Cette dernière joue de ses regards comme peu d’acteurs savent le faire.', 'En mai 2000, le festival de Cannes décerne le prix de la mise en scène à Yi Yi d’Edward Yang. Le grand public découvre alors la nouvelle vague taiwanaise tandis que les cinéphiles connaissent déjà le talent de ce cinéaste à travers notamment le magnifique A brighter summer day. La sortie, pour la première fois, de Tapei Story (1985) confirme qu’Edward Yang a produit une œuvre remarquable avant de mourir prématurément à 59 ans.', 'tapei-story.png', 'Edward Yang;', '2', 'Reda', 2, 2, 2, 'tapei-story.png', NULL),
(22, '2017-06-19 11:26:13', '2017-06-19 11:26:13', 'Paris in Paris', 'Elliott Erwitt, photographe américain né en 1928 à Paris de parents russes, est connu pour ses clichés teintés d’esprit et d’humour satirique. Il aime tout particulièrement photographier les enfants et les chiens. Sa photographie USA. North Carolina est devenue un symbole de la ségrégation aux Etats-Unis. Entre 1949 et 1992, il photographie un Paris léger et nonchalant, et capture des moments uniques comme par exemple les clichés très célèbres Jump in front of the Eiffel Tower (1989) et Dog jumping (1989).\r\n\r\nHerbert List est un photographe allemand né en 1903 à Hambourg. Entre Paris et lui, c’est une histoire d’amour mais aussi une histoire d’exil, son exil dans les années 30. Ce sont les photos de cette époque qui sont regroupées à l’agence Magnum au sein d’une exposition intitulée Paris Noir. Herbert List explore à travers ses clichés l’atmosphère mystérieuse et magique de certains lieux de la ville et transforme les symboles de Paris en compositions sublimes et poétiques dénuées de présence humaine.', 'Magnum, la mythique agence de photographes et de photojournalistes ouvre rarement ses portes au public. Jusqu’au 7 avril, elle expose deux grands noms de la photographie, Elliott Erwitt et Herbert List, à travers une exposition, Paris in Paris, qui livre deux visions complémentaires de la ville de Paris.', 'paris-in-paris.png', 'Paris;Elliott Erwitt', '2', 'Reda', 2, 2, 2, 'paris-in-paris.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `nom_categorie` varchar(155) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `created`, `updated`, `nom_categorie`) VALUES
(1, '2017-06-14 14:56:23', '2017-06-14 14:56:23', 'Littérature'),
(2, '2017-06-14 14:56:23', '2017-06-14 14:56:23', 'Cinéma'),
(3, '2017-06-15 13:26:56', '2017-06-15 13:26:56', 'Scène'),
(4, '2017-06-15 13:26:56', '2017-06-15 13:26:56', 'Arts Plastiques'),
(5, '2017-06-15 13:27:20', '2017-06-15 13:27:20', 'Photographie'),
(6, '2017-06-15 13:27:20', '2017-06-15 13:27:20', 'Musique');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `page` varchar(255) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `lien` varchar(255) NOT NULL,
  `event_expiration` tinyint(1) DEFAULT NULL,
  `etat` tinyint(1) NOT NULL,
  `editeur_event` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `created`, `updated`, `titre`, `date_debut`, `date_fin`, `lieu`, `lien`, `event_expiration`, `etat`, `editeur_event`) VALUES
(2, '2017-06-19 12:20:33', '2017-06-19 12:20:33', 'Eclosion', '2017-08-16', '2017-11-14', 'Espace Commines, 17 rue Commines, Paris 75003 ', 'https://www.hatsh.com/', 1, 2, 'Reda'),
(3, '2017-06-19 12:23:29', '2017-06-19 12:23:29', 'Empreintes', '2017-06-22', NULL, 'Le Vestibule, 40 rue Sedaine, 75011 Paris, métro Voltaire, jusqu’au 30 avril 2017', 'http://www.isabelle-dendrobate.com/fr/accueil.html', 1, 2, 'Reda'),
(4, '2017-06-19 12:24:50', '2017-06-19 12:24:50', 'Exposition de street-art', '2017-07-20', NULL, '6 rue Saint Augustin Paris', '', 2, 1, 'Reda'),
(5, '2017-06-19 12:26:07', '2017-06-19 12:26:07', 'Arts Modernes', '2017-08-01', NULL, '120 rue Sedaine, 75011 Paris, métro Voltaire, jusqu’au 30 avril 2017', 'http://www.isabelle-dendrobate.com/fr/accueil.html', 2, 2, 'Reda'),
(6, '2017-06-19 12:26:59', '2017-06-19 12:26:59', 'Damian Marley', '2017-08-16', '2017-11-14', 'Le Trianon, 17 rue Commines, Paris 75003 ', 'https://www.hatsh.com/', 1, 2, 'Reda'),
(7, '2017-06-19 12:27:42', '2017-06-19 12:27:42', 'Défilé Dior', '2017-07-29', NULL, '12 boulevard des Chams Elysées, Paris', '', 2, 2, 'Reda'),
(8, '2017-06-19 12:28:57', '2017-06-19 12:28:57', 'Muse', '2017-07-27', NULL, 'Stade de France', 'http://www.stadefrance.com/fr', 2, 2, 'Reda');

-- --------------------------------------------------------

--
-- Structure de la table `form_commande`
--

CREATE TABLE `form_commande` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `nom` varchar(155) NOT NULL,
  `prenom` varchar(155) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `nom_ouvrage` varchar(255) NOT NULL,
  `format` int(11) DEFAULT NULL,
  `nb_exemplaire` int(11) NOT NULL,
  `commentaires` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `form_partenaire`
--

CREATE TABLE `form_partenaire` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `nom` varchar(155) NOT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `commentaires` text,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form_partenaire`
--

INSERT INTO `form_partenaire` (`id`, `created`, `nom`, `fonction`, `commentaires`, `email`) VALUES
(5, '2017-06-15 17:04:25', 'charles', 'litterature', '', 'charlotte@teching.com'),
(7, '2017-06-17 14:15:48', 'khhkhjk', 'litterature;musique;', '', 'ghfghfghfhg');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ouvrages`
--

CREATE TABLE `ouvrages` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `auteur` varchar(155) NOT NULL,
  `accroche` text NOT NULL,
  `contenu` text NOT NULL,
  `prix_broche` varchar(155) DEFAULT NULL,
  `prix_epub` varchar(155) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `couverture` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `slider` tinyint(1) DEFAULT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `editeur_ouvrage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ouvrages`
--

INSERT INTO `ouvrages` (`id`, `created`, `updated`, `titre`, `date`, `auteur`, `accroche`, `contenu`, `prix_broche`, `prix_epub`, `lien`, `couverture`, `etat`, `slider`, `image_slider`, `editeur_ouvrage`) VALUES
(5, '2017-06-19 12:11:54', '2017-06-19 12:11:54', 'Illusion(s)', '2015-11-15', 'Oeuvre collective', 'Textes inspirés de photographies de Mark Drew et sélectionnés dans le cadre du premier concours de nouvelles de la Revue Bancal.', '« Il songe à tout le whisky qu’il a descendu quand elle l’a quitté. A s’en mélanger non-stop les crayons. Il a dû en garder des séquelles, vu les idées bizarres qui lui traversent maintenant l’esprit. Il ricane. A l’époque, il n’avait les moyens de s’offrir que du mauvais blended. Sans doute en a-t-il également chopé une cirrhose du foie et des trous dans les intestins. Il retrouve son sérieux et soupire. Si elle n’était pas revenue, il aurait continué de picoler. Il hausse les épaules. Ou non, il n’en sait rien. »', '9,50 €', '5,50 €', NULL, 'illusions.png', 2, NULL, NULL, 'Reda'),
(6, '2017-06-19 12:13:34', '2017-06-19 12:13:34', 'Harry Potter', '2014-10-10', 'J.K Rolling', 'Harry Potter est une série littéraire de fantasy écrite par l\'auteure britannique J. K. Rowling, dont la suite romanesque s\'est achevée en 2007.', '« Il songe à tout le whisky qu’il a descendu quand elle l’a quitté. A s’en mélanger non-stop les crayons. Il a dû en garder des séquelles, vu les idées bizarres qui lui traversent maintenant l’esprit. Il ricane. A l’époque, il n’avait les moyens de s’offrir que du mauvais blended. Sans doute en a-t-il également chopé une cirrhose du foie et des trous dans les intestins. Il retrouve son sérieux et soupire. Si elle n’était pas revenue, il aurait continué de picoler. Il hausse les épaules. Ou non, il n’en sait rien. »', '13,50 €', '8,50 €', NULL, 'harry-potter.png', 1, NULL, NULL, 'Reda'),
(7, '2017-06-19 12:17:31', '2017-06-19 12:17:31', 'Les guerriers de l\'ombre', '2017-06-02', 'Jean-Christophe Notin', 'La DGSE est l\'objet de tous les fantasmes. On imagine les « espions » tels les héros de cinéma, aussi séducteurs que tueurs, ou au contraire, uniquement capables de fiascos comme celui du Rainbow Warrior en 1984. « Les guerriers de l\'ombre » donnent la parole à ceux d\'entre eux qui courent le plus de dangers.', ' La DGSE est l\'objet de tous les fantasmes. On imagine les « espions » tels les héros de cinéma, aussi séducteurs que tueurs, ou au contraire, uniquement capables de fiascos comme celui du Rainbow Warrior en 1984. « Les guerriers de l\'ombre » donnent la parole à ceux d\'entre eux qui courent le plus de dangers. Pour l\'essentiel, il s\'agit de clandestins, c\'est à dire de Français autorisés par l\'Etat à vivre sous une fausse identité. En raison de la relation de confiance établie avec eux par Jean-Christophe Notin, auteur de plusieurs livres sur le sujet, ils ont accepté pour la première fois de briser le silence devant normalement entourer leurs activités. C\'est une première en France, mais aussi c\'est aussi une première dans le monde car la DGSE est l\'un des seuls services de renseignement à recourir de manière intensive à la clandestinité. Les attentats du 11 septembre, les guerres de contre-insurrection (Afghanistan, Irak) ou de contre-terrorisme (Mali, Syrie) ont en effet démontré les limites du renseignement technique : tout djihadiste d\'importance sait bien qu\'il lui faut éviter d\'utiliser son téléphone ou son PC... Puisqu\'ils s\'expriment pour la première fois, « les guerriers de l\'ombre » laisse la parole à ces hommes et ces femmes, engagés souvent seuls dans les pires endroits de la planète. Il s\'agit donc d\'un livre d\'entretiens, menés par l\'auteur dans le cadre du documentaire réalisé par Frédéric Schoendoerffer et que diffusera Canal + en juin. S\'en dégage un portrait intime où les fantasmes sont confrontés à la réalité, les motivations aux risques encourus, les réussites professionnelles aux échecs sentimentaux.\r\n\r\nJean-Christophe Notin est spécialiste des conflits français contemporains. Il est l\'auteur de nombreux ouvrages sur le sujet, notamment La Guerre de l\'ombre des Français en Afghanistan (2011), La Vérité sur notre guerre en Lybie (2012), et La Guerre de la France au Mali, Tallandier (2014). Il est aussi l\'auteur de nombreux ouvrages sur la Seconde Guerre mondiale (La Campagne d\'Italie, 2002 ; Leclerc, 2005;Maréchal Juin 2015) Il a reçu le prix essai de L\'Express 2011 et le prix Albert Thibaudet en 2012. ', '12,50 €', '7,50 €', NULL, 'guerriers-ombre.png', 2, NULL, NULL, 'Reda');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `name` varchar(155) NOT NULL,
  `accroche` text NOT NULL,
  `contenus_bio` text,
  `contenus_actu` text,
  `contenus_projet` text,
  `lien_facebook` varchar(255) DEFAULT NULL,
  `lien_twitter` varchar(255) DEFAULT NULL,
  `lien_instagram` varchar(255) DEFAULT NULL,
  `lien_youtube` varchar(255) DEFAULT NULL,
  `lien_soundcloud` varchar(255) DEFAULT NULL,
  `lien_email` varchar(255) DEFAULT NULL,
  `metier` varchar(50) DEFAULT NULL,
  `image_avant` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `slider` tinyint(1) NOT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `editeur_partenaire` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `created`, `updated`, `name`, `accroche`, `contenus_bio`, `contenus_actu`, `contenus_projet`, `lien_facebook`, `lien_twitter`, `lien_instagram`, `lien_youtube`, `lien_soundcloud`, `lien_email`, `metier`, `image_avant`, `etat`, `slider`, `image_slider`, `editeur_partenaire`) VALUES
(5, '2017-06-19 11:35:43', '2017-06-19 11:35:43', 'Hatsh', 'HATSH est une jeune start-up culturelle de mécénat participatif. Née en octobre 2016, elle permet aux particuliers et aux entreprises de découvrir, d’accompagner et de soutenir financièrement de jeunes artistes prometteurs. Du 12 au 14 mai, l’événement « Eclosion », auquel la revue Bancal s’est associée, sera l’occasion de rencontrer les artistes couvés par HATSH et les amateurs d’art qui participent à leur éclosion.', 'L’équipe de HATSH déniche et sélectionne de jeunes artistes dans diverses disciplines : peinture, sculpture, dessin, photo, gravure. En le rendant accessible aux particuliers, elle bouscule et repense le monde du mécénat. Elue start-up à suivre en 2017 par Maddyness, elle dynamise le milieu traditionnel de l’art avec sa plateforme digitale www.hatsh.com qui offre la possibilité de soutenir un artiste par crowfunding ou d’acheter des œuvres en ligne.', 'Pendant deux jours, plus de 100 œuvres seront exposées à l’espace Commines dans le 3e arrondissement de Paris. L’événement qui prévoit également des conférences et des performances artistiques a été pensé comme un moment de rencontre avec les 35 jeunes talents représentés par la couveuse.', 'Voici un aperçu de leurs evenements :', 'https://www.facebook.com/HATSHyoungtalents/', 'https://twitter.com/HATSH_', 'https://www.instagram.com/hatsh_youngtalents/', NULL, NULL, NULL, 'Couveuse de talents', 'hatsh.png', 2, 1, 'hatsh-slider.png', 'Reda'),
(6, '2017-06-19 11:44:21', '2017-06-19 11:44:21', 'Margaux Eskenazi', 'La metteuse en scène Margaux Eskenazi nous parle de sa dernière création, Nous sommes de ceux qui disent non à l’ombre, une plongée historique, politique poétique et musicale dans la pensée de la négritude, du Tout-Monde et de la créolité.', 'Marie : Tu veux bien revenir sur la genèse du projet Nous sommes de ceux qui disent non à l’ombre ?\r\n\r\nMargaux : J’ai découvert les écritures d’outre-mer, des auteurs comme Césaire et Damas notamment, à la Chapelle du verbe incarné où j’ai travaillé pendant  longtemps. C’était un nouveau monde pour moi, une nouvelle littérature m’est apparue. Je travaillais avec des compagnies d’Outre-mer qui avaient des réalités spécifiques. Très rapidement ça m’a ouvert à la fois  un champ politique et littéraire et à un imaginaire. Ça a favorisé une sorte de conscientisation de ce que pouvait être un plateau de théâtre occupé par une troupe d’acteurs noirs et comment notre imaginaire, notre inconscient, s’était forgé petit à petit à voir sur un plateau théâtre uniquement ou majoritairement des acteurs blancs. Ensuite j’ai intégré le conservatoire d’art national à Paris en mise en scène. J’y ai travaillé des textes classiques, j’ai mis en scène des pièces de Victor Hugo, Heiner Muller et de Shakespeare. Lorsqu’il a fallu que je travaille une sortie de section, j’ai eu envie, dans cet endroit – là, qui est quand même l’apogée de l’institutionnalisation de la formation théâtrale à la française, de faire quelque chose qui ne soit pas un classique, en plus ça avait lieu dans la salle Jouvet du conservatoire qui est une salle tout en bois où sont passés tous les acteurs de l’élite française. J’ai donc choisi de monter un spectacle sur quelqu’un qui n’est pas théâtral donc sur un personnage et un mouvement de la pensée, en l’occurrence Aimé Césaire et la négritude avec des acteurs qui n’en avaient pour la plupart jamais entendu parler. J’ai commencé à travailler sur ce projet comme cela. Et très vite, j’ai compris l’importance du théâtre comme acte politique. Je ne suis pas une militante politique mais je m’exprime théâtralement. Mon geste, il est à cet endroit-là.\r\n\r\nMarie : Et quand tu montais des pièces classiques, c’était aussi dans une  posture politique ?\r\n\r\nMargaux : Oui parce que ce sont au fond toujours des textes, Hernani de Victor Hugo et Richard III de Shakespeare, qui parlent du politique, de la question du pouvoir, de l’accès au pouvoir. Hugo révolutionne le théâtre en inventant le théâtre romantique, il révolutionne un genre et met sur scène des hommes politique, ici Charles Quint. Pour Richard III c’est exactement pareil avec le théâtre Élisabéthain.\r\n\r\nMarie : Donc pour toi, théâtre et politique sont nécessairement liés ?\r\n\r\nMargaux : oui intiment lié. Théâtre et politique sont liés à trois endroits dans ma démarche :\r\n\r\n-dans le sujet du spectacle.\r\n– dans le développement de la compagnie : la compagnie est implantée dans le 93 depuis sa création, il y a 10 ans. L’année prochaine on sera artiste résident de la ferme Godier qui est un lieu super à Villepinte, des Lilas et du Blanc-Mesnil où on monte une école du spectateur avec des Blanc-Mesnilois.  Je travaillerai toute l’année avec une classe d’accueil à Villepinte. Pour Richard III, on avait ouvert les répétitions à tout un groupe de spectateurs en réinsertion sociale et professionnelle. C’est un spectacle qui naît des gens, qui naît avec les gens. Pour Césaire j’ai avais collaboré avec Gaël Faye, chanteur et écrivain (prix Goncourt des étudiants pour son livre Petit pays) – dans le cadre du dispositif Art et Culture au Collège du 93. On a avait travaillé sur des extraits du Cahier d’un retour au Pays natal dans une classe de 3ème du Blanc-Mesnil où plus de 80 % d’entre eux parlaient une langue étrangère ou maternelle ou apprise familialement, ils comprenaient ce texte et ses enjeux intimement.\r\n\r\n– Et enfin  le processus est politique dans la façon d’inventer une manière de travailler avec les acteurs et de les impliquer. La première semaine de répétition d’un spectacle je propose toujours aux acteurs de choisir, parmi des thèmes en lien avec la pièce, un sujet en fonction de leur affinité et de nous le présenter sous forme d’exposé. Pour  Nous sommes de ceux qui disent non à l’ombre, je leur ai demandé de travailler sur la France des années des 30, l’histoire de la musique, du negro-spirituals jusqu’à l’arrivée du Hip-Hop, la biographie de Césaire, Senghor et Damas, la question de la départementalisation aux Antilles, etc. Donc tout le monde met dans une boîte à trésor commune le fruit de ses recherches et c’est ce matériau que nous allons ensuite piocher pour les impros. Je crois qu’il est important que tout le monde ait la même conscience de ce qu’on est en train de défendre. Une semaine avant de jouer la pièce à la Loge, j’ai également mis en place ce que j’appelle « le grenier ». Chaque acteur avait un grenier, un par jour, une petite vignette courte de 3 minutes pour dire pourquoi monter et dire ce spectacle aujourd’hui était important pour lui. Ce qui permettait de les impliquer intimement.\r\n\r\n    « Il faut chérir les langues, car avec toute langue qui disparaît s’efface à jamais une part d’imaginaire humain, une part de forêts, de savanes et de trottoirs fous« Césaire\r\n\r\nMarie : Que nous dit cette pièce, sur ton rapport à la langue ?\r\n\r\nMargaux : J’ai voulu monter ce spectacle parce que j’aime ces poétiques-là. Je ne voulais pas me limiter à la négritude, je voulais aussi travailler tout le mouvement de la pensée et donc aller jusqu’au Tout-Monde d’Édouard Glissant. Dans le Paris des années 30, pour parvenir à une égalité entre les noirs et les blancs, Césaire a choisi de parler français aussi bien que les blancs, voire mieux qu’eux. Il y a donc la langue française au centre du spectacle. Ensuite avec la décolonisation, des auteurs comme Glissant et surtout Chamoiseau, sont arrivés et on dit, merci à Césaire, ils revendiquaient une identité créole et ont donc mélé du créole au français, ce qui a valu à Chamoiseau le prix Goncourt pour Texaco. Glissant rappelle dans L’imaginaire des langues qu’avec le Tout-Monde, avec la mondialisation, la globalisation les identités se créolisent et qu’il faut chérir toutes les langues du monde parce que ce sont dans les langues que se créent les poétiques du monde et que l’imaginaire vient : « Il faut chérir les langues, car avec toute langue qui disparaît s’efface à jamais une part d’imaginaire humain, une part de forêts, de savanes et de trottoirs fous« . Il défend les langues du monde pour les identités rhizomes, multiples, il s’inscrit donc dans le prolongement de la pensée de Césaire. C’est en le  lisant que j’ai réalisé que ce qu’on appelle créole ce n’est pas uniquement le créole antillais. Le créole avec Glissant devient le créole du monde, devient toutes les langues de l’intime, toutes les langues qui n’ont pas de transcription écrite et qui se transmettent en famille de génération en génération, qui font que les identités sont métissées et que la langue française et bien plus large que le carcan dans laquelle on veut la mettre ou lui imposer. C’est le cas chez moi, on parle un créole, algérien-marocain, juif pied noir du côté de ma mère et judéo-espagnol du côté de mon père issu de l’immigration juive turque (ils parlent ladino, un vieux créole qui n’a pas de transcription écrite). Quand ma famille est arrivée en France, par souci d’intégration, ils n’ont pas transmis ces langues-là, ils ne les ont plus parlées que dans l’espace familial. Ma langue de l’intime a toujours été trouée et métissé par du judéo-espagnol et par de l’arabe. Mais les langues qui se parlent au sein de ma famille sont déjà des erzasts. Je me suis forgée une conviction inconsciemment qu’on pouvait être français et parler des langues ; Le français est la rencontre de toutes ces langues-là, de la même façon que pour moi le théâtre et le politique sont intimement liés.', 'Nous sommes de ceux qui disent non à l’ombre, 5 juin 20h30 dans le cadre du festival Onze Bouge (15 rue Merlin, 75011) et au Théâtre de l’Opprimé du 27 novembre au 3 décembre.\r\nForme en itinérance, Césaire-Variations,  au Grand Parquet, le 30 juin à 19h30.', 'Quelques images de ses pièces de théatre :', 'https://fr-fr.facebook.com/people/Margaux-Eskenazi/', NULL, NULL, NULL, NULL, NULL, 'metteuse en scène', 'margaux-eskenazi.png', 1, 2, NULL, 'Reda'),
(7, '2017-06-19 11:53:51', '2017-06-19 11:53:51', 'Matthias Claeys', 'A l’occasion de la conférence qui aura lieu le 6 février prochain à la Loge autour de l’ouvrage De Phèdre à Salope, nous avons rencontré son auteur, le metteur en scène Matthias Claeys. Nous l’avons questionné sur son travail, et sur son approche de la question de genre qu’il déploie, de l’écrit à l’incarné, du papier au plateau, pour mieux l’appréhender.', ' Pourrais-tu revenir sur la genèse de ton ouvrage intitulé De Phèdre à Salope ?\r\n\r\nMon dernier spectacle Phèdre/Salope, est un spectacle féministe qui traite des représentations du féminin à la fois dans le théâtre de répertoire, en particulier dans Phèdre de Racine, et dans le monde contemporain. Et comme je suis un homme, blanc de surcroît, je ne voulais pas me faire avoir par mon regard et mes déterminismes. J’ai décidé d’une part que la partie Salope serait écrite à partir du plateau, et d’autre part j’ai entrepris des recherches historiques pour déconstruire mes propres visions ou à l’inverse valider les hypothèses que je formulais, puisque j’avais déjà commencé ce travail de déconstruction dans un précédent spectacle. Cette masse de recherche a été  un  terreau pour la création artistique de Phèdre/Salope. Le spectacle pose des questions mais ne cherche pas à y répondre, alors je me suis dit que c’était dommage de rien faire de plus de ces recherches. J’ai donc ingéré  tout ce travail historique et je me suis associé avec Anne Brossard, étudiante en philosophie, qui travaille sur les questions de genre et a apporté une contribution sur tout ce qui est contemporain et philosophie.\r\n\r\nL’écriture du livre a-t-elle été réalisée de façon concomitante au travail de mise en scène de Phèdre/Salope ?\r\n\r\nLe travail de recherche a été fait en amont, c’est à dire que j’ai commencé la recherche il y a deux ans alors que les répétitions ont commencé il y a un an. On a commencé à écrire le livre cet été.\r\n\r\nDans ton livre tu as donc pu expliciter des choses que tu ne pouvais pas mettre dans ton spectacle ?\r\n\r\nExactement. Le livre m’a permis d’étayer la réflexion et de ne pas me limiter à ouvrir des interrogations car au théâtre, j’aime bien l’idée que ce soit ouvert et qu’on laisse les gens décider, qu’on ne leur donne pas un cours. Ce livre, c’est aussi une manière de m’inscrire dans les mouvements qui nous invitent à revoir la façon dont on nous a appris la place des femmes dans l’histoire. C’est une façon de mettre en garde, de dire : face aux déterminismes, à l’essentialisme, au naturalisme, on peut déconstruire et ça donne ça. Ce que l’on n’a pas le temps de faire dans un spectacle. Je ne crois pas que ce soit d’ailleurs le lieu pour le faire, en revanche c’est possible dans une conférence. Dans un spectacle en tous cas dans les miens, j’aime qu’il y ait une ouverture très, très large aux interprétations.\r\n\r\nCe livre a-t-il été pensé comme un complément à la pièce ? Tu conseillerais à ton public de le lire avant de voir la pièce ?\r\n\r\n Il n’est pas nécessaire de le lire avant la pièce, ni après d’ailleurs. Je conseille de le lire parce que je suis content de ce qu’on a fait.  C’est une espèce de compilation de nos lectures, d’auteurs et d’autrices qu’on trouve particulièrement intéressants. Je pense que c’est bien de le lire mais ça peut être vraiment indépendant du spectacle.\r\n\r\nL’ouvrage permet-il au spectateur de comprendre ton intention théâtrale ? \r\n\r\nOui, surtout parce que j’ai regroupé les thèmes selon des scènes qui sont dans le spectacle, alors ça donne des clés de lecture. Quand je parle de clés de lecture, je parle bien de théorie, pas de ressenti. Au théâtre, c’est à mon avis par le ressenti que les questions arrivent jusqu’aux spectateurs et spectatrices, qu’elles font leur nid. Donc qu’importe qu’on n’ait pas les théories de Butler ou de Foucault en tête, ça n’est pas nécessaire. Après, effectivement, le livre permet de rattacher certaines scènes à des thématiques historiques ou philosophiques qu’on ne connaît  pas nécessairement, et permet aussi d’envisager comment depuis la matière théorique on en est arrivé à cette scène en particulier. Par exemple j’ai relié la scène intitulée « la Chambre », qui parle de sexualité et d’apprentissage de la sexualité, à la fois aux Salonnières, au rapport des femmes à l’éducation et à la sexualité au 17e, et à ce que dit Foucault dans Histoire de la sexualité. C’est très référencé mais quand on voit la scène, on voit juste deux nanas qui parlent de sexualité. On n’est pas obligé de de connaître tout le background.\r\n\r\nQu’est ce qui t’a plu le plus à explorer : le travail d’écriture ou de mise en scène ?\r\n\r\nLe travail de mise en scène (et d’écriture théâtrale) est un travail dans lequel j’ai acquis un certain confort, qui m’est aisé et plaisant. Ça ne vient pas tout seul, ça demande énormément d’efforts, mais je n’y interroge pas ma légitimité, ce qui enlève un certain poids. Donc c’est extrêmement plaisant, aussi (et surtout) parce que l’équipe dont je suis entouré est très enthousiaste, en confiance, volontaire. On arrive à faire des choses qui touchent à l’intime, à explorer des thèmes difficiles, à trouver de l’humour dans des endroits pas évidents, c’est très enthousiasmant. J’aime beaucoup le groupe formé autour de ce spectacle. Le travail d’écriture plus théorique, comme dans le livre, ou de parole théorique, comme pour la conférence, là c’est une autre paire de manches, parce que je me prends la question de la légitimité de plein fouet. Je me la prends parce que je me la pose, personne n’est venu me dire quoique ce soit sur mon droit à faire ça. Mais là, je fais face à mes propres déterminismes : je n’ai pas fait d’études universitaires, je n’ai pas de diplômes, et quand il s’agit d’affirmer des recherches et une pensée, d’un seul coup, je fais moins le malin.\r\n\r\nLa création du spectacle et du livre ont en tout cas été une période dense et bouleversante (au niveau des repères, des définitions de soi…). Je n’arrive pas à savoir en fait, ça fait très longtemps que je m’intéresse à la problématique de genre et je n’arrive plus à savoir comment j’ai eu l’idée de créer  Phèdre/ Salope. Je sais que les recherches ont été faites pour appuyer un discours. C’est un sujet un peu dangereux et je voulais être prêt à répondre aux interrogations des gens face au projet.\r\n\r\nLa pièce Phèdre /Salope se présente-elle comme dans ton livre,  comme une  fresque historique ? D’ailleurs, pourquoi ce texte de Phèdre ?  Parce qu’il est ancré dans une période historique ? \r\n\r\nL’idée de départ  c’était de monter Phèdre parce que j’y entends une tragédie de la transgression des genres. En  fait, Phèdre apparaît monstrueuse parce qu’elle aime son beau-fils or on oublie ce qu’était la réalité du mariage à cette époque (un contrat, un arrangement entre deux familles, deux clans). De plus, on peut supposer qu’elle est  mariée à un homme beaucoup plus âgé qu’elle et son beau-fils a à peu près le même âge qu’elle. Pour moi elle est victime d’un système oppressif et la tragédie se situe dans le système. Phèdre transgresse les interdits qui sont faits à son genre, tout comme Hippolyte se situe dans un endroit très particulier par rapport au masculin.  Cependant monter Phèdre de cette façon aurait nécessité des sous-titres, disant « regardez sur ce vers là il est en train de dire ça », de faire du commentaire de texte. Je suis donc parti sur l’idée d’ajouter Salope. Pour Phèdre, j’ai sélectionné les trois scènes d’aveu : l’aveu à Oenone, à Hippolyte et à Thésée. Ce n’est pas super original mais c’était les trois points forts et entre temps on réexplique rapidement où en est l’intrigue.\r\n\r\nC’est ce texte-là qui constitue Phèdre/Salope ?\r\n\r\nNon, ça c’est pour Phèdre et après il y a la partie Salope, qui  là pour le coup est intégralement écrite par moi (à partir du travail au plateau) et très ancrée dans le contemporain, très naturaliste sur des scènes assez courtes qui fonctionnent comme des nouvelles (chaque scène développe une fiction différente), soit de confrontation de femmes ou de couples avec le système judiciaire ou de confrontation de représentations de genre à l’intérieur de la maison. Il y a aussi des archaïsmes, par exemple on a une scène où une jeune femme se retrouve dans un endroit où elle ne comprend pas les langues parlées autour d’elle, avec des gens qui lui demandent si elle est vierge, c’est une forme d’archaïsme, une représentation d’un lieu commun sur comment ça a pu être avant, ou comment ça peut être ailleurs, mais la plupart des scènes, sont des scènes très contemporaines sur des sujets très actuels.\r\n\r\nLes scènes de Phèdre et de Salope se mêlent-elles ?\r\n\r\nElles sont les unes à côté des autres, comme un montage cinématographique. Au début c’est Phèdre en trois scènes et des poussières pendant vingt minutes et après pendant l’heure dix qui suit ce n’est que Salope.\r\n\r\nSalope est aussi un spectacle à part entière ? \r\n\r\nOn pourrait en effet le jouer tout seul, sans Phèdre. Mais pour l’instant je trouve qu’elles ont vraiment une histoire en commun. C’est, à mon sens, intéressant de voir les acteurs et actrices passer de l’alexandrin au contemporain, ça raconte quelque chose sur le répertoire sur ce qui reste, après on verra ce que les gens en diront. Pour moi ça ne naît pas de nulle part, ça parle aussi d’un constat d’inertie de certaines de nos représentations. Le théâtre contemporain ne naît pas hors répertoire, tout est référencé, on est issu d’une histoire, d’une histoire littéraire, etc.\r\n\r\nComme la construction du genre ?\r\n\r\nExactement ! Et c’est la même chose pour nos représentations contemporaines en matière de de sexualités, de classes, de couleurs… et il y a un parallèle entre la construction historique de nos représentations genrées et le répertoire : les deux viennent en partie de l’annulation dans  les mémoires de beaucoup de femmes, de femmes qui ont exercé un pouvoir politique par exemple, pour l’histoire, et de pièce écrites par des femmes, pour le répertoire.\r\n\r\nPour tous tes spectacles tu fais des recherches aussi poussées ?\r\n\r\nNon pas aussi poussées. Je fais des recherches. Après, je suis quelqu’un de curieux par nature du coup quand il y a un sujet qui m’intéresse, j’ai tendance à plonger dans cinq, six bouquins juste pour moi. Je fais des recherches un peu tout le temps.\r\n\r\nTu as amorcé ton questionnement sur le genre avec Awake, tu le prolonges avec Phèdre/ Salope, tu penses poursuivre le questionnement dans une autre pièce ?\r\n\r\nJe pense que je suis à un endroit de ma vie où ce questionnement est inhérent à moi. Je ne  sais pas encore ce que je vais faire après Phèdre/Salope. Je sais juste que je n’attaquerai pas le sujet du genre aussi frontalement que je l’ai fait dans Awake et dans Phèdre/Salope mais je sais qu’il sera là. En tout cas c’est un questionnement qui m’a beaucoup travaillé et qui me travaille encore beaucoup et duquel je retire une attention particulièrement à la façon dont je mets en scène le genre sur le plateau, ce que je ne faisais pas particulièrement avant.\r\n\r\nLa soirée du 6 février à la loge ce sera une conférence?\r\n\r\nJ’aimerais une forme à la fois conférence et conversation. Après il faut réussir à cadrer le débat. Je pense que ça va ressembler aux Réponses qui claquent. Avec une première partie de présentation du travail avec Anne, suivi d’un échange avec le public et puis les photographies de Kévin Dez qui illustrent le livre  seront exposées.\r\n\r\nPropos recueillis par Marie et Céline.', 'De Phèdre à Salope\r\nLundi 6 février – 20h-22h à La loge\r\nEnquête en vue de la création du spectacle Phèdre/Salope\r\nEnquête dirigée par Matthias Claeys, avec la collaboration d’Anne Brosselard, et les photographies de Chvës \r\n\r\nPhédre/Salope Spectacle de Matthias Claeys\r\nDu  17-17 mars 21h à La loge\r\nTextes : Phèdre (Jean Racine), Salope (Matthias Claeys)\r\nAvec Odila Caminos, Marie Camlong, Marie-Julie Chalu, Kévin Dez, Romain Pichard, Françoise Roche et Marion Romagnan\r\nCréation lumière : Vera Martins\r\nCréation sonore : Victor Bendinelli\r\nCollaboration artistique : Anne Brosselard', 'Ses dernieres réalisations :', NULL, 'https://twitter.com/matthiasclaeys', NULL, NULL, NULL, NULL, 'street-artist', 'matthias-claeys.png', 2, 2, NULL, 'Reda'),
(8, '2017-06-19 11:53:51', '2017-06-19 11:53:51', 'Bernard Dupont', 'A l’occasion de la conférence qui aura lieu le 6 février prochain à la Loge autour de l’ouvrage De Phèdre à Salope, nous avons rencontré son auteur, le metteur en scène Matthias Claeys. Nous l’avons questionné sur son travail, et sur son approche de la question de genre qu’il déploie, de l’écrit à l’incarné, du papier au plateau, pour mieux l’appréhender.', ' Pourrais-tu revenir sur la genèse de ton ouvrage intitulé De Phèdre à Salope ?\r\n\r\nMon dernier spectacle Phèdre/Salope, est un spectacle féministe qui traite des représentations du féminin à la fois dans le théâtre de répertoire, en particulier dans Phèdre de Racine, et dans le monde contemporain. Et comme je suis un homme, blanc de surcroît, je ne voulais pas me faire avoir par mon regard et mes déterminismes. J’ai décidé d’une part que la partie Salope serait écrite à partir du plateau, et d’autre part j’ai entrepris des recherches historiques pour déconstruire mes propres visions ou à l’inverse valider les hypothèses que je formulais, puisque j’avais déjà commencé ce travail de déconstruction dans un précédent spectacle. Cette masse de recherche a été  un  terreau pour la création artistique de Phèdre/Salope. Le spectacle pose des questions mais ne cherche pas à y répondre, alors je me suis dit que c’était dommage de rien faire de plus de ces recherches. J’ai donc ingéré  tout ce travail historique et je me suis associé avec Anne Brossard, étudiante en philosophie, qui travaille sur les questions de genre et a apporté une contribution sur tout ce qui est contemporain et philosophie.\r\n\r\nL’écriture du livre a-t-elle été réalisée de façon concomitante au travail de mise en scène de Phèdre/Salope ?\r\n\r\nLe travail de recherche a été fait en amont, c’est à dire que j’ai commencé la recherche il y a deux ans alors que les répétitions ont commencé il y a un an. On a commencé à écrire le livre cet été.\r\n\r\nDans ton livre tu as donc pu expliciter des choses que tu ne pouvais pas mettre dans ton spectacle ?\r\n\r\nExactement. Le livre m’a permis d’étayer la réflexion et de ne pas me limiter à ouvrir des interrogations car au théâtre, j’aime bien l’idée que ce soit ouvert et qu’on laisse les gens décider, qu’on ne leur donne pas un cours. Ce livre, c’est aussi une manière de m’inscrire dans les mouvements qui nous invitent à revoir la façon dont on nous a appris la place des femmes dans l’histoire. C’est une façon de mettre en garde, de dire : face aux déterminismes, à l’essentialisme, au naturalisme, on peut déconstruire et ça donne ça. Ce que l’on n’a pas le temps de faire dans un spectacle. Je ne crois pas que ce soit d’ailleurs le lieu pour le faire, en revanche c’est possible dans une conférence. Dans un spectacle en tous cas dans les miens, j’aime qu’il y ait une ouverture très, très large aux interprétations.\r\n\r\nCe livre a-t-il été pensé comme un complément à la pièce ? Tu conseillerais à ton public de le lire avant de voir la pièce ?\r\n\r\n Il n’est pas nécessaire de le lire avant la pièce, ni après d’ailleurs. Je conseille de le lire parce que je suis content de ce qu’on a fait.  C’est une espèce de compilation de nos lectures, d’auteurs et d’autrices qu’on trouve particulièrement intéressants. Je pense que c’est bien de le lire mais ça peut être vraiment indépendant du spectacle.\r\n\r\nL’ouvrage permet-il au spectateur de comprendre ton intention théâtrale ? \r\n\r\nOui, surtout parce que j’ai regroupé les thèmes selon des scènes qui sont dans le spectacle, alors ça donne des clés de lecture. Quand je parle de clés de lecture, je parle bien de théorie, pas de ressenti. Au théâtre, c’est à mon avis par le ressenti que les questions arrivent jusqu’aux spectateurs et spectatrices, qu’elles font leur nid. Donc qu’importe qu’on n’ait pas les théories de Butler ou de Foucault en tête, ça n’est pas nécessaire. Après, effectivement, le livre permet de rattacher certaines scènes à des thématiques historiques ou philosophiques qu’on ne connaît  pas nécessairement, et permet aussi d’envisager comment depuis la matière théorique on en est arrivé à cette scène en particulier. Par exemple j’ai relié la scène intitulée « la Chambre », qui parle de sexualité et d’apprentissage de la sexualité, à la fois aux Salonnières, au rapport des femmes à l’éducation et à la sexualité au 17e, et à ce que dit Foucault dans Histoire de la sexualité. C’est très référencé mais quand on voit la scène, on voit juste deux nanas qui parlent de sexualité. On n’est pas obligé de de connaître tout le background.\r\n\r\nQu’est ce qui t’a plu le plus à explorer : le travail d’écriture ou de mise en scène ?\r\n\r\nLe travail de mise en scène (et d’écriture théâtrale) est un travail dans lequel j’ai acquis un certain confort, qui m’est aisé et plaisant. Ça ne vient pas tout seul, ça demande énormément d’efforts, mais je n’y interroge pas ma légitimité, ce qui enlève un certain poids. Donc c’est extrêmement plaisant, aussi (et surtout) parce que l’équipe dont je suis entouré est très enthousiaste, en confiance, volontaire. On arrive à faire des choses qui touchent à l’intime, à explorer des thèmes difficiles, à trouver de l’humour dans des endroits pas évidents, c’est très enthousiasmant. J’aime beaucoup le groupe formé autour de ce spectacle. Le travail d’écriture plus théorique, comme dans le livre, ou de parole théorique, comme pour la conférence, là c’est une autre paire de manches, parce que je me prends la question de la légitimité de plein fouet. Je me la prends parce que je me la pose, personne n’est venu me dire quoique ce soit sur mon droit à faire ça. Mais là, je fais face à mes propres déterminismes : je n’ai pas fait d’études universitaires, je n’ai pas de diplômes, et quand il s’agit d’affirmer des recherches et une pensée, d’un seul coup, je fais moins le malin.\r\n\r\nLa création du spectacle et du livre ont en tout cas été une période dense et bouleversante (au niveau des repères, des définitions de soi…). Je n’arrive pas à savoir en fait, ça fait très longtemps que je m’intéresse à la problématique de genre et je n’arrive plus à savoir comment j’ai eu l’idée de créer  Phèdre/ Salope. Je sais que les recherches ont été faites pour appuyer un discours. C’est un sujet un peu dangereux et je voulais être prêt à répondre aux interrogations des gens face au projet.\r\n\r\nLa pièce Phèdre /Salope se présente-elle comme dans ton livre,  comme une  fresque historique ? D’ailleurs, pourquoi ce texte de Phèdre ?  Parce qu’il est ancré dans une période historique ? \r\n\r\nL’idée de départ  c’était de monter Phèdre parce que j’y entends une tragédie de la transgression des genres. En  fait, Phèdre apparaît monstrueuse parce qu’elle aime son beau-fils or on oublie ce qu’était la réalité du mariage à cette époque (un contrat, un arrangement entre deux familles, deux clans). De plus, on peut supposer qu’elle est  mariée à un homme beaucoup plus âgé qu’elle et son beau-fils a à peu près le même âge qu’elle. Pour moi elle est victime d’un système oppressif et la tragédie se situe dans le système. Phèdre transgresse les interdits qui sont faits à son genre, tout comme Hippolyte se situe dans un endroit très particulier par rapport au masculin.  Cependant monter Phèdre de cette façon aurait nécessité des sous-titres, disant « regardez sur ce vers là il est en train de dire ça », de faire du commentaire de texte. Je suis donc parti sur l’idée d’ajouter Salope. Pour Phèdre, j’ai sélectionné les trois scènes d’aveu : l’aveu à Oenone, à Hippolyte et à Thésée. Ce n’est pas super original mais c’était les trois points forts et entre temps on réexplique rapidement où en est l’intrigue.\r\n\r\nC’est ce texte-là qui constitue Phèdre/Salope ?\r\n\r\nNon, ça c’est pour Phèdre et après il y a la partie Salope, qui  là pour le coup est intégralement écrite par moi (à partir du travail au plateau) et très ancrée dans le contemporain, très naturaliste sur des scènes assez courtes qui fonctionnent comme des nouvelles (chaque scène développe une fiction différente), soit de confrontation de femmes ou de couples avec le système judiciaire ou de confrontation de représentations de genre à l’intérieur de la maison. Il y a aussi des archaïsmes, par exemple on a une scène où une jeune femme se retrouve dans un endroit où elle ne comprend pas les langues parlées autour d’elle, avec des gens qui lui demandent si elle est vierge, c’est une forme d’archaïsme, une représentation d’un lieu commun sur comment ça a pu être avant, ou comment ça peut être ailleurs, mais la plupart des scènes, sont des scènes très contemporaines sur des sujets très actuels.\r\n\r\nLes scènes de Phèdre et de Salope se mêlent-elles ?\r\n\r\nElles sont les unes à côté des autres, comme un montage cinématographique. Au début c’est Phèdre en trois scènes et des poussières pendant vingt minutes et après pendant l’heure dix qui suit ce n’est que Salope.\r\n\r\nSalope est aussi un spectacle à part entière ? \r\n\r\nOn pourrait en effet le jouer tout seul, sans Phèdre. Mais pour l’instant je trouve qu’elles ont vraiment une histoire en commun. C’est, à mon sens, intéressant de voir les acteurs et actrices passer de l’alexandrin au contemporain, ça raconte quelque chose sur le répertoire sur ce qui reste, après on verra ce que les gens en diront. Pour moi ça ne naît pas de nulle part, ça parle aussi d’un constat d’inertie de certaines de nos représentations. Le théâtre contemporain ne naît pas hors répertoire, tout est référencé, on est issu d’une histoire, d’une histoire littéraire, etc.\r\n\r\nComme la construction du genre ?\r\n\r\nExactement ! Et c’est la même chose pour nos représentations contemporaines en matière de de sexualités, de classes, de couleurs… et il y a un parallèle entre la construction historique de nos représentations genrées et le répertoire : les deux viennent en partie de l’annulation dans  les mémoires de beaucoup de femmes, de femmes qui ont exercé un pouvoir politique par exemple, pour l’histoire, et de pièce écrites par des femmes, pour le répertoire.\r\n\r\nPour tous tes spectacles tu fais des recherches aussi poussées ?\r\n\r\nNon pas aussi poussées. Je fais des recherches. Après, je suis quelqu’un de curieux par nature du coup quand il y a un sujet qui m’intéresse, j’ai tendance à plonger dans cinq, six bouquins juste pour moi. Je fais des recherches un peu tout le temps.\r\n\r\nTu as amorcé ton questionnement sur le genre avec Awake, tu le prolonges avec Phèdre/ Salope, tu penses poursuivre le questionnement dans une autre pièce ?\r\n\r\nJe pense que je suis à un endroit de ma vie où ce questionnement est inhérent à moi. Je ne  sais pas encore ce que je vais faire après Phèdre/Salope. Je sais juste que je n’attaquerai pas le sujet du genre aussi frontalement que je l’ai fait dans Awake et dans Phèdre/Salope mais je sais qu’il sera là. En tout cas c’est un questionnement qui m’a beaucoup travaillé et qui me travaille encore beaucoup et duquel je retire une attention particulièrement à la façon dont je mets en scène le genre sur le plateau, ce que je ne faisais pas particulièrement avant.\r\n\r\nLa soirée du 6 février à la loge ce sera une conférence?\r\n\r\nJ’aimerais une forme à la fois conférence et conversation. Après il faut réussir à cadrer le débat. Je pense que ça va ressembler aux Réponses qui claquent. Avec une première partie de présentation du travail avec Anne, suivi d’un échange avec le public et puis les photographies de Kévin Dez qui illustrent le livre  seront exposées.\r\n\r\nPropos recueillis par Marie et Céline.', 'De Phèdre à Salope\r\nLundi 6 février – 20h-22h à La loge\r\nEnquête en vue de la création du spectacle Phèdre/Salope\r\nEnquête dirigée par Matthias Claeys, avec la collaboration d’Anne Brosselard, et les photographies de Chvës \r\n\r\nPhédre/Salope Spectacle de Matthias Claeys\r\nDu  17-17 mars 21h à La loge\r\nTextes : Phèdre (Jean Racine), Salope (Matthias Claeys)\r\nAvec Odila Caminos, Marie Camlong, Marie-Julie Chalu, Kévin Dez, Romain Pichard, Françoise Roche et Marion Romagnan\r\nCréation lumière : Vera Martins\r\nCréation sonore : Victor Bendinelli\r\nCollaboration artistique : Anne Brosselard', 'Ses dernieres réalisations :', NULL, 'https://twitter.com/matthiasclaeys', NULL, NULL, NULL, NULL, 'sculpteur', 'bernard-dupont.png', 2, 2, NULL, 'Reda'),
(9, '2017-06-19 11:44:21', '2017-06-19 11:44:21', 'Jeremy Damien', 'La metteuse en scène Margaux Eskenazi nous parle de sa dernière création, Nous sommes de ceux qui disent non à l’ombre, une plongée historique, politique poétique et musicale dans la pensée de la négritude, du Tout-Monde et de la créolité.', 'Marie : Tu veux bien revenir sur la genèse du projet Nous sommes de ceux qui disent non à l’ombre ?\r\n\r\nMargaux : J’ai découvert les écritures d’outre-mer, des auteurs comme Césaire et Damas notamment, à la Chapelle du verbe incarné où j’ai travaillé pendant  longtemps. C’était un nouveau monde pour moi, une nouvelle littérature m’est apparue. Je travaillais avec des compagnies d’Outre-mer qui avaient des réalités spécifiques. Très rapidement ça m’a ouvert à la fois  un champ politique et littéraire et à un imaginaire. Ça a favorisé une sorte de conscientisation de ce que pouvait être un plateau de théâtre occupé par une troupe d’acteurs noirs et comment notre imaginaire, notre inconscient, s’était forgé petit à petit à voir sur un plateau théâtre uniquement ou majoritairement des acteurs blancs. Ensuite j’ai intégré le conservatoire d’art national à Paris en mise en scène. J’y ai travaillé des textes classiques, j’ai mis en scène des pièces de Victor Hugo, Heiner Muller et de Shakespeare. Lorsqu’il a fallu que je travaille une sortie de section, j’ai eu envie, dans cet endroit – là, qui est quand même l’apogée de l’institutionnalisation de la formation théâtrale à la française, de faire quelque chose qui ne soit pas un classique, en plus ça avait lieu dans la salle Jouvet du conservatoire qui est une salle tout en bois où sont passés tous les acteurs de l’élite française. J’ai donc choisi de monter un spectacle sur quelqu’un qui n’est pas théâtral donc sur un personnage et un mouvement de la pensée, en l’occurrence Aimé Césaire et la négritude avec des acteurs qui n’en avaient pour la plupart jamais entendu parler. J’ai commencé à travailler sur ce projet comme cela. Et très vite, j’ai compris l’importance du théâtre comme acte politique. Je ne suis pas une militante politique mais je m’exprime théâtralement. Mon geste, il est à cet endroit-là.\r\n\r\nMarie : Et quand tu montais des pièces classiques, c’était aussi dans une  posture politique ?\r\n\r\nMargaux : Oui parce que ce sont au fond toujours des textes, Hernani de Victor Hugo et Richard III de Shakespeare, qui parlent du politique, de la question du pouvoir, de l’accès au pouvoir. Hugo révolutionne le théâtre en inventant le théâtre romantique, il révolutionne un genre et met sur scène des hommes politique, ici Charles Quint. Pour Richard III c’est exactement pareil avec le théâtre Élisabéthain.\r\n\r\nMarie : Donc pour toi, théâtre et politique sont nécessairement liés ?\r\n\r\nMargaux : oui intiment lié. Théâtre et politique sont liés à trois endroits dans ma démarche :\r\n\r\n-dans le sujet du spectacle.\r\n– dans le développement de la compagnie : la compagnie est implantée dans le 93 depuis sa création, il y a 10 ans. L’année prochaine on sera artiste résident de la ferme Godier qui est un lieu super à Villepinte, des Lilas et du Blanc-Mesnil où on monte une école du spectateur avec des Blanc-Mesnilois.  Je travaillerai toute l’année avec une classe d’accueil à Villepinte. Pour Richard III, on avait ouvert les répétitions à tout un groupe de spectateurs en réinsertion sociale et professionnelle. C’est un spectacle qui naît des gens, qui naît avec les gens. Pour Césaire j’ai avais collaboré avec Gaël Faye, chanteur et écrivain (prix Goncourt des étudiants pour son livre Petit pays) – dans le cadre du dispositif Art et Culture au Collège du 93. On a avait travaillé sur des extraits du Cahier d’un retour au Pays natal dans une classe de 3ème du Blanc-Mesnil où plus de 80 % d’entre eux parlaient une langue étrangère ou maternelle ou apprise familialement, ils comprenaient ce texte et ses enjeux intimement.\r\n\r\n– Et enfin  le processus est politique dans la façon d’inventer une manière de travailler avec les acteurs et de les impliquer. La première semaine de répétition d’un spectacle je propose toujours aux acteurs de choisir, parmi des thèmes en lien avec la pièce, un sujet en fonction de leur affinité et de nous le présenter sous forme d’exposé. Pour  Nous sommes de ceux qui disent non à l’ombre, je leur ai demandé de travailler sur la France des années des 30, l’histoire de la musique, du negro-spirituals jusqu’à l’arrivée du Hip-Hop, la biographie de Césaire, Senghor et Damas, la question de la départementalisation aux Antilles, etc. Donc tout le monde met dans une boîte à trésor commune le fruit de ses recherches et c’est ce matériau que nous allons ensuite piocher pour les impros. Je crois qu’il est important que tout le monde ait la même conscience de ce qu’on est en train de défendre. Une semaine avant de jouer la pièce à la Loge, j’ai également mis en place ce que j’appelle « le grenier ». Chaque acteur avait un grenier, un par jour, une petite vignette courte de 3 minutes pour dire pourquoi monter et dire ce spectacle aujourd’hui était important pour lui. Ce qui permettait de les impliquer intimement.\r\n\r\n    « Il faut chérir les langues, car avec toute langue qui disparaît s’efface à jamais une part d’imaginaire humain, une part de forêts, de savanes et de trottoirs fous« Césaire\r\n\r\nMarie : Que nous dit cette pièce, sur ton rapport à la langue ?\r\n\r\nMargaux : J’ai voulu monter ce spectacle parce que j’aime ces poétiques-là. Je ne voulais pas me limiter à la négritude, je voulais aussi travailler tout le mouvement de la pensée et donc aller jusqu’au Tout-Monde d’Édouard Glissant. Dans le Paris des années 30, pour parvenir à une égalité entre les noirs et les blancs, Césaire a choisi de parler français aussi bien que les blancs, voire mieux qu’eux. Il y a donc la langue française au centre du spectacle. Ensuite avec la décolonisation, des auteurs comme Glissant et surtout Chamoiseau, sont arrivés et on dit, merci à Césaire, ils revendiquaient une identité créole et ont donc mélé du créole au français, ce qui a valu à Chamoiseau le prix Goncourt pour Texaco. Glissant rappelle dans L’imaginaire des langues qu’avec le Tout-Monde, avec la mondialisation, la globalisation les identités se créolisent et qu’il faut chérir toutes les langues du monde parce que ce sont dans les langues que se créent les poétiques du monde et que l’imaginaire vient : « Il faut chérir les langues, car avec toute langue qui disparaît s’efface à jamais une part d’imaginaire humain, une part de forêts, de savanes et de trottoirs fous« . Il défend les langues du monde pour les identités rhizomes, multiples, il s’inscrit donc dans le prolongement de la pensée de Césaire. C’est en le  lisant que j’ai réalisé que ce qu’on appelle créole ce n’est pas uniquement le créole antillais. Le créole avec Glissant devient le créole du monde, devient toutes les langues de l’intime, toutes les langues qui n’ont pas de transcription écrite et qui se transmettent en famille de génération en génération, qui font que les identités sont métissées et que la langue française et bien plus large que le carcan dans laquelle on veut la mettre ou lui imposer. C’est le cas chez moi, on parle un créole, algérien-marocain, juif pied noir du côté de ma mère et judéo-espagnol du côté de mon père issu de l’immigration juive turque (ils parlent ladino, un vieux créole qui n’a pas de transcription écrite). Quand ma famille est arrivée en France, par souci d’intégration, ils n’ont pas transmis ces langues-là, ils ne les ont plus parlées que dans l’espace familial. Ma langue de l’intime a toujours été trouée et métissé par du judéo-espagnol et par de l’arabe. Mais les langues qui se parlent au sein de ma famille sont déjà des erzasts. Je me suis forgée une conviction inconsciemment qu’on pouvait être français et parler des langues ; Le français est la rencontre de toutes ces langues-là, de la même façon que pour moi le théâtre et le politique sont intimement liés.', 'Nous sommes de ceux qui disent non à l’ombre, 5 juin 20h30 dans le cadre du festival Onze Bouge (15 rue Merlin, 75011) et au Théâtre de l’Opprimé du 27 novembre au 3 décembre.\r\nForme en itinérance, Césaire-Variations,  au Grand Parquet, le 30 juin à 19h30.', 'Quelques images de ses pièces de théatre :', 'https://fr-fr.facebook.com/people/Margaux-Eskenazi/', NULL, NULL, NULL, NULL, NULL, 'metteuse en scène', 'jeremy-damien.png', 2, 2, NULL, 'Reda'),
(10, '2017-06-19 11:35:43', '2017-06-19 11:35:43', 'Noemie Richard', 'HATSH est une jeune start-up culturelle de mécénat participatif. Née en octobre 2016, elle permet aux particuliers et aux entreprises de découvrir, d’accompagner et de soutenir financièrement de jeunes artistes prometteurs. Du 12 au 14 mai, l’événement « Eclosion », auquel la revue Bancal s’est associée, sera l’occasion de rencontrer les artistes couvés par HATSH et les amateurs d’art qui participent à leur éclosion.', 'L’équipe de HATSH déniche et sélectionne de jeunes artistes dans diverses disciplines : peinture, sculpture, dessin, photo, gravure. En le rendant accessible aux particuliers, elle bouscule et repense le monde du mécénat. Elue start-up à suivre en 2017 par Maddyness, elle dynamise le milieu traditionnel de l’art avec sa plateforme digitale www.hatsh.com qui offre la possibilité de soutenir un artiste par crowfunding ou d’acheter des œuvres en ligne.', 'Pendant deux jours, plus de 100 œuvres seront exposées à l’espace Commines dans le 3e arrondissement de Paris. L’événement qui prévoit également des conférences et des performances artistiques a été pensé comme un moment de rencontre avec les 35 jeunes talents représentés par la couveuse.', 'Voici un aperçu de leurs evenements :', 'https://www.facebook.com/HATSHyoungtalents/', 'https://twitter.com/HATSH_', 'https://www.instagram.com/hatsh_youngtalents/', NULL, NULL, NULL, 'peintre', 'noemie-richard.png', 2, 2, NULL, 'Reda');

-- --------------------------------------------------------

--
-- Structure de la table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `network` varchar(150) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(155) NOT NULL,
  `prenom` varchar(155) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `created`, `updated`, `email`, `nom`, `prenom`, `password`) VALUES
(1, '2017-06-14 13:19:53', '2017-06-14 13:19:53', 'charlotte.palma@teching.com', 'palma', 'charlotte', '7178f308a79d1ee758520665ed55ec3e7c13672de1659b799333f9fc6e4c2377ae7d49dd1009493ff9a0a78229a88939a236a545e7f041699750df31b9080d57');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `form_commande`
--
ALTER TABLE `form_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `form_partenaire`
--
ALTER TABLE `form_partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `form_commande`
--
ALTER TABLE `form_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `form_partenaire`
--
ALTER TABLE `form_partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
