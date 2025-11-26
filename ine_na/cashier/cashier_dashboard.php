<?php include "../config/db_connect.php"; ?>
<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'cashier') {
    header("Location: ../login.php");
    exit;
}


<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Cashier Portal - Dashboard</title>
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
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark">
<div class="flex h-full w-full">
<aside class="flex h-screen min-h-[700px] w-64 flex-col justify-between border-r border-slate-200 bg-white p-4 sticky top-0 dark:border-slate-800 dark:bg-background-dark">
<div class="flex flex-col gap-8">
<div class="flex items-center gap-3 px-3 text-primary">
<span class="material-symbols-outlined text-3xl">school</span>
<h2 class="text-xl font-bold">Cashier Portal</h2>
</div>
<nav class="flex flex-col gap-2">
<a class="flex items-center gap-3 rounded-lg bg-primary/20 px-3 py-2 text-primary" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
<p class="text-sm font-medium">Dashboard</p>
</a>
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800" href="#">
<span class="material-symbols-outlined">payments</span>
<p class="text-sm font-medium">Payments</p>
</a>
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800" href="#">
<span class="material-symbols-outlined">receipt_long</span>
<p class="text-sm font-medium">Billing</p>
</a>
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800" href="#">
<span class="material-symbols-outlined">bar_chart</span>
<p class="text-sm font-medium">Reports</p>
</a>
</nav>
</div>
<div class="flex flex-col">
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800" href="#">
<span class="material-symbols-outlined">logout</span>
<p class="text-sm font-medium">Logout</p>
</a>
</div>
</aside>
<div class="flex flex-1 flex-col">
<header class="sticky top-0 z-10 flex items-center justify-between whitespace-nowrap border-b border-slate-200 bg-white px-8 py-3 dark:border-slate-800 dark:bg-background-dark">
<div class="flex flex-1 items-center gap-8">
<label class="flex h-10 min-w-40 max-w-sm flex-col">
<div class="flex h-full w-full flex-1 items-stretch rounded-lg">
<div class="flex items-center justify-center rounded-l-lg border-r-0 border-none bg-slate-100 pl-3 text-slate-500 dark:bg-slate-800 dark:text-slate-400">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input h-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg rounded-l-none border-l-0 border-none bg-slate-100 px-4 pl-2 text-base font-normal leading-normal text-slate-900 placeholder:text-slate-500 focus:border-none focus:outline-0 focus:ring-0 dark:bg-slate-800 dark:text-slate-100 dark:placeholder:text-slate-400" placeholder="Search students, transactions..." value=""/>
</div>
</label>
</div>
<div class="flex flex-shrink-0 items-center justify-end gap-4">
<button class="flex h-10 w-10 max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
<span class="material-symbols-outlined">settings</span>
</button>
<button class="flex h-10 w-10 max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
<span class="material-symbols-outlined">notifications</span>
</button>
<div class="flex items-center gap-3">
<div class="aspect-square size-10 rounded-full bg-cover bg-center bg-no-repeat" data-alt="User avatar of John Doe" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCqMCBUei4CofAlpAkj0jpQM5QgqIIHSrgZ26Uj6QzzPbR0lGnbpg8zqDKpRCcEu9RE2HupV1O3O-XA9zc088wCAhevSVIWdYFD9aMx-gG0yxBDK9rBK9JWKzy43ymCB8sJ_m832zp8BCcIxU_LSSioSZJT1LTOv1-fQLCJRKmW43lhpiQUd79Rdwkh1q1MJSeFWTWAQV3xV-3GYDlaveUgCMqlaps19PZfTQknvv2USh6kVv3MdqmLIucuy-7_uTIvbW1JhoJghQ");'></div>
<div class="flex flex-col text-left">
<h3 class="text-sm font-medium leading-tight text-slate-900 dark:text-slate-100">John Doe</h3>
<p class="text-xs font-normal leading-tight text-slate-500 dark:text-slate-400">Cashier</p>
</div>
</div>
</div>
</header>
<main class="flex-1 p-8">
<div class="mb-8 flex flex-col gap-6">
<div class="flex flex-wrap gap-2">
<a class="text-sm font-medium leading-normal text-slate-500 hover:text-primary dark:text-slate-400 dark:hover:text-primary" href="#">Home</a>
<span class="text-sm font-medium leading-normal text-slate-500 dark:text-slate-400">/</span>
<span class="text-sm font-medium leading-normal text-slate-900 dark:text-slate-100">Dashboard</span>
</div>
<div class="flex flex-wrap items-center justify-between gap-4">
<p class="min-w-72 text-4xl font-black leading-tight tracking-[-0.033em] text-slate-900 dark:text-slate-100">Dashboard</p>
<button class="flex h-10 min-w-[120px] items-center justify-center gap-2 overflow-hidden rounded-lg bg-primary px-4 text-sm font-bold leading-normal tracking-[0.015em] text-white">
<span class="material-symbols-outlined text-xl">add</span>
<span>New Payment</span>
</button>
</div>
</div>
<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
<div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
<p class="text-base font-medium leading-normal text-slate-600 dark:text-slate-300">Today's Collections</p>
<p class="text-3xl font-bold leading-tight tracking-tight text-slate-900 dark:text-slate-100">$12,450.00</p>
<p class="flex items-center gap-1 text-sm font-medium leading-normal text-green-600">
<span class="material-symbols-outlined text-base">arrow_upward</span>
<span>+5.2% from yesterday</span>
</p>
</div>
<div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
<p class="text-base font-medium leading-normal text-slate-600 dark:text-slate-300">Pending Payments</p>
<p class="text-3xl font-bold leading-tight tracking-tight text-slate-900 dark:text-slate-100">15</p>
<p class="flex items-center gap-1 text-sm font-medium leading-normal text-green-600">
<span class="material-symbols-outlined text-base">arrow_upward</span>
<span>+1 from yesterday</span>
</p>
</div>
<div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
<p class="text-base font-medium leading-normal text-slate-600 dark:text-slate-300">Total Transactions</p>
<p class="text-3xl font-bold leading-tight tracking-tight text-slate-900 dark:text-slate-100">82</p>
<p class="flex items-center gap-1 text-sm font-medium leading-normal text-red-600">
<span class="material-symbols-outlined text-base">arrow_downward</span>
<span>-0.5% from yesterday</span>
</p>
</div>
</div>
<div class="mt-8 flex flex-col gap-4 rounded-xl border border-slate-200 bg-white p-6 dark:border-slate-800 dark:bg-slate-900">
<h3 class="text-lg font-bold text-slate-900 dark:text-slate-100">Recent Transactions</h3>
<div class="overflow-x-auto">
<table class="min-w-full text-left text-sm">
<thead class="border-b border-slate-200 dark:border-slate-800">
<tr>
<th class="p-3 font-semibold text-slate-500 dark:text-slate-400">Invoice ID</th>
<th class="p-3 font-semibold text-slate-500 dark:text-slate-400">Student Name</th>
<th class="p-3 font-semibold text-slate-500 dark:text-slate-400">Date</th>
<th class="p-3 font-semibold text-slate-500 dark:text-slate-400">Amount</th>
<th class="p-3 font-semibold text-slate-500 dark:text-slate-400">Status</th>
</tr>
</thead>
<tbody>
<tr class="border-b border-slate-200 dark:border-slate-800">
<td class="p-3 text-slate-700 dark:text-slate-300">#INV-00123</td>
<td class="p-3 text-slate-700 dark:text-slate-300">Michael Scott</td>
<td class="p-3 text-slate-700 dark:text-slate-300">2024-05-21</td>
<td class="p-3 text-slate-700 dark:text-slate-300">$250.00</td>
<td class="p-3"><span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300">Paid</span></td>
</tr>
<tr class="border-b border-slate-200 dark:border-slate-800">
<td class="p-3 text-slate-700 dark:text-slate-300">#INV-00122</td>
<td class="p-3 text-slate-700 dark:text-slate-300">Dwight Schrute</td>
<td class="p-3 text-slate-700 dark:text-slate-300">2024-05-21</td>
<td class="p-3 text-slate-700 dark:text-slate-300">$150.00</td>
<td class="p-3"><span class="inline-flex items-center rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">Pending</span></td>
</tr>
<tr class="border-b border-slate-200 dark:border-slate-800">
<td class="p-3 text-slate-700 dark:text-slate-300">#INV-00121</td>
<td class="p-3 text-slate-700 dark:text-slate-300">Jim Halpert</td>
<td class="p-3 text-slate-700 dark:text-slate-300">2024-05-20</td>
<td class="p-3 text-slate-700 dark:text-slate-300">$300.00</td>
<td class="p-3"><span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300">Paid</span></td>
</tr>
<tr>
<td class="p-3 text-slate-700 dark:text-slate-300">#INV-00120</td>
<td class="p-3 text-slate-700 dark:text-slate-300">Pam Beesly</td>
<td class="p-3 text-slate-700 dark:text-slate-300">2024-05-19</td>
<td class="p-3 text-slate-700 dark:text-slate-300">$50.00</td>
<td class="p-3"><span class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700 dark:bg-red-900/50 dark:text-red-300">Overdue</span></td>
</tr>
</tbody>
</table>
</div>
</div>
</main>
<footer class="mt-auto border-t border-slate-200 bg-white px-8 py-4 dark:border-slate-800 dark:bg-background-dark">
<div class="flex items-center justify-between text-sm text-slate-500 dark:text-slate-400">
<p>© 2024 School Management System. All rights reserved.</p>
<div class="flex gap-4">
<a class="hover:text-primary" href="#">Help</a>
<a class="hover:text-primary" href="#">Support</a>
</div>
</div>
</footer>
</div>
</div>
</div>

</body></html>