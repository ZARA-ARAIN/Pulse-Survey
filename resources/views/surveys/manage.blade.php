@extends('layouts.app')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    body {
        background-color: #fff !important;
        font-family: 'Poppins', sans-serif;
        margin: 0 !important;
        padding: 0 !important;
    }

    .main-container {
        width: 90vw;
        min-height: 100vh;
        margin: -37px auto 0; /* Negative top margin */

    }

    .dashboard-header {
        background: linear-gradient(90deg, #7f4de9, #ef3b96);
        color: white;
        padding: 1.5rem;
        margin-bottom: 0;
        border-radius: 0;
    }

    .dashboard-header h1 {
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
    }

    .setup-heading {
        font-weight: 500;
        color: #333;
        margin-bottom: 1.5rem;
        font-size: 1.3rem;
        padding: 0 1.5rem;
        padding-top: 1rem;
    }

    .tab-list {
        display: flex;
        border-bottom: 2px solid #e0e0e0;
        margin-bottom: 0;
        padding: 0 1.5rem;
        background: white;
    }
    
    .tab-list button {
        background: transparent;
        border: none;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: #555;
        cursor: pointer;
        transition: all 0.3s ease;
        border-bottom: 3px solid transparent;
        margin-right: 0.5rem;
    }
    
    .tab-list button[aria-selected="true"] {
        color: #bd4affff;
        border-bottom-color: #d106faff;
    }

    .tab-content {
        background: white;
        padding: 1.5rem;
        min-height: calc(100vh - 220px);
        font-size: 0.85rem;
        color: #333;
    }

    input, select, textarea {
        font-size: 0.85rem !important;
        padding: 0.4rem 0.6rem !important;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 1rem;
    }
    
    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: #ea02ffff;
        box-shadow: 0 0 0 2px rgba(74, 107, 255, 0.2);
    }
    
    label {
        font-weight: 600;
        color: #555;
        margin-bottom: 0.3rem;
        display: block;
    }

    .btn {
        padding: 0.5rem 1rem;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-danger {
        background-color: #f44336;
        color: white;
    }
    
    .btn-success {
        background-color: #4CAF50;
        color: white;
    }

    /* Employee Management Styles */
    .employee-management {
        width: 100%;
    }
    
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .action-buttons {
        display: flex;
        gap: 10px;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    th, td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid #c5bcbcc4;
    }
    
    th {
        background-color: #f9f9f9;
        font-weight: 600;
    }
    
    .status-badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }
    
    .status-badge.active {
        background-color: #e8f5e9;
        color: #2e7d32;
    }
    
    .status-badge.inactive {
        background-color: #ffebee;
        color: #c62828;
    }

    /* Modal Styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }
    
    .modal-content {
        background-color: white;
        border-radius: 8px;
        width: 600px;
        max-width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        padding: 20px;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 0 20px 0;
        border-bottom: 1px solid #eee;
        margin-bottom: 20px;
    }

    .modal-header h2 {
        margin: 0;
    }

    .close-btn {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: #777;
        padding: 5px;
    }

    .close-btn:hover {
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-section {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }

    .form-section h3 {
        margin-bottom: 15px;
        color: #555;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 24px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 0 0 8px 8px;
        margin: 20px -20px -20px -20px;
    }

    .btn-secondary {
        background-color: #f5f5f5;
        color: #555;
        border: 1px solid #ddd;
        min-width: 80px;
        padding: 8px 16px;
        font-weight: 600;
    }

    .btn-primary {
    background: linear-gradient(90deg, #7f4de9, #ef3b96);
    color: white;
    min-width: 80px;
    padding: 10px 20px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(90deg, #925af0, #f751a7);
}

    input, select, textarea {
        font-size: 0.85rem !important;
        padding: 10px 12px !important;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 1rem;
        background-color: #fff;
    }

    .radio-group {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .checkbox-option {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 10px;
    }

    .drag-drop-area {
        border: 2px dashed #ddd;
        border-radius: 4px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        margin-bottom: 15px;
    }

    .drag-drop-area:hover {
        border-color: #a02cffff;
    }

    .action-icon {
        font-size: 18px;
        cursor: pointer;
        margin: 0 5px;
    }

    .edit-icon {
        color: #2195f3ff;
        font-size: 13px;  

    }

    .delete-icon {
        color: #f44336ff;
        font-size: 13px;  

    }

    /* Frequency Table Styles */
    .frequency-table {
        width: 100%;
        margin-top: 20px;
    }
    
    .frequency-table th {
        background-color: #f5f5f5;
    }
    
    .frequency-actions {
        display: flex;
        gap: 8px;
    }

    .emoji-option {
        font-size: 18px;
        margin-right: 5px;
    }

    .icon-btn {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    color: #8c10d3ff;
    cursor: pointer;
    transition: all 0.3s ease;
}

