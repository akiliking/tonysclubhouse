DROP TABLE IF EXISTS `tblPlayer`;
CREATE TABLE `tblPlayer` (
	`fldPlayerId` int(11) NOT NULL auto_increment,
	`fldUserId` int(11) NULL ,
	`fldName` varchar (255)  ,
	`fldPlayerTypeId` int(11) NULL ,
	`fldPlayerIndex` float NULL ,
	`fldPlayerGrade` float NULL ,
	`fldPlayerIndexUnverified` float NULL ,
	`fldPlayerGradeUnverified` float NULL ,
	`fldChange` float NULL ,
  PRIMARY KEY  (`fldPlayerId`)
) TYPE=MyISAM 


DROP TABLE IF EXISTS `tblPlayerTypes`;
CREATE TABLE `tblPlayerTypes` (
	`fldPlayerTypeId` int(11) NOT NULL ,
	`fldName` varchar (50) ,
	`fldActive` bit NULL ,
  PRIMARY KEY  (`fldPlayerTypeId`)
) TYPE=MyISAM 


DROP TABLE IF EXISTS `tblTournament`;
CREATE TABLE `tblTournament` (
	`fldTournamentId` int(11) NOT NULL auto_increment,
	`fldTournamentTypeId` int(11) NULL ,
	`fldHostUserId` int(11) NULL ,
	`fldTournamentName` varchar (255) NULL ,
	`fldTotalEntries` int(11) NULL ,
	`fldStateId` int(11) NULL ,
	`fldCountryId` int(11) NULL ,
	`fldTournamentDate` datetime NULL ,
	`fldCreatedDTS` datetime NULL ,
	`fldCreatedById` int(11) NULL ,
	`fldModifiedDTS` datetime NULL ,
	`fldModifiedById` int(11) NULL ,
  PRIMARY KEY  (`fldTournamentId`)
) TYPE=MyISAM 


DROP TABLE IF EXISTS `tblTournamentAndPlayer`; CREATE TABLE `tblTournamentAndPlayer` (
	`fldTournamentId` int(11) NOT NULL ,
	`fldPlayerId` int(11) NOT NULL ,
	`fldPlayerRank` int(11) NOT NULL ,
	`fldVerified` bit NULL
) TYPE=MyISAM 


DROP TABLE IF EXISTS `tblTournamentTypes`; CREATE TABLE `tblTournamentTypes` (
	`fldTournamentTypeId` int(11) NOT NULL ,
	`fldName` varchar (50) ,
	`fldActive` bit NULL ,
  PRIMARY KEY  (`fldTournamentTypeId`)
) TYPE=MyISAM 


DROP TABLE IF EXISTS `tblUser`;
CREATE TABLE `tblUser` (
	`fldUserId` int(11) NOT NULL auto_increment,
	`fldTypeId` int(11) NULL ,
	`fldAddressId` int(11) NULL ,
	`fldStatusId` int(11) NULL ,
	`fldName` varchar (255) NOT NULL ,
	`fldLogin` varchar (25) NULL ,
	`fldPassword` varchar (25) NULL ,
	`fldPhotoURL` varchar (255) NULL ,
	`fldBirthDate` datetime NULL ,
	`fldCreateDTS` datetime NULL ,
	`fldCreatedById` int(11) NULL ,
	`fldModifiedDTS` datetime NULL ,
	`fldModifiedById` int(11) NULL ,
  PRIMARY KEY  (`fldUserId`)
) TYPE=MyISAM 




-- test date inserts...


insert into tblTournamentTypes(fldTournamentTypeId, fldName, fldActive) values (1,'Poor Quality Tournament',1);
insert into tblTournamentTypes(fldTournamentTypeId, fldName, fldActive) values (2,'Fair Quality Tournament',1);
insert into tblTournamentTypes(fldTournamentTypeId, fldName, fldActive) values (3,'Good Quality Tournament',1);
insert into tblTournamentTypes(fldTournamentTypeId, fldName, fldActive) values (4,'Better Quailty Tournament',1);
insert into tblTournamentTypes(fldTournamentTypeId, fldName, fldActive) values (5,'Best Quality Tournament',1);
insert into tblTournamentTypes(fldTournamentTypeId, fldName, fldActive) values (6,'Master Quality Tournament',1);

