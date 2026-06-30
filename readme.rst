# 🍽️ Restaurant Table Reservation System

A fully customized PHP-based booking system will replace the existing WordPress solution, offering advanced features:
User Registration and Login: Only registered users can make bookings; secure password handling with hashing.


Booking Management: Users can reserve tables or facilities by selecting date, time slot, and number of guests.


Admin Control: Administrators can manage table availability, approve or cancel bookings, and set booking limits per table or per user.


Email Notifications: Automated confirmation emails upon booking and reminder emails 30 minutes prior to the reservation.


Booking Reports: Generate, view, and export detailed reports in PDF or CSV format.



---

## ✨ Features

### Customer Features

- User Registration & Login
- Secure Authentication
- Online Table Reservation
- Date & Time Slot Selection
- Booking Validation
- Booking Confirmation
- Booking History
- Booking Details
- Email Confirmation
- Profile Management

---

### Admin Features

- Dashboard
- Manage Users
- Manage Tables
- Booking Management
- Approve / Reject Bookings
- Cancel Bookings
- Booking Reports
- Filter by Date
- Filter by Time Slot
- Export Reports to PDF
- CSV User Import
- Email Notifications
- System Settings

---

## 🚀 Technologies Used

- PHP
- CodeIgniter 3
- MySQL / MariaDB
- Bootstrap 5
- jQuery
- AJAX
- SweetAlert2
- PHPMailer
- HTML5
- CSS3
- JavaScript

---

## 📂 Project Structure

```
application/
    controllers/
    models/
    views/
    libraries/
    helpers/

assets/
uploads/
system/
```

---

## 🔐 Authentication

The system supports:

- Customer Login
- Admin Login
- Session Authentication
- Role Based Access Control

---

## 📅 Reservation Workflow

1. Customer logs in.
2. Selects reservation date.
3. Selects available time slot.
4. Chooses table.
5. Enters reservation information.
6. System validates business rules.
7. Reservation is saved.
8. Customer receives confirmation email.
9. Admin receives notification.
10. Reservation appears in admin dashboard.

---

## 📊 Booking Reports

Administrators can:

- View all reservations
- Filter reservations by date
- Filter reservations by time slot
- View booking details
- Export reports as PDF

---

## 📧 Email Notifications

Automatic emails are sent when:

- Booking is created
- Booking is confirmed
- Booking is cancelled (optional)

---

## 🔑 API

The project also includes REST API support for integration with external systems.

Example endpoint:

```
GET /api/customers
```

Authentication is performed using an API Key.

Example header:

```
X-API-KEY: YOUR_API_KEY
```

---

## ⚙️ Installation

### 1. Clone Repository

```bash
git clone https://github.com/yourusername/reservation.git
```

---

### 2. Move to Project

```bash
cd reservation
```

---

### 3. Configure Database

Create a MySQL database and import the SQL file.

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

---

### 4. Configure Base URL

```
application/config/config.php
```

```php
$config['base_url'] = 'http://localhost/reservation/';
```

---

### 5. Configure Email

Update your SMTP credentials in:

```
application/config/email.php
```

or your custom email configuration.

---

### 6. File Permissions

Make sure these directories are writable if used:

```
uploads/
logs/
```

---

## 🛠 Requirements

- PHP 7.4+
- MySQL 5.7+
- Apache or Nginx
- Composer (optional)

---

## Screenshots

You can add screenshots here.

```
docs/images/home.png
docs/images/dashboard.png
docs/images/booking.png
```

---

## Future Improvements

- Payment Gateway Integration
- QR Code Booking Confirmation
- SMS Notifications
- Google Calendar Integration
- Table Availability Calendar
- Waitlist Management
- Multi-Branch Support
- Coupon System
- Online Ordering Integration
- Progressive Web App (PWA)

---

## Security

- SQL Injection Protection
- XSS Filtering
- CSRF Protection
- Session Authentication
- Input Validation
- API Key Authentication

---

## Contributing

Contributions are welcome.

1. Fork the repository
2. Create a new feature branch

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

## License

This project is licensed under the MIT License.

---

## Author

**Hafiz Ullah**

GitHub:
https://github.com/yourusername

---

## Acknowledgements

- CodeIgniter
- Bootstrap
- SweetAlert2
- PHPMailer

---

⭐ If you found this project useful, consider giving it a star on GitHub.
