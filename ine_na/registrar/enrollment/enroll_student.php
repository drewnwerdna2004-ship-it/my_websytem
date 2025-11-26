<?php
include "../../config/db_connect.php";

$error = '';
$success = '';

// Get list of students
$students = [];
$result = $conn->query("SELECT student_id, CONCAT(first_name, ' ', last_name) as full_name FROM students ORDER BY last_name, first_name");
if ($result) {
    $students = $result->fetch_all(MYSQLI_ASSOC);
}

// Get list of courses
$courses = [];
$result = $conn->query("SELECT course_id, course_name, course_code FROM courses ORDER BY course_name");
if ($result) {
    $courses = $result->fetch_all(MYSQLI_ASSOC);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'] ?? '';
    $course_id = $_POST['course_id'] ?? '';
    $semester = $_POST['semester'] ?? '';
    $school_year = $_POST['school_year'] ?? '';
    $status = 'Enrolled'; // Default status

    // Basic validation
    if (empty($student_id) || empty($course_id) || empty($semester) || empty($school_year)) {
        $error = 'All fields are required';
    } else {
        // Check if student is already enrolled in this course
        $stmt = $conn->prepare("SELECT * FROM enrollment WHERE student_id = ? AND course_id = ? AND status = 'Enrolled'");
        $stmt->bind_param("ii", $student_id, $course_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error = 'Student is already enrolled in this course';
        } else {
            // Insert new enrollment
            $stmt = $conn->prepare("INSERT INTO enrollment (student_id, course_id, enrollment_date, status, semester, school_year) 
                                  VALUES (?, ?, CURDATE(), ?, ?, ?)");
            $stmt->bind_param("iisss", $student_id, $course_id, $status, $semester, $school_year);
            
            if ($stmt->execute()) {
                $success = 'Student enrolled successfully!';
                // Clear form
                $_POST = [];
            } else {
                $error = 'Error enrolling student: ' . $conn->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Enroll New Student - School Management System</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined.fill {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="font-display">
</aside>
   

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-background-light dark:bg-background-dark">
            <div class="max-w-4xl mx-auto">
                <?php if ($error): ?>
                    <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 text-red-700 dark:text-red-200 rounded-md shadow-sm">
                        <div class="flex items-center">
                            <span class="material-symbols-outlined mr-2">error</span>
                            <p class="font-medium"><?php echo htmlspecialchars($error); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 text-green-700 dark:text-green-200 rounded-md shadow-sm">
                        <div class="flex items-center">
                            <span class="material-symbols-outlined mr-2">check_circle</span>
                            <p class="font-medium"><?php echo htmlspecialchars($success); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="bg-white dark:bg-slate-900/50 rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden transition-all duration-200 hover:shadow-md">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-800 bg-gradient-to-r from-primary/5 to-primary/10">
                        <h2 class="text-xl font-bold text-slate-800 dark:text-white flex items-center">
                            <span class="material-symbols-outlined mr-2 text-primary">school</span>
                            Student Enrollment Form
                        </h2>
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Fill in the required details to enroll a student in a course.</p>
                    </div>
                    
                    <form method="POST" class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Student Selection -->
                            <div class="space-y-2 transition-all duration-200 hover:scale-[1.01]">
                                <div class="flex items-center justify-between">
                                    <label for="student_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                                        Student <span class="text-red-500">*</span>
                                    </label>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">Required</span>
                                </div>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
                                        <span class="material-symbols-outlined">person</span>
                                    </span>
                                    <select id="student_id" name="student_id" required 
                                        class="pl-10 mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring focus:ring-primary/30 transition duration-150 ease-in-out">
                                        <option value="">Select a student</option>
                                        <?php foreach ($students as $student): ?>
                                            <option value="<?php echo $student['student_id']; ?>" 
                                                <?php echo (isset($_POST['student_id']) && $_POST['student_id'] == $student['student_id']) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($student['full_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Course Selection -->
                            <div class="space-y-2 transition-all duration-200 hover:scale-[1.01]">
                                <div class="flex items-center justify-between">
                                    <label for="course_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                                        Course <span class="text-red-500">*</span>
                                    </label>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">Required</span>
                                </div>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
                                        <span class="material-symbols-outlined">book</span>
                                    </span>
                                    <select id="course_id" name="course_id" required 
                                        class="pl-10 mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring focus:ring-primary/30 transition duration-150 ease-in-out">
                                        <option value="">Select a course</option>
                                        <?php foreach ($courses as $course): ?>
                                            <option value="<?php echo $course['course_id']; ?>"
                                                <?php echo (isset($_POST['course_id']) && $_POST['course_id'] == $course['course_id']) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($course['course_name'] . ' (' . $course['course_code'] . ')'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Semester -->
                            <div class="space-y-2 transition-all duration-200 hover:scale-[1.01]">
                                <div class="flex items-center justify-between">
                                    <label for="semester" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                                        Semester <span class="text-red-500">*</span>
                                    </label>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">Required</span>
                                </div>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
                                        <span class="material-symbols-outlined">event</span>
                                    </span>
                                    <select id="semester" name="semester" required 
                                        class="pl-10 mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring focus:ring-primary/30 transition duration-150 ease-in-out">
                                        <option value="">Select semester</option>
                                        <option value="1st Semester" <?php echo (isset($_POST['semester']) && $_POST['semester'] === '1st Semester') ? 'selected' : ''; ?>>1st Semester</option>
                                        <option value="2nd Semester" <?php echo (isset($_POST['semester']) && $_POST['semester'] === '2nd Semester') ? 'selected' : ''; ?>>2nd Semester</option>
                                        <option value="Summer" <?php echo (isset($_POST['semester']) && $_POST['semester'] === 'Summer') ? 'selected' : ''; ?>>Summer</option>
                                    </select>
                                </div>
                            </div>

                            <!-- School Year -->
                            <div class="space-y-2 transition-all duration-200 hover:scale-[1.01]">
                                <div class="flex items-center justify-between">
                                    <label for="school_year" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                                        School Year <span class="text-red-500">*</span>
                                    </label>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">Required</span>
                                </div>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
                                        <span class="material-symbols-outlined">calendar_today</span>
                                    </span>
                                    <input type="text" id="school_year" name="school_year" required 
                                        placeholder="e.g., 2023-2024"
                                        value="<?php echo htmlspecialchars($_POST['school_year'] ?? ''); ?>"
                                        class="pl-10 mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring focus:ring-primary/30 transition duration-150 ease-in-out">
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                            <a href="enrollment.php" class="inline-flex items-center justify-center px-4 py-2.5 border border-slate-300 dark:border-slate-600 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary/30 transition-all duration-200">
                                <span class="material-symbols-outlined text-lg mr-1">close</span>
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center justify-center px-6 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary/50 transition-all duration-200 hover:shadow-md">
                                <span class="material-symbols-outlined text-lg mr-1">save</span>
                                Enroll Student
                            </button>
                        </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
