-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2009 at 09:11 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6-2ubuntu4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `greystone`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL auto_increment,
  `abbreviation` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29981 ;

-- --------------------------------------------------------

--
-- Table structure for table `countrycodes`
--

DROP TABLE IF EXISTS `countrycodes`;
CREATE TABLE IF NOT EXISTS `countrycodes` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
CREATE TABLE IF NOT EXISTS `interests` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

DROP TABLE IF EXISTS `occupations`;
CREATE TABLE IF NOT EXISTS `occupations` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_visable` tinyint(1) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `countrycode_id` int(11) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `countrycode_id` (`countrycode_id`,`occupation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `people_citites`
--

DROP TABLE IF EXISTS `people_citites`;
CREATE TABLE IF NOT EXISTS `people_citites` (
  `id` int(11) NOT NULL auto_increment,
  `favorite_city` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `city_id` (`city_id`,`person_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `people_interests`
--

DROP TABLE IF EXISTS `people_interests`;
CREATE TABLE IF NOT EXISTS `people_interests` (
  `id` int(11) NOT NULL auto_increment,
  `rank` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `interest_id` (`interest_id`,`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `people_states`
--

DROP TABLE IF EXISTS `people_states`;
CREATE TABLE IF NOT EXISTS `people_states` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `state_id` (`state_id`,`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL auto_increment,
  `abbreviation` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

--
-- Table structure for table `states_full`
--

DROP TABLE IF EXISTS `states_full`;
CREATE TABLE IF NOT EXISTS `states_full` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(255) NOT NULL,
  `abbreviation` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

--
-- Table structure for table `zipcodes`
--

DROP TABLE IF EXISTS `zipcodes`;
CREATE TABLE IF NOT EXISTS `zipcodes` (
  `id` int(11) NOT NULL auto_increment,
  `zipcode` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `class` varchar(255) default NULL,
  `city` varchar(255) NOT NULL,
  `statecode` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42193 ;


insert into occupations (name) values ('Athlete'); 
insert into occupations (name) values ('Accountant'); 
insert into occupations (name) values ('Actor'); 
insert into occupations (name) values ('Actress'); 
insert into occupations (name) values ('Actuary');
insert into occupations (name) values ('Architect'); 
insert into occupations (name) values ('Artist'); 
insert into occupations (name) values ('Astronaut'); 
insert into occupations (name) values ('Baker'); 
insert into occupations (name) values ('Bank teller'); 
insert into occupations (name) values ('Barber'); 
insert into occupations (name) values ('Bartender'); 
insert into occupations (name) values ('Bassoonist'); 
insert into occupations (name) values ('Beauty queen'); 
insert into occupations (name) values ('Butcher'); 
insert into occupations (name) values ('Butler'); 
insert into occupations (name) values ('Cab driver'); 
insert into occupations (name) values ('Calligrapher'); 
insert into occupations (name) values ('Cartoonist'); 
insert into occupations (name) values ('Cartographer'); 
insert into occupations (name) values ('CIO (Chief Information Officer)'); 
insert into occupations (name) values ('CEO (Chief Executive Officer)'); 
insert into occupations (name) values ('CTO (Chief Technology Officer)'); 
insert into occupations (name) values ('Civil servant'); 
insert into occupations (name) values ('Civil engineer'); 
insert into occupations (name) values ('Database administrator \(DBA\)'); 
insert into occupations (name) values ('Dentist'); 
insert into occupations (name) values ('Dictator'); 
insert into occupations (name) values ('Dog walker'); 
insert into occupations (name) values ('Editor'); 
insert into occupations (name) values ('Educationalist'); 
insert into occupations (name) values ('Engineer'); 
insert into occupations (name) values ('Engraver'); 
insert into occupations (name) values ('Executive'); 
insert into occupations (name) values ('Farmer'); 
insert into occupations (name) values ('FBI Agent'); 
insert into occupations (name) values ('Fellmonger'); 
insert into occupations (name) values ('Fence'); 
insert into occupations (name) values ('Firefighter'); 
insert into occupations (name) values ('Geologist'); 
insert into occupations (name) values ('Geometer'); 
insert into occupations (name) values ('Grocer'); 
insert into occupations (name) values ('Gunsmith'); 
insert into occupations (name) values ('Historian'); 
insert into occupations (name) values ('Hotel manager'); 
insert into occupations (name) values ('Husbandman'); 
insert into occupations (name) values ('Illusionist'); 
insert into occupations (name) values ('Illustrator'); 
insert into occupations (name) values ('Information Technologist'); 
insert into occupations (name) values ('Information Designer'); 
insert into occupations (name) values ('Investment banker'); 
insert into occupations (name) values ('Jailer'); 
insert into occupations (name) values ('Janitor'); 
insert into occupations (name) values ('Jeweller'); 
insert into occupations (name) values ('Karate master'); 
insert into occupations (name) values ('Kinesiologist'); 
insert into occupations (name) values ('Lawyer'); 
insert into occupations (name) values ('Librarian'); 
insert into occupations (name) values ('Lobbyist'); 
insert into occupations (name) values ('Magistrate'); 
insert into occupations (name) values ('Maid'); 
insert into occupations (name) values ('Manager'); 
insert into occupations (name) values ('Nun'); 
insert into occupations (name) values ('Nursemaid'); 
insert into occupations (name) values ('Nurse'); 
insert into occupations (name) values ('Nutritionist'); 
insert into occupations (name) values ('Occupational therapist'); 
insert into occupations (name) values ('Odontologist'); 
insert into occupations (name) values ('Operator'); 
insert into occupations (name) values ('Painter'); 
insert into occupations (name) values ('Park ranger'); 
insert into occupations (name) values ('Parole Officer'); 
insert into occupations (name) values ('Queen consort'); 
insert into occupations (name) values ('Queen regnant'); 
insert into occupations (name) values ('Quilter'); 
insert into occupations (name) values ('Radiologist'); 
insert into occupations (name) values ('Referee'); 
insert into occupations (name) values ('Refuse collector'); 
insert into occupations (name) values ('Sailor'); 
insert into occupations (name) values ('Scientist'); 
insert into occupations (name) values ('Seamstress'); 
insert into occupations (name) values ('Tax Collector'); 
insert into occupations (name) values ('Teacher'); 
insert into occupations (name) values ('Technician'); 
insert into occupations (name) values ('Undercover agent'); 
insert into occupations (name) values ('Underwriter'); 
insert into occupations (name) values ('Valet'); 
insert into occupations (name) values ('Veterinarian'); 
insert into occupations (name) values ('Violinist'); 
insert into occupations (name) values ('Weatherman'); 
insert into occupations (name) values ('Web designer'); 
insert into occupations (name) values ('Web developer'); 
insert into occupations (name) values ('Xylophonist'); 
insert into occupations (name) values ('Yodeler'); 
insert into occupations (name) values ('Zookeeper'); 
insert into occupations (name) values ('Zoologist');

CREATE DATABASE countrycodes;
use countrycodes;
CREATE TABLE countrycodes (code CHAR(2),country text);
insert into countrycodes (code,country) values ('AF','Afghanistan');
insert into countrycodes (code,country) values ('AL','Albania');
insert into countrycodes (code,country) values ('DZ','Algeria');
insert into countrycodes (code,country) values ('AS','American Samoa');
insert into countrycodes (code,country) values ('AD','Andorra');
insert into countrycodes (code,country) values ('AO','Angola');
insert into countrycodes (code,country) values ('AI','Anguilla');
insert into countrycodes (code,country) values ('AQ','Antarctica');
insert into countrycodes (code,country) values ('AG','Antigua and Barbuda');
insert into countrycodes (code,country) values ('AR','Argentina');
insert into countrycodes (code,country) values ('AM','Armenia');
insert into countrycodes (code,country) values ('AW','Aruba');
insert into countrycodes (code,country) values ('AU','Australia');
insert into countrycodes (code,country) values ('AT','Austria');
insert into countrycodes (code,country) values ('AZ','Azerbaidjan');
insert into countrycodes (code,country) values ('BS','Bahamas');
insert into countrycodes (code,country) values ('BH','Bahrain');
insert into countrycodes (code,country) values ('BD','Banglades');
insert into countrycodes (code,country) values ('BB','Barbados');
insert into countrycodes (code,country) values ('BY','Belarus');
insert into countrycodes (code,country) values ('BE','Belgium');
insert into countrycodes (code,country) values ('BZ','Belize');
insert into countrycodes (code,country) values ('BJ','Benin');
insert into countrycodes (code,country) values ('BM','Bermuda');
insert into countrycodes (code,country) values ('BO','Bolivia');
insert into countrycodes (code,country) values ('BA','Bosnia-Herzegovina');
insert into countrycodes (code,country) values ('BW','Botswana');
insert into countrycodes (code,country) values ('BV','Bouvet Island');
insert into countrycodes (code,country) values ('BR','Brazil');
insert into countrycodes (code,country) values ('IO','British Indian O. Terr.');
insert into countrycodes (code,country) values ('BN','Brunei Darussalam');
insert into countrycodes (code,country) values ('BG','Bulgaria');
insert into countrycodes (code,country) values ('BF','Burkina Faso');
insert into countrycodes (code,country) values ('BI','Burundi');
insert into countrycodes (code,country) values ('BT','Buthan');
insert into countrycodes (code,country) values ('KH','Cambodia');
insert into countrycodes (code,country) values ('CM','Cameroon');
insert into countrycodes (code,country) values ('CA','Canada');
insert into countrycodes (code,country) values ('CV','Cape Verde');
insert into countrycodes (code,country) values ('KY','Cayman Islands');
insert into countrycodes (code,country) values ('CF','Central African Rep.');
insert into countrycodes (code,country) values ('TD','Chad');
insert into countrycodes (code,country) values ('CL','Chile');
insert into countrycodes (code,country) values ('CN','China');
insert into countrycodes (code,country) values ('CX','Christmas Island');
insert into countrycodes (code,country) values ('CC','Cocos (Keeling) Isl.');
insert into countrycodes (code,country) values ('CO','Colombia');
insert into countrycodes (code,country) values ('KM','Comoros');
insert into countrycodes (code,country) values ('CG','Congo');
insert into countrycodes (code,country) values ('CK','Cook Islands');
insert into countrycodes (code,country) values ('CR','Costa Rica');
insert into countrycodes (code,country) values ('HR','Croatia');
insert into countrycodes (code,country) values ('CU','Cuba');
insert into countrycodes (code,country) values ('CY','Cyprus');
insert into countrycodes (code,country) values ('CZ','Czech Republic');
insert into countrycodes (code,country) values ('CS','Czechoslovakia');
insert into countrycodes (code,country) values ('DK','Denmark');
insert into countrycodes (code,country) values ('DJ','Djibouti');
insert into countrycodes (code,country) values ('DM','Dominica');
insert into countrycodes (code,country) values ('DO','Dominican Republic');
insert into countrycodes (code,country) values ('TP','East Timor');
insert into countrycodes (code,country) values ('EC','Ecuador');
insert into countrycodes (code,country) values ('EG','Egypt');
insert into countrycodes (code,country) values ('SV','El Salvador');
insert into countrycodes (code,country) values ('GQ','Equatorial Guinea');
insert into countrycodes (code,country) values ('EE','Estonia');
insert into countrycodes (code,country) values ('ET','Ethiopia');
insert into countrycodes (code,country) values ('FK','Falkland Isl.(UK)');
insert into countrycodes (code,country) values ('FO','Faroe Islands');
insert into countrycodes (code,country) values ('FJ','Fiji');
insert into countrycodes (code,country) values ('FI','Finland');
insert into countrycodes (code,country) values ('FR','France');
insert into countrycodes (code,country) values ('FX','France (European Ter.)');
insert into countrycodes (code,country) values ('TF','French Southern Terr.');
insert into countrycodes (code,country) values ('GA','Gabon');
insert into countrycodes (code,country) values ('GM','Gambia');
insert into countrycodes (code,country) values ('GE','Georgia');
insert into countrycodes (code,country) values ('DE','Germany');
insert into countrycodes (code,country) values ('GH','Ghana');
insert into countrycodes (code,country) values ('GI','Gibraltar');
insert into countrycodes (code,country) values ('GB','Great Britain (UK)');
insert into countrycodes (code,country) values ('GR','Greece');
insert into countrycodes (code,country) values ('GL','Greenland');
insert into countrycodes (code,country) values ('GD','Grenada');
insert into countrycodes (code,country) values ('GP','Guadeloupe (Fr.)');
insert into countrycodes (code,country) values ('GU','Guam (US)');
insert into countrycodes (code,country) values ('GT','Guatemala');
insert into countrycodes (code,country) values ('GN','Guinea');
insert into countrycodes (code,country) values ('GW','Guinea Bissau');
insert into countrycodes (code,country) values ('GY','Guyana');
insert into countrycodes (code,country) values ('GF','Guyana (Fr.)');
insert into countrycodes (code,country) values ('HT','Haiti');
insert into countrycodes (code,country) values ('HM','Heard & McDonald Isl.');
insert into countrycodes (code,country) values ('HN','Honduras');
insert into countrycodes (code,country) values ('HK','Hong Kong');
insert into countrycodes (code,country) values ('HU','Hungary');
insert into countrycodes (code,country) values ('IS','Iceland');
insert into countrycodes (code,country) values ('IN','India');
insert into countrycodes (code,country) values ('ID','Indonesia');
insert into countrycodes (code,country) values ('IR','Iran');
insert into countrycodes (code,country) values ('IQ','Iraq');
insert into countrycodes (code,country) values ('IE','Ireland');
insert into countrycodes (code,country) values ('IL','Israel');
insert into countrycodes (code,country) values ('IT','Italy');
insert into countrycodes (code,country) values ('CI','Ivory Coast');
insert into countrycodes (code,country) values ('JM','Jamaica');
insert into countrycodes (code,country) values ('JP','Japan');
insert into countrycodes (code,country) values ('JO','Jordan');
insert into countrycodes (code,country) values ('KZ','Kazachstan');
insert into countrycodes (code,country) values ('KE','Kenya');
insert into countrycodes (code,country) values ('KG','Kirgistan');
insert into countrycodes (code,country) values ('KI','Kiribati');
insert into countrycodes (code,country) values ('KP','Korea (North)');
insert into countrycodes (code,country) values ('KR','Korea (South)');
insert into countrycodes (code,country) values ('KW','Kuwait');
insert into countrycodes (code,country) values ('LA','Laos');
insert into countrycodes (code,country) values ('LV','Latvia');
insert into countrycodes (code,country) values ('LB','Lebanon');
insert into countrycodes (code,country) values ('LS','Lesotho');
insert into countrycodes (code,country) values ('LR','Liberia');
insert into countrycodes (code,country) values ('LY','Libya');
insert into countrycodes (code,country) values ('LI','Liechtenstein');
insert into countrycodes (code,country) values ('LT','Lithuania');
insert into countrycodes (code,country) values ('LU','Luxembourg');
insert into countrycodes (code,country) values ('MO','Macau');
insert into countrycodes (code,country) values ('MG','Madagascar');
insert into countrycodes (code,country) values ('MW','Malawi');
insert into countrycodes (code,country) values ('MY','Malaysia');
insert into countrycodes (code,country) values ('MV','Maldives');
insert into countrycodes (code,country) values ('ML','Mali');
insert into countrycodes (code,country) values ('MT','Malta');
insert into countrycodes (code,country) values ('MH','Marshall Islands');
insert into countrycodes (code,country) values ('MQ','Martinique (Fr.)');
insert into countrycodes (code,country) values ('MR','Mauritania');
insert into countrycodes (code,country) values ('MU','Mauritius');
insert into countrycodes (code,country) values ('MX','Mexico');
insert into countrycodes (code,country) values ('FM','Micronesia');
insert into countrycodes (code,country) values ('MD','Moldavia');
insert into countrycodes (code,country) values ('MC','Monaco');
insert into countrycodes (code,country) values ('MN','Mongolia');
insert into countrycodes (code,country) values ('MS','Montserrat');
insert into countrycodes (code,country) values ('MA','Morocco');
insert into countrycodes (code,country) values ('MZ','Mozambique');
insert into countrycodes (code,country) values ('MM','Myanmar');
insert into countrycodes (code,country) values ('NA','Namibia');
insert into countrycodes (code,country) values ('NR','Nauru');
insert into countrycodes (code,country) values ('NP','Nepal');
insert into countrycodes (code,country) values ('AN','Netherland Antilles');
insert into countrycodes (code,country) values ('NL','Netherlands');
insert into countrycodes (code,country) values ('NT','Neutral Zone');
insert into countrycodes (code,country) values ('NC','New Caledonia (Fr.)');
insert into countrycodes (code,country) values ('NZ','New Zealand');
insert into countrycodes (code,country) values ('NI','Nicaragua');
insert into countrycodes (code,country) values ('NE','Niger');
insert into countrycodes (code,country) values ('NG','Nigeria');
insert into countrycodes (code,country) values ('NU','Niue');
insert into countrycodes (code,country) values ('NF','Norfolk Island');
insert into countrycodes (code,country) values ('MP','Northern Mariana Isl.');
insert into countrycodes (code,country) values ('NO','Norway');
insert into countrycodes (code,country) values ('OM','Oman');
insert into countrycodes (code,country) values ('PK','Pakistan');
insert into countrycodes (code,country) values ('PW','Palau');
insert into countrycodes (code,country) values ('PA','Panama');
insert into countrycodes (code,country) values ('PG','Papua New');
insert into countrycodes (code,country) values ('PY','Paraguay');
insert into countrycodes (code,country) values ('PE','Peru');
insert into countrycodes (code,country) values ('PH','Philippines');
insert into countrycodes (code,country) values ('PN','Pitcairn');
insert into countrycodes (code,country) values ('PL','Poland');
insert into countrycodes (code,country) values ('PF','Polynesia (Fr.)');
insert into countrycodes (code,country) values ('PT','Portugal');
insert into countrycodes (code,country) values ('PR','Puerto Rico (US)');
insert into countrycodes (code,country) values ('QA','Qatar');
insert into countrycodes (code,country) values ('RE','Reunion (Fr.)');
insert into countrycodes (code,country) values ('RO','Romania');
insert into countrycodes (code,country) values ('RU','Russian Federation');
insert into countrycodes (code,country) values ('RW','Rwanda');
insert into countrycodes (code,country) values ('LC','Saint Lucia');
insert into countrycodes (code,country) values ('WS','Samoa');
insert into countrycodes (code,country) values ('SM','San Marino');
insert into countrycodes (code,country) values ('SA','Saudi Arabia');
insert into countrycodes (code,country) values ('SN','Senegal');
insert into countrycodes (code,country) values ('SC','Seychelles');
insert into countrycodes (code,country) values ('SL','Sierra Leone');
insert into countrycodes (code,country) values ('SG','Singapore');
insert into countrycodes (code,country) values ('SK','Slovak Republic');
insert into countrycodes (code,country) values ('SI','Slovenia');
insert into countrycodes (code,country) values ('SB','Solomon Islands');
insert into countrycodes (code,country) values ('SO','Somalia');
insert into countrycodes (code,country) values ('ZA','South Africa');
insert into countrycodes (code,country) values ('SU','Soviet Union');
insert into countrycodes (code,country) values ('ES','Spain');
insert into countrycodes (code,country) values ('LK','Sri Lanka');
insert into countrycodes (code,country) values ('SH','St. Helena');
insert into countrycodes (code,country) values ('PM','St. Pierre & Miquelon');
insert into countrycodes (code,country) values ('ST','St. Tome and Principe');
insert into countrycodes (code,country) values ('KN','St.Kitts Nevis Anguilla');
insert into countrycodes (code,country) values ('VC','St.Vincent & Grenadines');
insert into countrycodes (code,country) values ('SD','Sudan');
insert into countrycodes (code,country) values ('SR','Suriname');
insert into countrycodes (code,country) values ('SJ','Svalbard & Jan Mayen Is');
insert into countrycodes (code,country) values ('SZ','Swaziland');
insert into countrycodes (code,country) values ('SE','Sweden');
insert into countrycodes (code,country) values ('CH','Switzerland');
insert into countrycodes (code,country) values ('SY','Syria');
insert into countrycodes (code,country) values ('TJ','Tadjikistan');
insert into countrycodes (code,country) values ('TW','Taiwan');
insert into countrycodes (code,country) values ('TZ','Tanzania');
insert into countrycodes (code,country) values ('TH','Thailand');
insert into countrycodes (code,country) values ('TG','Togo');
insert into countrycodes (code,country) values ('TK','Tokelau');
insert into countrycodes (code,country) values ('TO','Tonga');
insert into countrycodes (code,country) values ('TT','Trinidad & Tobago');
insert into countrycodes (code,country) values ('TN','Tunisia');
insert into countrycodes (code,country) values ('TR','Turkey');
insert into countrycodes (code,country) values ('TM','Turkmenistan');
insert into countrycodes (code,country) values ('TC','Turks & Caicos Islands');
insert into countrycodes (code,country) values ('TV','Tuvalu');
insert into countrycodes (code,country) values ('UG','Uganda');
insert into countrycodes (code,country) values ('UA','Ukraine');
insert into countrycodes (code,country) values ('AE','United Arab Emirates');
insert into countrycodes (code,country) values ('UK','United Kingdom');
insert into countrycodes (code,country) values ('US','United States');
insert into countrycodes (code,country) values ('UY','Uruguay');
insert into countrycodes (code,country) values ('UM','US Minor outlying Isl.');
insert into countrycodes (code,country) values ('UZ','Uzbekistan');
insert into countrycodes (code,country) values ('VU','Vanuatu');
insert into countrycodes (code,country) values ('VA','Vatican City State');
insert into countrycodes (code,country) values ('VE','Venezuela');
insert into countrycodes (code,country) values ('VN','Vietnam');
insert into countrycodes (code,country) values ('VG','Virgin Islands (British)');
insert into countrycodes (code,country) values ('VI','Virgin Islands (US)');
insert into countrycodes (code,country) values ('WF','Wallis & Futuna Islands');
insert into countrycodes (code,country) values ('EH','Western Sahara');
insert into countrycodes (code,country) values ('YE','Yemen');
insert into countrycodes (code,country) values ('YU','Yugoslavia');
insert into countrycodes (code,country) values ('ZR','Zaire');
insert into countrycodes (code,country) values ('ZM','Zambia');
insert into countrycodes (code,country) values ('ZW','Zimbabwe');
