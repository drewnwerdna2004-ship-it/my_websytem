<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>School Management System - Home</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#135bec",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                        "destructive": "#DC3545",
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
</head>
<body class="font-display bg-background-light dark:bg-background-dark">
<div class="relative flex h-screen w-full flex-col group/design-root overflow-y-auto" style='font-family: Lexend, "Noto Sans", sans-serif;'>
<div class="flex flex-col w-full min-h-screen">
<header class="flex h-16 shrink-0 items-center justify-between border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 px-6">
<div class="flex items-center gap-3">
<div class="flex items-center justify-center h-8 w-8 bg-primary rounded-full text-white font-bold text-lg">
                        S
                    </div>
<span class="text-lg font-semibold text-gray-900 dark:text-gray-100">School Management System</span>
</div>
<div class="flex items-center gap-4">
<button class="relative rounded-full p-2 text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-background-dark">
<span class="material-symbols-outlined">notifications</span>
</button>
<div class="flex items-center gap-3">
<img alt="User avatar" class="h-9 w-9 rounded-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCImTwLakogBls4sTTUet5vW6y5huAfVHEo-aAtMTupMLiRZVOJ0E1x2Knby7u9arVsCNN0TEuE89cjX4F0QuAx0qoGTpDrR26DGO1BNkEraABq_Qgme6pbbSoMPsE2R1XEQkoTvO23rKW5g_w-kYXnMqS1LFeln8-gmInLcyE4kmbP9ulD5RUJiQG_I8KtqGXxFFJ-ex9g0JzZMD0IDcPZKbnHKbQ1t4S-2BKtsz4y8AtVPrnb9VE_LY2VcBy_c_I8EyDQQ6Ak0g"/>
<div>
<p class="text-sm font-medium text-gray-900 dark:text-gray-100">John Doe</p>
<p class="text-xs text-gray-500 dark:text-gray-400">Administrator</p>
</div>
</div>
</div>
</header>
<main class="flex-1 p-6 sm:p-8">
<div class="mx-auto max-w-7xl">
<div class="mb-8">
<h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Welcome back, John!</h1>
<p class="mt-1 text-gray-600 dark:text-gray-400">Here's a quick overview of the system.</p>
</div>
<div class="mb-8">
<h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Your Modules</h2>
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
<a class="group flex flex-col rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/60 p-6 shadow-sm transition-all hover:shadow-lg hover:-translate-y-1" href="login.php">
<div class="flex items-center gap-4">
<div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
<span class="material-symbols-outlined text-3xl">assignment_ind</span>
</div>
<h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Registrar</h3>
</div>
<p class="mt-3 text-sm text-gray-600 dark:text-gray-400">Manage student records, course catalogs, and academic schedules.</p>
</a>
<a class="group flex flex-col rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/60 p-6 shadow-sm transition-all hover:shadow-lg hover:-translate-y-1" href="#">
<div class="flex items-center gap-4">
<div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-500/10 text-green-600 dark:text-green-400">
<span class="material-symbols-outlined text-3xl">payments</span>
</div>
<h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Cashier</h3>
</div>
<p class="mt-3 text-sm text-gray-600 dark:text-gray-400">Handle tuition fees, process payments, and manage financial accounts.</p>
</a>
<a class="group flex flex-col rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/60 p-6 shadow-sm transition-all hover:shadow-lg hover:-translate-y-1" href="#">
<div class="flex items-center gap-4">
<div class="flex h-12 w-12 items-center justify-center rounded-lg bg-yellow-500/10 text-yellow-600 dark:text-yellow-400">
<span class="material-symbols-outlined text-3xl">school</span>
</div>
<h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Teacher Portal</h3>
</div>
<p class="mt-3 text-sm text-gray-600 dark:text-gray-400">Access class lists, manage grades, and communicate with students.</p>
</a>
</div>
</div>
<div>
<h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">System Announcements</h2>
<div class="space-y-4">
<div class="rounded-lg border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/60 p-5">
<div class="flex items-start gap-4">
<div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300 flex-shrink-0 mt-1">
<span class="material-symbols-outlined text-xl">campaign</span>
</div>
<div>
<p class="font-semibold text-gray-900 dark:text-gray-100">Scheduled System Maintenance</p>
<p class="text-sm text-gray-600 dark:text-gray-400">The system will be temporarily unavailable on Sunday, Oct 29, from 2:00 AM to 4:00 AM for scheduled maintenance.</p>
<p class="text-xs text-gray-500 dark:text-gray-500 mt-2">Posted on: Oct 25, 2023</p>
</div>
</div>
</div>
<div class="rounded-lg border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/60 p-5">
<div class="flex items-start gap-4">
<div class="flex h-8 w-8 items-center justify-center rounded-full bg-yellow-100 dark:bg-yellow-900/50 text-yellow-600 dark:text-yellow-400 flex-shrink-0 mt-1">
<span class="material-symbols-outlined text-xl">event_upcoming</span>
</div>
<div>
<p class="font-semibold text-gray-900 dark:text-gray-100">Enrollment Period for Spring Semester is Now Open</p>
<p class="text-sm text-gray-600 dark:text-gray-400">Please be advised that the enrollment period for the upcoming Spring semester starts today and will end on November 15.</p>
<p class="text-xs text-gray-500 dark:text-gray-500 mt-2">Posted on: Oct 20, 2023</p>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
</div>

</body></html>