.icon-btn:hover {
    background: #f0f0f0;
    color: #6200ffff;
}

/* Landscape Form Styles */
.landscape-form {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.landscape-section {
    grid-column: span 2;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.full-width {
    grid-column: span 2;
}

.half-width {
    grid-column: span 1;
}

@media (max-width: 1200px) {
    .landscape-form {
        grid-template-columns: 1fr;
    }
    
    .landscape-section {
        grid-column: span 1;
        grid-template-columns: 1fr;
    }
    
    .full-width, .half-width {
        grid-column: span 1;
    }
}

</style>
@endpush

@section('content')
<div class="main-container">
    <!-- Setup Management Section -->
    <div x-data="setupTabs()">
        <h1 class="setup-heading">Setup Management</h1>

        <nav role="tablist" class="tab-list" aria-label="Setup Sections">
            <button role="tab" :aria-selected="activeTab==='frequency'" @click="activeTab='frequency'" :tabindex="activeTab==='frequency' ? 0 : -1">Frequency</button>
            <button role="tab" :aria-selected="activeTab==='employees'" @click="activeTab='employees'" :tabindex="activeTab==='employees' ? 0 : -1">Employees</button>
            <button role="tab" :aria-selected="activeTab==='designation'" @click="activeTab='designation'" :tabindex="activeTab==='designation' ? 0 : -1">Designation</button>
            <button role="tab" :aria-selected="activeTab==='categories'" @click="activeTab='categories'" :tabindex="activeTab==='categories' ? 0 : -1">Categories</button>
            <button role="tab" :aria-selected="activeTab==='questions'" @click="activeTab='questions'" :tabindex="activeTab==='questions' ? 0 : -1">Questions</button>
            <button role="tab" :aria-selected="activeTab==='teams'" @click="activeTab='teams'" :tabindex="activeTab==='teams' ? 0 : -1">Teams</button>
        </nav>

        <section x-show="activeTab==='frequency'" role="tabpanel" tabindex="0" class="tab-content" x-transition>
            <div class="header">
          <h3 style="font-size: 1rem; font-weight:bold; color: rgba(132, 0, 255, 1)">Manage Frequency</h3>
                <button @click="showAddFrequency = true" class="btn btn-primary">+ Add Frequency</button>
            </div>
            
            <table class="frequency-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(frequency, index) in frequencies" :key="index">
                        <tr>
                            <td x-text="frequency.name"></td>
                            <td x-text="frequency.description"></td>
                            <td>
                                <div class="frequency-actions">
                                    <i class="fas fa-edit action-icon edit-icon" @click="editFrequency(index)" title="Edit"></i>
                                    <i class="fas fa-trash action-icon delete-icon" @click="deleteFrequency(index)" title="Delete"></i>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Add/Edit Frequency Modal -->
            <div x-show="showAddFrequency" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showAddFrequency = false">
                    <div class="modal-header">
            <h2 x-text="editingFrequency ? 'Edit Frequency' : 'Add Frequency'" style="font-size: 1.3rem; font-weight: normal;"></h2>
                        <button @click="showAddFrequency = false" class="close-btn">&times;</button>
                    </div>
                    <form @submit.prevent="saveFrequency">
                        <div class="form-group">
                            <label>Frequency Name</label>
                            <input type="text" x-model="currentFrequency.name" class="form-input" placeholder="e.g. Weekly, Monthly" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Description</label>
                            <textarea x-model="currentFrequency.description" class="form-input" rows="3" placeholder="Describe the frequency"></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" @click="showAddFrequency = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary" x-text="editingFrequency ? 'Update' : 'Save'"></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section x-show="activeTab==='employees'" role="tabpanel" tabindex="0" class="tab-content" x-transition x-data="employeeManagement">
            <div class="employee-management">
                <div class="header">
                    <h3 style="font-size: 1rem; font-weight:bold; color: rgba(132, 0, 255, 1)">Employees</h3>
                    <div class="action-buttons">
                   <!-- Export (Download) -->
            <button @click="exportEmployees" class="icon-btn" title="Export">
             <i class="fas fa-download"></i>
            </button>

            <!-- Import (Upload) -->
            <button @click="importModal = true" class="icon-btn" title="Import">
            <i class="fas fa-upload"></i>
            </button>

             <!-- Add Employee -->
            <button @click="showAddForm = true" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Add Employee
            </button>
             </div>

                </div>

                <!-- Employee Table -->
                <table class="employee-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(employee, index) in employees" :key="index">
                            <tr>
                                <td x-text="employee.name"></td>
                                <td x-text="employee.email"></td>
                                <td x-text="employee.group || '-'"></td>
                                <td>
                                    <span class="status-badge" :class="{'active': employee.status === 'Active', 'inactive': employee.status !== 'Active'}" 
                                          x-text="employee.status"></span>
                                </td>
                                <td>
                                    <i class="fas fa-edit action-icon edit-icon" @click="editEmployee(index)" title="Edit"></i>
                                    <i class="fas fa-trash action-icon delete-icon" @click="deleteEmployee(index)" title="Delete"></i>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>

                <!-- Add Employee Modal -->
<div x-show="showAddForm" x-transition.opacity class="modal-overlay">
    <div class="modal-content" @click.outside="showAddForm = false">
        <div class="modal-header">
            <h2 style="font-size: 1.3rem; font-weight: normal;">Create Employee</h2>
            <button @click="showAddForm = false" class="close-btn">&times;</button>
        </div>
        
        <form @submit.prevent="saveEmployee" class="landscape-form">
            <!-- Account Details Section -->
            <div class="landscape-section full-width">
                <h3 class="full-width">Account Details</h3>
                
                <div class="form-group half-width">
                    <label>Salutation</label>
                    <select x-model="newEmployee.salutation" class="form-input">
                        <option value="">Select</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Dr.">Dr.</option>
                    </select>
                </div>
                
                <div class="form-group half-width">
                    <label>Country</label>
                    <select x-model="newEmployee.country" class="form-input">
                        <option value="">Select Country</option>
                        <option value="USA">United States</option>
                        <option value="UK">United Kingdom</option>
                        <option value="Canada">Canada</option>
                        <option value="Australia">Australia</option>
                    </select>
                </div>
            </div>
            
            <!-- Personal Information Section -->
            <div class="landscape-section full-width">
                <div class="form-group half-width">
                    <label>Employee Name*</label>
                    <input type="text" x-model="newEmployee.name" class="form-input" placeholder="e.g. John Doe" required>
                </div>
                
                <div class="form-group half-width">
                    <label>Mobile</label>
                    <input type="tel" x-model="newEmployee.mobile" class="form-input" placeholder="e.g. 1234567890">
                </div>
                
                <div class="form-group half-width">
                    <label>Employee Email*</label>
                    <input type="email" x-model="newEmployee.email" class="form-input" placeholder="e.g. johndoe@example.com" required>
                </div>
                
                <div class="form-group half-width">
                    <label>Date of Birth</label>
                    <input type="date" x-model="newEmployee.dob" class="form-input" placeholder="mm/dd/yyyy">
                </div>
                
                <div class="form-group half-width">
                    <label>Gender</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="male" x-model="newEmployee.gender" value="Male">
                            <label for="male">Male</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="female" x-model="newEmployee.gender" value="Female">
                            <label for="female">Female</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="other" x-model="newEmployee.gender" value="Other">
                            <label for="other">Other</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group half-width">
                    <label>Language</label>
                    <select x-model="newEmployee.language" class="form-input">
                        <option value="English">English</option>
                        <option value="Spanish">Spanish</option>
                        <option value="French">French</option>
                    </select>
                </div>
            </div>
            
            <!-- Employment Details Section -->
            <div class="landscape-section full-width">
                <h3 class="full-width">Employment Details</h3>
                
                <div class="form-group half-width">
                    <label>Reporting To*</label>
                    <select x-model="newEmployee.reportingTo" class="form-input">
                        <option value="">Select Manager</option>
                        <option value="1">John Doe</option>
                        <option value="2">Jane Smith</option>
                    </select>
                </div>
                
                <div class="form-group half-width">
                    <label>Department</label>
                    <select x-model="newEmployee.department" class="form-input">
                        <option value="">Select Department</option>
                        <option value="HR">Human Resources</option>
                        <option value="IT">Information Technology</option>
                        <option value="Finance">Finance</option>
                    </select>
                </div>
                
                <div class="form-group half-width">
                    <label>Joining Date</label>
                    <input type="date" x-model="newEmployee.joiningDate" class="form-input">
                </div>
                
                <div class="form-group half-width">
                    <label>Designation</label>
                    <select x-model="newEmployee.designation" class="form-input">
                        <option value="">Select Designation</option>
                        <option value="Manager">Manager</option>
                        <option value="Developer">Developer</option>
                        <option value="Designer">Designer</option>
                    </select>
                </div>
                
                <div class="form-group half-width">
                    <label>Employment Type</label>
                    <select x-model="newEmployee.employmentType" class="form-input">
                        <option value="">Select Type</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                    </select>
                </div>
                
                <div class="form-group half-width">
                    <label>Marital Status</label>
                    <select x-model="newEmployee.maritalStatus" class="form-input">
                        <option value="">Select Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                </div>
            </div>
            
            <!-- Roles and Permissions Section -->
            <div class="landscape-section full-width">
                <h3 class="full-width">Roles and Permissions</h3>
                
                <div class="form-group half-width">
                    <label>Employee Roles</label>
                    <div class="checkbox-option">
                        <input type="checkbox" id="admin" x-model="newEmployee.roles.admin">
                        <label for="admin">Administrator</label>
                    </div>
                    <div class="checkbox-option">
                        <input type="checkbox" id="manager" x-model="newEmployee.roles.manager">
                        <label for="manager">Manager</label>
                    </div>
                    <div class="checkbox-option">
                        <input type="checkbox" id="employee" x-model="newEmployee.roles.employee">
                        <label for="employee">Employee</label>
                    </div>
                </div>
                
                <div class="form-group half-width">
                    <label>Login Allowed?</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="login-yes" x-model="newEmployee.loginAllowed" value="Yes">
                            <label for="login-yes">Yes</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="login-no" x-model="newEmployee.loginAllowed" value="No">
                            <label for="login-no">No</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group half-width">
                    <label>Receive email notifications?</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="email-yes" x-model="newEmployee.emailNotifications" value="Yes">
                            <label for="email-yes">Yes</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="email-no" x-model="newEmployee.emailNotifications" value="No">
                            <label for="email-no">No</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Information Section -->
            <div class="landscape-section full-width">
                <h3 class="full-width">Additional Information</h3>
                
                <div class="form-group half-width">
                    <label>Probation End Date</label>
                    <input type="date" x-model="newEmployee.probationEndDate" class="form-input">
                </div>
                
                <div class="form-group half-width">
                    <label>Notice Period Start Date</label>
                    <input type="date" x-model="newEmployee.noticePeriodStart" class="form-input">
                </div>
                
                <div class="form-group half-width">
                    <label>Notice Period End Date</label>
                    <input type="date" x-model="newEmployee.noticePeriodEnd" class="form-input">
                </div>
                
                <div class="form-group half-width">
                    <label>Marriage Anniversary Date</label>
                    <input type="date" x-model="newEmployee.anniversaryDate" class="form-input">
                </div>
                
                <div class="form-group full-width">
                    <label>Profile Picture</label>
                    <div class="drag-drop-area">
                        <p>Drag and drop a file here or click to upload</p>
                        <input type="file" style="display: none;" @change="handleFileUpload">
                    </div>
                </div>
                
                <div class="form-group full-width">
                    <label>Address</label>
                    <textarea x-model="newEmployee.address" class="form-input" rows="3" placeholder="Enter address"></textarea>
                </div>
                
                <div class="form-group full-width">
                    <label>About</label>
                    <textarea x-model="newEmployee.about" class="form-input" rows="3" placeholder="About the employee"></textarea>
                </div>
            </div>
            
            <div class="form-actions full-width">
                <button type="button" @click="showAddForm = false" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

                <!-- Import Modal -->
                <div x-show="importModal" x-transition.opacity class="modal-overlay">
                    <div class="modal-content" @click.outside="importModal = false">
                        <div class="modal-header">
                            <h2 style="font-size: 1.3rem; font-weight: normal;">Import Employees</h2>
                            <button @click="importModal = false" class="close-btn">&times;</button>
                        </div>
                        <form @submit.prevent="importEmployees">
                            <div class="form-group">
                                <label>Select CSV File</label>
                                <input type="file" accept=".csv" @change="handleFileUpload" class="form-input" required>
                            </div>
                            
                            <div class="form-actions">
                                <button type="button" @click="importModal = false" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Other tabs (designation, categories, questions, teams) remain the same but with icon buttons -->
        <section x-show="activeTab==='designation'" role="tabpanel" tabindex="0" class="tab-content" x-transition x-data="designationManagement">
            <div class="header">
                <h3 style="font-size: 1rem; font-weight:bold; color: rgba(132, 0, 255, 1)">Manage Designations</h3>
                <div class="action-buttons">
                    <button @click="showCreateDepartmentModal()" class="btn btn-primary">+ Create Department</button>
                    <button @click="showCreateDesignationModal()" class="btn btn-primary">+ Create Designation</button>
                </div>
            </div>

            <!-- Designation Table -->
            <table class="employee-table">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Color</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(group, groupIndex) in designationGroups" :key="groupIndex">
                        <template x-for="(item, itemIndex) in group.items" :key="itemIndex">
                            <tr>
                                <td x-text="group.name"></td>
                                <td x-text="item.title"></td>
                                <td>
                                    <span x-show="item.color" class="color-badge" :style="'background-color:' + item.color"></span>
                                </td>
                                <td>
                                    <i class="fas fa-edit action-icon edit-icon" @click="editDesignation(item)" title="Edit"></i>
                                    <i class="fas fa-trash action-icon delete-icon" @click="deleteDesignation(item)" title="Delete"></i>
                                </td>
                            </tr>
                        </template>
                    </template>
                </tbody>
            </table>

            <!-- Department Modal -->
            <div x-show="showDepartmentModal" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showDepartmentModal = false">
                    <div class="modal-header">
                        <h2 x-text="editingDepartment ? 'Edit Department' : 'Create Department'" style="font-size: 1.3rem; font-weight: normal;"></h2>
                        <button @click="showDepartmentModal = false" class="close-btn">&times;</button>
                    </div>
                    <form @submit.prevent="saveDepartment">
                        <div class="form-group">
                            <label>Department Name</label>
                            <input type="text" x-model="currentDepartment.name" class="form-input" placeholder="Department name" required>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" @click="showDepartmentModal = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary" x-text="editingDepartment ? 'Update' : 'Save'"></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Designation Modal -->
            <div x-show="showDesignationModal" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showDesignationModal = false">
                    <div class="modal-header">
                        <h2 x-text="editingDesignation ? 'Edit Designation' : 'Create Designation'" style="font-size: 1.3rem; font-weight: normal;"></h2>
                        <button @click="showDesignationModal = false" class="close-btn">&times;</button>
                    </div>
                    <form @submit.prevent="saveDesignation">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" x-model="currentDesignation.title" class="form-input" placeholder="Designation title" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Color</label>
                            <input type="color" x-model="currentDesignation.color" class="form-input">
                        </div>
                        
                        <div class="form-group">
                            <label>Department</label>
                            <select x-model="currentDesignation.group" class="form-input" required>
                                <option value="">Select Department</option>
                                <template x-for="group in designationGroups" :key="group.name">
                                    <option :value="group.name" x-text="group.name"></option>
                                </template>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" @click="showDesignationModal = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary" x-text="editingDesignation ? 'Update' : 'Save'"></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section x-show="activeTab==='categories'" role="tabpanel" tabindex="0" class="tab-content" x-transition x-data="categoryManagement">
            <div class="header">
                <h3 style="font-size: 1rem; font-weight:bold; color: rgba(132, 0, 255, 1)">Manage Categories</h3>
                <div class="action-buttons">
                    <button @click="showGroupModal = true" class="btn btn-primary">+ Create Group</button>
                    <button @click="showCategoryModal = true" class="btn btn-primary">+ Create Category</button>
                </div>
            </div>

            <!-- Categories Table -->
            <table class="employee-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Group</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(category, index) in categories" :key="index">
                        <tr>
                            <td x-text="category.title"></td>
                            <td x-text="category.group || '-'"></td>
                            <td x-text="category.endDate ? formatDate(category.endDate) : 'N/A'"></td>
                            <td>
                                <i class="fas fa-edit action-icon edit-icon" @click="editCategory(index)" title="Edit"></i>
                                <i class="fas fa-trash action-icon delete-icon" @click="deleteCategory(index)" title="Delete"></i>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Group Modal -->
            <div x-show="showGroupModal" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showGroupModal = false">
                    <div class="modal-header">
                        <h2 style="font-size: 1.3rem; font-weight: normal;">Create Category Group</h2>
                        <button @click="showGroupModal = false" class="close-btn">&times;</button>
                    </div>
                    <form @submit.prevent="saveGroup">
                        <div class="form-group">
                            <label>Group Name</label>
                            <input type="text" x-model="newGroup.name" class="form-input" placeholder="Group name" required>
                        </div>
                        <div class="form-actions">
                            <button type="button" @click="showGroupModal = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Category Modal -->
            <div x-show="showCategoryModal" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showCategoryModal = false">
                    <div class="modal-header">
                        <h2 style="font-size: 1.3rem; font-weight: normal;">Create Category</h2>
                        <button @click="showCategoryModal = false" class="close-btn">&times;</button>
                    </div>
                    <form @submit.prevent="saveCategory">
                        <div class="form-group">
                            <label>Category Title</label>
                            <input type="text" x-model="newCategory.title" class="form-input" placeholder="Category title" required>
                        </div>
                        <div class="form-group">
                            <label>End Date (optional)</label>
                            <input type="date" x-model="newCategory.endDate" class="form-input">
                        </div>
                        <div class="form-group">
                            <label>Category Group</label>
                            <select x-model="newCategory.group" class="form-input">
                                <option value="">Select Group</option>
                                <template x-for="group in groups" :key="group.id">
                                    <option :value="group.id" x-text="group.name"></option>
                                </template>
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="button" @click="showCategoryModal = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section x-show="activeTab==='questions'" role="tabpanel" tabindex="0" class="tab-content" x-transition x-data="questionManagement">
            <div class="header">
                <h3 style="font-size: 1rem; font-weight:bold; color: rgba(132, 0, 255, 1)">Manage Questions</h3>
                <button @click="showQuestionModal = true" class="btn btn-primary">+ Create Question</button>
            </div>

            <!-- Questions Table -->
            <table class="employee-table">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(question, index) in questions" :key="index">
                        <tr>
                            <td x-text="question.text"></td>
                            <td>
                                <span x-show="question.type === '00000'">👍👎😊😐😞</span>
                                <span x-show="question.type === 'Vouho'">😃😊😐😕😠</span>
                                <span x-show="question.type === '0-10'">0️⃣-🔟</span>
                                <span x-show="question.type === '---'">✏️</span>
                            </td>
                            <td x-text="question.category"></td>
                            <td x-text="question.department || '-'"></td>
                            <td>
                                <i class="fas fa-edit action-icon edit-icon" @click="editQuestion(index)" title="Edit"></i>
                                <i class="fas fa-trash action-icon delete-icon" @click="deleteQuestion(index)" title="Delete"></i>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Question Modal -->
            <div x-show="showQuestionModal" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showQuestionModal = false">
                    <div class="modal-header">
                        <h2 style="font-size: 1.3rem; font-weight: normal;">Create Question</h2>
                        <button @click="showQuestionModal = false" class="close-btn">&times;</button>
                    </div>
                    <form @submit.prevent="saveQuestion">
                        <div class="form-group">
                            <label>Question Text</label>
                            <textarea x-model="newQuestion.text" class="form-input" rows="3" placeholder="Enter question text" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Type</label>
                            <select x-model="newQuestion.type" class="form-input" required>
                                <option value="">Select Type</option>
                                <option value="00000">👍👎😊😐😞 (Likert Scale)</option>
                                <option value="Vouho">😃😊😐😕😠 (Vouho)</option>
                                <option value="0-10">0️⃣-🔟 (Numeric)</option>
                                <option value="---">✏️ (Text Input)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Category</label>
                            <select x-model="newQuestion.category" class="form-input" required>
                                <option value="">Select Category</option>
                                <option value="Job Satisfaction">Job Satisfaction</option>
                                <option value="Manager Support">Manager Support</option>
                                <option value="Collaboration">Collaboration</option>
                                <option value="Relationship">Relationship</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Department</label>
                            <select x-model="newQuestion.department" class="form-input">
                                <option value="">Select Department</option>
                                <option value="HR">Human Resources</option>
                                <option value="IT">Information Technology</option>
                                <option value="Finance">Finance</option>
                                <option value="Operations">Operations</option>
                                <option value="Marketing">Marketing</option>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" @click="showQuestionModal = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section x-show="activeTab==='teams'" role="tabpanel" tabindex="0" class="tab-content" x-transition>
            <div class="header">
                <h3 style="font-size: 1rem; font-weight:bold; color: rgba(132, 0, 255, 1)">Manage Teams</h3>
                <button @click="showAddTeam = true" class="btn btn-primary">+ Add Team</button>
            </div>
            
            <table class="employee-table">
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Team Lead</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(team, index) in teams" :key="index">
                        <tr>
                            <td x-text="team.name"></td>
                            <td x-text="team.lead || '-'"></td>
                            <td>
                                <i class="fas fa-edit action-icon edit-icon" @click="editTeam(index)" title="Edit"></i>
                                <i class="fas fa-trash action-icon delete-icon" @click="deleteTeam(index)" title="Delete"></i>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Team Modal -->
            <div x-show="showAddTeam" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showAddTeam = false">
                    <div class="modal-header">
                        <h2 x-text="editingTeam ? 'Edit Team' : 'Add Team'" style="font-size: 1.3rem; font-weight: normal;"></h2>
                        <button @click="showAddTeam = false" class="close-btn">&times;</button>
                    </div>
                    <form @submit.prevent="saveTeam">
                        <div class="form-group">
                            <label>Team Name</label>
                            <input type="text" x-model="currentTeam.name" class="form-input" placeholder="Team name" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Team Lead</label>
                            <input type="text" x-model="currentTeam.lead" class="form-input" placeholder="Team lead name">
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" @click="showAddTeam = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary" x-text="editingTeam ? 'Update' : 'Save'"></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
document.addEventListener('alpine:init', () => {
    // Employee Management
    Alpine.data('employeeManagement', () => ({
        showAddForm: false,
        importModal: false,
        newEmployee: {
            salutation: '',
            country: '',
            name: '',
            mobile: '',
            email: '',
            dob: '',
            profilePic: null,
            gender: '',
            reportingTo: '',
            language: 'English',
            department: '',
            joiningDate: '',
            designation: '',
            roles: {
                admin: false,
                manager: false,
                employee: false
            },
            address: '',
            about: '',
            loginAllowed: 'Yes',
            emailNotifications: 'Yes',
            employmentType: '',
            maritalStatus: '',
            probationEndDate: '',
            noticePeriodStart: '',
            noticePeriodEnd: '',
            anniversaryDate: ''
        },
        employees: [
            { name: 'John Doe', email: 'john@example.com', group: 'Management', status: 'Active' },
            { name: 'Jane Smith', email: 'jane@example.com', group: 'Development', status: 'Active' },
            { name: 'Bob Johnson', email: 'bob@example.com', group: 'HR', status: 'Inactive' }
        ],
        saveEmployee() {
            // In a real app, you would validate the data first
            this.employees.push({...this.newEmployee});
            this.resetForm();
            this.showAddForm = false;
        },
        editEmployee(index) {
            this.newEmployee = {...this.employees[index]};
            this.employees.splice(index, 1);
            this.showAddForm = true;
        },
        deleteEmployee(index) {
            if (confirm('Are you sure you want to delete this employee?')) {
                this.employees.splice(index, 1);
            }
        },
        resetForm() {
            this.newEmployee = {
                salutation: '',
                country: '',
                name: '',
                mobile: '',
                email: '',
                dob: '',
                profilePic: null,
                gender: '',
                reportingTo: '',
                language: 'English',
                department: '',
                joiningDate: '',
                designation: '',
                roles: {
                    admin: false,
                    manager: false,
                    employee: false
                },
                address: '',
                about: '',
                loginAllowed: 'Yes',
                emailNotifications: 'Yes',
                employmentType: '',
                maritalStatus: '',
                probationEndDate: '',
                noticePeriodStart: '',
                noticePeriodEnd: '',
                anniversaryDate: ''
            };
        },
        handleFileUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.newEmployee.profilePic = file;
            }
        },
        exportEmployees() {
            const data = JSON.stringify(this.employees, null, 2);
            const blob = new Blob([data], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'employees_export.json';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        },
        importEmployees() {
            // In a real app, you would validate the data first
            alert('Employees imported successfully!');
            this.importModal = false;
        }
    }));    

    // Designation Management
    Alpine.data('designationManagement', () => ({
        showDepartmentModal: false,
        showDesignationModal: false,
        editingDepartment: false,
        editingDesignation: false,
        currentDepartment: { name: '' },
        currentDesignation: { title: '', color: '', group: '' },
        designationGroups: [
            {
                name: 'Executive Department',
                items: [
                    { id: '1', title: 'CIO', color: '#FF0000', group: 'Executive Department' },
                    { id: '2', title: 'CEO', color: '', group: 'Executive Department' }
                ]
            }
        ],
        showCreateDepartmentModal() {
            this.editingDepartment = false;
            this.currentDepartment = { name: '' };
            this.showDepartmentModal = true;
        },
        showCreateDesignationModal() {
            this.editingDesignation = false;
            this.currentDesignation = { title: '', color: '', group: '' };
            this.showDesignationModal = true;
        },
        editDepartment(group) {
            this.editingDepartment = true;
            this.currentDepartment = { name: group.name };
            this.showDepartmentModal = true;
        },
        editDesignation(item) {
            this.editingDesignation = true;
            this.currentDesignation = { ...item };
            this.showDesignationModal = true;
        },
        saveDepartment() {
            if (this.editingDepartment) {
                // Update logic
            } else {
                this.designationGroups.push({
                    name: this.currentDepartment.name,
                    items: []
                });
            }
            this.showDepartmentModal = false;
        },
        saveDesignation() {
            if (this.editingDesignation) {
                // Update logic
            } else {
                // Add new designation
            }
            this.showDesignationModal = false;
        }
    }));

    // Category Management
    Alpine.data('categoryManagement', () => ({
        showGroupModal: false,
        showCategoryModal: false,
        newGroup: { name: '' },
        newCategory: { title: '', endDate: '', group: '' },
        groups: [
            { id: '1', name: 'Survey Groups' },
            { id: '2', name: 'Feedback Groups' }
        ],
        categories: [
            { title: 'Engagement', endDate: '' },
            { title: 'Job Satisfaction', endDate: '2026-04-28' }
        ],
        saveGroup() {
            this.groups.push({...this.newGroup});
            this.showGroupModal = false;
        },
        saveCategory() {
            this.categories.push({...this.newCategory});
            this.showCategoryModal = false;
        },
        formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toLocaleDateString();
        }
    }));

    // Question Management
    Alpine.data('questionManagement', () => ({
        showQuestionModal: false,
        newQuestion: {
            text: '',
            type: '',
            category: '',
            department: ''
        },
        questions: [
            { text: 'I am satisfied with my job', type: '00000', category: 'Job Satisfaction', department: 'HR' }
        ],
        saveQuestion() {
            this.questions.push({...this.newQuestion});
            this.showQuestionModal = false;
            this.newQuestion = { text: '', type: '', category: '', department: '' };
        },
        editQuestion(index) {
            this.newQuestion = {...this.questions[index]};
            this.questions.splice(index, 1);
            this.showQuestionModal = true;
        }
    }));
    
});

