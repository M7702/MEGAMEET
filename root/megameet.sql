-- PostgreSQL-compatible SQL dump

BEGIN;

-- Set time zone (optional, PostgreSQL may handle this differently)
SET TIME ZONE 'UTC';

-- Database: megameet

-- Table structure for table booked
CREATE TABLE booked (
  ticket_number SERIAL PRIMARY KEY,
  id INTEGER NOT NULL,
  event_id INTEGER NOT NULL
);

-- Dumping data for table booked
INSERT INTO booked (ticket_number, id, event_id) VALUES
(2, 6, 15),
(3, 6, 10),
(6, 6, 17);

-- Table structure for table cart
CREATE TABLE cart (
  event_id INTEGER NOT NULL,
  id INTEGER NOT NULL
);

-- Dumping data for table cart
INSERT INTO cart (event_id, id) VALUES
(0, 6),
(0, 6),
(11, 6),
(9, 6),
(14, 6),
(17, 6);

-- Table structure for table events
CREATE TABLE events (
  event_id SERIAL PRIMARY KEY,
  id INTEGER NOT NULL,
  event_name VARCHAR(255) NOT NULL,
  event_type VARCHAR(255) NOT NULL,
  event_date DATE NOT NULL,
  event_location VARCHAR(255) NOT NULL,
  event_length INTEGER NOT NULL,
  event_price INTEGER NOT NULL,
  event_fLocation VARCHAR(255) NOT NULL,
  event_include VARCHAR(255) NOT NULL,
  event_omit VARCHAR(255) NOT NULL,
  event_cover VARCHAR(255) NOT NULL,
  event_img1 VARCHAR(255) NOT NULL,
  event_img2 VARCHAR(255),
  event_img3 VARCHAR(255),
  event_img4 VARCHAR(255),
  event_img5 VARCHAR(255)
);

-- Dumping data for table events
INSERT INTO events (event_id, id, event_name, event_type, event_date, event_location, event_length, event_price, event_fLocation, event_include, event_omit, event_cover, event_img1, event_img2, event_img3, event_img4, event_img5) VALUES
(9, 4, 'Cricket Match', 'Sports', '2024-06-27', 'Ahemadabad', 22, 150, ' 132 Feet Ring Rd, inside GMDC ground, University Area, Ahmedabad, Gujarat 380052', 'A cricket match includes players, umpires, cricket equipment, and scorekeepers.', 'It does not include spectators seating for informal matches or food stalls.', '66543b91c5abf.jpg', '66543b91c5db3.jpg', '66543b91c5f33.jpg', '66543b91c614d.jpg', '66543b91c64b4.jpg', '66543b91c666c.jpg'),
(10, 4, 'Football Game', 'Sports', '2024-06-29', 'Gandhidham', 22, 200, 'Gandhinagar Bypass Rd, opposite Aashka Multi-Speciality Hospital, Sargasan, Gandhinagar, Gujarat 382421', 'A football game comprises players, referees, the football itself, and goalposts.', 'The event does not feature cheerleaders or halftime entertainment.', '66545da154603.jpg', '66545da154d73.jpg', '66545da154fd6.jpg', '66545da15520f.jpg', '66545da155444.jpg', '66545da155657.jpg'),
(11, 4, 'Garba', 'Cultural', '2024-07-27', 'Mehesana', 50, 300, 'Pilaji Ganj, Mehsana, Gujarat 384001', ' A Garba event includes traditional dancers, live music, and traditional attire.', 'It does not include Western music or non-traditional attire.', '66545f0b226eb.jpg', '66545f0b22e3b.jpg', '66545f0b22f06.jpg', '66545f0b22f9b.jpg', '66545f0b23030.jpg', '66545f0b230c6.jpg'),
-- (additional rows here)

-- Table structure for table user_info
CREATE TABLE user_info (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  phone_number BIGINT NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  user_type VARCHAR(255) NOT NULL DEFAULT 'user'
);

-- Dumping data for table user_info
INSERT INTO user_info (id, name, phone_number, email, password, user_type) VALUES
(4, 'MIT PRAJAPATI', 9099227700, 's1705d1809p12@gmail.com', '8fc4bc380e6185d2f37a64f0c8f34a93', 'organizer'),
(5, 'SUMIT', 9099227700, 'prajapatisumit1973@gmail.com', '8fc4bc380e6185d2f37a64f0c8f34a93', 'organizer'),
(6, 'MIT', 9099227700, 'mit7702create@gmail.com', '8fc4bc380e6185d2f37a64f0c8f34a93', 'user');

-- Adding Foreign Key Constraints
ALTER TABLE booked
  ADD CONSTRAINT fk_booked_event FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
  ADD CONSTRAINT fk_booked_user FOREIGN KEY (id) REFERENCES user_info(id) ON DELETE CASCADE;

ALTER TABLE cart
  ADD CONSTRAINT fk_cart_user FOREIGN KEY (id) REFERENCES user_info(id) ON DELETE CASCADE;

ALTER TABLE events
  ADD CONSTRAINT fk_events_user FOREIGN KEY (id) REFERENCES user_info(id) ON DELETE CASCADE;

COMMIT;
