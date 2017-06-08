#category-tables.sql

DROP TABLE IF EXISTS feed_category_music;

CREATE TABLE feed_category_music (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
DateAdded DATETIME,
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 

INSERT INTO feed_category_music VALUES (NULL,'Indie Music','Music from Indie artists','https://news.google.com/news?q=music_indie&output=rss', NOW());
INSERT INTO feed_category_music VALUES (NULL,'EDM','Music from electronic dance artists','https://news.google.com/news?q=music_edm&output=rss', NOW());
INSERT INTO feed_category_music VALUES (NULL,'Hip-Hop','Music from Hip-Hop artists','https://news.google.com/news?q=music_hip-hop&output=rss', NOW());


DROP TABLE IF EXISTS feed_category_sea_creatures;

CREATE TABLE feed_category_sea_creatures (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
DateAdded DATETIME,
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 

INSERT INTO feed_category_sea_creatures VALUES (NULL,'Seals','Semi-aquatic marine mammals','https://news.google.com/news?q=seals&output=rss', NOW());
INSERT INTO feed_category_sea_creatures VALUES (NULL,'Narwhals','Medium-sized toothed whale that possesses a large "tusk" from a protruding canine tooth','https://news.google.com/news?q=narwhals&output=rss', NOW());
INSERT INTO feed_category_sea_creatures VALUES (NULL,'Orcas','Aka Killer Whales, toothed whale belonging to the oceanic dolphin family','https://news.google.com/news?q=whales&output=rss', NOW());
                                                

DROP TABLE IF EXISTS feed_category_travel;

CREATE TABLE feed_category_travel (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
DateAdded DATETIME,
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 
                                                
INSERT INTO feed_category_travel VALUES (NULL,'Air Travel','Plane, Blimp/Zeppelin, Hot air balloon','https://news.google.com/news?q=travel_air&output=rss', NOW());  
INSERT INTO feed_category_travel VALUES (NULL,'Sea','Curise ship, Yacht, Boat','https://news.google.com/news?q=travel_sea&output=rss', NOW()); 
INSERT INTO feed_category_travel VALUES (NULL,'Land Travel','Automobile, Bus, Train, Bike','https://news.google.com/news?q=travel_land&output=rss', NOW()); 

DROP TABLE IF EXISTS rss_feed_details;

CREATE TABLE rss_feed_details (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
DateAdded DATETIME,
Image_Title TEXT DEFAULT '',
Image_Url TEXT DEFAULT '',
Image_Link TEXT DEFAULT '',
Image_Width TEXT DEFAULT '',
Image_Height TEXT DEFAULT '',
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 