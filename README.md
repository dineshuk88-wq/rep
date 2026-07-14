# Diksha Accounting ERP - Saudi Edition

A comprehensive Enterprise Resource Planning (ERP) system built with PHP 8.2+, MySQL 8, Bootstrap 5, and AdminLTE 4.

## Features

### Phase 1: Core Setup (10 Days)
- **Module 1**: Login, Dashboard, Company, Users, Roles, Permissions, Financial Year, Settings
- **Module 2**: Chart of Accounts, Account Groups, Opening Balance, Currency, VAT Setup

### Phase 2: Vouchers
- Journal Voucher
- Payment Voucher
- Receipt Voucher
- Contra Voucher
- Expense Voucher

### Phase 3: Operations
- Customer Management
- Supplier Management
- Sales Module
- Purchase Module
- Inventory Management

### Phase 4: Financial Reporting
- General Ledger
- Trial Balance
- Balance Sheet
- Profit & Loss
- Cash Book
- Bank Book

### Phase 5: Saudi Compliance
- Saudi VAT
- QR Code Generation
- ZATCA XML
- Digital Signature
- Arabic Invoice
- English Invoice

## Technology Stack

- **Backend**: PHP 8.2+
- **Database**: MySQL 8
- **Frontend**: Bootstrap 5, AdminLTE 4
- **Database Access**: PDO
- **JavaScript**: jQuery + AJAX

## Installation

1. Clone the repository
2. Install dependencies: `composer install`
3. Copy `.env.example` to `.env` and configure
4. Run migrations: `php migrate.php`
5. Set up web server to point to `public/` directory

## Directory Structure

```
.
├── app/                 # Application logic
│   ├── Controllers/     # Page controllers
│   ├── Models/          # Database models
│   └── Services/        # Business logic
├── config/              # Configuration files
├── database/            # Database migrations
├── public/              # Public assets
│   ├── index.php        # Entry point
│   ├── css/             # Stylesheets
│   └── js/              # JavaScript files
├── resources/           # Template files
│   ├── views/           # HTML templates
│   └── layouts/         # Layout templates
├── routes/              # Route definitions
├── storage/             # Logs and cache
├── .env.example         # Environment example
├── composer.json        # PHP dependencies
└── README.md            # This file
```

## License

Private - All Rights Reserved
