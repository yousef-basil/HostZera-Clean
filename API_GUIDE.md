# HostZera API Documentation

Welcome to the HostZera Backend API. This document provides all the necessary information for the frontend developer to integrate with the backend.

## Base URL
`http://localhost:8000`

---

## 🔐 Authentication

### 1. Initialize CSRF protection
**Endpoint:** `GET /sanctum/csrf-cookie`  
**Description:** Must be called before any login/register request if using browser-based cookies.

---

### 2. Login (Smart Login)
**Endpoint:** `POST /api/login`  
**Description:** Handles both regular users and admins from a single form.

**Request Body:**
```json
{
  "email": "user@example.com",
  "password": "password123",
  "remember": true
}
```

**Response (Success):**
```json
{
  "status": "success",
  "user": {
    "id": 1,
    "name": "HostZera Admin",
    "email": "admin@hostzera.com",
    "is_super_admin": true,
    ...
  },
  "role": "admin" 
}
```
> [!NOTE]
> The `role` field will be either `"admin"` or `"user"`. Use this to decide which dashboard to show.

---

### 3. Register
**Endpoint:** `POST /api/register`  
**Description:** Creates a new user account. Triggers an OTP email.

**Request Body:**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

---

### 4. Verify OTP
**Endpoint:** `POST /api/verify-otp`  
**Description:** Verifies the user's email using the code sent during registration.

**Request Body:**
```json
{
  "email": "john@example.com",
  "otp": "123456"
}
```

---

## 📦 Services & Categories

### 1. List All Services
**Endpoint:** `GET /api/services`  
**Description:** Returns a list of all active hosting services.

---

### 2. List Categories (Nested)
**Endpoint:** `GET /api/categories`  
**Description:** Returns categories with their associated services. Use this for the "Products" dropdown or navigation.

---

## 👤 User Area (Requires Auth)

> [!IMPORTANT]
> All routes below require the user to be authenticated via Sanctum.

### 1. Current User Profile
**Endpoint:** `GET /api/user`

### 2. User My Services (Inventory)
**Endpoint:** `GET /api/user/services`  
**Description:** Returns the services owned by the logged-in user.

---

## 🛠 Admin Management (Optional)
If you are building the Admin Panel via API, these routes are also available:
- `GET /admin/users` (Requires admin auth)
- `POST /admin/sync` (Trigger WHMCS Sync)
