# INTIA INSURANCE - TESTING GUIDE

## 📋 Table of Contents
1. [Manual Testing](#manual-testing)
2. [Automated Testing](#automated-testing)
3. [Test Scenarios](#test-scenarios)
4. [Test Data](#test-data)

---

## 🧪 Manual Testing

### Prerequisites
1. Ensure the application is running: `php artisan serve`
2. Database is seeded with test data: `php artisan db:seed`
3. Login credentials ready: `admin@intia.com` / `admin`

---

## 1️⃣ Authentication Testing

### Test Case 1.1: User Login
**Steps:**
1. Navigate to `http://localhost:8000/login`
2. Enter email: `admin@intia.com`
3. Enter password: `admin`
4. Click "Log in"

**Expected Result:**
- ✅ Redirected to dashboard
- ✅ User name displayed in navigation
- ✅ Navigation menu shows: Dashboard, Branches, Customers, Policies

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 1.2: Invalid Login
**Steps:**
1. Navigate to `http://localhost:8000/login`
2. Enter email: `wrong@email.com`
3. Enter password: `wrongpassword`
4. Click "Log in"

**Expected Result:**
- ✅ Error message displayed
- ✅ User remains on login page

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 1.3: Logout
**Steps:**
1. Login as admin
2. Click on user dropdown in navigation
3. Click "Logout"

**Expected Result:**
- ✅ Redirected to welcome/login page
- ✅ Session cleared
- ✅ Cannot access protected routes

**Test Status:** [ ] Pass [ ] Fail

---

## 2️⃣ Dashboard Testing

### Test Case 2.1: Dashboard Statistics
**Steps:**
1. Login as admin
2. Navigate to dashboard

**Expected Result:**
- ✅ Displays total branches count (should be 3)
- ✅ Displays total customers count (should be 20)
- ✅ Displays total policies count (should be 30)
- ✅ All cards have "View All" buttons

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 2.2: Dashboard Navigation
**Steps:**
1. From dashboard, click "View All" on Branches card
2. Verify redirected to branches page
3. Repeat for Customers and Policies

**Expected Result:**
- ✅ Each button redirects to correct page
- ✅ Data loads correctly on each page

**Test Status:** [ ] Pass [ ] Fail

---

## 3️⃣ Branch Management Testing

### Test Case 3.1: View All Branches
**Steps:**
1. Login as admin
2. Click "Branches" in navigation
3. Verify branches list

**Expected Result:**
- ✅ Table displays all branches
- ✅ Shows: Name, Location, Customers count, Policies count
- ✅ Action buttons visible: View, Edit, Delete
- ✅ "Add Branch" button visible

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 3.2: Create New Branch
**Steps:**
1. Navigate to Branches page
2. Click "Add Branch"
3. Fill form:
   - Name: `Test Branch`
   - Location: `Test City`
4. Click "Create"

**Expected Result:**
- ✅ Success message displayed
- ✅ Redirected to branches list
- ✅ New branch appears in table

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 3.3: Create Branch - Validation
**Steps:**
1. Navigate to Branches → Create
2. Leave all fields empty
3. Click "Create"

**Expected Result:**
- ✅ Validation errors displayed
- ✅ Form not submitted
- ✅ User remains on create page

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 3.4: Create Branch - Duplicate Name
**Steps:**
1. Navigate to Branches → Create
2. Enter name: `Head Office` (existing branch)
3. Enter location: `Test Location`
4. Click "Create"

**Expected Result:**
- ✅ Validation error: "The name has already been taken"
- ✅ Form not submitted

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 3.5: View Branch Details
**Steps:**
1. Navigate to Branches page
2. Click "View" on any branch

**Expected Result:**
- ✅ Shows branch name and location
- ✅ Displays total customers count
- ✅ Displays total policies count
- ✅ "Back" button visible

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 3.6: Edit Branch
**Steps:**
1. Navigate to Branches page
2. Click "Edit" on any branch
3. Modify name to: `Updated Branch Name`
4. Click "Update"

**Expected Result:**
- ✅ Success message displayed
- ✅ Redirected to branches list
- ✅ Branch name updated in table

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 3.7: Delete Branch
**Steps:**
1. Navigate to Branches page
2. Click "Delete" on test branch
3. Confirm deletion in alert

**Expected Result:**
- ✅ Confirmation dialog appears
- ✅ Success message displayed
- ✅ Branch removed from list

**Test Status:** [ ] Pass [ ] Fail

---

## 4️⃣ Customer Management Testing

### Test Case 4.1: View All Customers
**Steps:**
1. Login as admin
2. Click "Customers" in navigation

**Expected Result:**
- ✅ Table displays all customers
- ✅ Shows: Name, Email, Phone, Branch
- ✅ Action buttons visible: View, Edit, Delete
- ✅ "Add Customer" button visible

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 4.2: Create New Customer
**Steps:**
1. Navigate to Customers page
2. Click "Add Customer"
3. Fill form:
   - Name: `John Doe`
   - Email: `john.doe@test.com`
   - Phone: `+237 123 456 789`
   - Address: `123 Test Street, Yaoundé`
   - Date of Birth: `1990-01-01`
   - Branch: Select `Head Office`
4. Click "Create"

**Expected Result:**
- ✅ Success message displayed
- ✅ Redirected to customers list
- ✅ New customer appears in table

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 4.3: Create Customer - Validation
**Steps:**
1. Navigate to Customers → Create
2. Leave required fields empty
3. Click "Create"

**Expected Result:**
- ✅ Validation errors for all required fields
- ✅ Form not submitted

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 4.4: Create Customer - Duplicate Email
**Steps:**
1. Navigate to Customers → Create
2. Enter email that already exists
3. Fill other fields
4. Click "Create"

**Expected Result:**
- ✅ Validation error: "The email has already been taken"
- ✅ Form not submitted

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 4.5: View Customer Details
**Steps:**
1. Navigate to Customers page
2. Click "View" on any customer

**Expected Result:**
- ✅ Shows customer information (name, email, phone, address, DOB, branch)
- ✅ Displays list of customer's policies
- ✅ If no policies, shows "No policies found"
- ✅ "Back" button visible

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 4.6: Edit Customer
**Steps:**
1. Navigate to Customers page
2. Click "Edit" on any customer
3. Modify phone number
4. Click "Update"

**Expected Result:**
- ✅ Success message displayed
- ✅ Redirected to customers list
- ✅ Customer information updated

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 4.7: Delete Customer
**Steps:**
1. Navigate to Customers page
2. Click "Delete" on test customer
3. Confirm deletion

**Expected Result:**
- ✅ Confirmation dialog appears
- ✅ Success message displayed
- ✅ Customer removed from list
- ✅ Associated policies also deleted (cascade)

**Test Status:** [ ] Pass [ ] Fail

---

## 5️⃣ Policy Management Testing

### Test Case 5.1: View All Policies
**Steps:**
1. Login as admin
2. Click "Policies" in navigation

**Expected Result:**
- ✅ Table displays all policies
- ✅ Shows: Policy Number, Customer, Type, Premium, Status, Branch
- ✅ Status badges colored correctly (Active=green, Expired=yellow, Cancelled=red)
- ✅ Action buttons visible: View, Edit, Delete
- ✅ "Add Policy" button visible

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 5.2: Create New Policy
**Steps:**
1. Navigate to Policies page
2. Click "Add Policy"
3. Fill form:
   - Policy Number: `POL-TEST-001`
   - Customer: Select any customer
   - Type: `Auto`
   - Branch: Select any branch
   - Coverage Amount: `50000.00`
   - Premium Amount: `500.00`
   - Start Date: Today's date
   - End Date: One year from today
   - Status: `Active`
4. Click "Create"

**Expected Result:**
- ✅ Success message displayed
- ✅ Redirected to policies list
- ✅ New policy appears in table

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 5.3: Create Policy - Validation
**Steps:**
1. Navigate to Policies → Create
2. Leave required fields empty
3. Click "Create"

**Expected Result:**
- ✅ Validation errors for all required fields
- ✅ Form not submitted

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 5.4: Create Policy - Invalid Dates
**Steps:**
1. Navigate to Policies → Create
2. Fill all fields
3. Set End Date before Start Date
4. Click "Create"

**Expected Result:**
- ✅ Validation error: "The end date must be after start date"
- ✅ Form not submitted

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 5.5: Create Policy - Duplicate Policy Number
**Steps:**
1. Navigate to Policies → Create
2. Enter policy number that already exists
3. Fill other fields
4. Click "Create"

**Expected Result:**
- ✅ Validation error: "The policy number has already been taken"
- ✅ Form not submitted

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 5.6: View Policy Details
**Steps:**
1. Navigate to Policies page
2. Click "View" on any policy

**Expected Result:**
- ✅ Shows policy information (number, type, status, coverage, premium, dates)
- ✅ Shows customer information (name, email, phone, branch)
- ✅ Status badge displayed with correct color
- ✅ Amounts formatted with currency symbol
- ✅ "Back" button visible

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 5.7: Edit Policy
**Steps:**
1. Navigate to Policies page
2. Click "Edit" on any policy
3. Change status to `Expired`
4. Click "Update"

**Expected Result:**
- ✅ Success message displayed
- ✅ Redirected to policies list
- ✅ Policy status updated with correct badge color

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 5.8: Delete Policy
**Steps:**
1. Navigate to Policies page
2. Click "Delete" on test policy
3. Confirm deletion

**Expected Result:**
- ✅ Confirmation dialog appears
- ✅ Success message displayed
- ✅ Policy removed from list

**Test Status:** [ ] Pass [ ] Fail

---

## 6️⃣ Relationship Testing

### Test Case 6.1: Customer-Policy Relationship
**Steps:**
1. Create a new customer
2. Create a new policy for that customer
3. View customer details

**Expected Result:**
- ✅ Policy appears in customer's policy list
- ✅ Policy shows correct customer name

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 6.2: Branch-Customer Relationship
**Steps:**
1. View branch details
2. Check customer count

**Expected Result:**
- ✅ Count matches number of customers assigned to branch
- ✅ Deleting branch cascades to customers

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 6.3: Branch-Policy Relationship
**Steps:**
1. View branch details
2. Check policy count

**Expected Result:**
- ✅ Count matches number of policies assigned to branch
- ✅ Deleting branch cascades to policies

**Test Status:** [ ] Pass [ ] Fail

---

## 7️⃣ UI/UX Testing

### Test Case 7.1: Responsive Design
**Steps:**
1. Open application in browser
2. Resize window to mobile size (375px)
3. Test navigation menu
4. Test tables

**Expected Result:**
- ✅ Navigation collapses to hamburger menu
- ✅ Tables are scrollable horizontally
- ✅ Forms stack vertically
- ✅ All buttons accessible

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 7.2: Navigation
**Steps:**
1. Login and test all navigation links
2. Verify active states

**Expected Result:**
- ✅ All links work correctly
- ✅ Active page highlighted in navigation
- ✅ Dropdown menu works

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 7.3: Success Messages
**Steps:**
1. Perform any create/update/delete operation
2. Check for success message

**Expected Result:**
- ✅ Green alert displayed at top
- ✅ Message is dismissible
- ✅ Message auto-disappears or has close button

**Test Status:** [ ] Pass [ ] Fail

---

### Test Case 7.4: Form Validation Display
**Steps:**
1. Submit any form with invalid data
2. Check error display

**Expected Result:**
- ✅ Errors displayed below/near input fields
- ✅ Input fields highlighted in red
- ✅ Error messages clear and helpful

**Test Status:** [ ] Pass [ ] Fail

---

## 🔧 Automated Testing

### Setup Test Environment
```bash
# Create test database
touch database/testing.sqlite

# Run tests
php artisan test
```

### Running Specific Tests
```bash
# Run all tests
php artisan test

# Run with Pest
./vendor/bin/pest

# Run specific test file
php artisan test tests/Feature/BranchTest.php

# Run with coverage
php artisan test --coverage
```

---

## 📊 Test Data

### Default Seeded Data
After running `php artisan db:seed`:

**Branches (3):**
- Head Office (Yaoundé)
- Intia-Douala (Douala)
- Intia-Yaounde (Yaoundé)

**Customers (20):**
- Random generated customers with faker
- Distributed across all branches

**Policies (30):**
- Random generated policies
- All policy types represented
- Various statuses (Active, Expired, Cancelled)

**Users (1):**
- Email: admin@intia.com
- Password: admin
- Role: Admin
- Branch: Head Office

---

## ✅ Testing Checklist

### Before Testing
- [ ] Application installed correctly
- [ ] Database migrated and seeded
- [ ] Server running on http://localhost:8000
- [ ] Browser cache cleared

### Authentication
- [ ] Login with valid credentials
- [ ] Login with invalid credentials
- [ ] Logout functionality
- [ ] Protected routes require authentication

### Branch Management
- [ ] View all branches
- [ ] Create new branch
- [ ] View branch details
- [ ] Edit branch
- [ ] Delete branch
- [ ] Validation works correctly

### Customer Management
- [ ] View all customers
- [ ] Create new customer
- [ ] View customer details with policies
- [ ] Edit customer
- [ ] Delete customer
- [ ] Validation works correctly
- [ ] Email uniqueness enforced

### Policy Management
- [ ] View all policies
- [ ] Create new policy
- [ ] View policy details
- [ ] Edit policy
- [ ] Delete policy
- [ ] Validation works correctly
- [ ] Policy number uniqueness enforced
- [ ] Date validation works

### Relationships
- [ ] Customer shows correct branch
- [ ] Policy shows correct customer
- [ ] Branch shows correct counts
- [ ] Cascade deletes work

### UI/UX
- [ ] Responsive design works
- [ ] Navigation functional
- [ ] Success messages display
- [ ] Error messages display
- [ ] Forms user-friendly

---

## 🐛 Bug Reporting Template

When you find a bug, report it using this format:

```
**Bug Title:** [Short description]

**Steps to Reproduce:**
1. Step one
2. Step two
3. Step three

**Expected Result:**
What should happen

**Actual Result:**
What actually happened

**Screenshots:**
[Attach if applicable]

**Environment:**
- Browser: [e.g., Chrome 120]
- OS: [e.g., Windows 11]
- PHP Version: [e.g., 8.2]
```

---

## 📝 Test Results Summary

| Module | Total Tests | Passed | Failed | Status |
|--------|-------------|--------|--------|--------|
| Authentication | 3 | - | - | ⏳ Pending |
| Dashboard | 2 | - | - | ⏳ Pending |
| Branches | 7 | - | - | ⏳ Pending |
| Customers | 7 | - | - | ⏳ Pending |
| Policies | 8 | - | - | ⏳ Pending |
| Relationships | 3 | - | - | ⏳ Pending |
| UI/UX | 4 | - | - | ⏳ Pending |
| **TOTAL** | **34** | **-** | **-** | **⏳ Pending** |

---

**Last Updated:** [Date]  
**Tested By:** [Your Name]  
**Version:** 1.0.0
