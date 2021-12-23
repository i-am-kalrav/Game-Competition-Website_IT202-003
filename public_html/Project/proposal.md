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
  - [ ] \(mm/dd/yyyy of completion) Users will have points associated with their account.
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
  
  - [ ] \(mm/dd/yyyy of completion) Create a PointsHistory table (id, user_id, point_change, reason, created)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
  
  - [ ] \(mm/dd/yyyy of completion) Competitions table should have the following columns (id, name, created, duration, expires (now + duration), current_reward, starting_reward, join_fee, current_participants, min_participants, paid_out (boolean), min_score, first_place_per, second_place_per, third_place_per, cost_to_create, created, modified)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
  
  - [ ] \(mm/dd/yyyy of completion) User will be able to create a competition
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
  
  - [ ] \(mm/dd/yyyy of completion) Each new participant causes the Reward value to increase by at least 1 or 50% of the joining fee rounded up
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
  
  - [ ] \(mm/dd/yyyy of completion) Have a page where the User can see active competitions (not expired)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
  
  - [ ] \(mm/dd/yyyy of completion) Will need an association table CompetitionParticipants (id, comp_id, user_id, created)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
  
  - [ ] \(mm/dd/yyyy of completion) User can join active competitions
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
  
  - [ ] \(mm/dd/yyyy of completion) Create function that calculates competition winners
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
  
  

- Milestone 4
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
