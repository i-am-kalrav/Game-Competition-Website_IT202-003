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
    /*reward_increase float DEFAULT 1,
    payouts VARCHAR(30) DEFAULT '.7,.3,.2' COMMENT 'CSV of payout percentages to users in that place, should total to 1.0, chose to do it slightly different than the proposal',
    did_payout tinyint(1) DEFAULT 0,
    is_expired tinyint(1) DEFAULT 0 COMMENT 'convenience for expirey check queries',*/
    expires TIMESTAMP,
    /*expires CURRENT_TIMESTAMP + duration,*/
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
    /*FOREIGN KEY (creator) REFERENCES Users(id)*/
)