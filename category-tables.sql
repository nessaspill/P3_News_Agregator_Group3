#category-tables.sql

DROP TABLE IF EXISTS feed_category_music;
DROP TABLE IF EXISTS feed_category_travel;
DROP TABLE IF EXISTS feed_category_sea_creatures;

DROP TABLE IF EXISTS feed_category;

CREATE TABLE feed_categories (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
FeedID INT UNSIGNED DEFAULT 0,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
DateAdded DATETIME,
PRIMARY KEY (CategoryID)
)ENGINE=INNODB; 


DROP TABLE IF EXISTS feed_details;

CREATE TABLE feed_details (
CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT,
FeedID INT UNSIGNED DEFAULT 0,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
Link TEXT DEFAULT '',
DateAdded DATETIME,
Image_Title TEXT DEFAULT '',
Image_Url TEXT DEFAULT '',
Image_Link TEXT DEFAULT '',
Image_Width TEXT DEFAULT '',
Image_Height TEXT DEFAULT '',
PRIMARY KEY (CategoryID),
INDEX FeedID_index(FeedID),
FOREIGN KEY (FeedID) REFERENCES feed_categories(FeedID) ON DELETE CASCADE
)ENGINE=INNODB;



INSERT INTO feed_categories VALUES (NULL,1,'Music-Indie','Music from Indie artists','https://news.google.com/news?q=music_indie&output=rss', NOW());
INSERT INTO feed_categories VALUES (NULL,1,'Music-EDM','Music from electronic dance artists','https://news.google.com/news?q=music_edm&output=rss', NOW());
INSERT INTO feed_categories VALUES (NULL,1,'Music-Hip-Hop','Music from Hip-Hop artists','https://news.google.com/news?q=music_hip_hop&output=rss', NOW());

INSERT INTO feed_categories VALUES (NULL,2,'Travel-Air','Plane, Blimp/Zeppelin, Hot air balloon','https://news.google.com/news?q=travel_air&output=rss', NOW());  
INSERT INTO feed_categories VALUES (NULL,2,'Travel-Sea','Curise ship, Yacht, Boat','https://news.google.com/news?q=travel_sea&output=rss', NOW()); 
INSERT INTO feed_categories VALUES (NULL,2,'Travel-Land Travel','Automobile, Bus, Train, Bike','https://news.google.com/news?q=travel_land&output=rss', NOW()); 

INSERT INTO feed_categories VALUES (NULL,3,'Sea_Creatures-Seals','Semi-aquatic marine mammals','https://news.google.com/news?q=seals&output=rss', NOW());
INSERT INTO feed_categories VALUES (NULL,3,'Sea_Creatures-Narwhals','Medium-sized toothed whale that possesses a large "tusk" from a protruding canine tooth','https://news.google.com/news?q=narwhals&output=rss', NOW());

INSERT INTO feed_categories VALUES (NULL,3,'Sea_Creatures-Orcas','Aka Killer Whales, toothed whale belonging to the oceanic dolphin family','https://news.google.com/news?q=whales&output=rss', NOW());
                                                



 
                                                