insert into tblPlayer(fldName) values('John D''Agostino');
insert into tblPlayer(fldName) values('Remco Schrijvers');
insert into tblPlayer(fldName) values('Ron Rose');
insert into tblPlayer(fldName) values('Jose Rosenkrantz');
insert into tblPlayer(fldName) values('Howard Lederer');
insert into tblPlayer(fldName) values('Juha Helppi');
insert into tblPlayer(fldName) values('Chris Karagulleyan');
insert into tblPlayer(fldName) values('Phil "Unibomber" Laak');
insert into tblPlayer(fldName) values('Humberto Brenes');
insert into tblPlayer(fldName) values('John Juanda');
insert into tblPlayer(fldName) values('Joe Cassidy');
insert into tblPlayer(fldName) values('Harry Demetriou');
insert into tblPlayer(fldName) values('Phil Gordon');
insert into tblPlayer(fldName) values('Chris Moneymaker');
insert into tblPlayer(fldName) values('Masoud Shojael');
insert into tblPlayer(fldName) values('Scott Wilson');
insert into tblPlayer(fldName) values('Suzie Kim');
insert into tblPlayer(fldName) values('Mark Mache');
insert into tblPlayer(fldName) values('Chris Hinchcliffe');
insert into tblPlayer(fldName) values('Steve Zolotow');
insert into tblPlayer(fldName) values('Scotty Nguyen');
insert into tblPlayer(fldName) values('Michael Kinney');
insert into tblPlayer(fldName) values('Paul "Eskimo" Clark');
insert into tblPlayer(fldName) values('Harry Knopp');
insert into tblPlayer(fldName) values('Pete Muller');
insert into tblPlayer(fldName) values('Tony Bloom');
insert into tblPlayer(fldName) values('Young Phan');
insert into tblPlayer(fldName) values('Martin de Knijff');
insert into tblPlayer(fldName) values('Hasan Habib');
insert into tblPlayer(fldName) values('Matt Matros');
insert into tblPlayer(fldName) values('Richard Grijalba');
insert into tblPlayer(fldName) values('Russell Rosenblum');
insert into tblPlayer(fldName) values('Steve Brecher');

insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(1,4,'Borgata Poker Open',302);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(2,5,'Foxwoods World Poker Finals',1101);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(3,5,'Bellagio''s Five Diamond World Poker Classic',183);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(4,4,'Grand Prix de Paris',800);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(5,5,'Binion''s World Poker Open',2576);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(6,5,'L.A. Poker Classic',628);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(7,4,'Ultimate Poker Classic Aruba',138);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(8,4,'PokerStars.com Carribean Adventure',2576);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(9,4,'World Poker Tour Battle of Champions',302);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(10,3,'WPT Invitational Commerce Casino',382);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(11,4,'Bay 101 Shooting Star',3459);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(12,5,'PartyPoker Million III',4000);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(13,4,'Reno Hilton''s World Poker Challenge',5210);
insert into tblTournament(fldTournamentId, fldTournamentTypeId, fldTournamentName, fldTotalEntries) values(14,6,'2004 World Poker Tour Championship',4000);

