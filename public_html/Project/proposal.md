# Project Name: Arcade
## Project Summary: This project will create a simple Arcade with scoreboards and competitions based on the implemented game.
## Github Link: (Prod Branch of Project Folder)
## Project Board Link: https://github.com/i-am-kalrav/IT202-003/projects/1
## Website Link: https://ks874-prod.herokuapp.com/Project/login.php
## Your Name: Kalrav Srivastava

<!--
### Line item / Feature template (use this for each bullet point)
#### Don't delete this

- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
### End Line item / Feature Template
--> 
### Proposal Checklist and Evidence

- Milestone 1
    - [x] \(12/07/2021) User will be able to register a new account
      - Status: Completed
      - Direct Link:
        - https://ks874-prod.herokuapp.com/Project/register.php
      - Pull Request:
        - https://github.com/i-am-kalrav/IT202-003/pull/22
      - Screenshots are viewable in the above Pull Request
      * Form Fields
        * Username, email, password, confirm password(other fields optional)
        * Email is required and must be validated
        * Username is required
        * Confirm password’s match
      * Users Table
        * Id, username, email, password (60 characters), created, modified
      * Password must be hashed (plain text passwords will lose points)
      * Email should be unique
      * Username should be unique
      * System should let user know if username or email is taken and allow the user to correct the error without wiping/clearing the form
        * The only fields that may be cleared are the password fields

    - [x] \(12/07/2021) User will be able to login to their account (given they enter the correct credentials)
      - Status: Completed
      - Direct Link:
        - https://ks874-prod.herokuapp.com/Project/login.php
      - Pull Request:
        - https://github.com/i-am-kalrav/IT202-003/pull/24
      - Screenshots are viewable in the above Pull Request
      * Form
        * User can login with **email **or **username**
          * This can be done as a single field or as two separate fields
        * Password is required
      * User should see friendly error messages when an account either doesn’t exist or if passwords don’t match
      * Logging in should fetch the user’s details (and roles) and save them into the session.
      * User will be directed to a landing page upon login
        * This is a protected page (non-logged in users shouldn’t have access)
        * This can be home, profile, a dashboard, etc
    
    - [x] \(12/07/2021) User will be able to logout
      - Status: Completed
      - Direct Link:
        - https://ks874-prod.herokuapp.com/Project/logout.php
      - Pull Request:
        - https://github.com/i-am-kalrav/IT202-003/pull/25
      - Screenshots are viewable in the above Pull Request
      * Logging out will redirect to login page
      * User should see a message that they’ve successfully logged out
      * Session should be destroyed (so the back button doesn’t allow them access back in)

    
    - [x] \(12/07/2021) Basic security rules implemented
      - Status: Completed
      - Direct Link:
        - https://ks874-prod.herokuapp.com/lib/functions.php
      - Pull Request:
        - https://github.com/i-am-kalrav/IT202-003/pull/26
      - Screenshots are viewable in the above Pull Request
      - * Authentication:
        * Function to check if user is logged in
        * Function should be called on appropriate pages that only allow logged in users
      * Roles/Authorization:
        * Have a roles table (see below)

    
    - [x] \(12/07/2021) Basic Roles implemented
      - Status: Completed
      - Direct Link:
        - https://ks874-prod.herokuapp.com/Project/sql/002_create_table_roles.sql
        - https://ks874-prod.herokuapp.com/Project/sql/003_create_table_userroles.sql
      - Pull Request:
        - https://github.com/i-am-kalrav/IT202-003/pull/27
      - Screenshots are viewable in the above Pull Request
      * Have a Roles table	(id, name, description, is_active, modified, created)
      * Have a User Roles table (id, user_id, role_id, is_active, created, modified)
      * Include a function to check if a user has a specific role (we won’t use it for this milestone but it should be usable in the future)

    
    - [x] \(12/07/2021) Site should have basic styles/theme applied; everything should be styled
      - Status: Completed
      - Direct Link:
        - https://ks874-prod.herokuapp.com/partials/prism.php
      - Pull Request:
        - https://github.com/i-am-kalrav/IT202-003/pull/28
      - Screenshots are viewable in the above Pull Request
      * I.e., forms/input, navigation bar, etc need to be stylized

    
    - [x] \(12/07/2021) Any output messages/errors should be “user friendly”
      - Status: Completed
      - Direct Link:
        - https://ks874-prod.herokuapp.com/partials/flash.php
      - Pull Request:
        - https://github.com/i-am-kalrav/IT202-003/pull/29
      - Screenshots are viewable in the above Pull Request
      * Any technical errors or debug output displayed will result in a loss of points

    
    - [x] \(12/07/2021) User will be able to see their profile
      - Status: Completed
      - Direct Link:
        - https://ks874-prod.herokuapp.com/Project/profile.php
      - Pull Request:
        - https://github.com/i-am-kalrav/IT202-003/pull/30
      - Screenshots are viewable in the above Pull Request
      * Email, username, etc should be visible in profile page

    
    - [x] \(12/07/2021) User will be able to edit their profile
      - Status: Completed
      - Direct Link:
        - https://ks874-prod.herokuapp.com/Project/profile.php
      - Pull Request:
        - https://github.com/i-am-kalrav/IT202-003/pull/31
      - Screenshots are viewable in the above Pull Request
      * Changing username/email should properly check to see if it’s available before allowing the change
      * Any other fields should be properly validated
      * Allow password reset (only if the existing correct password is provided)
        * Hint: logic for the password check would be similar to login


