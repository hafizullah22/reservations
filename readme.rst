# 🍽️ Reservation System

A custom-built **Restaurant & Facility Reservation System** developed using **PHP (CodeIgniter 3)**. This application replaces the previous WordPress-based reservation solution with a faster, more secure, and scalable platform featuring online reservations, user management, reporting, and an administrative dashboard.

---

## 📌 Overview

The Reservation System enables registered users to book tables or facilities online while providing administrators with complete control over reservations, users, reports, and website content through a centralized administration panel.

---

## ✨ Key Features

- Secure User Authentication
- Online Table & Facility Reservations
- Role-Based Access Control (RBAC)
- Administrative Dashboard
- Booking Approval & Cancellation
- Automated Email Notifications
- PDF & CSV Report Export
- CSV User Import
- Responsive Web Portal
- REST API Support

---

# 📦 Modules

## Module 01 – Reservation / Booking System

A fully customized booking engine that allows registered users to reserve tables or facilities.

### Features

- User Registration & Login
- Secure Password Hashing
- Table & Facility Reservation
- Date & Time Slot Selection
- Guest Capacity Validation
- Booking History
- Booking Cancellation
- Booking Limit per User
- Booking Limit per Table
- Duplicate Booking Prevention
- Business Rule Validation
- Booking Confirmation Emails
- Reservation Reminder Emails (30 minutes before booking)
- PDF & CSV Booking Reports

---

## Module 02 – User Management

A complete user management module for administrators.

### Features

- Create Individual Users
- Bulk User Import via CSV
- Edit User Information
- Delete Users
- Search & Filter Users
- Role-Based Access Control

### Supported Roles

- Administrator
- Member
- Resident

### Security

- Password Hashing
- Secure Authentication
- Automated Welcome Email
- Password Reset Support

---

## Module 03 – Administrative Panel

A centralized administration dashboard providing full control over the reservation system.

### Dashboard

- Booking Statistics
- User Statistics
- Recent Reservations
- System Summary

### Booking Management

- View Bookings
- Search Reservations
- Filter by Date
- Filter by Time Slot
- Approve Reservations
- Cancel Reservations
- View Booking Details

### User Management

- Add Users
- Edit Users
- Delete Users
- CSV Import
- Role Management

### Reports

- Booking Reports
- User Activity Reports
- Reservation Summary Reports
- Export to PDF
- Export to CSV

### Access Control

- Role-Based Permissions
- Secure Session Management
- Administrator Authentication

---

## Module 04 – Web Portal

A responsive public-facing website allowing visitors and registered users to access reservation services.

### Public Pages

- Home
- About
- Contact
- News & Announcements
- Gallery
- Resources & Documents

### User Portal

- Registration
- Login
- User Dashboard
- Profile Management
- Booking History
- Booking Details

### Reservation Portal

- Online Reservation Form
- Date Selection
- Time Slot Selection
- Guest Count Selection
- Availability Validation
- Instant Confirmation

### Responsive Design

- Mobile Friendly
- Tablet Compatible
- Desktop Optimized
- Cross-Browser Support

---

# 🔐 Security Features

- Password Hashing
- Role-Based Access Control (RBAC)
- Session Authentication
- Input Validation
- SQL Injection Protection
- XSS Protection
- CSRF Protection
- API Key Authentication

---

# 📧 Email Notifications

The system automatically sends emails for:

- Booking Confirmation
- Booking Reminder (30 minutes before reservation)
- Booking Cancellation *(optional)*
- New User Welcome Email

---

# 📊 Reporting

Generate and export reports including:

- Reservation Reports
- User Activity Reports
- Daily Bookings
- Monthly Bookings
- Booking Status Reports

Supported formats:

- PDF
- CSV

---

# 🛠 Technology Stack

| Category | Technology |
|----------|------------|
| Backend | PHP |
| Framework | CodeIgniter 3 |
| Database | MySQL / MariaDB |
| Frontend | HTML5, CSS3, Bootstrap 5 |
| JavaScript | jQuery, AJAX |
| Email | PHPMailer |
| Alerts | SweetAlert2 |
| Reports | PDF & CSV Export |

---

# 📁 Project Structure

```
reservation/
│
├── application/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   ├── libraries/
│   ├── helpers/
│   └── config/
│
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│   └── uploads/
│
├── system/
├── index.php
└── README.md
```

---

# 🚀 Installation

## Clone Repository

```bash
git clone https://github.com/yourusername/reservation.git
```

## Navigate to Project

```bash
cd reservation
```

## Configure Database

Update:

```
application/config/database.php
```

Example:

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'reservation',
);
```

## Configure Base URL

Edit:

```
application/config/config.php
```

```php
$config['base_url'] = 'http://localhost/reservation/';
```

## Configure Email

Update your SMTP settings in your email configuration file.

---

# 🔌 REST API

The system supports REST API integration for external applications.

Example:

```
GET /api/customers
```

Authentication Header:

```
X-API-KEY: YOUR_API_KEY
```

---

# 📸 Screenshots

Add project screenshots here.

```
docs/images/home.png
docs/images/dashboard.png
docs/images/booking.png
docs/images/report.png
```

---

# 📈 Future Enhancements

- Payment Gateway Integration
- QR Code Booking Confirmation
- SMS Notifications
- Google Calendar Integration
- Waitlist Management
- Multi-Branch Support
- Online Ordering
- Progressive Web App (PWA)
- API Documentation (Swagger/OpenAPI)

---

# 🤝 Contributing

Contributions are welcome!

1. Fork the repository
2. Create a feature branch

```bash
git checkout -b feature/new-feature
```

3. Commit your changes

```bash
git commit -m "Add new feature"
```

4. Push your branch

```bash
git push origin feature/new-feature
```

5. Open a Pull Request

---

# 📄 License

This project is licensed under the **MIT License**.

---

# 👨‍💻 Author

**Hafiz Ullah**

If you find this project useful, consider giving it a ⭐ on GitHub!
