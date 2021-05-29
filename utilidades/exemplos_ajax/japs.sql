CREATE TABLE `japs_cidade_dados` (
  `cidade_pk` int(11) NOT NULL auto_increment,
  `estado_fk` int(11) default NULL,
  `cidade` varchar(100) default NULL,
  `descricao` text,
  PRIMARY KEY  (`cidade_pk`)
) TYPE=MyISAM;

CREATE TABLE `japs_estado_dados` (
  `estado_pk` int(11) NOT NULL auto_increment,
  `estado` varchar(10) default NULL,
  PRIMARY KEY  (`estado_pk`)
) TYPE=MyISAM;

CREATE TABLE `ratings` (
  `id` varchar(11) NOT NULL default '',
  `total_votes` int(11) NOT NULL default '0',
  `total_value` int(11) NOT NULL default '0',
  `which_id` int(11) NOT NULL default '0',
  `used_ips` longtext,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;