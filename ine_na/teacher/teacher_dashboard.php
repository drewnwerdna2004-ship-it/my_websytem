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
?>

<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Teacher Dashboard</title>
    
    <!-- External Stylesheets -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#135bec",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622"
                    },
                    fontFamily: {
                        "display": ["Lexend", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    }
                }
            }
        };
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
</head>
<body class="font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
<div class="flex min-h-screen">
<!-- SideNavBar -->
<aside class="sticky top-0 flex h-screen w-64 flex-col justify-between border-r border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-background-dark">
<div class="flex flex-col gap-6">
<div class="flex items-center gap-3 px-3 py-2 text-primary">
<span class="material-symbols-outlined text-3xl">school</span>
<h2 class="text-lg font-bold leading-tight tracking-[-0.015em] text-slate-900 dark:text-white">School System</h2>
</div>
<div class="flex flex-col gap-2">
    <a class="flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20" href="#">
        <span class="material-symbols-outlined">dashboard</span>
        <p class="text-sm font-medium leading-normal">Dashboard</p>
    </a>
    <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800" href="class_record.php">
        <span class="material-symbols-outlined">group</span>
        <p class="text-sm font-medium leading-normal">Student Records</p>
    </a>
    <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800" href="schedule.php">
        <span class="material-symbols-outlined">calendar_month</span>
        <p class="text-sm font-medium leading-normal">Schedule</p>
    </a>
    <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800" href="#">
        <span class="material-symbols-outlined">assessment</span>
        <p class="text-sm font-medium leading-normal">Reports</p>
    </a>
</div>
</div>
                    <div class="flex flex-col gap-1">
                        <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800" href="#">
                            <span class="material-symbols-outlined">settings</span>
                            <p class="text-sm font-medium leading-normal">Settings</p>
                        </a>
                        <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800" href="#">
                            <span class="material-symbols-outlined">logout</span>
                            <p class="text-sm font-medium leading-normal">Logout</p>
                        </a>
                    </div>
