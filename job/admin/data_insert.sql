USE new_job;

-- ==========================================
-- ROLES (3 টা)
-- ==========================================
INSERT INTO roles (role_name, description) VALUES
('admin',      'Full system access'),
('employer',   'Can post jobs and manage applications'),
('job_seeker', 'Can apply for jobs and manage profile');

-- ==========================================
-- PERMISSIONS (10 টা)
-- ==========================================
INSERT INTO permissions (permission_name, description) VALUES
('manage_users',        'Add, edit, block users'),
('manage_jobs',         'Post, edit, delete jobs'),
('manage_companies',    'Approve or reject companies'),
('view_applications',   'See all applications'),
('manage_packages',     'Create and edit subscription packages'),
('apply_job',           'Apply for a job posting'),
('save_job',            'Save jobs for later'),
('follow_company',      'Follow a company'),
('write_review',        'Write company review'),
('view_reports',        'View reported jobs');

-- ==========================================
-- ROLE PERMISSIONS
-- admin (role_id=1) → সব permission
-- employer (role_id=2) → manage_jobs, view_applications
-- job_seeker (role_id=3) → apply_job, save_job, follow_company, write_review
-- ==========================================
INSERT INTO role_permissions (role_id, permission_id) VALUES
(1, 1),(1, 2),(1, 3),(1, 4),(1, 5),(1, 6),(1, 7),(1, 8),(1, 9),(1, 10),
(2, 2),(2, 4),
(3, 6),(3, 7),(3, 8),(3, 9);

-- ==========================================
-- USERS
-- user_id 1 = admin
-- user_id 2,3 = employer
-- user_id 4,5,6 = job_seeker
-- password = 'password123' hashed (bcrypt placeholder)
-- ==========================================
INSERT INTO users (full_name, email, phone, password, user_type, role_id, status) VALUES
('Admin User',       'admin@jobportal.com',    '01700000001', '$2y$10$examplehashedpassword1', 'admin',      1, 'active'),
('Rahim Telecom',    'rahim@telco.com',        '01711000002', '$2y$10$examplehashedpassword2', 'employer',   2, 'active'),
('Karim Software',   'karim@softbd.com',       '01711000003', '$2y$10$examplehashedpassword3', 'employer',   2, 'active'),
('Arif Hossain',     'arif@gmail.com',         '01811000004', '$2y$10$examplehashedpassword4', 'job_seeker', 3, 'active'),
('Nadia Islam',      'nadia@gmail.com',        '01811000005', '$2y$10$examplehashedpassword5', 'job_seeker', 3, 'active'),
('Sabbir Ahmed',     'sabbir@gmail.com',       '01811000006', '$2y$10$examplehashedpassword6', 'job_seeker', 3, 'inactive');

-- ==========================================
-- JOB SEEKERS (user_id 4,5,6 → seeker_id 1,2,3)
-- ==========================================
INSERT INTO job_seekers (user_id, gender, date_of_birth, address, expected_salary, profile_photo, resume_file) VALUES
(4, 'Male',   '1998-05-12', 'Mirpur, Dhaka',       35000.00, 'uploads/photos/arif.jpg',   'uploads/resumes/arif_cv.pdf'),
(5, 'Female', '2000-03-22', 'Dhanmondi, Dhaka',    40000.00, 'uploads/photos/nadia.jpg',  'uploads/resumes/nadia_cv.pdf'),
(6, 'Male',   '1997-11-08', 'Chittagong City',     30000.00, 'uploads/photos/sabbir.jpg', 'uploads/resumes/sabbir_cv.pdf');

-- ==========================================
-- COMPANIES (user_id 2,3 → company_id 1,2)
-- ==========================================
INSERT INTO companies (user_id, company_name, logo, website, industry, address, company_description) VALUES
(2, 'Rahim Telecom Ltd',   'uploads/logos/telco.png',   'https://rahimtelco.com',  'Telecommunications', 'Gulshan, Dhaka',    'Leading telecom company in Bangladesh.'),
(3, 'Karim Software House','uploads/logos/soft.png',    'https://karimsoft.com',   'IT & Software',      'Motijheel, Dhaka',  'Top software development company.');

