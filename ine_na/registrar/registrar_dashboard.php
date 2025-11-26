<?php include "../config/db_connect.php"; ?>
<?php
session_start();

// Prevent Back Button Cache
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// If not logged in → return to login
if (!isset($_SESSION['id'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Get total courses
$totalCoursesQuery = $conn->query("SELECT COUNT(*) as total_courses FROM courses");
$totalCourses = $totalCoursesQuery->fetch_assoc()['total_courses'];
$formattedCourses = number_format($totalCourses);

// Get total students
$totalStudentsQuery = $conn->query("SELECT COUNT(*) as total_students FROM students");
$totalStudents = $totalStudentsQuery->fetch_assoc()['total_students'];
$formattedStudents = number_format($totalStudents);

// Get total enrolled students
$enrolledStudentsQuery = $conn->query("
    SELECT COUNT(DISTINCT student_id) as total_enrolled 
    FROM enrollment 
    WHERE status = 'Active' OR status = 'Enrolled'
");
$totalEnrolled = $enrolledStudentsQuery->fetch_assoc()['total_enrolled'];
$formattedEnrolled = number_format($totalEnrolled);

?>

<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Dashboard - School Management System</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#135bec",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                    },
                    fontFamily: {
                        "display": ["Lexend", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
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
    <div class="relative flex h-screen min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-hidden">
        <div class="flex h-full w-full">
            <!-- Sidebar -->
            <aside class="flex h-full w-64 flex-col justify-between border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark p-4 shrink-0">
                <div class="flex flex-col gap-8">
                    <!-- Logo -->
                    <div class="flex items-center gap-3 px-3 py-2 text-primary">
                        <span class="material-symbols-outlined text-3xl">school</span>
                        <h2 class="text-primary text-lg font-bold leading-tight tracking-[-0.015em]">School System</h2>
                    </div>
                    
                    <!-- User Profile -->
                    <div class="flex gap-3 items-center">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" 
                             data-alt="User avatar" 
                             style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDyuqGAsnfaAU8exRdfhsyeC6TZ_oC0TshOPJ559VgoRH4RUQhpBNr13iR50RkJOBWhFgcbE30QhhFBgS3UJNdUbyFqc6moAw8dBFtGs571pJ3do6PZmVzquofbHYfpRyexo6qBuTC1XdGR51l0bEsUJVNJ03Ltptfn4wRLXPUlZjtdm7HVmIFLwMSGN9yuLZ0ZWBQnLugRbLx-cecAqm-2nxF_hItRYzW4qN6Xso_CMXrLR7zfq2-uSQBfi4QmE0RC8SE13jiesg");'>
                        </div>
                        <div class="flex flex-col">
                            <h1 class="text-slate-900 dark:text-slate-200 text-base font-medium leading-normal"><?php echo htmlspecialchars($_SESSION['name'] ?? 'John Doe'); ?></h1>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-normal leading-normal">Registrar</p>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <nav class="flex flex-col gap-2">
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary" href="registrar_dashboard.php">
                            <span class="material-symbols-outlined fill">dashboard</span>
                            <p class="text-sm font-medium leading-normal">Dashboard</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="student/student_management.php">
                            <span class="material-symbols-outlined">group</span>
                            <p class="text-sm font-medium leading-normal">Student Management</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="courses/course_management.php">
                            <span class="material-symbols-outlined">book</span>
                            <p class="text-sm font-medium leading-normal">Course Management</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="enrollment/enrollment.php">
                            <span class="material-symbols-outlined">how_to_reg</span>
                            <p class="text-sm font-medium leading-normal">Enrollment</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="#">
                            <span class="material-symbols-outlined">assessment</span>
                            <p class="text-sm font-medium leading-normal">Reports</p>
                        </a>
                    </nav>
                </div>

                <!-- Sidebar Footer -->
                <div class="flex flex-col gap-2">
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                       href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <p class="text-sm font-medium leading-normal">Settings</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-500/10 hover:text-red-500 text-slate-700 dark:text-slate-300" 
                       href="../auth/logout.php">
                        <span class="material-symbols-outlined">logout</span>
                        <p class="text-sm font-medium leading-normal">Logout</p>
                    </a>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex flex-1 flex-col overflow-y-auto">
                <!-- Header -->
                <header class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 px-8 py-3 bg-white dark:bg-background-dark sticky top-0 z-10">
                    <!-- Search Bar -->
                    <div class="flex items-center gap-8">
                        <label class="flex flex-col min-w-40 !h-10 max-w-sm">
                            <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                                <div class="text-slate-500 dark:text-slate-400 flex bg-slate-100 dark:bg-slate-800/50 items-center justify-center pl-3 rounded-l-lg border-r-0">
                                    <span class="material-symbols-outlined">search</span>
                                </div>
                                <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-slate-200 focus:outline-0 focus:ring-2 focus:ring-primary/50 border-none bg-slate-100 dark:bg-slate-800/50 h-full placeholder:text-slate-500 dark:placeholder:text-slate-400 px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal" 
                                       placeholder="Search students, courses..." 
                                       type="search">
                            </div>
                        </label>
                    </div>

                    <!-- User Actions -->
                    <div class="flex items-center gap-4">
                        <button class="relative flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-slate-100 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700">
                            <span class="material-symbols-outlined">notifications</span>
                            <div class="absolute top-2 right-2 size-2.5 rounded-full bg-red-500 border-2 border-white dark:border-background-dark"></div>
                        </button>
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" 
                             data-alt="User avatar" 
                             style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA_w1sw-sMySQs3Vk-VH1hJHRuUWXXPMdBz2tV6qWAkzzt3CsMFytQpf344cgqXxXU4_K3Jyh_iYzVNRrE4BbH4zotUGfDHZ1FdrhRmm5JXtPSwYDwyELEpPMa8bczn1ZetNJFze4MxsM07YONXmdejvNZGlAeBtG3QaBjXNVYlo23X2VZ7eTyGxoC833IC0tLTjsHJNHvY8boR1KW6pEJQYbNlXuIfwyC5L-8LWoW4GP0QPLE2TrMYtNGlq5JaxpCb866RTN-itw");'>
                        </div>
                    </div>
                </header>

                <!-- Main Content -->
                <main class="flex-1 p-8 bg-background-light dark:bg-background-dark">
                    <div class="flex flex-col max-w-7xl mx-auto gap-6">
                        <!-- Breadcrumbs -->
                        <div class="flex flex-wrap gap-2">
                            <a class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal" 
                               href="#">
                                Home
                            </a>
                            <span class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal">/</span>
                            <span class="text-slate-900 dark:text-slate-200 text-sm font-medium leading-normal">
                                Dashboard
                            </span>
                        </div>

                        <!-- Page Header -->
                        <div class="flex flex-wrap justify-between gap-4 items-center">
                            <h1 class="text-slate-900 dark:text-slate-200 text-4xl font-black leading-tight tracking-[-0.033em] min-w-72">
                                Registrar Dashboard
                            </h1>
                            <a href="student/student_management.php?action=add" class="flex items-center justify-center gap-2 h-10 px-5 bg-primary text-white rounded-lg text-sm font-bold shadow-sm hover:bg-primary/90 transition-colors">
                                <span class="material-symbols-outlined fill text-lg">add</span>
                                <span>Add New Student</span>
                            </a>
                        </div>

                        <!-- Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Total Students Card -->
                            <div class="flex flex-col gap-2 rounded-xl p-6 border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/50">
                                <div class="flex items-center gap-3 text-slate-500 dark:text-slate-400">
                                    <span class="material-symbols-outlined">school</span>
                                    <p class="text-base font-medium leading-normal">Total Students</p>
                                </div>
                                <p class="text-slate-900 dark:text-slate-100 tracking-tight text-4xl font-bold leading-tight">
                                    <?php echo htmlspecialchars($formattedStudents); ?>
                                </p>
                            </div>

                            <!-- Courses Offered Card -->
                            <div class="flex flex-col gap-2 rounded-xl p-6 border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/50">
                                <div class="flex items-center gap-3 text-slate-500 dark:text-slate-400">
                                    <span class="material-symbols-outlined">local_library</span>
                                    <p class="text-base font-medium leading-normal">Courses Offered</p>
                                </div>
                                <p class="text-slate-900 dark:text-slate-100 tracking-tight text-4xl font-bold leading-tight">
                                    <?php echo htmlspecialchars($formattedCourses); ?>
                                </p>
                            </div>

                            <!-- Enrolled Students Card -->
                            <div class="flex flex-col gap-2 rounded-xl p-6 border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/50">
                                <div class="flex items-center gap-3 text-slate-500 dark:text-slate-400">
                                    <span class="material-symbols-outlined">how_to_reg</span>
                                    <p class="text-base font-medium leading-normal">Enrolled Students</p>
                                </div>
                                <p class="text-slate-900 dark:text-slate-100 tracking-tight text-4xl font-bold leading-tight">
                                    <?php echo htmlspecialchars($formattedEnrolled); ?>
                                </p>
                         </div>

                          <div class="flex flex-col gap-2 rounded-xl p-6 border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/50">
                                <div class="flex items-center gap-3 text-slate-500 dark:text-slate-400">
                                    <span class="material-symbols-outlined">how_to_reg</span>
                                    <p class="text-base font-medium leading-normal">Enrolled Students</p>
                                </div>
                                <p class="text-slate-900 dark:text-slate-100 tracking-tight text-4xl font-bold leading-tight">
                                    <?php echo htmlspecialchars($formattedEnrolled); ?>
                                </p>
                         </div>

                        <!-- Quick Links and Recent Activity -->
                       
                    </div>
                </main>

                <!-- Footer -->
                <footer class="px-8 py-4 border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark">
                    <div class="flex flex-col md:flex-row justify-between items-center text-sm text-slate-500 dark:text-slate-400 gap-2">
                        <p>
                            &copy; <?php echo date('Y'); ?> School Management System. All rights reserved.
                        </p>
                        <div class="flex items-center gap-4">
                            <a class="hover:text-primary transition-colors" href="#">
                                Help Center
                            </a>
                            <span class="h-1 w-1 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                            <a class="hover:text-primary transition-colors" href="#">
                                Privacy Policy
                            </a>
                            <span class="h-1 w-1 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                            <a class="hover:text-primary transition-colors" href="#">
                                Terms of Service
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>