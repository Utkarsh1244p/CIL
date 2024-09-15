### (Sarvi Solution Task-3)

# CIL Project

The CIL project is a web application built using Laravel (using Vite).

## Prerequisites

Before running the project, make sure you have the following installed:
- PHP (>= 8.0)
- Composer
- Node.js (>= 14.x)
- npm (Node Package Manager)

## Installation

Follow these steps to set up the project:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/Utkarsh1244p/cil.git
   cd cil

2. **Install PHP Dependencies**

- Run the following command to install PHP dependencies using Composer:
   ```bash
   composer install

3. **Install JavaScript Dependencies**

- Install the required JavaScript dependencies using npm:
   ```bash
   npm install

4. **Create a Symbolic Link**

- Create a symbolic link for the storage directory, it is necessary for update profile image:
   ```bash
   php artisan storage:link

5. **Run Development Server**

- Start the Laravel development server:
   ```bash
   php artisan serve

6. **Run Vite Development Server**

- In a separate terminal window, start the Vite development server:
   ```bash
   npm run dev