- Milestone 2
    - [x] \(12/20/2021) Pick a simple game to implement, anything that generates a score that’s more advanced than a simple random number generator (may build off of a sample from the site shared in class)
      * What game will you be doing?
          * **Arcade Shooter**
      * Briefly describe it.
          * Edited the Shoot 'Em game. We can avoid or kill enemies by shooting them. We can collect power ups which increase ship speed, bullet speed and bullet size. If power is collected using bullets, then score is also incremented. Game is not over if the enemy reaches wall behind our ship (unless you had 0 points); there is a score decrement in that case. Game Over only occurs in the case  of enemy colliding directly with the ship.
      * **Note**: For this milestone the game doesn’t need to be complete, just have something basic or a placeholder that can generate a score when played.
        - Status: Completed
        - Direct Link:
          - https://ks874-prod.herokuapp.com/Project/game.php
        - Pull Requests
          - https://github.com/i-am-kalrav/IT202-003/pull/55
        - Screenshots
          - Arcade Shooter Game:
            ![image](https://user-images.githubusercontent.com/73673683/146851283-c35b9fad-a159-410f-8596-1d6958e7a90d.png)


    - [x] \(12/20/2021) The system will save the user’s score at the end of the game if the user is logged in
      * There should be a scores table (id, user_id, score, created)
      * Each received score is a new entry (scores will not be updated)
        - Status: Completed
        - Direct Link:
          - https://ks874-prod.herokuapp.com/Project/game.php
          - https://ks874-prod.herokuapp.com/Project/sql/007_create_table_scores.sql
          - https://ks874-prod.herokuapp.com/Project/api/save_score.php
        - Pull Requests
          - https://github.com/i-am-kalrav/IT202-003/pull/56
        - Screenshots
          - Scores Table:
            ![image](https://user-images.githubusercontent.com/73673683/146854115-0c66fbeb-e25c-4216-93c3-eb6f6c0a3b81.png)
            ![image](https://user-images.githubusercontent.com/73673683/146854194-74c0a981-99a1-4f30-a3fc-67e8c56bf068.png)

          - Insert new Score into Scores Table:
            ![image](https://user-images.githubusercontent.com/73673683/146854328-b8765e5b-1225-4305-8742-e13a582a913f.png)
            ![image](https://user-images.githubusercontent.com/73673683/146854382-56f29599-17b2-4b7e-8117-79db24e7a24d.png)
            ![image](https://user-images.githubusercontent.com/73673683/146854432-f7ba875e-2c5c-4dae-b9e6-ff45060955cf.png)
    
    - [x] \(12/20/2021) The user will be able to see their last 10 scores
      * Show on their profile page
      * Ordered by most recent
        - Status: Completed
        - Direct Link:
          - https://ks874-prod.herokuapp.com/Project/profile.php
        - Pull Requests
          - https://github.com/i-am-kalrav/IT202-003/pull/57
        - Screenshots
          - Latest 10 Scores of the User that is logged in:
            - User = Kalrav
              ![image](https://user-images.githubusercontent.com/73673683/146855503-7ea6eddb-e584-4597-9d2a-94e982eea45d.png)
            - User = Amit
              ![image](https://user-images.githubusercontent.com/73673683/146855573-727cb529-4e3d-47c6-a226-1174137d568e.png)


    
    - [x] \(12/20/2021) Create functions that output the following scoreboards (this will be used later)
      * Top 10 Weekly
      * Top 10 Monthly
      * Top 10 Lifetime
      * Scoreboards should show no more than 10 results; if there are no results a proper message should be displayed (i.e., “No [time period] scores to display”)
        - Status: Completed
        - Direct Link:
          - https://ks874-prod.herokuapp.com/Project/home.php
          - https://ks874-prod.herokuapp.com/partials/highscore_table.php
          - https://ks874-prod.herokuapp.com/lib/functions.php
        - Pull Requests
          - https://github.com/i-am-kalrav/IT202-003/pull/58
        - Screenshots
          - Function to get weekly, monthly and all-time top 10 scores:
            ![image](https://user-images.githubusercontent.com/73673683/146856593-b5916477-4d3b-4f71-aef5-bab9e60dcdcb.png)
          - ScoreBoards:
            - Weekly:
              ![image](https://user-images.githubusercontent.com/73673683/146856742-dd814073-dcbe-431b-a004-2f400bda453a.png)
            - Monthly:
              ![image](https://user-images.githubusercontent.com/73673683/146856762-0f358e9a-fa16-4761-8e08-3f6c105389bd.png)
            - All-time:
              ![image](https://user-images.githubusercontent.com/73673683/146856788-af6fd138-387d-493b-9da6-41d21426e9b6.png)



- Milestone 3
  - [x] \(12/22/2021) Users will have points associated with their account.
    * Alter the User table to include points with a default of 0.
        * This field will not be incremented/decremented directly, you must use the PointsHistory table to calculate it and set it each time the points change
    * Points should show on their profile page
        * You may show points elsewhere _as well_ if you wish
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/home.php
      - https://ks874-prod.herokuapp.com/Project/sql/008_alter_table_users_points.sql
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/71
    - Screenshots
      - Users table now has points column:
          ![image](https://user-images.githubusercontent.com/73673683/147211524-34e868b0-f7d0-427e-994f-f2852d1a66e1.png)

      - Points (Balance) visible on every page on the nav bar itself:
          ![image](https://user-images.githubusercontent.com/73673683/147211792-30c67cb7-b9cc-4c6b-8070-3b37295cb3ce.png)
  
  - [x] \(12/22/2021) Create a PointsHistory table (id, user_id, point_change, reason, created)
    * Any new entry should update the user’s points value (do not update the User points column directly)
        * SUM the point_change for the user_id to get the total
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/sql/009_create_table_pointshistory.sql
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/72
    - Screenshots
      - PointsHistory Table:
        - SQL
          ![image](https://user-images.githubusercontent.com/73673683/147214497-5f354354-2228-42bd-8d34-3f86399d0713.png)
        - Actual Table
          ![image](https://user-images.githubusercontent.com/73673683/147215367-3c2c4c27-202d-42b5-a486-ba17f7db37f7.png)

  
  - [x] \(12/22/2021) Competitions table should have the following columns (id, name, created, duration, expires (now + duration), current_reward, starting_reward, join_fee, current_participants, min_participants, paid_out (boolean), min_score, first_place_per, second_place_per, third_place_per, cost_to_create, created, modified)
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/sql/010_create_table_competitions.sql
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/73
    - Screenshots
      - Competitions Table:
        - SQL:
            ![image](https://user-images.githubusercontent.com/73673683/147215912-31443d19-f35c-4c4b-839c-fd992bbc9f4b.png)

        - Actual Table:
            ![image](https://user-images.githubusercontent.com/73673683/147216027-31453841-30d7-4733-8b5b-5a1fce449e27.png)

            ![image](https://user-images.githubusercontent.com/73673683/147216170-ff4937a7-a2f8-42f3-b5b2-8084ea9d275e.png)

  
  - [x] \(12/22/2021) User will be able to create a competition
    * Competitions will start at 1 point (reward)
    * User sets a name for the competition
    * User determines % given for 1st, 2nd, and 3rd place winners
        * Combination must be equal to 100% (no more, no less)
    * User determines if it’s free to join or the cost to join (min 0 for free)
    * User determines the duration of the competition (in days)
    * User can determine the minimum score to qualify (min 0)
    * User determines minimum participants for payout (min 3)
    * Show any user friendly error messages
    * Show user friendly confirmation message that competition was created
    * The cost to the creator of the competition will be (1 + starting reward value)
        * If they can’t afford it, the competition should not be created
        * If they can afford it, automatically add them to the competition
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/create_competition.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/74
    - Screenshots
      - Create Competition:
        ![image](https://user-images.githubusercontent.com/73673683/147217694-0609bece-e608-46eb-8a65-b8c5a2a58462.png)

      - create_competition.php page:
        ![image](https://user-images.githubusercontent.com/73673683/147217870-4cedce23-5c57-4624-8d0b-836f124c19d0.png)

      - Empty Name is not allowed:
        ![image](https://user-images.githubusercontent.com/73673683/147217932-85557198-eb42-4f44-9522-27a2f36dd5e6.png)

      - Created Name; Starting Reward is 1 point by default; Minimum and default duration in days is 1:
        ![image](https://user-images.githubusercontent.com/73673683/147218164-959862cd-c674-4efd-b2fd-89547ecc08c6.png)

      - Min required Participants and Score to qualify is 3;
        ![image](https://user-images.githubusercontent.com/73673683/147218482-223604fd-bf51-4570-b244-b439c88e67fc.png)
        ![image](https://user-images.githubusercontent.com/73673683/147218524-08c787b8-a849-4892-95b9-099c6841b972.png)

      - The sum of the % rewards for the top 3 ranks needs to sum to 100%:
        ![image](https://user-images.githubusercontent.com/73673683/147218732-55d16dc4-7d53-432b-9c95-3abcaa2a9442.png)
        ![image](https://user-images.githubusercontent.com/73673683/147218765-40677032-65c4-4a21-bbb0-8aa4aa8af9be.png)
        ![image](https://user-images.githubusercontent.com/73673683/147218798-e61a8671-fd31-4547-9c69-15ef90f54430.png)
        ![image](https://user-images.githubusercontent.com/73673683/147218825-49d0efc9-f77a-4bb6-a8f7-7515e9e6bf57.png)

      - When sum = 100:
        ![image](https://user-images.githubusercontent.com/73673683/147218876-bb4fc309-873a-4720-a578-9905f40f7a57.png)
        ![image](https://user-images.githubusercontent.com/73673683/147218911-2fadd6a9-5437-481e-9b40-81d30d69f98d.png)
      
      - Joined Automatically (enough points to create and join):
        ![image](https://user-images.githubusercontent.com/73673683/147219411-89c0e6f3-014f-4da6-acf4-46f16ac6e41b.png)


  
  - [x] \(12/22/2021) Each new participant causes the Reward value to increase by at least 1 or 50% of the joining fee rounded up
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/competitions.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/75
    - Screenshots
      - Reward before Joining (for Game0 with ends date: 2021-12-25 22:03:32):
          ![image](https://user-images.githubusercontent.com/73673683/147220432-7b976711-dbb7-46c1-a9d5-9b84afe2eceb.png)

      - Reward after Joining (for Game0 with ends date: 2021-12-25 22:03:32):
          ![image](https://user-images.githubusercontent.com/73673683/147220610-3d0fbfc0-492a-495e-8597-8325888ba6da.png)

  
  - [x] \(12/22/2021) Have a page where the User can see active competitions (not expired)
    * For this milestone limit the output to a maximum of 10
    * Order the results by soonest to expire
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/competitions.php
      - https://ks874-prod.herokuapp.com/Project/competitions.php?filter=expired
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/76
    - Screenshots
      - Active Competitions Only:
          ![image](https://user-images.githubusercontent.com/73673683/147221328-cd0069cb-f7e6-40f5-bf53-0dbcbeccbc03.png)

      - Expired Competition not included in active ones:
          ![image](https://user-images.githubusercontent.com/73673683/147221408-2f68b6c6-b7c7-45b5-ba03-617f57800cd0.png)

  
  - [x] \(12/22/2021) Will need an association table CompetitionParticipants (id, comp_id, user_id, created)
    * Comp_id and user_id should be a composite unique key (user can only join a competition once)
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/sql/010_create_table_competitionparticipants.sql
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/77
    - Screenshots
      - CompetitionParticipants Table:
        - Sql (With Composite Keys- The Unique Key):
            ![image](https://user-images.githubusercontent.com/73673683/147222321-6413d0e3-c621-431b-bd46-16ace53d9516.png)

        - Actual Table:
            ![image](https://user-images.githubusercontent.com/73673683/147222582-ccf9f3de-145c-4d3f-ac69-6a96f2ef15a6.png)

  
  - [x] \(12/22/2021) User can join active competitions
    * Creates an entry in CompetitionParticipants
    * Recalculate the Competitions.participants value based on the count of participants for this competition from the CompetitionParticipants table.
    * Update the Competitions.reward based on the # of participants and the appropriate math from the competition requirements above
        * Best to due this based on a simple equation via the initial Competition data and participants
    * Show proper error message if user is already registered
    * Show proper confirmation if user registered successfully
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/competitions.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/78
    - Screenshots
      - Active Competitions (can join if not already joined):
          ![image](https://user-images.githubusercontent.com/73673683/147226371-beee7039-8032-461c-b4d2-0e3595b7d793.png)

      - No option to join if already joined:
          ![image](https://user-images.githubusercontent.com/73673683/147226528-46bc1f1b-6ab3-41ea-9f17-639ef33bcdef.png)

      - No option to join expired ones:
          ![image](https://user-images.githubusercontent.com/73673683/147226563-c3c6ee57-b8ce-47de-941e-b7680860433d.png)
      
      - Joining Game a1:
          ![image](https://user-images.githubusercontent.com/73673683/147226943-26d36fbb-e5f7-4a8f-8ea9-665d025288c0.png)
          ![image](https://user-images.githubusercontent.com/73673683/147226962-60d9d6a0-167b-43ec-8955-ac8c7cee5c8a.png)

  
  - [x] \(12/22/2021) Create function that calculates competition winners
    * Get all expired and not paid_out competitions
    * For each competition
        * Check that the participant count against the minimum required
        * Get the top 3 winners
          * **Pick 1 (strike out the option you won’t do; do not delete):**    (Option 1 waas used)
            * **Option 1: **Scores are calculated by the sum of the score from the Scores table where it was earned/created between Competition start and Competition expires timestamps
            * ~~Option 2: Where the score was earned/created between when the user joined the competition and when the Competition expires~~
        * Calculate the payout (reward * place_percent)
            * Round up the value (it’s ok to pay out an extra point here and there)
        * Create entries for the Users in the PointsHistory table
            * Apply the new values (SUM) to their points column in the Users table after entry is added
            * Reason should be recorded as ‘competition’ (or something with more precise information)
        * Mark the competition as paid_out = true
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/lib/functions.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/79
    - Screenshots
      - Function to get top 3 of the competition:
          ![image](https://user-images.githubusercontent.com/73673683/147227746-d2b0a9be-c90a-4d54-9852-3cfd57d6c563.png)

      - Function to distribute rewards where deserved and update all the necessary tables:
          ![image](https://user-images.githubusercontent.com/73673683/147228108-af3fa8a5-d14a-4763-858a-48565b16daeb.png)
  
  

- Milestone 4
- [ ] \(12/23/2021) User can set their profile to be public or private (will need another column in Users table)
  * If public, hide email address from other users
    - Status: Incomplete
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/sql/010_create_table_competitionparticipants.sql
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/92
      - https://github.com/i-am-kalrav/IT202-003/pull/91
    - Screenshots
      - Alter table to make another column visibility:
          ![image](https://user-images.githubusercontent.com/73673683/147249416-21e6e770-7217-4235-9478-f0a8dfaff239.png)
      - Users Table:
          ![image](https://user-images.githubusercontent.com/73673683/147250640-c0bc68eb-3e1c-4896-a747-f4a083f846d7.png)
      - This feature (Public/Private Profile) is not yet complete. Although I have written some code for it, I don't have enough time to debug, troubleshoot and make it work properly with the system.
          ![image](https://user-images.githubusercontent.com/73673683/147249130-b9a86f46-4df3-4b52-bb88-30de9c79ef57.png)


- [x] \(12/23/2021) User will be able to see their competition history
  * Limit to 10 results
  * Paginate anything after 10
  * If no results, show the appropriate message
    - Status: Partially Working
      - Even though, it does show 10 records at a time, and I have the functions for pagination in functions.php, I didn't have enough time to actually implement them and make use of them.
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/competitions.php
      - https://ks874-prod.herokuapp.com/lib/functions.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/93
    - Screenshots
      - Joined History shows all the competitions the user has joined to date:
          ![image](https://user-images.githubusercontent.com/73673683/147251155-4b713376-f4fc-4f43-ac12-965662133e80.png)
      - None of them has the option to join:
          ![image](https://user-images.githubusercontent.com/73673683/147251304-b20cca9f-f067-4c37-bc8e-a8a35378483e.png)


- [ ] \(12/23/2021) User with the role of “admin” can edit a competition where paid_out = false
  * They can adjust any of the regular form values
  * If the competition was expired they can update the duration to include extra time
    - Status: Incomplete
      - I, unfortunately, didn't have enough time to implement the necessary features of admin.
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/competitions.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/94
    - Screenshots
      - I, unfortunately, didn't have enough time to implement the necessary features of admin:
          ![image](https://user-images.githubusercontent.com/73673683/147252283-d703440f-37e1-46aa-ba46-d1d4dba69bb2.png)


- [ ] \(12/23/2021) Add pagination to the Active Competitions view
  * Show 10 competitions per page
  * Paginate anything after 10
  * If no results, show the appropriate message
    - Unfortunately, I didn't have enough time to implement the 2 pagination functions and actually make use of them for the system.
    - Status: Partially working
    - Direct Link:
      - https://ks874-prod.herokuapp.com/lib/functions.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/95
    - Screenshots
      - I have these 2 functions for pagination:
          ![image](https://user-images.githubusercontent.com/73673683/147253104-4262fd20-8f7c-4104-803c-59728e1590fa.png)


- [ ] \(12/23/2021) Anywhere a username is displayed should be a link to that user’s profile
  * This includes all scoreboards
  * If the profile is private you can have the page just display “this profile is private” upon access
    - Status: Partially Working
      - The links were working as intended during the Milestone2 phase, but currently are malfunctioning and redirecting to the logged in user's own profile page.
      - I could likely figure it out and resolve the issue, but unfortunately, I am extremely short on time and I can't have the opportunity to play around with the system while debugging its contents
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/96
    - Screenshots
      - All User Names have Links:
          ![image](https://user-images.githubusercontent.com/73673683/147255493-d5ae83a6-1edd-4821-bcfb-8960af402143.png)
          ![image](https://user-images.githubusercontent.com/73673683/147255923-d4dfc5cd-a470-4d6e-b97d-7cd9b1273c74.png)


- [ ] \(12/23/2021) Viewing an active or expired competition should show the top 10 scoreboard related to that competition
    - Status: Almost Partially Working
      - Again, I have the functions for pagination, but because of me being late and therefore short on time, I did not have the opportunity to try implementing these functions properly.
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/competitions.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/97
    - Screenshots
      - 10 competitions show up on the page at a time.
      - Active Competitions:
          ![image](https://user-images.githubusercontent.com/73673683/147257572-d28e4b9f-ef19-4469-91c7-3320a589bebf.png)
      - Expired Competitions:
          ![image](https://user-images.githubusercontent.com/73673683/147257651-68b4a670-9019-49a3-8481-0df88f47f988.png)


- [x] \(12/23/2021) Game should be fully implemented/complete by this point
  - Game should tell the player if they’re not logged in that their score will not be recorded.
    - Status: Completed
      - We cannot access the game without being logged in. So to get our score saved, we need to make sure to log in and then play the game. That is the only instance in which the score of a game is saved.
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/game.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/98
    - Screenshots
      - Game works as intended:
          ![image](https://user-images.githubusercontent.com/73673683/147259193-3a40028e-7044-4134-bfea-0801d2ffbfb4.png)
      - Score is saved because user is logged in:
          ![image](https://user-images.githubusercontent.com/73673683/147259408-c3a3be56-4e29-4053-8c6c-646d8b2ef240.png)

      - If we try to access the page while being logged out:
          ![image](https://user-images.githubusercontent.com/73673683/147259546-67e0363a-3221-4057-82b7-9a8a8fb942a9.png)
          ![image](https://user-images.githubusercontent.com/73673683/147259525-0b16b638-4e2d-41c4-bb1e-add9bdc48a97.png)

      - We are redirected to the login page to first login before playing the game:
          ![image](https://user-images.githubusercontent.com/73673683/147259632-131cdcc7-5e6a-451e-ac30-2500adc68947.png)


- [ ] \(12/23/2021) User’s score history will include pagination
  * Show latest 10
  * Paginate after 10
  * Show appropriate message for no results
    - Status: Almost Completely Working
      - Not paginated because didn't get a chance to work further on it due to shortage of time.
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/profile.php
      - https://ks874-prod.herokuapp.com/lib/functions.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/99
    - Screenshots
      - Latest 10 scores:
          ![image](https://user-images.githubusercontent.com/73673683/147261400-6ed258b5-b803-4393-a5ab-8b74b644b44b.png)

      - Function:
          ![image](https://user-images.githubusercontent.com/73673683/147261659-56e19bc0-3d0d-4d89-8256-b9ba49c22ea9.png)

      - Error/problem Message:
          ![image](https://user-images.githubusercontent.com/73673683/147261740-50b03dfa-a0a7-4028-bb0d-138cda9c4f67.png)


- [x] \(12/23/2021) Home page will have a weekly, monthly, and lifetime scoreboard
  * Will also have a link to the game
  * Scoreboards will show username and points for the session
      * (See requirement about username linking to profile)
    - Status: Completed
    - Direct Link:
      - https://ks874-prod.herokuapp.com/Project/home.php
      - https://ks874-prod.herokuapp.com/partials/highscore_table.php
      - https://ks874-prod.herokuapp.com/lib/functions.php
    - Pull Requests
      - https://github.com/i-am-kalrav/IT202-003/pull/101
      - https://github.com/i-am-kalrav/IT202-003/pull/102
    - Screenshots
      - Function to get top 10 scores for a duration:
          ![image](https://user-images.githubusercontent.com/73673683/147264790-ccebf72a-7be2-4417-8ac6-a5c638687545.png)
      - ScoreBoards have links to the game as well:
          ![image](https://user-images.githubusercontent.com/73673683/147265914-d36b4eab-04a6-4827-9be9-5adc7dd63c87.png)

      - Which takes us to the game page:
          ![image](https://user-images.githubusercontent.com/73673683/147266017-0dab741b-121c-4318-b775-be32e4756a7f.png)



### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone branch as the source)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] (mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project board
