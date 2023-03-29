<div align="center">
<img src="public/assets/Full Logo/PNG/StokBox-05.png" alt="StokBox Logo" width="200">
</div><br>
<div align="center"><h1>StokBox Analytics - Group 24</h1></div>


[[_TOC_]]
  
# Project Installation
1. Install Composer from https://getcomposer.org. Verify it's installed by typing `composer --version` in Terminal/Command Prompt
2. Clone this repository `git clone https://campus.cs.le.ac.uk/gitlab/co2201-2023/group-24/`.
3. Open the folder in VSCode or PHPStorm
4. Open terminal in the project root and run the following commands:

**Install PHP dependancies:**
```
composer install
```
**Generate local configuration file:**
```
cp .env.example .env
```
**Generate application key:**
```
php artisan key:generate
```
**Run database migrations and seed with sample data:**
```
php artisan migrate:fresh --seed
```
**Run localhost development server:**
```
php artisan serve
```

# Group Documentation
## Group Members
- Jack Trafford
- George Rogers
- Raihaan Azam
- Hemal Patel
- Darren Wu
- David Igandan
- Tharidhu Angodage
- Suraj Cheema

## Assigned Scrum Masters
- **Week 1:** Jack Trafford
- **Week 2:** Darren Wu
- **Week 3:** Suraj Cheema
- **Week 4:** Tharidhu Angodage
- **Week 5:** George Rogers
- **Week 6:** Hemal Patel
- **Week 7:** David Igandan
- **Week 8:** 

## Documentation Links
- [User Manual](/User Manual)
- [Screenshots](/Screenshots)
- [Users Folder](/Users)

# Sprint Documentation
## Sprint 0
- [x] Definition of Done
- [x] Initial User Stories
- [x] Questions for Project Supervisor/Client
- [x] Group Rules

## Sprint 1
<table>
<thead>
	<tr>
		<th>User Story</th>
		<th>Description</th>
		<th>Weight</th>
		<th>Priority</th>
		<th>Assigned Team Members</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>Navigation Bar</td>
		<td>
			<b>As a</b> user,<br>
			<b>I want</b> to navigate around the website via a side navigation bar,<br>
			<b>So that</b> I am able to efficiently navigate to different pages on the platform
		</td>
		<td>1</td>
		<td>1</td>
		<td>Raihaan Azam, Hemal Patel</td>
	</tr>
	<tr>
		<td>Login Page</td>
		<td>
			<b>As a</b> user,<br>
			<b>I want</b> to enter my credentials into a login form,<br>
			<b>So that</b> I can be granted secure access to the platform
		</td>
		<td>3</td>
		<td>2</td>
		<td>George Rogers, Jack Trafford, Suraj Cheema</td>
	</tr>
	<tr>
		<td>Landing Page</td>
		<td>
			<b>As a</b> user,<br>
			<b>I want</b> to be presented with an entry point for the platform,<br>
			<b>So that</b> I can view a summary of what the platform does and navigate to a login page
		</td>
		<td>2</td>
		<td>3</td>
		<td>Darren Wu, David Igandan, Jack Trafford</td>
	</tr>
	<tr>
		<td>Dashboard Page Template</td>
		<td>
			<b>As a</b> user,<br>
			<b>I want</b> to access the platform's dashboard,<br>
			<b>So that</b> I can view data specific to my user profile
		</td>
		<td>3</td>
		<td>4</td>
		<td>Tharidhu Angodage</td>
	</tr>
	<tr>
		<td>User manual</td>
		<td>
			<b>As a</b> user,<br>
			<b>I want</b> to be able to view a comprehensive user manual,<br>
			<b>So that</b> I have somewhere to go when I am unsure about how to do something on the platform
		</td>
		<td>1</td>
		<td>5</td>
		<td>Suraj Cheema</td>
	</tr>	
</tbody>
</table>

