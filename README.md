
# test-assessment

# Overview

This project implements a service marketplace platform with:

- Public browsing
- Provider-managed listings
- Admin moderation
- Enquiry submission
- Server-rendered search with progressive enhancement

Built using Laravel 12 and Blade templates.


## Architecture Decisions

### 1. Server-Rendered First


### 2. Separation of Concerns

- Controllers remain thin.
- Search logic lives in `ListingSearchQuery`.
- Business logic (create/update listing) lives in `SaveListing` action.
- Validation handled via Form Requests.
- Authorization enforced via Policies.

### 3. Role System

Roles:
- Guest → public browsing
- Provider → manage own listings
- Admin → moderate listings

Authorization handled via `ListingPolicy`.

---

## Search Implementation

Search filters:
- Keyword (partial match)
- Category
- City (partial match)
- Price range
- Sorting

Search logic is isolated in `App\Queries\ListingSearchQuery`.


---

## JavaScript Strategy

JavaScript is minimal and used only for:
- Filter auto-submit


## Caching Strategy

Listing detail pages are cached.
Cache invalidated on model save/delete using model events.

---

## Moderation Workflow

Provider creates/edits listing → status becomes `pending`.
Admin can:
- Approve
- Reject (with note)
- Suspend

---

## Security Considerations

- FormRequest validation
- CSRF protection
- Policy-based authorization
- No mass assignment vulnerabilities
- Role-restricted access

## database sql file also in project gemsstudio.sql

#### Setup Instructions

1. Clone the Repository

git clone https://github.com/naiyar0084/test-assessment.git

2. cd test-assessment

3. composer install

4. npm install

5. cp .env.example .env

6. Open .env and update database credentials

    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

7. php artisan key:generate

8. create database and import given sql file 
 
 OR php artisan migrate

9. npm run dev

10. php artisan serve
 

11. Credential details  

http://127.0.0.1:8000/login

FOR ADMIN

email - admin@gmail.com
pass - Password123

FOR PROVIDER

email - provider@gmail.com
pass - Password123


