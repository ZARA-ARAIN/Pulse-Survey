@extends('layouts.app')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

/* Base Styles */
* {
    box-sizing: border-box;
}

body {
    background-color: #fff !important;
    margin: 0 !important;
    padding: 0 !important;
    font-family: 'Poppins', sans-serif;
}

/* Dashboard Header */
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
    margin: -37px auto 0;
}

/* Tab Styles */
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

/* Form Elements */
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

/* Buttons */
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
    padding: 0 0 15px 0;
    border-bottom: 1px solid #eee;
    margin-bottom: 15px;
}

.modal-header h2 {
    margin: 0;
    font-size: 1.3rem;
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
    margin-bottom: 15px;
}

.form-section {
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.form-section h3 {
    margin-bottom: 12px;
    color: #555;
    font-size: 1.1rem;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 20px;
    padding: 12px;
    background-color: #f9f9f9;
    border-radius: 0 0 8px 8px;
    margin: 20px -20px -20px -20px;
}

/* Form Inputs */
.form-input {
    padding: 8px 10px !important;
    font-size: 0.85rem !important;
    height: 38px;
    margin-bottom: 0.5rem;
}

/* Radio & Checkbox Groups */
.radio-group {
    display: flex;
    gap: 15px;
    margin-bottom: 12px;
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
    margin-bottom: 8px;
}

/* Drag & Drop Area */
.drag-drop-area {
    border: 2px dashed #ddd;
    border-radius: 4px;
    padding: 15px;
    text-align: center;
    cursor: pointer;
    margin-bottom: 12px;
}

.drag-drop-area:hover {
    border-color: #a02cffff;
}

/* Action Icons */
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

/* Horizontal Form Styles */
.horizontal-form {
    display: flex;
    flex-direction: column;
    gap: 0;
    max-height: 60vh;
    overflow-y: auto;
    padding-right: 5px;
    margin-top: 10px;
}

.horizontal-form::-webkit-scrollbar {
    width: 6px;
}

.horizontal-form::-webkit-scrollbar-thumb {
    background: #d1d5db;
    border-radius: 3px;
}

.form-section-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    width: 100%;
    margin-bottom: 5px;
}

.form-section-title {
    grid-column: span 2;
    margin: 10px 0 8px 0;
    padding-bottom: 5px;
    border-bottom: 1px solid #eee;
    font-size: 1rem;
    color: #555;
    font-weight: 600;
}

/* Search Components */
.search-container {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 0px;
}

.search-input {
    padding: 8px 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 200px;
    height: 38px;
    font-size: 0.85rem;
}

.search-btn {
    padding: 8px 12px;
    height: 38px;
    font-size: 0.85rem;
    min-width: auto;
}
.switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
}

input:checked + .slider {
    background-color: #a014f1ff;
}

input:checked + .slider:before {
    transform: translateX(26px);
}

.slider.round {
    border-radius: 24px;
}

.slider.round:before {
    border-radius: 50%;
}

.frequency-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.frequency-table th {
    background-color: #f8f9fa;
    padding: 12px 15px;
    text-align: left;
    font-weight: 600;
    color: #495057;
    border-bottom: 2px solid #e9ecef;
}

.frequency-table td {
    padding: 12px 15px;
    border-bottom: 1px solid #e9ecef;
    color: #495057;
}

.frequency-table tr:last-child td {
    border-bottom: none;
}

.frequency-actions {
    display: flex;
    gap: 12px;
}

