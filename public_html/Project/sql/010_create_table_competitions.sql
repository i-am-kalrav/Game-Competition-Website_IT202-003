CREATE TABLE IF NOT EXISTS Competitions(
    id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(30),
    duration int COMMENT 'Duration of the competition in days',
    /*creator int COMMENT 'User who created the competition',*/
    starting_reward int DEFAULT 1,
    current_reward int DEFAULT 1,
    min_participants int DEFAULT 3,
    current_participants int DEFAULT 0,
    join_fee int DEFAULT 0,
    paid_out boolean DEFAULT 0,
    min_score int DEFAULT 0,
    first_place_per int,
    second_place_per int,
    third_place_per int,
    cost_to_create int DEFAULT 0,
    expires TIMESTAMP,
    /*expires CURRENT_TIMESTAMP + duration,*/
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
    /*FOREIGN KEY (creator) REFERENCES Users(id)*/
)
