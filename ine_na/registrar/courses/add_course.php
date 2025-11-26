<?php include '../../config/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .form-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
        .form-header {
            border-bottom: 1px solid #e5e7eb;
            padding: 1.25rem 1.5rem;
        }
        .form-body {
            padding: 1.5rem;
        }
        .form-footer {
            border-top: 1px solid #e5e7eb;
            padding: 1.25rem 1.5rem;
            background-color: #f9fafb;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }
        .form-label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        .form-input {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .btn-primary {
            background-color: #3b82f6;
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }
        .btn-primary:hover {
            background-color: #2563eb;
        }
        .btn-secondary {
            background-color: #6b7280;
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }
        .btn-secondary:hover {
            background-color: #4b5563;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <div class="form-container">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Add New Course</h1>
                    <p class="text-gray-600">Fill in the course details below</p>
                </div>
                
                <form action="add_course_process.php" method="POST" class="form-card">
                    <div class="form-header">
                        <h2 class="text-lg font-medium text-gray-900">Course Information</h2>
                    </div>
                    
                    <div class="form-body space-y-6">
                        <div>
                            <label for="course_code" class="form-label">
                                Course Code <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="course_code" 
                                name="course_code" 
                                class="form-input" 
                                placeholder="e.g., CS-101"
                                required
                            >
                        </div>
                        
                        <div>
                            <label for="course_name" class="form-label">
                                Course Name <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="course_name" 
                                name="course_name" 
                                class="form-input" 
                                placeholder="e.g., Introduction to Computer Science"
                                required
                            >
                        </div>
                        
                        <div>
                            <label for="description" class="form-label">
                                Description
                            </label>
                            <textarea 
                                id="description" 
                                name="description" 
                                rows="4" 
                                class="form-input" 
                                placeholder="Enter course description..."
                            ></textarea>
                        </div>
                    </div>
                    
                    <div class="form-footer flex justify-between items-center">
                        <a href="course_management.php" class="btn-secondary">
                            Cancel
                        </a>
                        <button 
                            type="submit" 
                            name="save" 
                            class="btn-primary"
                        >
                            Save Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