## Sprint 2
<table>
<thead>
	<tr>
		<th>User Story</th>
		<th>Description</th>
		<th>Weight</th>
		<th>Priority</th>
		<th>Assigned Team Members</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>Dashboard Page Template</td>
		<td>
			<b>As a</b> user,<br>
			<b>I want</b> to access the platform's dashboard,<br>
			<b>So that</b> I can view data specific to my user profile
		</td>
		<td>3</td>
		<td>1</td>
		<td>Tharidhu Angodage</td>
	</tr>
	<tr>
		<td>Admin Import CSV Sample Data</td>
		<td>
			<b>As a</b> website admin,<br>
			<b>I want</b> to import sample data via CSV,<br>
			<b>So that</b> this data can be analysed and presented to users on the platform
		</td>
		<td>5</td>
		<td>2</td>
		<td>George Rogers, Tharidhu Angodage, Suraj Cheema</td>
	</tr>	
	<tr>
		<td>Generating new user accounts</td>
		<td>
			<b>As a</b> website admin,<br>
			<b>I want</b> to register new user accounts,<br>
			<b>So that</b> I can provide users with details to login to the site with
		</td>
		<td>5</td>
		<td>3</td>
		<td>Darren Wu, Raihaan Azam, Hemal Patel</td>
	</tr>
	<tr>
		<td>Brand Page</td>
		<td>
			<b>As a</b> user,<br>
			<b>I want</b> to be able to describe my brand,<br>
			<b>So that</b> I can be presented with data that is relevant to me
		</td>
		<td>3</td>
		<td>4</td>
		<td>Tharidhu Angodage</td>
	</tr>
	<tr>
		<td>Reset Password</td>
		<td>
			<b>As a</b> user/website admin,<br>
			<b>I want</b> to be able to reset my password,<br>
			<b>So that</b> I am able to regain access to my account if I forget my password
		</td>
		<td>2</td>
		<td>5</td>
		<td>David Igandan, Jack Trafford</td>
	</tr>
</tbody>
</table>

## Sprint 3
<table>
<thead>
    <tr>
        <th>User Story</th>
        <th>Description</th>
        <th>Weight</th>
        <th>Priority</th>
        <th>Assigned Team Members</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>Admin Import Consumer Data</td>
        <td>
            <b>As a</b> website admin,<br>
            <b>I want</b> to import sample consumer data via CSV,<br>
            <b>So that</b> the consumer data can be linked with product data in order to generate user personas
        </td>
    <td>5</td>
    <td>1</td>
    <td>Tharidhu Angodage, David Igandan</td>
    </tr>
    <tr>
        <td>Set Password on Initial Login</td>
        <td>
            <b>As a</b> user,<br>
            <b>I want</b> to be forced to set my own individual password upon account creation,<br>
            <b>So that</b> I cannot use my account until I have secured it
        </td>
        <td>2</td>
        <td>2</td>
        <td>George Rogers</td>
    </tr>
    <tr>
        <td>Admin View Imported Users</td>
        <td>
            <b>As a</b> website admin,<br>
            <b>I want</b> to be able to view all the existing users on the system,<br>
            <b>So that</b> I can check what users has been previously created without having to query the database manually
        </td>
        <td>3</td>
        <td>3</td>
        <td>Darren Wu</td>
    </tr>
    <tr>
        <td>Admin Manage Users Page</td>
        <td>
            <b>As a</b> website admin,<br>
            <b>I want</b> to be able to manage current users of the system,<br>
            <b>So that</b> I can modify their details without having to do so manually through the database
        </td>
        <td>3</td>
        <td>4</td>
        <td>Darren Wu</td>
    </tr>
    <tr>
        <td>Admin View Imported Product Data</td>
        <td>
            <b>As a</b> website admin,<br>
            <b>I want</b> to be able to view currently imported product data,<br>
            <b>So that</b> I can check what data has been previously uploaded without having to query the database manually
        </td>
        <td>3</td>
        <td>5</td>
        <td>Raihaan Azam, Hemal Patel</td>
    </tr>   
    <tr>
        <td>Generate Dashboard Data</td>
        <td>
            <b>As a</b> user,<br>
            <b>I want</b> to be able to view a summary of my companies market segment,<br>
            <b>So that</b> I can be informed about the specific demographics my company should be targeting
        </td>
        <td>8</td>
        <td>6</td>
        <td>Jack Trafford</td>
    </tr>
    <tr>
        <td>Table of Contents for User Manual</td>
        <td>
            <b>As a</b> user/website admin,<br>
            <b>I want</b> to be able to easily navigate the user manual via a Table of Content located on the sidebar,<br>
            <b>So that</b>  I don't have to spend time scrolling through the entire user manual to find the topic I am looking for
        </td>
        <td>2</td>
        <td>7</td>
        <td>George Rogers, Suraj Cheema</td>
    </tr>
    <tr>
        <td>Save Sidebar State</td>
        <td>
            <b>As a</b> user/website admin,<br>
            <b>I want</b> the state of my sidebar to remain the same as I navigate between pages on the site,<br>
            <b>So that</b> I  don't need to keep toggling it every time I navigate to a new page
        </td>
        <td>2</td>
        <td>8</td>
        <td>Suraj Cheema</td>
    </tr>