-- ==========================================
-- CATEGORIES (5 টা)
-- ==========================================
INSERT INTO categories (category_name) VALUES
('Information Technology'),
('Telecommunications'),
('Marketing'),
('Finance & Accounting'),
('Human Resources');

-- ==========================================
-- SUB CATEGORIES
-- ==========================================
INSERT INTO sub_categories (category_id, sub_category_name) VALUES
(1, 'Web Development'),
(1, 'Mobile App Development'),
(1, 'Database Administration'),
(2, 'Network Engineering'),
(2, 'Customer Support'),
(3, 'Digital Marketing'),
(3, 'Brand Management'),
(4, 'Accounts'),
(4, 'Audit'),
(5, 'Recruitment');

-- ==========================================
-- SKILLS (10 টা)
-- ==========================================
INSERT INTO skills (skill_name) VALUES
('PHP'),
('MySQL'),
('JavaScript'),
('Laravel'),
('React'),
('Python'),
('Networking'),
('SEO'),
('Accounting'),
('Communication');

-- ==========================================
-- PACKAGES (3 টা)
-- ==========================================
INSERT INTO packages (package_name, price, duration_days, job_limit) VALUES
('Basic',    500.00,  30,  3),
('Standard', 1200.00, 60,  10),
('Premium',  2500.00, 90,  999);

-- ==========================================
-- JOBS (4 টা)
-- company_id 1 → category IT/Telecom, company_id 2 → IT
-- ==========================================
INSERT INTO jobs (company_id, category_id, sub_category_id, job_title, vacancy, salary, job_type, experience_required, education_required, location, deadline, description, responsibilities, requirements, status) VALUES
(2, 1, 1, 'Junior PHP Developer',     3, '20000-30000', 'Full Time',   '0-1 year',  'BSc in CSE or equivalent', 'Dhaka',      '2025-08-31', 'We are looking for a junior PHP developer to join our team.', 'Develop and maintain web applications.', 'Knowledge of PHP, MySQL, HTML, CSS.', 'active'),
(2, 1, 2, 'React Native Developer',   2, '35000-50000', 'Full Time',   '2-3 years', 'BSc in CSE',               'Dhaka',      '2025-09-15', 'Experienced React Native developer needed.',               'Build cross-platform mobile apps.',       'React Native, REST API, Git.',            'active'),
(1, 2, 4, 'Network Engineer',         1, '40000-55000', 'Full Time',   '3-5 years', 'BSc in EEE or CSE',        'Chittagong', '2025-08-20', 'Telecom network engineer for field operations.',            'Manage and monitor network infrastructure.','CCNA/CCNP certification preferred.',    'active'),
(1, 3, 6, 'Digital Marketing Officer',2, '25000-35000', 'Part Time',   '1-2 years', 'BBA in Marketing',         'Dhaka',      '2025-07-31', 'Digital marketer for online campaigns.',                    'Run Facebook, Google Ads campaigns.',     'SEO, SEM, Social Media skills.',          'closed');

-- ==========================================
-- SUBSCRIPTIONS
-- ==========================================
INSERT INTO subscriptions (company_id, package_id, start_date, end_date, status) VALUES
(1, 2, '2025-06-01', '2025-07-31', 'active'),
(2, 3, '2025-05-15', '2025-08-13', 'active');

-- ==========================================
-- APPLICATIONS (seeker 1,2 apply করেছে)
-- ==========================================
INSERT INTO applications (job_id, seeker_id, cover_letter, status) VALUES
(1, 1, 'I am very interested in this PHP developer position. I have basic knowledge of PHP and MySQL.', 'pending'),
(1, 2, 'As a fresh graduate with web development skills, I would love to join your team.',              'shortlisted'),
(2, 1, 'I have experience with React and want to grow in mobile development.',                          'pending'),
(3, 2, 'I am passionate about networking and have completed CCNA training.',                            'rejected');

-- ==========================================
-- EDUCATION
-- ==========================================
INSERT INTO education (seeker_id, degree, institution, passing_year, result) VALUES
(1, 'BSc in CSE',    'BUET',                 2021, '3.75 CGPA'),
(1, 'HSC',           'Dhaka College',        2017, 'GPA 5.00'),
(2, 'BSc in CSE',    'BRAC University',      2022, '3.60 CGPA'),
(3, 'BSc in EEE',    'RUET',                 2020, '3.40 CGPA');

