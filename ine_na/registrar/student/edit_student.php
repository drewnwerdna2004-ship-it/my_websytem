<?php
include "../../config/db_connect.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if student ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: student_management.php?error=Invalid student ID");
    exit();
}

$student_id = (int)$_GET['id'];

// Fetch student data
$query = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
$query->bind_param("i", $student_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    header("Location: student_management.php?error=Student not found");
    exit();
}

$student = $result->fetch_assoc();

// Fetch all courses for the dropdown
$courseQuery = $conn->query("SELECT * FROM courses ORDER BY course_code");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - School Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#1d4ed8",
                        "background-light": "#f8fafc",
                        "background-dark": "#0f172a",
                    },
                    fontFamily: {
                        display: ["Poppins", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                    },
                },
            },
        };
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .form-input, .form-select, .form-textarea {
            border-color: #e2e8f0;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .dark .form-input, .dark .form-select, .dark .form-textarea {
            border-color: #334155;
            background-color: #1e293b;
            color: #e2e8f0;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: #1d4ed8;
            box-shadow: 0 0 0 1px #1d4ed8;
            outline: none;
        }
        .dark .form-input::placeholder, .dark .form-textarea::placeholder {
            color: #64748b;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-800 dark:text-slate-200">
    <div class="min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Edit Student</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-1">Update the student details below</p>
                </div>
                <a class="flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary transition-colors" 
                   href="student_management.php">
                    <span class="material-icons-outlined" style="font-size: 20px;">arrow_back</span>
                    Back to List
                </a>
            </header>

            <main class="bg-white dark:bg-slate-800 rounded-lg shadow-sm p-8">
                <form id="editStudentForm" action="edit_student_process.php" method="POST" class="space-y-6">
                    <input type="hidden" name="student_id" value="<?= htmlspecialchars($student['student_id']) ?>">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <!-- Student Number -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="student_number">Student Number *</label>
                            <input class="form-input mt-1 block w-full rounded-md" 
                                   id="student_number" 
                                   name="student_number" 
                                   required 
                                   type="text"
                                   value="<?= htmlspecialchars($student['student_number']) ?>"
                                   placeholder="2023-0001">
                        </div>

                        <!-- Name Fields -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="last_name">Last Name *</label>
                            <input class="form-input mt-1 block w-full rounded-md" 
                                   id="last_name" 
                                   name="last_name" 
                                   required 
                                   type="text"
                                   value="<?= htmlspecialchars($student['last_name']) ?>"
                                   placeholder="Dela Cruz">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="first_name">First Name *</label>
                            <input class="form-input mt-1 block w-full rounded-md" 
                                   id="first_name" 
                                   name="first_name" 
                                   required 
                                   type="text"
                                   value="<?= htmlspecialchars($student['first_name']) ?>"
                                   placeholder="Juan">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="middle_name">Middle Name</label>
                            <input class="form-input mt-1 block w-full rounded-md" 
                                   id="middle_name" 
                                   name="middle_name" 
                                   type="text"
                                   value="<?= htmlspecialchars($student['middle_name'] ?? '') ?>"
                                   placeholder="Santos">
                        </div>

                        <!-- Personal Info -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="sex">Sex *</label>
                            <select class="form-select mt-1 block w-full rounded-md" 
                                    id="sex" 
                                    name="sex" 
                                    required>
                                <option value="" disabled>Select Sex</option>
                                <option value="Male" <?= $student['sex'] === 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= $student['sex'] === 'Female' ? 'selected' : '' ?>>Female</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="birthdate">Birthdate</label>
                            <div class="relative mt-1">
                                <input class="form-input block w-full rounded-md pl-3 pr-10" 
                                       id="birthdate" 
                                       name="birthdate" 
                                       type="date"
                                       value="<?= $student['birthdate'] ?? '' ?>">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="material-icons-outlined text-slate-400" style="font-size: 20px;">calendar_today</span>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="address">Address</label>
                            <textarea class="form-textarea mt-1 block w-full rounded-md" 
                                      id="address" 
                                      name="address" 
                                      rows="3"
                                      placeholder="Enter complete address"><?= htmlspecialchars($student['address'] ?? '') ?></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="contact_number">Contact Number</label>
                            <input class="form-input mt-1 block w-full rounded-md" 
                                   id="contact_number" 
                                   name="contact_number" 
                                   type="tel"
                                   value="<?= htmlspecialchars($student['phone'] ?? '') ?>"
                                   placeholder="+63 912 345 6789">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="status">Status *</label>
                            <select class="form-select mt-1 block w-full rounded-md" 
                                    id="status" 
                                    name="status" 
                                    required>
                                <option value="" disabled>Select Status</option>
                                <option value="Active" <?= ($student['status'] ?? '') === 'Active' ? 'selected' : '' ?>>Active</option>
                                <option value="Inactive" <?= ($student['status'] ?? '') === 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                                <option value="Graduated" <?= ($student['status'] ?? '') === 'Graduated' ? 'selected' : '' ?>>Graduated</option>
                                <option value="Dropped" <?= ($student['status'] ?? '') === 'Dropped' ? 'selected' : '' ?>>Dropped</option>
                                <option value="Transferred" <?= ($student['status'] ?? '') === 'Transferred' ? 'selected' : '' ?>>Transferred</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="email">Email *</label>
                            <input class="form-input mt-1 block w-full rounded-md" 
                                   id="email" 
                                   name="email" 
                                   type="email"
                                   required
                                   value="<?= htmlspecialchars($student['email']) ?>"
                                   placeholder="student@example.com">
                        </div>

                        <!-- Course Selection -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="course_id">Course *</label>
                            <select class="form-select mt-1 block w-full rounded-md" 
                                    id="course_id" 
                                    name="course_id" 
                                    required>
                                <option value="" disabled>Select Course</option>
                                <?php 
                                $courseQuery->data_seek(0);
                                while($course = $courseQuery->fetch_assoc()): 
                                ?>
                                    <option value="<?= htmlspecialchars($course['course_id']); ?>" 
                                        <?= $course['course_id'] == $student['course_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($course['course_code'] . ' - ' . $course['course_name']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end items-center gap-4 mt-12 border-t border-slate-200 dark:border-slate-700 pt-6">
                        <a href="student_management.php" 
                           class="px-4 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 bg-white dark:bg-slate-800 rounded-md hover:bg-slate-50 dark:hover:bg-slate-700 border border-slate-300 dark:border-slate-600 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                            Save Changes
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add any client-side validation or interactivity here if needed
        });
    </script>
</body>
</html>