insert into tblPlayer(fldPlayerId, fldName) values(1,'Abe Mosseri');
insert into tblPlayer(fldPlayerId, fldName) values(2,'Adam Schoenfeld');
insert into tblPlayer(fldPlayerId, fldName) values(3,'Anthony Fagan');
insert into tblPlayer(fldPlayerId, fldName) values(4,'Antonio Esfandiari');
insert into tblPlayer(fldPlayerId, fldName) values(5,'Barry Greenstein');
insert into tblPlayer(fldPlayerId, fldName) values(6,'Barry Shulman');
insert into tblPlayer(fldPlayerId, fldName) values(7,'Bill Gazes');
insert into tblPlayer(fldPlayerId, fldName) values(8,'Brian Haveson');
insert into tblPlayer(fldPlayerId, fldName) values(9,'Can Kim Hua');
insert into tblPlayer(fldPlayerId, fldName) values(10,'Carlos Mortensen');
insert into tblPlayer(fldPlayerId, fldName) values(11,'Charlie Shoten');
insert into tblPlayer(fldPlayerId, fldName) values(12,'Chip Reese');
insert into tblPlayer(fldPlayerId, fldName) values(13,'Chris Ackerman');
insert into tblPlayer(fldPlayerId, fldName) values(14,'Chris Hinchcliffe');
insert into tblPlayer(fldPlayerId, fldName) values(15,'Chris Karagulleyan');
insert into tblPlayer(fldPlayerId, fldName) values(16,'Chris Moneymaker');
insert into tblPlayer(fldPlayerId, fldName) values(17,'Daniel Larsson');
insert into tblPlayer(fldPlayerId, fldName) values(18,'Daniel Negreanu');
insert into tblPlayer(fldPlayerId, fldName) values(19,'David Benyamine');
insert into tblPlayer(fldPlayerId, fldName) values(20,'David Oppenheim');
insert into tblPlayer(fldPlayerId, fldName) values(21,'Dewey Tomko');
insert into tblPlayer(fldPlayerId, fldName) values(22,'Erick Lindgren');
insert into tblPlayer(fldPlayerId, fldName) values(23,'George Paravoliasakis');
insert into tblPlayer(fldPlayerId, fldName) values(24,'Gus Hansen');
insert into tblPlayer(fldPlayerId, fldName) values(25,'Harry Demetriou');
insert into tblPlayer(fldPlayerId, fldName) values(26,'Harry Knopp');
insert into tblPlayer(fldPlayerId, fldName) values(27,'Hasan Habib');
insert into tblPlayer(fldPlayerId, fldName) values(28,'Howard Lederer');
insert into tblPlayer(fldPlayerId, fldName) values(29,'Hoyt Corkins');
insert into tblPlayer(fldPlayerId, fldName) values(30,'Humberto Brenes');
insert into tblPlayer(fldPlayerId, fldName) values(31,'James Tippen');
insert into tblPlayer(fldPlayerId, fldName) values(32,'Jan Boubli');
insert into tblPlayer(fldPlayerId, fldName) values(33,'Joe Cassidy');
insert into tblPlayer(fldPlayerId, fldName) values(34,'John D''Agostino');
insert into tblPlayer(fldPlayerId, fldName) values(35,'John Juanda');
insert into tblPlayer(fldPlayerId, fldName) values(36,'Jose Rosenkrantz');
insert into tblPlayer(fldPlayerId, fldName) values(37,'Juha Helppi');
insert into tblPlayer(fldPlayerId, fldName) values(38,'Lee Salem');
insert into tblPlayer(fldPlayerId, fldName) values(39,'Mark Mache');
insert into tblPlayer(fldPlayerId, fldName) values(40,'Martin de Knijff');
insert into tblPlayer(fldPlayerId, fldName) values(41,'Masoud Shojael');
insert into tblPlayer(fldPlayerId, fldName) values(42,'Matt Matros');
insert into tblPlayer(fldPlayerId, fldName) values(43,'Mel Judah');
insert into tblPlayer(fldPlayerId, fldName) values(44,'Michael Benedetto');
insert into tblPlayer(fldPlayerId, fldName) values(45,'Michael Kinney');
insert into tblPlayer(fldPlayerId, fldName) values(46,'Mickey Seagle');
insert into tblPlayer(fldPlayerId, fldName) values(47,'Mike Keohan');
insert into tblPlayer(fldPlayerId, fldName) values(48,'Mohamed Ibrahim');
insert into tblPlayer(fldPlayerId, fldName) values(49,'Noli Francisco');
insert into tblPlayer(fldPlayerId, fldName) values(50,'Paul "Eskimo" Clark');
insert into tblPlayer(fldPlayerId, fldName) values(51,'Paul Phillips');
insert into tblPlayer(fldPlayerId, fldName) values(52,'Pete Muller');
insert into tblPlayer(fldPlayerId, fldName) values(53,'Phil "Unibomber" Laak');
insert into tblPlayer(fldPlayerId, fldName) values(54,'Phil Gordon');
insert into tblPlayer(fldPlayerId, fldName) values(55,'Phil Hellmuth Jr.');
insert into tblPlayer(fldPlayerId, fldName) values(56,'Randy Burger');
insert into tblPlayer(fldPlayerId, fldName) values(57,'Randy Jensen');
insert into tblPlayer(fldPlayerId, fldName) values(58,'Remco Schrijvers');
insert into tblPlayer(fldPlayerId, fldName) values(59,'Richard Grijalba');
insert into tblPlayer(fldPlayerId, fldName) values(60,'Rick Casper');
insert into tblPlayer(fldPlayerId, fldName) values(61,'Ron Rose');
insert into tblPlayer(fldPlayerId, fldName) values(62,'Russell Rosenblum');
insert into tblPlayer(fldPlayerId, fldName) values(63,'Scott Wilson');
insert into tblPlayer(fldPlayerId, fldName) values(64,'Scotty Nguyen');
insert into tblPlayer(fldPlayerId, fldName) values(65,'Senthil Kumar');
insert into tblPlayer(fldPlayerId, fldName) values(66,'Steve Brecher');
insert into tblPlayer(fldPlayerId, fldName) values(67,'Steve Zolotow');
insert into tblPlayer(fldPlayerId, fldName) values(68,'Suzie Kim');
insert into tblPlayer(fldPlayerId, fldName) values(69,'Ted Harrington');
insert into tblPlayer(fldPlayerId, fldName) values(70,'Tino Lechich');
insert into tblPlayer(fldPlayerId, fldName) values(71,'Tony Bloom');
insert into tblPlayer(fldPlayerId, fldName) values(72,'Tony Hartman');
insert into tblPlayer(fldPlayerId, fldName) values(73,'Vinny Vihn');
insert into tblPlayer(fldPlayerId, fldName) values(74,'Young Phan');