-- ==========================================
-- EXPERIENCE
-- ==========================================
INSERT INTO experience (seeker_id, company_name, designation, start_date, end_date, responsibilities) VALUES
(1, 'Freelance',          'Web Developer',         '2021-06-01', '2022-12-31', 'Developed PHP-based websites for clients.'),
(2, 'TechStart BD',       'Junior Developer',      '2022-09-01', '2023-08-31', 'Worked on React projects and REST APIs.'),
(3, 'Network Solutions',  'Network Technician',    '2020-10-01', '2024-01-31', 'Configured routers, switches and managed LAN.');

-- ==========================================
-- SEEKER SKILLS
-- ==========================================
INSERT INTO seeker_skills (seeker_id, skill_id) VALUES
(1, 1),(1, 2),(1, 3),   -- Arif: PHP, MySQL, JS
(2, 3),(2, 5),(2, 4),   -- Nadia: JS, React, Laravel
(3, 7),(3, 10);          -- Sabbir: Networking, Communication

-- ==========================================
-- SAVED JOBS
-- ==========================================
INSERT INTO saved_jobs (seeker_id, job_id) VALUES
(1, 2),
(2, 3),
(1, 3);

-- ==========================================
-- JOB ALERTS
-- ==========================================
INSERT INTO job_alerts (user_id, keyword, location) VALUES
(4, 'PHP Developer',    'Dhaka'),
(5, 'React Developer',  'Dhaka'),
(6, 'Network Engineer', 'Chittagong');

-- ==========================================
-- COMPANY FOLLOWERS
-- ==========================================
INSERT INTO company_followers (seeker_id, company_id) VALUES
(1, 1),(1, 2),
(2, 2),
(3, 1);

-- ==========================================
-- SHORTLISTS (application_id 2 shortlisted)
-- ==========================================
INSERT INTO shortlists (application_id, status) VALUES
(2, 'shortlisted');

-- ==========================================
-- INTERVIEWS (application_id 2 এর জন্য)
-- ==========================================
INSERT INTO interviews (application_id, interview_date, interview_location, meeting_link, status) VALUES
(2, '2025-07-10 10:00:00', 'Karim Software House, Motijheel', 'https://meet.google.com/abc-defg-hij', 'scheduled');

-- ==========================================
-- MESSAGES
-- ==========================================
INSERT INTO messages (sender_id, receiver_id, message) VALUES
(2, 4, 'Dear Arif, we have reviewed your application. Please attend the interview.'),
(4, 2, 'Thank you sir, I will be present on the interview date.'),
(3, 5, 'Congratulations Nadia! You have been shortlisted for the React Native position.');

-- ==========================================
-- NOTIFICATIONS
-- ==========================================
INSERT INTO notifications (user_id, title, message, is_read) VALUES
(4, 'Application Received',  'Your application for Junior PHP Developer has been received.',       FALSE),
(5, 'Shortlisted!',          'You have been shortlisted for React Native Developer position.',     FALSE),
(6, 'Application Rejected',  'Unfortunately your application for Network Engineer was rejected.',  TRUE),
(2, 'New Application',       'A new application has been received for Junior PHP Developer.',      FALSE);

-- ==========================================
-- COMPANY REVIEWS
-- ==========================================
INSERT INTO company_reviews (company_id, seeker_id, rating, review) VALUES
(2, 1, 5, 'Great company with a friendly work environment and good learning opportunities.'),
(2, 2, 4, 'Very professional team. Good salary structure and timely payments.'),
(1, 3, 3, 'Decent company but work pressure is sometimes too high.');

-- ==========================================
-- REPORTS
-- ==========================================
INSERT INTO reports (user_id, job_id, reason, status) VALUES
(4, 4, 'This job posting seems fake. No proper company details provided.', 'pending'),
(5, 3, 'Salary mentioned is misleading compared to actual offer.',         'resolved');

-- ==========================================
-- JOB VIEWS
-- ==========================================
INSERT INTO job_views (job_id, user_id) VALUES
(1, 4),(1, 5),(1, 6),
(2, 4),(2, 5),
(3, 6),
(4, 4);

-- ==========================================
-- CV DOWNLOADS
-- ==========================================
INSERT INTO cv_downloads (company_id, seeker_id) VALUES
(2, 1),
(2, 2),
(1, 3);