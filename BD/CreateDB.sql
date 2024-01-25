
CREATE DATABASE VOTE;
USE VOTE;




CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL UNIQUE,
    country VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    zipcode INT NOT NULL,
    token VARCHAR(255) NOT NULL
);



CREATE TABLE poll (
    poll_id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    user_id INT,
    start_date DATETIME,
    end_date DATETIME,
    poll_state ENUM('active','blocked','not_started','finished') ,
    question_visibility ENUM('public','private','hidden') ,
    results_visibility ENUM('public','private','hidden') ,
    poll_link varchar(255) DEFAULT NULL,
    path_image varchar(255) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);


CREATE TABLE poll_options (
    option_id INT AUTO_INCREMENT PRIMARY KEY,
    option_text TEXT NOT NULL,
    poll_id INT NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    path_image varchar(255) DEFAULT NULL,
    FOREIGN KEY (poll_id) REFERENCES poll(poll_id)
);



CREATE TABLE user_guest (
    guest_email VARCHAR(255) PRIMARY KEY
);



CREATE TABLE user_vote (
    vote_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    poll_id INT NOT null,
    option_id INT,
    user_type ENUM('registered', 'guest') NOT NULL,
    guest_email VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (poll_id) REFERENCES poll(poll_id),
    FOREIGN KEY (option_id) REFERENCES poll_options(option_id),
    FOREIGN KEY (guest_email) REFERENCES user_guest(guest_email)
);



CREATE TABLE invitation (
    invitation_id INT AUTO_INCREMENT PRIMARY KEY,
    poll_id INT NOT NULL,
    guest_email VARCHAR(255),
    sent_date DATETIME,
    FOREIGN KEY (guest_email) REFERENCES user_guest(guest_email),
    FOREIGN KEY (poll_id) REFERENCES poll(poll_id)
);



