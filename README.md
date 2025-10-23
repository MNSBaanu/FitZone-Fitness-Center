# FitZone Fitness Center

A comprehensive web application for managing a modern fitness center, featuring user registration, class management, trainer profiles, and administrative dashboards.

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Usage](#usage)
- [Dashboard Access](#dashboard-access)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)
- [Author](#author)

## 🏋️ About

FitZone Fitness Center is a full-stack web application designed to provide a complete digital solution for fitness center management. The platform offers an intuitive user interface for members to browse services, register for classes, and manage their fitness journey, while providing administrators with powerful tools to manage memberships, classes, and facility operations.

## ✨ Features

### Frontend Features
- **Responsive Design**: Mobile-first approach with modern UI/UX
- **Service Showcase**: Personal training, group classes, and nutrition counseling
- **Class Management**: Browse and register for various fitness classes
- **Trainer Profiles**: Detailed information about certified trainers
- **Blog System**: Fitness tips, nutrition advice, and wellness content
- **Contact System**: Easy communication with fitness center staff
- **Membership Plans**: Detailed information about membership options

### Backend Features
- **User Authentication**: Secure registration and login system
- **Database Management**: MySQL database for storing user data and appointments
- **Role-based Access**: Separate dashboards for customers, staff, and administrators
- **Appointment System**: Booking and management system for classes and personal training
- **Query Management**: Admin tools for database queries and management

### Dashboard Features
- **Customer Dashboard**: Personal profile, class bookings, and progress tracking
- **Staff Dashboard**: Class management, member interactions, and scheduling
- **Admin Dashboard**: Complete facility management, user administration, and analytics

## 🛠️ Technologies Used

### Frontend
- **HTML5**: Semantic markup and structure
- **CSS3**: Custom styling with modern design principles
- **JavaScript**: Interactive functionality and dynamic content
- **Responsive Design**: Mobile-first approach for all devices

### Backend
- **PHP**: Server-side scripting and logic
- **MySQL**: Database management and storage
- **RESTful API**: Clean API endpoints for data management

### Development Tools
- **Git**: Version control and collaboration
- **Local Development**: XAMPP/WAMP for local server environment

## 📁 Project Structure

```
FitZone-Fitness-Center/
├── assets/
│   ├── images/          # Images for services, trainers, and content
│   ├── script.js        # JavaScript functionality
│   └── style.css        # Custom CSS styles
├── backend/
│   ├── db.php          # Database connection configuration
│   ├── login.php       # User authentication logic
│   ├── register.php    # User registration system
│   ├── appointment.php # Appointment booking system
│   └── query.php       # Database query management
├── dashboard/
│   ├── admin.html      # Administrative dashboard
│   ├── customer.html   # Customer dashboard
│   └── staff.html      # Staff dashboard
├── *.html              # Main application pages
└── README.md           # Project documentation
```

## 🚀 Installation

### Prerequisites
- **Web Server**: Apache/Nginx (XAMPP, WAMP, or LAMP recommended)
- **PHP**: Version 7.4 or higher
- **MySQL**: Version 5.7 or higher
- **Web Browser**: Modern browser with JavaScript enabled

### Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/MNSBaanu/FitZone-Fitness-Center.git
   cd FitZone-Fitness-Center
   ```

2. **Configure Web Server**
   - Place the project folder in your web server's document root
   - For XAMPP: `C:\xampp\htdocs\FitZone-Fitness-Center`
   - For WAMP: `C:\wamp64\www\FitZone-Fitness-Center`

3. **Start Your Web Server**
   - Start Apache and MySQL services
   - Access the application via `http://localhost/FitZone-Fitness-Center`

## 🗄️ Database Setup

1. **Create Database**
   ```sql
   CREATE DATABASE fitzone;
   ```

2. **Configure Database Connection**
   - Update `backend/db.php` with your database credentials:
   ```php
   $servername = "localhost";
   $username = "your_username";
   $password = "your_password";
   $dbname = "fitzone";
   ```

3. **Import Database Schema**
   - Create necessary tables for users, appointments, and other data
   - Ensure proper indexing for optimal performance

## 💻 Usage

### For Members
1. **Registration**: Create an account through the registration page
2. **Login**: Access your personal dashboard
3. **Browse Services**: Explore personal training, group classes, and nutrition services
4. **Book Classes**: Register for fitness classes and personal training sessions
5. **Track Progress**: Monitor your fitness journey through the customer dashboard

### For Staff
1. **Staff Login**: Access the staff dashboard
2. **Manage Classes**: Schedule and modify fitness classes
3. **Member Interaction**: Communicate with members and manage bookings
4. **Class Oversight**: Monitor class attendance and member progress

### For Administrators
1. **Admin Access**: Login to the administrative dashboard
2. **User Management**: Manage member accounts and staff access
3. **System Configuration**: Configure facility settings and services
4. **Analytics**: View reports and facility usage statistics

## 🎯 Dashboard Access

### Customer Dashboard
- Personal profile management
- Class booking history
- Progress tracking
- Payment history

### Staff Dashboard
- Class scheduling and management
- Member communication tools
- Attendance tracking
- Schedule optimization

### Admin Dashboard
- Complete user management
- System configuration
- Analytics and reporting
- Facility management tools

## 🔌 API Endpoints

The application provides several API endpoints for data management:

- `POST /backend/register.php` - User registration
- `POST /backend/login.php` - User authentication
- `POST /backend/appointment.php` - Appointment booking
- `GET /backend/query.php` - Database queries

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**MNSBaanu**
- **GitHub**: [@MNSBaanu](https://github.com/MNSBaanu)
- **Project**: FitZone Fitness Center

---

## 📞 Support

For support, email support@fitzone.com or create an issue in the GitHub repository.

## 🎯 Future Enhancements

- [ ] Mobile application development
- [ ] Payment integration
- [ ] Advanced analytics dashboard
- [ ] Social features and community building
- [ ] Integration with fitness tracking devices
- [ ] Video streaming for virtual classes

---

**Built with ❤️ by MNSBaanu**