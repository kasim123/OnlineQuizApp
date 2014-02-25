-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2014 at 09:07 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `onlinequiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `androidusers`
--

CREATE TABLE IF NOT EXISTS `androidusers` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(150) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `RefNo` varchar(25) DEFAULT NULL,
  `MagicNo` varchar(25) DEFAULT NULL,
  `CreatedOn` date DEFAULT NULL,
  `IsVerified` int(11) DEFAULT '0',
  `VerificationCode` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `androidusers`
--


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(100) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(41, 'test category'),
(36, 'dfsdfd'),
(35, 'dfsdfd'),
(34, 'dfgdfgdf'),
(33, 'dfdfd'),
(32, 'sdfsdf'),
(42, 'demo'),
(30, 'Category 4'),
(29, 'Category 3'),
(28, 'Category 2'),
(27, 'Category 1');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `ID` int(15) NOT NULL AUTO_INCREMENT,
  `Notification` varchar(500) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Reference` varchar(50) DEFAULT NULL,
  `NotifiedBy` varchar(50) DEFAULT NULL,
  `NotifiedOn` date DEFAULT NULL,
  `Status` int(1) DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `notifications`
--


-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `UserID` varchar(50) DEFAULT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `QuestionID` int(11) NOT NULL AUTO_INCREMENT,
  `VideoID` int(11) DEFAULT NULL,
  `Question` varchar(500) DEFAULT NULL,
  `AnswerA` varchar(250) DEFAULT NULL,
  `AnswerB` varchar(250) DEFAULT NULL,
  `AnswerC` varchar(250) DEFAULT NULL,
  `AnswerD` varchar(250) DEFAULT NULL,
  `CorrectAnswer` varchar(1) DEFAULT NULL,
  `PostedOn` date DEFAULT NULL,
  `PostedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`QuestionID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `questions`
--


-- --------------------------------------------------------

--
-- Table structure for table `slideslist`
--

CREATE TABLE IF NOT EXISTS `slideslist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SlideID` varchar(16) DEFAULT NULL,
  `SlideURL` varchar(1024) DEFAULT NULL,
  `CategoryID` int(10) DEFAULT NULL,
  `Description` varchar(1024) DEFAULT NULL,
  `PostedBy` varchar(50) DEFAULT NULL,
  `PostedOn` date DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `IsActive` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `slideslist`
--


-- --------------------------------------------------------

--
-- Table structure for table `tagslist`
--

CREATE TABLE IF NOT EXISTS `tagslist` (
  `VideoID` int(11) NOT NULL,
  `Tags` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagslist`
--

INSERT INTO `tagslist` (`VideoID`, `Tags`) VALUES
(21, 'Array(0)'),
(21, 'Array(1)'),
(21, 'Array(2)'),
(21, 'wer'),
(21, 'we'),
(21, 'rw'),
(21, 'er'),
(21, 'we'),
(21, 'fgdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` varchar(50) NOT NULL DEFAULT '',
  `Password` varchar(50) DEFAULT NULL,
  `EMail` varchar(150) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `CanRead` varchar(1) DEFAULT NULL,
  `CanWrite` varchar(1) DEFAULT NULL,
  `CanModify` varchar(1) DEFAULT NULL,
  `DateOfCreated` date DEFAULT NULL,
  `Group` varchar(5) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserID`, `Password`, `EMail`, `Gender`, `CanRead`, `CanWrite`, `CanModify`, `DateOfCreated`, `Group`, `IsActive`) VALUES
(1, 'admin', '4641999a7679fcaef2df0e26d11e3c72', 'admin@gmail.com', 'm', 'y', 'y', 'y', '2014-02-02', 'EO', 1),
(2, 'sam', '4641999a7679fcaef2df0e26d11e3c72', 'sam@gmail.com', 'F', '', '', '', '2014-02-11', 'LC', 1),
(3, 'ram', '4641999a7679fcaef2df0e26d11e3c72', 'ramkumar_v87@yahoo.co.in', 'M', '', '', '', '2014-02-11', 'LH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videodetails`
--

CREATE TABLE IF NOT EXISTS `videodetails` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `VideoID` int(11) DEFAULT NULL,
  `UserID` varchar(150) DEFAULT NULL,
  `ViewedOn` date DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL,
  `Selected Answer` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videodetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `videoslist`
--

CREATE TABLE IF NOT EXISTS `videoslist` (
  `VideoID` int(11) NOT NULL AUTO_INCREMENT,
  `URL` varchar(1024) DEFAULT NULL,
  `Thumbnail` varchar(1024) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `PostedOn` date DEFAULT NULL,
  `PostedBy` varchar(50) DEFAULT NULL,
  `Status` int(1) DEFAULT '3',
  `IsActive` int(1) DEFAULT '0',
  PRIMARY KEY (`VideoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `videoslist`
--

INSERT INTO `videoslist` (`VideoID`, `URL`, `Thumbnail`, `CategoryID`, `Description`, `PostedOn`, `PostedBy`, `Status`, `IsActive`) VALUES
(1, 'http://www.youtube.com/watch?v=uOiB87dvwLw', 'http://www.youtube.com/watch?v=uOiB87dvwLw', 27, '                                                                                                 This Video will demonstrate that how to install WhatsApp on Desktop                                                                                           ', '2014-02-12', 'admin', 1, 0),
(2, 'http://www.youtube.com/watch?v=ekTTXoHBmWw', 'http://www.youtube.com/watch?v=ekTTXoHBmWw', 28, 'This is an video tutorial for Oracle 12c New Features', '2014-02-12', 'admin', 1, 0),
(3, 'http://www.youtube.com/watch?v=BXsEikCabns', 'http://www.youtube.com/watch?v=BXsEikCabns', 27, 'SQL Server Management Studion Tricks & Tips', '2014-02-12', 'admin', 1, 0),
(4, 'http://www.youtube.com/watch?v=ekTTXoHBmWw', 'http://www.youtube.com/watch?v=ekTTXoHBmWw', 28, '                                This is an video tutorial for Oracle 12c New Features                                ', '2014-02-12', 'admin', 1, 0),
(5, 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 28, '                                demo, demo2, demo3, demo4, sdfsd                                                                ', '2014-02-13', 'admin', 1, 0),
(6, 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 27, 'test video', '2014-02-13', 'admin', 1, 0),
(7, 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 27, 'test video', '2014-02-13', 'admin', 1, 0),
(8, 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 27, 'test video', '2014-02-13', 'admin', 1, 0),
(9, 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 27, 'test video', '2014-02-13', 'admin', 1, 0),
(10, 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 'http://www.youtube.com/watch?v=PYhXcQkFSBo', 27, 'demo video', '2014-02-13', 'admin', 1, 0),
(11, 'http://www.youtube.com/watch?v=uOiB87dvwLw', 'http://www.youtube.com/watch?v=uOiB87dvwLw', 27, 'test', '2014-02-13', 'admin', 1, 0),
(12, 'http://www.youtube.com/watch?v=uOiB87dvwLw', 'http://www.youtube.com/watch?v=uOiB87dvwLw', 27, 'fsd\nfsd\nf', '2014-02-13', 'admin', 1, 0);