function setupTabs(){
    return {
        activeTab: 'frequency',
        showAddFrequency: false,
        editingFrequency: false,
        currentFrequency: {
            name: '',
            description: ''
        },
        frequencies: [
            { name: 'Weekly', description: 'Survey conducted every week' },
            { name: 'Monthly', description: 'Survey conducted every month' },
            { name: 'Quarterly', description: 'Survey conducted every quarter' }
        ],
        showAddTeam: false,
        editingTeam: false,
        currentTeam: {
            name: '',
            lead: ''
        },
        teams: [
            { name: 'Development Team', lead: 'John Doe' },
            { name: 'Marketing Team', lead: 'Jane Smith' }
        ],
        saveFrequency() {
            if (this.editingFrequency) {
                // Find and update frequency
                const index = this.frequencies.findIndex(f => f.name === this.currentFrequency.name);
                if (index !== -1) {
                    this.frequencies[index] = {...this.currentFrequency};
                }
            } else {
                this.frequencies.push({...this.currentFrequency});
            }
            this.showAddFrequency = false;
            this.currentFrequency = { name: '', description: '' };
            this.editingFrequency = false;
        },
        editFrequency(index) {
            this.currentFrequency = {...this.frequencies[index]};
            this.frequencies.splice(index, 1);
            this.editingFrequency = true;
            this.showAddFrequency = true;
        },
        deleteFrequency(index) {
            if (confirm('Are you sure you want to delete this frequency?')) {
                this.frequencies.splice(index, 1);
            }
        },
        saveTeam() {
            if (this.editingTeam) {
                // Find and update team
                const index = this.teams.findIndex(t => t.name === this.currentTeam.name);
                if (index !== -1) {
                    this.teams[index] = {...this.currentTeam};
                }
            } else {
                this.teams.push({...this.currentTeam});
            }
            this.showAddTeam = false;
            this.currentTeam = { name: '', lead: '' };
            this.editingTeam = false;
        },
        editTeam(index) {
            this.currentTeam = {...this.teams[index]};
            this.teams.splice(index, 1);
            this.editingTeam = true;
            this.showAddTeam = true;
        },
        deleteTeam(index) {
            if (confirm('Are you sure you want to delete this team?')) {
                this.teams.splice(index, 1);
            }
        }
    }
}
</script>
@endsection