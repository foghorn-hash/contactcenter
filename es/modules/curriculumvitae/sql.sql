-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_config` (
  `cid` int(8) NOT NULL auto_increment,
  `public` char(3) NOT NULL default '',
  `pdf` varchar(255) NOT NULL default '',
  `pic` varchar(255) NOT NULL default '',
  `xml` text NOT NULL,
  `user_id` int(8) NOT NULL default '0',
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_courses` (
  `cid` int(11) NOT NULL auto_increment,
  `cname` varchar(80) default NULL,
  `sname` varchar(50) default NULL,
  `year` varchar(4) default '2004',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_edu` (
  `edid` int(12) NOT NULL auto_increment,
  `edname` varchar(255) NOT NULL default '',
  `edplace` varchar(255) NOT NULL default '',
  `edyear` varchar(255) NOT NULL default '',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`edid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_hobbies` (
  `hid` int(8) NOT NULL auto_increment,
  `content` text NOT NULL,
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`hid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_info` (
  `iid` int(11) NOT NULL auto_increment,
  `content` text NOT NULL,
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`iid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_personaldata` (
  `pdid` int(8) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `content` varchar(255) NOT NULL default '',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`pdid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_recommendations` (
  `rid` int(8) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `contact` varchar(255) NOT NULL default '',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_references` (
  `rid` int(8) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL default '',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_skills` (
  `sid` int(8) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `content` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `years` int(8) NOT NULL default '0',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `es_cv_workexp` (
  `weid` int(11) NOT NULL auto_increment,
  `wename` varchar(40) default NULL,
  `wedes` text,
  `emptype` varchar(255) default NULL,
  `sdate` varchar(10) default '00.00.0000',
  `edate` varchar(30) default '00.00.0000',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

INSERT INTO `es_modules` (`module_id`, `module_name`, `module_var`, `active`, `order_id`) VALUES 
(NULL, 'Curriculum Vitae', 'curriculumvitae', 1, -10);