</aside>
<div class="flex flex-1 flex-col">
                <!-- TopNavBar -->
                <header class="sticky top-0 z-10 flex h-16 items-center justify-between whitespace-nowrap border-b border-slate-200 bg-background-light px-8 dark:border-slate-800 dark:bg-background-dark">
                    <div class="flex flex-1 items-center gap-8">
                        <label class="relative flex h-10 w-full max-w-sm">
                            <div class="absolute left-3 top-1/2 -translate-y-1/2 transform text-slate-400">
                                <span class="material-symbols-outlined">search</span>
                            </div>
                            <input class="form-input h-full w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg border-slate-200 bg-white pl-10 pr-4 text-sm font-normal leading-normal text-slate-900 focus:border-primary focus:outline-0 focus:ring-0 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:placeholder:text-slate-500" placeholder="Search for students..." value=""/>
                        </label>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="relative flex h-10 w-10 cursor-pointer items-center justify-center overflow-hidden rounded-full bg-slate-100 text-slate-600 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-400 dark:hover:bg-slate-700">
                            <span class="material-symbols-outlined">notifications</span>
                            <div class="absolute right-2 top-2 h-2 w-2 rounded-full bg-red-500"></div>
                        </button>
                        <div class="flex items-center gap-3">
                            <div class="size-10 aspect-square rounded-full bg-cover bg-center bg-no-repeat" data-alt="Teacher's profile picture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAXFKK2JGdCXMk0bRw63DSwHlg56mg6lt19vexTEEahsp7FCnd2SoRBVP-Iy55cAWOv40WiiJPwO-HTK5ASk9DZ-hkIU97k_BfL12jHL332eSOLFA66A5_0-ECcuKNwifkITFBB8hfxZy2fS6_U8pO3EwBuwhcFeTwDaEOKSBprrcUArP3ZVXPyk_KbTr-kdkk33ls_Gztu3UvNBYSrmXrntUvid_17qFHvaRm4kQrFlRgPnXjMuZlRcCi-cUvB9gLD3YonPHBN5Q");'></div>
                            <div class="flex flex-col">
                                <h3 class="text-sm font-medium text-slate-900 dark:text-white">Mrs. Davison</h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Grade 5 Teacher</p>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main Content Area -->
                <main class="flex-1 p-8">
                    <div class="flex flex-col gap-8">
                        <!-- Breadcrumbs -->
                        <div class="flex flex-wrap gap-2">
                            <span class="text-sm font-medium text-slate-500 dark:text-slate-400">Dashboard</span>
                        </div>
                        
                        <!-- Page Heading -->
                        <div class="flex flex-col gap-2">
                            <h1 class="text-3xl font-bold leading-tight tracking-tight text-slate-900 dark:text-white">Welcome, Mrs. Davison!</h1>
                            <p class="text-base font-normal leading-normal text-slate-600 dark:text-slate-400">Here's a summary of your activities for today.</p>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                            <!-- Today's Classes -->
                            <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
                                <p class="text-base font-medium text-slate-600 dark:text-slate-400">Today's Classes</p>
                                <p class="text-3xl font-bold leading-tight text-slate-900 dark:text-white">5</p>
                            </div>
                            
                            <!-- Upcoming Assignments -->
                            <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
                                <p class="text-base font-medium text-slate-600 dark:text-slate-400">Upcoming Assignments</p>
                                <p class="text-3xl font-bold leading-tight text-slate-900 dark:text-white">3</p>
                            </div>
                            
                            <!-- New Messages -->
                            <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
                                <p class="text-base font-medium text-slate-600 dark:text-slate-400">New Messages</p>
                                <p class="text-3xl font-bold leading-tight text-slate-900 dark:text-white">2</p>
                            </div>
                            
                            <!-- Attendance -->
                            <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
                                <p class="text-base font-medium text-slate-600 dark:text-slate-400">Attendance</p>
                                <p class="text-3xl font-bold leading-tight text-slate-900 dark:text-white">98%</p>
                            </div>
                        </div>

                        <!-- Schedule Section -->
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                            <!-- Today's Schedule -->
                            <div class="lg:col-span-2">
                                <div class="flex flex-col gap-4 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
                                    <div class="flex items-center justify-between">
                                        <h2 class="text-lg font-semibold text-slate-800 dark:text-white">Today's Schedule</h2>
                                        <a href="#" class="text-sm font-medium text-primary hover:underline">View All</a>
                                    </div>
                                    
                                    <!-- Schedule Items -->
                                    <div class="space-y-3">
                                        <!-- Science Class -->
                                        <div class="flex items-center gap-4 rounded-lg border border-transparent p-3 hover:border-slate-200 hover:bg-slate-50 dark:hover:border-slate-700 dark:hover:bg-slate-800/50">
                                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400">
                                                <span class="material-symbols-outlined">science</span>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-slate-800 dark:text-slate-200">Science</p>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">Grade 5 - Room 201</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-medium text-slate-800 dark:text-slate-200">09:00 - 10:00 AM</p>
                                                <p class="text-sm text-green-600 dark:text-green-400">In Progress</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Math Class -->
                                        <div class="flex items-center gap-4 rounded-lg border border-transparent p-3 hover:border-slate-200 hover:bg-slate-50 dark:hover:border-slate-700 dark:hover:bg-slate-800/50">
                                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-orange-100 text-orange-600 dark:bg-orange-900/50 dark:text-orange-400">
                                                <span class="material-symbols-outlined">calculate</span>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-slate-800 dark:text-slate-200">Mathematics</p>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">Grade 5 - Room 201</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-medium text-slate-800 dark:text-slate-200">10:15 - 11:15 AM</p>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">Upcoming</p>
                                            </div>
                                        </div>
                                        
                                        <!-- History Class -->
                                        <div class="flex items-center gap-4 rounded-lg border border-transparent p-3 hover:border-slate-200 hover:bg-slate-50 dark:hover:border-slate-700 dark:hover:bg-slate-800/50">
                                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/50 dark:text-purple-400">
                                                <span class="material-symbols-outlined">history_edu</span>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-slate-800 dark:text-slate-200">History</p>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">Grade 5 - Room 201</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-medium text-slate-800 dark:text-slate-200">11:30 - 12:30 PM</p>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">Upcoming</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Announcements -->
                            <div class="flex flex-col gap-4">
                                <div class="rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
                                    <h2 class="mb-4 text-lg font-semibold text-slate-800 dark:text-white">Announcements</h2>
                                    <div class="space-y-4">
                                        <!-- Announcement 1 -->
                                        <div class="flex flex-col gap-1 rounded-lg bg-slate-50 p-4 dark:bg-slate-800/50">
                                            <p class="font-semibold text-primary">Parent-Teacher Meeting</p>
                                            <p class="text-sm text-slate-600 dark:text-slate-300">Scheduled for this Friday. Please check your emails for the sign-up sheet.</p>
                                            <p class="text-xs text-slate-400 dark:text-slate-500">2 days ago</p>
                                        </div>
                                        
                                        <!-- Announcement 2 -->
                                        <div class="flex flex-col gap-1 rounded-lg bg-slate-50 p-4 dark:bg-slate-800/50">
                                            <p class="font-semibold text-primary">Science Fair Submissions</p>
                                            <p class="text-sm text-slate-600 dark:text-slate-300">The deadline for project submissions is next Monday. Encourage your students!</p>
                                            <p class="text-xs text-slate-400 dark:text-slate-500">5 days ago</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Quick Actions -->
                                <div class="rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
                                    <h2 class="mb-4 text-lg font-semibold text-slate-800 dark:text-white">Quick Actions</h2>
                                    <div class="grid grid-cols-2 gap-3">
                                        <button class="flex flex-col items-center justify-center gap-2 rounded-lg border border-slate-200 p-4 text-center hover:bg-slate-50 dark:border-slate-700 dark:hover:bg-slate-800/50">
                                            <span class="material-symbols-outlined text-primary">add_circle</span>
                                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">New Assignment</span>
                                        </button>
                                        <button class="flex flex-col items-center justify-center gap-2 rounded-lg border border-slate-200 p-4 text-center hover:bg-slate-50 dark:border-slate-700 dark:hover:bg-slate-800/50">
                                            <span class="material-symbols-outlined text-primary">event_available</span>
                                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Take Attendance</span>
                                        </button>
                                        <button class="flex flex-col items-center justify-center gap-2 rounded-lg border border-slate-200 p-4 text-center hover:bg-slate-50 dark:border-slate-700 dark:hover:bg-slate-800/50">
                                            <span class="material-symbols-outlined text-primary">grading</span>
                                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Grade Assignments</span>
                                        </button>
                                        <button class="flex flex-col items-center justify-center gap-2 rounded-lg border border-slate-200 p-4 text-center hover:bg-slate-50 dark:border-slate-700 dark:hover:bg-slate-800/50">
                                            <span class="material-symbols-outlined text-primary">chat</span>
                                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Messages</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Footer -->
                <footer class="border-t border-slate-200 bg-white px-8 py-4 dark:border-slate-800 dark:bg-slate-900">
                    <div class="flex flex-col items-center justify-between gap-4 text-sm text-slate-500 dark:text-slate-400 md:flex-row">
                        <p> 2024 Spring Valley High School. All rights reserved.</p>
                        <div class="flex gap-4">
                            <a class="hover:text-primary hover:underline" href="#">Help Center</a>
                            <a class="hover:text-primary hover:underline" href="#">Support</a>
                            <a class="hover:text-primary hover:underline" href="#">Privacy Policy</a>
                            <a class="hover:text-primary hover:underline" href="#">Terms of Service</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>


</body>
</html>