CREATE TABLE IF NOT EXISTS pais (
  id int(11) NOT NULL AUTO_INCREMENT,
  paisnombre varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=247 ;






INSERT INTO pais (id, paisnombre) VALUES
(1, 'Australia'),
(2, 'Austria'),
(3, 'Azerbaiyán'),
(4, 'Anguilla'),
(5, 'Argentina'),
(6, 'Armenia'),
(7, 'Bielorrusia'),
(8, 'Belice'),
(9, 'Bélgica'),
(10, 'Bermudas'),
(11, 'Bulgaria'),
(12, 'Brasil'),
(13, 'Reino Unido'),
(14, 'Hungría'),
(15, 'Vietnam'),
(16, 'Haiti'),
(17, 'Guadalupe'),
(18, 'Alemania'),
(19, 'Países Bajos, Holanda'),
(20, 'Grecia'),
(21, 'Georgia'),
(22, 'Dinamarca'),
(23, 'Egipto'),
(24, 'Israel'),
(25, 'India'),
(26, 'Irán'),
(27, 'Irlanda'),
(28, 'España'),
(29, 'Italia'),
(30, 'Kazajstán'),
(31, 'Camerún'),
(32, 'Canadá'),
(33, 'Chipre'),
(34, 'Kirguistán'),
(35, 'China'),
(36, 'Costa Rica'),
(37, 'Kuwait'),
(38, 'Letonia'),
(39, 'Libia'),
(40, 'Lituania'),
(41, 'Luxemburgo'),
(42, 'México'),
(43, 'Moldavia'),
(44, 'Mónaco'),
(45, 'Nueva Zelanda'),
(46, 'Noruega'),
(47, 'Polonia'),
(48, 'Portugal'),
(49, 'Reunión'),
(50, 'Rusia'),
(51, 'El Salvador'),
(52, 'Eslovaquia'),
(53, 'Eslovenia'),
(54, 'Surinam'),
(55, 'Estados Unidos'),
(56, 'Tadjikistan'),
(57, 'Turkmenistan'),
(58, 'Islas Turcas y Caicos'),
(59, 'Turquía'),
(60, 'Uganda'),
(61, 'Uzbekistán'),
(62, 'Ucrania'),
(63, 'Finlandia'),
(64, 'Francia'),
(65, 'República Checa'),
(66, 'Suiza'),
(67, 'Suecia'),
(68, 'Estonia'),
(69, 'Corea del Sur'),
(70, 'Japón'),
(71, 'Croacia'),
(72, 'Rumanía'),
(73, 'Hong Kong'),
(74, 'Indonesia'),
(75, 'Jordania'),
(76, 'Malasia'),
(77, 'Singapur'),
(78, 'Taiwan'),
(79, 'Bosnia y Herzegovina'),
(80, 'Bahamas'),
(81, 'Chile'),
(82, 'Colombia'),
(83, 'Islandia'),
(84, 'Corea del Norte'),
(85, 'Macedonia'),
(86, 'Malta'),
(87, 'Pakistán'),
(88, 'Papúa-Nueva Guinea'),
(89, 'Perú'),
(90, 'Filipinas'),
(91, 'Arabia Saudita'),
(92, 'Tailandia'),
(93, 'Emiratos árabes Unidos'),
(94, 'Groenlandia'),
(95, 'Venezuela'),
(96, 'Zimbabwe'),
(97, 'Kenia'),
(98, 'Algeria'),
(99, 'Líbano'),
(100, 'Botsuana'),
(101, 'Tanzania'),
(102, 'Namibia'),
(103, 'Ecuador'),
(104, 'Marruecos'),
(105, 'Ghana'),
(106, 'Siria'),
(107, 'Nepal'),
(108, 'Mauritania'),
(109, 'Seychelles'),
(110, 'Paraguay'),
(111, 'Uruguay'),
(112, 'Congo (Brazzaville)'),
(113, 'Cuba'),
(114, 'Albania'),
(115, 'Nigeria'),
(116, 'Zambia'),
(117, 'Mozambique'),
(119, 'Angola'),
(120, 'Sri Lanka'),
(121, 'Etiopía'),
(122, 'Túnez'),
(123, 'Bolivia'),
(124, 'Panamá'),
(125, 'Malawi'),
(126, 'Liechtenstein'),
(127, 'Bahrein'),
(128, 'Barbados'),
(130, 'Chad'),
(131, 'Man, Isla de'),
(132, 'Jamaica'),
(133, 'Malí'),
(134, 'Madagascar'),
(135, 'Senegal'),
(136, 'Togo'),
(137, 'Honduras'),
(138, 'República Dominicana'),
(139, 'Mongolia'),
(140, 'Irak'),
(141, 'Sudáfrica'),
(142, 'Aruba'),
(143, 'Gibraltar'),
(144, 'Afganistán'),
(145, 'Andorra'),
(147, 'Antigua y Barbuda'),
(149, 'Bangladesh'),
(151, 'Benín'),
(152, 'Bután'),
(154, 'Islas Virgenes Británicas'),
(155, 'Brunéi'),
(156, 'Burkina Faso'),
(157, 'Burundi'),
(158, 'Camboya'),
(159, 'Cabo Verde'),
(164, 'Comores'),
(165, 'Congo (Kinshasa)'),
(166, 'Cook, Islas'),
(168, 'Costa de Marfil'),
(169, 'Djibouti, Yibuti'),
(171, 'Timor Oriental'),
(172, 'Guinea Ecuatorial'),
(173, 'Eritrea'),
(175, 'Feroe, Islas'),
(176, 'Fiyi'),
(178, 'Polinesia Francesa'),
(180, 'Gabón'),
(181, 'Gambia'),
(184, 'Granada'),
(185, 'Guatemala'),
(186, 'Guernsey'),
(187, 'Guinea'),
(188, 'Guinea-Bissau'),
(189, 'Guyana'),
(193, 'Jersey'),
(195, 'Kiribati'),
(196, 'Laos'),
(197, 'Lesotho'),
(198, 'Liberia'),
(200, 'Maldivas'),
(201, 'Martinica'),
(202, 'Mauricio'),
(205, 'Myanmar'),
(206, 'Nauru'),
(207, 'Antillas Holandesas'),
(208, 'Nueva Caledonia'),
(209, 'Nicaragua'),
(210, 'Níger'),
(212, 'Norfolk Island'),
(213, 'Omán'),
(215, 'Isla Pitcairn'),
(216, 'Qatar'),
(217, 'Ruanda'),
(218, 'Santa Elena'),
(219, 'San Cristobal y Nevis'),
(220, 'Santa Lucía'),
(221, 'San Pedro y Miquelón'),
(222, 'San Vincente y Granadinas'),
(223, 'Samoa'),
(224, 'San Marino'),
(225, 'San Tomé y Príncipe'),
(226, 'Serbia y Montenegro'),
(227, 'Sierra Leona'),
(228, 'Islas Salomón'),
(229, 'Somalia'),
(232, 'Sudán'),
(234, 'Swazilandia'),
(235, 'Tokelau'),
(236, 'Tonga'),
(237, 'Trinidad y Tobago'),
(239, 'Tuvalu'),
(240, 'Vanuatu'),
(241, 'Wallis y Futuna'),
(242, 'Sáhara Occidental'),
(243, 'Yemen'),
(246, 'Puerto Rico');


ALTER TABLE pais ADD paisprefijo varchar(10) NOT NULL AFTER paisnombre;

UPDATE pais SET paisprefijo = '+61' WHERE id = 1; -- Australia
UPDATE pais SET paisprefijo = '+43' WHERE id = 2; -- Austria
UPDATE pais SET paisprefijo = '+994' WHERE id = 3; -- Azerbaiyán
UPDATE pais SET paisprefijo = '+1-264' WHERE id = 4; -- Anguilla
UPDATE pais SET paisprefijo = '+54' WHERE id = 5; -- Argentina
UPDATE pais SET paisprefijo = '+374' WHERE id = 6; -- Armenia
UPDATE pais SET paisprefijo = '+375' WHERE id = 7; -- Bielorrusia
UPDATE pais SET paisprefijo = '+501' WHERE id = 8; -- Belice
UPDATE pais SET paisprefijo = '+32' WHERE id = 9; -- Bélgica
UPDATE pais SET paisprefijo = '+1-441' WHERE id = 10; -- Bermudas
UPDATE pais SET paisprefijo = '+359' WHERE id = 11; -- Bulgaria
UPDATE pais SET paisprefijo = '+55' WHERE id = 12; -- Brasil
UPDATE pais SET paisprefijo = '+44' WHERE id = 13; -- Reino Unido
UPDATE pais SET paisprefijo = '+36' WHERE id = 14; -- Hungría
UPDATE pais SET paisprefijo = '+84' WHERE id = 15; -- Vietnam
UPDATE pais SET paisprefijo = '+509' WHERE id = 16; -- Haiti
UPDATE pais SET paisprefijo = '+590' WHERE id = 17; -- Guadalupe
UPDATE pais SET paisprefijo = '+49' WHERE id = 18; -- Alemania
UPDATE pais SET paisprefijo = '+31' WHERE id = 19; -- Países Bajos, Holanda
UPDATE pais SET paisprefijo = '+30' WHERE id = 20; -- Grecia
UPDATE pais SET paisprefijo = '+995' WHERE id = 21; -- Georgia
UPDATE pais SET paisprefijo = '+45' WHERE id = 22; -- Dinamarca
UPDATE pais SET paisprefijo = '+20' WHERE id = 23; -- Egipto
UPDATE pais SET paisprefijo = '+972' WHERE id = 24; -- Israel
UPDATE pais SET paisprefijo = '+91' WHERE id = 25; -- India
UPDATE pais SET paisprefijo = '+98' WHERE id = 26; -- Irán
UPDATE pais SET paisprefijo = '+353' WHERE id = 27; -- Irlanda
UPDATE pais SET paisprefijo = '+34' WHERE id = 28; -- España
UPDATE pais SET paisprefijo = '+39' WHERE id = 29; -- Italia
UPDATE pais SET paisprefijo = '+7' WHERE id = 30; -- Kazajstán
UPDATE pais SET paisprefijo = '+237' WHERE id = 31; -- Camerún
UPDATE pais SET paisprefijo = '+1' WHERE id = 32; -- Canadá
UPDATE pais SET paisprefijo = '+357' WHERE id = 33; -- Chipre
UPDATE pais SET paisprefijo = '+996' WHERE id = 34; -- Kirguistán
UPDATE pais SET paisprefijo = '+86' WHERE id = 35; -- China
UPDATE pais SET paisprefijo = '+506' WHERE id = 36; -- Costa Rica
UPDATE pais SET paisprefijo = '+965' WHERE id = 37; -- Kuwait
UPDATE pais SET paisprefijo = '+371' WHERE id = 38; -- Letonia
UPDATE pais SET paisprefijo = '+218' WHERE id = 39; -- Libia
UPDATE pais SET paisprefijo = '+370' WHERE id = 40; -- Lituania
UPDATE pais SET paisprefijo = '+352' WHERE id = 41; -- Luxemburgo
UPDATE pais SET paisprefijo = '+52' WHERE id = 42; -- México
UPDATE pais SET paisprefijo = '+373' WHERE id = 43; -- Moldavia
UPDATE pais SET paisprefijo = '+377' WHERE id = 44; -- Mónaco
UPDATE pais SET paisprefijo = '+64' WHERE id = 45; -- Nueva Zelanda
UPDATE pais SET paisprefijo = '+47' WHERE id = 46; -- Noruega
UPDATE pais SET paisprefijo = '+48' WHERE id = 47; -- Polonia
UPDATE pais SET paisprefijo = '+351' WHERE id = 48; -- Portugal
UPDATE pais SET paisprefijo = '+262' WHERE id = 49; -- Reunión
UPDATE pais SET paisprefijo = '+7' WHERE id = 50; -- Rusia
UPDATE pais SET paisprefijo = '+503' WHERE id = 51; -- El Salvador
UPDATE pais SET paisprefijo = '+421' WHERE id = 52; -- Eslovaquia
UPDATE pais SET paisprefijo = '+386' WHERE id = 53; -- Eslovenia
UPDATE pais SET paisprefijo = '+597' WHERE id = 54; -- Surinam
UPDATE pais SET paisprefijo = '+1' WHERE id = 55; -- Estados Unidos
UPDATE pais SET paisprefijo = '+992' WHERE id = 56; -- Tadjikistan
UPDATE pais SET paisprefijo = '+993' WHERE id = 57; -- Turkmenistan
UPDATE pais SET paisprefijo = '+1-649' WHERE id = 58; -- Islas Turcas y Caicos
UPDATE pais SET paisprefijo = '+90' WHERE id = 59; -- Turquía
UPDATE pais SET paisprefijo = '+256' WHERE id = 60; -- Uganda
UPDATE pais SET paisprefijo = '+998' WHERE id = 61; -- Uzbekistán
UPDATE pais SET paisprefijo = '+380' WHERE id = 62; -- Ucrania
UPDATE pais SET paisprefijo = '+358' WHERE id = 63; -- Finlandia
UPDATE pais SET paisprefijo = '+33' WHERE id = 64; -- Francia
UPDATE pais SET paisprefijo = '+420' WHERE id = 65; -- República Checa
UPDATE pais SET paisprefijo = '+41' WHERE id = 66; -- Suiza
UPDATE pais SET paisprefijo = '+46' WHERE id = 67; -- Suecia
UPDATE pais SET paisprefijo = '+372' WHERE id = 68; -- Estonia
UPDATE pais SET paisprefijo = '+82' WHERE id = 69; -- Corea del Sur
UPDATE pais SET paisprefijo = '+81' WHERE id = 70; -- Japón
UPDATE pais SET paisprefijo = '+385' WHERE id = 71; -- Croacia
UPDATE pais SET paisprefijo = '+40' WHERE id = 72; -- Rumanía
UPDATE pais SET paisprefijo = '+852' WHERE id = 73; -- Hong Kong
UPDATE pais SET paisprefijo = '+62' WHERE id = 74; -- Indonesia
UPDATE pais SET paisprefijo = '+962' WHERE id = 75; -- Jordania
UPDATE pais SET paisprefijo = '+60' WHERE id = 76; -- Malasia
UPDATE pais SET paisprefijo = '+65' WHERE id = 77; -- Singapur
UPDATE pais SET paisprefijo = '+886' WHERE id = 78; -- Taiwan
UPDATE pais SET paisprefijo = '+387' WHERE id = 79; -- Bosnia y Herzegovina
UPDATE pais SET paisprefijo = '+1' WHERE id = 80; -- Bahamas
UPDATE pais SET paisprefijo = '+56' WHERE id = 81; -- Chile
UPDATE pais SET paisprefijo = '+57' WHERE id = 82; -- Colombia
UPDATE pais SET paisprefijo = '+354' WHERE id = 83; -- Islandia
UPDATE pais SET paisprefijo = '+850' WHERE id = 84; -- Corea del Norte
UPDATE pais SET paisprefijo = '+389' WHERE id = 85; -- Macedonia
UPDATE pais SET paisprefijo = '+356' WHERE id = 86; -- Malta
UPDATE pais SET paisprefijo = '+92' WHERE id = 87; -- Pakistán
UPDATE pais SET paisprefijo = '+675' WHERE id = 88; -- Papúa-Nueva Guinea
UPDATE pais SET paisprefijo = '+51' WHERE id = 89; -- Perú
UPDATE pais SET paisprefijo = '+63' WHERE id = 90; -- Filipinas
UPDATE pais SET paisprefijo = '+966' WHERE id = 91; -- Arabia Saudita
UPDATE pais SET paisprefijo = '+66' WHERE id = 92; -- Tailandia
UPDATE pais SET paisprefijo = '+971' WHERE id = 93; -- Emiratos árabes Unidos
UPDATE pais SET paisprefijo = '+299' WHERE id = 94; -- Groenlandia
UPDATE pais SET paisprefijo = '+58' WHERE id = 95; -- Venezuela
UPDATE pais SET paisprefijo = '+263' WHERE id = 96; -- Zimbabwe
UPDATE pais SET paisprefijo = '+254' WHERE id = 97; -- Kenia
UPDATE pais SET paisprefijo = '+213' WHERE id = 98; -- Algeria
UPDATE pais SET paisprefijo = '+961' WHERE id = 99; -- Líbano
UPDATE pais SET paisprefijo = '+267' WHERE id = 100; -- Botsuana
UPDATE pais SET paisprefijo = '+255' WHERE id = 101; -- Tanzania
UPDATE pais SET paisprefijo = '+264' WHERE id = 102; -- Namibia
UPDATE pais SET paisprefijo = '+593' WHERE id = 103; -- Ecuador
UPDATE pais SET paisprefijo = '+212' WHERE id = 104; -- Marruecos
UPDATE pais SET paisprefijo = '+233' WHERE id = 105; -- Ghana
UPDATE pais SET paisprefijo = '+963' WHERE id = 106; -- Siria
UPDATE pais SET paisprefijo = '+977' WHERE id = 107; -- Nepal
UPDATE pais SET paisprefijo = '+222' WHERE id = 108; -- Mauritania
UPDATE pais SET paisprefijo = '+248' WHERE id = 109; -- Seychelles
UPDATE pais SET paisprefijo = '+595' WHERE id = 110; -- Paraguay
UPDATE pais SET paisprefijo = '+598' WHERE id = 111; -- Uruguay
UPDATE pais SET paisprefijo = '+242' WHERE id = 112; -- Congo (Brazzaville)
UPDATE pais SET paisprefijo = '+53' WHERE id = 113; -- Cuba
UPDATE pais SET paisprefijo = '+355' WHERE id = 114; -- Albania
UPDATE pais SET paisprefijo = '+234' WHERE id = 115; -- Nigeria
UPDATE pais SET paisprefijo = '+260' WHERE id = 116; -- Zambia
UPDATE pais SET paisprefijo = '+258' WHERE id = 117; -- Mozambique
UPDATE pais SET paisprefijo = '+244' WHERE id = 119; -- Angola
UPDATE pais SET paisprefijo = '+94' WHERE id = 120; -- Sri Lanka
UPDATE pais SET paisprefijo = '+251' WHERE id = 121; -- Etiopía
UPDATE pais SET paisprefijo = '+216' WHERE id = 122; -- Túnez
UPDATE pais SET paisprefijo = '+591' WHERE id = 123; -- Bolivia
UPDATE pais SET paisprefijo = '+507' WHERE id = 124; -- Panamá
UPDATE pais SET paisprefijo = '+265' WHERE id = 125; -- Malawi
UPDATE pais SET paisprefijo = '+423' WHERE id = 126; -- Liechtenstein
UPDATE pais SET paisprefijo = '+973' WHERE id = 127; -- Bahrein
UPDATE pais SET paisprefijo = '+1246' WHERE id = 128; -- Barbados
UPDATE pais SET paisprefijo = '+235' WHERE id = 130; -- Chad
UPDATE pais SET paisprefijo = '+44' WHERE id = 131; -- Man, Isla de
UPDATE pais SET paisprefijo = '+1876' WHERE id = 132; -- Jamaica
UPDATE pais SET paisprefijo = '+223' WHERE id = 133; -- Malí
UPDATE pais SET paisprefijo = '+261' WHERE id = 134; -- Madagascar
UPDATE pais SET paisprefijo = '+221' WHERE id = 135; -- Senegal
UPDATE pais SET paisprefijo = '+228' WHERE id = 136; -- Togo
UPDATE pais SET paisprefijo = '+504' WHERE id = 137; -- Honduras
UPDATE pais SET paisprefijo = '+1809' WHERE id = 138; -- República Dominicana
UPDATE pais SET paisprefijo = '+976' WHERE id = 139; -- Mongolia
UPDATE pais SET paisprefijo = '+964' WHERE id = 140; -- Irak
UPDATE pais SET paisprefijo = '+27' WHERE id = 141; -- Sudáfrica
UPDATE pais SET paisprefijo = '+297' WHERE id = 142; -- Aruba
UPDATE pais SET paisprefijo = '+350' WHERE id = 143; -- Gibraltar
UPDATE pais SET paisprefijo = '+93' WHERE id = 144; -- Afganistán
UPDATE pais SET paisprefijo = '+376' WHERE id = 145; -- Andorra
UPDATE pais SET paisprefijo = '+1268' WHERE id = 147; -- Antigua y Barbuda
UPDATE pais SET paisprefijo = '+880' WHERE id = 149; -- Bangladesh
UPDATE pais SET paisprefijo = '+229' WHERE id = 151; -- Benín
UPDATE pais SET paisprefijo = '+975' WHERE id = 152; -- Bután
UPDATE pais SET paisprefijo = '+1284' WHERE id = 154; -- Islas Virgenes Británicas
UPDATE pais SET paisprefijo = '+673' WHERE id = 155; -- Brunéi
UPDATE pais SET paisprefijo = '+226' WHERE id = 156; -- Burkina Faso
UPDATE pais SET paisprefijo = '+257' WHERE id = 157; -- Burundi
UPDATE pais SET paisprefijo = '+855' WHERE id = 158; -- Camboya
UPDATE pais SET paisprefijo = '+238' WHERE id = 159; -- Cabo Verde
UPDATE pais SET paisprefijo = '+269' WHERE id = 164; -- Comores
UPDATE pais SET paisprefijo = '+243' WHERE id = 165; -- Congo (Kinshasa)
UPDATE pais SET paisprefijo = '+682' WHERE id = 166; -- Cook, Islas
UPDATE pais SET paisprefijo = '+225' WHERE id = 168; -- Costa de Marfil
UPDATE pais SET paisprefijo = '+253' WHERE id = 169; -- Djibouti, Yibuti
UPDATE pais SET paisprefijo = '+670' WHERE id = 171; -- Timor Oriental
UPDATE pais SET paisprefijo = '+240' WHERE id = 172; -- Guinea Ecuatorial
UPDATE pais SET paisprefijo = '+291' WHERE id = 173; -- Eritrea
UPDATE pais SET paisprefijo = '+298' WHERE id = 175; -- Feroe, Islas
UPDATE pais SET paisprefijo = '+679' WHERE id = 176; -- Fiyi
UPDATE pais SET paisprefijo = '+689' WHERE id = 178; -- Polinesia Francesa
UPDATE pais SET paisprefijo = '+241' WHERE id = 180; -- Gabón
UPDATE pais SET paisprefijo = '+220' WHERE id = 181; -- Gambia
UPDATE pais SET paisprefijo = '+1473' WHERE id = 184; -- Granada
UPDATE pais SET paisprefijo = '+502' WHERE id = 185; -- Guatemala
UPDATE pais SET paisprefijo = '+44' WHERE id = 186; -- Guernsey
UPDATE pais SET paisprefijo = '+224' WHERE id = 187; -- Guinea
UPDATE pais SET paisprefijo = '+245' WHERE id = 188; -- Guinea-Bissau
UPDATE pais SET paisprefijo = '+592' WHERE id = 189; -- Guyana
UPDATE pais SET paisprefijo = '+44' WHERE id = 193; -- Jersey
UPDATE pais SET paisprefijo = '+686' WHERE id = 195; -- Kiribati
UPDATE pais SET paisprefijo = '+856' WHERE id = 196; -- Laos
UPDATE pais SET paisprefijo = '+266' WHERE id = 197; -- Lesotho
UPDATE pais SET paisprefijo = '+231' WHERE id = 198; -- Liberia
UPDATE pais SET paisprefijo = '+960' WHERE id = 200; -- Maldivas
UPDATE pais SET paisprefijo = '+596' WHERE id = 201; -- Martinica
UPDATE pais SET paisprefijo = '+230' WHERE id = 202; -- Mauricio
UPDATE pais SET paisprefijo = '+95' WHERE id = 205; -- Myanmar
UPDATE pais SET paisprefijo = '+674' WHERE id = 206; -- Nauru
UPDATE pais SET paisprefijo = '+599' WHERE id = 207; -- Antillas Holandesas
UPDATE pais SET paisprefijo = '+687' WHERE id = 208; -- Nueva Caledonia
UPDATE pais SET paisprefijo = '+505' WHERE id = 209; -- Nicaragua
UPDATE pais SET paisprefijo = '+227' WHERE id = 210; -- Níger
UPDATE pais SET paisprefijo = '+672' WHERE id = 212; -- Norfolk Island
UPDATE pais SET paisprefijo = '+968' WHERE id = 213; -- Omán
UPDATE pais SET paisprefijo = '+64' WHERE id = 215; -- Isla Pitcairn
UPDATE pais SET paisprefijo = '+974' WHERE id = 216; -- Qatar
UPDATE pais SET paisprefijo = '+250' WHERE id = 217; -- Ruanda
UPDATE pais SET paisprefijo = '+290' WHERE id = 218; -- Santa Elena
UPDATE pais SET paisprefijo = '+1869' WHERE id = 219; -- San Cristobal y Nevis
UPDATE pais SET paisprefijo = '+1758' WHERE id = 220; -- Santa Lucía
UPDATE pais SET paisprefijo = '+508' WHERE id = 221; -- San Pedro y Miquelón
UPDATE pais SET paisprefijo = '+1784' WHERE id = 222; -- San Vincente y Granadinas
UPDATE pais SET paisprefijo = '+685' WHERE id = 223; -- Samoa
UPDATE pais SET paisprefijo = '+378' WHERE id = 224; -- San Marino
UPDATE pais SET paisprefijo = '+239' WHERE id = 225; -- San Tomé y Príncipe
UPDATE pais SET paisprefijo = '+381' WHERE id = 226; -- Serbia y Montenegro
UPDATE pais SET paisprefijo = '+232' WHERE id = 227; -- Sierra Leona
UPDATE pais SET paisprefijo = '+677' WHERE id = 228; -- Islas Salomón
UPDATE pais SET paisprefijo = '+252' WHERE id = 229; -- Somalia
UPDATE pais SET paisprefijo = '+249' WHERE id = 232; -- Sudán
UPDATE pais SET paisprefijo = '+268' WHERE id = 234; -- Swazilandia
UPDATE pais SET paisprefijo = '+690' WHERE id = 235; -- Tokelau
UPDATE pais SET paisprefijo = '+676' WHERE id = 236; -- Tonga
UPDATE pais SET paisprefijo = '+1868' WHERE id = 237; -- Trinidad y Tobago
UPDATE pais SET paisprefijo = '+688' WHERE id = 239; -- Tuvalu
UPDATE pais SET paisprefijo = '+678' WHERE id = 240; -- Vanuatu
UPDATE pais SET paisprefijo = '+681' WHERE id = 241; -- Wallis y Futuna
UPDATE pais SET paisprefijo = '+212' WHERE id = 242; -- Sáhara Occidental
UPDATE pais SET paisprefijo = '+967' WHERE id = 243; -- Yemen
UPDATE pais SET paisprefijo = '+1787' WHERE id = 246; -- Puerto Rico
