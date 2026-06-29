CREATE DATABASE IF NOT EXISTS new_job;
USE new_job;

-- ==========================================
-- ROLES
-- ==========================================
CREATE TABLE roles (
    role_id     INT AUTO_INCREMENT PRIMARY KEY,
    role_name   VARCHAR(50)  NOT NULL UNIQUE,
    description VARCHAR(255),
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ==========================================
-- PERMISSIONS
-- ==========================================
CREATE TABLE permissions (
    permission_id   INT AUTO_INCREMENT PRIMARY KEY,
    permission_name VARCHAR(100) NOT NULL UNIQUE,
    description     VARCHAR(255),
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ==========================================
-- ROLE PERMISSIONS
-- ==========================================
CREATE TABLE role_permissions (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    role_id       INT NOT NULL,
    permission_id INT NOT NULL,
    UNIQUE (role_id, permission_id),
    FOREIGN KEY (role_id)       REFERENCES roles(role_id)       ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(permission_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ==========================================
-- USERS
-- ==========================================
CREATE TABLE users (
    user_id    INT AUTO_INCREMENT PRIMARY KEY,
    full_name  VARCHAR(100) NOT NULL,
    email      VARCHAR(100) UNIQUE NOT NULL,
    phone      VARCHAR(20),
    password   VARCHAR(255) NOT NULL,
    user_type  ENUM('job_seeker','employer','admin') NOT NULL,
    role_id    INT DEFAULT NULL,
    status     ENUM('active','inactive','blocked') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(role_id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- ==========================================
-- JOB SEEKERS
-- ==========================================
CREATE TABLE job_seekers (
    seeker_id       INT AUTO_INCREMENT PRIMARY KEY,
    user_id         INT UNIQUE,
    gender          VARCHAR(20),
    date_of_birth   DATE,
    address         TEXT,
    expected_salary DECIMAL(10,2),
    profile_photo   VARCHAR(255),
    resume_file     VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- ==========================================
-- COMPANIES
-- ==========================================
CREATE TABLE companies (
    company_id          INT AUTO_INCREMENT PRIMARY KEY,
    user_id             INT UNIQUE,
    company_name        VARCHAR(150) NOT NULL,
    logo                VARCHAR(255),
    website             VARCHAR(255),
    industry            VARCHAR(100),
    address             TEXT,
    company_description TEXT,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- ==========================================
-- CATEGORIES
-- ==========================================
CREATE TABLE categories (
    category_id   INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

-- ==========================================
-- SUB CATEGORIES
-- ==========================================
CREATE TABLE sub_categories (
    sub_category_id   INT AUTO_INCREMENT PRIMARY KEY,
    category_id       INT,
    sub_category_name VARCHAR(100),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- ==========================================
-- JOBS
-- ==========================================
CREATE TABLE jobs (
    job_id              INT AUTO_INCREMENT PRIMARY KEY,
    company_id          INT,
    category_id         INT,
    sub_category_id     INT,
    job_title           VARCHAR(200) NOT NULL,
    vacancy             INT,
    salary              VARCHAR(100),
    job_type            ENUM('Full Time','Part Time','Remote','Contract','Internship'),
    experience_required VARCHAR(100),
    education_required  VARCHAR(255),
    location            VARCHAR(255),
    deadline            DATE,
    description         TEXT,
    responsibilities    TEXT,
    requirements        TEXT,
    status              ENUM('active','closed') DEFAULT 'active',
    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (company_id)      REFERENCES companies(company_id),
    FOREIGN KEY (category_id)     REFERENCES categories(category_id),
    FOREIGN KEY (sub_category_id) REFERENCES sub_categories(sub_category_id)
);

-- ==========================================
-- APPLICATIONS
-- ==========================================
CREATE TABLE applications (
    application_id INT AUTO_INCREMENT PRIMARY KEY,
    job_id         INT,
    seeker_id      INT,
    cover_letter   TEXT,
    apply_date     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status         ENUM('pending','shortlisted','rejected','hired') DEFAULT 'pending',
    FOREIGN KEY (job_id)    REFERENCES jobs(job_id),
    FOREIGN KEY (seeker_id) REFERENCES job_seekers(seeker_id)
);

-- ==========================================
-- EDUCATION
-- ==========================================
CREATE TABLE education (
    education_id INT AUTO_INCREMENT PRIMARY KEY,
    seeker_id    INT,
    degree       VARCHAR(100),
    institution  VARCHAR(150),
    passing_year YEAR,
    result       VARCHAR(50),
    FOREIGN KEY (seeker_id) REFERENCES job_seekers(seeker_id)
);

-- ==========================================
-- EXPERIENCE
-- ==========================================
CREATE TABLE experience (
    experience_id    INT AUTO_INCREMENT PRIMARY KEY,
    seeker_id        INT,
    company_name     VARCHAR(150),
    designation      VARCHAR(100),
    start_date       DATE,
    end_date         DATE,
    responsibilities TEXT,
    FOREIGN KEY (seeker_id) REFERENCES job_seekers(seeker_id)
);

-- ==========================================
-- SKILLS
-- ==========================================
CREATE TABLE skills (
    skill_id   INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(100)
);

CREATE TABLE seeker_skills (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    seeker_id INT,
    skill_id  INT,
    FOREIGN KEY (seeker_id) REFERENCES job_seekers(seeker_id),
    FOREIGN KEY (skill_id)  REFERENCES skills(skill_id)
);

-- ==========================================
-- SAVED JOBS
-- ==========================================
CREATE TABLE saved_jobs (
    save_id   INT AUTO_INCREMENT PRIMARY KEY,
    seeker_id INT,
    job_id    INT,
    saved_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (seeker_id) REFERENCES job_seekers(seeker_id),
    FOREIGN KEY (job_id)    REFERENCES jobs(job_id)
);

-- ==========================================
-- JOB ALERTS
-- ==========================================
CREATE TABLE job_alerts (
    alert_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id  INT,
    keyword  VARCHAR(100),
    location VARCHAR(100),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- ==========================================
-- COMPANY FOLLOWERS
-- ==========================================
CREATE TABLE company_followers (
    follow_id  INT AUTO_INCREMENT PRIMARY KEY,
    seeker_id  INT,
    company_id INT,
    FOREIGN KEY (seeker_id)  REFERENCES job_seekers(seeker_id),
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
);

-- ==========================================
-- SHORTLISTS
-- ==========================================
CREATE TABLE shortlists (
    shortlist_id   INT AUTO_INCREMENT PRIMARY KEY,
    application_id INT,
    status         VARCHAR(50),
    FOREIGN KEY (application_id) REFERENCES applications(application_id)
);

-- ==========================================
-- INTERVIEWS
-- ==========================================
CREATE TABLE interviews (
    interview_id       INT AUTO_INCREMENT PRIMARY KEY,
    application_id     INT,
    interview_date     DATETIME,
    interview_location VARCHAR(255),
    meeting_link       VARCHAR(255),
    status             ENUM('scheduled','completed','cancelled'),
    FOREIGN KEY (application_id) REFERENCES applications(application_id)
);

-- ==========================================
-- MESSAGES
-- ==========================================
CREATE TABLE messages (
    message_id  INT AUTO_INCREMENT PRIMARY KEY,
    sender_id   INT,
    receiver_id INT,
    message     TEXT,
    sent_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id)   REFERENCES users(user_id),
    FOREIGN KEY (receiver_id) REFERENCES users(user_id)
);

-- ==========================================
-- NOTIFICATIONS
-- ==========================================
CREATE TABLE notifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id         INT,
    title           VARCHAR(255),
    message         TEXT,
    is_read         BOOLEAN DEFAULT FALSE,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- ==========================================
-- COMPANY REVIEWS
-- ==========================================
CREATE TABLE company_reviews (
    review_id  INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT,
    seeker_id  INT,
    rating     INT,
    review     TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (company_id) REFERENCES companies(company_id),
    FOREIGN KEY (seeker_id)  REFERENCES job_seekers(seeker_id)
);

-- ==========================================
-- PACKAGES
-- ==========================================
CREATE TABLE packages (
    package_id   INT AUTO_INCREMENT PRIMARY KEY,
    package_name VARCHAR(100),
    price        DECIMAL(10,2),
    duration_days INT,
    job_limit    INT
);

-- ==========================================
-- SUBSCRIPTIONS
-- ==========================================
CREATE TABLE subscriptions (
    subscription_id INT AUTO_INCREMENT PRIMARY KEY,
    company_id      INT,
    package_id      INT,
    start_date      DATE,
    end_date        DATE,
    status          ENUM('active','expired'),
    FOREIGN KEY (company_id) REFERENCES companies(company_id),
    FOREIGN KEY (package_id) REFERENCES packages(package_id)
);

-- ==========================================
-- REPORTS
-- ==========================================
CREATE TABLE reports (
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id   INT,
    job_id    INT,
    reason    TEXT,
    status    ENUM('pending','resolved') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (job_id)  REFERENCES jobs(job_id)
);

-- ==========================================
-- JOB VIEWS
-- ==========================================
CREATE TABLE job_views (
    view_id   INT AUTO_INCREMENT PRIMARY KEY,
    job_id    INT,
    user_id   INT,
    viewed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (job_id)  REFERENCES jobs(job_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- ==========================================
-- CV DOWNLOADS
-- ==========================================
CREATE TABLE cv_downloads (
    download_id   INT AUTO_INCREMENT PRIMARY KEY,
    company_id    INT,
    seeker_id     INT,
    download_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (company_id) REFERENCES companies(company_id),
    FOREIGN KEY (seeker_id)  REFERENCES job_seekers(seeker_id)
);