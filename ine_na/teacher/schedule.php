<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>School Management System - Schedules</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet"/>
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
<aside class="sticky top-0 flex h-screen w-64 flex-col justify-between border-r border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-background-dark">
<div class="flex flex-col gap-6">
<div class="flex items-center gap-3 px-3 py-2 text-primary">
<span class="material-symbols-outlined text-3xl">school</span>
<h2 class="text-lg font-bold leading-tight tracking-[-0.015em] text-slate-900 dark:text-white">School System</h2>
</div>
<div class="flex flex-col gap-2">
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800" href="teacher_dashboard.php">
<span class="material-symbols-outlined">dashboard</span>
<p class="text-sm font-medium leading-normal">Dashboard</p>
</a>
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-600 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800" href="class_record.php">
<span class="material-symbols-outlined">group</span>
<p class="text-sm font-medium leading-normal">Student Records</p>
</a>
<a class="flex items-center gap-3 rounded-lg bg-primary/10 px-3 py-2 text-primary dark:bg-primary/20" href="#">
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
<header class="sticky top-0 z-10 flex h-16 items-center justify-between whitespace-nowrap border-b border-slate-200 bg-background-light px-8 dark:border-slate-800 dark:bg-background-dark">
<div class="flex flex-1 items-center gap-8">
<label class="relative flex h-10 w-full max-w-sm">
<div class="text-slate-400 absolute left-3 top-1/2 -translate-y-1/2 transform">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg border-slate-200 bg-white text-slate-900 focus:border-primary focus:outline-0 focus:ring-0 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:placeholder:text-slate-500 h-full pl-10 pr-4 text-sm font-normal leading-normal" placeholder="Search for courses, rooms..." value=""/>
</label>
</div>
<div class="flex items-center gap-4">
<button class="relative flex h-10 w-10 cursor-pointer items-center justify-center overflow-hidden rounded-full bg-slate-100 text-slate-600 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-400 dark:hover:bg-slate-700">
<span class="material-symbols-outlined">notifications</span>
<div class="absolute right-2 top-2 h-2 w-2 rounded-full bg-red-500"></div>
</button>
<div class="flex items-center gap-3">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Teacher's profile picture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAXFKK2JGdCXMk0bRw63DSwHlg56mg6lt19vexTEEahsp7FCnd2SoRBVP-Iy55cAWOv40WiiJPwO-HTK5ASk9DZ-hkIU97k_BfL12jHL332eSOLFA66A5_0-ECcuKNwifkITFBB8hfxZy2fS6_U8pO3EwBuwhcFeTwDaEOKSBprrcUArP3ZVXPyk_KbTr-kdkk33ls_Gztu3UvNBYSrmXrntUvid_17qFHvaRm4kQrFlRgPnXjMuZlRcCi-cUvB9gLD3YonPHBN5Q");'></div>
<div class="flex flex-col">
<h3 class="text-sm font-medium text-slate-900 dark:text-white">Mrs. Davison</h3>
<p class="text-xs text-slate-500 dark:text-slate-400">Grade 5 Teacher</p>
</div>
</div>
</div>
</header>
<main class="flex-1 p-8">
<div class="flex flex-col gap-8">
<div class="flex flex-wrap items-center gap-2">
<a class="text-sm font-medium text-slate-500 hover:text-primary dark:text-slate-400 dark:hover:text-primary" href="#">Teacher</a>
<span class="text-sm font-medium text-slate-500 dark:text-slate-400">/</span>
<span class="text-sm font-medium text-slate-900 dark:text-white">My Schedules</span>
</div>
<div class="flex flex-col gap-2">
<h1 class="text-3xl font-bold leading-tight tracking-tight text-slate-900 dark:text-white">My Schedules</h1>
<p class="text-base font-normal leading-normal text-slate-600 dark:text-slate-400">View and manage your class schedules for the current term.</p>
</div>
<div class="flex flex-col gap-6 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
<div class="flex items-center gap-2">
<button class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
<span class="material-symbols-outlined text-base">filter_list</span>
<span>Filter</span>
</button>
<select class="form-select rounded-lg border-slate-200 bg-white text-sm text-slate-700 focus:border-primary focus:ring-primary/50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
<option>All Days</option>
<option>Monday</option>
<option>Tuesday</option>
<option>Wednesday</option>
<option>Thursday</option>
<option>Friday</option>
</select>
</div>
<button class="flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90">
<span class="material-symbols-outlined text-base">add</span>
<span>Add New Schedule</span>
</button>
</div>
<div class="w-full overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="border-b border-slate-200 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:border-slate-800 dark:text-slate-400">
<th class="py-3 pr-4">Course Name</th>
<th class="py-3 pr-4">Class/Section</th>
<th class="py-3 pr-4">Time</th>
<th class="py-3 pr-4">Day(s)</th>
<th class="py-3 pr-4">Room</th>
<th class="py-3 pl-4 text-right">Actions</th>
</tr>
</thead>
<tbody>
<tr class="border-b border-slate-200 text-sm text-slate-700 dark:border-slate-800 dark:text-slate-300">
<td class="py-4 pr-4 font-medium text-slate-900 dark:text-white">Mathematics</td>
<td class="py-4 pr-4">Grade 5 - Section A</td>
<td class="py-4 pr-4">09:00 AM - 10:00 AM</td>
<td class="py-4 pr-4">Mon, Wed, Fri</td>
<td class="py-4 pr-4">Room 201</td>
<td class="py-4 pl-4 text-right">
<div class="flex items-center justify-end gap-2">
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/40 dark:hover:text-red-500">
<span class="material-symbols-outlined text-base">delete</span>
</button>
</div>
</td>
</tr>
<tr class="border-b border-slate-200 text-sm text-slate-700 dark:border-slate-800 dark:text-slate-300">
<td class="py-4 pr-4 font-medium text-slate-900 dark:text-white">Science</td>
<td class="py-4 pr-4">Grade 5 - Section A</td>
<td class="py-4 pr-4">10:15 AM - 11:15 AM</td>
<td class="py-4 pr-4">Mon, Wed, Fri</td>
<td class="py-4 pr-4">Lab 3</td>
<td class="py-4 pl-4 text-right">
<div class="flex items-center justify-end gap-2">
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/40 dark:hover:text-red-500">
<span class="material-symbols-outlined text-base">delete</span>
</button>
</div>
</td>
</tr>
<tr class="border-b border-slate-200 text-sm text-slate-700 dark:border-slate-800 dark:text-slate-300">
<td class="py-4 pr-4 font-medium text-slate-900 dark:text-white">History</td>
<td class="py-4 pr-4">Grade 5 - Section B</td>
<td class="py-4 pr-4">11:30 AM - 12:30 PM</td>
<td class="py-4 pr-4">Tue, Thu</td>
<td class="py-4 pr-4">Room 205</td>
<td class="py-4 pl-4 text-right">
<div class="flex items-center justify-end gap-2">
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/40 dark:hover:text-red-500">
<span class="material-symbols-outlined text-base">delete</span>
</button>
</div>
</td>
</tr>
<tr class="border-b border-slate-200 text-sm text-slate-700 dark:border-slate-800 dark:text-slate-300">
<td class="py-4 pr-4 font-medium text-slate-900 dark:text-white">Mathematics</td>
<td class="py-4 pr-4">Grade 5 - Section B</td>
<td class="py-4 pr-4">01:30 PM - 02:30 PM</td>
<td class="py-4 pr-4">Tue, Thu</td>
<td class="py-4 pr-4">Room 201</td>
<td class="py-4 pl-4 text-right">
<div class="flex items-center justify-end gap-2">
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/40 dark:hover:text-red-500">
<span class="material-symbols-outlined text-base">delete</span>
</button>
</div>
</td>
</tr>
<tr class="text-sm text-slate-700 dark:text-slate-300">
<td class="py-4 pr-4 font-medium text-slate-900 dark:text-white">English</td>
<td class="py-4 pr-4">Grade 5 - Section A</td>
<td class="py-4 pr-4">02:45 PM - 03:45 PM</td>
<td class="py-4 pr-4">Mon, Wed, Fri</td>
<td class="py-4 pr-4">Room 202</td>
<td class="py-4 pl-4 text-right">
<div class="flex items-center justify-end gap-2">
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary">
<span class="material-symbols-outlined text-base">edit</span>
</button>
<button class="flex items-center gap-1 rounded-md px-2 py-1 text-slate-500 hover:bg-red-50 hover:text-red-600 dark:text-slate-400 dark:hover:bg-red-900/40 dark:hover:text-red-500">
<span class="material-symbols-outlined text-base">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="flex items-center justify-between border-t border-slate-200 pt-4 text-sm text-slate-500 dark:border-slate-800 dark:text-slate-400">
<span>Showing 1 to 5 of 8 schedules</span>
<div class="flex items-center gap-2">
<button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:bg-slate-50 dark:border-slate-700 dark:hover:bg-slate-800">Previous</button>
<button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:bg-slate-50 dark:border-slate-700 dark:hover:bg-slate-800">Next</button>
</div>
</div>
</div>
</div>
</main>
<footer class="border-t border-slate-200 bg-white px-8 py-4 dark:border-slate-800 dark:bg-slate-900">
<div class="flex justify-between text-sm text-slate-500 dark:text-slate-400">
<p>© 2024 Spring Valley High School. All rights reserved.</p>
<div class="flex gap-4">
<a class="hover:text-primary hover:underline" href="#">Help Center</a>
<a class="hover:text-primary hover:underline" href="#">Support</a>
</div>
</div>
</footer>
</div>
</div>
</div>
</body></html>