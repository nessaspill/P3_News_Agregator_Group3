#category-tables.sql


CREATE TABLE feed_category_music (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 

INSERT INTO feed_category_music VALUES (NULL,'Indie Music','Music from Indie artists',''); 
INSERT INTO feed_category_music VALUES (NULL,'EDM/Dance','Music from electronic dance artists',''); 
INSERT INTO feed_category_music VALUES (NULL,'Hip-Hop','Music from Hip-Hop artists',''); 


CREATE TABLE feed_category_sea_creatures (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 

INSERT INTO feed_category_sea_creatures VALUES (NULL,'Seals','Semi-aquatic marine mammals','');
INSERT INTO feed_category_sea_creatures VALUES (NULL,'Narwhals','Medium-sized toothed whale that possesses a large "tusk" from a protruding canine tooth','');
INSERT INTO feed_category_sea_creatures VALUES (NULL,'Orcas','Aka Killer Whales, toothed whale belonging to the oceanic dolphin family',''); 
                                                

CREATE TABLE feed_category_travel (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 
                                                
INSERT INTO feed_category_travel VALUES (NULL,'Air Travel','Plane, Blimp/Zeppelin, Hot air balloon','');  
INSERT INTO feed_category_travel VALUES (NULL,'Sea','Curise ship, Yacht, Boat',''); 
INSERT INTO feed_category_travel VALUES (NULL,'Land Travel','Automobile, Bus, Train, Bike',''); 

CREATE TABLE rss_feed_details (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
Image_Title TEXT DEFAULT '',
Image_Url TEXT DEFAULT '',
Image_Link TEXT DEFAULT '',
Image_Width TEXT DEFAULT '',
Image_Height TEXT DEFAULT '',
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 