UPDATE tblPlayer SET fldPlayerIndex = 70, fldPlayerGrade = 1700;






/*
		Each player row will be have to added using the GUI or a PHP script to run the 
		formula... this insert would have worked if MySQL supported triggers...


insert into tblTournamentAndPlayer values(	1	,	49	,	1	,1);
insert into tblTournamentAndPlayer values(	1	,	11	,	2	,1);
insert into tblTournamentAndPlayer values(	1	,	20	,	3	,1);
insert into tblTournamentAndPlayer values(	1	,	10	,	4	,1);
insert into tblTournamentAndPlayer values(	1	,	46	,	5	,1);
insert into tblTournamentAndPlayer values(	1	,	56	,	6	,1);
insert into tblTournamentAndPlayer values(	2	,	29	,	1	,1);
insert into tblTournamentAndPlayer values(	2	,	48	,	2	,1);
insert into tblTournamentAndPlayer values(	2	,	55	,	3	,1);
insert into tblTournamentAndPlayer values(	2	,	13	,	4	,1);
insert into tblTournamentAndPlayer values(	2	,	65	,	5	,1);
insert into tblTournamentAndPlayer values(	2	,	8	,	6	,1);
insert into tblTournamentAndPlayer values(	3	,	51	,	1	,1);
insert into tblTournamentAndPlayer values(	3	,	21	,	2	,1);
insert into tblTournamentAndPlayer values(	3	,	24	,	3	,1);
insert into tblTournamentAndPlayer values(	3	,	1	,	4	,1);
insert into tblTournamentAndPlayer values(	3	,	70	,	5	,1);
insert into tblTournamentAndPlayer values(	3	,	43	,	6	,1);
insert into tblTournamentAndPlayer values(	4	,	19	,	1	,1);
insert into tblTournamentAndPlayer values(	4	,	32	,	2	,1);
insert into tblTournamentAndPlayer values(	4	,	23	,	3	,1);
insert into tblTournamentAndPlayer values(	4	,	1	,	4	,1);
insert into tblTournamentAndPlayer values(	4	,	22	,	5	,1);
insert into tblTournamentAndPlayer values(	4	,	38	,	6	,1);
insert into tblTournamentAndPlayer values(	5	,	5	,	1	,1);
insert into tblTournamentAndPlayer values(	5	,	57	,	2	,1);
insert into tblTournamentAndPlayer values(	5	,	31	,	3	,1);
insert into tblTournamentAndPlayer values(	5	,	12	,	4	,1);
insert into tblTournamentAndPlayer values(	5	,	9	,	5	,1);
insert into tblTournamentAndPlayer values(	5	,	72	,	6	,1);
insert into tblTournamentAndPlayer values(	6	,	4	,	1	,1);
insert into tblTournamentAndPlayer values(	6	,	73	,	2	,1);
insert into tblTournamentAndPlayer values(	6	,	47	,	3	,1);
insert into tblTournamentAndPlayer values(	6	,	7	,	4	,1);
insert into tblTournamentAndPlayer values(	6	,	2	,	5	,1);
insert into tblTournamentAndPlayer values(	6	,	19	,	6	,1);
insert into tblTournamentAndPlayer values(	7	,	22	,	1	,1);
insert into tblTournamentAndPlayer values(	7	,	17	,	2	,1);
insert into tblTournamentAndPlayer values(	7	,	3	,	3	,1);
insert into tblTournamentAndPlayer values(	7	,	6	,	4	,1);
insert into tblTournamentAndPlayer values(	7	,	69	,	5	,1);
insert into tblTournamentAndPlayer values(	7	,	60	,	6	,1);
insert into tblTournamentAndPlayer values(	8	,	24	,	1	,1);
insert into tblTournamentAndPlayer values(	8	,	29	,	2	,1);
insert into tblTournamentAndPlayer values(	8	,	18	,	3	,1);
insert into tblTournamentAndPlayer values(	8	,	44	,	4	,1);
insert into tblTournamentAndPlayer values(	8	,	34	,	5	,1);
insert into tblTournamentAndPlayer values(	8	,	58	,	6	,1);
insert into tblTournamentAndPlayer values(	9	,	61	,	1	,1);
insert into tblTournamentAndPlayer values(	9	,	36	,	2	,1);
insert into tblTournamentAndPlayer values(	9	,	28	,	3	,1);
insert into tblTournamentAndPlayer values(	9	,	37	,	4	,1);
insert into tblTournamentAndPlayer values(	9	,	15	,	5	,1);
insert into tblTournamentAndPlayer values(	9	,	24	,	6	,1);
insert into tblTournamentAndPlayer values(	10	,	53	,	1	,1);
insert into tblTournamentAndPlayer values(	10	,	30	,	2	,1);
insert into tblTournamentAndPlayer values(	10	,	35	,	3	,1);
insert into tblTournamentAndPlayer values(	10	,	33	,	4	,1);
insert into tblTournamentAndPlayer values(	10	,	25	,	5	,1);
insert into tblTournamentAndPlayer values(	10	,	4	,	6	,1);
insert into tblTournamentAndPlayer values(	11	,	54	,	1	,1);
insert into tblTournamentAndPlayer values(	11	,	16	,	2	,1);
insert into tblTournamentAndPlayer values(	11	,	41	,	3	,1);
insert into tblTournamentAndPlayer values(	11	,	63	,	4	,1);
insert into tblTournamentAndPlayer values(	11	,	68	,	5	,1);
insert into tblTournamentAndPlayer values(	11	,	39	,	6	,1);
insert into tblTournamentAndPlayer values(	12	,	22	,	1	,1);
insert into tblTournamentAndPlayer values(	12	,	18	,	2	,1);
insert into tblTournamentAndPlayer values(	12	,	14	,	3	,1);
insert into tblTournamentAndPlayer values(	12	,	67	,	4	,1);
insert into tblTournamentAndPlayer values(	12	,	5	,	5	,1);
insert into tblTournamentAndPlayer values(	12	,	64	,	6	,1);
insert into tblTournamentAndPlayer values(	13	,	45	,	1	,1);
insert into tblTournamentAndPlayer values(	13	,	50	,	2	,1);
insert into tblTournamentAndPlayer values(	13	,	26	,	3	,1);
insert into tblTournamentAndPlayer values(	13	,	52	,	4	,1);
insert into tblTournamentAndPlayer values(	13	,	71	,	5	,1);
insert into tblTournamentAndPlayer values(	13	,	74	,	6	,1);
insert into tblTournamentAndPlayer values(	14	,	40	,	1	,1);
insert into tblTournamentAndPlayer values(	14	,	27	,	2	,1);
insert into tblTournamentAndPlayer values(	14	,	42	,	3	,1);
insert into tblTournamentAndPlayer values(	14	,	59	,	4	,1);
insert into tblTournamentAndPlayer values(	14	,	62	,	5	,1);
insert into tblTournamentAndPlayer values(	14	,	66	,	6	,1);
*/

