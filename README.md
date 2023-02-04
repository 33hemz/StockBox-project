<p align="center"><img src="public/assets/Full Logo/PNG/StokBox-05.png" alt="StokBox Logo" width="200"></p>

[[_TOC_]]
  
## Project Installation
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

## Group Members
- Jack Trafford
- George Rogers
- Raihaan Azam
- Hemal Patel
- Darren Wu
- David Igandan
- Tharidhu Angodage
- Suraj Cheema

## Project Documentation
- [User Manual](/User Manual)
- [Screenshots](/Screenshots)
- [Users Folder](/Users)

## Assigned Scrum Masters
- **Week 1:** Jack Trafford
- **Week 2:** Darren Wu
- **Week 3:** 
- **Week 4:** 
- **Week 5:** 
- **Week 6:** 
- **Week 7:** 
- **Week 8:** 

## Sprints
### Sprint 0
#### Checklist
- [x] Definition of Done
- [x] Initial User Stories
- [x] Questions for Project Supervisor/Client
- [x] Group Rules

### Sprint 1
#### Checklist
- [x] Scrum board Updated
    - [x] Screenshot 1 
    - [ ] Screenshot 2 
    - [ ] Screenshot 3 
- [x] Increment
- [ ] Demo
- [ ] User Manual

#### User Stories
- User manual (Weight: 1) - Suraj Cheema
- Navigation Bar (Weight: 1) - Raihaan Azam, Hemal Patel
- Login Page (Weight: 3) - George Rogers, Jack Trafford, Suraj Cheema
- Landing Page (Weight: 2) - Darren Wu, David Igandan, Jack Trafford
- Dashboard Page Template (Weight: 3) - Tharidhu Angodage

### Sprint 2
#### Checklist
- [ ] Scrum board Updated
    - [ ] Screenshot 1 
    - [ ] Screenshot 2 
    - [ ] Screenshot 3 
- [ ] Increment
- [ ] Demo
- [ ] User Manual

#### User Stories

### Sprint 3
#### Checklist
- [ ] Scrum board Updated
    - [ ] Screenshot 1 
    - [ ] Screenshot 2 
    - [ ] Screenshot 3 
- [ ] Increment
- [ ] Demo
- [ ] User Manual

#### User Stories

### Sprint 4
#### Checklist
- [ ] Scrum board Updated
    - [ ] Screenshot 1 
    - [ ] Screenshot 2 
    - [ ] Screenshot 3 
- [ ] Increment
- [ ] Demo
- [ ] User Manual

#### User Stories


## Meeting Logs
### 20/01/23 - First Group Meeting
- Completed first meeting in person with all 8 group members present
- Created a DoD
- Came up with some initial user stories
- Setup GitLab labels
- Set group rules

### 31/01/23 - Intro to Laravel Session + General Sprint 1 prep
- Setup each members laptops for Laravel development
- Demo of Laravel's routing system, handling form submission and a brief intro to database setup
- Initial screenshot of scum board for Sprint 1 taken
- Modified some user stories to ensure they communicated a 'clear benefit'
