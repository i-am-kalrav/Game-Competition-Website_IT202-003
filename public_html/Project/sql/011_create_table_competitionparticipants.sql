CREATE TABLE IF NOT EXISTS CompetitionParticipants (
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    comp_id int,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY (user_id, comp_id), -- a user may only join a particular competition once
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (comp_id) REFERENCES Competitions(id)
)
