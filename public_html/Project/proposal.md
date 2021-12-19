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
    - [ ] \(mm/dd/yyyy of completion) Pick a simple game to implement, anything that generates a score that’s more advanced than a simple random number generator (may build off of a sample from the site shared in class)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots

    - [ ] \(mm/dd/yyyy of completion) The system will save the user’s score at the end of the game if the user is logged in
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
    
    - [ ] \(mm/dd/yyyy of completion) The user will be able to see their last 10 scores
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show

    
    - [ ] \(mm/dd/yyyy of completion) Create functions that output the following scoreboards (this will be used later)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show



- Milestone 3
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