/* Header Actions */
.header-actions {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

/* Textarea Styling */
textarea.form-input {
    height: auto;
    min-height: 60px;
    resize: vertical;
}

/* Permissions Table */
.permissions-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.permissions-table th, 
.permissions-table td {
    border: 1px solid #e2e8f0;
    padding: 8px;
    text-align: left;
}

.permissions-table th {
    background-color: #f7fafc;
    font-weight: 500;
}

.permissions-table-container {
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    padding: 10px;
}

/* Width Classes */
.full-width {
    grid-column: span 2;
}

.half-width {
    grid-column: span 1;
}

.third-width {
    grid-column: span 1;
}

/* Responsive Adjustments */
@media (max-width: 900px) {
    .form-section-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .full-width {
        grid-column: span 2;
    }
    
    .modal-content {
        width: 95%;
    }
}

@media (max-width: 768px) {
    .form-section-grid {
        grid-template-columns: 1fr;
    }
    
    .form-section-title {
        grid-column: span 1;
    }
    
    .search-input {
        width: 100%;
    }
    
    .modal-content {
        width: 95%;
        padding: 15px;
    }
    
    .form-actions {
        padding: 10px 15px;
        margin: 15px -15px -15px -15px;
    }
    
    .header-actions {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .search-container {
        width: 100%;
    }
    
    .search-input {
        width: 100%;
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
            <button role="tab" :aria-selected="activeTab==='company'" @click="activeTab='company'" :tabindex="activeTab==='company' ? 0 : -1">Company</button>
            <button role="tab" :aria-selected="activeTab==='roles'" @click="activeTab='roles'" :tabindex="activeTab==='roles' ? 0 : -1">Roles & Permissions</button>
        </nav>

<section x-show="activeTab==='frequency'" role="tabpanel" tabindex="0" class="tab-content" x-transition
         x-data="frequencyManager">
    <div class="header">
        <h3 style="font-size: 1rem; font-weight: 500; color: black">Manage Frequency</h3>
        <button @click="showAddFrequency = true" class="btn btn-primary">+ Add Frequency</button>
    </div>
    
    <!-- Updated frequency table with new fields -->
    <table class="frequency-table">
        <thead>
            <tr>
                <th>Survey Frequency</th>
                <th>End Date</th>
                <th>No. of Questions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="(frequency, index) in frequencies" :key="index">
                <tr>
                    <td x-text="frequency.surveyFrequency"></td>
                    <td x-text="frequency.endDate"></td>
                    <td x-text="frequency.numberOfQuestions"></td>
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
    <br>
     <!-- Active Survey Categories from the image -->
    <div class="categories-container" style="margin-bottom: 20px;">
        <h4 style="font-size: 1rem; font-weight: 500; margin-bottom: 15px;">Active Survey Category</h4>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 15px;">
            <div style="display: flex; justify-content: space-between; align-items: center; background: #f9f9f9; padding: 12px; border-radius: 5px;">
                <span>Job Satisfaction</span>
                <div>
                    <span style="margin-right: 10px; font-size: 0.9rem; color: #666;">Active</span>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; background: #f9f9f9; padding: 12px; border-radius: 5px;">
                <span>Manager Support</span>
                <div>
                    <span style="margin-right: 10px; font-size: 0.9rem; color: #666;">Active</span>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; background: #f9f9f9; padding: 12px; border-radius: 5px;">
                <span>Collaboration</span>
                <div>
                    <span style="margin-right: 10px; font-size: 0.9rem; color: #666;">Active</span>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; background: #f9f9f9; padding: 12px; border-radius: 5px;">
                <span>Relationship</span>
                <div>
                    <span style="margin-right: 10px; font-size: 0.9rem; color: #666;">Active</span>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Updated Add/Edit Frequency Modal -->
    <div x-show="showAddFrequency" x-transition.opacity class="modal-overlay">
        <div class="modal-content" @click.outside="showAddFrequency = false">
            <div class="modal-header">
                <h2 x-text="editingFrequency ? 'Edit Frequency' : 'Add Frequency'" style="font-size: 1.3rem; font-weight: normal;"></h2>
                <button @click="showAddFrequency = false" class="close-btn">&times;</button>
            </div>
            <form @submit.prevent="saveFrequency">
                <div class="form-group">
                    <label>Survey Frequency</label>
                    <select x-model="currentFrequency.surveyFrequency" class="form-input" required>
                        <option value="">Select Frequency</option>
                        <option value="Daily">Daily</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" x-model="currentFrequency.endDate" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label>No. of Questions</label>
                    <input type="number" x-model="currentFrequency.numberOfQuestions" class="form-input" min="1" max="50" required>
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
                    <h3 style="font-size: 1rem; font-weight: 500; color: black">Employees</h3>
                    <div class="action-buttons">
                        <!-- Export (Download) -->
                        <button @click="exportEmployees" class="icon-btn" title="Import">
                            <i class="fas fa-upload"></i>
                        </button>
                        <!-- Import (Upload) -->
                        <button @click="importModal = true" class="icon-btn" title="Export">
                            <i class="fas fa-download"></i>
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

                <!-- Add Employee Modal - HORIZONTAL LAYOUT -->
                <div x-show="showAddForm" x-transition.opacity class="modal-overlay">
                    <div class="modal-content" @click.outside="showAddForm = false" style="max-width: 900px;">
                        <div class="modal-header">
                            <h2 style="font-size: 1.3rem; font-weight: normal;">Create Employee</h2>
                            <button @click="showAddForm = false" class="close-btn">&times;</button>
                        </div>
                        
                        <form @submit.prevent="saveEmployee" class="horizontal-form">
                            <!-- Account Details Section -->
                            <div class="form-section-grid">
                                <h3 class="form-section-title">Account Details</h3>
                                
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
                            <div class="form-section-grid">
                                <h3 class="form-section-title">Personal Information</h3>
                                
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
                            <div class="form-section-grid">
                                <h3 class="form-section-title">Employment Details</h3>
                                
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
                            <div class="form-section-grid">
                                <h3 class="form-section-title">Roles and Permissions</h3>
                                
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
                            <div class="form-section-grid">
                                <h3 class="form-section-title">Additional Information</h3>
                                
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
                            
                            <div class="form-actions">
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
                            <!-- Label + Download Icon on right side -->
                            <div class="form-group flex justify-between items-center">
                                <label class="whitespace-nowrap">Select CSV File</label>

                                <!-- Download Icon pushed to right -->
                                <a 
                                    href="data:text/csv;charset=utf-8,Salutation,Name,Email,Mobile,Country,Gender,DOB%0A"
                                    download="employee_template.csv"
                                class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-400 hover:to-pink-400 text-white p-1.5 rounded inline-flex items-center"
                                    title="Download Sample CSV"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"/>
                                    </svg>
                                </a>
                            </div>

                            <!-- File Input below -->
                            <div class="form-group mt-2">
                                <input type="file" accept=".csv" @change="handleFileUpload" class="form-input w-full" required>
                            </div>

                            <div class="form-actions mt-4">
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
                <h3 style="font-size: 1rem; font-weight: 500; color: black">Manage Designations</h3>
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
                    <span 
                        :style="'background-color:' + (item.color || '#000000') + 
                                '; display:inline-block; width:100px; height:20px;  border:1px solid #ccc;'">
                    </span>
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
                            <input type="color" x-model="currentDesignation.color" class="form-input" style="width:100%; height:50px; border:1px solid #ccc; border-radius:6px; cursor:pointer;">
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
                <h3 style="font-size: 1rem; font-weight: 500; color: black">Manage Categories</h3>
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
                <h3 style="font-size: 1rem; font-weight: 500; color: black">Manage Questions</h3>
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
            <span x-show="question.type === '00000'" class="emoji-display">👍👎😊😐😞</span>
            <span x-show="question.type === 'Vouho'" class="emoji-display">😃😊😐😕😠</span>
            <span x-show="question.type === '0-10'" class="emoji-display">0️⃣-🔟</span>
            <span x-show="question.type === '---'" class="emoji-display">✏️</span>
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
                <h3 style="font-size: 1rem; font-weight: 500; color: black">Manage Teams</h3>
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

                        <div class="form-group">
                         <div class="form-group half-width">
                        <label>Team Member</label>
                       <select x-model="newEmployee.salutation" class="form-input">
                        <option value="">Select</option>
                        <option value="Mr.">sample employee</option>
                        <option value="Mrs.">sample employee</option>
                        <option value="Ms.">sample employee</option>
                    </select>
                </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" @click="showAddTeam = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary" x-text="editingTeam ? 'Update' : 'Save'"></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section x-show="activeTab==='company'" role="tabpanel" tabindex="0" class="tab-content" x-transition x-data="companyManagement()">
            <div class="header">
                <h3 style="font-size: 1rem; font-weight: 500; color: black">Companies</h3>
                <div class="header-actions">
                    <div class="search-container">
                        <input type="text" x-model="searchQuery" placeholder="Search companies..." class="search-input">
                        <button @click="searchCompanies()" class="btn btn-secondary search-btn">Search</button>
                    </div>
                    <button @click="showCompanySettings = true" class="btn btn-primary">Company Settings</button>
                    <button @click="showAddCompany = true" class="btn btn-primary">+ Create Company</button>
                </div>
            </div>
            
            <!-- Companies List -->
            <table class="employee-table">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Parent/Child</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(company, index) in filteredCompanies" :key="index">
                        <tr>
                            <td x-text="company.name"></td>
                            <td x-text="company.address || '-'"></td>
                            <td x-text="company.phone || '-'"></td>
                            <td x-text="company.type"></td>
                            <td>
                                <span class="status-badge" :class="company.status === 'Active' ? 'active' : 'inactive'" 
                                      x-text="company.status || 'Active'"></span>
                            </td>
                            <td>
                                <i class="fas fa-edit action-icon edit-icon" @click="editCompany(index)" title="Edit"></i>
                                <i class="fas fa-trash action-icon delete-icon" @click="deleteCompany(index)" title="Delete"></i>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Create/Edit Company Modal - HORIZONTAL LAYOUT -->
            <div x-show="showAddCompany" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showAddCompany = false" style="max-width: 900px;">
                    <div class="modal-header">
                        <h2 x-text="editingCompany ? 'Edit Company' : 'Create Company'"></h2>
                        <button @click="showAddCompany = false" class="close-btn">&times;</button>
                    </div>
                    
                    <form @submit.prevent="saveCompany" class="horizontal-form">
                        <div class="form-section-grid">
                            <!-- Basic Information -->
                            <h3 class="form-section-title">Basic Information</h3>
                            
                            <div class="form-group half-width">
                                <label>Name</label>
                                <input type="text" x-model="currentCompany.name" class="form-input" placeholder="Enter company name" required>
                            </div>
                            
                            <div class="form-group half-width">
                                <label>Phone Number</label>
                                <input type="text" x-model="currentCompany.phone" class="form-input" placeholder="Enter phone number">
                            </div>
                            
                            <!-- Company Type -->
                            <div class="form-group full-width">
                                <label>Company Type</label>
                                <div class="radio-group">
                                    <label class="radio-option">
                                        <input type="radio" value="Parent" x-model="currentCompany.type" style="width: auto; margin-right: 5px;">
                                        Parent
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" value="Child" x-model="currentCompany.type" style="width: auto; margin-right: 5px;">
                                        Child
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Parent Dropdown (only for child) -->
                            <div class="form-group full-width" x-show="currentCompany.type === 'Child'">
                                <label>Select Parent Company</label>
                                <select x-model="currentCompany.parentId" class="form-input" :required="currentCompany.type === 'Child'">
                                    <option value="">-- Select Parent Company --</option>
                                    <template x-for="parent in companies.filter(c => c.type === 'Parent')" :key="parent.id">
                                        <option :value="parent.id" x-text="parent.name"></option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-section-grid">
                            <!-- Location Information -->
                            <h3 class="form-section-title">Location Information</h3>
                            
                            <div class="form-group third-width">
                                <label>Country</label>
                                <select x-model="currentCompany.country" class="form-input">
                                    <option value="">Select Country</option>
                                    <option value="USA">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="CA">Canada</option>
                                </select>
                            </div>
                            
                            <div class="form-group third-width">
                                <label>City</label>
                                <input type="text" x-model="currentCompany.city" class="form-input" placeholder="Enter city">
                            </div>
                            
                            <div class="form-group third-width">
                                <label>Status</label>
                                <select x-model="currentCompany.status" class="form-input">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="form-group full-width">
                                <label>Address</label>
                                <textarea x-model="currentCompany.address" class="form-input" placeholder="Enter address" rows="2"></textarea>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" @click="showAddCompany = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary" x-text="editingCompany ? 'Update' : 'Save'"></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Company Settings Modal -->
            <div x-show="showCompanySettings" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showCompanySettings = false" style="max-width: 700px;">
                    <div class="modal-header">
                        <h2>Company Settings</h2>
                        <button @click="showCompanySettings = false" class="close-btn">&times;</button>
                    </div>
                    
                    <form @submit.prevent="saveCompanySettings" class="horizontal-form">
                        <div class="form-section-grid">
                            <!-- Basic Information -->
                            <div class="form-group full-width">
                                <h3 class="form-section-title">Basic Information</h3>
                            </div>
                            
                            <div class="form-group half-width">
                                <label>Name</label>
                                <input type="text" x-model="companySettings.name" class="form-input" placeholder="Company name">
                            </div>
                            
                            <div class="form-group half-width">
                                <label>Phone Number</label>
                                <input type="text" x-model="companySettings.phone" class="form-input" placeholder="Phone number">
                            </div>
                            
                            <!-- Location Information -->
                            <div class="form-group full-width">
                                <h3 class="form-section-title">Location Information</h3>
                            </div>
                            
                            <div class="form-group half-width">
                                <label>Country</label>
                                <select x-model="companySettings.country" class="form-input">
                                    <option value="">Select Country</option>
                                    <option value="USA">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="CA">Canada</option>
                                </select>
                            </div>
                            
                            <div class="form-group half-width">
                                <label>City</label>
                                <input type="text" x-model="companySettings.city" class="form-input" placeholder="City">
                            </div>
                            
                            <div class="form-group full-width">
                                <label>Address</label>
                                <textarea x-model="companySettings.address" class="form-input" placeholder="Address" rows="2"></textarea>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" @click="showCompanySettings = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

 <section x-show="activeTab==='roles'" role="tabpanel" tabindex="0" class="tab-content" x-transition x-data="roleManagement">   
            <div class="header">
                <h3 style="font-size: 1rem; font-weight: 500; color: black">Roles And Permission</h3>
                <button @click="showAddRole = true" class="btn btn-primary">+ Create Role</button>
            </div>
            
            <!-- Roles List -->
            <table class="employee-table">
                <thead>
                    <tr>
                        <th>Role Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(role, index) in roles" :key="index">
                        <tr>
                            <td x-text="role.name"></td>
                            <td>
                                <i class="fas fa-edit action-icon edit-icon" @click="editRole(index)" title="Edit"></i>
                                <i class="fas fa-trash action-icon delete-icon" @click="deleteRole(index)" title="Delete"></i>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Create/Edit Role Modal -->
            <div x-show="showAddRole" x-transition.opacity class="modal-overlay">
                <div class="modal-content" @click.outside="showAddRole = false" style="max-width: 700px;">
                    <div class="modal-header">
                        <h2 x-text="editingRole ? 'Edit Role' : 'Create Role'" style="font-size: 1.3rem; font-weight: normal;"></h2>
                        <button @click="showAddRole = false" class="close-btn">&times;</button>
                    </div>
                    <form @submit.prevent="saveRole">
                        <!-- Role Name -->
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" x-model="currentRole.name" class="form-input" placeholder="Enter role name" required>
                        </div>

                        <!-- Permissions Table -->
                        <div class="form-group">
                            <label>Permissions</label>
                            <div class="permissions-table-container" style="max-height: 300px; overflow-y: auto;">
                                <table class="permissions-table">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Page</th>
                                            <th>View</th>
                                            <th>Create</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(permission, index) in currentRole.permissions" :key="index">
                                            <tr>
                                                <td x-text="permission.category"></td>
                                                <td x-text="permission.page"></td>
                                                <td>
                                                    <input type="checkbox" x-model="permission.view">
                                                </td>
                                                <td>
                                                    <input type="checkbox" x-model="permission.create">
                                                </td>
                                                <td>
                                                    <input type="checkbox" x-model="permission.edit">
                                                </td>
                                                <td>
                                                    <input type="checkbox" x-model="permission.delete">
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" @click="showAddRole = false" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary" x-text="editingRole ? 'Update' : 'Save'"></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>



<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>  
    
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('frequencyManager', () => ({
        frequencies: [
            { 
                surveyFrequency: 'Weekly', 
                endDate: '2026-01-11', 
                numberOfQuestions: '8' 
            }
        ],
        showAddFrequency: false,
        editingFrequency: false,
        currentFrequency: {
            surveyFrequency: '',
            endDate: '',
            numberOfQuestions: ''
        },
        editIndex: -1,
        
        init() {
            // Format the date for display if needed
            if (this.frequencies.length > 0) {
                this.frequencies = this.frequencies.map(freq => {
                    // Convert YYYY-MM-DD to MM/DD/YYYY for display
                    if (freq.endDate.includes('-')) {
                        const [year, month, day] = freq.endDate.split('-');
                        return {
                            ...freq,
                            endDate: `${month}/${day}/${year}`
                        };
                    }
                    return freq;
                });
            }
        },
        
        editFrequency(index) {
            // Convert display date back to YYYY-MM-DD for the input field
            const displayDate = this.frequencies[index].endDate;
            let inputDate = displayDate;
            
            if (displayDate.includes('/')) {
                const [month, day, year] = displayDate.split('/');
                inputDate = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;
            }
            
            this.currentFrequency = {
                ...this.frequencies[index],
                endDate: inputDate
            };
            this.editIndex = index;
            this.editingFrequency = true;
            this.showAddFrequency = true;
        },
        
        deleteFrequency(index) {
            if (confirm('Are you sure you want to delete this frequency?')) {
                this.frequencies.splice(index, 1);
            }
        },
        
        saveFrequency() {
            // Convert date to display format before saving
            const dateValue = this.currentFrequency.endDate;
            let displayDate = dateValue;
            
            if (dateValue.includes('-')) {
                const [year, month, day] = dateValue.split('-');
                displayDate = `${month}/${day}/${year}`;
            }
            
            const frequencyToSave = {
                ...this.currentFrequency,
                endDate: displayDate
            };
            
            if (this.editingFrequency) {
                // Update existing frequency
                this.frequencies[this.editIndex] = frequencyToSave;
            } else {
                // Add new frequency
                this.frequencies.push(frequencyToSave);
            }
            
            // Reset form
            this.cancelEdit();
        },
        
        cancelEdit() {
            this.showAddFrequency = false;
            this.editingFrequency = false;
            this.editIndex = -1;
            this.currentFrequency = {
                surveyFrequency: '',
                endDate: '',
                numberOfQuestions: ''
            };
        }
    }));
});


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
    // Convert employees array to worksheet
    const worksheet = XLSX.utils.json_to_sheet(this.employees);

    // Create workbook and append the worksheet
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Employees");

    // Export as Excel file
    XLSX.writeFile(workbook, "employees_export.xlsx");
},
        importEmployees() {
            // In a real app, you would validate the data first
            alert('Employees imported successfully!');
            this.importModal = false;
        }
    }));    

   Alpine.data('designationManagement', () => ({
    showDepartmentModal: false,
    showDesignationModal: false,
    editingDepartment: false,
    editingDesignation: false,

    currentDepartment: { name: '' },
    currentDesignation: { id: null, title: '', color: '#000000', group: '' },

    designationGroups: [
        {
            name: 'Executive Department',
            items: [
                { id: '1', title: 'CIO', color: '#ff91ffff', group: 'Executive Department' },
                { id: '2', title: 'CEO', color: '#00fff2ff', group: 'Executive Department' }
            ]
        }
    ],

    showCreateDepartmentModal() {
        this.editingDepartment = false;
        this.currentDepartment = { name: '' };
        this.showDepartmentModal = true;
    },

    editDepartment(group) {
        this.editingDepartment = true;
        this.currentDepartment = { name: group.name };
        this.showDepartmentModal = true;
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

    showCreateDesignationModal() {
        this.editingDesignation = false;
        this.currentDesignation = { id: null, title: '', color: '#000000', group: '' };
        this.showDesignationModal = true;
    },

    editDesignation(item) {
        this.editingDesignation = true;
        this.currentDesignation = { 
            ...item,
            color: item.color && item.color !== '' ? item.color : '#000000'
        };
        this.showDesignationModal = true;
    },

    saveDesignation() {
        if (this.editingDesignation) {
            this.designationGroups.forEach(group => {
                group.items = group.items.map(item =>
                    item.id === this.currentDesignation.id ? { ...this.currentDesignation } : item
                );
            });
        } else {
            const newId = Date.now().toString();
            const newItem = { ...this.currentDesignation, id: newId };
            const group = this.designationGroups.find(g => g.name === newItem.group);
            if (group) {
                group.items.push(newItem);
            } else {
                this.designationGroups.push({ name: newItem.group, items: [newItem] });
            }
        }
        this.showDesignationModal = false;
    },

    // Delete designation
    deleteDesignation(item) {
        const group = this.designationGroups.find(g => g.name === item.group);
        if (group) {
            group.items = group.items.filter(i => i.id !== item.id);
        }
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
function companyManagement() {
    return {
        showAddCompany: false,
        showCompanySettings: false,
        editingCompany: false,
        searchQuery: '',
        settingsSearchQuery: '',
        companies: [
            // Sample data
            { 
                id: 1, 
                name: 'Main Company', 
                type: 'Parent', 
                parentId: '',
                phone: '+1 (555) 123-4567',
                address: '123 Business Ave, New York',
                status: 'Active'
            },
            { 
                id: 2, 
                name: 'Subsidiary Inc', 
                type: 'Child', 
                parentId: 1, 
                parentName: 'Main Company',
                phone: '+1 (555) 987-6543',
                address: '456 Commerce St, Chicago',
                status: 'Active'
            }
        ],
        companySettings: {
            name: '',
            phone: '',
            country: '',
            city: '',
            address: '',
            username: '',
            email: ''
        },
        currentCompany: { 
            id: null, 
            name: '', 
            type: 'Parent', 
            parentId: '',
            phone: '',
            country: '',
            city: '',
            address: '',
            status: 'Active'
        },
        get filteredCompanies() {
            if (!this.searchQuery) return this.companies;
            const query = this.searchQuery.toLowerCase();
            return this.companies.filter(company => 
                company.name.toLowerCase().includes(query) || 
                company.type.toLowerCase().includes(query) ||
                (company.parentName && company.parentName.toLowerCase().includes(query)) ||
                (company.address && company.address.toLowerCase().includes(query)) ||
                (company.phone && company.phone.toLowerCase().includes(query))
            );
        },
        searchCompanies() {
            // Search is handled by the filteredCompanies getter
        },
        searchSettings() {
            // Implement settings search functionality if needed
            console.log('Searching settings for:', this.settingsSearchQuery);
        },
        editCompany(index) {
            this.editingCompany = true;
            this.currentCompany = { ...this.companies[index] };
            this.showAddCompany = true;
        },
        deleteCompany(index) {
            if (confirm('Are you sure you want to delete this company?')) {
                this.companies.splice(index, 1);
            }
        },
        saveCompany() {
            if (this.editingCompany) {
                const index = this.companies.findIndex(c => c.id === this.currentCompany.id);
                this.companies[index] = { ...this.currentCompany };
            } else {
                this.currentCompany.id = Date.now();
                // For child companies, set parent name
                if (this.currentCompany.type === 'Child' && this.currentCompany.parentId) {
                    const parent = this.companies.find(c => c.id === this.currentCompany.parentId);
                    this.currentCompany.parentName = parent ? parent.name : '';
                }
                this.companies.push({ ...this.currentCompany });
            }
            this.showAddCompany = false;
            this.resetForm();
        },
        saveCompanySettings() {
            // Save company settings logic here
            console.log('Saving company settings:', this.companySettings);
            this.showCompanySettings = false;
        },
        resetForm() {
            this.currentCompany = { 
                id: null, 
                name: '', 
                type: 'Parent', 
                parentId: '',
                phone: '',
                country: '',
                city: '',
                address: '',
                status: 'Active'
            };
            this.editingCompany = false;
        }
    };
}

document.addEventListener('alpine:init', () => {
    // Role Management - Fixed: Return object directly instead of function
    Alpine.data('roleManagement', () => ({
        showAddRole: false,
        editingRole: false,
        roles: [
            { 
                id: 1, 
                name: 'HR Administration',
                permissions: [
                    { category: 'Part A: Terms', page: 'Strategy Map', view: true, create: true, edit: true, delete: false },
                    { category: 'Part A: Terms', page: 'Strategy Document', view: true, create: false, edit: false, delete: false },
                    { category: 'Part A: Terms', page: 'Strategy User', view: true, create: false, edit: false, delete: false }
                ]
            },
            { 
                id: 2, 
                name: 'Manager',
                permissions: [
                    { category: 'Part A: Terms', page: 'Strategy Map', view: true, create: false, edit: false, delete: false },
                    { category: 'Part A: Terms', page: 'Strategy Document', view: true, create: false, edit: true, delete: false },
                    { category: 'Part A: Terms', page: 'Strategy User', view: true, create: false, edit: false, delete: false }
                ]
            }
        ],
        currentRole: {
            id: null,
            name: '',
            permissions: [
                { category: 'Part A: Terms', page: 'Strategy Map', view: false, create: false, edit: false, delete: false },
                { category: 'Part A: Terms', page: 'Strategy Document', view: false, create: false, edit: false, delete: false },
                { category: 'Part A: Terms', page: 'Strategy User', view: false, create: false, edit: false, delete: false }
            ]
        },
        init() {
            // Initialize with default permissions structure if needed
        },
        editRole(index) {
            this.editingRole = true;
            this.currentRole = JSON.parse(JSON.stringify(this.roles[index]));
            this.showAddRole = true;
        },
        deleteRole(index) {
            if (confirm('Are you sure you want to delete this role?')) {
                this.roles.splice(index, 1);
            }
        },
        saveRole() {
            if (this.editingRole) {
                const index = this.roles.findIndex(r => r.id === this.currentRole.id);
                this.roles[index] = JSON.parse(JSON.stringify(this.currentRole));
            } else {
                this.currentRole.id = Date.now();
                this.roles.push(JSON.parse(JSON.stringify(this.currentRole)));
            }
            this.showAddRole = false;
            this.resetForm();
        },
        resetForm() {
            this.currentRole = {
                id: null,
                name: '',
                permissions: [
                    { category: 'Part A: Terms', page: 'Strategy Map', view: false, create: false, edit: false, delete: false },
                    { category: 'Part A: Terms', page: 'Strategy Document', view: false, create: false, edit: false, delete: false },
                    { category: 'Part A: Terms', page: 'Strategy User', view: false, create: false, edit: false, delete: false }
                ]
            };
            this.editingRole = false;
        }
    }));
});



</script>
@endsection