</tbody>
</table>

## Sprint 4
<table>
<thead>
    <tr>
        <th>User Story</th>
        <th>Description</th>
        <th>Weight</th>
        <th>Priority</th>
        <th>Assigned Team Members</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>Admin Generate Sample User Data</td>
        <td>
            <b>As a</b> website admin,<br>
            <b>I want</b> to be able to generate a sample user data CSV,<br>
            <b>So that</b> I don’t need to use real user data if I want to setup the platform for demonstration purposes
        </td>
    <td>13</td>
    <td>1</td>
    <td>Jack Trafford, George Rogers, Raihaan Azam, Hemal Patel</td>
    </tr>
    <tr>
        <td>Generate User Personas Form</td>
        <td>
            <b>As a</b> user,<br>
            <b>I want</b> to be able to submit a form describing user personas I would like to generate, <br>
            <b>So that</b> I can view user personas that specifically tailored to my requirements
        </td>
        <td>8</td>
        <td>2</td>
        <td>Jack Trafford, Tharidhu Angodage</td>
    </tr>
    <tr>
        <td>My Personas Page</td>
        <td>
            <b>As a</b> user,<br>
            <b>I want</b> to be able to view user personas that have been generated on a ‘My Personas Page’<br>
            <b>So that</b> I am able to make informed marketing decisions when taking on new strategies for my company
        </td>
        <td>5</td>
        <td>3</td>
        <td>Jack Trafford, David Igandan</td>
    </tr>
    <tr>
        <td>Filter Dashboard Data</td>
        <td>
            <b>As a</b> user,<br>
            <b>I want</b> to be able to filter data shown via graphs on the dashboard,<br>
            <b>So that</b> I am able to understand the data I am presented with more easily
        </td>
        <td>8</td>
        <td>4</td>
        <td>Tharidhu Angodage</td>
    </tr>
    <tr>
        <td>Mobile Responsiveness</td>
        <td>
            <b>As a</b> user/website admin,<br>
            <b>I want</b> to be able to easily access and navigate around the platform on mobile,<br>
            <b>So that</b> I can still access the same functionality as I can on a desktop computer
        </td>
        <td>3</td>
        <td>5</td>
        <td>Darren Wu, Suraj Cheema</td>
    </tr>   
    <tr>
        <td>Dark Mode</td>
        <td>
            <b>As a</b> user/website admin,<br>
            <b>I want</b> to be able to switch between a dark/light mode,<br>
            <b>So that</b> I can customise the platforms colour scheme to my own preference
        </td>
        <td>2</td>
        <td>6</td>
        <td>Darren Wu</td>
    </tr>
    <tr>
        <td>Logout button on landing page</td>
        <td>
            <b>As a</b> user/website admin,<br>
            <b>I want</b> to be able to logout of the site from the landing page,<br>
            <b>So that</b> I do not have to navigate to a authenticated page before I am able to click logout
        </td>
        <td>1</td>
        <td>7</td>
        <td>Darren Wu</td>
    </tr>
</tbody>
</table>

# Meeting Logs
## 20/01/23 - First Group Meeting
- Completed first meeting in person with all 8 group members present
- Created a DoD
- Came up with some initial user stories
- Setup GitLab labels
- Set group rules

## 31/01/23 - Intro to Laravel Session + General Sprint 1 prep
- Setup each members laptops for Laravel development
- Demo of Laravel's routing system, handling form submission and a brief intro to database setup
- Initial screenshot of scum board for Sprint 1 taken
- Modified some user stories to ensure they communicated a 'clear benefit'
